<?php require 'includes/connection.php'; ?>
<?php require 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php session_start();
	if (isset($_SESSION['boardlogin'])){
		redirect_to('/statevocational/board/schools.php');
	}	
?>	

<?php
	$error_message = NULL;
	if (isset($_POST['user_name']) && isset($_POST['password'])){
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if (!empty($user_name) && !empty($password)){
			$hashed_password = md5($password);
			$query = "SELECT * FROM users WHERE username='".mysql_real_escape_string($user_name)."' AND
						password='".mysql_real_escape_string($hashed_password)."' AND 
						userFor='0'";
			$query_run = mysql_query($query);
			
			if ($query_run){
				$num_rows = mysql_num_rows($query_run);
				if ($num_rows<=0){
					$error_message = "Either user name or password is wrong.";
				}
				else{
					$schoollogin = mysql_result($query_run,0,'id');
					$_SESSION['boardlogin'] = $schoollogin;
					redirect_to('/statevocational/board/schools.php');
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
			<?php echo $output = login_page_menu('boardlogin'); ?>
		</td>
		<td id="main_page">
			<h2>Welcome to Board Login Page </h2>
			<hr/>
			<form action="boardlogin.php" method="POST">
				<h4>
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
					<input type="submit" name="submit" value="Login">
				</h4>
			</form>
		</td>
	</tr>
</table>
<?php require 'includes/footer.php'; ?>		