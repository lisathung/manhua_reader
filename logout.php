<?php
	session_start();
	session_destroy();
	//header('Refresh: 2; URL = login.php');
	header('Refresh: 1;URL = mainPage.php');
?>