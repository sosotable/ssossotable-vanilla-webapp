<!DOCTYPE html>
<html lang="en">
<?php
    include 'script/modules/CookieManager.php';
    (CookieManager::factory())->checkUserCookie();
?>
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('로그인');
    ?>
    
    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="http://ssossotable.com/css/index.css"/>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
    </script>
</head>
<body class="text-center">
    <main class="form-signin">
        <div class="box-logo">
            <img class="profile-logo" src="src/logo_full.png" alt="..."/>
        </div>
        <form action="/script/php/auth.php" method="post">
            <div class="form-floating">
                <input type="password" id="user_name" name="user_name" class="form-control" id="floatingInput" placeholder="password" autocomplete='off'>
                <label for="floatingInput">Auth Code</label>
            </div>
            <button class="w-100 btn btn-lg" type="submit" style="background-color:#e4bd74; color:white;">Check Auth</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022–2022 ssosso.table</p>
        </form>
    </main>
</body>
</html>