<?php
//dont forget to change default session timer for session variables in php.ini
session_start();
include 'Database.class.php';

//Check if the get value exists, else go back home.
if(isset($_POST['productId']) && isset($_POST['quantity'])){
	
	//Filter numbers for now.  Might have to change if not only numbers
	$productId = filter_var($_POST['productId'], FILTER_SANITIZE_NUMBER_INT);
	$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
	
	if(isset($_SESSION['numOfCartItems'])){
		//check if exists in database
		checkProduct($productId, $quantity);
		
		$_SESSION['numOfCartItems'] += $quantity;
	}
	else{
		//check if exists in database
		checkProduct($productId, $quantity);
		
		$_SESSION['numOfCartItems'] = $quantity;
	}
	
	//grab previous page
	$previous = "javascript:history.go(-1)";
	if(isset($_SERVER['HTTP_REFERER'])) {
		$previous = $_SERVER['HTTP_REFERER'];
	}
	
	//redirect to continue page, they decide if they want to order or go back.
	$_SESSION['itemsAddedFlag'] = 1;
	$_SESSION['previousAddress'] = $previous;
	header("location:../continue");
	
}
else{
	//if a productID and quantity isn't set in get, redirect home
	header("location:../home");
}

function checkProduct($productId, $quantityAdded){
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
					$_SESSION['cartTotal'] += ($item['price'] * $quantityAdded);
				}else{
					$_SESSION['cartTotal'] = ($item['price'] * $quantityAdded);
				}
				//add item to cart session variable
				for($i=1; $i<=$quantityAdded; $i++){
					$_SESSION['cart'][]=$item['iid'];
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
