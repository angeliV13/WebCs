<?php
    require('../model/account.php');

    if(isset($_POST['checkDB'])){
        echo viewAccount();
    }
    

?>