<?php require 'includes/connection.php'; ?>
<?php require 'includes/header.php'; ?>
<?php include 'includes/functions.php'; ?>
	<table id="structure">
		<tr>
			<td id="navigation">
				<?php echo $output = login_page_menu('boardlogin'); ?>
			</td>
			<td id="main_page">
				<h2>Welcome to Board Login Page </h2>
				<hr/>
				<form action="board/schools.php" method="POST">
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