<?php
    include 'db_conn.php';
    $format='delete from food where id=%d';
    $query=sprintf($format,$_POST['foodId']);
    try {
        $conn->query($query);
    }
    catch (Exception $e) {
        echo $e;
    }
    finally {
    echo "done";
    }
?>