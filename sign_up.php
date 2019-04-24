<?php
   include("php_files/config.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users_passwords WHERE username='$myusername' ";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);
      
      // If result matched $myusername , table row must be 1 row
      
      if($count == 1) {
         $error = "username already exist";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }else {
        $myusername=$_POST['username'];
        $mypassword=$_POST['password'];
        $sql = "INSERT INTO users_passwords VALUE ($myusername,$mypassword)";
        $_SESSION['login_user'] = mysqli_real_escape_string($db,$_POST['username']);
        header("location: mainPage.php");
      }
   }
?>

<html>
<head>
   <title>Manhuwa Reader</title>
   <link rel="stylesheet" type="text/css" href="css_files/basic.css">
   <link rel="stylesheet" type="text/css" href="css_files/login.css">
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
   <form class="login_box" method="post">
      <!-- Username Field -->
      <div class="field">
         <label >Username</label>
         <input type="text" name="username">
      </div>
      <!-- Password Field -->
      <div class="field">
         <label class="password">Password</label>
         <input type="password" name="password">
      </div>
      <!-- Login Button -->
      <input type="submit" class="login_button" value="sign_up">
   </form>
   ?>
   ?>
</div>

</body>
</html>
