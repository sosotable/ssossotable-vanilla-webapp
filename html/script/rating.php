<?php
    include 'db_conn.php';

    $query1='select * from food';
    $result=$conn->query($query1);
    echo json_encode($result->fetch_all(), JSON_UNESCAPED_UNICODE);
?>