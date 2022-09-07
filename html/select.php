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
?>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/select.css">
    <script src="/script/select.js" type="text/javascript"></script>
    <script src="/script/meal.js" type="text/javascript"></script>
</head>
<body class="text-center">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<main class="form_food_option">
    <div class="item" id="title">
        <h1>Select Option</h1>
    </div>
    <div class="item" id="food_select_div">
        <a href="/main.php"><input type="button" value="음식 기록하기" id="food_select" class="btn btn-info"></a>
    </div>
    <div class="item" id="meal_select_div">
        <a href="/meal.php"><input type="button" value="한끼 기록하기" id="meal_select" class="btn btn-info"></a>
    </div>
</main>
</body>
</html>