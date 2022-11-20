<?php
    require('../model/schedule.php');

    if(isset($_POST['checkDB'])){
        $check = check();
        echo $check;



    }

?>