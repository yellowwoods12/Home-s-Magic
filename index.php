<?php
  session_start();
  include('functions.php');
  include('connection.php');
?>

<!DOCTYPE html>

<html lang="en">



  <title>Home's Magic | HOME</title>
</head>

<body>


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
  </div>


  <!-- Footer -->
  <?php require('includes/footer.php'); ?>
</div>


<!-- modal for Sign Up-->
<?php require('includes/signupModal.php'); ?>

<!-- modal for Sign In -->
<?php require('includes/signinModal.php'); ?>



<!-- Common Custom Script -->
<script type="text/javascript" src="js/common.js"></script>
<!-- JavaScript plugin for Banner Typewriter heading -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>


</body>

</html>
