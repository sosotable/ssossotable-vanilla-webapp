<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rating main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    />
    <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <style>
        @font-face { /* 애플산돌고딕 폰트 적용 */
            font-family: "Jua";
            src: url("Jua-Regular.ttf") format("truetype");
            font-weight: normal;
        }
        html,
        body {
            font-family: Jua;
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .form-rating {
            width: 100%;
            padding: 15px;
            margin: auto;
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
        #add_trait {
            margin-top: 20px;
            width: 250px !important;
        }
        #commit_to_database {
            width: 250px !important;
            margin-top: 20px;
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
    </style>

    <script>
        let list_idx=0
        let list={}
        let flag=[false,false,false,false,false]
        const before_rate="font-variation-settings:\n" +
            "                    'FILL' 0,\n" +
            "                    'wght' 400,\n" +
            "                    'GRAD' 0,\n" +
            "                    'opsz' 48"
        const after_rate="font-variation-settings:\n" +
            "                    'FILL' 1,\n" +
            "                    'wght' 400,\n" +
            "                    'GRAD' 0,\n" +
            "                    'opsz' 48"
        const clear=()=>{
            let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
            for(let i=0;i<5;i++)
                target[i].style=before_rate
        }
        const set_rate=(idx)=>{
            let target = document.getElementById("rating").getElementsByClassName("material-symbols-outlined")
            console.log(target)
            for(let i=0;i<idx;i++)
                target[i].style=after_rate
        }
        const set=(idx)=>{
            clear()
            set_rate(idx)
        }

        const delete_trait=(idx)=>{
            let trait_list=document.getElementById('traits_list')
            delete list[idx]
            let list_content=''
            for(let key in list) {
                list_content+=list[key]
            }
            trait_list.innerHTML=list_content
        }
        const add_trait=()=>{
            let trait=document.getElementById('trait_name').value
            if(trait!=='') {
                document.getElementById('trait_name').value=''
                const format=
                    `
            <div class="trait_item" id="${trait}">
                <li>${trait}</li> <span class="material-symbols-outlined" onclick="delete_trait(${list_idx})">close</span> <br>
            </div>
            `
                list[list_idx]=format
                list_idx++
                let trait_list=document.getElementById('traits_list')
                let list_content=''
                for(let key in list) {
                    list_content+=list[key]
                }
                trait_list.innerHTML=list_content
            }

        }
    </script>
</head>
<body class="text-center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<main class="form-rating">
    <div id="food_rating_database">
        <div id="title">
            <h1>Food Rating System</h1>
        </div>
        <div id="food_name">
            <h3>Food Name</h3>
            <span class="material-symbols-outlined">cycle</span>
        </div>
        <div id="rating">
            <span class="material-symbols-outlined" onclick="set(1)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(2)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(3)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(4)">star_rate</span>
            <span class="material-symbols-outlined" onclick="set(5)">star_rate</span>
        </div>
        <div id="traits">
            <input type="text" id="trait_name">
            <br>
            <input type="button" id="add_trait" value="추가" class="w-100 btn btn-lg btn-primary" onclick="add_trait()">
            <ul id="traits_list">
            </ul>
            <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-primary">
        </div>
    </div>
</main>
