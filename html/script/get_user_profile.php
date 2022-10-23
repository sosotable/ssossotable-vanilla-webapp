<?php
    $arr = json_decode(file_get_contents('/var/www/html/script/python/user_profile.json'), true);
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>