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
$sql = 'SELECT name FROM food where id=?';
$stmt=$conn->prepare($sql);
$stmt->bind_param("i", $foodId);
$stmt->execute();
$foodName=(($stmt->get_result())->fetch_assoc())['name'];

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

        let foodLocation=""

        // food 테이블의 총 길이(int)
        let len = <?php echo $len; ?>

        let score=0
        let list_idx=0
        let list={}
        let list_content={}

        function init() {
            console.log(len)
            document.getElementById('food_name').innerText=foodName
        }
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
            <input type="text" placeholder="뭘 먹었나요?" id="food_name_modify">
            <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg btn-info" onclick="modify_foodname()">
        </div>
        <div id="food_location_modify_div">
            <input type="text" placeholder="어디서 먹었나요?" id="food_location_modify">
            <input type="button" id="food_loaction_modify_button" value="입력" class="w-100 btn btn-lg btn-info" onclick="modify_location()">
        </div>
        <div id="food_name_div">
            <h3 id="food_name">Food Name</h3>
            <span class="material-symbols-outlined" onclick="recycle()">cycle</span>
            <span class="material-symbols-outlined" onclick="delete_food()">delete</span>
        </div>
        <div id="food_location_div">
            <h3 id="food_location">Food location</h3>
        </div>
        <div id="rating">
            <span class="material-symbols-outlined" onclick="set(1)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
            <span class="material-symbols-outlined" onclick="set(2)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
            <span class="material-symbols-outlined" onclick="set(3)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
            <span class="material-symbols-outlined" onclick="set(4)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
            <span class="material-symbols-outlined" onclick="set(5)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
        </div>
        <div id="default_traits">
            <span class="badge rounded-pill bg-primary" id="korean" onclick="add_trait('korean');">한국</span>
            <span class="badge rounded-pill bg-secondary" id="japanese" onclick="add_trait('japanese');">일본</span>
            <span class="badge rounded-pill bg-success" id="chinese" onclick="add_trait('chinese');">중국</span>
            <span class="badge rounded-pill bg-danger" id="asian" onclick="add_trait('asian');">아시아</span>
            <span class="badge rounded-pill bg-warning text-dark" id="western" onclick="add_trait('western');">양식</span>
            <br>
            <span class="badge rounded-pill bg-info text-dark" id="fried" onclick="add_trait('fried');">튀김</span>
            <span class="badge rounded-pill bg-light text-dark" id="sushi" onclick="add_trait('sushi');">회</span>
            <span class="badge rounded-pill bg-dark" id="grilled" onclick="add_trait('grilled');">구이</span>
            <span class="badge rounded-pill bg-primary" id="soup" onclick="add_trait('soup');">국</span>
            <span class="badge rounded-pill bg-secondary" id="stir_fried" onclick="add_trait('stir_fried');">볶음</span>
            <br>
            <span class="badge rounded-pill bg-success" id="stewed" onclick="add_trait('stewed');">조림</span>
            <span class="badge rounded-pill bg-danger" id="stew" onclick="add_trait('stew');">찌개</span>
            <span class="badge rounded-pill bg-warning text-dark" id="steamed" onclick="add_trait('steamed');">찜</span>
            <span class="badge rounded-pill bg-info text-dark" id="raw_food" onclick="add_trait('raw_food');">생식</span>
            <span class="badge rounded-pill bg-light text-dark" id="snack" onclick="add_trait('snack');">과자</span>
            <br>
            <span class="badge rounded-pill bg-dark" id="bread" onclick="add_trait('bread');">빵</span>
            <span class="badge rounded-pill bg-primary" id="jelly" onclick="add_trait('jelly');">젤리</span>
            <span class="badge rounded-pill bg-secondary" id="beverage" onclick="add_trait('beverage');">음료</span>
            <span class="badge rounded-pill bg-success" id="sweetness" onclick="add_trait('sweetness');">단맛</span>
            <span class="badge rounded-pill bg-danger" id="sour_taste" onclick="add_trait('sour_taste');">신맛</span>
            <br>
            <span class="badge rounded-pill bg-warning text-dark" id="spicy" onclick="add_trait('spicy');">매운맛</span>
            <span class="badge rounded-pill bg-info text-dark" id="noodle" onclick="add_trait('noodle');">면</span>
            <span class="badge rounded-pill bg-light text-dark" id="seafood" onclick="add_trait('seafood');">해물</span>
            <span class="badge rounded-pill bg-dark" id="meat" onclick="add_trait('meat');">육고기</span>
            <span class="badge rounded-pill bg-primary" id="vegetable" onclick="add_trait('vegetable');">채소</span>
        </div>

        <div id="traits">
            <input type="text" placeholder="무슨 특성이 있나요?" id="trait_name">
            <br>
            <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg btn-info" onclick="add_trait(0)">
            <ul id="traits_list">
            </ul>
            <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-info" onclick="commit()">
        </div>
    </div>
    <script>
        init()
    </script>
</main>