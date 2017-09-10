<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
<?php 
	session_start();
	if (!isset($_SESSION['schoollogin'])){
		redirect_to('/statevocational1/school/schoollogin.php');
	}	
?>	
<?php
	$error_message = NULL;
	$school_id = NULL;
	$school_name = NULL;
	$user_Id = $_SESSION['schoollogin'];
	$query ="SELECT schoolid FROM users WHERE Id = '".mysql_real_escape_string($user_Id)."'";
	$query_run = mysql_query($query);
	$record_count = mysql_num_rows($query_run);
	if ($record_count > 0){
		$school_id = mysql_result($query_run,0,'schoolid');
		$query ="SELECT Name FROM school WHERE Id = '".mysql_real_escape_string($school_id)."'";
		$query_run = mysql_query($query);
		$record_count = mysql_num_rows($query_run);
		if ($record_count > 0){
			$school_name = mysql_result($query_run,0,'Name');
		}
	}
?>
<?php
	if (isset($_POST['student_no']) && isset($_POST['date']) && isset($_POST['attendance'])){
		$student_Id = $_POST['student_no'];
		$date = $_POST['date'];
		$attendance = $_POST['attendance'];
		$other_details = $_POST['other_details'];
				
		if (!empty($student_Id) && !empty($date)){
			$query ="SELECT Id FROM student_attendance WHERE 
			student_Id = '".mysql_real_escape_string($student_Id)."' AND 
			date = '".mysql_real_escape_string($date)."'";
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "Student attendance already exists.<br />";
			}
			else{
		
				$query = "INSERT INTO student_attendance(`student_Id`,`date`,`attendance`,`other_Info`)
				VALUES('".mysql_real_escape_string($student_Id)."','".mysql_real_escape_string($date)."',
				'".mysql_real_escape_string($attendance)."','".mysql_real_escape_string($other_details)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "Student attendance entered successfully!!!";
				} else {
					$error_message .= "Error occured while saving the record<br /><br />";
				}
			}
		}
		else{
			$error_message .= "Some mandatory fields are missing.<br />";
		}
	}
?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo $output = school_menu('studentattendance'); ?>
		</td>
		<td id="main_page">
			<h2>School Student Attendance </h2>
			<hr/>
			<form action="studentattendance.php" method="POST">
				<h4>
				School Name:<br ><br >
				<input type="text" name="school_name" size="45" readonly style="background-color:#dddddd;" value="<?php echo $school_name; ?>" /><br ><br >
				Student Number:<br ><br >
				<select name="student_no" style="width:320px;">
					<?php 
						$query = "SELECT Id,student_no FROM student_details ORDER BY student_no";
						$query_run = mysql_query($query);  
						if(!empty($query_run)){
							for($i=0;$i<mysql_num_rows($query_run);$i++){
								echo "<option value=\"".mysql_result($query_run,$i,'Id')."\">";
								echo mysql_result($query_run,$i,'student_no');
								echo "</option>";
							}
						}
					?>
				</select><br ><br >
				Date:<br ><br >
				<input type="date" name="date" size="45" /><br ><br >
				Attendance:<br /><br />
				<select name="attendance" style="width:320px;">
					<option value="1">Present</option>
					<option value="0">Absent</option>
				</select><br /><br />
				Other Details:<br /><br />
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register Attendance" /><br ><br >
				<?php 
					if(!empty($error_message)){
						echo $error_message;
					}
						$error_message = NULL;
				?>
				</h4>
			</form>
		</td>
	</tr>
</table>
<?php require '/../includes/footer.php'; ?>		