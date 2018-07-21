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
                            <th>Nama Category</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $get_cat = "select * from tbl_product_category";
                            $run_qr = mysqli_query($connection,$get_cat);
                            while($row_pro=mysqli_fetch_array($run_qr)){
                                $cat_id = $row_pro['id_cat_p'];
                                $cat_title = $row_pro['cat_p_title'];
                                $cat_desc = $row_pro['cat_p_desc'];
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $cat_title; ?></td>
                            <td><?php echo $cat_desc; ?></td>
                            <td><a href="index.php?delete_category=<?php echo $cat_id ?>"><i class="fa fa-trash"></i> Delete</a></td>
                            <td><a href="index.php?edit_category=<?php echo $cat_id ?>"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>