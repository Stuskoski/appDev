<?php
class AccountView{
	public static function show(){
		//if user is not logged in, redirect to signup page
		if(!isset($_SESSION['user_session'])){
			header("location:signup");
		}
?>

	<div class="center_content">
	This is the account view
	</div>

<?php 
	}
}
?>