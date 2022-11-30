<?php
include '../modules/JSONParser.php';
try {
    echo (JSONParser::factory())->parse($_POST['path']);
}
catch (Exception $e) {
    echo $e;
}
?>