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

    <title>ssosso-table.food-db.insert</title>

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

    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">
    <link href="./css/main/cover.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="/css/insert.css">-->
    <style>
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            #default_traits span {
                font-size: 14px !important;
                font-weight: 150 !important;
                margin: 1px 1px 1px 1px !important;
            }
            #add_trait, #commit_to_database {
                width: 350px !important;
            }
        }
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
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
        .form-rating {
            width: 100%;#F5F4DD      padding: 15px;
            margin: auto;
        }
        #food_name_modify, #food_location_modify {
            width: 250px !important;
            margin: 1rem 0 1rem 0;
            display: inline-block;
        }
        #food_name_modify_button, #food_loaction_modify_button {
            width: 50px !important;
            height: 30px !important;
            font-size: 15px;
            padding: 0;
            margin: 1rem 0 1rem 0;
            display: inline-block;
        }
        #trait_name {
            width: 250px !important;
        }
        #traits_list {
            text-align: left;
            width: 300px !important;
            margin: auto;
            padding-top: 20px;
        }
        #add_trait, #commit_to_database{
            margin-top: 20px;
            width: 250px;
        }
        #rating .material-symbols-outlined {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 48
        }
        #traits ul .material-symbols-outlined {
            display: inline-block !important;
            vertical-align: middle;
        }
        #traits ul li {
            display: inline-block;
            vertical-align: middle;
            font-size: 24px;
            align-items: start;
        }
        #default_traits {
            margin: 10px 0 10px 0 !important;
            color: whitesmoke;
        }
        #default_traits span {
            font-size: 18px;
            font-weight: 200;
            margin: 2px 2px 2px 2px;
        }
        .btn {
            font-weight:100 !important;
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
    </style>

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <script>
        // 사용자 이름(String)
        let userName = <?php echo "'". $_COOKIE['user_name'] ."'"; ?>
        // 사용자 id(int)
        let userId= <?php echo $_COOKIE['user_id']; ?>

        // 음식 이름(String)
        let foodName = ""

        let score=0
        let list_idx=0
        let list={}
        let list_content={}

        let trait_count=0;
        let trait_predict=0;
        let trait_

        let trait_idx=[]
    </script>
    <script type="text/javascript" src="/script/insert.js"></script>
    <script type="text/javascript">
        let userProfile={}
        async function init() {

            userProfile.userId=<?php echo $_COOKIE['user_id']; ?>

            let info=await $.ajax({type: "GET", url: '/script/get_user_profile.php'})
            info=JSON.parse(info)
            let keys=Object.keys(info)

            for(let i=0; i < keys.length; i++) {
                userProfile[keys[i]]=info[keys[i]][userProfile.userId]
            }
        }
    </script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
    <script type="text/javascript">
        init()
    </script>
    <script type="text/javascript">
        window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
    </script>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                    <a class="nav-link text-muted" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
                    <a class="nav-link text-muted" href="http://ssossotable.com/record.php">식사 기록하기</a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: transparent;background-color: transparent;"></button>
                        <ul class="dropdown-menu" style="">
                            <li><a class="dropdown-item" href="http://ssossotable.com/myInfo.php">내 정보</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/friends.php">친구 목록</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/diary.php">다이어리</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/my-recipe.php">나만의 레시피북</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/insert.php">음식 추가하기(for dev)</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    <main role="main" class="inner cover" id="rating-main" style="margin-top: 20px;">
        <div id="food_rating_database">
            <div id="food_name_modify_div">
                <input type="text" placeholder="뭘 먹었나요?" id="food_name_modify">
                <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg" style="background-color:#e4bd74; color:white;" onclick="modify_foodname()">
            </div>
            <div id="food_name_div">
                <h3 id="food_name">Food Name</h3>
            </div>
            <div id="rating-predict">
                예상 점수: <span id="rating-predict-content"></span>
            </div>
            <div id="default_traits">
                <span class="badge rounded-pill " id="korean" onclick="add_trait('korean');" style="background-color:#F5F4DD; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">한국</span>
                <span class="badge rounded-pill " id="japanese" onclick="add_trait('japanese');" style="background-color:#EEE9CC; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">일본</span>
                <span class="badge rounded-pill " id="chinese" onclick="add_trait('chinese');" style="background-color:#F9E4B7; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">중국</span>
                <span class="badge rounded-pill " id="asian" onclick="add_trait('asian');" style="background-color:#EFE7DB; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">아시아</span>
                <span class="badge rounded-pill " id="western" onclick="add_trait('western');" style="background-color:#F2DAC9; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">양식</span>
                <br>
                <span class="badge rounded-pill " id="fried" onclick="add_trait('fried');" style="background-color:#F5F4DD; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">튀김</span>
                <span class="badge rounded-pill " id="raw" onclick="add_trait('raw');"style="background-color:#EEE9CC; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">생식/회</span>
                <span class="badge rounded-pill " id="grilled" onclick="add_trait('grilled');" style="background-color:#F9E4B7; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">구이</span>
                <span class="badge rounded-pill " id="soup" onclick="add_trait('soup');" style="background-color:#FFEAD8; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">국물</span>
                <span class="badge rounded-pill " id="stir_fried" onclick="add_trait('stir_fried');" style="background-color:#EFE7DB; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">볶음/비빔</span>
                <span class="badge rounded-pill " id="steamed" onclick="add_trait('steamed');" style="background-color:#F2DAC9; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">찜/조림</span>
                <br>
                <span class="badge rounded-pill " id="rice" onclick="add_trait('rice');" style="background-color:#F5F4DD; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">쌀</span>
                <span class="badge rounded-pill " id="wheat" onclick="add_trait('wheat');" style="background-color:#EEE9CC; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">밀/빵</span>
                <span class="badge rounded-pill " id="noodle" onclick="add_trait('noodle');" style="background-color:#F9E4B7; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">면</span>
                <span class="badge rounded-pill " id="seafood" onclick="add_trait('seafood');" style="background-color:#FFEAD8; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">해물</span>
                <span class="badge rounded-pill " id="meat" onclick="add_trait('meat');" style="background-color:#F2DAC9; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">육고기</span>
                <span class="badge rounded-pill " id="vegetable" onclick="add_trait('vegetable');" style="background-color:#F5F4DD; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">채소</span>
                <span class="badge rounded-pill " id="spice" onclick="add_trait('spice');" style="background-color:#EEE9CC; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">향신료</span>
                <br>
                <span class="badge rounded-pill " id="dessert" onclick="add_trait('dessert');" style="background-color:#F5F4DD; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">디저트</span>
                <span class="badge rounded-pill " id="beverage" onclick="add_trait('beverage');" style="background-color:#EEE9CC; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">음료</span>
                <span class="badge rounded-pill " id="sweetness" onclick="add_trait('sweetness');" style="background-color:#F9E4B7; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">단맛</span>
                <span class="badge rounded-pill " id="sour_taste" onclick="add_trait('sour_taste');" style="background-color:#FFEAD8; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">신맛</span>
                <span class="badge rounded-pill " id="spicy" onclick="add_trait('spicy');" style="background-color:#F2DAC9; color:white; text-shadow: -1px 0 #808080, 0 1px #808080, 1px 0 #808080, 0 -1px #808080;">매운맛</span>
                <br>
            </div>

            <div id="traits">
                <input type="text" placeholder="무슨 특성이 있나요?" id="trait_name">
                <br>
                <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg" style="background-color:#e4bd74; color:white;" onclick="add_trait(0)">
                <ul id="traits_list">
                </ul>
                <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg" style="background-color:#e4bd74; color:white;" onclick="commit()">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>