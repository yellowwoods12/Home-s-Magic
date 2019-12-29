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

  <title>Home's Magic | RESULTS</title>
</head>


<body id="result_bg">

<div class="page-container">
  <!-- Navbar -->
  <?php require('includes/navbar.php'); ?>


  <!-- Page Main Content -->
  <div class="content-wrap">
    <!-- Search Bar -->
    <div class="container search-bar">
      <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Search</span>
          </div>

          <input type="text" name="search" class="form-control">
        
          <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>


    <!-- Result List -->
    <div class="container result-list">
      <?php
        if (isset($_GET['city_id_url'])) {
          $var = $_SESSION['city_id_url'] = $_GET['city_id_url'];
          getByCity($var);
        }

        if (isset($_GET['cuisine_url'])) {
          $var = $_SESSION['cuisine_url'] = $_GET['cuisine_url'];
          getByCuisine($var);
        }

        if (isset($_GET['search'])) {
          $var = $_SESSION['search'] = $_GET['search'];
          getBySearch($var);
        }
      ?>
    </div>
  </div>


  <!-- Footer -->
  <?php require('includes/footer.php'); ?>
</div>



<!-- modal for Sign Up -->
<?php require('includes/signupModal.php'); ?>

<!-- modal for Sign In -->
<?php require('includes/signinModal.php'); ?>


<!-- modal for Menu -->
<?php require('includes/menuModal.php'); ?>



<!-- Common Custom Script -->
<script type="text/javascript" src=js/common.js></script>

</body>

</html>
