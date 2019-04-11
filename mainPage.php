<?php
	include 'php_files/config.php';
	session_start();
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
		<a class="link" href="#home">HOME</a> 
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
			<a href="logout.php">Logout</a>
			<a href="userPage.php">User</a>
		</div>

		<?php }else{   ?>

		<!-- not logged in -->
		<a class="login" href="loginPage.php">SIGN IN</a>
		<?php
		}
		?>
	</div>
</div>


<div class="mainFrame">
	<div class="new_manga">
		<!-- Use databases to pull images and links to here -->
		<?php
		$file_path = "";
		$manhwa_name = "";
		$query_result =  mysqli_query($db,"SELECT * FROM manhwa_list");
		//work on query result row by row
		while ($row_users = mysqli_fetch_array($query_result)) {
    		//output a row here
			$manhwa_name = $row_users['manhwa_name'];
			$file_path = $row_users['file_path'];
    	?>
    	<div>
    		<?php echo ("<a class=manga_link href=chapter_list.php?manhwa_name=$manhwa_name><img src=$file_path></a>"); ?>
			<p><name>Kawaii Complex </name><br>
			   Ruri Miyahara<br>
			   Completed, 94 Chapters
			</p>
			</a>
		</div>
		<?php
		}
		?>
		<div>
			<a class="manga_link" href="chapter_list.php?manhwa_name=kawaii_complex"><img src="images\covers\ritsu.png">
			<p><name>Kawaii Complex </name><br>
			   Ruri Miyahara<br>
			   Completed, 94 Chapters
			</p>
			</a>
		</div>
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\naruto.png">
			<p><name>Naruto</name><br>
			   Masashi Kishimoto<br>
			   Completed, 700 Chapters
			</p>
			</a>
		</div>		
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\fairy_tale.png">
			<p><name>Fairy Tale</name><br>
			   Hiro Mashima<br>
			   Completed, 554 Chapters
			</p>
			</a>
		</div>
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\mob.png">
			<p><name>Mob Psycho</name><br>
			   ONE<br>
			   Completed, 215 Chapters
			</p>
			</a>
		</div>		
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\dragon_ball.png">
			<p><name>Dragon Ball</name><br>
			   Akira Toriyama<br>
			   Completed, 557 Chapters
			</p>
			</a>
		</div>	
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\a_class.png">
			<p><name>Assassination Classroom</name><br>
			   Yuusei Matsui<br>
			   Completed, 190 Chapters
			</p>
			</a>
		</div>		
		<div>
			<a class="manga_link" href="mainpage.html"><img src="images\covers\slam_dunk.png">
			<p><name>Slam Dunk</name><br>
			   Takehiko Inoue<br>
			   Completed, 278 Chapters
			</p>
			</a>
		</div>		
	</div>
	<div class="trending">
		
	</div>
</div>

</body>
</html>
