<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_COOKIE['user_name'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
else {
    setcookie('user_name',$_COOKIE['user_name'],time()+(180),'/');
    setcookie('user_id',$_COOKIE['user_id'],time()+180,'/');
}

include 'script/db_conn.php';

$sql = "SELECT count(*) as cnt FROM food";
mt_srand(time());
$result = $conn->query($sql);
$len=0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $len=$row["cnt"];
    }
}

$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <title>Rating main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link rel="stylesheet" href="/css/meal.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script>
        const before_rate="font-variation-settings:\n" +
            "                    'FILL' 0,\n" +
            "                    'wght' 400,\n" +
            "                    'GRAD' 0,\n" +
            "                    'opsz' 48"
        const after_rate="font-variation-settings:\n" +
            "                    'FILL' 1,\n" +
            "                    'wght' 400,\n" +
            "                    'GRAD' 0,\n" +
            "                    'opsz' 48"
        // 사용자 이름(String)
        let userName = <?php echo "'". $_COOKIE['user_name'] ."'"; ?>
        // 사용자 id(int)
        let userId= <?php echo $_COOKIE['user_id']; ?>
        // food 테이블의 총 길이(int)
        let len = <?php echo $len; ?>

        let score=0

    </script>
    <script src="/script/meal.js"></script>
</head>
<body class="text-center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <main class="form-meal" id="card-view">
        <div class="card" style="width: 18rem;" id="what">
            <img src="/src/what.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">오늘 뭘 먹었나요?</p>
            </div>
            <div id="rating">
                <span class="material-symbols-outlined" onclick="set(1)">star_rate</span>
                <span class="material-symbols-outlined" onclick="set(2)">star_rate</span>
                <span class="material-symbols-outlined" onclick="set(3)">star_rate</span>
                <span class="material-symbols-outlined" onclick="set(4)">star_rate</span>
                <span class="material-symbols-outlined" onclick="set(5)">star_rate</span>
            </div>
            <input type="text" placeholder="음식 입력" id="foodName" autocomplete='off' onchange="setWhat();">
            <div class="card-body" id="hrefId">
                <div class="href">
                    <div></div>
                    <img src="/src/arrow_forward.png" alt="." style="width:42px;height:42px;" onclick="setOption(1)">
                </div>
            </div>
        </div>
    </main>
</body>