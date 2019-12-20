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
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link rel="stylesheet" href="FA/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Charmonman" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans&display=swap" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/save_details.js"></script>
    <title>Home's Magic|HOME</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-circle-up"style="font-size:42px;" aria-hidden="true"></i></button>
    <div class="container-fluid jumbotron col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <a href='index.php' ><h1 id="head-text">Home Magic</h1></a>
        <h2 style="font-family: 'Charmonman', cursive;" class = "animated infinite bounce">"GHAR JAISA KHAANA" Now At Your Click</h2>
        <div class="buttons">
          <?php
          if(!isset($_SESSION['cust_log_id']))
          {
          echo"<button class='btn btn-primary' data-toggle='modal' data-target='#signupModal'>Register</button>
          <button class='btn btn-success' data-toggle='modal' data-target='#loginModal'><i class='fa fa-user-plus' aria-hidden='true'></i>Sign In</button>";
          }
          else
          {
            echo "<h3>";
            echo "Hello ".$_SESSION['cust_log_fname']." ".$_SESSION['cust_log_lname'];
            echo "</h3><br>";
            echo "
            <button class='btn btn-danger' onclick='logout()'>LOGOUT</button>
            ";
          }
          ?>
        </div>
    </div>

    <div class="row">
      <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center headings" style="margin-top: -10px;"><h1 id="set"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;SEARCH BY LOCALITY</h1></div>
      </div>
    </div>
    <div class="row">
      <div class="container">
            <?php getCity(); ?>
      </div>
    </div>

    <div class="row" style="margin-top:30px;">
      <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center headings"><h1><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;SEARCH BY CUISINE</h1></div>
      </div>
    </div>
    <div class="row cuisine-list">
      <div class="container-fluid">
          <div class="container">
              <?php getCuisine(); ?>
          </div> 
      </div>
    </div>

  <!-- footer starts here -->
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
          <div class="col-lg-12"><p style="color:#ffffff;">&copy;2018 CREATED BY TRIPTI SHUKLA</p></div>
        </div>
      </div>
      </div>

  <!-- footer ends here -->

    <!--modal for Sign Up-->
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
<!--Login Modal ends-->

 <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/1.0.0/typewriter.min.js"></script>
    <script type="text/javascript" src=js/custom.js></script>
    <script type="text/javascript" src=js/custom1.js></script>
  </body>
</html>