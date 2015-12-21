<?php
class CartView{
	public static function show(){
?>
		<div class="center_content">
			<a href="models/cartActions.php?action=clearCart">Clear Cart</a>
			<a href="models/cartActions.php?action=viewCart">View Cart</a>
			<a href="placeOrder">Place Order</a>
			<a href="models/testPage.php">Test page</a>
			</div>
<?php 
	}
}
?>