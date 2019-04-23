<?php
   include ("config.php");
   session_start();
   // update payment details
   $username = $_SESSION['login_user'];
   $fname = $_POST['fname'];
   $email = $_POST['email'];
   $address = $_POST['address'];
   $state = $_POST['state'];
   $city = $_POST['city'];
   $zip = $_POST['zip'];
   $card_name = $_POST['card_name'];
   $card_num = $_POST['card_num'];
   $exp_month = $_POST['exp_month'];
   $exp_year = $_POST['exp_year'];
   $cvv = $_POST['cvv'];

   echo ("username is=".$username);

   // SQL Insert
   $sql = "INSERT INTO payment_details (`username`, `full_name`, `email`, `address`, `state`, `city`, `zip`, `card_name`, `card_number`, `expiry_month`, `expiry_year`, `cvv`) VALUES ('$username' , '$fname' , '$email' , '$address' , '$state' , '$city' , '$zip' , '$card_name' , '$card_num' , '$exp_month' , '$exp_year' , '$cvv')";

   //insert into database 
   $query_result =  mysqli_query($db,$sql);

   if ($query_result){
      echo ("yes");
      header('location:../paymentPage.php');
   }else{
      echo("no");
      header('location:../paymentPage.php');
   }

?>