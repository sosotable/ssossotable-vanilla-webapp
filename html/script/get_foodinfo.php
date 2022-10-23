<?php
    include 'modules/DAO.php';

    $cols='food.id, food.trait, food.image, food.name, rating.rating';
    $from='food,rating';
    $options=sprintf(
        'food.id=rating.foodid and rating.userid=%d and food.id=%d;',
        $_COOKIE['user_id'],
        $_POST['foodId']);

    $result=((DAO::factory())->select(
    $cols,
    $from,
    $options));

    echo json_encode($result->fetch_assoc(),JSON_UNESCAPED_UNICODE);

    (DAO::factory())->close();

?>