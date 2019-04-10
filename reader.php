<?php
	session_start();
?><html>
<head>
	<title>Manhuwa Reader</title>
	<link rel="stylesheet" type="text/css" href="css_files/basic.css">
	<link rel="stylesheet" type="text/css" href="css_files/reader.css">
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
		</div>

		<?php }else{   ?>

		<!-- not logged in -->

		<a class="login" href="login.php">SIGN IN</a>
		<?php
		}
		?>
	</div>
</div>


<div class="mainFrame">
	<div class="manga_menu">
		<div class="manga_info">
			<h1>The Kawai Complex Guide to Manors and Hostel Behavior</h1>
		</div>
			<select class="select_chapter">
				<option value="">Chapter 1</option>
				<option value="">Chapter 2</option>
			</select>
			<button class="menu_button">Prev Chapter</button>
			<button class="menu_button">Next Chapter</button>
	</div>
	<div class="manga_pages">
		<img src="images/manga/kawaii_complex/page.png">
		<img src="images/manga/kawaii_complex/page.png">
		<img src="images/manga/kawaii_complex/page.png">
	</div>
</div>

</body>
</html>
