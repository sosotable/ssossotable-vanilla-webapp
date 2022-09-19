<?php
    include 'db_conn.php';

    $query='insert into record(userid,rating,what,`where`,`when`,who,why) values (?,?,?,?,?,?,?)';


    try {
        $stmt = $conn->prepare($query);
        $stmt->bind_param("idsssss",
            $_POST['userId'],
            $_POST['rating'],
            $_POST['what'],$_POST['where'],$_POST['when'],$_POST['who'],$_POST['why']);
        $stmt->execute();
        echo "success";
    }
    catch (Exception $e) {
        echo $e;
    }
    finally {
        $conn->close();
    }
?>