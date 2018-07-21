<?php 
include("includes/db.php");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <h6 class="card-subtitle">Data Transaksi</h6>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>No Invoice</th>
                            <th>Total Biaya</th>
                            <th>Tanggal Pembelian</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $transaction_query= "select tbl_order.id_order,tbl_customer.customer_name,tbl_product.product_title,tbl_order.amount,tbl_order.invoice_no,tbl_order.quantity,tbl_order.order_date,tbl_order.order_status from tbl_order INNER JOIN tbl_customer on tbl_order.id_customer=tbl_customer.id_role INNER JOIN tbl_product on tbl_order.id_product=tbl_product.id_product";
                            $run_query=mysqli_query($connection,$transaction_query);
                            while($data=mysqli_fetch_array($run_query)){
                                $id_oder = $data['id_order'];
                                $cust_name = $data['customer_name'];
                                $product_title = $data['product_title'];
                                $amount = $data['amount'];
                                $invoice_no = $data['invoice_no'];
                                $qty = $data['quantity'];
                                $order_date = $data['order_date'];
                                $order_status = $data['order_status'];
                                $i++; 
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $cust_name; ?></td>
                            <td><?php echo $product_title; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $invoice_no; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $order_date; ?></td>
                            <td><?php echo $order_status; ?></td>
                        </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>