<!DOCTYPE html>
<html lang="en">
<?php
    /**쿠키값 확인**/
    if(isset($_COOKIE['user_name'])) {
        $user_name = $_COOKIE['user_name'];
        echo "<meta http-equiv='refresh' content='0;url=rating.php'>";
        exit;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ssosso.table.u">
    <meta name="generator" content="ssosso.table food-db 0.1.0">
    <link rel="icon" href="src/favicon.ico">
    <title>ssosso-table.food-db.signin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link href="./css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <style>
        .box-logo {
            width: 300px;
            height: 300px;
            border-radius: 20%;
            overflow: hidden;
            margin: auto auto 30px auto;
        }
        .profile-logo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script type="text/javascript">
    </script>
</head>
<body class="text-center">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <main class="form-signin">
        <div class="box-logo">
            <img class="profile-logo" src="src/logo_full.png" width="300" height="300"/>
        </div>

        <form action="/script/php/auth.php" method="post">

            <div class="form-floating">
                <input type="password" id="user_name" name="user_name" class="form-control" id="floatingInput" placeholder="password" autocomplete='off'>
                <label for="floatingInput">Auth Code</label>
            </div>
            <button class="w-100 btn btn-lg" type="submit" style="background-color:#e4bd74; color:white;">Check Auth</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022–2022 ssosso.table</p>
        </form>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>