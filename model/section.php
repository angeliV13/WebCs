<?php
    // Viewing section
    function viewSection(){
        include('dbConnection.php');


        $query = "SELECT * FROM tbl_section"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        $totalData = 0;

        // DOES QUERY CONTAINS ROWS?
        if(mysqli_num_rows($sql)>0){ 
            $count = 1;
            $checkbox = "";
            $buttons = "";

            // GETTING QUERIED DATA
            while ($row = mysqli_fetch_assoc($sql))
            {

                // Extract Data from the QUERY
                extract($row);

                // WHERE EXTRACTED DATA WILL BE STORED
                $data[] = [

                    $count++,
                    $secName,
                    $secYearLevel,
                    $courseID,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showSectionEditForm('. $secNum .')" type"button">Edit</button>
                                    <button class="btn btn-danger" onclick="showSectionDeleteForm('. $secNum .')" type"button">Delete</button>
                                </div>',
                ];
            }
        }

        $json_data = array(
            "draw"            => 1,   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval($totalData),  // total number of records
            "recordsFiltered" => intval($totalData), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        return json_encode($json_data);  // send data as json format

    }

    // Getting Section Data
    function getSectionNum($secNum){

        include('dbConnection.php');
        $query = "SELECT * FROM tbl_section WHERE secNum = '". $secNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        if(mysqli_num_rows($sql)>0){ 

            $sectionData = array();
            // GETTING QUERIED DATA
            $sectionData = mysqli_fetch_assoc($sql);

            return json_encode($sectionData);
        }
    }

    //Adding Sections to Database
    function addSection($secYearLevel, $secName, $courseID){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_section`(`secNum`, `secYearLevel`, `secName`, `courseID`)  VALUES ('0','".$secYearLevel."','".$secName."','".$courseID."')"; 
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }

    // Editing Sections to Database
    function editSection($secNum , $secYearLevel, $secName, $courseID){

        include('dbConnection.php');
        $query = "UPDATE `tbl_section` 
                    SET `secYearLevel`='" . $secYearLevel . "',`secName`='" . $secName . "',`courseID`='" .$courseID. "'
                    WHERE secNum = '". $secNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }

    // Deleting Sections
    function deleteSection($secNum){

        include('dbConnection.php');
        $query = "DELETE FROM `tbl_section`
                    WHERE secNum = '". $secNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        return ($query);
    }



    // CHARTTTTTTTTTTTTTT
    function viewAllCreatedSchedAreaDB(){
        include('dbConnection.php');
        
        $chartData = array();
        $query = "(SELECT tbl_acadyear.ayName, tbl_acadyear.ayID, COUNT(DISTINCT tbl_schedule.schedSecNum) AS countValue 
                FROM tbl_acadyear JOIN tbl_schedule ON tbl_acadyear.ayID = tbl_schedule.schedAYID 
                GROUP BY tbl_acadyear.ayID ORDER BY tbl_acadyear.ayID DESC LIMIT 5) 
                ORDER BY ayID ASC"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        if(mysqli_num_rows($sql)>0){ 

            // GETTING QUERIED DATA
            while($row = mysqli_fetch_assoc($sql)){
                $chartData[] = $row;
            }

            
        }
        return $chartData;
    }


    function viewAllCreatedSchedPieDB(){
        include('dbConnection.php');
        
        $chartData = array();
        $query = "SELECT COUNT(CASE WHEN tbl_room.roomType = '1' THEN 1 END) AS lecture, 
                COUNT(CASE WHEN tbl_room.roomType = '2' THEN 1 END) AS laboratory 
                FROM tbl_room"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        if(mysqli_num_rows($sql)>0){ 

            // GETTING QUERIED DATA
            while($row = mysqli_fetch_assoc($sql)){
                $chartData[] = $row;
            }

            
        }
        return $chartData;
    }
?>
