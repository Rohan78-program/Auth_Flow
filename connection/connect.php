<?php

$conn = new mysqli("localhost:3308", "root", "Roh!1052", "auth_flow");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
