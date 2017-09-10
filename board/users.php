<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>

<?php
	$error_message = NULL;
	if (isset($_POST['school_name']) && isset($_POST['user_name']) && isset($_POST['password'])
	 && isset($_POST['confirm_password'])){
		$school_name = $_POST['school_name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$other_details = $_POST['other_details'];
	
		if (!empty($school_name) && !empty($user_name) && !empty($password) && !empty($confirm_password)){
			if ($password == $confirm_password){
				$hashed_password = md5($confirm_password);
				$query = "SELECT * FROM users WHERE username='".mysql_real_escape_string($user_name)."' AND 
				schoolid = '".mysql_real_escape_string($school_name)."'";
				$query_run = mysql_query($query);
				$num_rows = mysql_num_rows($query_run);
				if ($num_rows > 0){
					$error_message .= 'User name for the school already exists!<br />';
				}
				else{
					$query = "INSERT INTO users(username,password,schoolid,other_details) 
								VALUES('".mysql_real_escape_string($user_name)."',
							'".mysql_real_escape_string($hashed_password)."',
							'".mysql_real_escape_string($school_name)."',
							'".mysql_real_escape_string($other_details)."');";
							$query_run = mysql_query($query);
							if ($query_run){
								$error_message .= 'User details saved successfully!<br />';
							} else {
								$error_message .= 'Error occured while saving the record in the database!<br />';
							}
						}
				} 
			else {
				$error_message .= 'Passwords entered are not the same!<br />';
			}
		}
		
	}
?>
<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo $output = board_menu('users'); ?>
		</td>
		<td id="main_page">
			<h2>Board School Users </h2>
			<hr/>
			<form action="users.php" method="POST">
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
					User Name:<br ><br >
					<input type="text" name="user_name" size="45" /><br ><br >
					Password:<br ><br >
					<input type="password" name="password" size="45" /><br ><br >
					Confirm Password:<br ><br >
					<input type="password" name="confirm_password" size="45" /><br ><br >
					Other Details:<br ><br >
					<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
					<input type="submit" name="submit" value="Register User" /><br /><br />
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