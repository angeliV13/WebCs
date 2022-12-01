<?php
    require('../model/createSchedule.php');

    if(isset($_POST['scheduleCreate'])){
        $myArray = [];
        $getSemester = [];
        $getAcadYear = [];
        $getSection = [];

        $getAcadYear = acadYear();
        $getSemester = semester();
        $getSection = section();

        $myArray = [
            $getAcadYear,
            $getSemester,
            $getSection
        ];
        echo json_encode($myArray);
    }

    // if

?>