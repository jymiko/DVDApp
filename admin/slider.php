
<?php 
if (isset($_POST['edit'])) {
    /*echo '<pre>';
    print_r($_POST);
    print_r($_FILES);
    echo '</pre>';
    exit;*/
 $id = mysqli_real_escape_string($connection, $_POST['kode']);
 $nama= mysqli_real_escape_string($connection, $_POST['name']);
 $slide_status = mysqli_real_escape_string($connection, $_POST['genre']);
 $target_dir = "slide_images/";
    $nama_file = $_FILES["myFile"]["name"];
    $target_file = $target_dir . basename($nama_file);
  $sql = "UPDATE tbl_slider  set slide_name = '$nama',slide_status = '$slide_status',slide_images = '$nama_file' where slide_id = '$id'";
  /*echo $sql;
  exit; */
  move_uploaded_file($_FILES['myFile']['tmp_name'], $target_file);
  mysqli_query($connection, $sql);
  echo "<script>window.open('http://localhost/ecommerce_video_3.7-master_ori/admin/category.php')</script>";
  
}
else if (isset($_POST['add'])) {

    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    exit;*/
    

    $target_dir = "slide_images/";
    $nama_file = $_FILES["myFile"]["name"];
    $target_file = $target_dir . basename($nama_file);
    move_uploaded_file($_FILES['myFile']['tmp_name'], $target_file);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $slide_status = mysqli_real_escape_string($connection, $_POST['genre']);

    $sql = "INSERT INTO tbl_slider (slide_name,slide_images,slide_status) values('$name','$nama_file','$slide_status')";
    mysqli_query($connection, $sql);
    /*$uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["myFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }*/
    /*$name = mysqli_real_escape_string($connection, $_POST['name']);
    $sql = "INSERT INTO tbl_detailfilm (nama_genre) values('$name')";
    mysqli_query($connection, $sql);
    echo "<script>window.open('http://localhost/ecommerce_video_3.7-master_ori/admin/category.php')</script>";*/
}
else if(isset($_POST['delete'])){
    
    $id = mysqli_real_escape_string($connection, $_POST['kode']);
    $sql = "DELETE FROM tbl_slider where slide_id = $id ";
    mysqli_query($connection, $sql);
    echo "<script>window.open('http://localhost/ecommerce_video_3.7-master_ori/admin/category.php')</script>";
}
?>
<?php
$detail = "select * from tbl_slider";
$run_detail=mysqli_query($connection,$detail);
while($data=mysqli_fetch_array($run_detail)){
?>
<div class="modal" tabindex="-1" role="dialog" id="del<?php echo $data['slide_id']; ?>" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">           
        <h5 class="text-center">Delete this record?</h5>
         <form class="form-valide" action="" method="post">
           <div class="form-group row">
        </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-8 ml-auto">
            <input type="hidden" name="kode" value="<?php echo $data['slide_id']; ?>">
                <button type="submit" name="delete" id="delete" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-default " data-dismiss="modal">Cancel</button>
            </div>
                
        </div>       
    </form>
        </div>
          
    </div>
  </div>
</div>
<?php } ?>
<?php
$detail = "select * from tbl_slider";
$run_detail=mysqli_query($connection,$detail);
while($data=mysqli_fetch_array($run_detail)){
?>
<div class="modal" tabindex="-1" role="dialog" id="edit<?php echo $data['slide_id']; ?>" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">           
        <hbb5 class="text-center">Edit Slider</h5>
         <form class="form-valide" action="" method="post" enctype="multipart/form-data">
        <?php /* <div class="form-group row">
            <label class="col-lg-4 col-form-label">Id Genre<span class="text-danger">*</span></label>
            <div class="col-lg-6">
                <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $data['id_genre']; ?>" >
            </div>
        </div>
        */
        ?>
           <div class="form-group row">
            <label class="col-lg-4 col-form-label">Genre Name <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                
                <input type="text" class="form-control" id="name" name="name"  value="<?php echo  $data['slide_name']; ?>" >
            </div>
        </div>
       <div class="form-group row">
            <label class="col-lg-4 col-form-label">Status Slider <span class="text-danger">*</span></label>
            <div class="col-lg-6">
            <select class="form-control" id="genre" name="genre">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="INACTIVE">INACTIVE</option>                                         
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label">Browse Image <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                <!-- <input type="text" class="form-control" id="name"  name="name" > -->
                <input name="myFile" type="file">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-lg-8 ml-auto">
            <input type="hidden" name="kode" value="<?php echo $data['slide_id']; ?>">
                <button type="submit" id="edit" name="edit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            </div>
                
        </div>       
    </form>
        </div>
          
    </div>
  </div>
</div>
<?php }  ?>
<div class="modal" tabindex="-1" role="dialog" id="add" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">           
        <h5 class="text-center">Add New Slide</h5>
         <form class="form-valide" action="" method="post" enctype="multipart/form-data">
       <div class="form-group row">
            <label class="col-lg-4 col-form-label">Slider Name <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                <input type="text" class="form-control" id="name"  name="name" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label">Status Slider <span class="text-danger">*</span></label>
            <div class="col-lg-6">
            <select class="form-control" id="genre" name="genre">
                    <option value="ACTIVE">ACTIVE</option>
                    <option value="INACTIVE">INACTIVE</option>                                         
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label">Browse Image <span class="text-danger">*</span></label>
            <div class="col-lg-6">
                <!-- <input type="text" class="form-control" id="name"  name="name" > -->
                <input name="myFile" type="file">
            </div>
        </div>

        </div>
        <div class="form-group row">
            <div class="col-lg-8 ml-auto">
                <button type="submit" name="add" id="add" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            </div>
                
        </div>       
    </form>
        </div>
          
    </div>
  </div>
</div>
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Data Slider</h3> </div>
            </div>
 <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                <a href="#" class="btn btn-primary" data-toggle="modal"  data-target="#add" >Add Data</a>
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Images</th>
                                                <th style="text-align: center;">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $cate= "select * from tbl_slider";
                       						$run_cate=mysqli_query($connection,$cate);
                        					while($data=mysqli_fetch_array($run_cate)){
											?>
											<tr>
												<th><?php echo $data['slide_id']; ?></th>
												<th><?php echo $data['slide_name']; ?></th>
                                                <th style= "text-align :center;"><img height="100px" width="120px" src = "slide_images/<?php echo $data['slide_images']; ?>"</th>
												<th style="text-align: center;">
													 <a href="#" class="btn btn-info" data-toggle="modal"  data-target="#edit<?php echo $data['slide_id']; ?>" >Edit</a>
                                    				 <a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#del<?php echo $data['slide_id']; ?>" >Remove</a>
                                    			</th>
											</tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/dashboard1-init.js"></script>


	<script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->

    <script src="js/custom.min.js"></script>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>

</body>

</html>