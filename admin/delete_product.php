<?php
include("includes/db.php");
if(isset($_GET['delete_product'])){
    $delete=$_GET['delete_product'];
    $que = "delete from tbl_product where id_product='$delete'";
    $run = mysqli_query($connection,$que);
    if($run){
        echo "<script>alert('Product has been deleted')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}
?>