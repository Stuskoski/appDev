<?php
class ResultsController {

	public static function add() {  
			ResultsView::show();
    }
    public static function view() {
    	ViewResultsView::show();
    }
    public static function write() {
    	WriteResultsView::show();
    }
    public static function howto() {
    	HowToView::show();
    }
}
?>