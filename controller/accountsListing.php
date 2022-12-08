<?php
    require('../model/accountsListing.php');

    // View Room Controller
    if(isset($_POST['viewAccountAccountListingDB'])){
        echo viewAccountAccountsListing();
    }

    // Show GET Room Data Controller
    if(isset($_POST['showAccountAccountsListingEditDB'])){
        $accountNum = $_POST['accountNum'];
        echo getAccountNum($accountNum);
    }

    // Add faculty Controller
    if(isset($_POST['addAccountAccountsListingDB'])){
        $accountFName = $_POST['accountFName'];
        $accountMName = $_POST['accountMName'];
        $accountLName = $_POST['accountLName'];
        $accountID = $_POST['accountID'];
        $emailAddress = $_POST['emailAddress'];
        $position  = $_POST['position'];
        

        echo addAccountAccountsListing($accountFName, $accountMName, $accountLName, $accountID, $emailAddress, $position);
    }

    // Edit faculty Controller
    if(isset($_POST['editAccountAccountsListingDB'])){
        $accountNum = $_POST['accountNum'];
        $accountFName = $_POST['accountFName'];
        $accountMName = $_POST['accountMName'];
        $accountLName = $_POST['accountLName'];
        $accountID = $_POST['accountID'];;
        $emailAddress = $_POST['emailAddress'];
        $position  = $_POST['position'];

        echo editAccountAccountsListing($accountNum, $accountFName, $accountMName, $accountLName, $accountID, $emailAddress, $position);
        
    }

    // Delete Data Controller
    if(isset($_POST['deleteAccountAccountsListingDB'])){
        $accountNum = $_POST['accountNum'];
        echo deleteAccountAccountsListing($accountNum);
    }


?>