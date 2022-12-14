<?php
    require('../model/viewSchedule.php');

    // // Dropdowns
    // if(isset($_POST['scheduleCreateSelection'])){
    //     $myArray = [];
    //     $getSemester = [];
    //     $getAcadYear = [];
    //     $getSection = [];

    //     $getAcadYear = acadYear();
    //     $getSemester = semester();
    //     $getSection = section();

    //     $myArray = [
    //         $getAcadYear,
    //         $getSemester,
    //         $getSection
    //     ];
    //     echo json_encode($myArray);
    // }

    // Get Schedule per Section
    if(isset($_POST['getScheduleDB'])){
        $section = $_POST['getSection'];
        $semester = $_POST['getSemester'];
        $acadYear = $_POST['getAcadYear'];
        
        $scheduleArray = getSchedule($section, $semester, $acadYear);

        echo (json_encode($scheduleArray));
    }

    // Get Subjects
    if(isset($_POST['getSubjectDB'])){
        $section = $_POST['getSection'];
        $semester = $_POST['getSemester'];
        $acadYear = $_POST['getAcadYear'];
        $courseCode = "";

        $subjectArray = getSubjects($section, $semester, $acadYear, $courseCode);

        echo (json_encode($subjectArray));
    }
    
    // Check Available Room for Subject
    if(isset($_POST['checkAvailRoom'])){
        $courseCode = $_POST['courseCode'];
        $courseDelivery = $_POST['courseDelivery'];
        $hours = $_POST['hours'];
        $getSemester  = $_POST['getSemester'];
        $getAcadYear  = $_POST['getAcadYear'];

        $availableRooms = checkAvailableRoom($courseCode, $courseDelivery, $hours, $getSemester, $getAcadYear);
        echo $availableRooms;
    }

    // Check Available Faculty for Subject
    if(isset($_POST['checkAvailFac'])){
        $courseCode = $_POST['courseCode'];
        $courseDelivery = $_POST['courseDelivery'];
        $hours = $_POST['hours'];
        $getSemester  = $_POST['getSemester'];
        $getAcadYear  = $_POST['getAcadYear'];
        $roomNum = $_POST['roomNum'];
        $facNum = (isset($_POST['facNum']))? $_POST['facNum'] : "";

        $availableRooms = checkAvailableRoom($courseCode, $courseDelivery, $hours, $getSemester, $getAcadYear, $roomNum);
        $availableFaculty = checkAvailableFaculty($availableRooms, $courseCode, $hours, $getSemester, $getAcadYear, $roomNum, $facNum);
        echo $availableFaculty;
    }

?>