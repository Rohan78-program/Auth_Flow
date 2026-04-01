<?php
require 'connection/connect.php';

$uploadDir = 'uploads/';

// Get photos from database
$usedPhotos = [];
$result = $conn->query("SELECT photo FROM user WHERE photo IS NOT NULL AND photo != ''");
while ($row = $result->fetch_assoc()) {
    $usedPhotos[] = $row['photo'];
}

// Get all files in uploads folder
$allFiles = array_diff(scandir($uploadDir), ['.', '..']);

foreach ($allFiles as $file) {
    if (!in_array($file, $usedPhotos)) {
        $filePath = $uploadDir . $file;
        if (is_file($filePath)) {
            unlink($filePath);
            echo "Deleted orphan file: $file\n";
        }
    }
}

$conn->close();
