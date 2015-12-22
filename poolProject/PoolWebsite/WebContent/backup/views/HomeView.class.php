<?php
class HomeView{
	public static function show(){
		?>
		
      <div class="center_content">
      <div class="oferta"> <img src="assets/images/testImg.png" width="165" height="113" border="0" class="oferta_img" alt="" />
        <div class="oferta_details">
          <div class="oferta_title">This is a title of your featured product</div>
          <div class="oferta_text">  Here is where the description of the product will go </div>
          <a href="showProduct?id=0" class="prod_buy">details</a> </div>
      </div>
      <div class="center_title_bar">Latest Products</div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=1">Chlorine Tablets</a></div>
          <div class="product_img"><a href="showProduct?productId=1"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$50.49</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=1" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=1" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=2">Pool Shade</a></div>
          <div class="product_img"><a href="showProduct?productId=2"><img src="assets/images/poolShade.jpg" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$35$</span> <span class="price">$9.99</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=2" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=2" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=3">Above Ground Pool 20x20</a></div>
          <div class="product_img"><a href="showProduct?productId=3"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$1500.00</span> <span class="price">$999.99</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=3" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=3" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=4">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=4"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=4" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=4" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=5">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=5"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=5" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=5" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=6">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=6"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=6" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=6" class="prod_details">Details</a> </div>
      </div>
      <div class="center_title_bar">Recomended Products</div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=1">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=1"><img src="assets/images/testImg.png" width ="65" height="65" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=1" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=1" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=2">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=2"><img src="assets/images/testImg.png" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=2" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=2" class="prod_details">Details</a> </div>
      </div>
      <div class="prod_box">
        <div class="center_prod_box">
          <div class="product_title"><a href="showProduct?productId=3">Test Title</a></div>
          <div class="product_img"><a href="showProduct?productId=3"><img src="assets/images/testImg.png" alt="" border="0" /></a></div>
          <div class="prod_price"><span class="reduce">$350</span> <span class="price">$270</span></div>
        </div>
        <div class="prod_details_tab"> <a href="models/addToCart.php?productId=3" class="prod_buy">Add to Cart</a> <a href="showProduct?productId=3" class="prod_details">Details</a> </div>
      </div>
    </div>
		
		
		<?php 
	}
}

?>