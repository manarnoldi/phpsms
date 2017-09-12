<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
<?php 
	session_start();
	if (!isset($_SESSION['schoollogin'])){
		redirect_to('/statevocational/schoollogin.php');
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
	if (isset($_POST['student_name']) && isset($_POST['personal_id']) && isset($_POST['course']) 
		 && isset($_POST['gender']) && isset($_POST['student_no'])){
		$student_no = $_POST['student_no'];
		$student_name = $_POST['student_name'];
		$personal_id = $_POST['personal_id'];
		$course = $_POST['course'];
		$gender = $_POST['gender'];
		$other_details = $_POST['other_details'];
				
		if (!empty($student_name) && !empty($personal_id) && !empty($course) && 
			!empty($gender) && !empty($student_no)){
			$query ="SELECT student_no FROM student_details WHERE 
			student_no = '".mysql_real_escape_string($student_no)."' AND 
			school_Id = '".mysql_real_escape_string($school_id)."'";
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "Student Number already exists.<br />";
			}
			else{
		
				$query = "INSERT INTO student_details(`student_no`,`Name`,`personal_Id`,`gender`,
						`course_Id`,`school_Id`,`other_Info`) VALUES('".mysql_real_escape_string($student_no)."',
						'".mysql_real_escape_string($student_name)."','".mysql_real_escape_string($personal_id)."',
						'".mysql_real_escape_string($gender)."','".mysql_real_escape_string($course)."',
						'".mysql_real_escape_string($school_id)."','".mysql_real_escape_string($other_details)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "Student registered successfully!!!";
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
				<?php echo $output = school_menu('studentdetails'); ?>
			</td>
		<td id="main_page">
			<h2>School Student Details </h2>
			<hr/>
			<form action="studentdetails.php" method="POST">
				<h4>
				School Name:<br ><br >
				<input type="text" name="school_name" size="45" readonly style="background-color:#dddddd;" value="<?php echo $school_name; ?>" /><br ><br >
				Student Number:<br ><br >
				<input type="text" name="student_no" size="45" /><br ><br >
				Student Name:<br ><br >
				<input type="text" name="student_name" size="45" /><br ><br >
				
				Course:<br /><br />
				<select id="course" name="course" style="width:320px;">
				<?php 
					$query = "SELECT Id,course_Name FROM sch_courses 
							  WHERE (school_id='".mysql_real_escape_string($school_id)."') ORDER BY course_Name";
					$query_run = mysql_query($query);  
					if(!empty($query_run)){
						for($i=0;$i<mysql_num_rows($query_run);$i++){
							echo "<option value=\"".mysql_result($query_run,$i,'Id')."\">";
							echo mysql_result($query_run,$i,'course_Name');
							echo "</option>";
						}
					}
				?>
				</select><br /><br />
				
				Personal Id:<br ><br >
				<input type="text" name="personal_id" size="45" /><br /><br />
				Gender:<br /><br />
				<select name="gender" style="width:320px;">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Others">Others</option>
				</select><br /><br />
				Other Details:<br /><br />
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register Student" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;
				<a href="../logout.php">Log Out...</a>
				<br ><br >
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

