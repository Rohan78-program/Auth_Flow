<?php
session_start();

require_once __DIR__ . '/../connection/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'status' => false,
        'message' => '',
        'error' => ['general' => 'Invalid request method.']
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');

$response = ['status' => false, 'message' => '', 'error' => []];
$photo_name = '';

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['photo']['name'];
    $tempName = $_FILES['photo']['tmp_name'];
    $size = (int) ($_FILES['photo']['size'] ?? 0);
    $uploadDir = __DIR__ . '/../uploads/';

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($extension, $allowed, true)) {
        if ($size <= 4 * 1024 * 1024) {
            if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
                $response['error']['photo'] = 'Unable to prepare upload directory.';
            } else {
                $photo_name = uniqid('', true) . '.' . $extension;

                if (!move_uploaded_file($tempName, $uploadDir . $photo_name)) {
                    $response['error']['photo'] = 'Failed to upload photo. Please try again.';
                    $photo_name = '';
                }
            }
        } else {
            $response['error']['photo'] = 'Photo is too large.';
        }
    } else {
        $response['error']['photo'] = 'Wrong format. Please select .jpg, .jpeg, or .png.';
    }
}

if (empty($name) || !preg_match('/^[a-zA-Z ]{1,50}$/', $name)) {
    $response['error']['name'] = 'Name is required and should only contain letters and spaces (max 50 characters).';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['error']['email'] = 'Valid email is required.';
}

if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) {
    $response['error']['phone'] = 'Valid phone number is required (10 digits).';
}

if (empty($address)) {
    $response['error']['address'] = 'Address is required.';
}

if (empty($password) || strlen($password) < 6 || !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{6,}$/', $password)) {
    $response['error']['password'] = 'Minimum 6 characters with at least one letter and one digit.';
}

if (empty($response['error'])) {
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
    if (!$stmt) {
        $response['error']['general'] = 'Database error. Please try again later.';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $exist = $stmt->get_result();

    if ($exist->num_rows > 0) {
        $response['error']['general'] = 'Email already exists.';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare('INSERT INTO users (name, email, password, phone, address, photo) VALUES (?, ?, ?, ?, ?, ?)');
        if (!$stmt) {
            $response['error']['general'] = 'Database error. Please try again later.';
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            exit;
        }

        $stmt->bind_param('ssssss', $name, $email, $hashedPassword, $phone, $address, $photo_name);

        if ($stmt->execute()) {
            $response['status'] = true;
            $response['message'] = 'User created successfully.';
        } else {
            $response['error']['general'] = 'Failed to register user. Please try again.';
        }
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
