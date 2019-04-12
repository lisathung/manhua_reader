<?php
	include 'php_files/config.php';
	session_start();
	$manhwa_name = $_GET['manhwa_name'];
?>
<html>
<head>
	<title>Manhuwa Reader</title>
	<link rel="stylesheet" type="text/css" href="css_files/basic.css">
	<link rel="stylesheet" type="text/css" href="css_files/chapter_list.css">
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
		if(isset($_SESSION['login_user'])){
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
	<div class="manga_details">
		<div class="manga_image">
		<!-- Use databases to pull images and links to here -->
		<?php
		$file_path = "";
		$manhwa_author = "";
		$no_of_chapters = 0;
		$manhwa_details = "";
		$query_result =  mysqli_query($db,"SELECT * FROM manhwa_list WHERE manhwa_name='$manhwa_name'");
		//work on query result row by row
		$row_users = mysqli_fetch_array($query_result);
		//extract details and output
		$file_path = $row_users['file_path'];
		$manhwa_author = $row_users['manhwa_author'];
		$no_of_chapters = $row_users["no_of_chapters"];
		$manhwa_details = $row_users['manhwa_details'];
    	
		echo ("<img  src=$file_path>");
		?>
		</div>
		<div class="manga_title">
			<?php echo ("<h1>$manhwa_name</h1>"); ?>
		</div>
		<div class="manga_table">
			<table>
				<tr>
					<td class="property_title">Name:</td>
					<?php echo("<td>$manhwa_name</td>"); ?>
				</tr>				
				<tr>
					<td class="property_title">Author:</td>
					<?php echo("<td>$manhwa_author</td>"); ?>
				</tr>
				<tr>
					<td class="property_title">Chapters:</td>
					<?php echo("<td>$no_of_chapters</td>"); ?>
				</tr>
			</table>
		</div>
	</div>
	<div class="chapter_list_table">
		<table>
			<tr class="table_header">
				<td>About</td>
			</tr>
			<tr>
				<td>
					<?php echo ("$manhwa_details"); ?>
				</td>
			</tr>
			<tr class="table_header">
				<td> Chapters </td>
			</tr>
			
			<?php
				for($i = 1;$i <= $no_of_chapters; $i++){
					echo ("<tr>");
					echo ("<td><a href='reader.php?manhwa_name=$manhwa_name?chapter_no=$i'>Chapter $i: </a> </td>");
					echo ("</tr>");
				}
			?>
			
		</table>
	</div>
</div>

</body>
</html>
