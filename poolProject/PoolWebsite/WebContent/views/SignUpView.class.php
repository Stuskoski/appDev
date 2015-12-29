<?php
class SignUpView{
	public static function show(){
?>

	<div class="wrapperCustom">
	<div class="row">
	 <div class="col-lg-4 col-md-4 col-sm-2 col-xs-0"></div>
	 <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 signupContent">
		<div class="signupTitle">
			<h1 style="font-size:48;">Signup Page</h1>
		</div>
		<form action="models/signupUser.php" method="POST">
		<div class="loginForm">
			<div>
				<span class="signupTitle">First name</span><br>
				<input class="signupInput" type="text" name="firstNameSignup" placeholder="First Name" maxlength="40" required value="<?php if(isset($_SESSION['firstNameSignup'])){ echo $_SESSION['firstNameSignup'];  
																															unset($_SESSION['firstNameSignup']); }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid first name">
			</div>
			<br>
			<div>
				<span class="signupTitle">Last name</span><br>
				<input class="signupInput" type="text" name="lastNameSignup" placeholder="Last Name" maxlength="40" required value="<?php if(isset($_SESSION['lastNameSignup'])){ echo $_SESSION['lastNameSignup']; 
																															unset($_SESSION['lastNameSignup']); }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid last name">
			</div>
			<br>
			<div>
				<span class="signupTitle">Email</span><br>
				<input class="signupInput" type="email" name="emailSignup" placeholder="Email Address" maxlength="50" required value="<?php if(isset($_SESSION['emailSignup'])){ echo $_SESSION['emailSignup']; 
																															unset($_SESSION['emailSignup']); }?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email">
			</div>
			<br>
			<div>
				<span class="signupTitle">Password</span><br>
				<input class="signupInput" type="password" name="passwordSignup" placeholder="Password" required pattern=".{8,}" title="Password must be at least 8 characters long">
			</div>
			<br>
			<div>
				<span class="signupTitle">Confirm Password</span><br>
				<input class="signupInput" type="password" name="passwordConfirmSignup" placeholder="Confirm Password" required pattern=".{8,}" title="Password must be at least 8 characters long">
			</div>
			<br>
			<div>
				<span class="signupTitle">Phone Number</span><br>
				<input class="signupInput" type="tel" name="phoneNumberSignup" maxlength="20" placeholder="Phone Number - Not Required" value="<?php if(isset($_SESSION['phoneNumberSignup'])){ echo $_SESSION['phoneNumberSignup']; 
																															unset($_SESSION['phoneNumberSignup']); }?>" pattern="[0-9-]{7,}" title="Please enter a valid phone number. Ex) 210-123-4567">
			</div>
			<br><br>
			<input class="btn-info navbar-btn" type="submit" value="Submit">
			<input class="btn-info navbar-btn" type="reset" value="Clear">
		</div>
	  </form>
	  <span class="signupError"><?php if(isset($_SESSION['signupError'])){
	  									if($_SESSION['signupError']==1){
	  										echo "Passwords Don't Match";
	  									}
	  									else{
	  										echo "A User With That Email Already Exists";
	  									}
	  									unset($_SESSION['signupError']);
									   }
									   ?></span>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-2 col-xs-0"></div>
	</div>
</div>
<?php 
	}
}
?>