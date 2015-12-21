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
	<img alt="No Picture Submitted" class="challengePic" style="width:360px;height:360px;" src="data:image/jpeg;base64,'.base64_encode( $row['submitPic'] ).'"/>
		 <div class="center_content">
		  <div class="productPic">
		    <?php if(isset($itemInfo['productPic']) && $itemInfo['productPic']!==null){
		    		echo '<img alt="Product Image" class="productPic" src="data:image/jpeg;base64,'.base64_encode( $itemInfo['productPic'] ).'"/>';
					}
				  else{
				  	?><img class="productPic" src="assets/images/productImgNotFound.png" alt="" border="0" /><?php 
				  }?>
		  </div>
		 </div>
	<?php 
	//if get is not set, redirect home
	}else{
		header("location:home");
	}
  }//end function
}//end class

?>