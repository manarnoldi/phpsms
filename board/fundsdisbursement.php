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
	
	if (isset($_POST['school_name']) && isset($_POST['fund_name']) && isset($_POST['amount'])){
			
		$school_name = $_POST['school_name'];
		$fund_name = $_POST['fund_name'];
		$amount = $_POST['amount'];
		$other_details = $_POST['other_details'];
				
		if (!empty($school_name) && !empty($amount) && !empty($fund_name)){
			$query ="SELECT fund_name FROM sch_funds_disbursement WHERE fund_name = '".mysql_real_escape_string($fund_name)."'
			 AND school_Id = '".mysql_real_escape_string($school_name)."'";
			
			$query_run = mysql_query($query);
			$record_count = mysql_num_rows($query_run);
			if ($record_count > 0){
				$error_message .= "Fund name for the school already exists.Enter a different fund name.<br />";
			}
			else{
		
				$query = "INSERT INTO sch_funds_disbursement(`School_Id`,`fund_name`,`amount`,`OtherInfo`)
							VALUES('".mysql_real_escape_string($school_name)."','".mysql_real_escape_string($fund_name)."',
							'".mysql_real_escape_string($amount)."','".mysql_real_escape_string($other_details)."');";
				$query_run = mysql_query($query);
				if ($query_run){
					$error_message .= "School fund disbursement saved successfully!!!";
				} else {
					$error_message .= "Error occured while saving the record<br /><br />";
					echo $query;
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
			<?php echo $output = board_menu('fundsdisbursement'); ?>
		</td>
		<td id="main_page">
			<h2>Board Funds Disbursement </h2>
			<hr/>
			<form action="fundsdisbursement.php" method="POST">
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
				Fund Name:<br ><br >
				<input type="text" name="fund_name" size="45" /><br ><br >
				Amount:<br ><br >
				<input type="text" name="amount" size="45" /><br ><br >
				Other Details:<br ><br >
				<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
				<input type="submit" name="submit" value="Register Disbursement" /><br ><br >
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