<?php
if(!isset($_POST['password'])) exit;
$user_pw = $_POST['password'];
$user_id=0;

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
$sql = "SELECT * FROM user where userid="."'".$user_pw."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $user_id=$row["id"];
        echo "id: " . $row["id"];
    }
} else {
    echo $user_pw;
    echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
    exit;
}
setcookie('user_pw',$user_pw,time()+(180),'/');
setcookie('user_id',$user_id,time()+180,'/');
$conn->close();
?>
<meta http-equiv='refresh' content='0;url=main.php'>