<?php
	include 'php_files/config.php';
	session_start();
	//initialise varibles
	$cover_file_path = "";
	$manhwa_author = "";
	$no_of_chapters = 0;
	$manhwa_details = "";
	$manhwa_name = $_GET['manhwa_name'];
	
	//Use databases to pull images and links
	$query_result =  mysqli_query($db,"SELECT * FROM manhwa_list WHERE manhwa_name='$manhwa_name'");

	//work on query result row by row
	$row_users = mysqli_fetch_array($query_result);

	//extract details and output
	$manhwa_details = $row_users['manhwa_details'];
	$manhwa_author = $row_users['manhwa_author'];
	$no_of_chapters = $row_users["no_of_chapters"];
	$cover_file_path = $row_users['cover_file_path'];

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
		  <img onclick="myFunction()" class="dropbtn" src="images/user.png"></img>
		  <div id="myDropdown" class="dropdown-content">
		    <a href="userPage.php">My Account</a>
		    <a href="logout.php">Logout</a>
		  </div>
		</div>

		<script>
		/* When the user clicks on the button, 
		toggle between hiding and showing the dropdown content */
		function myFunction() {
		  document.getElementById("myDropdown").classList.toggle("show");
		}

		// Close the dropdown if the user clicks outside of it
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbtn')) {
		    var dropdowns = document.getElementsByClassName("dropdown-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}
		</script>
		<?php }else{   ?>
		<a class="login" href="loginPage.php">SIGN IN</a>
		
		<!-- not logged in -->
		<?php
		}
		?>
	</div>
</div>

<div class="mainFrame">
	<div class="manga_details">
		<div class="manga_image">
			<?php echo ("<img src=$cover_file_path>"); ?>
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
		</table>
	</div>
	<!-- Loading chapterlinks -->
	<div class='chapter_list'>
		<?php
		for($i = 1;$i < $no_of_chapters; $i=$i+1){
			echo("<a href='readerPage.php?manhwa_name=$manhwa_name&chapter_no=$i'>Chapter: $i </a> <br>");
		}
		?>
	</div>
</div>

</body>
</html>
