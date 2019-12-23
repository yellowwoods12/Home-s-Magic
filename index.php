<?php
  session_start();
  include('functions.php');
  include('connection.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <!-- common head content -->
  <?php require('includes/head.php'); ?>

  <title>Home's Magic | HOME</title>
</head>

<body>

<!-- Main Banner -->
<div class="banner text-center">
  <div class="banner-content">
    <h1 id="head-text">Home Magic</h1>
    
    <h2 style="font-family: 'Charmonman', cursive;">
      "ghar&nbsp;&nbsp;jaisa&nbsp;&nbsp;khaana"&nbsp;
      now&nbsp;&nbsp;at&nbsp;&nbsp;your&nbsp;&nbsp;click
    </h2>

    <div class="buttons">
      <?php
        // if user has not logged in, show signup and signin buttons
        if (!isset($_SESSION['cust_log_id'])) {
          echo "
          <button class='btn btn-outline-primary' data-toggle='modal' data-target='#signupModal'>
            SIGN UP
          </button>
          
          <button class='btn btn-outline-success' data-toggle='modal' data-target='#signinModal'>
            SIGN IN
          </button>";
        }

        // else show user name and logout buttons -->
        else {
          echo "
          <h3>Hello, ".$_SESSION['cust_log_fname']." ".$_SESSION['cust_log_lname']."</h3>
          
          <button class='btn btn-outline-danger' onclick='logout()'>
            LOGOUT
          </button>";
        }
      ?>
    </div>
  </div>

  <!-- Scroll down animation arrow -->
  <div id="scroll-down"></div>
</div>
<!-- Main Banner ends -->


<!-- Locality -->
<div id="locality" class="container-fluid headings text-center">
  <i class="fas fa-store"></i>
  <span>Search by LOCALITY</span>
</div>

<div class="container">
  <div class="row cities">
    <?php getCity(); ?>
  </div>
</div>
<!-- Locality ends -->


<!-- Cuisine -->
<div class="container-fluid headings text-center">
  <i class="fas fa-utensils"></i>
  <span>Search by CUISINE</span>
</div>

<div class="container">
  <div class="row cuisines">
    <?php getCuisine(); ?>
  </div>
</div>
<!-- Cuisine ends -->


<!-- Footer -->
<?php require('includes/footer.php'); ?>


<!-- modal for Sign Up-->
<?php require('includes/signupModal.php'); ?>

<!-- modal for Sign In -->
<?php require('includes/signinModal.php'); ?>



<!-- JavaScript plugin for Banner Typewriter heading -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>
<!-- Custom Script -->
<script src=js/index.js></script>

</body>

</html>
