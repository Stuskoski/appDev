<?php
/**
 * These functions are used to get data
 * from the users session. It's like the
 * file cartActions.php in models but that
 * function is more graphical output while
 * this one is textual.
 * @author August
 *
 */
class getUserData{
	public static function getCartTotal(){
		if(isset($_SESSION['cartTotal'])){
			echo "$" . $_SESSION['cartTotal'];
		}else{
			echo "$0.00";
		}
	}
	public static function getCartNumOfItems(){
		if(isset($_SESSION['numOfCartItems'])){
			echo $_SESSION['numOfCartItems'];
		}else{
			echo "0";
		}
	}
	public static function getCartContents(){
		if(isset($_SESSION['numOfCartItems'])){
			if($_SESSION['numOfCartItems'] > 0){
				echo "You have " . $_SESSION['numOfCartItems'] . " items\n";
				if(isset($_SESSION['cart'])){
					foreach($_SESSION['cart'] as $val){
						echo $val . "\n";
					}
				}
			}
			else{
				echo "Cart is empty";
			}
		}else{
			echo"Cart is empty";
		}
		
	}
}
?>