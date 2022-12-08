<?php
    require('../model/login.php');

    // View Room Controller
    if(isset($_POST['loginAccountDB'])){

        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        $accountDetail = accountLogin($userName, $userPassword);

        echo ($accountDetail);

    }

?>