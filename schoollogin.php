<?php require 'includes/connection.php'; ?>
<?php require 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php session_start();
	if (isset($_SESSION['schoollogin'])){
		redirect_to('/statevocational/school/studentdetails.php');
	}	
?>

<?php
	$error_message = NULL;
	if (isset($_POST['school_name']) && isset($_POST['user_name']) && isset($_POST['password'])){
		$school_name = $_POST['school_name'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if (!empty($school_name) && !empty($user_name) && !empty($password)){
			$hashed_password = md5($password);
			$query = "SELECT * FROM users WHERE username='".mysql_real_escape_string($user_name)."' AND
						password='".mysql_real_escape_string($hashed_password)."' AND 
						schoolid='".mysql_real_escape_string($school_name)."'";
			$query_run = mysql_query($query);
			
			if ($query_run){
				$num_rows = mysql_num_rows($query_run);
				if ($num_rows<=0){
					$error_message = "Either school name, user name or password is wrong.";
				}
				else{
					$schoollogin = mysql_result($query_run,0,'id');
					$_SESSION['schoollogin'] = $schoollogin;
					redirect_to('/statevocational/school/studentdetails.php');
				}
			}
		}
		else{
			$error_message .= "Some fields are missing data.<br />";
		}
	}
?>

<table id="structure">
	<tr>
		<td id="navigation">
			<?php echo $output = login_page_menu('schoollogin');?>
		</td>
		<td id="main_page" >
		<h2>Welcome to the School Login Page </h2>
			<hr/>
			<form action="schoollogin.php" method="POST">
			<h4>
				SchoolName: <br/><br/>
				<select name="school_name" style="width:350px;">
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
				UserName: <br/><br/>
				<input type="text" name="user_name" value="" size="50"><br/><br/>
				Password: <br/><br/>
				<input type="password" name="password" value="" size="50"><br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;
				<input type="submit" name="submit" value="Login"><br /><br />
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
<?php require 'includes/footer.php'; ?>		