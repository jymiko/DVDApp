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
                            <th>No Invoice</th>
                            <th>Metode Pembayaran</th>
                            <th>No Referensi</th>
                            <th>Tanggal Pembayaran</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 0;
                            $payment_query= "select tbl_payment.payment_id,tbl_order.invoice_no,tbl_payment.payment_mode,tbl_payment.ref_no,tbl_payment.payment_date from tbl_payment INNER JOIN tbl_order on  tbl_payment.id_order=tbl_order.id_order";
                            $run_query=mysqli_query($connection,$payment_query);
                            while($data=mysqli_fetch_array($run_query)){
                                $payment_id = $data['payment_id'];
                                $invoice_no = $data['invoice_no'];
                                $payment_mode = $data['payment_mode'];
                                $ref_no = $data['ref_no'];
                                $payment_date = $data['payment_date'];
                                $i++; 
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $invoice_no; ?></td>
                            <td><?php echo $payment_mode; ?></td>
                            <td><?php echo $ref_no; ?></td>
                            <td><?php echo $payment_date; ?></td>
                        </tr>
                        <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>