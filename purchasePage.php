<?php
    // session_start();
    include("php_files/config.php");
    session_start();

    if(!isset($_SESSION['login_user'])){
        header("location:loginPage.php");
    }
    else{
        include("php_files/purchase.php");    
    }

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
        <img onclick="myFunction()" class="dropbtn" src="images/user.png"></img>
        <div id="myDropdown" class="dropdown-content">
          <a href="userPage.php">My Account</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>

      <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
      </script>
      <?php }else{   ?>
      <a class="login" href="loginPage.php">SIGN IN</a>
      
      <!-- not logged in -->
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
