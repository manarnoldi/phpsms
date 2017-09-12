<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
<?php 
	session_start();
	if (!isset($_SESSION['boardlogin'])){
		redirect_to('/statevocational/boardlogin.php');
	}	
?>	
<?php
	$error_message = NULL;
	if (isset($_POST['school_name']) && isset($_POST['equipment_name']) && isset($_POST['cost'])){
			
		$school_name = $_POST['school_name'];
		$equipment_name = $_POST['equipment_name'];
		$cost = $_POST['cost'];
		$other_details = $_POST['other_details'];
				
		if (!empty($school_name) && !empty($equipment_name) && !empty($cost)){
			$query ="SELECT Name FROM sch_training_equipment WHERE Name = '".mysql_real_escape_string($equipment_name)."'
			 AND School_Id = '".mysql_real_escape_string($school_name)."'";
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "Training Equipment name for the school already exists.Enter a different school name.<br />";
			}
			else{
		
				$query = "INSERT INTO sch_training_equipment(`School_Id`,`Name`,`Cost`,`Other_Info`)
							VALUES('".mysql_real_escape_string($school_name)."','".mysql_real_escape_string($equipment_name)."',
							'".mysql_real_escape_string($cost)."','".mysql_real_escape_string($other_details)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "Training equipment saved successfully!!!";
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
			<?php echo $output = board_menu('trainingequipment'); ?>
		</td>
		<td id="main_page">
			<h2>Board Training Equipment </h2>
			<hr/>
			<form action="trainingequipment.php" method="POST">
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
				Equipment Name:<br ><br >
				<input type="text" name="equipment_name" size="45" /><br ><br >
				Cost:<br ><br >
				<input type="text" name="cost" size="45" /><br ><br >
				Other Details:<br ><br >
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register Equipment" /><br ><br >
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