<?php
class SpecialsView{
	public static function show(){
?>

	<div class="row">
	<div class="wrapperCustom">
	  <div class="col-lg-12">
		 <div class="backgroundHeader">
		  	<h1 class="aboutHeading">Specials</h1><br><br>
		  </div>
	  </div>
	  <div class="col-lg-3 col-md-0 col-sm-0"></div>
	  <div class="col-lg-4 col-md-12 col-sm-12">
	  	<?php 
	  		paginator::paginateSpecials();
	  	?>
	  </div>
	  <div class="col-lg-3 col-md-0 col-sm-0"></div>
	 </div>
	</div>
<?php 
	}
}
?>