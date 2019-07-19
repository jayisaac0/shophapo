<div class="dropdown thumbnail productsBackgroundColor col-sm-6 col-md-2" style="padding:0px;">

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin: 0px;">
		<div class="panel panel-default">
			<div id="collapseOne" class="" role="tabpanel" aria-labelledby="headingOne">
				<ul class="nav nav-pills nav-stacked">
					<li role="presentation" class="active"><a href = "contact.php?id=<?php echo $user->user_id; ?>">CONTACT US</a></li>
				</ul>
			</div>
		</div>
		<div class="panel panel-default">

		<div style="margin:0px auto;" class="w3-black">
		    
		<!-- Insert to your webpage where you want to display the carousel -->
		<b >Adds</b>
		    <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:240px;margin:0px auto 0px;">
		        <div class="amazingcarousel-list-container" style="max-height:226px;">
		            <ul class="amazingcarousel-list">


		                <?php
		                    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $id ");
		                    $stmt->execute(array());
		                    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
		                    foreach ($products as $product) {
		                        ?>
		                        <li class="amazingcarousel-item">
		                            <div class="amazingcarousel-item-container">
		                                <div class="w3-card-4">
		                                    <a href="<?php echo $product->product_image; ?>" title="<?php echo $product->productname. ' '; ?>Ksh<?php echo $product->productprice; ?>"  class="html5lightbox" data-group="amazingcarousel-1"><img src="<?php echo $product->product_image; ?>"  alt="<?php echo $product->productname; ?>" style="width:100%;" /></a>
		                                    <div class="amazingcarousel-text">
		                                        <div class="amazingcarousel-text-bg"></div>
		                                        <div class="amazingcarousel-title" style="color:red;background:#000000;">Ksh <?php echo $product->productprice; ?></div>
		                                    </div>
		                                </div>
		                                <a href="product.php?id=<?php echo $product->productid ?>" style="text-decoration:none;"><b style="color:blue;"><?php echo $product->productname. ' '; ?></b></a> 
		                            </div>
		                        </li>

		                        <?php
		                    }
		                ?>

		            </ul>
		        </div>
		    </div>Adds
		<!-- End of body section HTML codes -->
		   
		</div>
		</div>
	</div>

</div>





