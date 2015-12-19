<?php
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
	header("location:../cart");
}
	
	
?>