<?php
    require('../model/createSchedule.php');

    // Dropdowns
    if(isset($_POST['scheduleCreateSelection'])){
        $myArray = [];
        $getSemester = [];
        $getAcadYear = [];
        $getSection = [];

        $getAcadYear = acadYear();
        $getSemester = semester();
        $getSection = section();
        $getInstructor = instructor();
        $getRooming = rooming();

        $myArray = [
            $getAcadYear,
            $getSemester,
            $getSection,
            $getInstructor,
            $getRooming,
        ];
        echo json_encode($myArray);
    }

    // Get Data
    if(isset($_POST['getDataDB'])){
        $myData = [];
        $section = $_POST['getSection'];
        $semester = $_POST['getSemester'];
        $acadYear = $_POST['getAcadYear'];

        $rooms = getRooms("",0);
        $faculty = getFaculty();
        $subject = getSubjects($section, $semester, $acadYear);

        $myData = [$rooms, $faculty, $subject];
        // var_dump($myData);
        echo (json_encode($myData));
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
        $numItems = $_POST['numItems'];

        $availableRooms = checkAvailableRoom($courseCode, $courseDelivery, $hours, $getSemester, $getAcadYear, $roomNum);
        $availableFaculty = checkAvailableFaculty($availableRooms, $courseCode, $hours, $getSemester, $getAcadYear, $roomNum, $facNum);

        echo $availableFaculty;
    }

?>