<?php
    if(isset($_GET['edit_product'])){
        $edit_id=$_GET['edit_product'];
        $get_product = "select * from tbl_product where id_product='$edit_id'";
        $run = mysqli_query($connection,$get_product);
        $row_edit = mysqli_fetch_array($run);
        $id_product = $row_edit['id_product'];
        $id_cat = $row_edit['id_cat_p'];
        $product_tite = $row_edit['product_title'];
        $product_img_1 = $row_edit['product_img1'];
        $product_img_2 = $row_edit['product_img2'];
        $product_img_3 = $row_edit['product_img3'];
        $product_prce = $row_edit['product_price'];
        $product_desc = $row_edit['product_desc'];
        $product_keyword = $row_edit['product_keyword'];
    }

    $get_id_cat ="select * from tbl_product_category where id_cat_p='$id_cat'";
    $run_cat_p = mysqli_query($connection,$get_id_cat);
    $row_cat_p = mysqli_fetch_array($run_cat_p);
    $cat_p_title = $row_cat_p['cat_p_title'];
?>
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
                                    <input type="text" class="form-control" name="product_title" value="<?php echo $product_tite; ?>">
                                    <small class="form-control-feedback"> Title for our product </small> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Category</label>
                                    <select id="product_cat" name="product_cat" class="form-control custom-select">
                                        <option value="<?php echo $id_cat; ?>"><?php echo $cat_p_title; ?></option>
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
                                    <br>
                                    <img src="product_images/<?php echo $product_img_1 ?>" width="70" height="70"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Product Image 2</label>
                                    <input type="file" class="form-control" name="product_img2">
                                    <br>
                                    <img src="product_images/<?php echo $product_img_2 ?>" width="70" height="70"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Product Image 3</label>
                                    <input type="file" class="form-control" name="product_img3"> 
                                    <br>
                                    <img src="product_images/<?php echo $product_img_3 ?>" width="70" height="70"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Product Price</label>
                                    <input type="text" class="form-control" name="product_price"  value="<?php echo $product_prce; ?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Product Keywords</label>
                                    <input type="text" class="form-control" name="product_keyword"  value="<?php echo $product_keyword; ?>"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Product Description</label>
                                    <textarea name="product_desc" class="form-control" cols="30" rows="19">
                                        <?php echo $product_desc; ?>
                                    </textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit_update" value="Update Product">
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit_update'])){

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

    $update_product = "update tbl_product set id_cat_p='$product_cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',product_desc='$product_describe',product_keyword='$product_keywords' where id_product = '$id_product'";

    $run_update = mysqli_query($connection,$update_product);
    if($run_update){
        echo "<script>alert('Product already update')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
    }
}
?>