<?php
include("includes/db.php");
if(isset($_GET['delete_user'])){
    $delete_cust=$_GET['delete_user'];
    $que = "DELETE FROM tbl_customer where id_customer ='$delete_cust'";
    $run = mysqli_query($connection,$que);
    if($run){
        echo "<script>alert('User has been deleted')</script>";
        echo "<script>window.open('index.php?view_user','_self')</script>";
    }
}
?>