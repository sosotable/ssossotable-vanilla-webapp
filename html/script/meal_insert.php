<?php

    include 'db_conn.php';

    $username=$_POST['username'];
    $userid=$_POST['userid'];
    $selected=$_POST['selected'];

    $score=$selected['score'];

    $foodName=$selected['what'];

    $when=$selected['when'];
    $when_name=$when['name'];

    $where=$selected['where'];
    $where_name=$where['name'];

    $who=$selected['who'];
    $who_name=$who['name'];

    $why=$selected['why'];
    $why_name=$why['name'];

    $query1=stripslashes('select * from food where name='.'"'.$foodName.'"');

    $result = $conn->query($query1);

    if ($result->num_rows > 0) {

        $q=$result->fetch_assoc();
        $foodid=$q['id'];
        $query4=stripslashes('insert into rating(userid, foodid, rating) values ('.$userid.','.$foodid.','.$score.')');
        $query5='insert into personal_trait(userid, foodid, rating, '.$when_name.','.$where_name.','.$who_name.','.$why_name.') values('.$userid.','.$foodid.','.$score.',true,true,true,true)';
        try{
            $result = $conn->query($query4);
            $result = $conn->query($query5);
        }
        catch(Exception  $e){
            echo $e->getMessage();
        }
    } else {
        $query2='insert into food(name) values('."'".$foodName."'".")";
        $result = $conn->query($query2);
        $result = $query1=stripslashes('select * from food where name='.'"'.$foodName.'"');
        $q=$result->fetch_assoc();
        $foodid=$q['id'];
        $query4=stripslashes('insert into rating(userid, foodid, rating) values ('.$userid.','.$foodid.','.$score.')');
        $query5='insert into personal_trait(userid, foodid, rating, '.$when_name.','.$where_name.','.$who_name.','.$why_name.') values('.$userid.','.$foodid.','.$score.',true,true,true,true)';
        try{
            $result = $conn->query($query4);
            $result = $conn->query($query5);
        }
        catch(Exception  $e){
            echo $e->getMessage();
        }
    }
?>