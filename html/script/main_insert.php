<?php
    include 'db_conn.php';

    $stmt=null;

    $username=$_POST['username'];
    $userid=$_POST['userid'];

    $foodname=$_POST['foodname'];
    $default_traits=$_POST['default_traits'];

    $rating=$_POST['scoreResult'];
    $contents=$_POST['contents'];

    $trait = stripslashes(implode('|', $contents));

    $query1='select * from food where name=?';
    $query2='insert into food(name) values(?)';
    $query3='insert into rating(userid, foodid, rating, trait) values (?,?,?,?)';
    $query5='insert into trait(id,korean,japanese,chinese,asian,western,fried,raw,grilled,soup,stir_fried,steamed,wheat,dessert,beverage,sweetness,sour_taste,spicy,noodle,seafood,meat,vegetable,rice,spice)';
    $query5.=' values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
    $query7= "SELECT * FROM food ORDER BY id desc LIMIT 1";

    $stmt = $conn->prepare($query1);
    $stmt->bind_param("s", $foodname);
    $stmt->execute();
    $result=$stmt->get_result();

    $korean=$default_traits['korean'];
    try{
        if ($result->num_rows > 0) {
            $id=($result->fetch_assoc())['id'];
            $stmt = $conn->prepare($query3);
            $stmt->bind_param("iids", $userid, $id, $rating, $trait);
            $stmt->execute();

            $stmt = $conn->prepare($query5);
            $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiii",
                $id,
                $korean, $default_traits['japanese'], $default_traits['chinese'], $default_traits['asian'], $default_traits['western'],
                $default_traits['fried'], $default_traits['raw'], $default_traits['grilled'], $default_traits['soup'], $default_traits['stir_fried'],
                $default_traits['steamed'], $default_traits['wheat'], $default_traits['dessert'], $default_traits['beverage'], $default_traits['sweetness'], $default_traits['sour_taste'],
                $default_traits['spicy'], $default_traits['noodle'], $default_traits['seafood'], $default_traits['meat'], $default_traits['vegetable'],
                $default_traits['rice'], $default_traits['spice']
            );
            $stmt->execute();
        } else {
            $stmt = $conn->prepare($query2);
            $stmt->bind_param("s", $foodname);
            $stmt->execute();

            $result = $conn->query($query7);
            $id=($result->fetch_assoc())['id'];

            $stmt = $conn->prepare($query3);
            $stmt->bind_param("iids", $userid, $id, $rating, $trait);
            $stmt->execute();

            $stmt = $conn->prepare($query5);
            $stmt->bind_param("iiiiiiiiiiiiiiiiiiiiiiii",
                $id,
                $korean, $default_traits['japanese'], $default_traits['chinese'], $default_traits['asian'], $default_traits['western'],
                $default_traits['fried'], $default_traits['raw'], $default_traits['grilled'], $default_traits['soup'], $default_traits['stir_fried'],
                $default_traits['steamed'], $default_traits['wheat'], $default_traits['dessert'], $default_traits['beverage'], $default_traits['sweetness'], $default_traits['sour_taste'],
                $default_traits['spicy'], $default_traits['noodle'], $default_traits['seafood'], $default_traits['meat'], $default_traits['vegetable'],
                $default_traits['rice'], $default_traits['spice']
            );
            $stmt->execute();
        }
        echo 'true';
        setcookie('user_name',$_COOKIE['user_name'],time()+(180),'/');
        setcookie('user_id',$_COOKIE['user_id'],time()+180,'/');
    }
    catch (mysqli_sql_exception $e) {
        echo 'false';
    }
    catch(Exception  $e){
        echo $e;
    }
    finally {
        $conn->close();
    }
?>