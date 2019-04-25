<?php
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent via form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users_passwords WHERE username='$myusername' ";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername , table row must be 1 row
      
      if($count == 1) {
         $error = "username already exist";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }else {
        echo "<script type='text/javascript'>alert('$myusername');</script>";
        $sql = "INSERT INTO users_passwords VALUES ('$myusername','$mypassword')";
        $result=mysqli_query($db,$sql);
        $_SESSION['login_user'] = $myusername;
        header("location: mainPage.php");
      }
   }
?>