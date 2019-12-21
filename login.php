<?php

session_start();
include 'connection.php';

$login_email= $_POST['login_email'];
$login_pwd= md5($_POST['login_pwd']);
  
$check_if_exist = "
    SELECT * FROM customer
    WHERE
        cust_email='$login_email'
        AND cust_pwd='$login_pwd'";
$run_query = mysqli_query($con, $check_if_exist) or die(mysqli_error($con));
  
if(mysqli_num_rows($run_query) > 0) {
    while($row = mysqli_fetch_array($run_query)) {
        $login_fname = $row['cust_fname'];
        $login_lname = $row['cust_lname'];
        $login_phone = $row['cust_phone'];
        $login_address = $row['cust_address'];
        $login_uid = $row['cust_id'];
    }
        
    $_SESSION['cust_log_fname'] = $login_fname;
    $_SESSION['cust_log_lname'] = $login_lname;
    $_SESSION['cust_log_phone'] = $login_phone;
    $_SESSION['cust_log_address'] = $login_address;
    $_SESSION['cust_log_id'] = $login_email;
    $_SESSION['cust_log_pwd'] = $login_pwd;
    $_SESSION['cust_log_uid'] = $login_uid;
        
    echo "You have successfully logged in";
}

else
    echo "Either Email Id or Password is incorrect";

?>
