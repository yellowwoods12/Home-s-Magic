<?php

include('connection.php');

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




function get_locality_dropdown()
{
	global $con;
	$city_query = "SELECT * FROM city";
	$exec_city_query = mysqli_query($con,$city_query);
	while($row = mysqli_fetch_array($exec_city_query))
	{
		$city_id = $row['city_id'];
		$city_name = $row['city_name'];
			echo "<li><a href='result2.php?city_id_url=$city_id'>$city_name</a></li>";
	}
}

function get_cuisine_dropdown()
{
	global $con;
	$cuisine_query = "SELECT * FROM cuisine";
	$exec_cuisine_query = mysqli_query($con,$cuisine_query);
	while($row = mysqli_fetch_array($exec_cuisine_query))
	{
		$cuisine_id = $row['cuisine_id'];
		$cuisine_name = $row['cuisine_name'];
		echo "<li><a href='result2.php?cuisine_url=$cuisine_id'>$cuisine_name</a></li>";
	}
}

function printByCity($cid)
{
	global $con;
	$city_query = "SELECT * FROM restaurant where city_id=$cid";
	$exec_city_query = mysqli_query($con,$city_query);
	if(mysqli_num_rows($exec_city_query)>0)
	{
		while($row = mysqli_fetch_array($exec_city_query))
		{
			$rest_id = $row['rest_id'];
			$rest_name = $row['rest_name'];
			$rest_address = $row['rest_address'];
			$rest_speciality = $row['rest_speciality'];
			$rest_phone = $row['rest_phone'];
			$rest_mail = $row['rest_mail'];
			$rest_desc = $row['rest_desc'];
			$rest_img = $row['rest_img'];

			echo "
			<div class='row'>
			<div class='col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 result-item' style='height:auto; margin-top:10px;'>
			      <div class='col-lg-3 col-md-4' style='height:auto;'>
			        <img src='Images/$rest_img' class='img-thumbnail rest-img'>
			      </div>
			      <div class='col-lg-4 col-md-4' style='height:auto;'>
			        <b><p class='rest-name'>$rest_name</p></b>
			        <p class='rest-addr'>$rest_address</p>
			        <p class='rest-addr'><i class='fa fa-cutlery' aria-hidden='true'></i>&nbsp;&nbsp;$rest_speciality</p>
			        <p class='rest-addr'><i class='fa fa-phone' aria-hidden='true'></i>&nbsp;&nbsp;$rest_phone</p>
			        <p class='rest-addr'><i class='fa fa-envelope' aria-hidden='true'></i>&nbsp;&nbsp;$rest_mail</p>
			      </div>
			      <div class='col-lg-5 col-md-4' style='height:auto;'>
			        <p class='rest-name'>Description:</p></b>
			        <p class='rest-desc'><i><i class='fa fa-quote-left' aria-hidden='true'></i><br>$rest_desc<br><i class='fa fa-quote-right' aria-hidden='true'></i></i></p>
			        <a href='review.php?rest_id_url=$rest_id&rest_name_url=$rest_name&rest_address_url=$rest_address&rest_img_url=$rest_img&rest_speciality_url=$rest_speciality&rest_phone_url=$rest_phone&rest_mail_url=$rest_mail&rest_img_url=$rest_img&rest_address_url=$rest_address'><button class='btn btn-success rest-review'>REVIEWS</button></a>
			        <a href='menu.php?rest_id_url=$rest_id'<button class='btn btn-info rest-review'>VIEW MENU</button></a>
			        <a href='orders.php?rest_id_url=$rest_id'><button class='btn btn-primary'>ORDER FOOD</button></a>
			      </div>
			  </div>
			  </div>  
			";
		}
	}

	else
	{
		echo"
		<script>
			$('document').ready(function(){
				$('.foot').addClass(' navbar-fixed-bottom');
			});
			</script>
		";
		echo "<h1 class='text-center' style='color:white'><i class='fa fa-smile-o fa-2x' aria-hidden='true'></i></i>&nbsp;We are coming soon to your locality...</h1>";
	}
}

function printByCuisine($cid)
{
	global $con;
	$get_cuisine = "SELECT * FROM cuisine where cuisine_id=$cid";
	$exec_cuisine = mysqli_query($con,$get_cuisine);
	while($row2=mysqli_fetch_array($exec_cuisine))
	$cuisine_name = $row2['cuisine_name'];
	$city_query = "SELECT * FROM restaurant where rest_speciality like '%$cuisine_name%'";
	$exec_city_query = mysqli_query($con,$city_query) or die(mysqli_error($con));
	if(mysqli_num_rows($exec_city_query)>0)
	{
		while($row = mysqli_fetch_array($exec_city_query))
		{
			$rest_id = $row['rest_id'];
			$rest_name = $row['rest_name'];
			$rest_address = $row['rest_address'];
			$rest_speciality = $row['rest_speciality'];
			$rest_phone = $row['rest_phone'];
			$rest_mail = $row['rest_mail'];
			$rest_desc = $row['rest_desc'];
			$rest_img = $row['rest_img'];

			echo "
			<div class='row'>
			<div class='col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 result-item' style='height:auto;'>
			      <div class='col-lg-3 col-md-4' style='height:auto;'>
			        <img src='Images/$rest_img' class='img-thumbnail rest-img'>
			      </div>
			      <div class='col-lg-4 col-md-4' style='height:auto;'>
			        <b><p class='rest-name'>$rest_name</p></b>
			        <p class='rest-addr'>$rest_address</p>
			        <p class='rest-addr'><i class='fa fa-cutlery' aria-hidden='true'></i>&nbsp;&nbsp;$rest_speciality</p>
			        <p class='rest-addr'><i class='fa fa-phone' aria-hidden='true'></i>&nbsp;&nbsp;$rest_phone</p>
			        <p class='rest-addr'><i class='fa fa-envelope' aria-hidden='true'></i>&nbsp;&nbsp;$rest_mail</p>
			      </div>
			      <div class='col-lg-5 col-md-4' style='height:auto;'>
			        <p class='rest-name'>Description:</p></b>
			        <p class='rest-desc'><i><i class='fa fa-quote-left' aria-hidden='true'></i><br>$rest_desc<br><i class='fa fa-quote-right' aria-hidden='true'></i></i></p>
			        <a href='review.php?rest_id_url=$rest_id&rest_name_url=$rest_name&rest_address_url=$rest_address&rest_img_url=$rest_img&rest_speciality_url=$rest_speciality&rest_phone_url=$rest_phone&rest_mail_url=$rest_mail&rest_img_url=$rest_img&rest_address_url=$rest_address'><button class='btn btn-success rest-review'>REVIEWS</button></a>
			        <a href='menu.php?rest_id_url=$rest_id'<button class='btn btn-info rest-review'>VIEW MENU</button></a>
			        <a href='orders.php?rest_id_url=$rest_id'><button class='btn btn-primary'>ORDER FOOD</button></a>
			      </div>
			  </div>
			  </div>  
			";
		}
	}

	else
	{
		echo"
		<script>
			$('document').ready(function(){
				$('.foot').addClass(' navbar-fixed-bottom');
			});
			</script>
		";
		echo "<h1 class='text-center' style='color:white'><i class='fa fa-times fa-2x' aria-hidden='true'></i></i>&nbsp;NO RESULT FOUND</h1>";
	}
}

function printBySearch($cid)
{
	global $con;
	$search_query = "SELECT * FROM restaurant where (rest_name like '%$cid%') OR (rest_locality like '%$cid%') OR (rest_speciality like '%$cid%')";
	$exec_search_query = mysqli_query($con,$search_query);
	if(mysqli_num_rows($exec_search_query)>0)
	{
		while($row = mysqli_fetch_array($exec_search_query))
		{
			$rest_id = $row['rest_id'];
			$rest_name = $row['rest_name'];
			$rest_address = $row['rest_address'];
			$rest_speciality = $row['rest_speciality'];
			$rest_phone = $row['rest_phone'];
			$rest_mail = $row['rest_mail'];
			$rest_desc = $row['rest_desc'];
			$rest_img = $row['rest_img'];

			echo "
			<div class='row'>
			<div class='col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2 result-item' style='height:auto;'>
			      <div class='col-lg-3 col-md-4' style='height:auto;'>
			        <img src='Images/$rest_img' class='img-thumbnail rest-img'>
			      </div>
			      <div class='col-lg-4 col-md-4' style='height:auto;'>
			        <b><p class='rest-name'>$rest_name</p></b>
			        <p class='rest-addr'>$rest_address</p>
			        <p class='rest-addr'><i class='fa fa-cutlery' aria-hidden='true'></i>&nbsp;&nbsp;$rest_speciality</p>
			        <p class='rest-addr'><i class='fa fa-phone' aria-hidden='true'></i>&nbsp;&nbsp;$rest_phone</p>
			        <p class='rest-addr'><i class='fa fa-envelope' aria-hidden='true'></i>&nbsp;&nbsp;$rest_mail</p>
			      </div>
			      <div class='col-lg-5 col-md-4' style='height:auto;'>
			        <p class='rest-name'>Description:</p></b>
			        <p class='rest-desc'><i><i class='fa fa-quote-left' aria-hidden='true'></i><br>$rest_desc<br><i class='fa fa-quote-right' aria-hidden='true'></i></i></p>
			        <a href='review.php?rest_id_url=$rest_id&rest_name_url=$rest_name&rest_address_url=$rest_address&rest_img_url=$rest_img&rest_speciality_url=$rest_speciality&rest_phone_url=$rest_phone&rest_mail_url=$rest_mail&rest_img_url=$rest_img&rest_address_url=$rest_address'><button class='btn btn-success rest-review'>REVIEWS</button></a>
			        <a href='menu.php?rest_id_url=$rest_id'<button class='btn btn-info rest-review'>VIEW MENU</button></a>
			        <a href='orders.php?rest_id_url=$rest_id'><button class='btn btn-primary'>ORDER FOOD</button></a>
			      </div>
			  </div>
			  </div>  
			";
		}
	}

	else
	{
		echo"
		<script>
			$('document').ready(function(){
				$('.foot').addClass(' navbar-fixed-bottom');
			});
			</script>
		";
		echo "<h1 class='text-center' style='color:white'><i class='fa fa-times fa-2x' aria-hidden='true'></i></i>&nbsp;No Result Found</h1>";
	}
}

function getMenu()
{
	global $con;
	if(isset($_GET['rest_id_url']))
	{
		$var = $_GET['rest_id_url'];
		$city_query = "SELECT * FROM restaurant where rest_id=$var";
		$exec_city_query = mysqli_query($con,$city_query);
		while($row1=mysqli_fetch_array($exec_city_query))
		{
			$rest_name = $row1['rest_name'];
		}
		echo "<h1 class='text-center'>$rest_name</h1>";

		echo "<div class='container'>";
		echo "<div class='row col-lg-offset-3 col-lg-6'>";
		echo"
		<table class='table table-bordered menu-table'>
		<thead>
           <tr>
	            <th>Item name</th>
	            <th>Item Price</th>
          </tr>
		</thead>
          <tbody>";

		$menu_query = "SELECT * FROM menu where rest_id=$var";
		$exec_menu_query = mysqli_query($con,$menu_query);
		while($row2=mysqli_fetch_array($exec_menu_query))
		{
			$menu_name = $row2['menu_name'];
			$menu_price = $row2['menu_price'];
			echo
			"
			<tr>
	            <td>$menu_name</td>
	            <td>Rs.$menu_price</td>
	          </tr>
			";
		}
		echo "
		<tr>
	            <td colspan='2' style='text-align:center;'><input type='button' class='btn btn-default' value='Back' onclick='window.history.go(-1)'></td>
	    </tr>
	    </tbody>
</table>";
 echo "</div></div>";
	}
}

function getOrder()
{
	global $con;
	if(isset($_GET['rest_id_url']))
	{
		$var = $_GET['rest_id_url'];
		$city_query = "SELECT * FROM restaurant where rest_id=$var";
		$exec_city_query = mysqli_query($con,$city_query);
		while($row1=mysqli_fetch_array($exec_city_query))
		{
			$rest_name = $row1['rest_name'];
		}
		echo "<h1 class='text-center'>$rest_name</h1>";

		echo"
		<table class='table table-bordered menu-table' style='text-align:center;'>
		<thead>
           <tr>
           		<th class='text-center'>Item ID</th>
	            <th class='text-center'>Item name</th>
	            <th class='text-center'>Item Price(&#8377;)</th>
	            <th class='text-center'>Quantity</th>
	            <th class='text-center'>Add Item</th>
          </tr>
		</thead>
          <tbody>";

		$menu_query = "SELECT * FROM menu where rest_id=$var";
		$exec_menu_query = mysqli_query($con,$menu_query);
		while($row2=mysqli_fetch_array($exec_menu_query))
		{
			$menu_id = $row2['menu_id'];
			$menu_name = $row2['menu_name'];
			$menu_price = $row2['menu_price'];
			echo
			"
			<tr>
				<td class='item-id'>$menu_id</td>
	            <td class='item-name'>$menu_name</td>
	            <td class='item-price'>$menu_price</td>
	            <td>
	            <input type='number' class='item-quantity' style='color:black;width:40px;margin-left:20px;' required='required'/>
	            </td>
	            <td><button class='btn btn-default cart'>Add</button></td>
	          </tr>
			";
		}
		echo "
		</tbody>
</table>";
	echo "<div style='width:150px;margin:auto;'><input type='button' class='btn btn-default' value='ORDER FOOD'></div>";
	}
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


function reviewDisplay()
{
	$rest_id = $_GET['rest_id_url'];
	$rest_name = $_GET['rest_name_url'];
	$rest_address = $_GET['rest_address_url'];
	$rest_phone = $_GET['rest_phone_url'];
	$rest_mail = $_GET['rest_mail_url'];
	$rest_img = $_GET['rest_img_url'];
	$rest_speciality = $_GET['rest_speciality_url'];

	echo "
	<img class='img-rounded' width='350' height='300' src='Images/$rest_img'>
    <b><p class='rest-addr' style='margin-top:20px;'>$rest_name</p></b>
    <p class='rest-addr'>$rest_address</p>
    <table>
    <tr>
    	<td><p class='rest-addr' style='float:right;'><i class='fa fa-cutlery' aria-hidden='true'></i></p></td>
    	<td><p class='rest-addr' style='padding-left:10px;'>$rest_speciality</p></td>
    </tr>

    <tr>
    	<td><p class='rest-addr' style='float:right;'><i class='fa fa-phone' aria-hidden='true'></i></p></td>
    	<td><p class='rest-addr' style='padding-left:10px;'>$rest_phone</p></td>
    </tr>

    <tr>
    	<td><p class='rest-addr' style='float:right;'><i class='fa fa-envelope' aria-hidden='true'></i></p></td>
    	<td><p class='rest-addr' style='padding-left:10px;'>$rest_mail</p></td>
    </tr>
    </table>
	";

}

function showReview()
{
	global $con;
	$rest_id = (int)$_GET['rest_id_url'];
	$review_query = "SELECT * FROM review where rest_id=$rest_id";
	$exec_review_query = mysqli_query($con,$review_query);
	while($row = mysqli_fetch_array($exec_review_query))
	{
		$cust_id = (int)$row['cust_id'];
		$title = $row['title'];
		$rating = (int)$row['rating'];
		$review = $row['review'];
		$getName = "SELECT cust_fname,cust_lname from customer where cust_id=$cust_id";
		$exec_getname = mysqli_query($con,$getName);
		while($row1=mysqli_fetch_array($exec_getname))
		{
			$fname = $row1['cust_fname'];
			$lname = $row1['cust_lname'];
		}
		echo "<div class='row review-wrapper'>";
		echo "<div class='col-lg-offset-1 col-lg-10'>";
		echo "<h3>$title</h3>";
		echo "<h4><span style='color:#ff8000;'>";
		for($x=1;$x<=$rating;$x++)
		{
			echo "<i class='fa fa-star' aria-hidden='true'></i>";
		}
		for($x=$rating+1;$x<=5;$x++)
		{
			echo "<i class='fa fa-star-o' aria-hidden='true'></i>";
		}
		echo "</span></h4>";
		echo "<h4>$review</h4>";
		echo "<p class='cust-name-review'> - ".$fname." ".$lname."</p>";
		echo "</div></div>";
	}
}

?>
