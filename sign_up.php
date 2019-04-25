<?php
   include("php_files/config.php");
   include("php_files/signup.php");
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
   <div class="chibi_cat"><img src="images/chibi_cat.png" > Please enter your details</img></div>
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
      <input type="submit" class="login_button" value="sign up">
   </form>
</div>

</body>
</html>
