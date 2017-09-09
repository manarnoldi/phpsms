<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
	<table id="structure">
		<tr>
			<td id="navigation">
				<?php echo $output = board_menu('facilities'); ?>
			</td>
			<td id="main_page">
				<h2>Board School Facilities </h2>
				<hr/>
				<form action="facilities.php" method="POST">
					<h4>
					School Name:<br ><br >
					<select name="school_name" style="width:320px;"></select><br ><br >
					Facility Name:<br ><br >
					<input type="text" name="facility_name" size="45" /><br ><br >
					Facility Type:<br ><br >
					<select name="facility_type" style="width:320px;">
						<option>Lecture Halls</option>
						<option>Hostels</option>
						<option>Laboratories</option>
						<option>Others</option>
					</select><br ><br >
					Capacity:<br ><br >
					<input type="text" name="capacity" size="45" /><br ><br >
					Other Details:<br ><br >
					<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
					Status:<br ><br >
					<select name="status" style="width:320px;">
						<option>Active</option>
						<option>InActive</option>
					</select><br ><br >
					<input type="submit" name="submit" value="Register Facilities" />
					</h4>
				</form>
			</td>
		</tr>
	</table>
<?php require '/../includes/footer.php'; ?>		