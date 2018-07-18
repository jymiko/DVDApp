<?php
include("includes/db.php");
if(isset($_GET['delete_slide'])){
    $delete=$_GET['delete_slide'];
    $que = "delete from tbl_slider where slide_id='$delete'";
    $run = mysqli_query($connection,$que);
    if($run){
        echo "<script>alert('Slide has been deleted')</script>";
        echo "<script>window.open('index.php?view_slide','_self')</script>";
    }
}
?>