<?php
    $conn = new mysqli(
        "18.117.84.165",
        "ssossotable",
        "mysql7968!",
        "ssossotable_food"
    );

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username=$_POST['userName'];
    $userid=$_POST['userid'];
    $foodid=$_POST['foodName'];
    $foodName=$_POST['name'];
    $rating=$_POST['scoreResult'];
    $contents=$_POST['contents'];
    $timestamp=$_POST['currTime'];
    $maxLen=$_POST['maxLen']+1;

    $trait = stripslashes(implode('|', $contents));
    $query1=stripslashes('select * from food where name='.'"'.$foodName.'"');
    $query2='insert into food(name) values('."'".$foodName."'".")";
    $query3=stripslashes('insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$foodid.','.$rating.',"'.$trait.'"'.')');
    $query4=stripslashes('insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$maxLen.','.$rating.',"'.$trait.'"'.')');

    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
         $result = $conn->query($query3);
    } else {
        $result = $conn->query($query2);
        $result = $conn->query($query4);
    }

     echo 'done';
?>