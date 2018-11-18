<?php
	session_start();
	include 'connection.php';

  $title= $_POST['title'];
  $descr= $_POST['descr'];
  $rest_id= $_POST['rest_id'];
  $rating = (int)$_POST['rating'];
  $cust_id = (int)$_SESSION['cust_log_uid'];
  $check_if_exists = "SELECT * FROM review where cust_id = $cust_id and rest_id=$rest_id";
  $exec = mysqli_query($con,$check_if_exists);
  if(mysqli_num_rows($exec) == 0)
  {
	  $qry="INSERT INTO review(rest_id,cust_id,title,rating,review) VALUES($rest_id,$cust_id,'$title',$rating,'$descr')";
	  if(mysqli_query($con, $qry))
	  {
	  	echo "Success";
	  }
	  else
	  {
	  	die(mysqli_error($con));
	  }
  }

else
{
	echo "You have already recorded a review";
}
?>