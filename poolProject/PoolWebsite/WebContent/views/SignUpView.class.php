<?php
class SignUpView{
	public static function show(){
?>

	<div class="center_content">
		<div class="signupTitle">
			<h1>Signup Page</h1>
		</div>
		<form action="models/signupUser.php" method="POST">
		<div class="loginForm">
			<div>
				<span class="loginTitle">First name</span><br>
				<input class="loginInput" type="text" name="firstNameSignup" placeholder="First Name" maxlength="40" required value="<?php if(isset($_SESSION['firstNameSignup'])){ echo $_SESSION['firstNameSignup'];  
																															unset($_SESSION['firstNameSignup']); }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid first name">
			</div>
			<br>
			<div>
				<span class="loginTitle">Last name</span><br>
				<input class="loginInput" type="text" name="lastNameSignup" placeholder="Last Name" maxlength="40" required value="<?php if(isset($_SESSION['lastNameSignup'])){ echo $_SESSION['lastNameSignup']; 
																															unset($_SESSION['lastNameSignup']); }?>" pattern="[a-zA-Z-]{1,40}" title="Please enter a valid last name">
			</div>
			<br>
			<div>
				<span class="loginTitle">Email</span><br>
				<input class="loginInput" type="email" name="emailSignup" placeholder="Email Address" maxlength="50" required value="<?php if(isset($_SESSION['emailSignup'])){ echo $_SESSION['emailSignup']; 
																															unset($_SESSION['emailSignup']); }?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email">
			</div>
			<br>
			<div>
				<span class="loginTitle">Password</span><br>
				<input class="loginInput" type="password" name="passwordSignup" placeholder="Password" required pattern=".{8,}" title="Password must be at least 8 characters long">
			</div>
			<br>
			<div>
				<span class="loginTitle">Confirm Password</span><br>
				<input class="loginInput" type="password" name="passwordConfirmSignup" placeholder="Confirm Password" required pattern=".{8,}" title="Password must be at least 8 characters long">
			</div>
			<br>
			<div>
				<span class="loginTitle">Phone Number</span><br>
				<input class="loginInput" type="tel" name="phoneNumberSignup" maxlength="20" placeholder="Phone Number - Not Required" value="<?php if(isset($_SESSION['phoneNumberSignup'])){ echo $_SESSION['phoneNumberSignup']; 
																															unset($_SESSION['phoneNumberSignup']); }?>" pattern="[0-9-]{7,}" title="Please enter a valid phone number. Ex) 210-123-4567">
			</div>
			<br><br>
			<input class="loginSubmit" type="submit" value="Submit">
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

<?php 
	}
}
?>