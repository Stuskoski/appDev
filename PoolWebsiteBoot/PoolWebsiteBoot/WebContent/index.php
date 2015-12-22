<?php
	include("includer.php");   
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	//echo "URL: $url <br>";
	$urlPieces = split("/", $url);
	
	//print_r($urlPieces);
	echo "<br>";
	if (count($urlPieces) < 2)
		$control = "none";
	else 
		$control = $urlPieces[2];
	//echo "Control: $control <br>";
	
	switch ($control) {
		case "products":
			MasterView::show();
			ProductsView::show();
			break;
		case "specials":
			MasterView::show();
			SpecialsView::show();
			break;
		case "myaccount":
			MasterView::show();
			AccountView::show();
			break;
		case "signup":
			MasterView::show();
			SignUpView::show();
			break;
		case "placeOrder":
			MasterView::show();
			placeOrderView::show();
			break;
		case "confirmOrder":
			MasterView::show();
			confirmOrderView::show();
			break;
		case "contact":
			MasterView::show();
			ContactView::show();
			break;
		case "about":
			MasterView::show();
			AboutView::show();
			break;
		case "cart":
			MasterView::show();
			CartView::show();
			break;
		case "suggestions":
			MasterView::show();
			CartView::show();
			break;
		case "orderConfirmed":
			MasterView::show();
			orderConfirmationView::show();
			break;
		case "showProduct":
			MasterView::show();
			productDetail::showProduct();
			break;
		case "test":
			MasterView2::show();
			break;
		default:
			MasterView::show();
			HomeView::show();
	};
?>	
