<?php
class AboutView{
	public static function show(){
?>
	<style>
	article h1{
	margin-left:220px;
	color:#199ECD;
	}
	article p{
	margin-left:60px;
	font-size:12;
	}
	</style>
	<div class="center_content aboutPage">	
		<div id="storeFront"> <a href=""><img src="assets/images/poolStoreFront.jpg" alt="" border="0" width="500" height="500" /></a> </div>
		<article>
			<h1>Uncle John's Pool Store</h1>
			<div class="storeLocation">
			Located at the corner of x and y.<br>
			We also have a location at x and y.
			</div>
			<div class="storeHours">
			We are open 9-5.<br>
			Open Monday - Saturday
			</div>
			<div class="storeMiscInfo">
			We have been open for a year and<br>
			sell the best quality for the best price.
			</div>
			<div class="anotherBlock">
			Here is another block of info<br>
			that you can use for anything you'd like.
			</div>
		</article>
	</div>
	
<?php 
	}
}
?>