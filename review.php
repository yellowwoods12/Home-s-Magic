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

  <title>Home's Magic | REVIEWS</title>
</head>


<body id="result_bg">

<div class="page-container">
  <!-- Navbar -->
  <?php require('includes/navbar.php'); ?>


  <!-- Page Main Content -->
  <div class="content-wrap">
    <div class="container review">
      <div class="row">
        <div class="col-lg-4 offset-md-0 col-md-5 offset-sm-1 col-sm-10 restaurant-details">
          <?php getReviewRestaurant(); ?>
        </div>

        <div class="col-lg-8 col-md-7">
          <div class="restaurant-reviews">
            <?php
              getRestaurantReviews();
              
              if (isset($_SESSION['cust_log_id']))
                echo "
                <button class='btn btn-outline-primary review-btn' data-toggle='modal' data-target='#reviewModal'>
                  WRITE A REVIEW
                </button>";
            
              else
                echo "
                <p>Login to add review</p>";
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <?php require('includes/footer.php'); ?>
</div>



<!-- modal for Sign Up -->
<?php require('includes/signupModal.php'); ?>

<!-- modal for Sign In -->
<?php require('includes/signinModal.php'); ?>


<!-- modal for Review -->
<?php require('includes/reviewModal.php'); ?>



<!-- Common Custom Script -->
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/review.js"></script>

</body>

</html>
