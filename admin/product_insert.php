<?php
    include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Insert Product</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category</label>
                            <div class="col-md-6">
                                <select name="product_cat" class="form-control custom-select">
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
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 1</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 2</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Image 3</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_img3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Keywords</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="product_keyword">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-6">
                            <textarea name="product_desc" class="form-control" cols="30" rows="19"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                            <input type="submit" class="btn btn-success" name="submit" value="submit data">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
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
        echo "<script>window.open('insert_product.php','_self')</script>";
    }
}
?>
