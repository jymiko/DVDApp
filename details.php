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
                        <li class="active">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
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
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="row" id="productMain">
                    <div class="col-md-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                    <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin/product_images/1.jpg" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin/product_images/4.jpg" class="img-responsive">
                                        </center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>            
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <h1 class="text-center">The Avengers (2012)</h1>
                            <form action="detail.php" method="post" class=""form-horizontal>
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Product Quantity</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price">Rp.35.000,00</p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-shopping-cart"></i>Add to Cart
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin/product_images/4.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin/product_images/4.jpg" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin/product_images/4.jpg" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <p>
                        <h4>Product Details</h4>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab doloremque libero iure inventore dolore minima dicta esse dignissimos labore impedit, atque voluptates autem consequuntur recusandae nisi enim ipsam, voluptate odit!</p>
                    </p>
                </div>
                <div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You also like these Products</h3>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3 col-sm-6">
                        <div class="product same-height">
                            <a href="detail.php">
                                <img src="admin/product_images/3.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php">Avengers Age of Ultron</a></h3>
                                <p class="price">Rp.40.000,00</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3 col-sm-6">
                        <div class="product same-height">
                            <a href="detail.php">
                                <img src="admin/product_images/3.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php">Avengers Age of Ultron</a></h3>
                                <p class="price">Rp.40.000,00</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-responsive col-md-3 col-sm-6">
                        <div class="product same-height">
                            <a href="detail.php">
                                <img src="admin/product_images/3.jpg" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php">Avengers Age of Ultron</a></h3>
                                <p class="price">Rp.40.000,00</p>
                            </div>
                        </div>
                    </div>
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