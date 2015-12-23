<?php
class continueOrCheckOutView{
	public static function show(){
		
		//flag to determine if user added something
		if(isset($_SESSION['itemsAddedFlag'])){
			if(isset($_SESSION['previousAddress'])){
			?>
				<div class="container contContainer">
					<span class="contQuestion">Your items have been added to your cart.</span><br>
					<a class="btn btn-warning btn-lg contBtn1" href="placeOrder">Order Now</a>
					<a class="btn btn-info btn-lg contBtn2" href="viewCart">View Cart</a>
				</div>
			<?php 
			unset($_SESSION['previousAddress']);
			}else{
				?>
				<div class="container contContainer">
					<span class="contQuestion">Your items have been added to your cart.</span><br>
					<a class="btn btn-warning btn-lg contBtn1" href="placeOrder">Order Now</a>
					<a class="btn btn-info btn-lg contBtn2" href="home">Continue Shopping</a>
				</div>
			<?php 
			}
			//unset when finished
			unset($_SESSION['itemsAddedFlag']);
		//flag not set, redirect home
		}else{
			header("location:home");
		}
	}
}