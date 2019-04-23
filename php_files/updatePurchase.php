<?php
   include("config.php");
   session_start();
   $username = $_SESSION['login_user'];
   $manhwa_name = $_POST['manhwa_name'];
   $chapter_no = $_POST['chapter_no'];

   // Redirect to payment page if payment details do not exist
   $query_result =  mysqli_query($db,"SELECT * FROM payment_details WHERE username='$username'");
   if (mysqli_num_rows($query_result)>=1){
      echo ("yes payment details exist");
   	
      echo ("INSERT INTO `payments` (`username`, `manhwa_name`, `chapter_no`) VALUES ('$username','$manhwa_name','$chapter_no')");
      // success, now add purchase to the user purchase history
   	$insert_query =  mysqli_query($db,"INSERT INTO `payments` (`username`, `manhwa_name`, `chapter_no`) VALUES ('$username','$manhwa_name','$chapter_no')");

      // check if insert was successful
      if($insert_query){
         echo "insert successful";
      }
      // redirect to reader page
   	header("location:../readerPage.php?manhwa_name=$manhwa_name&chapter_no=$chapter_no");
   }else{
   	// redirect to 
   	header("location:../paymentPage.php");
   }
?>