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
		case "results":
			MasterView::showHeader();
			ResultsController::add();
			MasterView::showFooter();
			break;
		case "viewResults":
			MasterView::showHeader();
			ResultsController::view();
			MasterView::showFooter();
			break;
		case "writeResults":
			MasterView::showHeader();
			ResultsController::write();
			MasterView::showFooter();
			break;
		case "HowTo":
			MasterView::showHeader();
			ResultsController::howto();
			MasterView::showFooter();
			break;
		default:
			MasterView::showHeader();
			HomeController::show();
			MasterView::showFooter();
	};
?>	
