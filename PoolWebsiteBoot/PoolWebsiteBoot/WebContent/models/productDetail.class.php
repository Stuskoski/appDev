<?php
class productDetail{
	public static function showProduct(){

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
		header("location:views/itemMissingView.php");
		exit();
	}
	
	//everything checks out so far, so display information now.
	?>
		 <div class="center_content">
		  <div class="productPic">
		    <?php if(isset($itemInfo['productPic']) && $itemInfo['productPic']!==null){
		    		echo '<img alt="Product Image" border="1" class="productPic" src="data:image/jpeg;base64,'.base64_encode( $itemInfo['productPic'] ).'"/>';
					}
				  else{
				  	?><img class="defaultProductPic" src="assets/images/productImgNotFound.png" alt="" border="1" /><?php 
				  }?>
		  </div>
		  <span id="productNameDisplay" ><?php echo $itemInfo['productName'];?></span>
		  <span id="productQuantityDisplay" >Quantity Left In Stock: <?php if($itemInfo['quantity'] < 0){echo "<b>"."0"."</b>"; }else{echo $itemInfo['quantity'];}?></span>
		  <div class="buyProductDisplay"><a href="models/addToCart.php?productId=<?php echo $productId;?>" class="prod_buy">Add to Cart</a></div>
		  <div class="containerTitle">Product Description:</div>
		  <div class="container">
		 	 <span class="textinside"><?php echo $itemInfo['description'];?></span>
		  </div>	 
		 </div>
	<?php 
	//Note** You can store html code so like a table for the product description if need be.
	//if get is not set, redirect home
	}else{
		header("location:home");
	}
  }//end function
}//end class

?>