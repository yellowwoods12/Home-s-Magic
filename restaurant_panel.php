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
    <link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/save_details.js"></script>
    <title>RESTAURANT--SIGN UP/LOGIN</title>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="rest-log-bag">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 id="rest-logo">Homes's Magic</h1>
        <h2 style="font-family: 'Chewy', cursive;">HOME RESTAURANT</h2>
      </div>
    </div>
    <div class="row rest-log-sign-wrapper">
      <div class="col-lg-5 col-lg-offset-1 box">
      <h3>LOGIN:</h3>
        <form id="restLogin" method="POST">
               <div class="form-group">
                 <label for="login_email">Email address:</label>
                 <input type="email" class="form-control" id="login_email" placeholder="Email">
               </div>
               <div class="form-group">
                 <label for="login_pwd">Password:</label>
                 <input type="password" class="form-control" id="login_pwd" placeholder="Password">
               </div>
               <div class="form-group rest-submit-grp">
                 <input type="submit" class="btn rest-ls-btn" name="rest_log" value="Log In">&nbsp;&nbsp;&nbsp;
                 <input type="reset" class="btn rest-ls-btn" name="rest_log_reset" value="Cancel">
               </div>
        </form>
      </div>
      <div class="col-lg-5 col-lg-offset-1 box">
        <h3>SIGN UP:</h3>
        <form id="restSignUp" method="POST">
                <div class="form-group">
                 <label for="rest_sign_name">Restaurant Name:</label>
                 <input type="text" class="form-control" id="rest_sign_name" placeholder="Name">
               </div>
               <div class="form-group">
                 <label for="rest_sign_address">Restaurant Address:</label>
                 <textarea class="form-control" id="rest_sign_address" rows="6" cols="5"></textarea>
               </div>
               <div class="form-group">
                 <label for="rest_sign_local">Restaurant Locality:</label>
                  <select name="rest_sign_local" id="rest_sign_local" class="form-control">
                    <option></option>
                    <?php
                      $city_query = "SELECT * FROM city";
                      $exec_city_query = mysqli_query($con,$city_query);
                      while($row = mysqli_fetch_array($exec_city_query))
                      {
                        $city_name = $row['city_name'];
                          echo "<option>$city_name</option>";
                      }
                    ?>
                  </select>
               </div>

               <div class="form-group">
                 <label for="rest_sign_cuis">Restaurant Speciality:</label>
                 <table class="cuisine-table">
                 <?php
                  $cuisine_query = "SELECT * FROM cuisine";
                  $exec_cuisine_query = mysqli_query($con,$cuisine_query);
                  while($row = mysqli_fetch_array($exec_cuisine_query))
                  {
                    $cuisine_name = $row['cuisine_name'];
                    echo "
                      <tr>
                        <td style=height:40px !important;'><b>$cuisine_name:</b></td>
                        <td style='height:40px !important;'><b><input type='checkbox' id='rest_sign_cuis' name='rest_sign_cuis' value='$cuisine_name' style='margin-left:20px;height:20px;width:20px;margin-top:12px;'></b></td>
                      </tr>
                    ";
                  }
                 ?>
                 </table> 
               </div>

               <div class="form-group">
                 <label for="rest_sign_phone">Contact:</label>
                 <input type="text" class="form-control" id="rest_sign_phone" placeholder="Phone">
               </div>

                <div class="form-group">
                 <label for="rest_sign_email">Email address:</label>
                 <input type="email" class="form-control" id="rest_sign_email" placeholder="Email">
               </div>
               <div class="form-group">
                 <label for="rest_sign_pwd">Password:</label>
                 <input type="password" class="form-control" id="rest_sign_pwd" placeholder="Password">
               </div>
               <div id='rest_sign_stat'></div>
               <div class="form-group rest-submit-grp">
                 <input type="button" class="btn rest-ls-btn" name="rest_log" value="Sign Up" onclick='register_restaurant()'>&nbsp;&nbsp;&nbsp;
                 <input type="reset" class="btn rest-ls-btn" name="rest_log_reset" value="Cancel">
               </div>
        </form>

      </div>
    </div>
  </div>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>