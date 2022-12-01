<?php
    require('../model/faculty.php');

    // View Room Controller
    if(isset($_POST['viewFacultyDB'])){
        echo viewFaculty();
    }

    // Show GET Room Data Controller
    if(isset($_POST['showFacultyEditDB'])){
        $facNum = $_POST['facNum'];
        echo getFacNum($facNum);
    }

    // Add faculty Controller
    if(isset($_POST['addFacultyDB'])){
        $facID = $_POST['facID'];
        $facFName = $_POST['facFName'];
        $facMName = $_POST['facMName'];
        $facLName = $_POST['facLName'];
        $facAvailability = $_POST['facLAvailability'];
        echo addFaculty($facNum, $facID , $facFName, $facMName, $facLName, $facAvailability);
    }

    // Edit faculty Controller
    if(isset($_POST['editFacultyDB'])){
        $facID = $_POST['facID'];
        $facFName = $_POST['facFName'];
        $facMName = $_POST['facMName'];
        $facLName = $_POST['facLName'];
        $facAvailability = $_POST['facLAvailability'];

        echo editFaculty($facNum, $facID , $facFName, $facMName, $facLName,  $facAvailability);
    }

    // Delete Data Controller
    if(isset($_POST['deleteFacultyDB'])){
        echo deleteFaculty($facNum);
    }


?>