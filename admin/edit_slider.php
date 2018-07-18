<?php
    if(isset($_GET['edit_slider'])){
        $edit_id=$_GET['edit_slider'];
        $get_slide = "select * from tbl_slider where slide_id='$edit_id'";
        $run = mysqli_query($connection,$get_slide);
        $row_edit = mysqli_fetch_array($run);
        $id_slider = $row_edit['slide_id'];
        $name_slider = $row_edit['slide_name'];
        $slider_img = $row_edit['slide_images'];
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Slider Form</h4>
            </div>
            <div class="card-body">
                <!-- form -->
                <form method="post" enctype="multipart/form-data">
                    <div class="form-body">
                        <h3 class="card-title m-t-15">Form Input</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Slider Name</label>
                                    <input type="text" class="form-control" name="slider_name" value="<?php echo $name_slider; ?>"> 
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Slider Image</label>
                                    <input type="file" class="form-control" name="slider_img">
                                    <img src="slide_images/<?php echo $slider_img; ?>" width="70" height="70"> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit">
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit'])){
        $slider_name = $_POST['slider_name'];
        $slider_img = $_FILES['slider_img']['name'];
        $temp_img = $_FILES['slider_img']['tmp_name'];
        move_uploaded_file($temp_img,"slider_images/$slider_img");
        $insert_slider = "update tbl_slider set slide_name='$slider_name',slide_images='$slider_img' where slide_id='$id_slider'";
        $run_slider = mysqli_query($connection,$insert_slider);
        if($run_slider){
            echo "<script>alert('Slider already updated')</script>";
            echo "<script>window.open('index.php?view_slider','_self')</script>";
        }
    }
?>