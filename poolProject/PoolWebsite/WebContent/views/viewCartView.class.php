<?php
class viewCartView{
	public static function viewCart(){
		?>
		<div class="container viewCart">
		<div class="cartTitle">Shopping Cart</div>
			<!-- Headers for the cart -->
			<div class="row">
			  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			  	<div class="cartProductName">Product Name</div>
			  </div>
			  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			  	<div class="cartProductPrice">Product Price</div>
			  </div>
			  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			  	<div class="cartProductQuantity">Quantity</div><br>
			  </div>
			</div>
			<hr class="cartSep">
			<!-- Products in cart -->
			<div class="row">
			  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			  	<div class="cartProductName"><?php getUserData::shoppingCartProductName(1);?></div>
			  </div>
			  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			  	<div class="cartProductPrice"><?php getUserData::shoppingCartProductPrice(1);?></div>
			  </div>
			  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
			  	<div class="cartProductQuantity"><?php getUserData::shoppingCartProductQuantity(1);?></div><br>
			  </div>
			</div>
			<hr class="cartSep">
			<div class="row">
				<div class="col-lg-5 col-md-2 col-sm-3 col-xs-4">
					<a class="btn btn-warning btn-md contBtn1 shoppingCartOrder" href="placeOrder">Order Now</a>
				</div>
				<div class="col-lg-5 col-md-7 col-sm-5 col-xs-0">
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4 col-xs-8">
					<div class="cartInfo">Items(<?php getUserData::getCartNumOfItems();?>):<?php getUserData::getCartTotal();?></div>
				</div>
			</div>
		</div>
		<?php 
	}
}