<?php
include_once 'Database.class.php';
include_once 'sendEmail.class.php';

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
	public static function getCartContents($htmlFlag=0){
		if(isset($_SESSION['numOfCartItems'])){
			if($_SESSION['numOfCartItems'] > 0){
				if(isset($_SESSION['cart'])){
						//creates an array with the count of every key. Great function!
						$numArray = array_count_values($_SESSION['cart']);
						//calls the function below with html flag to output <br> instead of newlines.
						if($htmlFlag){
							getUserData::convertIdToItem($numArray,0,1);
						}else{
							getUserData::convertIdToItem($numArray);
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
	
	public static function shoppingCartProductName($htmlFlag=0){
		if(isset($_SESSION['numOfCartItems'])){
			if($_SESSION['numOfCartItems'] > 0){
				if(isset($_SESSION['cart'])){
					//creates an array with the count of every key. Great function!
					$numArray = array_count_values($_SESSION['cart']);
					//calls the function below with html flag to output <br> instead of newlines.
					if($htmlFlag){
						getUserData::convertIdToItem($numArray,0,2);
					}else{
						//getUserData::convertIdToItem($numArray);
					}
				}else{
					echo "Cart is empty";
				}
			}
			else{
				echo "Cart is empty";
			}
		}else{
			echo"Cart is empty";
		}
	
	}
	
	public static function shoppingCartProductPrice($htmlFlag=0){
		if(isset($_SESSION['numOfCartItems'])){
			if($_SESSION['numOfCartItems'] > 0){
				if(isset($_SESSION['cart'])){
					//creates an array with the count of every key. Great function!
					$numArray = array_count_values($_SESSION['cart']);
					//calls the function below with html flag to output <br> instead of newlines.
					if($htmlFlag){
						getUserData::convertIdToItem($numArray,0,3);
					}else{
						//getUserData::convertIdToItem($numArray);
					}
				}else{
					echo "Cart is empty";
				}
			}
			else{
				echo "Cart is empty";
			}
		}else{
			echo"Cart is empty";
		}
	
	}
	
	public static function shoppingCartProductQuantity($htmlFlag=0){
		if(isset($_SESSION['numOfCartItems'])){
			if($_SESSION['numOfCartItems'] > 0){
				if(isset($_SESSION['cart'])){
					//creates an array with the count of every key. Great function!
					$numArray = array_count_values($_SESSION['cart']);
					//calls the function below with html flag to output <br> instead of newlines.
					if($htmlFlag){
						getUserData::convertIdToItem($numArray,0,4);
					}else{
						//getUserData::convertIdToItem($numArray);
					}
				}else{
					echo "Cart is empty";
				}
			}
			else{
				echo "Cart is empty";
			}
		}else{
			echo"Cart is empty";
		}
	
	}
	
	//$flag determines if ID is printed with it.  Only used for when the order is placed.
	//htmlflag determines what is printed, if 2=name, 3=price, 4=quantity
	public static function convertIdToItem($numArray, $flag=false, $htmlFlag=0){
		
		//this form of foreach gives you the key and the value.
		foreach($numArray as $key => $num){
		//get db connection
		$dbh = Database::getDB();
		
		//prepare sql
		$getItem = $dbh->prepare("SELECT productName, price
								  FROM inventory
								  WHERE iid=:key");
		
		//Bind parameters
		$getItem->bindParam ( ':key', $key, PDO::PARAM_INT );
		
		//Execute
		$getItem->execute();
		
		//Fetch the row to see if it exists
		$item = $getItem->fetch (PDO::FETCH_ASSOC);
		
		//check if exists now, if it does print name, else print Item not available
		if(isset($item['productName'])){
			//these 3 ifs are only used for viewCartView.  Rest of function is for other guys
			if($htmlFlag == 2){
				echo $item['productName'];
				echo "<br><br>";
			}elseif ($htmlFlag == 3){
				echo "$" . number_format(($item['price'] * $num), 2);
				echo "<br><br>";
			}elseif ($htmlFlag == 4){
				echo $num;
				echo "<br><br>";
			}else{
				//For place order
				echo "($num)" . $item['productName'] . " - $" . $item['price']*$num;
				if($flag){
					echo "[ID=$key]";
				}
				//for html pages
				if($htmlFlag == 1){
					echo"<br>";	
				}else{
					//for text areas
					echo "\n\n";
				}
			}
		}
		else{
			echo "Item Not Available\n";
		}
		
		//Remove db connection
		Database::clearDB();
		
		}
	}
}
?>