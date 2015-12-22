<?php
class MasterView{
	public static function showHeader(){
		session_start();
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
		
		    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		    <!--[if lt IE 9]>
		        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		    <![endif]-->
		
		</head>
		
		<body>
		
		    <!-- Navigation -->
		    <nav class="navbar navbar-inverse navbar-fixed-top navbar-custom center" role="navigation">
		        <div class="container navbar-inner">
		            <!-- Brand and toggle get grouped for better mobile display -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			                    <span class="sr-only">Toggle navigation</span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                </button>
			                 <a class="navbar-brand" id="websiteLogo" href="home">Uncle John's Pool Website</a>
			            </div>
			            <!-- Collect the nav links, forms, and other content for toggling -->
			            
				            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:none;">
				                <ul class="nav navbar-nav nav-center">
				                    <li>
				                        <a href="about">About</a>
				                    </li>
				                    <li>
				                        <a href="contact">Contact</a>
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
					                  </ul>
					                </li>
					                <li class="dropdown">
					                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cart<span class="caret"></span></a>
					                  <ul class="dropdown-menu">
					                    <li class="dropdown-header">Cart Options</li>
					                    <li><a href="models/cartActions.php?action=viewCart">View Cart</a></li>
					                    <li><a href="models/cartActions.php?action=clearCart">Clear Cart</a></li>
					                    <li><a href="placeOrder">Place Order</a></li>
					                    <li><a href="models/testPage.php">Test Page</a></li>
					                  </ul>
					                </li>
				                </ul>
				                <?php if(!isset($_SESSION['user_session'])){?>
				                <div>
				                  <form class="navbar-form navbar-right pull-right" id="loginForm" action="models/loginUser.php" method="POST">
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
						       <div class="navbar-brand navbar-right pull-right">Welcome <?php echo $_SESSION['firstName'];?> <a id="nav-logout" href="models/logoutUser.php">Logout</a></div>
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
		    
		    <!-- /.container -->
		
		    <div class="container">
		
		        <hr>
		
		        <!-- Footer -->
		        <footer>
		            <div class="row">
		            	<div class="col-lg-6"></div>
		                <div class="col-lg-6">
		                    <p>Copyright &copy; Your Website 2014</p>
		                </div>
		            </div>
		        </footer>
		
		    </div>
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