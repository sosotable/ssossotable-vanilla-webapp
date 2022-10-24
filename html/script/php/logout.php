<?php
setcookie('user_id', '', time()-3600, '/');
setcookie('user_name', '', time()-3600, '/');
setcookie('user_nickname', '', time()-3600, '/');
echo "<meta http-equiv='refresh' content='0;url=../../index.php'>"
?>