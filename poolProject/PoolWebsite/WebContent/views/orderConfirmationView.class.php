<?php
class orderConfirmationView{
	public static function show(){
		if(isset($_SESSION['orderConfirmed']) && $_SESSION['orderConfirmed'] == 1){
		?>
		<div class="row">
		 <div class="col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
		 <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 orderContent">
			<div class="orderConfirmedContent">
				<br><br><br><br>
				<span id="OrderConfirmation1">Order was place successfully, thank you!</span><br>
				<span id="OrderConfirmation2">You will receive an order confirmation shortly.</span>
			</div>
		 </div>
		 <div class="col-lg-4 col-md-3 col-sm-2 col-xs-1"></div>
		</div>
		
<?php 
	}//end if
	
	//unset variable
	unset($_SESSION['orderConfirmed']);
  }
}
?>