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
        <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

        <title>ssosso-table.food-db.rating</title>

        <link rel="canonical" href="http://ssossotable.com">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <link href="./css/main/cover.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/rating.css">

        <style type="text/css">
            /* iPhone4와 같은 높은 해상도 가로 */
            @media only screen and (max-width : 640px) {
                #scroll_layout {
                    width: 300px !important;
                }
                .food-image img {
                    width: 40px!important;
                    height: 40px!important;
                }
                .fs-3 {
                     font-size: 14px !important;
                }
                .food-rating img {
                    width: 15px!important;
                    height: 30px!important;
                }
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script type="text/javascript">
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
            <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                <div style="display: inline-block; margin: auto;" class="food-image">
                    <img src="/src/loading.gif" height="90" width="90">
                </div>
            </div>
            `
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

        </script>
        <script type="text/javascript" src="/script/rating.js"></script>
    </head>

    <body class="text-center vsc-initialized" cz-shortcut-listen="true">
        <script type="text/javascript">
            window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
        </script>
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <a href="http://ssossotable.com/rating.php"><h3 class="masthead-brand">소소식탁</h3></a>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                    <a class="nav-link text-muted" href="http://ssossotable.com/insert.php">음식 추가하기</a>
                    <a class="nav-link text-muted" href="http://ssossotable.com/record.php">식사 기록하기</a>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: transparent;background-color: transparent;"></button>
                        <ul class="dropdown-menu" style="">
                            <li><a class="dropdown-item" href="http://ssossotable.com/myInfo.php">내 정보</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/friends.php">친구 목록</a></li>
                            <li><a class="dropdown-item" href="http://ssossotable.com/diary.php">다이어리</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover" id="rating" style="margin-top: 20px;">
            <script>
                let lock=false
                init()
                $(async function () {

                    // $('#scroll_layout').scroll(async function (event) {
                    //
                    //     console.log(event)
                    //     var scrT = $('#scroll_layout').scrollTop();
                    //     console.log(scrT); //스크롤 값 확인용
                    //     console.log($(document).height())
                    //     console.log($('#scroll_layout').height())
                    //     console.log($('#scroll_layout').prop('scrollHeight'))
                    //     if((scrT + $(document).height() > $('#scroll_layout').prop('scrollHeight'))){
                    //         console.log('bottom')
                    //         $('html, #scroll_layout').animate({
                    //             scrollTop: 0
                    //         }, 1000);
                    //         // $("#scroll_layout").scrollTop(0);
                    //
                    //         refresh()
                    //         $(this).off(event);
                    //         //스크롤이 끝에 도달했을때 실행될 이벤트
                    //     } else {
                    //         // console.log('ntop')
                    //         //아닐때 이벤트
                    //     }
                    //     if(scrT===0) {
                    //         $(this).on(event);
                    //     }
                    // });


                    $('#scroll_layout').scroll(function() {
                        if($('#scroll_layout').scrollTop() + $('main').height() === $('#scroll_layout').prop('scrollHeight')) {
                            $('html, #scroll_layout').animate({
                                scrollTop: 0
                            }, 1000);
                            refresh()
                        }
                    });
                })
            </script>
            <div class="p-3 bg-light" id="scroll_layout">

            </div>
            <script>
                document.getElementById('scroll_layout').innerHTML=rating_placeHolder
            </script>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>