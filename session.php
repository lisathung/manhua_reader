<?php
   include('php_files/config.php');
   session_start();

   // check that the 'registered' key exists
   if (isset($_SESSION['login_user'])) {
      $user_check = $_SESSION['login_user'];
      $ses_sql = mysqli_query($db,"select username from users_passwords where username = '$user_check' ");
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      $login_session = $row['username'];
   }
   else if(!isset($_SESSION['login_user'])){
      // header("location:login.php");
      // die();
   }

   /*
   if(!isset($_SESSION['login_user'])){
      echo "yes";
      die();
   }
   */
?>