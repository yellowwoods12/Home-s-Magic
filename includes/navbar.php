<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Home's&nbsp;&nbsp;Magic</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Locality<span>
            <span class="caret"></span>
          </a>
              
          <div class="dropdown-menu">
            <ul>
              <?php get_locality_dropdown(); ?>
            </ul>
          </div>
        </li>
            
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Cuisine</span>
            <span class="caret"></span>
          </a>
              
          <div class="dropdown-menu">
            <ul> <!-- dropdown-item class -->
              <?php get_cuisine_dropdown(); ?>
            </ul>
          </div>
        </li>
      </ul>

      <ul class='navbar-nav'>
        <?php
          if(!isset($_SESSION['cust_log_id']))
            echo"
            <li class='nav-item'>
              <button class='btn btn-outline-primary' data-toggle='modal' data-target='#signupModal'>
                SIGN UP
              </button>
            </li>
            
            <li class='nav-item'>
              <button class='btn btn-outline-success' data-toggle='modal' data-target='#signinModal'>
                SIGN IN
              </button>
            </li>";

          else
            echo "
            <li class='nav-item nav-greet'>
              <span>Hello, ".$_SESSION['cust_log_fname']." ".$_SESSION['cust_log_lname']."</span>
            </li>
            
            <li class='nav-item'>
              <button onclick='logout()' class='btn btn-outline-danger'>
                LOGOUT
              </button>
            </li>";
        ?>
      </ul>
    </div>
  </div>
</nav>
