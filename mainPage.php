<?php
	include 'php_files/config.php';
	session_start();

	//Use databases to pull images and links
	$cover_file_path = "";
	$manhwa_name = "";
	$manhwa_author = "";
	$no_of_chapters = 0;
	$query_result =  mysqli_query($db,"SELECT * FROM manhwa_list");
?>
<html>
<head>
	<title>Manhuwa Reader</title>
	<link rel="stylesheet" type="text/css" href="css_files/basic.css">
	<link rel="stylesheet" type="text/css" href="css_files/mainPage.css">
</head>
<body>

<div class="navbar">
	<div class="logo"><a href="mainPage.php"><img src="images\logo.png"></a></div>

	<!-- NAVIGATION LINKS -->
	<div class="nav_left"> 
		<a class="link" href="#AllManga">ALL MANGA</a>
		<a class="link" href="#New">LATEST</a>
	</div>
	<div class="nav_right"> 
		
		<!-- SEARCH BAR -->
		<input type="text"  class="text" placeholder="Search...">
		<?php
		if (isset($_SESSION['login_user'])){
		?>	

		<!-- logged in -->
		<div class="dropdown">
			<img src="images/user.png" class="dropbtn">
			<div class="dropdown-content">
				<a href="userPage.php">Account Details</a>
				<a href="userPage.php">Favourite Manga</a>
				<a href="logout.php">Logout</a>
			</div>
		</div> 

		<?php }else{   ?>
		<a class="login" href="loginPage.php">SIGN IN</a>
		
		<!-- not logged in -->
		<?php
		}
		?>
	</div>
</div>


<div class="mainFrame">
	<div class="new_manga">
		<div class="manhwa_thumbnail">
		<?php 
		//work on query result row by row
		while ($row_users = mysqli_fetch_array($query_result)) {
			//output a row here
			$manhwa_name = $row_users['manhwa_name'];
			$cover_file_path = $row_users['cover_file_path'];
			$manhwa_author = $row_users['manhwa_author'];
			$no_of_chapters = $row_users["no_of_chapters"];
			echo ("<a class='manga_link' href='chapter_list.php?manhwa_name=$manhwa_name'?><img src=".$cover_file_path.">"); 
			echo ("<p><name>$manhwa_name</name><br>");
			echo ("$manhwa_author<br>");
			echo ("$no_of_chapters Chapters");
			echo ("</p></a>");
		}?>
		</div>
	</div>
</div>

</body>
</html>
