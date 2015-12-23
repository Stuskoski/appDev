<?php
class HomeView{
	public static function show(){
		?>
		
      <!-- Page Content -->
		    <div class="container">
		
		        <div class="row">
		
		            <div class="col-md-3" style="margin-top: 20px;">
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
		            
		            
		
		            <div class="col-md-9">
		
		                <div class="row carousel-holder">
		
		                    <div class="col-md-12">
		                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                            <ol class="carousel-indicators">
		                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		                            </ol>
		                            <div class="carousel-inner">
		                                <div class="item active">
		                                    <a href="#"><img class="slide-image" src="assets/images/testImg.jpg" alt=""></a>
		                                </div>
		                                <div class="item">
		                                    <a href="#"><img class="slide-image" src="assets/images/testImg2.png" alt=""></a>
		                                </div>
		                                <div class="item">
		                                    <a href="#"><img class="slide-image" src="assets/images/testImg3.jpg" alt=""></a>
		                                </div>
		                            </div>
		                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                                <span class="glyphicon glyphicon-chevron-left"></span>
		                            </a>
		                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                                <span class="glyphicon glyphicon-chevron-right"></span>
		                            </a>
		                        </div>
		                    </div>
		
		                </div>
		
		                <div class="row">
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$24.99</h4>
		                                <h4><a href="showProduct?productId=1">First Product</a>
		                                </h4>
		                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
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
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$64.99</h4>
		                                <h4><a href="showProduct?productId=2">Second Product</a>
		                                </h4>
		                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$74.99</h4>
		                                <h4><a href="showProduct?productId=3">Third Product</a>
		                                </h4>
		                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$84.99</h4>
		                                <h4><a href="showProduct?productId=4">Fourth Product</a>
		                                </h4>
		                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$94.99</h4>
		                                <h4><a href="showProduct?productId=5">Fifth Product</a>
		                                </h4>
		                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		
		                    <div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">
		                            <img src="http://placehold.it/320x150" alt="">
		                            <div class="caption">
		                                <h4 class="pull-right">$94.99</h4>
		                                <h4><a href="showProduct?productId=6">Sixth Product</a>
		                                </h4>
		                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
		
		    </div>
		
		
		<?php 
	}
}

?>