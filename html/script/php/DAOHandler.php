<?php
include '../modules/DAOAdapter.php';
try {
    if(count($_FILES)==0) {
        echo (DAOAdapter::factory())->execute($_POST);
    }

}
catch (Exception $e) {
    echo $e;
}
finally {
    (DAOAdapter::factory())->close();
}
?>