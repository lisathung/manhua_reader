<?php
   include("php_files/config.php");
   include("php_files/purchase.php");
?>

<html>
<head>
   <title>Manhuwa Reader</title>
   <link rel="stylesheet" type="text/css" href="css_files/basic.css">
   <link rel="stylesheet" type="text/css" href="css_files/purchasePage.css">
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
         <img src="images/user.png" class="dropbtn">
         <div class="dropdown-content">
            <a href="userPage.php">Account Details</a>
            <a href="userPage.php">Favourite Manga</a>
            <a href="logout.php">Logout</a>
         </div>
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
  <div class="purchase_details">
      <!-- Add details to user page -->
      <form method="post" action='php_files/updatePurchase.php'>
         <?php
            echo("<input type='hidden' name='manhwa_name' value='$manhwa_name'/>");
            echo("<input type='hidden' name='chapter_no' value='$chapter_no'/>");

            echo ($manhwa_name." Chapter ".$chapter_no." is not yet available for non-paying members.<br/>");
            echo ("<button type='submit'>Purchase</>");
         ?>
      </form>
   </div>
   </form>
</div>

</body>
</html>
