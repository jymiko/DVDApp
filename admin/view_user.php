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
                            <th>Role User</th>
                            <th>Nama User</th>
                            <th>Email User</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $get_customer = "select tbl_customer.id_customer,tbl_role.nama_role,tbl_customer.customer_name,tbl_customer.customer_email,tbl_customer.address,tbl_customer.phone_number from tbl_customer INNER join tbl_role on tbl_customer.id_role = tbl_role.id_role" ;
                            $run_query = mysqli_query($connection,$get_customer);
                            while($row_cust = mysqli_fetch_array($run_query, MYSQLI_ASSOC)){
                                $id_customer = $row_cust['id_customer'];
                                $cust_role = $row_cust['nama_role'];
                                $cust_name = $row_cust['customer_name'];
                                $cust_email = $row_cust['customer_email'];
                                $cust_address = $row_cust['address'];
                                $cust_phone = $row_cust['phone_number'];
                                $i++; 
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $cust_role; ?></td>
                            <td><?php echo $cust_name; ?></td>
                            <td><?php echo $cust_email; ?></td>
                            <td><?php echo $cust_address; ?></td>
                            <td><?php echo $cust_phone; ?></td>
                            <td>
                            <a href="index.php?edit_category=<?php echo $id_customer ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="index.php?delete_category=<?php echo $id_customer ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
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