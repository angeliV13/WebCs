<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $database = "db_classschedule";
    $port = 3306;

    // Create Connection
    $conn =  mysqli_connect($dbHost, $dbUser, $dbPass,$database);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    }
    
?>