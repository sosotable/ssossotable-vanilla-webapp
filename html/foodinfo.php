<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ssosso.table.u">
    <meta name="generator" content="ssosso.table food-db 0.1.0">
    <link rel="icon" href="src/favicon.png">

    <title>ssosso-table.food-db.record</title>

    <link rel="canonical" href="http://ssossotable.com">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">
    <link href="./css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/record.css">

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="/script/meal.js" type="text/javascript"></script>
    <script>

        let foodId= <?php echo $_POST['foodid'] ?>


        let foodInfo={}
        function getScore() {
            switch (parseInt(arguments[0])) {
                case 0:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 1:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 2:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 3:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 4:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 5: return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 6: return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 7: return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 8: return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">`
                case 9: return `
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">
            <img src="/src/rate_star_after_half-left.png" height="50" width="25"><img src="/src/rate_star_after_half-right.png" height="50" width="25">`
                default:
                    break
            }
        }
        async function init() {
            foodInfo=JSON.parse(await $.ajax({
                url: "/script/get_foodinfo.php",
                method: "POST",
                data: { foodId:foodId }}))

            document.getElementById("food-name").innerText=foodInfo.name
            document.getElementById('food-traits').innerText=String(foodInfo.trait)
            document.getElementById('rating').innerHTML=getScore(foodInfo.rating)
        }
    </script>

    <script src="/script/foodinfo.js" type="text/javascript"></script>


</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<script>
    init()
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                <a class="nav-link text-muted" href="http://ssossotable.com/insert.php">음식 추가하기</a>
                <a class="nav-link active" href="http://ssossotable.com/record.php">식사 기록하기</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: transparent;background-color: transparent;"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="http://ssossotable.com/myInfo.php">내 정보</a></li>
                        <li><a class="dropdown-item" href="http://ssossotable.com/friends.php">친구 목록</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <img src="/src/Portrait_Placeholder.png" height="240px" width="240px"/>
                <h5 class="card-title" id="food-name">음식 이름</h5>
                <p class="card-text" id="food-traits">특성 목록</p>
            </div>
            <div id="rating" style="margin-bottom: 50px;">
                <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
                <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
                <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
                <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
                <img src="/src/rate_star_before_half-left.png" height="50" width="25"><img src="/src/rate_star_before_half-right.png" height="50" width="25">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html>