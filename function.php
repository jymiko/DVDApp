<?php
	$GLOBALS['servername'] = "localhost";
	$GLOBALS['username'] = "root";
	$GLOBALS['password'] = "";
	$GLOBALS['dbname'] = "dvd_store";
	ob_start();
	function home() {
		include("header.php");
	}
	function top() {
		?>
		<div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="" class="btn btn-success btn-sm">Welcome <?php echo (isset($_SESSION['login']) ? $_SESSION['nama'] : "Guest") ?></a>
				<?php if(isset($_SESSION["login"])) {
				?>
                <a href="">Shopping cart total Rp.<?php totalPrice(); ?>, Total item <?php getcart(); ?></a>
				<?php
				}
				?>
            </div>
            <div class="col-md-6">
                <ul class="menu">
					<?php
					if(!isset($_SESSION['login'])) {
					?>
                    <li>
                        <a href="index?page=register">Register</a>
                    </li>
					<?php
					}
					if(isset($_SESSION['login'])) {
					?>
                    <li>
                        <a href="">My Account</a>
                    </li>
                    <li>
                        <a href="">Go To Cart</a>
                    </li>
					<?php
					}
					?>
                    <li>
                        <a href="<?php echo (isset($_SESSION['login']) ? "index?page=logout" : "index?page=login") ?>"><?php echo (isset($_SESSION['login']) ? "Logout" : "Login") ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
	}
	function slider() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		$sql = "SELECT * FROM tbl_slider";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			?>
		    <div class="container" id="slider">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                	<?php
                	for($i=0;$i < $result->num_rows; $i++) {
                		echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.($i == 0 ? 'active' : '').'"></li>';
                	}
                	?>
                </ol>
                <div class="carousel-inner">
                	<?php
		    while($row = $result->fetch_assoc()) {
		        echo '<div class="item '.($row['slide_id'] == 1 ? 'active' : '').'">';
                    echo '<img src="admin/slide_images/'.$row['slide_images'].'" alt="">';
                echo '</div>';
		    }
		    ?>
		    </div>
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Starts -->

                    <span class="glyphicon glyphicon-chevron-left"> </span>

                    <span class="sr-only"> Previous </span>

                    </a><!-- left carousel-control Ends -->

                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

                    <span class="glyphicon glyphicon-chevron-right"> </span>

                    <span class="sr-only"> Next </span>

                    </a><!-- right carousel-control Ends -->

            </div>
        </div>
    </div>
        <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="">WE LOVE OUR CUSTOMER</a></h3>
                        <p>we are know to provide best possible service ever</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-tags"></i>
                        </div>
                        <h3><a href="">BEST PRICE</a></h3>
                        <p>you can check all other sites about the prices and compare with us</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <h3><a href="">100% GUARANTEED  </a></h3>
                        <p>free return on everything in 1 month with terms and privacy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        	<?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	function loadhomeproduct() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT 4";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
		    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>Latest This Week</h2>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container">
        <div class="row">
        	<?php
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<div class="col-sm-4 col-sm-6 single">
                <div class="product">
                    <center>
                    <a href="">
                        <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" alt="" class="img-responsive">
                    </a>
                    </center>
                    <div class="text">
                        <h3><a href=""><?php echo $row["product_title"]; ?></a></h3>
                        <p class="price">Rp.<?php echo $row["product_price"]; ?></p>
                        <p class="buttons">
                            <a href="index?page=detail&id=<?php echo $row["id_product"]; ?>" class="btn btn-default">View Details</a>
                            <a href="index?page=detail&id=<?php echo $row["id_product"]; ?>" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>
                                Add to Cart
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
		    }
		    ?>
		            </div>
    </div>
    <?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	function addtocart($id, $product, $quantity = 1) {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "INSERT INTO tbl_cart (id_customer, id_product, quantity) VALUES ($id, $product, $quantity)";
            if ($conn->query($sql) === TRUE) {
                header("location:index?page=shop");
            } else {
                header("location:index?page=shop");
            }
	}
	function navbar() { ?>
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
                            <a href="index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="index?page=shop">Shop</a>
                        </li>
						<?php
						if(isset($_SESSION["login"])) {
						?>
                        <li class="nav-item">
                            <a href="index?page=account">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="index?page=cart">Shopping Cart</a>
                        </li>
						<?php
						}
						?>
                        <li class="nav-item">
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
				<?php if(isset($_SESSION["login"])) { ?>
                <a class="btn btn-primary navbar-btn right" href="">
                    <i class="fa fa-shopping-cart"></i>
                    <span><?php getcart(); ?> Items in cart</span>
                </a>
				<?php } ?>
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
    <?php
	}
	function footer() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product_category";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
			<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="customer/my_account.php">My Account</a></li>
                </ul>
                <hr>
                <h4>User Section</h4>
                <ul>
                    <li><a href="">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Top Product Categories</h4>
                <ul>
                	<?php
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	?>
		    	<li><a href=""><?php echo $row["cat_p_title"]; ?></a></li>
		        <?php
		    }
		    ?>
		    </ul>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Where to find Us</h4>
                <p>
                    <strong>Video Store. Ltd</strong>
                    <br>Malang
                    <br>0341
                    <br>Video Store Company
                    <br>videostore@gmail.com
                    <br>
                    <strong>Video Store Company</strong>
                </p>
                <a href="contact.php">Contact Us Page</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>Get the news</h4>
                <p class="text-muted">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi iste, labore consequuntur exercitationem eos sequi nisi ullam consequatur voluptatum quae? Modi vel similique eum labore aperiam quasi quod rem dolorem.
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">
                        <span class="input-group-btn">
                        <input type="submit" value="subscribe" class="btn btn-default">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>Stay in touch</h4>
                <p class="social">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
		} else {
		    echo "0 results";
		}
		$conn->close();
	}
	function breadcrumb($text) {
		?>
		<div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="index">Home</a></li>
                    <li><?php echo $text; ?></li>
                </ul>
            </div>
            <?php
	}
	function loadcategory() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product_category";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
		<div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                        	<?php
                        	while($row = $result->fetch_assoc()) {
                        		?>
                            <li><a href="shop.php"><?php echo $row["cat_p_title"]; ?></a></li>
                            <?php
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            } else {
		    echo "0 results";
		}
		$conn->close();
	}
	function totalprice() {
		$total=0;
		$db = mysqli_connect($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		$id = $_SESSION["id"];
        $select_cart = "select * from tbl_cart where id_customer='$id'";
        $run_cart = mysqli_query($db,$select_cart);
        while($record=mysqli_fetch_array($run_cart)){
        $id_product=$record['id_product'];
        $quantity=$record['quantity'];
        $get_price = "select * from tbl_product where id_product='$id_product'";
        $run_price = mysqli_query($db,$get_price);
        while($row_price = mysqli_fetch_array($run_price)){
            $sub_total = $row_price['product_price'] * $quantity;
            $total += $sub_total;
        }
        }
        echo $total;
	}
	function getcart() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$id = $_SESSION["id"];
		$sql = "SELECT * FROM tbl_cart WHERE id_customer=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			echo $result->num_rows;
		} else {
			echo "0";
		}
		$conn->close();
	}
	function loadproductshop($pageno = 1) {
		$no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);

		$total_pages_sql = "SELECT COUNT(*) FROM tbl_product";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product LIMIT $offset, $no_of_records_per_page";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		?>
		<div class="col-md-9">
                <div class="box">
                    <h1>Shop</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ab commodi at ea voluptatum odio aliquid, ex dolores ipsa accusantium vitae qui sint doloribus fugiat harum sunt atque itaque! Reiciendis!</p>    
                </div>
                <div class="row">
                	<?php
                	while($row = $result->fetch_assoc()) {
                		?>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="">
                                <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href=""><?php echo $row["product_title"]; ?></a>
                                </h3>
                                <p class="price">
                                    Rp.<?php echo $row["product_price"]; ?>
                                </p>
                                <p class="buttons">
                                    <a href="index?page=detail&id=<?php echo $row["id_product"]; ?>" class="btn btn-default">View Details</a>
                                    <a href="index?page=detail&id=<?php echo $row["id_product"]; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                </p>
                            </div>
                        </div>
                    </div>
           			<?php 
           			} 
           		?>
           		</div>
                <center>
                    <ul class="pagination">
                        <li class="<?php if(!isset($_GET["pageno"]) || $_GET["pageno"] == 1){ echo 'disabled'; } ?>"><a href="index?page=shop">First Page</a></li>
                        <?php
                        for($i=1;$i <= $total_pages;$i++) {
                        	?>
                        	<li class="
                        	<?php
                        	if(!isset($_GET["pageno"]) && $i == 1) {
                        		echo 'disabled';
							} else {
								if($_GET["pageno"] == $i) {
									echo 'disabled';
								}
							}
                        		?>
                        	"><a href="<?php echo 'index?page=shop&pageno='.$i; ?>"><?php echo $i; ?></a></li>
                        	<?php
                    }
                    ?>
                        <li class="<?php if($_GET["pageno"] == $total_pages){ echo 'disabled'; } ?>"><a href="<?php echo 'index?page=shop&pageno='.$total_pages; ?>">Last Page</a></li>
                    </ul>
                </center>
            <?php
            } else {
		    echo "0 results";
		}
		$conn->close();
		?>
		</div>
		<?php
	}
	function loadcart() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$GLOBALS["total"] = 0;
		$id = $_SESSION["id"];
		$sql = "SELECT * FROM tbl_cart, tbl_product WHERE tbl_cart.id_product=tbl_product.id_product AND id_customer=$id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			?>
			<div class="box">
                    <form action="index?page=updatecart" method="post" enctype="multipart-from-data">
                        <h1>Shopping Cart</h1>
                        <p class="text-muted">You currently have <?php getcart(); ?> item(s) on your cart</p>
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
								<?php
			while($row = $result->fetch_assoc()) {
				$subtotal = $row["product_price"] * $row["quantity"];
				?>
									<tr>
                                        <td>
                                            <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" class="img-responsive"> 
                                        </td>
                                        <td>
                                            <a href=""><?php echo $row["product_title"]; ?></a>
                                        </td>
                                        <td>
                                            <p><?php echo $row["quantity"]; ?></p>
                                        </td>
                                        <td>
                                            <p>Rp.<?php echo $row["product_price"]; ?></p>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $row["id_cart"]; ?>">
                                        </td>
                                        <td>
                                            <p>Rp.<?php echo $subtotal; ?></p>
                                        </td>
                                    </tr>
									<?php
									$GLOBALS["total"] += $subtotal;
			}
			?>
			</tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">Rp.<?php echo $GLOBALS["total"]; ?></th>
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
				<?php
		} else {
			?>
			<div class="box">
                    <form action="index?page=updatecart" method="post" enctype="multipart-from-data">
                        <h1>Shopping Cart</h1>
                        <p class="text-muted">You currently have <?php getcart(); ?> item(s) on your cart</p>
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
								</tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total</th>
                                        <th colspan="2">Rp.<?php echo $GLOBALS["total"]; ?></th>
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
				<?php
		}
		$conn->close();
		?>
                
                  
			<?php
	}
	function deletecart() {
		if(isset($_POST["remove"])) {
			$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
			// sql to delete a record
			$sql = 'DELETE FROM tbl_cart WHERE id_cart IN(' . implode(',', $_POST['remove']) . ')';

			if ($conn->query($sql) === TRUE) {
				header("Location: index?page=cart");
			} else {
				echo "Error deleting record: " . $conn->error;
			}

			$conn->close();
		}
	}
	function cart() { ?>
		<div id="content">
        <div class="container">
        <?php
		breadcrumb("My Account");
		?>
            
            <div class="col-md-9" id="cart">
                <?php loadcart(); ?>
                <?php loadsuggestcart(); ?>
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
                                    <th>Rp.<?php echo $GLOBALS["total"]; ?></th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <th>Rp.0</th>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>Rp.0</td>
                                </tr>
                                <tr class="total">
                                    <td>Total </td>
                                    <th>Rp.<?php echo $GLOBALS["total"]; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
		</div>
		<?php
	}
	function loadsuggestcart() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT 3";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			?>
			<div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You also like these Products</h3>
                        </div>
                    </div>
					<?php
			while($row = $result->fetch_assoc()) {
				?>
				<div class="center-responsive col-md-3 col-sm-6">
                        <div class="product same-height">
                            <a href="detail.php">
                                <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php"><?php echo $row["product_title"]; ?></a></h3>
                                <p class="price">Rp.<?php echo $row["product_price"]; ?></p>
                            </div>
                        </div>
                    </div>
					<?php
			}
			?>
			</div>
			<?php
		} else {
			echo "0 results";
		}
		$conn->close();
		?>
				<?php
	}
	function loaddetailproduct($id) {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product WHERE id_product='$id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
			<?php
			// output data of each row
			while($row = $result->fetch_assoc()) {
				?>
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
                                            <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" class="img-responsive">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin/product_images/<?php echo $row["product_img2"]; ?>" class="img-responsive">
                                        </center>
                                    </div>
									<div class="item">
                                        <center>
                                            <img src="admin/product_images/<?php echo $row["product_img3"]; ?>" class="img-responsive">
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
                            <h1 class="text-center"><?php echo $row["product_title"]; ?></h1>
                            <form action="index?page=addcart" method="post" class=""form-horizontal>
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
										<input type="hidden" name="idproduct" value="<?php echo $row["id_product"]; ?>">
                                    </div>
                                </div>
                                <p class="price">Rp.<?php echo $row["product_price"]; ?></p>
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
                                    <img src="admin/product_images/<?php echo $row["product_img1"]; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin/product_images/<?php echo $row["product_img2"]; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin/product_images/<?php echo $row["product_img3"]; ?>" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="box" id="details">
                    <p>
                        <h4>Product Details</h4>
                        <p><?php echo $row["product_desc"]; ?></p>
                    </p>
                </div>
					<?php
			}
		} else {
			echo "0 results";
		}
		$conn->close();
	}
	function loadsuggest() {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT 3";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			?>
			<div id="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">You also like these Products</h3>
                        </div>
                    </div>
					<?php
			// output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				<div class="center-responsive col-md-3 col-sm-6">
                        <div class="product same-height">
                            <a href="detail.php">
                                <img src="admin/product_images/<?php echo $row["product_img1"];  ?>" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="detail.php"><?php echo $row["product_title"]; ?></a></h3>
                                <p class="price">Rp.<?php echo $row["product_price"]; ?></p>
                            </div>
                        </div>
                    </div>
					<?php
			}
			?>
			</div>
			<?php
		} else {
			echo "0 results";
		}
		$conn->close();
	}
	function loadshop($page = 1) {
		?>
		<div id="content">
        <div class="container">
        <?php
		breadcrumb("Shop");
		loadcategory();
		loadproductshop($page);
		?>
		</div>
    	</div>
    	<?php
	}
	function loaddetailshop($id = 0) {
		?>
		<div id="content">
        <div class="container">
		<?php 
		breadcrumb("Shop");
		loadcategory();
		?>
		<div class="col-md-9">
		<?php
		loaddetailproduct($id);
		loadsuggest();
		?>
		</div>
		</div>
    	</div>
		<?php
	}
	function loadlogin() {
		?>
		<div id="content">
        <div class="container">
        <?php
		breadcrumb("Login");
		loadcategory();
		?>
		<div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Login</h2>
                        </center>                    
                    </div>
                    <form action="index?page=processlogin" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="text" class="form-control" name="c_email" required>
                        </div>
                        <div class="form-group">
                            <label>Customer Password</label>
                            <input type="password" class="form-control" name="c_pass" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="login">
                                <i class="fa fa-user-md"></i> Login           
                            </button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
    	</div>
    	<?php
	}
	function loadregister() {
		?>
		<div id="content">
        <div class="container">
        <?php
		breadcrumb("Login");
		loadcategory();
		?>
		<div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Register a New Account</h2>
                        </center>                    
                    </div>
                    <form action="index?page=processregister" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control" name="c_name" required>
                        </div>
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="text" class="form-control" name="c_email" required>
                        </div>
                        <div class="form-group">
                            <label>Customer Password</label>
                            <input type="password" class="form-control" name="c_pass" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="c_country" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="c_city" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="c_contact" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="c_address" required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="c_image" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="register">
                                <i class="fa fa-user-md"></i> Register           
                            </button>
                        </div>
                    </form>
                </div>
            </div>
		</div>
    	</div>
    	<?php
	}
	function login($email, $password) {
			$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql = "SELECT * FROM tbl_customer,tbl_role WHERE tbl_customer.id_role=tbl_role.id_role AND customer_email='$email' AND customer_password='$password'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['login'] = true;
                    $_SESSION["id"] = $row["id_customer"];
                    $_SESSION["nama"] = $row["customer_name"];
                    $_SESSION["email"] = $row["customer_email"];
					$_SESSION["password"] = $row["customer_password"];
					$_SESSION["country"] = $row["country"];
					$_SESSION["city"] = $row["city"];
                    $_SESSION["telp"] = $row["phone_number"];
					$_SESSION["address"] = $row["address"];
					$_SESSION["image"] = $row["image"];
                    if($row["nama_role"] == "Admin") {
                        $_SESSION['admin'] = true;
                    } else {
                        $_SESSION["admin"] = false;
                    }
                }
                header("location: index");
            } else {
                header("location:index?page=login");
            }
        }
        function logout() {
            session_destroy();
            header("location:index");
        }
	function register($nama, $email, $password, $country, $city, $phone, $address, $image) {
			$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "INSERT INTO tbl_customer (id_role, customer_name, customer_email, customer_password, country, city, phone_number, address, image) VALUES (1, '$nama', '$email', '$password', '$country', '$city', '$phone', '$address', '$image')";
            if ($conn->query($sql) === TRUE) {
                header("location:index");
            } else {
                header("location:index");
            }
        }
	function loadinfoaccount() {
		?>
		<div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
				<div class="panel-heading">
					<center>
						<img src="customer/customer_images/<?php echo $_SESSION["image"]; ?>" class="img-responsive">
					</center>
					<br>
					<h3 align="center" class="panel-title">Name : <?php echo $_SESSION["nama"]; ?></h3>
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked">
						<li class="<?php if(isset($_GET['my_orders'])){echo "active";} ?>">
							<a href="my_account.php?my_orders">
								<i class="fa fa-list"></i> My Orders
							</a>
						</li>
						<li class="<?php if(isset($_GET['pay_offline'])){echo "active";} ?>">
							<a href="my_account.php?pay_offline">
								<i class="fa fa-bolt"></i> Pay Offline
							</a>
						</li>
						<li class="<?php if(isset($_GET['edit_account'])){echo "active";} ?>">
							<a href="index?page=account&editaccount">
								<i class="fa fa-pencil"></i> Edit Account
							</a>
						</li>
						<li class="<?php if(isset($_GET['change_pass'])){echo "active";} ?>">
							<a href="index?page=account&changepass">
								<i class="fa fa-user"></i> Change Password
							</a>
						</li>
						<li>
							<a href="index?page=logout">
								<i class="fa fa-sign-out"></i> Log Out
							</a>
						</li>
					</ul>
				</div>
			</div>
			</div>
			<?php
	}
	function loadeditaccount() {
		?>
		<h1>Edit Your Account</h1>
		<form action="index?page=setaccount" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Customer Name :</label>
				<input type="text" name="c_name" class="form-control" value="<?php echo $_SESSION["nama"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer Email :</label>
				<input type="text" name="c_email" class="form-control" value="<?php echo $_SESSION["email"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer Country :</label>
				<input type="text" name="c_country" class="form-control" value="<?php echo $_SESSION["country"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer City :</label>
				<input type="text" name="c_city" class="form-control" value="<?php echo $_SESSION["city"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer Contact :</label>
				<input type="text" name="c_contact" class="form-control" value="<?php echo $_SESSION["telp"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer Address :</label>
				<input type="text" name="c_address" class="form-control" value="<?php echo $_SESSION["address"]; ?>" required>
			</div>
			<div class="form-group">
				<label>Customer Image :</label>
				<input type="file" name="c_image" class="form-control" required><br>
				<img src="customer/customer_images/<?php echo $_SESSION["image"]; ?>" width="100" height="100" class="img-responsive">
			</div>
			<div class="text-center">
				<button name="update" class="btn btn-primary">
					<i class="fa fa-user-md"></i> Update Now
				</button>
			</div>
		</form>
		<?php
	}
	function loadchangepass() {
		?>
		<h1 align="center">Change Password</h1>
		<form action="index?page=setpass" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Current Password</label>
				<input type="password" name="old_pass" class="form-control" required>
			</div>
			<div class="form-group">
				<label>New Password</label>
				<input type="password" name="new_pass" class="form-control" required>
			</div>
			<div class="form-group">
				<label>Confirm New Password</label>
				<input type="password" name="c_new_pass" class="form-control" required>
			</div>
			<div class="text-center">
				<button type="submit" name="submit" class="btn btn-primary">
					<i class="fa fa-user-md"></i> Change Password
				</button>
			</div>
		</form>
		<?php
	}
	function loadcheckout() {
		?>
		<div class="box">
			<h1 class="text-center">Payment Option</h1>
			<p class="lead text-center">
				<a href="index?page=processorder">Pay Offline</a>
			</p>
			<center>
				<p class="lead">
					<a href="">Pay Online with Paypal
						<img src="images/paypal.png" width="400" height="300" class="img-responsive">
					</a>
				</p>
			</center>
		</div>
		<?php
	}
	function loadorder() {
		?>
		<center>
			<h1>My Orders</h1>
			<p class="lead">Your order on one place.</p>
			<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sunt et reprehenderit enim amet sed fuga ex, praesentium illo eligendi aperiam eaque iure neque? Totam rerum assumenda exercitationem eum quaerat.</p>
		</center>
		<hr>
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>O N:</th>
						<th>Due Amount:</th>
						<th>Invoice No:</th>
						<th>Qty:</th>
						<th>Order Date:</th>
						<th>Paid / Unpaid:</th>
						<th>Status:</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
						$customer_id = $_SESSION['id'];
						$get_orders = "select * from tbl_order where id_customer='$customer_id'";
						$run_orders = $conn->query($get_orders);
						$i = 0;
						while($row_order = $run_orders->fetch_assoc()){
							$id_order = $row_order['id_order'];
							$amount = $row_order['amount'];
							$invoice_no = $row_order['invoice_no'];
							$quantity = $row_order['quantity'];
							$order_date = substr($row_order['order_date'],0,11);
							$i++;
							$order_status = $row_order['order_status'];
							if($order_status == 'pending'){
								$order_status = "Unpaid";
							}else{
								$order_status = "Paid";
							}
					?>
					<tr>
						<th><?php echo $i; ?></th>
						<td>Rp.<?php echo $amount; ?></td>
						<td><?php echo $invoice_no; ?></td>
						<td><?php echo $quantity; ?></td>
						<td><?php echo $order_date; ?></td>
						<td><?php echo $order_status; ?></td>
						<td>
							<a href="index?page=account&pay&id_order=<?php echo $id_order; ?>" class="btn btn-primary btn-sm">Confirm If Paid</a>
						</td>
					</tr>
					<?php }
					$conn->close();
					?>
				</tbody>
			</table>
		</div>
		<?php
	}
	function loadpay($id) {
		$conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
						$customer_id = $_SESSION['id'];
						$get_orders = "select * from tbl_order where id_customer='$customer_id'";
						$run_orders = $conn->query($get_orders);
						while($row_order = $run_orders->fetch_assoc()){
							$id_order = $row_order['id_order'];
							$amount = $row_order['amount'];
							$invoice_no = $row_order['invoice_no'];
							$quantity = $row_order['quantity'];
							$order_date = substr($row_order['order_date'],0,11);
							$order_status = $row_order['order_status'];
						}
		?>
		<h1 align="center">Please Confirm Your Payment</h1>
                    <form action="index?page=processpay" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Invoice No:</label>
                            <input type="text" class="form-control" name="invoice_no" value=<?php echo $invoice_no; ?> disabled>
							<input type="hidden" name="idorder" value="<?php echo $id_order; ?>">
                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="ammount_sent" value=<?php echo $amount; ?> disabled>
                        </div>
                        <div class="form-group">
                            <select name="payment_mode" class="form-control">
                                <option>Select Payment Mode</option>
                                <option>Bank</option>
                                <option>Credit Card</option>
                                <option>Paypal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Transaction/Reference Id:</label>
                            <input type="text" class="form-control" name="ref_no" required>
                        </div>
                        <div class="form-group">
                            <label>Payment Date:</label>
                            <input type="text" class="form-control" name="date" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                <i class="fa fa-user-md"></i> Confirm Payment
                            </button>
                        </div>
                    </form>
					<?php
	}
	function loadaccount() {
		?>
		<div id="content">
        <div class="container">
        <?php
		breadcrumb("My Account");
		loadinfoaccount();
		?>
		<div class="col-md-9">
                <div class="box">
                    <?php 
						if(isset($_GET["editaccount"])) {
                        loadeditaccount();
						} else if(isset($_GET["changepass"])) {
							loadchangepass();
						} else if(isset($_GET["checkout"])) {
							loadcheckout();
						} else if(isset($_GET["order"])) {
							loadorder();
						} else if(isset($_GET["pay"])) {
							loadpay($_GET["id_order"]);
						}
                    ?>
                </div>
            </div>
			</div>
			</div>
			<?php
	}
?>