<?php
   $_SESSION['login_user'] = "asdfasdf";
   $_SESSION['logged_in'] = 10000;
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'user_database');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if ($db->connect_error) {
  	// echo "Connection failed";
	 die("Connection failed: " . $db->connect_error);
	}
  	// echo "Connected successfully";
?>