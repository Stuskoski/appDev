<?php
class placeOrderView{
	public static function show(){
?>

	<div class="center_content">
		<div class="signupTitle">
			<h1>Place Order</h1>
		</div>
		<form action="models/signupUser.php" method="POST">
		<div class="loginForm">
			<div>
				<span class="orderTitle">First name</span><br>
				<input class="orderInput" type="text" name="firstNameSignup" placeholder="First Name" maxlength="40" required value="<?php if(isset($_SESSION['firstNameSignup'])){ echo $_SESSION['firstNameSignup']; } 
																															unset($_SESSION['firstNameSignup']);?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid first name">
			</div>
			<br>
			<div>
				<span class="orderTitle">Last name</span><br>
				<input class="orderInput" type="text" name="lastNameSignup" placeholder="Last Name" maxlength="40" required value="<?php if(isset($_SESSION['lastNameSignup'])){ echo $_SESSION['lastNameSignup']; } 
																															unset($_SESSION['lastNameSignup']);?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid last name">
			</div>
			<br>
			<div>
				<span class="orderTitle">Email</span><br>
				<input class="orderInput" type="email" name="emailSignup" placeholder="Email Address" maxlength="50" required value="<?php if(isset($_SESSION['emailSignup'])){ echo $_SESSION['emailSignup']; } 
																															unset($_SESSION['emailSignup']);?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email">
			</div>
			<br>
			<div>
				<span class="orderTitle">Phone Number</span><br>
				<input class="orderInput" type="tel" name="phoneNumberSignup" maxlength="20" placeholder="Phone Number" required value="<?php if(isset($_SESSION['phoneNumberSignup'])){ echo $_SESSION['phoneNumberSignup']; } 
																															unset($_SESSION['phoneNumberSignup']);?>" pattern="[0-9-]{7,}" title="Please enter a valid phone number. Ex) 210-123-4567">
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