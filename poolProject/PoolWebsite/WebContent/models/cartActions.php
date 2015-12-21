<?php
/**
 * These functions are for getting data from
 * the users cart.  This file is similar
 * to getUserData.class.php in models but this
 * one is more graphical output while getUserData
 * is more texual
 */
session_start();

//Get is set, take the action from the url and act on it
if (isset($_GET['action'])){
	
	//Get the GET value table from the url
	$action = $_GET['action'];
	
	//switch for various actions
	switch($action){
		case "clearCart":
			clearCart();
			break;
		case "viewCart":
			viewCart();
			break;
		case "clearCartAfterOrder":
			clearCartAfterOrder();
			break;
		default:
			header("location:../cart");
	};
	
}else{
	header("location:../cart");
}

/**
 * This function will clear the session variables
 * that correspond to the users cart.  Pretty simple.
 */
function clearCart(){
	unset($_SESSION['numOfCartItems']);
	unset($_SESSION['cartTotal']);
	unset($_SESSION['cart']);
	header("location:../cart");
}

function viewCart(){
	if(isset($_SESSION['cart'])){
		print_r($_SESSION['cart']);
	}else{
		echo "Your cart is empty";
	}
}

function clearCartAfterOrder(){
	unset($_SESSION['numOfCartItems']);
	unset($_SESSION['cartTotal']);
	unset($_SESSION['cart']);
	$_SESSION['orderConfirmed'] = 1;
	header("location:../orderConfirmed");
}
	
	
?>