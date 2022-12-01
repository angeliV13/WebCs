<?php
    require('../model/createSchedule.php');

    //create schedule Controller
    if(isset($_POST['createScheduleDB'])){
        $acadYear = $_POST['acadYear'];
        $semester = $_POST['semester'];
        
        // Numbers
        $itFirst = $_POST['itFirst'];
        $itSecond = $_POST['itSecond'];
        $itBAThird = $_POST['itBAThird'];
        $itNTThird = $_POST['itNTThird'];
        $itSMThird = $_POST['itSMThird'];
        $itBAFourth = $_POST['itBAFourth'];
        $itNTFourth = $_POST['itNTFourth'];
        $itSMFourth = $_POST['itSMFourth'];
        $csFirst = $_POST['csFirst'];
        $csSecond = $_POST['csSecond'];
        $csThird = $_POST['csThird'];
        $csFourth = $_POST['csFourth'];


        // IT Value per year checker
        $firstItVal = ($itFirst!='')? 1 : 0;
        $secondItVal = ($itSecond!='')? 1 : 0;

        // IT THIRD YEAR MAJOR Value per year checker
        $thirdItBAVal = ($itBAThird!='')? 1 : 0;
        $thirdItNTVal = ($itNTThird!='')? 1 : 0;
        $thirdItSMVal = ($itSMThird!='')? 1 : 0;

        // IT FOURTH YEAR MAJOR Value per year checker
        $fourthItBATVal = ($itBAFourth!='')? 1 : 0;
        $fourthItNTTVal = ($itNTFourth!='')? 1 : 0;
        $fourthItSMTVal = ($itSMFourth!='')? 1 : 0;

        // CS Value per year checker
        $firstCsVal = ($csFirst!='')? 1 : 0;
        $secondCsVal = ($csSecond!='')? 1 : 0;
        $thirdCsVal = ($csThird!='')? 1 : 0;
        $fourthCsVal = ($csFourth!='')? 1 : 0;

        //Course ARRAY
        $courseArray = array(
            array($firstItVal, $itFirst, 1 , "BSIT"),
            array($secondItVal, $itSecond, 2 ,"BSIT"),

            array($thirdItBAVal, $itBAThird,3, "BSIT - BA"),
            array($thirdItNTVal, $itNTThird,3,"BSIT - NT"),
            array($thirdItSMVal, $thirdItSMVal,3, "BSIT - SM"),

            array($fourthItBATVal, $itBAFourth,4, "BSIT - BA"),
            array($fourthItNTTVal, $itNTFourth,4, "BSIT - NT"),
            array($fourthItSMTVal, $itSMFourth,4, "BSIT - SM"),

            array($firstCsVal, $csFirst,1, "BSCS"),
            array($secondCsVal, $csSecond,2, "BSCS"),
            array($thirdCsVal, $csThird,3, "BSCS"),
            array($fourthCsVal, $csFourth,4, "BSCS"),
        );

        $create = true;

        // $rooms = getRooms();
        // $faculty = getFaculty();
        $subjects = getSubjects($create, $acadYear, $semester, $courseArray);
        
        
        echo $subjects;
        // echo json_encode($courseArray);
    }

    // // Show GET year level Data Controller
    // if(isset($_POST['showEditDB'])){
    //     $yearLevel = $_POST['acadYear'];
    //     echo getYearLevel($yearLevel);
    // }

    // // Add Room Controller
    // if(isset($_POST['addDB'])){
    //     $yearLevel = $_POST['yearLevel'];
    //     echo addRoom($roomName , $roomLoc, $roomType);
    // }

    // // Edit Room Controller
    // if(isset($_POST['editRoomDB'])){
    //     $roomNum = $_POST['roomNum'];
    //     $roomName = $_POST['roomName'];
    //     $roomLoc = $_POST['roomLoc'];
    //     $roomType = $_POST['roomType'];

    //     echo editRoom($roomNum, $roomName , $roomLoc, $roomType);
    // }

    // // Delete Data Controller
    // if(isset($_POST['deleteDB'])){
    //     $roomNum = $_POST['roomNum'];
    //     echo deleteRoom($roomNum);
    // }

    


?>