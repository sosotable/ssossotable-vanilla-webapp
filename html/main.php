<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_COOKIE['user_name'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
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
$foodId = mt_rand(1, $len);

$foodName='foodname';
$sql = "SELECT name FROM food where id="."'".$foodId."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $foodName=$row["name"];
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
    <link rel="stylesheet" href="/css/main.css">
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script>
        // 사용자 이름(String)
        const userName = <?php echo "'". $_COOKIE['user_name'] ."'"; ?>
        // 사용자 id(int)
        const userId= <?php echo $_COOKIE['user_id']; ?>

        // 음식 이름(String)
        let foodName = <?php echo "'".$foodName."'"; ?>
        // 음식 아이디(int)
        const foodId = <?php echo $foodId ?>

        // food 테이블의 총 길이(int)
        let len = <?php echo $len; ?>

        let score=0
        let list_idx=0
        let list={}
        let list_content={}
        let flag=[false,false,false,false,false]

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
    </script>
    <script src="/script/main.js"></script>
</head>
<body class="text-center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<main class="form-rating">
    <div id="food_rating_database">
        <div id="title">
            <h1>Food Rating System</h1>
        </div>
        <div id="food_name_modify_div">
            <input type="text" id="food_name_modify">
            <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg btn-primary" onclick="modify_foodname()">
        </div>
        <div id="food_name_div">
            <h3 id="food_name">Food Name</h3>
            <span class="material-symbols-outlined" onclick="recycle()">cycle</span>
        </div>
        <div id="rating">
            <span class="material-symbols-outlined" onclick="set(1)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(2)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(3)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(4)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(5)">star_rate</span>
        </div>
        <div id="traits">
            <input type="text" id="trait_name">
            <br>
            <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg btn-primary" onclick="add_trait()">
            <ul id="traits_list">
            </ul>
            <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-primary" onclick="commit()">
        </div>
    </div>
    <script>
        const init=()=>{
            document.getElementById('food_name').innerText=foodName
        }
        init()
    </script>
</main>