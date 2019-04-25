<?php
   //get details from chapter list page
   $manhwa_name = $_GET['manhwa_name'];
   $chapter_no = (int)$_GET['chapter_no'];

   $username = $_SESSION['login_user'];
   // Redirect to payment Details page if payment details do not exist
   $query_result =  mysqli_query($db,"SELECT * FROM payment_details WHERE username='$username'");

   if ($query_result){
      // success
   }else{
      header("location:../paymentPage.php");
   }
?>