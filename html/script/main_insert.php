<?php
    include 'db_conn.php';

    $stmt=null;

    $username=$_POST['username'];
    $userid=$_POST['userid'];

    $foodid=$_POST['foodid'];
    $foodname=$_POST['foodname'];

    $location=$_POST['foodLocation'];

    $default_traits=$_POST['default_traits'];

    $rating=$_POST['scoreResult'];
    $contents=$_POST['contents'];

    $trait = stripslashes(implode('|', $contents));
    $query1='select * from food where name=?';
    $query2='insert into food(name) values(?)';
    $query3='insert into rating(userid, foodid, rating, trait, location) values (?,?,?,?,?)';
    $query5='insert into trait(id,korean,japanese,chinese,asian,western,fried,sushi,grilled,soup,stir_fried,raw_food,stewed,stew,steamed,snack,bread,jelly,beverage,sweetness,sour_taste,spicy,noodle,seafood,meat,vegetable)';
    $query5.=' values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $query7= "SELECT * FROM food ORDER BY id desc LIMIT 1";

    $stmt = $conn->prepare($query1);
    $stmt->bind_param("s", $foodname);
    $stmt->execute();
    $result=$stmt->get_result();

    try{
        if ($result->num_rows > 0) {
            $id=($result->fetch_assoc())['id'];
            $stmt = $conn->prepare($query3);
            $stmt->bind_param("iidss", $userid, $id, $rating, $trait, $location);
            $stmt->execute();

            $stmt = $conn->prepare($query5);
            $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiiiii",
                $id,
                $default_traits['korean'], $default_traits['japanese'], $default_traits['chinese'], $default_traits['asian'], $default_traits['western'],
                $default_traits['fried'], $default_traits['sushi'], $default_traits['grilled'], $default_traits['soup'], $default_traits['stir_fried'],
                $default_traits['raw_food'], $default_traits['stewed'], $default_traits['stew'], $default_traits['steamed'], $default_traits['snack'],
                $default_traits['bread'], $default_traits['jelly'], $default_traits['beverage'], $default_traits['sweetness'], $default_traits['sour_taste'],
                $default_traits['spicy'], $default_traits['noodle'], $default_traits['seafood'], $default_traits['meat'], $default_traits['vegetable']
            );
            $stmt->execute();
        } else {
            $stmt = $conn->prepare($query2);
            $stmt->bind_param("s", $foodname);
            $stmt->execute();

            $result = $conn->query($query7);
            $id=($result->fetch_assoc())['id'];

            $stmt = $conn->prepare($query3);
            $stmt->bind_param("iidss", $userid, $id, $rating, $trait, $location);
            $stmt->execute();

            $stmt = $conn->prepare($query5);
            $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiiiii",
                $id,
                $default_traits['korean'], $default_traits['japanese'], $default_traits['chinese'], $default_traits['asian'], $default_traits['western'],
                $default_traits['fried'], $default_traits['sushi'], $default_traits['grilled'], $default_traits['soup'], $default_traits['stir_fried'],
                $default_traits['raw_food'], $default_traits['stewed'], $default_traits['stew'], $default_traits['steamed'], $default_traits['snack'],
                $default_traits['bread'], $default_traits['jelly'], $default_traits['beverage'], $default_traits['sweetness'], $default_traits['sour_taste'],
                $default_traits['spicy'], $default_traits['noodle'], $default_traits['seafood'], $default_traits['meat'], $default_traits['vegetable']
            );
            $stmt->execute();
        }
    }
    catch(Exception  $e){
        echo $e;
    }
    finally {
        $conn->close();
    }
?>