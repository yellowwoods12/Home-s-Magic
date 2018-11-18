<?php
session_start();
include 'connection.php';

  $cust_id= (int)$_SESSION['cust_log_uid'];
  $item_id= (int)$_POST['item_id'];
  $item_name= $_POST['item_name'];
  $item_price= (int)$_POST['item_price'];
  $quantity= (int)$_POST['quantity'];
  $total_price = $item_price * $quantity;
  $check_if_exists = "SELECT * FROM cart where cust_id=$cust_id AND item_id=$item_id";
  $exec_check = mysqli_query($con,$check_if_exists);
  if(mysqli_num_rows($exec_check) > 0)
  {
    $select_quant = "SELECT item_quantity from cart where cust_id=$cust_id AND item_id=$item_id";
    $exec_select_quant = mysqli_query($con,$select_quant);
    while($row=mysqli_fetch_array($exec_select_quant))
      $current_quant = (int)$row['item_quantity'];
    $current_quant = $current_quant + $quantity;
    $update_quant = "UPDATE cart set item_quantity=$current_quant where cust_id=$cust_id AND item_id=$item_id ";
    $exec_update = mysqli_query($con,$update_quant);
    if($exec_update)
      echo "Item added to your Thali!";
    else
      echo "failed";
  }
  else
  {
    $qry="INSERT INTO cart(cust_id,item_id,item_name,item_price,item_quantity,total_price) VALUES($cust_id,$item_id,'$item_name',$item_price,$quantity,$total_price)";
    $exec_query = mysqli_query($con,$qry) or die(mysqli_error($con));
    if($exec_query)
    {
    	echo "Item added to your Thali!";
    }
    else
    {
      echo "failed";
    }
  }
?>