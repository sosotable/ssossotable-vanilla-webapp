<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_COOKIE['user_pw'])) {
    $user_pw = $_COOKIE['user_pw'];
    echo "<meta http-equiv='refresh' content='0;url=main.php'>";
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="text-center">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<main class="form-signin">
    <form action="auth.php" method="post">
        <h3 class="h3 mb-3 fw-normal">Food Rating Auth</h3>

        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="password">
            <label for="floatingInput">Auth Code</label>
        </div>

<!--        <div class="checkbox mb-3">-->
<!--            <label>-->
<!--                <input type="checkbox" value="remember-me"> Remember me-->
<!--            </label>-->
<!--        </div>-->
        <button class="w-100 btn btn-lg btn-primary" type="submit">Check Auth</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022–2022 ssossotable</p>
    </form>
</main>
</body>
</html>