<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
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
						<input type="submit" name="submit" value="Register School" />
					</h4>
				</form>
			</td>
		</tr>
	</table>
<?php require '/../includes/footer.php'; ?>		