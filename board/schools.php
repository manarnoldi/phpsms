<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
<?php
	session_start();
	$error_message = NULL;
	if (isset($_POST['name']) && isset($_POST['capacity']) && isset($_POST['location_details'])){
		$name = $_POST['name'];
		$capacity = $_POST['capacity'];
		$location_details = $_POST['location_details'];
		$other_details = $_POST['other_details'];

		if (!empty($name) && !empty($capacity) && !empty($location_details)){
			$query ="SELECT Name FROM school WHERE Name = '".mysql_real_escape_string($name)."'";
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "school name already exists in the database.Enter a different school name.<br />";
			}
			else{
				$query = "INSERT INTO school(`Name`,`Location`,`Capacity`,`Other_Details`)
							VALUES('".mysql_real_escape_string($name)."','".mysql_real_escape_string($location_details)."',
							'".mysql_real_escape_string($capacity)."','".mysql_real_escape_string($other_details)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "School name saved successfully!!!";
				} else {
					$error_message .= "Error occured while saving the record";
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
			<?php echo $output = board_menu('schools'); ?>
		</td>
		<td id="main_page">
			<h2>Board School Details </h2>
			<hr/>
			<form action="schools.php" method="POST">
				<h4>
					Name:<br ><br >
					<input type="text" name="name" size="45" /><br ><br >
					Capacity:<br ><br >
					<input type="text" name="capacity" size="45" /><br ><br >
					Location Details:<br ><br >
					<input type="text" name="location_details" size="45" /><br ><br >
					Other Details:<br ><br >
					<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
					<input type="submit" name="submit" value="Register School" /><br ><br >
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