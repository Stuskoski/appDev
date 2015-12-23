<?php
class AccountView{
	public static function show(){
		//if user is not logged in, redirect to signup page
		if(!isset($_SESSION['user_session'])){
			echo "test";
		}
?>

<?php 
	}
}
?>