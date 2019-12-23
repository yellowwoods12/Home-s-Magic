<?php
  session_start();
  include('functions.php');
  include('connection.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <!--<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="FA/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Domine" rel="stylesheet">
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/save_details.js"></script>-->
  <!-- common head content -->
  <?php require('includes/head.php'); ?>

  <title>Home's Magic | RESULTS</title>
</head>

<body id="result_bg">

<div class="page-container">
  <div class="content-wrap">
    <!-- Navbar -->
    <?php require('includes/navbar.php'); ?>

    
  </div>


  <!-- Footer -->
  <?php require('includes/footer.php'); ?>
</div>


<div class="container-fluid result-list">
    <?php
      /*if(isset($_GET['city_id_url']))
      {
        $var=$_GET['city_id_url'];
        $_SESSION['city_id_url'] = $var;
        printByCity($var);
      }

      if(isset($_GET['cuisine_url']))
      {
        $var=$_GET['cuisine_url'];
        $_SESSION['cuisine_url'] = $var;
        printByCuisine($var);
      }

    if(isset($_GET['search']))
      {
        $var=$_GET['keyword'];
        $_SESSION['keyword'] = $var;
        printBySearch($var);
      }
    */?>
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
