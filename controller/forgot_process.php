<?php
require_once __DIR__ . '/../connection/connect.php';

header('Content-Type: application/json');

$email = trim($_POST['email'] ?? '');
$new_pass = trim($_POST['new_password'] ?? '');
$confirm_pass = trim($_POST['confirm_password'] ?? '');

$response = ['status' => false, 'message' => '', 'error' => []];

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['error']['email'] = 'Please enter a valid email.';
}

if (empty($new_pass)) {
    $response['error']['new_password'] = 'Please enter a new password.';
}

if (empty($confirm_pass)) {
    $response['error']['confirm_password'] = 'Please confirm your new password.';
}

if (!empty($new_pass) && !empty($confirm_pass) && $new_pass !== $confirm_pass) {
    $response['error']['confirm_password'] = 'Passwords do not match.';
}

if (!empty($new_pass) && (strlen($new_pass) < 6 || !preg_match('/^(?=.*[A-Za-z])(?=.*\d).{6,}$/', $new_pass))) {
    $response['error']['new_password'] = 'Weak password. Minimum 6 characters, at least one letter and one number.';
}
if (empty($response['error'])) {
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $response['error']['email'] = 'Email not found.';
    } else {
        $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
        if (!$stmt) {
            $response['error']['general'] = 'Database error. Please try again later.';
        }

        $stmt->bind_param('ss', $hashed_password, $email);

        if ($stmt->execute()) {
            $response['status'] = true;
            $response['message'] = 'Password updated successfully.';
        } else {
            $response['error']['general'] = 'Unable to update password. Please try again.';
        }
    }
}

echo json_encode($response);
