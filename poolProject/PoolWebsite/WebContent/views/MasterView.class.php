<?php
ob_start();
session_start();
class MasterView {
  public static function show() {  		
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pool Shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="assets/style.css" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
<script type="text/javascript" src="assets/js/boxOver.js"></script>
</head>
<body>
<div id="main_container">
  <div id="header">
    <div id="logo"> <a href=""><img src="assets/images/logo.png" alt="" border="0" width="182" height="85" /></a> </div>
    <div class="big_banner"> <a href="home"><img src="assets/images/bannerHolder.png" alt="" border="0" /></a> </div>
  </div>
  <div id="main_content">
    <div id="menu_tab">
      <ul class="menu">
        <li><a href="home" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="products" class="nav">Products</a></li>
        <li class="divider"></li>
        <li><a href="specials" class="nav">Specials</a></li>
        <li class="divider"></li>
        <li><a href="myaccount" class="nav">My account</a></li>
        <li class="divider"></li>
        <li><a href="signup" class="nav">Sign Up</a></li>
        <li class="divider"></li>
        <li><a href="placeOrder" class="nav">Place Order</a></li>
        <li class="divider"></li>
        <li><a href="contact" class="nav">Contact Us</a></li>
        <li class="divider"></li>
        <li><a href="about" class="nav">About</a></li>
        <?php if(isset($_SESSION['user_session'])){?>
        <li class="divider"></li>
        <li><a href="models/logoutUser.php" class="logout">Logout</a></li>
        <?php };?>
        <li><span class="welcomeMsg"><?php if(isset($_SESSION['user_session'])){echo "Welcome";}?></span></li>
        <li><span class="welcomeUser"><?php if(isset($_SESSION['user_session'])){echo strtoupper($_SESSION['firstName']);}?></span></li>
      </ul>
      
    </div>
    <!-- end of menu tab -->
    <div class="crumb_navigation"> Navigation: <span class="current">Home</span> </div>
    <div class="left_content">
      <div class="title_box"><a class="title_box" href="categories">Categories</a></div>
      <ul class="left_menu">
        <li class="odd"><a href="chemicals">Chemicals</a></li>
        <li class="even"><a href="equipment">Equipment</a></li>
        <li class="odd"><a href="accessories">Accessories</a></li>
        <li class="even"><a href="hottubs">Hot Tubs</a></li>
        <li class="odd"><a href="pools">Pools</a></li>
        <li class="even"><a href="poolfloats">Pool Floats</a></li>
        <li class="odd"><a href="hardwareparts">Hardware and Parts</a></li>
      </ul>
      <div class="title_box">Special Products</div>
      <div class="border_box">
        <div class="product_title"><a href="">Test Title</a></div>
        <div class="product_img"><a href=""><img src="assets/images/testImg.png" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
      <div class="title_box"><a class="title_box" href="newsletter">Newsletter</a></div>
      <div class="border_box">
      	<form action="models/subscribeUser.php" method="POST">
        <input type="email" name="newsletter" class="newsletter_input" placeholder="Subscribe for deals!" required/>
        <input type="submit" value="Subscribe"> </form><span><?php if(isset($_SESSION['flag'])){
        																if($_SESSION['flag']==1){
        																	echo "<span class='emailSuccess'>Thanks for subscribing!</span>";
        																}
        																if($_SESSION['flag']==2){
        																	echo "<span class='emailError'>That email is already subscribed</span>";
        																}
        																unset($_SESSION['flag']);
        																} ?></span> </div>
      
      <div class="banner_adds"> <a href="contact"><img src="assets/images/callUsBanner.png" alt="" border="0" /></a> </div>
    </div>
    <!-- end of left content -->
    <!-- end of center content -->
    <div class="right_content">
      <div class="title_box">Search</div>
      <div class="border_box">
        <input type="text" name="search" class="newsletter_input" placeholder="keyword"/>
        <a href="search" class="join">search</a> </div>
      <div class="shopping_cart">
        <div class="title_box"><a class ="title_box" href="cart">Shopping Cart</a></div>
        <div class="cart_details"><?php getUserData::getCartNumOfItems();?> items <br />
          <span class="border_cart"></span> Total: <span class="price"><?php getUserData::getCartTotal();?></span> </div>
        <div class="cart_icon"><a href="cart"><img src="assets/images/shoppingcart.png" alt="" width="35" height="35" border="0" /></a></div>
      </div>
      <div class="title_box">What's new</div>
      <div class="border_box">
        <div class="product_title"><a href="">Test Title</a></div>
        <div class="product_img"><a href=""><img src="assets/images/testImg.png" alt="" border="0" /></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
      </div>
      <div class="title_box">Manufacturers</div>
      <ul class="left_menu">
        <li class="odd"><a href="">Manufacturer1</a></li>
        <li class="even"><a href="">Manufacturer2</a></li>
        <li class="odd"><a href="">Manufacturer3</a></li>
        <li class="even"><a href="">Manufacturer4</a></li>
        <li class="odd"><a href="">Manufacturer5</a></li>
        <li class="even"><a href="">Manufacturer6</a></li>
        <li class="odd"><a href="">Manufacturer7</a></li>
        <li class="even"><a href="">Manufacturer8</a></li>
      </ul>
      <?php if(!isset($_SESSION['user_session'])){?>
      			<br><div class="title_box">Login</div><br>
      			<form action="models/loginUser.php" method="POST">
      			<input type="email" name="emailLogin" value="" placeholder="Email" required>
      			<input class="loginPass" type="password" name="passLogin" value="" placeholder="Password" required>
      			<input class="loginButton" type="submit" value="Login">
      			</form>
      <?php }else{?>
      			<br><div class="title_box logoutBox">Logout</div><br>
      			<form action="models/logoutUser.php" method="POST">
      			<input class="logoutButton" type="submit" value="Logout">
      			</form>
      <?php }
      		if(isset($_SESSION['loginError'])){
      			echo "<span class='loginError'>Invalid email/password.</span><br>";
      			unset($_SESSION['loginError']);
      		}
      		?>
      <div class="banner_adds"> <a href=""><img src="" alt="" border="0" /></a> </div>
    </div>
    <!-- end of right content -->
  </div>
  <!-- end of main content -->
  <div class="footer">
    <div class="left_footer"> <img src="assets/images/footer_logo.png" alt="" width="89" height="42"/> </div>
    <div class="center_footer"> PoolWebsite. All Rights Reserved 2015<br /><br>
      <img src="assets/images/payment.gif" alt="" /> </div>
    <div class="right_footer"> <a href="home">home</a> <a href="about">about</a> <a href="contact">contact us</a> <a href="suggestions">suggestions</a> </div>
  </div>
</div>
<!-- end of main_container -->
</body>
</html>


 <?php
  }
}
?>
