<?php
	include 'php_files/config.php';
	session_start();

	//Initialise variables
	$chapter_file_path = "";
	$manhwa_author = "";
	$no_of_chapters = 0;
	$manhwa_details = "";

	//get details from chapter list page
	$manhwa_name = $_GET['manhwa_name'];
	$chapter_no = (int)$_GET['chapter_no'];

	//Use databases to pull images and links
	$query_result =  mysqli_query($db,"SELECT * FROM manhwa_list WHERE manhwa_name='$manhwa_name'");

	//work on query result row by row
	$row_users = mysqli_fetch_array($query_result);

	//extract details and output
	$manhwa_author = $row_users['manhwa_author'];
	$no_of_chapters = $row_users["no_of_chapters"];
	$manhwa_details = $row_users['manhwa_details'];
	$manhwa_chapter_path = $row_users['chapter_file_path']."chapter$chapter_no";

	//previous and next chapter numbers
	$prev = $chapter_no - 1;
	$next = $chapter_no + 1;

	echo $manhwa_chapter_path;

?>
<html>
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

		<!-- not logged in -->

		<a class="login" href="loginPage.php">SIGN IN</a>
		<?php
		}
		?>
	</div>
</div>


<div class="mainFrame">
	<div class="manga_menu">
		<div class="manga_info">
			<?php echo("<h1>$manhwa_name</h1>"); ?>
		</div>
		<form action="/reader.php" method="GET">
			<?php
			//Hidden submit value to keep track of current manhwa  
			echo("<input type='hidden' name='manhwa_name' value='$manhwa_name'/>"); 
			?>
			<!-- Chapter Selection menu generated using for loop-->
			<select class="select_chapter" name="chapter_no" onchange="this.form.submit()">
				<?php
				for($i=1 ; $i<=$no_of_chapters ; $i++){
					if ($chapter_no == $i){
						echo ("<option value=$i selected>Chapter $i</option>"); 
					}else{
						echo ("<option value=$i>Chapter $i</option>");
					}
				}
				?>
			</select>
			<?php
			echo ("<button class='menu_button' name='chapter_no' value=$prev' >Prev Chapter</button>");
			echo ("<button class='menu_button' name='chapter_no' value=$next'>Next Chapter</button>");
			?>
		</form>
	</div>
	<div class="manga_pages">
		<!-- Use Glob data structure to pull all images from a single chapter folder -->
		<?php
		$images = glob("$manhwa_chapter_path/*[.png,.jpg]");
		foreach($images as $image) {
			echo ("<img src='$image'/><br>");
		}
		?>
	</div>
</div>

</body>
</html>
