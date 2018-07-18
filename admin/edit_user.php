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
                                    <input type="text" class="form-control" name="name_user" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role User</label>
                                    <select id="role_user" name="role_user" class="form-control custom-select">
                                        <option value="">Role</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Image</label>
                                    <input type="file" class="form-control" name="user_img"> 
                                    <br>
                                    <img src="../customer/customer_images/" width="70" height="70"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User City</label>
                                    <input type="text" class="form-control" name="user_city"  value=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Country</label>
                                    <input type="text" class="form-control" name="user_county"  value=""> 
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">User Phone Number</label>
                                    <input type="text" class="form-control" name="user_phone"  value=""> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">User Address</label>
                                    <textarea name="product_desc" class="form-control" cols="30" rows="19">
                                        desc
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