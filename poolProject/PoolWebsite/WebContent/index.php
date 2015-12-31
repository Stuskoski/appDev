<?php
	include("includer.php");   
	$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
	//echo "URL: $url <br>";
	$urlPieces = explode("/", $url);
	
	//print_r($urlPieces);
	echo "<br>";
	if (count($urlPieces) < 2)
		$control = "none";
	else 
		$control = $urlPieces[2];
	//echo "Control: $control <br>";
	
	switch ($control) {
		case "products":
			MasterView::showHeader();
			ProductsView::show();
			MasterView::showFooter();
			break;
		case "specials":
			MasterView::showHeader();
			SpecialsView::show();
			MasterView::showFooter();
			break;
		case "myaccount":
			MasterView::showHeader();
			AccountView::show();
			MasterView::showFooter();
			break;
		case "signup":
			MasterView::showHeader();
			SignUpView::show();
			MasterView::showFooter();
			break;
		case "placeOrder":
			MasterView::showHeader();
			placeOrderView::show();
			MasterView::showFooter();
			break;
		case "confirmOrder":
			MasterView::showHeader();
			confirmOrderView::show();
			MasterView::showFooter();
			break;
		case "contact":
			MasterView::showHeader();
			ContactView::show();
			MasterView::showFooter();
			break;
		case "about":
			MasterView::showHeader();
			AboutView::show();
			MasterView::showFooter();
			break;
		case "cart":
			MasterView::showHeader();
			CartView::show();
			MasterView::showFooter();
			break;
		case "suggestions":
			MasterView::showHeader();
			CartView::show();
			MasterView::showFooter();
			break;
		case "orderConfirmed":
			MasterView::showHeader();
			orderConfirmationView::show();
			MasterView::showFooter();
			break;
		case "showProduct":
			MasterView::showHeader();
			productDetail::showProduct();
			MasterView::showFooter();
			break;
		case "categories":
			MasterView::showHeader();
			categoriesView::show();
			MasterView::showFooter();
			break;
		case "continue":
			MasterView::showHeader();
			continueOrCheckOutView::show();
			MasterView::showFooter();
			break;
		case "viewCart":
			MasterView::showHeader();
			viewCartView::viewCart();
			MasterView::showFooter();
			break;
		default:
			MasterView::showHeader();
			HomeView::show();
			MasterView::showFooter();
	};
?>	
