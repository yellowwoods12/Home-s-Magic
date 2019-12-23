<!-- Navbar -->
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
              
              <ul class="dropdown-menu">
                <?php get_locality_dropdown(); ?>
              </ul>
            </li>
            
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span>Cuisine</span>
                <span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu"> <!-- dropdown-item class -->
                <?php get_cuisine_dropdown(); ?>
              </ul>
            </li>
          </ul>

          <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
          </form>-->

          <ul class='navbar-nav'>
            <?php
              if(!isset($_SESSION['cust_log_id']))
                echo"
                <li class='nav-item'>
                  <button class='btn btn-outline-primary' data-toggle='modal' data-target='#signupModal'>
                    Sign Up
                  </button>
                </li>
                
                <li class='nav-item'>
                  <button class='btn btn-outline-success' data-toggle='modal' data-target='#signinModal'>
                    Sign In
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
