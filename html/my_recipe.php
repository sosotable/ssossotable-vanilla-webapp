<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('나만의 레시피북');
    ?>

    <style type="text/css">
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link href="./css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/my_recipe.css">


    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        let recipeInfos=null
        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;

        const userId=<?php echo $_COOKIE['user_id']; ?>

        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag=true;
            } else {
                // 데스크탑
                flag=false
            }
        });
    </script>
    <script type="text/javascript" src="script/javascript/my_recipe.js"></script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <?php (LayoutHandler::factory())->createHeader(); ?>

    <main role="main" class="inner cover d-flex" id="rating" style="margin-top: 20px;">
        <div id="recipe-list-layout" class="card" style="width: 30%!important;">
            <ul id="recipe-list" class="list-group list-group-flush">
            </ul>
        </div>
        <div id="mobile-recipe" class="card" style="display: none!important; width: 100%!important;">
            <div>
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-ssosseji p-4">
                        <ul id="recipe-list-mobile" class="list-group" style="max-height: 200px; overflow-y: auto">
                        </ul>
                    </div>
                </div>

                <nav class="navbar navbar-dark bg-ssosseji">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <div id="food-rating-database">
                    <div class="card" style="width: 500px;">
                        <div class="d-flex justify-content-center">
                            <div id="preview"><img src="src/food_placeholder.png" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>
                            <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                        </div>
                        <div class="mb-3">
                            <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">음식명</label></h5>
                        </div>
                        <div class="mb-3">
                            <p id="recipe-memo" class="card-text">좋은 음식은 사람을 행복하게 하는 음식.</p>
                        </div>
                        <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">
                        </ul>
                        <br>
                    </div>
                </div>
            </div>

        </div>
        <div class="card" id='my-recipe-info' style="width: 100% height: 100%">
            <div class="d-flex justify-content-center">
                <div id="preview"><img src="src/food_placeholder.png" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>
                <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
            </div>
            <div class="mb-3">
                <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">음식명</label></h5>
            </div>
            <div class="mb-3">
                <p id="recipe-memo" class="card-text">좋은 음식은 사람을 행복하게 하는 음식.</p>
            </div>
            <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">
            </ul>
            <br>
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