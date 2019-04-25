<?php
	//Initialise variables
//	$username = $_SESSION['login_user'];
	$chapter_file_path = "";
	$manhwa_author = "";
	$no_of_chapters = 0;
	$manhwa_details = "";

	//get details from chapter list page
	$manhwa_name = $_GET['manhwa_name'];
	$chapter_no = (int)$_GET['chapter_no'];

	//check if chapter is locked
	$locked = mysqli_query($db,"SELECT * FROM locked_chapters WHERE manhwa_name='$manhwa_name' and chapter_no='$chapter_no'");

	if(mysqli_num_rows($locked)>=1){
		// echo ("chapter is locked");
		
		// check if user is logged in
		if (isset($_SESSION['login_user'])){
			$username = $_SESSION['login_user'];
			$paid = mysqli_query($db,"SELECT * FROM payments WHERE username='$username' and manhwa_name='$manhwa_name' and chapter_no=$chapter_no");
			
			// check if user has paid
			if(mysqli_num_rows($paid)>=1){
				// echo ("user has paid");
			}
			else{	
				// echo ("user has not paid");
				header("location:../purchasePage.php?manhwa_name=$manhwa_name&chapter_no=$chapter_no");
			}
		}
		else{			
			 header("location:../purchasePage.php?manhwa_name=$manhwa_name&chapter_no=$chapter_no");			
		}
	}
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
?>