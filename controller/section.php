<?php
    require('../model/section.php');

    // View Section Controller
    if(isset($_POST['viewSectionDB'])){
        echo viewSection();
    }

    // Show GET Section Data Controller
    if(isset($_POST['showSectionEditDB'])){
        $sectionNum = $_POST['sectionNum'];
        echo getSectionNum($sectionNum);
    }

    
    // Add Section Controller
    if(isset($_POST['addSectionDB'])){
        $sectionName = $_POST['sectionName'];
        $secYearLevel = $_POST['sectionYearLevel'];
        $courseID = $_POST['sectionCourse'];

        echo addSection($secYearLevel, $sectionName, $courseID);
    }

    // Edit Section Controller
    if(isset($_POST['editSectionDB'])){
        $sectionNum = $_POST['sectionNum'];
        $sectionName = $_POST['sectionName'];
        $secYearLevel = $_POST['sectionYearLevel'];
        $courseID = $_POST['sectionCourse'];

        echo editSection($sectionNum, $secYearLevel , $sectionName, $courseID);
    }

    // Delete Data Controller
    if(isset($_POST['deleteSectionDB'])){
        $sectionNum = $_POST['sectionNum'];
        echo deleteSection($sectionNum);
    }


    // CHARTTTTTTTT

    
    if(isset($_POST['viewAllCreatedSchedAreaDB'])){
        echo json_encode(viewAllCreatedSchedAreaDB());
    }

    if(isset($_POST['viewAllRoomsPieDB'])){
        echo json_encode(viewAllCreatedSchedPieDB());
    }


?>