<?php
   include("config.php");
   session_start();
   $error = "";

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM users_passwords WHERE username='$myusername' and password='$mypassword' ";

      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
         $_SERVER["LOGGED_IN"] = 1;
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
w
<html>
<head>
   <title>Manhuwa Reader</title>
   <link rel="stylesheet" type="text/css" href="css_files/basic.css">
   <link rel="stylesheet" type="text/css" href="css_files/login.css">
</head>
<body>


<div class="navbar">
   <div class="logo"><a href="mainPage.html"><img src="images\logo.png"></a></div>

   <!-- NAVIGATION LINKS -->
   <div class="nav_left">
      <a class="link" href="#home">HOME</a> 
      <a class="link" href="#AllManga">ALL MANGA</a>
      <a class="link" href="#New">LATEST</a>
   </div>
   <div class="nav_right"> 
      <!-- SEARCH BAR -->
      <input type="text"  class="text" placeholder="Search...">
      <a class="login" href="login.html">SIGN IN</a>
   </div>
</div>

<div class="mainFrame">
   <h2 class="page_header">
      Hello! Please login.
   </h2>
   <form class="login_box" method="post">
      <div class="field">
         <label >Username</label>
         <input type="text" name="username">
      </div>
      
      <div class="field">
         <label class="password">Password</label>
         <input type="password" name="password">
      </div>

      <input type="submit" class="login_button" value="Login">
   </form>
   </div>

</body>
</html>
