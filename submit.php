
 <?php
//  var_dump($_POST);
if($_POST)
{
include('model/dbConnection.php');

    $ayID = $_POST['academicYear'];
    $section = $_POST['academicYear'];
    $semester = $_POST['semester'];

	$faculty = $_POST['instructor'];
	$subject = $_POST['subject'];
	$room = $_POST['room'];

	$section = $_POST['section'];
	
	$m = (isset($_POST['m']))? $_POST['m']: [];
    $t = (isset($_POST['tu']))? $_POST['tu']: [];
	$w = (isset($_POST['w']))? $_POST['w']: [];
	$th = (isset($_POST['th']))? $_POST['th']: [];
    $f = (isset($_POST['f']))? $_POST['f']: [];
    $sa = (isset($_POST['sa']))? $_POST['sa']: [];
    $su = (isset($_POST['su']))? $_POST['su']: [];

	//monday sched
	$count=1;
	foreach ($m as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($t as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($w as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($th as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($f as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($sa as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------

	//tuesday sched
	$count=1;
	foreach ($su as $daym){
		//check conflict for member
		$queryMember = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time 
						WHERE tbl_faculty.facNum='$faculty' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_member=mysqli_query($conn, $queryMember)or die(mysqli_error($conn));

		$row=mysqli_fetch_assoc($query_member);
		$count_t=$row['count'];
		$time1=date("h:i a",strtotime($row['timeStart']))."-".date("h:i a",strtotime($row['timeEnd']));
		$member1=$row['facLName'].", ".$row['facFName'];
		
		$error_t="<span class='text-danger'>
			<table width='100%'>
				<tr>	
					<td>Monday</td>
					<td>$time1</td> 
					<td>$member1</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</table>
		</span>";
		
		//check conflict for room
		$queryRoom = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_room
						WHERE tbl_schedule.schedRoomID='$room' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";


		$query_room=mysqli_query($conn, $queryRoom)or die(mysqli_error($conn));

		$rowr=mysqli_fetch_array($query_room);
		$count_r=$rowr['count'];
		$timer=date("h:i a",strtotime($rowr['timeStart']))."-".date("h:i a",strtotime($rowr['timeEnd']));
		$roomr=$rowr['roomName'];
			
		$error_r="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timer</td> 
					<td>$roomr</td>
					<td class='text-danger'><b>Not Available</b></td>					
				</tr>
			</span>
		</table>";

		//check conflict for class
		$queryClass = "SELECT *,COUNT(*) AS count FROM tbl_schedule  
						NATURAL JOIN tbl_faculty NATURAL JOIN tbl_time NATURAL JOIN tbl_section
						WHERE tbl_schedule.schedSecNum='$section' AND tbl_schedule.schedTime='$daym' 
						AND tbl_schedule.schedDay='$count' AND tbl_schedule.schedSemID='$semester' AND tbl_schedule.schedAYID='$ayID'";

		$query_class=mysqli_query($conn, $queryClass)or die(mysqli_error($conn));
		$rowc=mysqli_fetch_array($query_class);
		$count_c=$rowc['count'];
		$sectionc=$rowc['secName'];
		$timec=date("h:i a",strtotime($rowc['timeStart']))."-".date("h:i a",strtotime($rowc['timeEnd']));
			
			$error_c="<span class='text-danger'>
			<table width='100%'>
				<tr>
					<td>Monday</td>
					<td>$timec</td> 
					<td>$sectionc</td>
					<td class='text-danger'><b>Not Available</b>	</td>					
				</tr>
			</table></span>";	
		
				
		// $queryt=mysqli_query($conn,"select * from member where member_id='$member'")or die(mysqli_error($conn));
		// 		$rowt=mysqli_fetch_array($queryt);
		// 		$membert=$rowt['member_last'].", ".$rowt['member_first'];
			
		$querytime=mysqli_query($conn,"select * from tbl_time where timeNum='$daym'")or die(mysqli_error($conn));
				$rowt=mysqli_fetch_array($querytime);
				$timet=date("h:i a",strtotime($rowt['timeStart']))."-".date("h:i a",strtotime($rowt['timeEnd']));	
		
		
		if (($count_t==0) AND ($count_r==0) AND ($count_c==0))
		{
			$insertQuery = "INSERT INTO `tbl_schedule`(`schedNum`, `schedFacID`, `schedRoomID`, `schedSubNum`, `schedTime`, `schedDay`, `schedCourseID`, `schedSecNum`, `schedSemID`, `schedAYID`, `labLec`) 
							VALUES (0,'$faculty','$room','$subject','$daym','$count','N/A','$section','$semester','$ayID','0')"; 
			$insert_query = mysqli_query($conn, $insertQuery)or die(mysqli_error($conn));
				
			echo "<span class='text-success'>
			<table width='100%'>
				<tr>
					<td>monday</td>
					<td>$timet</td> 
					
					<td>Success</td>					
				</tr>
			</table></span><br>";	
		}		
		else if ($count_t>0){
			echo $error_t."<br>";
		}
		else if ($count_r>0){
			echo $error_r."<br>";
		}
		else{
			echo $error_c."<br>";
		}	
		
		//echo "</table>";
	}
	//------------------------------------------------
	
	// echo '<script>$("#createSchedule").load(location.href + " #createSchedule");</script>';	
}					  
	
?>