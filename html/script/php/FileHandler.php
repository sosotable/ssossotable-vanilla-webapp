<?php

$filePath=$_POST['filePath'];

$image_file = $_FILES['image'];

$tmp_file = $_FILES['image']['tmp_name'];

// Exit if no file uploaded
if (!isset($image_file)) {
    die('No file uploaded.');
}

// Exit if image file is zero bytes
if (filesize($image_file["tmp_name"]) <= 0) {
    die('Uploaded file has no contents.');
}

// Exit if is not a valid image file
$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
    die('Uploaded file is not an image.');
}

$r = move_uploaded_file($image_file["tmp_name"], $filePath);
?>