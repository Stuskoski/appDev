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
	
	//Grabs the last visited page from javascript.
	//Has a php backup tho, uses php over JS.  Perfecto!
	$previous = "javascript:history.go(-1)";
	if(isset($_SERVER['HTTP_REFERER'])) {
		$previous = $_SERVER['HTTP_REFERER'];
	}
	
	//everything checks out so far, so display information now.
	?>
		<div class="row">
		 <div class="col-lg-4 col-md-3 col-sm-2 col-xs-0"></div>
		 <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
		  <div class="productContent">
		   <div class="productPic">
		    <?php if(isset($itemInfo['productPic']) && $itemInfo['productPic']!==null){
		    		echo '<img alt="Product Image" class="productPic2" src="data:image/jpeg;base64,'.base64_encode( $itemInfo['productPic'] ).'"/>';
					}
				  else{
				  	?><img class="defaultProductPic" src="assets/images/productImgNotFound.png" alt="" border="1" /><?php 
				  }?>
		   </div>
		   <span id="productNameDisplay" ><?php echo $itemInfo['productName'];?></span>
		   <span id="productQuantityDisplay" >Quantity Left In Stock: <?php if($itemInfo['quantity'] < 0){echo "<b>"."0"."</b>"; }else{echo $itemInfo['quantity'];}?></span>
		   <form method="POST" action="models/addToCart.php">
		    <input type="hidden" name="productId" value="<?php echo $productId; ?>">
		    <span id="Qty">Qty:</span>
		      <?php 
		      	/**
		      	 * This function determines how many the user can buy.
		      	 * I know I know, bad practice to have logic in view but it's
		      	 * easier this way. Thanks for understanding.
		      	 */
		      	if($itemInfo['quantity'] > 0){
		      		echo "<select class='productSelect' name='quantity'>";
		      		echo "<option selected value='1'>1</option>";
		      		for($i=2; $i<=$itemInfo['quantity']; $i++){
		      			echo "<option value='$i'>$i</option>";
		      		}
		      		echo "</select>";
		      	}else{
		      		echo "<select class='productSelect' disabled>";
		      		echo "<option selected value='0'>0</option>";
		      		echo "</select>";
		      	}
		      ?>
		    <div class="buyProductDisplay"><input class="btn-info btn" type="submit" value="Add to cart" <?php if($itemInfo['quantity'] <=0){echo "disabled";}?>></div>
		   </form>
		   <div class="productBackBtn"><a class="btn-info btn" href="<?php echo $previous;?>" class="prod_buy">Back</a></div>
		   <span class="productDescription"><?php echo $itemInfo['description'];?></span>
		  </div>
		 </div>	 
		 <div class="col-lg-3 col-md-3 col-sm-2 col-xs-0"></div>
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