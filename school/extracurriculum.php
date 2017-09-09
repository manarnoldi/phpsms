<?php require '/../includes/connection.php'; ?>
<?php require '/../includes/header.php'; ?>
<?php include '/../includes/functions.php'; ?>
	<table id="structure">
		<tr>
			<td id="navigation">
				<?php echo $output = school_menu('extracurriculum'); ?>
			</td>
			<td id="main_page">
				<h2>School Extra Curriculum Activities</h2>
				<hr/>
			</td>
		</tr>
	</table>
<?php require '/../includes/footer.php'; ?>		