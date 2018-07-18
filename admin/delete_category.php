<?php
include("includes/db.php");
if(isset($_GET['delete_category'])){
    $delete_cat=$_GET['delete_category'];
    $que = "DELETE FROM tbl_product_category where id_cat_p ='$delete_cat'";
    $run = mysqli_query($connection,$que);
    if($run){
        echo "<script>alert('Category has been deleted')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}
?>