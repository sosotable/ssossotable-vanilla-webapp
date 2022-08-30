<?php
include 'script/db_conn.php';

$foodname=$_POST['foodname'];

$query=stripslashes('select * from food where name='.'"'.$foodname.'"');

$result = $conn->query($query);

$foodid=0;


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $foodid=$row["id"];
    }
    echo $foodid;
}

$conn->close();
?>