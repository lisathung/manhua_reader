<?php
   include("php_files/config.php");
   session_start();
   if(isset($_SESSION['login_user'])){
   }
   else{
      header("location:loginPage.php");
   }
?>

<html>
<head>
   <title>Manhuwa Reader</title>
   <link rel="stylesheet" type="text/css" href="css_files/basic.css">
   <link rel="stylesheet" type="text/css" href="css_files/userPage.css">
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
         <a href="userPage.php">User</a>         
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
   <div class="user_box">
      <div class="personal_info">
         <img class ="profile_pic" src="images/profile_pic.jpg">
         <table>
            <tr>
               <td class="username">Username:</td>
            </tr>
            <tr>
               <td class="email">Email:</td>
            </tr>
         </table>
      </div>
      <div class="suscription_details">
         suscription details
      </div>
   </div>

</div>

</body>
</html>
