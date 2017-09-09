<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
	<table id="structure">
		<tr>
			<td id="navigation">
				<?php echo $output = board_menu('courses'); ?>
			</td>
			<td id="main_page">
				<h2>Board School Courses </h2>
				<hr/>
				<form action="courses.php" method="POST">
					<h4>
					School Name:<br ><br >
					<select name="school_name" style="width:320px;"></select><br ><br >
					Course Name:<br ><br >
					<input type="text" name="course_name" size="45" /><br ><br >
					Other Details:<br ><br >
					<textarea rows="5" cols="42" name="other_details"></textarea><br ><br >
					<input type="submit" name="submit" value="Register Course" />
					</h4>
				</form>
			</td>
		</tr>
	</table>
<?php require '/../includes/footer.php'; ?>		