<?php
session_start();
include 'Database.class.php';

//Check if the get value exists, else go back home.
if(isset($_GET['productId'])){
	$productId = $_GET['productId'];
	if(isset($_SESSION['numOfCartItems'])){
		//check if exists in database
		checkProduct($productId);
		
		$_SESSION['numOfCartItems']++;
	}
	else{
		//check if exists in database
		checkProduct($productId);
		
		$_SESSION['numOfCartItems'] = 1;
	}
	
	//redirect home when finished.  Will need to change this eventually to just go back to last page
	header("location:../home");
	
}
else{
	//if a productID isn't set in get, redirect home
	header("location:../home");
}

function checkProduct($productId){
	//connect to db
	$dbh = Database::getDB();
	
	//prepare qry
	$check = $dbh->prepare("SELECT iid, price, quantity
								FROM inventory
								WHERE iid=:iid");
	
	//Bind the values
	$check->bindParam ( ':iid', $productId, PDO::PARAM_INT );
	
	//execute
	$check->execute();
	
	//Fetch the row to see if it exists
	$item = $check->fetch (PDO::FETCH_ASSOC);
	
	//first check if item exists, then check if sufficient quantity
	if(isset($item['iid'])){
		if(isset($item['quantity'])){
			if($item['quantity']>0){
				//if item exists and has sufficient quantity, add price to cart total. Don't decrement here yet, wait till an order is placed. 
				//First come first serve remember.
				if(isset($_SESSION['cartTotal'])){
					$_SESSION['cartTotal'] += $item['price'];
				}else{
					$_SESSION['cartTotal'] = $item['price'];
				}
			}else{
				//insufficient quantity
				header("location:../views/itemMissingView.php");
				exit();
			}
		}
	}else{
		//Item doesn't exist
		header("location:../views/itemMissingView.php");
		exit();
			
	}
}
?>
