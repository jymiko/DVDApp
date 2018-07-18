<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Store</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="" class="btn btn-success btn-sm">Welcome Guest</a>
                <a href="">Shopping cart total Rp.100.000, Total item 2</a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="../customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="">My Account</a>
                    </li>
                    <li>
                        <a href="">Go To Cart</a>
                    </li>
                    <li>
                        <a href="">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="">Video Store</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menunavigation">
                    <span class="sr-only sr-only-focusable">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="menunavigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item">
                            <a href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../shop.php">Shop</a>
                        </li>
                        <li class="active">
                            <a href="account.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="../cart.php">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a href="../contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-primary navbar-btn right" href="">
                    <i class="fa fa-shopping-cart"></i>
                    <span>4 Items in cart</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                            <i class="fa fa-search"></i>
                        </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="user_search" required>
                            <span class="input-group-btn">
                                <button type="submit" value="search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <?php 
                        if (isset($_GET['my_orders'])){
                            include("my_orders.php");
                        }
                        if(isset($_GET['pay_offline'])){
                            include("pay_offline.php");
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("includes/footer.php");
    ?>
    <script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>