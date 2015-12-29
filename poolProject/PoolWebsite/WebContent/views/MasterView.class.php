<?php
class MasterView{
	public static function showHeader(){
		session_start();
		ob_start();
		?>
		<!DOCTYPE html>
		<html lang="en">
		
		<head>
		
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="pool website store supplies">
		    <meta name="author" content="Augustus Rutkoski">
		
		    <title>Pool Website</title>
		
		    <!-- Bootstrap Core CSS -->
		    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
		
		    <!-- Custom CSS -->
		    <link href="bootstrap/css/shop-homepage.css" rel="stylesheet">
		    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
		    <link href='https://fonts.googleapis.com/css?family=Sansita+One' rel='stylesheet' type='text/css'>
		
		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->
		
		</head>
		<script>
		function clearCart(e)
		{
		    if(!confirm('Are you sure you want to clear your cart?'))e.preventDefault();
		}
		</script>
		
		<body>
		
		    <!-- Navigation -->
		    <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom center" role="navigation">
		        <div class="navbar-inner">
		            <!-- Brand and toggle get grouped for better mobile display -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                    <span class="sr-only">Toggle navigation</span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                </button>
			                 <a class="navbar-brand" id="websiteLogo" href="home"><img src="assets/JohnImg/365-pool-spa-logo.png" class="header-image" alt="" /></a>
			            </div>
			            <!-- Collect the nav links, forms, and other content for toggling -->
			            
				            <div class="collapse navbar-collapse navbar-btns-custom" id="bs-example-navbar-collapse-1" style="float:none;">
				                <ul class="nav navbar-nav nav-center navList">
				                	<li>
				                        <a href="home">Home</a>
				                    </li>
				                    <li>
				                        <a href="placeOrder">Place Order</a>
				                    </li>
				                    <li class="dropdown">
					                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop<span class="caret"></span></a>
					                  <ul class="dropdown-menu">
					                    <li class="dropdown-header">Shopping</li>
					                    <li><a href="products">View All Products</a></li>
					                    <li><a href="specials">Specials</a></li>
					                    <li><a href="categories">Categories</a></li>
					                  </ul>
					                </li>
					                 <li class="dropdown">
					                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cart<span class="caret"></span></a>
					                  <ul class="dropdown-menu">
					                    <li class="dropdown-header">Cart Options</li>
					                    <li><a href="viewCart">View Cart</a></li>
					                    <li><a href="models/cartActions.php?action=clearCart" onclick="clearCart(event)">Clear Cart</a></li>
					                    <li><a href="placeOrder">Place Order</a></li>
					                    <li><a href="poolstore.html">Test Page</a></li>
					                  </ul>
					                </li>
				                    <li class="dropdown">
					                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options<span class="caret"></span></a>
					                  <ul class="dropdown-menu">
					                    <li class="dropdown-header">Nav header</li>
					                    <li><a href="signup">Sign Up</a></li>
					                    <li><a href="placeOrder">Place Order</a></li>
					                    <li><a href="myaccount">My Account</a></li>
					                    <li role="separator" class="divider"></li>
					                    <li class="dropdown-header">Browsing</li>
					                    <li><a href="products">Products</a></li>
					                    <li><a href="specials">Specials</a></li>
					                    <li role="separator" class="divider"></li>
					                    <li class="dropdown-header">Information</li>
					                    <li><a href="about">About</a></li>
					                    <li><a href="contact">Contact Us</a></li>
					                  </ul>
					                </li>
				                </ul>
				                <?php if(!isset($_SESSION['user_session'])){?>
				                <div>
				                  <form class="navbar-form navbar-right navbarGreeting" id="loginForm" action="models/loginUser.php" method="POST">
						            <div class="form-group navbar-signin">
						              <input id="email-form-nav" type="email" placeholder="Email" class="form-control" name="emailLogin" required>
						            </div>
						            <div class="form-group">
						              <input id="password-form-nav" type="password" placeholder="Password" class="form-control" name="passLogin" required>
						            </div>
						            <button type="submit" class="btn-info navbar-btn">Sign in</button>
						          </form>
						       </div>
						       <?php }else{?>
						       <div class="navbar-brand navbar-right navbarGreeting">Welcome <?php echo $_SESSION['firstName'];?> <a id="nav-logout" href="models/logoutUser.php">Logout</a></div>
						       <?php }    
						       ?>
				            </div>       
		            <!-- /.navbar-collapse -->
		            <?php if(isset($_SESSION['loginError'])){
							       	 echo "<span class='loginError'>Invalid email/password.</span><br>";
							       	 unset($_SESSION['loginError']);
							        }?>
		        </div>
		        <!-- /.container -->
		    </nav>
		<?php 
	}
public static function showFooter(){?>
				<div class="site-footer">
					<span>.</span>
			        </div>
		        <!-- Footer -->
		        <footer>
		            <div class="row">
		            	<div class="col-lg-3"></div>
		                <div class="col-lg-6 site-info">
		                    <p><strong>Open M-F 10:00am till 6:00pm  &middot; Sat 10:00am till 3:00pm  &middot;   Closed Sunday.<br><br>
		                    <em>Need Help After Hours? Call (210) 277-8281 because we are often here late!</em></strong><br><br>
		                    <a href="#">&copy;2015 365 Pool &amp; Spa. All Rights Reserved.</a></p>
		                </div>
		            </div>
		        </footer>
		    <!-- /.container -->
		
		    <!-- jQuery -->
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		    <!-- Bootstrap Core JavaScript -->
		    <script src="bootstrap/js/bootstrap.min.js"></script>
		</body>	
		</html>
		<?php 
	}//end function
}//end class