<?php
    require('../model/faculty.php');

    // View Room Controller
    if(isset($_POST['viewFacultyDB'])){
        echo viewFaculty();
    }

    // Show GET Room Data Controller
    if(isset($_POST['showFacultyEditDB'])){
        $facNum = $_POST['facNum'];
        echo getfacNum($facNum);
    }

    // Add faculty Controller
    if(isset($_POST['addFacultyDB'])){
        $facID = $_POST['facID'];
        $facFName = $_POST['facFName'];
        $facMName = $_POST['facMName'];
        $facLName = $_POST['facLName'];
        $facAvailability = $_POST['facAvailability'];
        echo addFaculty($facID , $facFName, $facMName, $facLName, $facAvailability);
    }

    // Edit faculty Controller
    if(isset($_POST['editFacultyDB'])){
        $facNum = $_POST['facNum'];
        // var_dump($facID);
        $facID = $_POST['facID'];
                // var_dump($facID);
        $facFName = $_POST['facFName'];
        $facMName = $_POST['facMName'];
        $facLName = $_POST['facLName'];
        $facAvailability = $_POST['facAvailability'];
        echo editFaculty($facNum, $facID , $facFName, $facMName, $facLName, $facAvailability);
        // echo "test";
    }

    // Delete Data Controller
    if(isset($_POST['deleteFacultyDB'])){
        $facNum = $_POST['facNum'];
        echo deleteFaculty($facNum);
    }


?>