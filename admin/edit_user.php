<?php
    if(isset($_GET['edit_user'])){
        $user_id = $_GET['edit_user'];
        $get_user = "select * from tbl_customer where id_customer='$user_id'";
        $run_query = mysqli_query($connection,$get_user);
        $row_edit = mysqli_fetch_array($run_query);
        $id_customer = $row_edit['id_customer'];
        $id_role = $row_edit['id_role'];
        $customer_name = $row_edit['customer_name'];
        $customer_pass = $row_edit['customer_password'];
        $customer_email = $row_edit['customer_email'];
        $user_img = $row_edit['image'];
        $country = $row_edit['country'];
        $city = $row_edit['city'];
        $phone_number = $row_edit['phone_number'];
        $address = $row_edit['address'];
    }
    $get_id_role = "select * from tbl_role where id_role='$id_role'";
    $run_role = mysqli_query($connection,$get_id_role);
    $row_role = mysqli_fetch_array($run_role);
    $name_role = $row_role['nama_role'];
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">User Form</h4>
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
                                    <label class="control-label">Name User</label>
                                    <input type="text" class="form-control" name="name_user" value="<?php echo $customer_name; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role User</label>
                                    <select id="role_user" name="role_user" class="form-control custom-select">
                                        <option value="<?php echo $id_role; ?>"><?php echo $name_role; ?></option>
                                        <?php
                                            //get role 
                                            $get_role = "select * from tbl_role";
                                            $run_role = mysqli_query($connection,$get_role);
                                            while($row_role = mysqli_fetch_array($run_role)){
                                                $id_role = $row_role['id_role'];
                                                $name_role = $row_role['nama_role'];
                                                echo "<option value='$id_role'>$name_role</option>"; 
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Old Password</label>
                                    <input type="text" class="form-control" value="<?php echo $customer_pass; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" name="user_pass">
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">User Email</label>
                                    <input type="text" class="form-control" name="user_email" value="<?php echo $customer_email; ?>"> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">User Image</label>
                                    <input type="file" class="form-control" name="user_img"> 
                                    <br>
                                    <img src="../customer/customer_images/<?php echo $user_img ?>" width="80" height="80"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User City</label>
                                    <input type="text" class="form-control" name="user_city"  value="<?php echo $city ?>"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Country</label>
                                    <input type="text" class="form-control" name="user_county"  value="<?php echo $country ?>"> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Phone Number</label>
                                    <input type="text" class="form-control" name="user_phone"  value="<?php echo $phone_number ?>"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">User Address</label>
                                    <textarea name="address" class="form-control" cols="30" rows="19">
                                        <?php echo $address ?>
                                    </textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="submit_update" value="Update User">
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST['submit_update'])){

        $user_email = $_POST['user_email'];
        $name_user = $_POST['name_user'];
        $user_pass = $_POST['user_pass'];
        $role_user = $_POST['role_user'];
        $user_country = $_POST['user_country'];
        $user_city = $_POST['user_city'];
        $user_phone = $_POST['user_phone'];
        $address = $_POST['address'];

        $user_img = $_FILES['user_img']['name'];
    
        $temp_name1 = $_FILES['user_img']['tmp_name'];
    
        move_uploaded_file($temp_name1,"../customer/customer_img/$user_img");
    
        $update_user = "update tbl_customer set id_role='$role_user',customer_name='$name_user',customer_email='$user_email',customer_password='$user_pass',country='$user_country',city='$user_city',phone_number='$user_phone',address='$address',image='$user_img' where id_customer = '$id_customer'";
    
        $run_update = mysqli_query($connection,$update_user);
        if($run_update){
            echo "<script>alert('User already update')</script>";
            echo "<script>window.open('index.php?view_user','_self')</script>";
        }
    }
?>