<?php
session_start();
require_once __DIR__ . '/../connection/connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'message' => '', 'error' => ['general' => 'Invalid request method.']], JSON_UNESCAPED_UNICODE);
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$response = ['status' => false, 'message' => '', 'error' => []];

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['error']['email'] = 'Please enter a valid email address.';
}

if (empty($password)) {
    $response['error']['password'] = 'Please enter your password.';
}

if (empty($response['error'])) {
    $sql = $conn->prepare('SELECT id, password FROM users WHERE email = ?');
    if (!$sql) {
        $response['error']['general'] = 'Database error. Please try again later.';
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $sql->bind_param('s', $email);
    $sql->execute();
    $result = $sql->get_result();
    $storedHash = $result->fetch_assoc();

    if ($storedHash && password_verify($password, $storedHash['password'])) {
        session_regenerate_id(true);
        $_SESSION['id'] = $storedHash['id'];
        $_SESSION['logged_in'] = true;
        $_SESSION['last_activity'] = time();

        $response['status'] = true;
        $response['message'] = 'Successfully Logged In.';
    } else {
        $response['error']['general'] = 'Invalid credentials. Please try again.';
    }
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
