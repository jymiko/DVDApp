                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Product Form</h4>
                            </div>
                            <div class="card-body">
                                <!-- form -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h3 class="card-title m-t-15">Form Input</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Title</label>
                                                    <input type="text" class="form-control" name="product_title">
                                                    <small class="form-control-feedback"> Title for our product </small> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Product Category</label>
                                                    <select id="product_category" name="product_cat" class="form-control custom-select">
                                                        <option>--Select your Category--</option>
                                                        <?php
                                                            //get product category 
                                                            $get_product_cat = "select * from tbl_product_category";
                                                            $run_product_cat = mysqli_query($connection,$get_product_cat);
                                                            while($row_p_cat = mysqli_fetch_array($run_product_cat)){
                                                                $id_cat_p = $row_p_cat['id_cat_p'];
                                                                $cat_p_title = $row_p_cat['cat_p_title'];
                                                                echo "<option value='$id_cat_p'>$cat_p_title</option>"; 
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image</label>
                                                    <input type="file" class="form-control" name="product_img1"> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image 2</label>
                                                    <input type="file" class="form-control" name="product_img2"> 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Product Image 3</label>
                                                    <input type="file" class="form-control" name="product_img3"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Price</label>
                                                    <input type="text" class="form-control" name="product_price"> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Keywords</label>
                                                    <input type="text" class="form-control" name="product_keyword"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product Description</label>
                                                    <textarea name="product_desc" class="form-control" cols="30" rows="19"></textarea> 
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

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_describe = $_POST['product_desc'];
    $product_keywords = $_POST['product_keyword'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");

    $insert_product ="insert into tbl_product
    (id_cat_p,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword)
    values('$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_describe','$product_keywords')";

    $run_product = mysqli_query($connection,$insert_product);

    if($run_product){
        echo "<script>alert('Product already inserted')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}
?>