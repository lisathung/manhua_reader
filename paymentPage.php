<?php
   include("php_files/config.php");
   session_start();

   $username = $_SESSION['login_user'];

   // Redirect to user page if payment details exist
   $query_result =  mysqli_query($db,"SELECT * FROM payment_details WHERE username='$username'");
   if (mysqli_num_rows($query_result)>=1){
      print("yes");
      header("location:userPage.php");
   }else{
      print("nope");
      // nothing
   }
?>

<html>
<head>
   <title>Manhuwa Reader</title>
   <link rel="stylesheet" type="text/css" href="css_files/basic.css">
   <link rel="stylesheet" type="text/css" href="css_files/paymentPage.css">
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
  <div class="payment_details">
      <!-- Add details to user page -->
      <form action="php_files/payment.php" method="post">

      <h3>Billing Adress</h3>
      <div class="billing_address">

         <div class="group">
         <label for="fname" class="detail_header">Full Name</label><br/>
         <input type="text" id="fname" name="fname" placeholder="Enter Full Name">
         </div>

         <div class="group">
         <label for="email" class="detail_header">E-Mail</label><br/>
         <input type="text" id="email" name="email" placeholder="Enter E-Mail"><br>
         </div>
         
         <div class="group">
         <label for="address" class="detail_header"> Address</label><br/>
         <input type="text" id="address" name="address" placeholder="Enter Address">
         </div>

         <div class="group">
         <label for="state" class="detail_header"> State</label><br/>
         <input type="text" id="state" name="state" placeholder="Enter State">      
         </div>

         <div class="group">
         <label for="city" class="detail_header"> City</label><br/>
         <input type="text" id="city" name="city" placeholder="Enter City">  
         </div>

         <div class="group">
         <label for="zip" class="detail_header"> Zip</label><br/>
         <input type="text" id="zip" name="zip" placeholder="Enter Zipcode">  
         </div>
      </div>

      <h3>Card Details</h3><br>
      <div class="card_details">

         <div class="group">
         <label for="card_name" class="detail_header"> Name on Card</label><br/>
         <input type="text" id="card_name" name="card_name" placeholder="Enter name on card">      
         </div>
         
         <div class="group">
         <label for="card_num" class="detail_header"> Card Number</label><br/>
         <input type="text" id="card_num" name="card_num" placeholder="Enter number on card">  
         </div>

         <div class="group">
         <label for="exp_month" class="detail_header"> Expiry Month</label><br/>
         <input type="number" id="exp_month" name="exp_month" placeholder="Expiry Month"> 
         </div>

         <div class="group">
         <label for="exp_year" class="detail_header"> Expiry Year</label><br/>
         <input type="number" id="exp_year" name="exp_year" placeholder="Expiry Year">
         </div>

         <div class="group">
         <label for="cvv" class="detail_header"> CVV</label><br/>
         <input type="password" id="cvv" name="cvv" placeholder="CVV Number">  
         </div>
      </div>
      <button class="button" type="submit">Save</button>
   </div>
   </form>
</div>

</body>
</html>
