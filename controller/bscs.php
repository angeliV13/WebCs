<?php
    require('../model/bscs.php');

    // View Subject Controller
    if(isset($_POST['viewCsSubjectDB'])){
        echo viewBscsSubjectDB();
    }

    // Show GET Subject Data Controller
    if(isset($_POST['showCsEditDB'])){
        $subNum = $_POST['subNum'];
        echo getSubNum($subNum);
    }

    // Add Subject Controller
    if(isset($_POST['addCsSubjectDB'])){
        // $subNum = $_POST['subNum'];
        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $subLec = $_POST['subLec'];
        $subLab = $_POST['subLab'];
        $subUnit = $_POST['subUnit'];
        $courseID = $_POST['courseID'];
        $semester = $_POST['semester'];
        $yearLevel = $_POST['yearLevel'];

        echo addSubject($courseCode, $courseName, $subLec, $subLab, $subUnit, $courseID, $semester, $yearLevel);
    }

    // Edit Subject Controller
    if(isset($_POST['editCsSubjectDB'])){

        $subNum = $_POST['subNum'];
        $courseCode = $_POST['courseCode'];
        $courseName = $_POST['courseName'];
        $subLec = $_POST['subLec'];
        $subLab = $_POST['subLab'];
        $subUnit = $_POST['subUnit'];
        $courseID = $_POST['courseID'];
        $semester = $_POST['semester'];
        $yearLevel = $_POST['yearLevel'];
        echo editSubject($subNum,$courseCode, $courseName, $subLec, $subLab, $subUnit, $courseID, $semester, $yearLevel);
    }
    // Delete Data Controller
    if(isset($_POST['deleteSubjectDB'])){
        $subNum = $_POST['subNum'];
        echo deleteSubject($subNum);
    }

?>