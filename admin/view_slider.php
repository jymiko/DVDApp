<?php 
include("includes/db.php");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <a href="index.php?insert_slider" class="btn btn-primary">Add Data</a>
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
                            $cate= "select * from tbl_slider";
                            $run_cate=mysqli_query($connection,$cate);
                            while($data=mysqli_fetch_array($run_cate)){
                        ?>
                        <tr>
                            <td><?php echo $data['slide_id']; ?></td>
                            <td><?php echo $data['slide_name']; ?></td>
                            <td><img height="100px" width="120px" src = "slide_images/<?php echo $data['slide_images']; ?>"</td>
                            <td>
                                <a href="index.php?edit_slider=<?php echo $data['slide_id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="index.php?delete_slider=<?php echo $data['slide_id']; ?>" class="btn btn-danger">Remove</a>
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