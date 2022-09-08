<?php
    include 'script/db_conn.php';

    $username=$_POST['username'];
    $userid=$_POST['userid'];

    $foodid=$_POST['foodid'];
    $foodname=$_POST['foodname'];

    $default_traits=$_POST['default_traits'];

    $rating=$_POST['scoreResult'];
    $contents=$_POST['contents'];
    $timestamp=$_POST['currTime'];
    $maxLen=$_POST['maxLen']+1;

    $trait = stripslashes(implode('|', $contents));
    $query1=stripslashes('select * from food where name='.'"'.$foodname.'"');

    $query2='insert into food(name) values('."'".$foodname."'".")";
    $query3='insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$foodid.','.$rating.',"'.$trait.'"'.')';

    $query5='insert into trait(id,korean,japanese,chinese,southeast_asian,south_asian,middle_eastern,western,african,latin_american,north_american,oceania,mediterranean,fried,sushi,grilled,soup,stir_fried,raw_food,stewed,stew,steamed,snack,bread,jelly,beverage)';
    $query5.=' values('.$foodid.','.$default_traits["korean"].','.$default_traits["japanese"].','.$default_traits["chinese"].','.$default_traits["southeast_asian"].','.$default_traits["south_asian"].',' .$default_traits["middle_eastern"].','.$default_traits["western"].','.$default_traits["african"].','.$default_traits["latin_american"].','.$default_traits["north_american"].',' .$default_traits["oceania"].','.$default_traits["mediterranean"].','.$default_traits["fried"].','.$default_traits["sushi"].','.$default_traits["grilled"].',' .$default_traits["soup"].','.$default_traits["stir_fried"].','.$default_traits["raw_food"].','.$default_traits["stewed"].','.$default_traits["stew"].',' .$default_traits["steamed"].','.$default_traits["snack"].','.$default_traits["bread"].','.$default_traits["jelly"].','.$default_traits["beverage"].')';
    $query5=stripslashes($query5);

    $query7= "SELECT * FROM food ORDER BY id desc LIMIT 1";

    $result = $conn->query($query1);

    try{
        if ($result->num_rows > 0) {
            $result = $conn->query($query3);
            $result = $conn->query($query5);
        } else {
            $result = $conn->query($query2);
            $result = $conn->query($query7);
            $res=$result->fetch_assoc();
            $id=$res['id'];
            $query4=stripslashes('insert into rating(userid, foodid, rating, trait) values ('.$userid.','.$id.','.$rating.',"'.$trait.'"'.')');
            $query6='insert into trait(id,korean,japanese,chinese,southeast_asian,south_asian,middle_eastern,western,african,latin_american,north_american,oceania,mediterranean,fried,sushi,grilled,soup,stir_fried,raw_food,stewed,stew,steamed,snack,bread,jelly,beverage)';
            $query6.=' values('.$id.','.$default_traits["korean"].','.$default_traits["japanese"].','.$default_traits["chinese"].','.$default_traits["southeast_asian"].','.$default_traits["south_asian"].',' .$default_traits["middle_eastern"].','.$default_traits["western"].','.$default_traits["african"].','.$default_traits["latin_american"].','.$default_traits["north_american"].',' .$default_traits["oceania"].','.$default_traits["mediterranean"].','.$default_traits["fried"].','.$default_traits["sushi"].','.$default_traits["grilled"].',' .$default_traits["soup"].','.$default_traits["stir_fried"].','.$default_traits["raw_food"].','.$default_traits["stewed"].','.$default_traits["stew"].',' .$default_traits["steamed"].','.$default_traits["snack"].','.$default_traits["bread"].','.$default_traits["jelly"].','.$default_traits["beverage"].')';
            $query6=stripslashes($query6);
            $result = $conn->query($query4);
            $result = $conn->query($query6);
        }
    }
    catch(Exception  $e){
        echo $e;
    }
    finally {
        $conn->close();
    }
?>