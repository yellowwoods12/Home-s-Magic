<?php
include 'connection.php';

  $cust_fname= $_POST['fname'];
  $cust_lname= $_POST['lname'];
  $cust_email= $_POST['mail'];
  $cust_phone=$_POST['phone'];
  $cust_address= $_POST['address'];
  $cust_pwd= md5($_POST['pwd']);
  $check_if_exists = "SELECT * from customer where cust_email='$cust_email'";
  $exec_check = mysqli_query($con,$check_if_exists) or die(mysqli_error($con));
  if(mysqli_num_rows($exec_check) >  0)
  {
    echo "Entered E-mail is already used. Please Log In to continue";
  }
  else
  {
    $qry="INSERT INTO customer(cust_fname,cust_lname,cust_email,cust_phone,cust_address,cust_pwd) VALUES('$cust_fname','$cust_lname','$cust_email','$cust_phone','$cust_address','$cust_pwd')";
    if(mysqli_query($con, $qry))
    {
    	echo "Signed Up Successfully";
    }
  }
?>