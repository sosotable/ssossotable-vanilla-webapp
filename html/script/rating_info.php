<?php
include 'db_conn.php';

$query1='select food.id, name, image, userid, rating from food,rating where food.id=rating.foodid and userid="'.$_POST['userId'].'";';
$result=$conn->query($query1);
echo json_encode($result->fetch_all(), JSON_UNESCAPED_UNICODE);

?>