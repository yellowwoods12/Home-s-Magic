<?php
session_start();
include ('connection.php');

$remove_id = $_POST['remove_id'];
$var = $_SESSION['cust_log_uid'];
$delete_query = "DELETE FROM cart where item_id=$remove_id AND cust_id=$var";
$exec_delete_query = mysqli_query($con,$delete_query) or die(mysqli_error($con));
if($exec_delete_query)
echo "Item Removed";
else
echo "Failed to remove Item";
?>