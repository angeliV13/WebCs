<?php
    require('../model/schedule.php');

    if(isset($_POST['checkDB'])){
        echo viewSched();
    }

?>