<?php
    function check(){
        $room = "";
        include('dbConnection.php');

        $query = "SELECT roomName FROM tbl_room WHERE roomNum = 1";
        $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn));
        
        while ($row = mysqli_fetch_array($sql))
        {
            $room = $row['roomName'];
        }
        return $room;

    }

?>