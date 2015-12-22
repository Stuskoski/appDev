<?php
include 'Database.class.php';
include '../views/MasterView.class.php';


/**
 * This php file is for getting the details of
 * an item that is clicked.  It accepts a get
 * value in which it uses to make a DB call and
 * then display all the details of the object.  
 * Also provides links to add it to cart.
 */

//Get is set, take the action from the url and act on it
if (isset($_GET['productId'])){
	
	//Santize the get value
	$productId = filter_var($_GET['productId'], FILTER_SANITIZE_NUMBER_INT);
	
	//get connection
	$dbh = Database::getDB();
	
	//prepare sql
	$getItemInfo = $dbh->prepare("SELECT productName, price, quantity, description, productPic, thumbnail
								  FROM inventory
								  WHERE iid=:iid");
	
	//Bind information to variables
	$getItemInfo->bindParam( ':iid', $productId, PDO::PARAM_INT );
	
	//Execute
	$getItemInfo->execute();
	
	//Fetch the row to see if it exists
	$itemInfo = $getItemInfo->fetch (PDO::FETCH_ASSOC);
	
	
	//check if exists if it doesnt, redirect to product not available page.
	if(!isset($itemInfo['productName']) || $itemInfo['productName']==null){
		header("location:../views/itemMissingView.php");
		exit();
	}
	
	MasterView::show();
	
	
}else{
	header("location:../home");
}

?>