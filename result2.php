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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="result_bg">

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

<div class="container-fluid result-list">
    <?php
      if(isset($_GET['city_id_url']))
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
    ?>
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


<!-- Modal -->
<div id="menuModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>MENU CARD:</b></h4>
      </div>
      <div class="modal-body">
        <p>Hotel name:</p>
        <table class='table table-bordered table-striped'>
        <thead>
          <tr>
            <th>Item name</th>
            <th>Item Price</th>
          </tr>
        <thead>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Login Modal ends-->
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>