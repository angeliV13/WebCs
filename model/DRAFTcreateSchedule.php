<?php
    // Viewing room
    // GET SUBJECTS
    function getSubjects($create=false, $acadYear, $semester, $courseArray){
        include('dbConnection.php');

        foreach($courseArray as $year){
            $generate = "";
            $subjectData = [];
            if($year[0] == 1){
                // IF CREATE SCHEDULE IS ACTIVE...
                if($create == true){

                    $sectionNumber = $year[1];
                    $section = 1;

                    while($sectionNumber >= $section){
                        // Creating Section Name
                        $sectionName = $year[2] . $semester . ((strlen($section)==2)? $section : "0" . $section);
                        
                        $course = $year[3];
                        
                        // Executing Subject Query
                        $query = "SELECT * FROM tbl_subject 
                                    WHERE semester = '" . $semester . "'AND yearLevel = '". $year[2] . "'AND courseID = '". $course ."'"; //QUERY CODE
                        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
                        
                        while ($row = mysqli_fetch_assoc($sql))
                        {
                            // Extract Data from the QUERY
                            extract($row);
                            
                            // WHERE EXTRACTED DATA WILL BE STORED
                            $subjectData [] = [
                                $subNum,
                                $subComlab,
                                $subLab,
                                $subLec,
                                $subType,
                                $subUnit,
                                $yearLevel,
                                $semester,
                            ];
                            // End Extraction


                            // -------------------------------START TO CHECK THE SCHEDULE AVAILABILITY------------------------------
                            do{
                                // Check if schedule Exist
                                $checkSched = scheduleChecker($subComlab, $subNum, $sectionName, $acadYear, $semester);

                                // Comlab Checker
                                $comlab = ($subComlab == 1)? 1 : 0;

                                // IF NO SCHEDULE IN THE PARTICULAR SUBJECT
                                if($checkSched == 0){
                                    $rooms = checkRooms($subComlab, $subLab, $subLec, $acadYear, $semester);
                                    
                                    // IF ROOM IS AVAILABLE
                                    if($rooms[0] == 0){
                                        $faculty = checkFaculty($subType, $acadYear, $semester);

                                        // IF FACULTY IS AVAILABLE
                                        if($faculty[0] == 0){
                                            // Preparing Insertion
                                            $hours = ($subComlab == 1)? $subLab : $subLec; 
                                            $day = 1;
                                            $time = 7;
                                            $total_time = $time + $hours;

                                            $generate = insertSchedule($rooms, $faculty, $subNum, $day, $time, $total_time, $course, $sectionName, $acadYear, $semester);
                                            
                                            if($comlab==1){
                                                $subComlab = 0;
                                            }
                                        }

                                    }
                                }
                            }
                            while($comlab==1);
                           
                        }  
                        // Increment the Section
                        $section+=1;
                    }
                }              
            }
        }
        return $generate;
    }

    function insertSchedule($rooms, $faculty, $subNum, $day, $time, $total_time, $course, $sectionName, $acadYear, $semester){
        include('dbConnection.php');
        
        $query = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`) 
                    VALUES ('0','". $faculty[2] ."','". $rooms[2] ."','". $subNum ."','". $time ."-". $total_time . "','". $day ."','". $course ."','". $sectionName ."','". $semester ."','". $acadYear ."')"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        if($sql){
            return ("SUCCESS");
        }
        else{
            return("ERROR");
        }
        
    }

    
    //  Check Rooms FROM Database
    function checkRooms($subComlab=0, $subLab, $subLec, $acadYear, $semester){

        include('dbConnection.php');
        // Getting Rooms needed
        $showEligibleRooms = getRooms($subComlab);
        $roomData = [];

        // Check if the room is in use
        foreach($showEligibleRooms as $roomValue){
            $query = "SELECT * FROM `tbl_schedule` 
                    WHERE `schedRoomID` = '" . $roomValue[0] . "' 
                    AND `schedSemID` = '" . $semester . "'
                    AND `schedAYID` = '". $acadYear . "'";  //QUERY CODE
            $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

            // IF THE ROOM IS NOT FREE AND HAS A VALUE
            if(mysqli_num_rows($sql) > 0){
                while ($row = mysqli_fetch_assoc($sql))
                {
                    // Extract Data from the QUERY
                    extract($row);

                    // WHERE EXTRACTED DATA WILL BE STORED
                    $roomData [] = [
                        $schedDay,
                        $schedTime,
                        $schedRoomID,
                        $schedFacID
                    ];
                    // End Extraction
                }
                return $roomData[0];
            }

            // IF THE ROOM IS FREE AND DOES NOT HAVE A VALUE
            else{
                $roomData [] = [
                    0, //Sched Day
                    0, // Sched Time
                    $roomValue[0],
                    "NA"
                ];
                
                return $roomData[0];
            }
        }
    }

    //  Check Faculty FROM Database
    function checkFaculty($subType=0, $acadYear, $semester){
        include('dbConnection.php');
        // Getting Rooms needed
        $showEligibleFaculty = getFaculty($subType);
        $facultyData = [];

        // Check if the room is in use
        foreach($showEligibleFaculty as $facultyValue){
            $query = "SELECT * FROM `tbl_schedule` 
                    WHERE `schedFacID` = '" . $facultyValue[0] . "' 
                    AND `schedSemID` = '" . $semester . "'
                    AND `schedAYID` = '". $acadYear . "'";  //QUERY CODE
            $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

            // IF THE ROOM IS NOT FREE AND HAS A VALUE
            if(mysqli_num_rows($sql) > 0){
                while ($row = mysqli_fetch_assoc($sql))
                {
                    // Extract Data from the QUERY
                    extract($row);

                    // WHERE EXTRACTED DATA WILL BE STORED
                    $facultyData [] = [
                        $schedDay,
                        $schedTime,
                        $schedRoomID,
                        $schedFacID
                    ];
                    // End Extraction
                }
                return $facultyData[0];
            }

            // IF THE ROOM IS FREE AND DOES NOT HAVE A VALUE
            else{
                $facultyData [] = [
                    0, //Sched Day
                    0, // Sched Time
                    $facultyValue[0],
                    "N/A"
                ];
                
                return $facultyData[0];
            }
        }
        return $facultyData;
    }

    //  GET Rooms FROM Database
    function getRooms($subComlab=0){
        include('dbConnection.php');

        $query = "SELECT * FROM `tbl_room`"; 
        
        if($subComlab==0){
            $query .= " WHERE roomType = 1"; 
        }
        else{
            $query .= " WHERE roomType = 2"; 
        }
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        while ($row = mysqli_fetch_assoc($sql))
        {
            // Extract Data from the QUERY
            extract($row);
            
            // WHERE EXTRACTED DATA WILL BE STORED
            $roomData [] = [
                $roomNum,
                $roomType,
                $roomAvail              
            ];
        }

        return $roomData;
    }


     //  GET Faculty FROM Database
     function getFaculty($subType=0){

        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_faculty` WHERE `facTeach` = '" . $subType . "'"; 

        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        while ($row = mysqli_fetch_assoc($sql))
        {
            // Extract Data from the QUERY
            extract($row);
            
            // WHERE EXTRACTED DATA WILL BE STORED
            $facultyData [] = [ 
                $facNum,
                $facID,
                $facAvailability,
                $facTeach,
                $facType
            ];
        }

        return $facultyData;
    }


    // Schedule Checker
    function scheduleChecker($subComlab, $subNum, $sectionName, $acadYear, $semester){
        include('dbConnection.php');

        $query = "SELECT * FROM `tbl_schedule` 
                    WHERE `schedSubNum` = '" . $subNum . "' 
                    AND `schedSemID` = '" . $semester . "'
                    AND `schedAYID` = '". $acadYear . "'
                    AND `schedSecNum` = '". $sectionName ."'";  //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        if(mysqli_num_rows($sql) > 0){
            if($subComlab==0){
                return 0;
            }
            else{
                return 1;
            }
        }
        else{
            return 0;
        }
    }



    

    


    
?>
