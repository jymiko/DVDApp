<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Category Form</h4>
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
                                    <label class="control-label">Category Title</label>
                                    <input type="text" class="form-control" name="category_title">
                                    <small class="form-control-feedback"> Title for our category </small> 
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Product Description</label>
                                    <textarea name="category_desc" class="form-control" cols="30" rows="19"></textarea> 
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

    $category_title = $_POST['category_title'];
    $category_describe = $_POST['category_desc'];

    $insert_category ="insert into tbl_product_category
    (cat_p_title,cat_p_desc) values('$category_title','$category_describe')";

    $run_product = mysqli_query($connection,$insert_category);

    if($run_product){
        echo "<script>alert('Category already inserted')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}
?>