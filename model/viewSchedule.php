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

    function getSchedule($section, $semester, $acadYear){
        include('dbConnection.php');
        $subjectData = [];

        // Executing Subject Query
        $query = "SELECT * FROM `tbl_schedule`
                    WHERE schedSemID = '" . $semester . "' AND schedAYID = '". $acadYear . "' AND secNum = '". $section ."'"; //QUERY CODE
        // var_dump($query);

        
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        while ($row = mysqli_fetch_assoc($sql))
        {
            // Extract Data from the QUERY
            // extract($row);
            
            // WHERE EXTRACTED DATA WILL BE STORED
            $subjectData[] = $row;
            // [
            //     $subNum,
            //     $subComlab,
            //     $subLab,
            //     $subLec,
            //     $subType,
            //     $subUnit,
            //     $yearLevel,
            //     $semester,
            // ];
            // End Extraction
            
        }  
        // Increment the Section
        return ($subjectData);
    }

    function getCourse($condition, $choice= 0){
        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_section` "; //QUERY CODE

        if($choice == 1){
            $query .= "WHERE secNum = '". $condition ."'";
        }

        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        $sectionData = array();
        if(mysqli_num_rows($sql)>0){ 
            
            while($row = mysqli_fetch_assoc($sql)){

                $sectionData = $row;
            }
            return ($sectionData);
        }
    }

    function getRooms($subComlab, $getOnlyRoom=0){
        include('dbConnection.php');

        $query = "SELECT * FROM `tbl_room`"; 
        
        if($subComlab=="lab"){
            $query .= " WHERE roomType = 2"; 
        }
        else if($getOnlyRoom>0){
            $query .= " WHERE roomNum = '"+ $getOnlyRoom +"'"; 
        }
        else{
            $query .= " WHERE roomType = 1"; 
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
                $roomAvail,
                $roomName,
                $roomLocation             
            ];
        }

        return $roomData;
    }


     //  GET Faculty FROM Database
     function getFaculty($subType=0, $faceNum = ""){

        include('dbConnection.php');
        $query = "SELECT * FROM `tbl_faculty` WHERE `facTeach` = '" . $subType . "'";
        if($faceNum!=""){
            $query .= "AND `facNum` = '" . $faceNum . "'";
        } 

        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        while ($row = mysqli_fetch_assoc($sql))
        {
            // Extract Data from the QUERY
            extract($row);
            
            // WHERE EXTRACTED DATA WILL BE STORED
            $facultyData [] = [ 
                $facNum,
                $facID,
                $facLName.", ".$facFName." ".$facMName,
                $facAvailability,
                $facTeach,
                $facType
            ];
        }

        return $facultyData;
    }

    function getSubjects($section, $semester, $acadYear, $courseCode){
        include('dbConnection.php');

        $subjectData = [];
        if($courseCode==""){
            $course = [];
            $course = getCourse($section, 1);

            // Executing Subject Query
            $query = "SELECT * FROM tbl_subject 
                        WHERE semester = '" . $semester . "' AND yearLevel = '". $course['secYearLevel'] . "' AND courseID = '". $course['courseID'] ."'"; //QUERY CODE
            // var_dump($query);
        }
        else{
            $query = "SELECT `subType` FROM tbl_subject 
                        WHERE `courseCode` = '" . $courseCode . "';";
        }
        
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE
        
        while ($row = mysqli_fetch_assoc($sql))
        {
            // Extract Data from the QUERY
            // extract($row);
            
            // WHERE EXTRACTED DATA WILL BE STORED
            $subjectData[] = $row;
            // [
            //     $subNum,
            //     $subComlab,
            //     $subLab,
            //     $subLec,
            //     $subType,
            //     $subUnit,
            //     $yearLevel,
            //     $semester,
            // ];
            // End Extraction
            
        }  
        // Increment the Section
        return ($subjectData);
    }

    function checkAvailableRoom($courseCode, $courseDelivery, $hours, $getSemester, $getAcadYear, $getOnlyRoom=0){
        include('dbConnection.php');
        $allAvailableRooms = [];
        $roomData = [];
        $schedDayTimeAvailable = [];

        $availableRooms = ($getOnlyRoom==0)? getRooms($courseDelivery): getRooms($courseDelivery, $getOnlyRoom);
        foreach($availableRooms as $rooms){
            
            $dayAvailable = [1,2,3,4,5,6,7];
            $timeAvailable = [8,9,10,11,12,13,14,15,16,17,18,19,20];
            $timeAvail = (Object) $timeAvailable;

            $query = "SELECT * FROM `tbl_schedule` 
                    WHERE `schedRoomID` = '" . $rooms[0] . "'  
                    AND `schedSemID` = '" . $getSemester . "' 
                    AND `schedAYID` = '". $getAcadYear . "';";  //QUERY CODE
            $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

            if(mysqli_num_rows($sql)>0){
                while ($row = mysqli_fetch_assoc($sql))
                {
                    // WHERE EXTRACTED DATA WILL BE STORED
                    $roomData [] = $row;
                    extract($row);
                    
                    $notAvail = explode('-', $schedTime);
                    foreach (range($notAvail[0], $notAvail[1]) as $number){
                        $dayNotAvail[] = $number;
                    }

                    // var_dump($dayNotAvail);
                    foreach($dayAvailable as $day){
                        if($day == $schedDay){
                            $schedDayTimeAvailable[] = array_diff($timeAvailable, $dayNotAvail);
                            // var_dump($schedDayTimeAvailable);
                        }
                        else{
                            $schedDayTimeAvailable[] = $timeAvail;
                        }
                    }
                }
                
            }
            else{
                foreach($dayAvailable as $day){
                    $schedDayTimeAvailable[] = $timeAvail;
                }
            }
            $allAvailableRooms[] = [$rooms ,$schedDayTimeAvailable];
        }
        return json_encode($allAvailableRooms);
        
    }

    function checkAvailableFaculty($availableRoomsJSON, $courseCode, $hours, $getSemester, $getAcadYear, $roomNum, $facNum){
        include('dbConnection.php');
        $allAvailableFaculty = [];
        $facultyData = [];
        
        $subject = (getSubjects("", "", "", $courseCode));
        $subType = ($subject[0]["subType"]);
        $availableFaculty = ($facNum == "")? getFaculty($subType) : getFaculty($subType, $facNum);
        $availableRooms = json_decode($availableRoomsJSON);
        // var_dump($availableRooms);
        
        foreach($availableFaculty as $faculty){

                
            $dayAvailable = [1,2,3,4,5,6,7];
            // $timeAvailable = [7,8,9,10,11,12,13,14,15,16,17,18,19,20];
            // $timeAvail = (Object) $timeAvailable;

            $query = "SELECT * FROM `tbl_schedule` 
                    WHERE `schedFacID` = '" . $faculty[0] . "'  
                    AND `schedSemID` = '" . $getSemester . "' 
                    AND `schedAYID` = '". $getAcadYear . "';";  //QUERY CODE
            $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

            if(mysqli_num_rows($sql)>0){
                while ($row = mysqli_fetch_assoc($sql))
                {
                    // WHERE EXTRACTED DATA WILL BE STORED
                    // $facData [] = $row;
                    extract($row);
                    
                    $notAvail = explode('-', $schedTime);
                    foreach (range($notAvail[0], $notAvail[1]) as $number){
                        $dayNotAvail[] = $number;
                    }

                    // var_dump($dayNotAvail);
                    foreach($dayAvailable as $day){
                        if($day == $schedDay){
                            $remainingDays = (array)$availableRooms[0][1][$day-1];
                            
                            $schedDayTimeAvailable[] = array_diff($remainingDays, $dayNotAvail);
                            // var_dump($schedDayTimeAvailable);
                        }
                        else{
                            $schedDayTimeAvailable[] = (Object)$availableRooms[0][1][$day-1];
                        }
                    }
                }
                
            }
            else{
                foreach($dayAvailable as $day){
                    $schedDayTimeAvailable[] = (Object)$availableRooms[0][1][$day-1];;
                }
            }
            $allAvailableFaculty[] = [$availableRooms[0][0], $schedDayTimeAvailable, $faculty,]; 

            
        }
        return json_encode($allAvailableFaculty);
        
    }
?>
