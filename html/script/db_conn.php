<?php

include "db_info.php";

$conn = new mysqli(
    $hostname,
    $username,
    $password,
    $database
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>