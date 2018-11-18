<?php
session_start();
include('functions.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home's Magic|RESULT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="FA/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Domine" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/save_details.js"></script>
    <script type="text/javascript" src="js/review.js"></script>
     
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   
   <nav class="navbar navbar-default navbar-fixed-top" id="up-nav">
    <div class="container-fluid">
      <div class="navbar-header">
              <button class="navbar-toggle collapsed toggle-button" data-toggle="collapse" data-target="#up_nav" aria-expanded="false">
              <span class="sr-only"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <div class="logo_heading">
                <a href="index.php" style="float:left;">
                  <div class="navbar-header heading"><h2>Home's Magic</h2></div>
                </a>
              </div>
            </div>

    <div class="collapse navbar-collapse" id="up_nav">

        <form class="navbar-form navbar-left search-it" method="GET" action="result2.php">
            <div class="form-group">
              <input type="text" class="form-control search-area" name="keyword" placeholder="Search">
             </div>
             <button type="submit" class="btn btn-default search-btn" name="search"><i class="fa fa-search" aria-hidden="true" style="color:white;"></i></button>
        </form>

        <?php
         if(!isset($_SESSION['cust_log_id']))
         {
          echo"
          <div class='navbar navbar-left navbar-reg'>
          <button class='btn btn-default' data-toggle='modal' data-target='#signupModal'>Sign Up</button>
          <button class='btn btn-default' data-toggle='modal' data-target='#loginModal'>Login</button>
          </div>
          ";
          }
          else
          {
            echo "<div class='navbar navbar-left navbar-greet'>";
            echo "Hello ".$_SESSION['cust_log_fname']." ".$_SESSION['cust_log_lname'];
            echo "</h4>";
            echo "
            <button onclick='logout()' class='btn btn-danger' style='margin-left:24px;'>LOGOUT</button>
            ";
            echo "</div>";
          } 
        ?>

        <ul class="nav navbar-nav navbar-right menu_list">
          <li class="active active_now"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Locality<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php get_locality_dropdown(); ?>
                </ul>
              </li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuisine<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php get_cuisine_dropdown(); ?>
                </ul>
              </li>
        </ul>

        </div>
      </div>
</nav>

<div class="container result-list-reviews">
<div class="row">
  <div class="col-lg-4" style="font-family:'Questrial',sans-serif; height:auto; padding:20px; border-right:1px solid #e6e6e6;">
  <?php reviewDisplay(); ?>
  </div>
  <div class="col-lg-7" style="height:200px;padding:20px;">
    <div class='row col-lg-offset-1 col-lg-10'>
      <?php showReview(); ?>
      <?php
      if(isset($_SESSION['cust_log_id']))
      echo"<button class='btn btn-primary review-btn' data-toggle='modal' data-target='#reviewModal'>Write a review</button>";
      else
        echo "<button class='btn btn-success review-btn' data-toggle='modal' data-target='#loginModal'>Login to add review</button>";
      ?>
    </div>
  </div>
</div>
</div> 

 <div class="nav navbar-inverse foot">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Contact Us:</h4>
            <p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;help.service@homesmagic.com</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;1800-194-234(toll-free)</p>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Headquarters Address:</h4>
            <p>Block no. 304, Flexon Apartments, Noida</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 foot-content">
            <h4>Follow Us:</h4>
            <a href="#" class="sm_button" id="fb_button"><i class="fa fa-facebook-square fa-2x"></i></a>
            <a href="#" class="sm_button" id="twitter_button"><i class="fa fa-twitter-square fa-2x"></i></a>
            <a href="#" class="sm_button" id="youtube_button"><i class="fa fa-youtube-play fa-2x"></i></a>
            <a href="#" class="sm_button" id="instagram_button"><i class="fa fa-instagram fa-2x"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Career</a></li>
            </ol>
          </div>
        </div>
        <div class="row" style="margin-top:20px;">
          <div class="col-lg-12"><p style="color:#b3b3b3;">&copy;2018 CREATED BY TRIPTI SHUKLA</p></div>
        </div>
      </div>
    </div>

<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
  <form id="signupForm" method="POST">
      <div class="modal-body">
        <!--Sign up form-->
            <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" placeholder="Enter First Name">
            </div>

        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" placeholder="Enter last Name">
        </div>

        <div class="form-group">
          <label for="mail">Email-id:</label>
          <input type="email" class="form-control" id="mail" placeholder="Enter Email Id">
        </div>

        <div class="form-group">
          <label for="phone">Phone number:</label>
          <input type="number" class="form-control" id="phone" placeholder="Phone Number">
        </div>

         <div class="form-group">
          <label for="Address">Address:</label>
          <textarea name="address" id="address" class="form-control" cols="25" rows="5" placeholder="Enter your address"></textarea>
        </div>

        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter Password">
        </div>

        <div class="form-group">
          <label for="cpwd">Confirm Password:</label>
          <input type="password" class="form-control" id="cpwd" placeholder="Enter Password Again">
        </div>

        <div id="status"></div>

      </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" href="javascript:void(0);" onclick="register_details()">Sign Up</button>
        </div>

  </form>
      </div>
  </div>
</div>

<!--modal for login-->
<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Login</h3>
        </div>
          <form id="LoginForm" method="POST">
            <div class="modal-body">
              <!--login form-->
               <div class="form-group">
                 <label for="login_email">Email address:</label>
                 <input type="email" class="form-control" id="login_email" placeholder="Email">
               </div>
               <div class="form-group">
                 <label for="login_pwd">Password:</label>
                 <input type="password" class="form-control" id="login_pwd" placeholder="Password">
               </div>

                <div id="loginStatus"></div>
                <!--login form ends-->
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="login()">Log In</button>
            </div>
          </form>
    </div>

  </div>
</div>

<!--review Modal-->
<div id="reviewModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Write Review</h3>
      </div>
      <form>
      <div class="modal-body">
        <div class="form-group">
          <label for="review-title">Title:</label>
          <input type="text" class="form-control" id="review-title" placeholder="Enter Title">
        </div>
          <div class="form-group">
            <label for="rating">Rating:</label>
            <div id="rating">
              <h4><span style="color:#ff8000;"><i class="fa fa-star-o stars" aria-hidden="true" id="0"></i><i class="fa fa-star-o stars" aria-hidden="true" id="1"></i><i class="fa fa-star-o stars" aria-hidden="true" id="2"></i><i class="fa fa-star-o stars" aria-hidden="true" id="3"></i><i class="fa fa-star-o stars" aria-hidden="true" id="4"></i></span></h4>              
            </div>
          </div>
        <div class="form-group">
          <label for="review-desc">Password:</label>
          <textarea class="form-control" id="review-desc" rows="10" cols="20" placeholder="Description"></textarea> 
        </div>
        <div id="review-status"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="submit_review(<?php echo $_GET['rest_id_url'];?>)">Submit Review</button>
      </div>
      </form>
    </div>

  </div>
</div>


  <script src="js/bootstrap.min.js"></script>
  </body>


  </html>