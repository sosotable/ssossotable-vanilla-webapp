<?php
if(!isset($_POST['user_name'])) exit;
$user_name = $_POST['user_name'];
$user_id=0;

include 'db_conn.php';

$sql = "SELECT * FROM user where userid="."'".$user_name."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user_id=$row["id"];
        echo "id: " . $row["id"];
    }
} else {
    echo $user_name;
    echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
    exit;
}

setcookie('user_name',$user_name,time()+(180),'/');
setcookie('user_id',$user_id,time()+180,'/');
$conn->close();
?>
<meta http-equiv='refresh' content='0;url=../main.php'>