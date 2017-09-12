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
	$amount_available = 5000;
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
			<?php echo $output = school_menu('fundsusage'); ?>
		</td>
		<td id="main_page">
			<h2>School Funds Usage </h2>
			<hr/>
			<form action="fundsusage.php" method="POST">
				<h4>
				School Name:<br ><br >
				<input type="text" name="school_name" size="45" readonly style="background-color:#dddddd;" value="<?php echo $school_name; ?>" /><br ><br >
				Fund Name:<br /><br />
				<select name="fund_name" style="width:320px;">
					<option>Test Fund Name One</option>
					<option>Test Fund Name Two</option>
				</select><br /><br />
				Amount Available:<br /><br />
				<input type="text" name="amount_available" size="45" readonly style="background-color:#dddddd;" value="<?php echo $amount_available; ?>" /><br ><br >
				Usage Reason:<br /><br />
				<textarea rows="5" cols="42" name="usage_reason"></textarea><br ><br >
				Amount:<br /><br />
				<input type="text" name="amount" size="45" /><br ><br >
				Other Details:<br /><br />
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register Funds Usage" /><br ><br >
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