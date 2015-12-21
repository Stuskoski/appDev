<?php
class showProductView{
	public static function showProduct(){
		if(isset($_GET['productId'])){
			productDetail::showProduct();
		}
	}
}