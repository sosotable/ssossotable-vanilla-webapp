<!DOCTYPE html>
<html lang="en">
<?php

include 'script/db_conn.php';

$sql = "SELECT * FROM food ORDER BY id desc LIMIT 1";

$result = $conn->query($sql);

$res=$result->fetch_assoc();

print_r($res['id']);

$conn->close();
?>