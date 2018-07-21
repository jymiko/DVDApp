<?php
    include("includes/db.php");
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Video Store Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <?php
                include("includes/header.php");
            ?>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->  
                <?php
                    include("includes/sidebar.php");
                ?>            
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <?php
                    if(isset($_GET['dashboard'])){
                        include("dashboard.php");
                    }
                    if(isset($_GET['insert_product'])){
                        include("insert_product.php");
                    }
                    if(isset($_GET['view_product'])){
                        include("view_product.php");
                    }
                    if(isset($_GET['delete_product'])){
                        include("delete_product.php");
                    }
                    if(isset($_GET['edit_product'])){
                        include("edit_product.php");
                    }
                    if(isset($_GET['insert_category'])){
                        include("insert_category.php");
                    }
                    if(isset($_GET['view_category'])){
                        include("view_category.php");
                    }
                    if(isset($_GET['delete_category'])){
                        include("delete_category.php");
                    }
                    if(isset($_GET['edit_category'])){
                        include("edit_category.php");
                    }
                    if(isset($_GET['view_slider'])){
                        include("view_slider.php");
                    }
                    if(isset($_GET['insert_slider'])){
                        include("insert_slider.php");
                    }
                    if(isset($_GET['edit_slider'])){
                        include("edit_slider.php");
                    }
                    if(isset($_GET['delete_slider'])){
                        include("delete_slider.php");
                    }
                    if(isset($_GET['view_user'])){
                        include("view_user.php");
                    }
                    if(isset($_GET['add_user'])){
                        include("add_user.php");
                    }
                    if(isset($_GET['edit_user'])){
                        include("edit_user.php");
                    }
                    if(isset($_GET['delete_user'])){
                        include("delete_user.php");
                    }
                    if(isset($_GET['view_transaksi'])){
                        include("view_transaction.php");
                    }
                    if(isset($_GET['view_pembayaran'])){
                        include("view_pembayaran.php");
                    }
                    if(isset($_GET['logout'])){
                        session_destroy();
                        header("location: ../index.php");
                    }
                ?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
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
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>
