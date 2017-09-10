<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
<?php
	session_start();
	$error_message = NULL;
	if (isset($_POST['school_name']) && isset($_POST['facility_name']) && isset($_POST['facility_type'])
		&& isset($_POST['capacity']) && isset($_POST['status'])){
		$school_name = $_POST['school_name'];
		$facility_name = $_POST['facility_name'];
		$facility_type = $_POST['facility_type'];
		$capacity = $_POST['capacity'];
		$status = $_POST['status'];
		$other_details = $_POST['other_details'];
				
		if (!empty($school_name) && !empty($facility_name) && !empty($facility_type) && 
			!empty($capacity) && !empty($status)){
			$query ="SELECT Name FROM facility WHERE Name = '".mysql_real_escape_string($facility_name)."'
			 AND School_Id = '".mysql_real_escape_string($school_name)."'";
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "Facility name for the school already exists.Enter a different school name.<br />";
			}
			else{
		
				$query = "INSERT INTO facility(`School_Id`,`Name`,`Type`,`Capacity`,`other_details`,`Status`)
							VALUES('".mysql_real_escape_string($school_name)."','".mysql_real_escape_string($facility_name)."',
							'".mysql_real_escape_string($facility_type)."','".mysql_real_escape_string($capacity)."',
							'".mysql_real_escape_string($other_details)."','".mysql_real_escape_string($status)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "Facility saved successfully!!!";
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
			<?php echo $output = board_menu('facilities'); ?>
		</td>
		<td id="main_page">
			<h2>Board School Facilities </h2>
			<hr/>
			<form action="facilities.php" method="POST">
				<h4>
				School Name:<br ><br >
				<select name="school_name" style="width:320px;">
					<?php 
						$query = "SELECT Id,Name FROM school ORDER BY Name";
						$query_run = mysql_query($query);  
						if(!empty($query_run)){
							for($i=0;$i<mysql_num_rows($query_run);$i++){
								echo "<option value=\"".mysql_result($query_run,$i,'Id')."\">";
								echo mysql_result($query_run,$i,'Name');
								echo "</option>";
							}
						}
					?>
				</select><br ><br >
				Facility Name:<br ><br >
				<input type="text" name="facility_name" size="45" /><br ><br >
				Facility Type:<br ><br >
				<select name="facility_type" style="width:320px;">
					<option value="LectureHalls">Lecture Halls</option>
					<option value="Hostels">Hostels</option>
					<option value="Laboratories">Laboratories</option>
					<option value="Others">Others</option>
				</select><br ><br >
				Capacity:<br ><br >
				<input type="text" name="capacity" size="45" /><br ><br >
				Other Details:<br ><br >
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				Status:<br ><br >
				<select name="status" style="width:320px;">
					<option value="1">Active</option>
					<option value="0">InActive</option>
				</select><br ><br >
				<input type="submit" name="submit" value="Register Facilities" /><br /><br />
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