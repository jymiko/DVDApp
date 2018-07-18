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
                        <li class="nav-item">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a href="customer/my_account.php">My Account</a>
                        </li>
                        <li class="active">
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
                    <li>Cart</li>
                </ul>
            </div>
            <div class="col-md-9" id="cart">
                <div class="box">
                    <form action="cart.php" method="post" enctype="multipart-from-data">
                        <h1>Shopping Cart</h1>
                        <p class="text-muted">You currently have 3 item(s) on your cart</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="admin/product_images/1.jpg" class="img-responsive"> 
                                        </td>
                                        <td>
                                            <a href="">The Avengers ( 2012 )</a>
                                        </td>
                                        <td>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>Rp.35.000,00</p>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]">
                                        </td>
                                        <td>
                                            <p>Rp.70.000</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="admin/product_images/1.jpg" class="img-responsive"> 
                                        </td>
                                        <td>
                                            <a href="">The Avengers ( 2012 )</a>
                                        </td>
                                        <td>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>Rp.35.000,00</p>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]">
                                        </td>
                                        <td>
                                            <p>Rp.70.000</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="admin/product_images/1.jpg" class="img-responsive"> 
                                        </td>
                                        <td>
                                            <a href="">The Avengers ( 2012 )</a>
                                        </td>
                                        <td>
                                            <p>2</p>
                                        </td>
                                        <td>
                                            <p>Rp.35.000,00</p>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]">
                                        </td>
                                        <td>
                                            <p>Rp.70.000</p>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">Rp.210.000</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="index.php" class="btn btn-default">
                                    <i class="fa fa-chevron-left"></i> Continue Shopping
                                </a>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default" type="submit" name ="update" value="Update Cart">
                                    <i class="fa fa-refresh"></i> Update Cart
                                </button>
                                <a href="checkout.php" class="btn btn-primary">
                                    Process to Checkout
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </form>
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
            <div class="col-md-3">
                <div class="box" id="order-summary">
                    <div class="box-header">
                        <h3>Order Summary</h3>
                    </div>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo esse accusantium temporibus eius asperiores ullam consequuntur perspiciatis expedita veritatis, corrupti debitis alias, tempora impedit suscipit minima eos! Amet, accusantium cum?
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <th>Rp.210.000</th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>Rp.30.000</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>Rp.0</td>
                                </tr>
                                <tr class="total">
                                    <td>Total </td>
                                    <th>Rp.240.000</th>
                                </tr>
                            </tbody>
                        </table>
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