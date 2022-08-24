<?php
    include 'script/db_conn.php';


//username:userName,
//userid:userId,
//
//foodname:foodName,
//foodid:foodId,
//
//contents: list_content,
//scoreResult:score,
//
//currTime:Date.now(),
//maxLen:len

    $username=$_POST['username'];
    $userid=$_POST['userid'];

    $foodid=$_POST['foodid'];
    $foodname=$_POST['foodname'];

    $rating=$_POST['scoreResult'];
    $contents=$_POST['contents'];
    $timestamp=$_POST['currTime'];
    $maxLen=$_POST['maxLen']+1;

    $trait = stripslashes(implode('|', $contents));
    $query1=stripslashes('select * from food where name='.'"'.$foodname.'"');
    $query2='insert into food(name) values('."'".$foodname."'".")";
    $query3=stripslashes('insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$foodid.','.$rating.',"'.$trait.'"'.')');
    $query4=stripslashes('insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$maxLen.','.$rating.',"'.$trait.'"'.')');

    $result = $conn->query($query1);

    if ($result->num_rows > 0) {
         $result = $conn->query($query3);
    } else {
        $result = $conn->query($query2);
        $result = $conn->query($query4);
    }

    $conn->close();
    echo 'done';
?>