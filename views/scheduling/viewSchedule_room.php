<?php
    include('model/dbConnection.php');

    $ayID = (isset($_POST['academicYear']))? $_POST['academicYear']:"" ;
    $semester = (isset($_POST['semester']))? $_POST['semester']:"" ;
    $rooming = (isset($_POST['rooming']))? $_POST['rooming']:"" ;
    $roomName = "";

    $query = "SELECT roomName FROM `tbl_room` WHERE roomNum = '$rooming'"; //QUERY CODE
    $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            $roomName = $row['roomName'];
        }
    }


?>


<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="m-0 font-weight-bold text-danger text-center">View Room Schedule</h3>
    </div>

    <!-- Content Row -->
    <div class="column">
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-danger text-center">View Schedule</h6> -->
            </div>
            <div class="card-body">
                <form id="viewMySched" method="post">
                    <div class="row">
                        <div class="mr-4">
                            <label for="academicYear">Academic Year: </label>
                            <select name="academicYear" id="academicYear" class="form-select form-select-sm">
                                <?php
                                    if($ayID==""){
                                        echo ('<option value="">Select Academic Year</option>');
                                    }else{
                                        echo ('<option value="'.$ayID.'"> 20' . $ayID-1 . '-20' . $ayID . '</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mr-4">
                            <label for="semester">Semester: </label>
                            <select name="semester" id="semester" class="form-select form-select-sm">
                            <?php
                                    if($semester==""){
                                        echo ('<option value="">Select Academic Year</option>');
                                    }else if($semester==1){
                                        echo ('<option value="'.$semester.'">FIRST SEMESTER</option>');
                                    }else if($semester==2){
                                        echo ('<option value="'.$semester.'">SECOND SEMESTER</option>');
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mr-4">
                            <label for="rooming">Room: </label>
                            <select name="rooming" id="rooming">
                                <?php
                                    if($rooming==""){
                                        echo ('<option value="">Select Room</option>');
                                    }else{
                                        echo ('<option value="'.$rooming.'">' . $roomName . '</option>');
                                    }
                                ?>
                            </select>
                            <button class="btn btn-sm btn-danger" id="viewSchedNow" type="submit" name="viewSchedNow">View</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="theCalendar">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="viewSectionSchedule" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Time</th>
                                                <th>Monday</th>
                                                <th>Tuesday</th>
                                                <th>Wednesday</th>
                                                <th>Thursday</th>
                                                <th>Friday</th>
                                                <th>Saturday</th>
                                                <th>Sunday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $weekDays = ['m[]','t[]','w[]','th[]','f[]','sa[]','su[]'];
                                                
                                                $query = "SELECT * FROM `tbl_time`"; //QUERY CODE
                                                $sql = mysqli_query($conn, $query) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

                                                if(mysqli_num_rows($sql)>0){

                                                    while($row = mysqli_fetch_assoc($sql)){
                                                    $time=$row['timeNum'];
                                                    $day=1;
                                            ?>
                                            <tr class="text-center">
                                                <th><?php echo ($row['timeStart']." - ".$row['timeEnd'])?></th>
                                                <?php
                                                        while($day <=7){
                                                            $queryItem = "SELECT * FROM `tbl_schedule` sch 
                                                                        JOIN tbl_time t ON sch.schedTime=t.timeNum 
                                                                        JOIN tbl_subject sub ON sch.schedSubNum = sub.subNum 
                                                                        WHERE sch.schedDay='". $day ."' AND t.timeNum='". $time ."' 
                                                                        AND sch.schedRoomID ='". $rooming ."' AND sch.schedAYID='". $ayID ."' AND sch.schedSemID='". $semester ."' ;"; //QUERY CODE
                                                            $sqlItem = mysqli_query($conn, $queryItem) or die("System Error: " . mysqli_error($conn)); //SENDING QUERY TO DATABASE

                                                            
                                                            if(mysqli_num_rows($sqlItem)>0){
                                                                while($rowItem = mysqli_fetch_assoc($sqlItem)){
                                                ?>
                                                
                                                <td> 
                                                    <?php echo ($rowItem['courseName']);?>
                                                    <!-- <div class="d-flex justify-content-between">
                                                        <button class="btn btn-warning btn-sm" onclick="editSched(<?php echo ($rowItem['schedNum'])?>">Edit</button>
                                                        <button class="btn btn-danger btn-sm" onclick="deleteSched(<?php echo ($rowItem['schedNum'])?>">Delete</button>
                                                    </div> -->
                                                </td>

                                            
                                            <?php
                                                                }
                                                            }
                                                            else{
                                            ?>
                                                <td>
                                                    <div class="form-check">
                                                    
                                                        <!-- <input class="form-check-input myHour" name="<?php //echo $weekDays[$day-1];?>" type="checkbox" value="<?php //echo $time;?>" id="flexCheckDefault"> -->
                                                        <?php //echo $weekDays[$day-1];?>
                                                    </div>
                                                </td>

                                            <?php
                                                            }
                                                        $day++;
                                                        }
                                                    
                                            ?>
                                            </tr>
                                            <?php   
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="showToolbar" class="col-4 d-none">
                            <div class="">
                                <div class="">
                                    <label for="subject">Subject: </label>
                                    <select name="subject" id="subject">
                                        <option value="">Select Subject</option>
                                    </select>
                                </div>
                                
                                <div class="">
                                    <label for="room">Room: </label>
                                    <select name="room" id="room">
                                        <option value="">Select Room</option>
                                    </select>
                                </div>

                                <div class="">
                                    <label for="instructor">Instructor: </label>
                                    <select name="instructor" id="instructor">
                                        <option value="">Select instructor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-danger btn-rounded d-block col-6 mx-auto" type="submit" id="insert"
                                 name="insert">Insert</button>
                            </div>
                            <div class="d-grid gap-2">
                                <div id="result">

                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->






