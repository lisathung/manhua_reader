<?php
	session_start();
	session_destroy();

	echo "logging out...";
	//header('Refresh: 2; URL = login.php');
	header('Refresh: 1;URL = mainPage.php');
?>