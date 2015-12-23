<?php
class viewCartView{
	public static function viewCart(){
		?>
		<div class="container viewCart">
			<div class="cartTitle" >Shopping Cart</div>
		<?php
		if(isset($_SESSION['cart'])){
			print_r($_SESSION['cart']);
		}else{
			echo "Your cart is empty";
		}
		?>	
			<hr class="cartSep">
			<div class="cartInfo">Items(<?php getUserData::getCartNumOfItems();?>):<?php getUserData::getCartTotal();?></div>
		</div>
		<?php 
	}
}