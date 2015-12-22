<?php
class orderConfirmationView{
	public static function show(){
		if(isset($_SESSION['orderConfirmed']) && $_SESSION['orderConfirmed'] == 1){
		?>
		<div class="center_content">
			<br><br><br><br>
			<span id="OrderConfirmation1">Order was place successfully, thank you!</span><br>
			<span id="OrderConfirmation2">You will receive an order confirmation shortly.</span>
		</div>
		
<?php 
	}//end if
	
	//unset variable
	unset($_SESSION['orderConfirmed']);
  }
}
?>