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
                        <a href="customer_register.php">Register</a>
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
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="customer/my_account.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php">Contact Us</a>
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
                    <li>Shop</li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li><a href="shop.php">Horror</a></li>
                            <li><a href="shop.php">Drama</a></li>
                            <li><a href="shop.php">Cartoon</a></li>
                            <li><a href="shop.php">Fantasy</a></li>
                            <li><a href="shop.php">Sci-Fi</a></li>
                            <li><a href="shop.php">Comedy</a></li>
                            <li><a href="shop.php">Biography</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <h1>Shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ab commodi at ea voluptatum odio aliquid, ex dolores ipsa accusantium vitae qui sint doloribus fugiat harum sunt atque itaque! Reiciendis!</p>    
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/1.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="">The Avengers</a>
                                </h3>
                                <p class="price">
                                    Rp.35.000,00
                                </p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">View Details</a>
                                    <a href="details.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <ul class="pagination">
                        <li><a href="">First Page</a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li><a href="">Last Page</a></li>
                    </ul>
                </center>
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