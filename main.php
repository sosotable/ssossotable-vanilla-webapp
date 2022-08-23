<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_COOKIE['user_pw'])) {
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    exit;
}
$conn = new mysqli(
    "18.117.84.165",
    "ssossotable",
    "mysql7968!",
    "ssossotable_food"
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT count(*) as cnt FROM food";
mt_srand(time());
$result = $conn->query($sql);
$len=0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $len=$row["cnt"];
    }
}
$randNum = mt_rand(1, $len);

$foodName='foodname';
$sql = "SELECT name FROM food where id="."'".$randNum."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $foodName=$row["name"];
    }
}

$conn->close();
?>

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
        #food_name_modify {
            width: 250px !important;
            margin: 2rem 0 2rem 0;
            display: inline-block;
        }
        #food_name_modify_button {
            width: 50px !important;
            height: 30px !important;
            font-size: 15px;
            padding: 0;
            margin: 2rem 0 2rem 0;
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
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script>
        const user = <?php echo "'". $_COOKIE['user_pw'] ."'"; ?>

        const randNum = <?php echo $randNum ?>

        let foodName = <?php echo "'".$foodName."'"; ?>

        let len = <?php echo $len; ?>

        let userId= <?php echo $_COOKIE['user_id']; ?>

        let score=0
        let list_idx=0
        let list={}
        let list_content={}
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
            score=idx
        }

        const delete_trait=(idx)=>{
            let trait_list=document.getElementById('traits_list')
            delete list[idx]
            delete list_content[idx]
            let list_items=''
            for(let key in list) {
                list_items+=list[key]
            }
            trait_list.innerHTML=list_items
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
                list_content[list_idx]=trait
                list_idx++
                let trait_list=document.getElementById('traits_list')
                let list_items=''
                for(let key in list) {
                    list_items+=list[key]
                }
                trait_list.innerHTML=list_items
            }
        }
        const modify_foodname=()=>{
            foodName=document.getElementById('food_name_modify').value
            document.getElementById('food_name').innerText=foodName

        }
        const recycle=()=>{
            location.reload()
        }
        const commit=()=>{
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {
                    name: foodName,
                    contents: list_content,
                    scoreResult:score,
                    userName:user,
                    userid:userId,
                    foodName:randNum,
                    currTime:Date.now(),
                    maxLen:len
                }
            })
                .done((data)=>{
                    console.log(data)
                    location.reload()
                    //$('#name').text(data);
                })
                .fail( (err) => {
                    console.log('err',JSON.stringify(err))
                });
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
        <div id="food_name_modify_div">
            <input type="text" id="food_name_modify">
            <input type="button" id="food_name_modify_button" value="입력" class="w-100 btn btn-lg btn-primary" onclick="modify_foodname()">
        </div>
        <div id="food_name_div">
            <h3 id="food_name">Food Name</h3>
            <span class="material-symbols-outlined" onclick="recycle()">cycle</span>
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
            <input type="button" id="commit_to_database"value="commit to database" class="w-100 btn btn-lg btn-primary" onclick="commit()">
        </div>
    </div>
    <script>
        const init=()=>{
            document.getElementById('food_name').innerText=foodName
        }
        init()
    </script>
</main>