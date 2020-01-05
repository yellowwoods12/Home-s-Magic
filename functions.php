<?php

include('connection.php');

// ====================================
    /* HOME PAGE */
    /* ========= */

// fetches list of cities available and creates buttons
function getCity() {
    global $con;

    $city_query = "SELECT * FROM city";
    $exec_city_query = mysqli_query($con, $city_query);

    while ($row = mysqli_fetch_array($exec_city_query)) {
        $city_id = $row['city_id'];
        $city_name = $row['city_name'];

        echo "
        <a href='result2.php?city_id_url=$city_id' class='city'>
          <span>$city_name</span>
        </a>";
    }
}

// fetches list of cuisines available and creates cards
function getCuisine() {
    global $con;

    $cuisine_query = "SELECT * FROM cuisine";
    $exec_cuisine_query = mysqli_query($con, $cuisine_query);

    while ($row = mysqli_fetch_array($exec_cuisine_query)) {
        $cuisine_id = $row['cuisine_id'];
        $cuisine_name = $row['cuisine_name'];
        $cuisine_img = $row['cuisine_image'];

        echo "
        <div class='col-md-4'>
          <a href='result2.php?cuisine_url=$cuisine_id' class='card'>
            <div class='card-image-top' style='background: url(".'"css/'.$cuisine_img.'"'.") no-repeat center; background-size: cover'></div>
            <div class='card-body text-center'>
              <h5 class='card-title'>$cuisine_name</h5>
            </div>
          </a>
        </div>";
    }
}



// ====================================
    /* RESULT PAGE */
    /* =========== */

// fetches list of cities and creates list items
function get_locality_dropdown() {
    global $con;

    $city_query = "SELECT * FROM city";
    $exec_city_query = mysqli_query($con, $city_query);

    while ($row = mysqli_fetch_array($exec_city_query)) {
        $city_id = $row['city_id'];
        $city_name = $row['city_name'];

        echo "
        <li class='dropdown-item'>
          <a href='result2.php?city_id_url=$city_id'>
            $city_name
          </a>
        </li>";
    }
}

// fetches list of cusisines and creates list items
function get_cuisine_dropdown() {
    global $con;

    $cuisine_query = "SELECT * FROM cuisine";
    $exec_cuisine_query = mysqli_query($con, $cuisine_query);

    while ($row = mysqli_fetch_array($exec_cuisine_query)) {
        $cuisine_id = $row['cuisine_id'];
        $cuisine_name = $row['cuisine_name'];

        echo "
        <li class='dropdown-item'>
          <a href='result2.php?cuisine_url=$cuisine_id'>
            $cuisine_name
          </a>
        </li>";
    }
}


// fetches and creates result containers by city
function getByCity($cid) {
    global $con;

    $city_query = "SELECT * FROM restaurant WHERE city_id = $cid";
    $exec_city_query = mysqli_query($con, $city_query);

    if (mysqli_num_rows($exec_city_query) > 0) {
        while ($row = mysqli_fetch_array($exec_city_query)) {
            $rest_id = $row['rest_id'];
            $rest_name = $row['rest_name'];
            $rest_address = $row['rest_address'];
            $rest_speciality = $row['rest_speciality'];
            $rest_phone = $row['rest_phone'];
            $rest_mail = $row['rest_mail'];
            $rest_desc = $row['rest_desc'];
            $rest_img = $row['rest_img'];

            include('includes/resultItem.php');
        }
    }

    else
        echo "
        <div class='row result-none'>
          <p>
            <i class='far fa-times-circle'></i>
            &nbsp;We are coming soon to your locality</p>
        </div>";
}


// fetches and creates result containers by cuisine
function getByCuisine($cid) {
    global $con;

    $get_cuisine = "SELECT * FROM cuisine WHERE cuisine_id = $cid";
    $exec_cuisine = mysqli_query($con, $get_cuisine);

    while ($row2 = mysqli_fetch_array($exec_cuisine))
        $cuisine_name = $row2['cuisine_name'];

    $city_query = "SELECT * FROM restaurant WHERE rest_speciality LIKE '%$cuisine_name%'";
    $exec_city_query = mysqli_query($con, $city_query) or die(mysqli_error($con));

    if (mysqli_num_rows($exec_city_query) > 0) {
        while ($row = mysqli_fetch_array($exec_city_query)) {
            $rest_id = $row['rest_id'];
            $rest_name = $row['rest_name'];
            $rest_address = $row['rest_address'];
            $rest_speciality = $row['rest_speciality'];
            $rest_phone = $row['rest_phone'];
            $rest_mail = $row['rest_mail'];
            $rest_desc = $row['rest_desc'];
            $rest_img = $row['rest_img'];

            include('includes/resultItem.php');
        }
    }

    else
        echo "
        <div class='row result-none'>
          <p>
            <i class='far fa-times-circle'></i>
            &nbsp;Sorry, no result found</p>
        </div>";
}


// fetches and creates result containers by search result
function getBySearch($cid) {
    global $con;

    $search_query = "
        SELECT * FROM restaurant
        WHERE
            rest_name LIKE '%$cid%'
            OR rest_address LIKE '%$cid%'
            OR rest_speciality LIKE '%$cid%'";
    $exec_search_query = mysqli_query($con, $search_query);
    
    if (mysqli_num_rows($exec_search_query) > 0) {
        while ($row = mysqli_fetch_array($exec_search_query)) {
            $rest_id = $row['rest_id'];
            $rest_name = $row['rest_name'];
            $rest_address = $row['rest_address'];
            $rest_speciality = $row['rest_speciality'];
            $rest_phone = $row['rest_phone'];
            $rest_mail = $row['rest_mail'];
            $rest_desc = $row['rest_desc'];
            $rest_img = $row['rest_img'];

            include('includes/resultItem.php');
        }
    }

    else
        echo "
        <div class='row result-none'>
          <p>
            <i class='far fa-times-circle'></i>
            &nbsp;Sorry, no result found</p>
        </div>";
}


// creates content for order modal
function getOrder() {
    global $con;

    $var = $_GET['rest_id_url'];
    $menu_query = "SELECT * FROM menu WHERE rest_id = $var";
    $exec_menu_query = mysqli_query($con, $menu_query);

    echo"
    <table class='table table-bordered menu-table' style='text-align:center;'>
      <thead>
        <tr>
          <th class='text-center'>Item name</th>
          <th class='text-center'>Item Price (&#8377;)</th>
          <th class='text-center'>Quantity</th>
        </tr>
      </thead>
      
      <tbody>";

    while ($row = mysqli_fetch_array($exec_menu_query)) {
        $menu_id = $row['menu_id'];
        $menu_name = $row['menu_name'];
        $menu_price = $row['menu_price'];
        
        echo "
        <tr>
          <td class='item-name'>$menu_name</td>
          <td class='item-price'>$menu_price</td>
          <td>
            <input type='number' class='item-quantity' placeholder='0' min='0' max='20'/>
          </td>
        </tr>";
    }
    
    echo "
      </tbody>
    </table>";
}




function showOrder()
{
    global $con;
    if(isset($_GET['rest_id_url2']))
    {
        $var = $_SESSION['cust_log_uid'];
        $show_order_query = "SELECT * FROM cart where cust_id=$var";
        $exec_show_order = mysqli_query($con,$show_order_query);
        $total_sum = "SELECT SUM(total_price) as total from cart where cust_id=$var";
        $exec_total_sum = mysqli_query($con,$total_sum);
        while($row1=mysqli_fetch_array($exec_total_sum))
            $total = $row1['total'];

        echo"
            <table class='table table-bordered menu-table' style='text-align:center;'>
            <thead>
               <tr>
                       <th class='text-center'>Item ID</th>
                    <th class='text-center'>Item name</th>
                    <th class='text-center'>Item Price(&#8377;)</th>
                    <th class='text-center'>Quantity</th>
                    <th class='text-center'>Total Price</th>
                    <th class='text-center'>Remove Item</th>
              </tr>
            </thead>
              <tbody>";

        while($row=mysqli_fetch_array($exec_show_order))
        {
            $cust_id = $row['cust_id'];
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];
            $item_price = $row['item_price'];
            $item_quantity = $row['item_quantity'];
            $total_price = $row['total_price'];

            echo
            "
            <tr>
                <td class='remove_id'>$item_id</td>
                <td>$item_name</td>
                <td>$item_price</td>
                <td>$item_quantity</td>
                <td>$total_price</td>
                <td><button class='btn btn-default removecart'>Remove</button></td>
            </tr>
            ";
        }
        echo
        "
        <tr><td colspan='6'><h3>Total Bill:&#8377;$total</h3></td></tr>
        <tr><td colspan='6'>
        <input type='button' class='btn btn-default' onclick='window.history.go(-1)' value='Go back to orders page'>
        <a href='payment.php'><input type='button' class='btn btn-default'value='Proceed to Payment'></a>
        </td></tr>
        </tbody></table>
        ";

    }
}

function showOrderSummary()
{
    global $con;
        $address = $_SESSION['cust_log_address'];
        $order_id = rand();
        $var = $_SESSION['cust_log_uid'];
        $show_order_query = "SELECT * FROM cart where cust_id=$var";
        $exec_show_order = mysqli_query($con,$show_order_query);
        $total_sum = "SELECT SUM(total_price) as total from cart where cust_id=$var";
        $exec_total_sum = mysqli_query($con,$total_sum);
        while($row1=mysqli_fetch_array($exec_total_sum))
            $total = $row1['total'];

        echo "<h1 class='text-center'>ORDER SUMMARY</h1>";
        echo "<h2 class='text-center'>ORDER ID:$order_id</h2>";
        echo "<h3 class='text-center'>Delivery Address:$address</h3>";

        echo"
            <table class='table table-bordered menu-table' style='text-align:center;'>
            <thead>
               <tr>
                       <th class='text-center'>Item ID</th>
                    <th class='text-center'>Item name</th>
                    <th class='text-center'>Item Price(&#8377;)</th>
                    <th class='text-center'>Quantity</th>
                    <th class='text-center'>Total Price</th>
              </tr>
            </thead>
              <tbody>";

        while($row=mysqli_fetch_array($exec_show_order))
        {
            $cust_id = $row['cust_id'];
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];
            $item_price = $row['item_price'];
            $item_quantity = $row['item_quantity'];
            $total_price = $row['total_price'];

            echo
            "
            <tr>
                <td class='remove_id'>$item_id</td>
                <td>$item_name</td>
                <td>$item_price</td>
                <td>$item_quantity</td>
                <td>$total_price</td>
            </tr>
            ";
        }
        echo
        "
        <tr><td colspan='5'><h3>Total Bill:&#8377;$total</h3></td></tr>
        <tr><td colspan='5'>
        <a href='success.php'><input type='button' class='btn btn-default' value='Cash On Delivery'></a>
        <a href='form.html'><input type='button' class='btn btn-default'value='Payment By Card'></a>
        </td></tr>
        </tbody></table>
        ";
}




// fetches and creates container of the restaurant being reviewed
function getReviewRestaurant() {
    global $con;

    $rest_id = (int) $_GET['rest_id_url'];
    $rest_query = "SELECT * FROM restaurant WHERE rest_id = $rest_id";
    $exec_rest_query = mysqli_query($con, $rest_query);
    
    while ($row = mysqli_fetch_assoc($exec_rest_query)) {
        $rest_name = $row['rest_name'];
        $rest_address = $row['rest_address'];
        $rest_phone = $row['rest_phone'];
        $rest_mail = $row['rest_mail'];
        $rest_img = $row['rest_img'];
        $rest_speciality = $row['rest_speciality'];
    }

    echo "
    <div class='result-img'>
      <img src='Images/$rest_img' class='img-thumbnail rest-img'>
    </div>

    <div class='result-info'>
      <p>$rest_name</p>
      <p>$rest_address</p>
      <p><i class='fas fa-utensils'></i>&nbsp;$rest_speciality</p>
      <p><i class='fas fa-phone'></i>$rest_phone</p>
      <p><i class='fas fa-envelope'></i>$rest_mail</p>
    </div>";
    
    if (isset($_SESSION['cust_log_id']))
        echo "
        <button class='btn btn-primary' data-toggle='modal' data-target='#orderModal'>
          ORDER FOOD
        </button>";
}


// fetches and creates review containers of the restaurant being reviewed
function getRestaurantReviews() {
    global $con;

    $rest_id = (int) $_GET['rest_id_url'];
    $review_query = "SELECT * FROM review WHERE rest_id = $rest_id";
    $exec_review_query = mysqli_query($con, $review_query);
    
    while ($row = mysqli_fetch_array($exec_review_query)) {
        $cust_id = (int) $row['cust_id'];
        $title = $row['title'];
        $rating = (int) $row['rating'];
        $review = $row['review'];

        $getName = "SELECT cust_fname, cust_lname FROM customer WHERE cust_id = $cust_id";
        $exec_getname = mysqli_query($con, $getName);
        
        while ($row1 = mysqli_fetch_array($exec_getname)) {
            $fname = $row1['cust_fname'];
            $lname = $row1['cust_lname'];
        }

        echo "
        <div class='review-item'>
          <p>$title</p>
          <p class='rating'>";
            for ($i = 1; $i <= $rating; $i++)
                echo "<i class='fas fa-star'></i>";
            for ($i = 1; $i <= 5 - $rating; $i++)
                echo "<i class='far fa-star'></i>";
          echo "</p>
          <p>$review</p>
          <p>$fname&nbsp;$lname</p>
        </div>";
    }
}

?>
