<?php

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
				echo "You have " . $_SESSION['numOfCartItems'] . " items";
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