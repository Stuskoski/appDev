<?php
class HomeView{
	public static function show(){
		?>
      <!-- Page Content -->
		    <div class="row homeContent" style="margin-top:80px;">
		    		<div class="col-lg-1"></div>
		            <div class="col-lg-2" style="margin-top: 20px;">
		                <a class="homeLinks" href="categories"><span style="display:block;"class="lead">Categories</span></a>
		                <div class="list-group">
		                    <a href="#" class="list-group-item">Chemicals</a>
		                    <a href="#" class="list-group-item">Equipment</a>
		                    <a href="#" class="list-group-item">Accessories</a>
		                    <a href="#" class="list-group-item">Pool Floats</a>
		                    <a href="#" class="list-group-item">Hardware and Parts</a>
		                    <a href="#" class="list-group-item">Hot Tubs</a>
		                </div>
		                
		                 <a class="homeLinks" href=""><span style="display:block;"class="lead">Second Window</span></a>
		                <div class="list-group">
		                    <a href="#" class="list-group-item">Chemicals</a>
		                    <a href="#" class="list-group-item">Equipment</a>
		                    <a href="#" class="list-group-item">Accessories</a>
		                    <a href="#" class="list-group-item">Pool Floats</a>
		                    <a href="#" class="list-group-item">Hardware and Parts</a>
		                    <a href="#" class="list-group-item">Hot Tubs</a>
		                </div>
		            </div>
		            
		            
		
		            <div class="col-lg-8">
		
		                <div class="row carousel-holder">
		
		                    <div class="col-md-12">
		                        <div id="carousel-example-generic" class="carousel slide homePageSlide" data-ride="carousel">
		                            <ol class="carousel-indicators">
		                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active homePageSlideDots"></li>
		                                <li data-target="#carousel-example-generic" data-slide-to="1" class="homePageSlideDots"></li>
		                                <li data-target="#carousel-example-generic" data-slide-to="2" class="homePageSlideDots"></li>
		                            </ol>
		                            <div class="carousel-inner">
		                                <div class="item active homeSlidePic">
		                                    <a href="#"><img class="slide-image homeImgBack" src="assets/JohnImg/background.png" alt=""></a>
		                                </div>
		                                <div class="item homeSlidePic">
		                                    <a href="#"><img class="slide-image homeImgBack" src="assets/JohnImg/background.png" alt=""></a>
		                                </div>
		                                <div class="item homeSlidePic">
		                                    <a href="#"><img class="slide-image homeImgBack" src="assets/JohnImg/background.png" alt=""></a>
		                                </div>
		                            </div>
		                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                                <span class="glyphicon glyphicon-chevron-left"></span>
		                            </a>
		                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                                <span class="glyphicon glyphicon-chevron-right"></span>
		                            </a>
		                            <hr class="transition-timer-carousel-progress-bar" />                 
		                        </div>
		                    </div>
		
		                </div>
		
		                <div class="row">
							<!-- First Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$50.49</h4>
		                                <h4><a href="showProduct?productId=1">Chlorine Tablets</a>
		                                </h4>
		                                <p>This is the description</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">15 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
							<!-- Second Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$9.99</h4>
		                                <h4><a href="showProduct?productId=2">Pool Shade</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">12 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
							<!-- Third Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$999.99</h4>
		                                <h4><a href="showProduct?productId=3" style="font-size: 13; font-weight:bold;">Above Ground Pool 20x20</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">31 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
							<!-- Fourth Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$25.99</h4>
		                                <h4><a href="showProduct?productId=4">Chlorine Packets</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">6 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
							<!-- Fifth Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$79.99</h4>
		                                <h4><a href="showProduct?productId=5">Pool Light</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">18 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
							<!-- Sixth Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3 testme">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$1.99</h4>
		                                <h4><a href="showProduct?productId=6">Twizzlers</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">18 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
		                    
		                    <!-- Seventh Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3 testme">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$1.99</h4>
		                                <h4><a href="showProduct?productId=6">Twizzlers</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">18 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
		                    
		                    <!-- Eigth Product Home Page -->
		                    <div class="col-sm-3 col-lg-3 col-md-3 testme">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$1.99</h4>
		                                <h4><a href="showProduct?productId=6">Twizzlers</a>
		                                </h4>
		                                <p>This is a short description.</p>
		                            </div>
		                            <div class="ratings">
		                                <p class="pull-right">18 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star-empty"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>
		
		
		
		                </div>
		
		            </div>
		
		    </div>
		
		
		<?php 
	}
}

?>