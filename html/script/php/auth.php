<?php
    try {
        include '../modules/DAO.php';
        include '../modules/CookieManager.php';

        if(!isset($_POST['user_name'])) exit;
        $result = ((DAO::factory())->select(
                "*",
                "user",
                sprintf("userid='%s'",$_POST['user_name'])
                ));
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            (CookieManager::factory())->setCookie(
                $row["id"],
                $_POST['user_name'],
                $row['nickname']);
            echo "200 OK";
        } else {
            echo "<script>alert('아이디 또는 패스워드가 잘못되었습니다.');history.back();</script>";
            exit;
        }
    }
    catch (Exception $e) {
        echo $e;
    }
    finally {
        (DAO::factory())->close();
    }
?>
<meta http-equiv='refresh' content='0;url=../../rating.php'>