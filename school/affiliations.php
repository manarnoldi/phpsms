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
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo $output = school_menu('affiliations'); ?>
		</td>
		<td id="main_page">
			<h2>School Affiliations </h2>
			<hr/>
			<form action="affiliations.php" method="POST">
				<h4>
				School Name:<br ><br >
				<input type="text" name="school_name" size="45" readonly style="background-color:#dddddd;" value="<?php echo $school_name; ?>" /><br ><br >
				University Name:<br /><br />
				<input type="text" name="university_name" size="45" /><br ><br >
				Other Details:<br /><br />
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register University Affiliations" /><br ><br >
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