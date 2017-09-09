<?php require 'constants.php'; ?>
<?php
	if(@!mysql_connect(SERVER,USER,PASSWORD) || !mysql_select_db(DATABASE)){
		die(CONN_ERROR);
	}
?>