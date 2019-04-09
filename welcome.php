<?php
   include('php_files/session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $_SESSION['login_user'];
      	echo $_SESSION["logged_in"];
      ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>