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
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">
    <title>ssosso-table.food-db.signin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/main/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
</head>
<body class="text-center">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <main class="form-signin">
        <form action="/script/auth.php" method="post">
            <h3 class="h3 mb-3 fw-normal">Food Rating Auth</h3>

            <div class="form-floating">
                <input type="password" name="user_name" class="form-control" id="floatingInput" placeholder="password" autocomplete='off'>
                <label for="floatingInput">Auth Code</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Check Auth</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022–2022 ssossotable</p>
        </form>
    </main>
</body>
</html>