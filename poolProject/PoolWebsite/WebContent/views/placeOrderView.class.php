<?php
class placeOrderView{
	public static function show(){
		//Check if user is logged in. If so prefill the forms.
		if(isset($_SESSION['user_session'])){
			
			//get db connection
			$dbh=Database::getDB();
			
			$getUserInfo = $dbh->prepare("SELECT uid, email, firstName, lastName, phoneNumber 
										  FROM users WHERE email=:email");
			//Bind the values
			$getUserInfo->bindParam ( ':email', $_SESSION['user_session'], PDO::PARAM_STR );
			
			//execute
			$getUserInfo->execute();
			
			//Fetch the row to see if it exists
			$userInfo = $getUserInfo->fetch (PDO::FETCH_ASSOC);
			
			Database::clearDB();
		}
?>
	
	<div class="center_content">
		<div class="signupTitle">
			<h1>Place Order</h1>
		</div>
		<form action="models/placeOrder.php" method="POST">
		<div class="loginForm">
			<div>
				<span class="orderTitle">First name</span><br>
				<input class="orderInput" type="text" name="firstNameSignup" placeholder="First Name" maxlength="40" required value="<?php if(isset($userInfo['firstName'])){ echo $userInfo['firstName']; }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid first name">
			</div>
			<br>
			<div>
				<span class="orderTitle">Last name</span><br>
				<input class="orderInput" type="text" name="lastNameSignup" placeholder="Last Name" maxlength="40" required value="<?php if(isset($userInfo['lastName'])){ echo $userInfo['lastName']; }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid last name">
			</div>
			<br>
			<div>
				<span class="orderTitle">Email</span><br>
				<input class="orderInput" type="email" name="emailSignup" placeholder="Email Address" maxlength="50" required value="<?php if(isset($userInfo['email'])){ echo $userInfo['email']; }?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email">
			</div>
			<br>
			<div>
				<span class="orderTitle">Phone Number</span><br>
				<input class="orderInput" type="tel" name="phoneNumberSignup" maxlength="20" placeholder="Phone Number" required value="<?php if(isset($userInfo['phoneNumber'])){ echo $userInfo['phoneNumber']; }?>" pattern="[0-9-]{7,}" title="Please enter a valid phone number. Ex) 210-123-4567">
			</div>
			<br>
			<div>
				<span class="orderTitle">Item List *Pulled From Your Cart*</span><br>
				<div class="orderList">
				<?php getUserData::getCartContents();?>
				</div>
			</div>
			<br>
			<div>
				<span class="orderTitle">Order Notes</span><br>
				<textarea rows="4" cols="50" name="orderDescription" class="orderInput"></textarea>
			</div>
			<br><br>
			<input class="orderSubmit" type="submit" value="Submit" <?php if(isset($_SESSION['numOfCartItems'])){
																				if($_SESSION['numOfCartItems'] == 0){
																					echo"disabled";
																				}
																			}else{
																				echo"disabled";
																			}?>>
		</div>
	  </form>
	<span id="orderWarning">Please allow at least 30 minutes for order to be completed before picking up.</span>
	</div>

<?php 
	}
}
?>