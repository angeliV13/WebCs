<?php
    require('../model/createAccount.php');

    // View Room Controller
    if(isset($_POST['createAccountDB'])){

        $accountFName = $_POST['accountFName'];
        $accountMName = $_POST['accountMName'];
        $accountLName = $_POST['accountLName'];
        $emailAddress = $_POST['emailAddress'];
        $employeeID   = $_POST['employeeID'];
        $emailAddress = $_POST['accountFName']; 
        $createPassword = $_POST['createPassword'];
        
        $createPassword = $_POST['createPassword'];
        $createAccount = createAccount($emailAddress, $createPassword);

        echo createAccount($emailAddress, $createPassword);

    }

?>