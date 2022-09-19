<?php

    include 'db_conn.php';

    $foodId=$_POST['foodId'];
    $foodName=$_POST['foodName'];
    $rating=$_POST['rating'];
    $userId=$_POST['userId'];

    $query1='select * from rating where userid=? and foodid=?';
    $stmt = $conn->prepare($query1);
    $stmt->bind_param("ii", $userId, $foodId);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0) {
        $query_update_rating='update rating set rating=? where userid=? and foodid=?';
        $stmt = $conn->prepare($query_update_rating);
        $stmt->bind_param("iid", $rating, $userId, $foodId);
        $stmt->execute();
        print_r("update rate");
    }
    else {
        $query_insert_new='insert into rating(userid,foodid,rating) values (?,?,?)';
        $stmt = $conn->prepare($query_insert_new);
        $stmt->bind_param("iid", $userId, $foodId, $rating);
        $stmt->execute();
        print_r("insert new");
    }
    $conn->close();
?>