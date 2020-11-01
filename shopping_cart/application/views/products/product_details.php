
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-5">
			<p><a href="<?php echo base_url('products/'); ?>" class="btn btn-primary btn-sm"> << 	Back </a></p>
			<div class="images">
			    <div class="additional-images">
			        <a href="<?php echo base_url('products/productDetails/'.$product['id']); ?>" title="<?php echo $product['name']?>">
			          <img class="card-img-top" src="<?php echo base_url('assets/images/'.$product['image']); ?>" alt="" width="450" height="400">
			        </a>
			    </div>
			</div>
		</div>
		<div class="col-sm-7">	
			<div id="product-details">
			    <h1><?php echo $product['name']?></h1>
			    <p>Description: <?php echo $product['description']?></p>
			      <div id="product-price">
			      	Rs. <?php echo $product['price']?>  
			      </div>
			      <a href="<?php echo base_url('products/addToCart/'.$product['id']); ?>" class="btn btn-primary">Add to Cart</a>
			</div>
		</div>
	</div>
</div>			