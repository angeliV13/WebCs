<?php
    // Viewing room
    function viewBsitSubjectDB(){
        include('dbConnection.php');

        $query = "SELECT * FROM tbl_subject WHERE NOT `courseID` = 'BSCS'"; //QUERY CODE
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
                    // $checkbox = '<input class="w-100" type="checkbox" name="check1" id="check'. $subNum .'">',
                    $count++,
                    $courseCode,
                    $courseName,
                    $subLec,
                    $subLab,
                    $subUnit,
                    $courseID,
                    $semester,
                    $yearLevel,
                    $buttons = '<div class="btn-group d-flex">
                                    <button class="btn btn-warning" onclick="showITEditForm('. $subNum .')" type"button">Edit</button>
                                    <button class="btn btn-danger" onclick="showITDeleteForm('. $subNum .')" type"button">Delete</button>
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

        echo json_encode($json_data);  // send data as json format

    }

    // Getting Subject Data
    function getSubNum($subNum){

        include('dbConnection.php');
        $query = "SELECT * FROM tbl_subject WHERE subNum = '". $subNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

        if(mysqli_num_rows($sql)>0){ 

            $subData = array();
            // GETTING QUERIED DATA
            $subData = mysqli_fetch_assoc($sql);

            return json_encode($subData);
        }
    }

    //Adding Subject to Database
    function addSubject($courseCode, $courseName, $subLec, $subLab, $subUnit, $courseID, $semester, $yearLevel){

        include('dbConnection.php');
        $query = "INSERT INTO `tbl_subject`(`subNum`, `courseCode`, `courseName`, `subLec`, `subLab`, `subUnit`, `semester`, `yearLevel`) VALUES (0,'".$courseCode."','".$courseName."','".$subLec."','".$subLab."','".$subUnit."','" .$courseID. "',`'".$semester."','".$yearLevel."')"; 
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }
    
    // Editing Subject to Database
    function editSubject($subNum , $courseCode, $courseName, $subLec, $subLab, $subUnit, $courseID, $semester, $yearLevel){

        include('dbConnection.php');
        $query = "UPDATE `tbl_subject`
                    SET `courseCode`='" . $courseCode . "',`courseName`='" . $courseName . "',`subLec`='" . $subLec . "',`subLab`='" .$subLab. "',`subUnit`='" .$subUnit. "',`courseID`='" .$courseID. "',`semester`='" .$semester. "',`yearLevel`='" .$yearLevel. "'
                    WHERE `subNum` = '". $subNum ."'"; //QUERY CODE
        var_dump($query);
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }

    // Deleting Rooms
    function deleteSubject($subNum){

        include('dbConnection.php');
        $query = "DELETE FROM `tbl_subject`
                    WHERE subNum = '". $subNum ."'"; //QUERY CODE
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));

        return ($query);
    }
 

?>
