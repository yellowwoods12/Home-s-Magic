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
    <link rel="stylesheet" href="FA/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/save_details.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
    <title>Home's Magic|Payment</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body id="rest-log-bag">

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
            echo "<div class='navbar navbar-left navbar-greet' style='margin-left:33%;'>";
            echo "<p style='font-size:25px;'>Hello ".$_SESSION['cust_log_fname']." ".$_SESSION['cust_log_lname'];
            echo "</p>";
            echo "</div>";
          } 
        ?>

        <ul class="nav navbar-nav navbar-right menu_list">
          <li class="active active_now"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
          <li class="active active_now"><a href="mycart.php?rest_id_url2=<?php echo $_GET['rest_id_url2']; ?>"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;My Thali<span class="sr-only">(current)</span></a></li>
        </ul>
        </div>
      </div>
</nav>

<div class="container result-list">
<?php
if(isset($_SESSION['cust_log_id']))
  showOrderSummary();
else
{
  echo "<script>window.alert('Login First to Order Food')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
?>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>


?>