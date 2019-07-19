<?php

    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $user_id ORDER BY timeposted DESC");
    $stmt->execute(array());
    
    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($products as $product) {

        ?>

        	<div class="row" id = "contentsize">
				<div class="col-sm-6 col-md-12" id = "contentsize">
					<div class="list-group" id = "contentsize">
					    <div class="thumbnail col-sm-12 myHover" id = "contentsize">
						      
						    <div class="caption col-sm-3" id = "contentsize">
						        <img src="<?php  echo $product->product_image; ?>" alt="joshua" style = "width:auto; height:100px;" />
						    </div>
						    <div class="caption col-sm-3" id = "contentsize">
						        Product id: <?php  echo $product->productid; ?> <br />
						        Category: <?php  echo $product->Productcategory; ?> <br />
						        Manufacturer: <?php echo $product->productmanufacturer; ?> <br />
						        Price: $<?php echo number_format($product->productprice, 2); ?> <br />
						        Timeposted: <?php echo $product->timeposted; ?> <br />
						    </div>
						    <div class="caption col-sm-5" id = "contentsize">
						        Details:<br /> <?php echo substr($product->productdetails, 0, 300) ; ?> <br />
						    </div>

						    <div class="caption col-sm-1" id = "contentsize">

								<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor">

									<div class="form-group">
							        	<p style = "text-align:center;"><a href = "delete.php?productid=<?php echo $product->productid; ?>" type="submit" class="btn btn-primary" name = "deleteproduct" >Delete</a></p>
							        </div>
						        </form>
						    </div>


					    </div>
					</div>
				</div>
			</div>

        <?php

    }

?>
