<?php
// 
if($any_name = $_POST['any_name'] ){

    //database 연동
    include '../db.php';

    //sql 작성
    $sql = "select item_name from 테이블 where 컬럼명 = '$any_name' ";
    $result = mysqli_query($conn, $sql);

    // 빈 배열 $array[]에 $row['item_name'] 넣어주기
    while($row = mysqli_fetch_assoc($result)){
        $array[] = $row['item_name'];
    }

    // json 객체로 변환하여 echo
    echo json_encode($array, JSON_UNESCAPED_UNICODE);


}else{
    echo ""; // 만약 선택하지 않았을 때 반환하는 값 : null
}
?>