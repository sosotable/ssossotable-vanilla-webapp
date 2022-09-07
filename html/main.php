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
        let userName = <?php echo "'". $_COOKIE['user_name'] ."'"; ?>
        // 사용자 id(int)
        let userId= <?php echo $_COOKIE['user_id']; ?>

        // 음식 이름(String)
        let foodName = <?php echo "'".$foodName."'"; ?>
        // 음식 아이디(int)
        let foodId = <?php echo $foodId ?>

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
            <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg btn-info" onclick="modify_foodname()">
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
        <div id="default_traits">
            <span class="badge rounded-pill bg-primary" id="korean" onclick="add_trait('korean');">한국</span>
            <span class="badge rounded-pill bg-secondary" id="japanese" onclick="add_trait('japanese');">일본</span>
            <span class="badge rounded-pill bg-success" id="chinese" onclick="add_trait('chinese');">중국</span>
            <span class="badge rounded-pill bg-danger" id="southeast_asian" onclick="add_trait('southeast_asian');">동남아시아</span>
            <span class="badge rounded-pill bg-warning text-dark" id="south_asian" onclick="add_trait('south_asian');">남아시아</span>
            <br>
            <span class="badge rounded-pill bg-info text-dark" id="middle_eastern" onclick="add_trait('middle_eastern');">중동</span>
            <span class="badge rounded-pill bg-light text-dark" id="western" onclick="add_trait('western');">서양</span>
            <span class="badge rounded-pill bg-dark" id="african" onclick="add_trait('african');">아프리카</span>
            <span class="badge rounded-pill bg-primary" id="latin_american" onclick="add_trait('latin_american');">라틴아메리카</span>
            <span class="badge rounded-pill bg-secondary" id="north_american" onclick="add_trait('north_american');">북아메리카</span>
            <br>
            <span class="badge rounded-pill bg-success" id="oceania" onclick="add_trait('oceania');">오세아니아</span>
            <span class="badge rounded-pill bg-danger" id="mediterranean" onclick="add_trait('mediterranean');">지중해</span>
            <span class="badge rounded-pill bg-warning text-dark" id="fried" onclick="add_trait('fried');">튀김</span>
            <span class="badge rounded-pill bg-info text-dark" id="sushi" onclick="add_trait('sushi');">회</span>
            <span class="badge rounded-pill bg-light text-dark" id="grilled" onclick="add_trait('grilled');">구이</span>
            <br>
            <span class="badge rounded-pill bg-dark" id="soup" onclick="add_trait('soup');">국</span>
            <span class="badge rounded-pill bg-primary" id="stir_fried" onclick="add_trait('stir_fried');">볶음</span>
            <span class="badge rounded-pill bg-secondary" id="raw_food" onclick="add_trait('raw_food');">생식</span>
            <span class="badge rounded-pill bg-success" id="stewed" onclick="add_trait('stewed');">조림</span>
            <span class="badge rounded-pill bg-danger" id="stew" onclick="add_trait('stew');">찌개</span>
            <br>
            <span class="badge rounded-pill bg-warning text-dark" id="steamed" onclick="add_trait('steamed');">찜</span>
            <span class="badge rounded-pill bg-info text-dark" id="snack" onclick="add_trait('snack');">과자</span>
            <span class="badge rounded-pill bg-light text-dark" id="bread" onclick="add_trait('bread');">빵</span>
            <span class="badge rounded-pill bg-dark" id="jelly" onclick="add_trait('jelly');">젤리</span>
            <span class="badge rounded-pill bg-primary" id="beverage" onclick="add_trait('beverage');">음료수</span>
        </div>

        <div id="traits">
            <input type="text" id="trait_name">
            <br>
            <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg btn-info" onclick="add_trait(0)">
            <ul id="traits_list">
            </ul>
            <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-info" onclick="commit()">
        </div>
    </div>
    <script>
        const init=()=>{
            console.log(len)
            document.getElementById('food_name').innerText=foodName
        }
        init()
    </script>
</main>