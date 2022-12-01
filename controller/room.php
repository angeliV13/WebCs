<?php
    require('../model/room.php');

    // View Room Controller
    if(isset($_POST['viewRoomDB'])){
        echo viewRoom();
    }

    // Show GET Room Data Controller
    if(isset($_POST['showRoomEditDB'])){
        $roomNum = $_POST['roomNum'];
        echo getRoomNum($roomNum);
    }

    
    // Add Room Controller
    if(isset($_POST['addRoomDB'])){
        $roomName = $_POST['roomName'];
        $roomLoc = $_POST['roomLoc'];
        $roomType = $_POST['roomType'];

        echo addRoom($roomName , $roomLoc, $roomType);
    }

    // Edit Room Controller
    if(isset($_POST['editRoomDB'])){
        $roomNum = $_POST['roomNum'];
        $roomName = $_POST['roomName'];
        $roomLoc = $_POST['roomLoc'];
        $roomType = $_POST['roomType'];

        echo editRoom($roomNum, $roomName , $roomLoc, $roomType);
    }

    // Delete Data Controller
    if(isset($_POST['deleteRoomDB'])){
        $roomNum = $_POST['roomNum'];
        echo deleteRoom($roomNum);
    }

    


?>