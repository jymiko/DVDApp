<?php
    include("includes/db.php");
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <h6 class="card-subtitle">Data table product</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Genre</th>
                            <th>Title</th>
                            <th>Poster</th>
                            <th>Price</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $get_pro = "select tbl_product.id_product,tbl_product_category.cat_p_title,tbl_product.product_title,tbl_product.product_img1,tbl_product.product_price from tbl_product inner join tbl_product_category on tbl_product_category.id_cat_p = tbl_product.id_cat_p";
                            $run_pr = mysqli_query($connection,$get_pro);
                            while($row_pro=mysqli_fetch_array($run_pr)){
                                $pro_id = $row_pro['id_product'];
                                $pro_genre = $row_pro['cat_p_title'];
                                $pro_title = $row_pro['product_title'];
                                $pro_image = $row_pro['product_img1'];
                                $pro_price = $row_pro['product_price'];
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $pro_genre; ?></td>
                            <td><?php echo $pro_title; ?></td>
                            <td><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"></td>
                            <td><?php echo $pro_price; ?></td>
                            <td>
                                <a href="index.php?delete_product=<?php echo $pro_id ?>"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                            <td>
                                <a href="index.php?edit_product=<?php echo $pro_id ?>"><i class="fa fa-pencil"></i> Edit</a>
                            </td>
                        </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>