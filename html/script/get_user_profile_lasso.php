<?php
$arr = json_decode(file_get_contents('/var/www/html/database/user_profile_lasso.json'), true);
echo json_encode($arr, JSON_UNESCAPED_UNICODE);
?>