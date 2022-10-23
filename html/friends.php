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
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">

    <link href="./css/main/cover.css" rel="stylesheet">
    <link href="./css/friends.css" rel="stylesheet">

    <style>
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            #friend_layout {
                width: 400px !important;
                margin: auto !important;
            }
        }
        .btn-outline-success {
            color: #e4bd74;
            border-color: #e4bd74;
            border-top-color: #e4bd74;
            border-right-color: #e4bd74;
            border-bottom-color: #e4bd74;
            border-left-color: #e4bd74;
        }
        .btn-outline-success:hover {
            color: white;
            background-color: #e4bd74;
            border-color: #e4bd74;
        }
        .btn-outline-success.disabled, .btn-outline-success:disabled {
            color: #e4bd74;
            background-color: transparent;
        }
    </style>

    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <script type="text/javascript">

        let id= <?php echo $_COOKIE['user_id']?>

        let userIds=[]
        let friendInfo={}

        let friendAddInfo={}
        let friendId
        async function searchFriend() {
            let userInfo=document.getElementById("friendInputInfo").value
            let postJson={}


            postJson[0]=2
            postJson[1]='*'
            postJson[2]='user'
            postJson[3]=`(userid='${userInfo}' or nickname='${userInfo}') and id != ${id} and id not in (select friendid from user,friend where user.id=${id})`

            const friends_info=JSON.parse(await $.post("script/php/DAOHandler.php",postJson))

            if(friends_info.length!==0) {

                friendAddInfo.friendId=friends_info[0][1]
                friendId=friends_info[0][1]
                let format=`
                <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                    <div class="img-box" style="display: inline-block; margin: 0;">
                        <img class="friend-img" src="${friends_info[0][4]}" height="80" width="80">
                    </div>
                    <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                        <div class="d-flex justify-content-start fs-3" style="">
                            <span class="col-5">${friends_info[0][6]}</span>
                        </div>
                        <div id="add-friend-layout" class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0" onclick="add_friend()">
                            <input id="add-friend-button" type="button" class="btn col-6 btn-outline-success" value="친구 추가" >
                        </div>
                    </div>
                </div>
                `
                document.getElementById("friend-modal-body").innerHTML=format
            }
        }

        async function add_friend() {
            let postJson={}
            postJson[0]=2
            postJson[1]='*'
            postJson[2]='friend'
            postJson[3]=`userid=${id} and friendid=${friendId}`

            const search_res=JSON.parse(await $.post("script/php/DAOHandler.php",postJson))
            if(search_res.length>0) {
                alert('already friend')
            }
            else {
                postJson={}
                postJson[0]=1
                postJson[1]='friend(userid,friendid)'
                postJson[2]=`${id},${friendId}`
                await $.post("script/php/DAOHandler.php",postJson)
            }

            if(document.getElementById('add-friend-button').disabled===false) {
                document.getElementById('add-friend-button').disabled=true
                document.getElementById('add-friend-button').value="친구 추가됨"
            }
            else {
                document.getElementById('add-friend-button').disabled=false
                document.getElementById('add-friend-button').value="친구 추가"
            }

            location.reload()
        }
    </script>
    <script type="text/javascript" src="/script/friends.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <script>
        init()
    </script>

    <header class="masthead mb-auto">
        <div class="inner">
            <a href="http://ssossotable.com/rating.php"><h3 class="masthead-brand">소소식탁</h3></a>
        </div>
        <nav class="nav nav-masthead justify-content-center">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                <div class="form-inline my-2 my-lg-0 row" style="margin-right: 40px;">
                    <input id="friendInputInfo" class="form-control mr-sm-2 col" type="search" placeholder="코드 입력" aria-label="Search">
                    <input type="button" class="btn btn-outline-success my-2 my-sm-0 col p-0" value="친구 추가" onclick="searchFriend()" data-bs-toggle="modal" data-bs-target="#friendSearchModal">
                </div>
            </div>
        </nav>
    </header>

    <main role="main" class="inner cover" id="rating" style="margin-top: 20px;">
        <div class="p-3 bg-light" id="friend_layout">
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
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div id="modal-layout">
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

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></body>
</html>