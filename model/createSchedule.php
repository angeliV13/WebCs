<?php

    function acadYear(){
        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_acadyear`"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        $acadYearData = array();
        if(mysqli_num_rows($sql)>0){ 
            
            while($row = mysqli_fetch_assoc($sql)){

                $acadYearData[] = $row;
            }
            return ($acadYearData);
        }
    }
    
    function semester(){
        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_semester`"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        $semesterData = array();
        if(mysqli_num_rows($sql)>0){ 
            
            while($row = mysqli_fetch_assoc($sql)){

                $semesterData[] = $row;
            }
            return ($semesterData);
        }
    }

    function section(){
        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_section`"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        $sectionData = array();
        if(mysqli_num_rows($sql)>0){ 
            
            while($row = mysqli_fetch_assoc($sql)){

                $sectionData[] = $row;
            }
            return ($sectionData);
        }
    }
?>
