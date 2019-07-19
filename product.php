<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>









<div class="row resetTop">
	<?php

	    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE productid = $id ");
	    $stmt->execute(array());
	    
	    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

	    foreach ($products as $product) {

	        ?>
				<div class="jumbotron" style = "padding:10px;">

					

					<div class="container slidr" id = "div1"  style = "position:center;">
						<center><img src="<?php  echo $product->product_image; ?>" alt="joshua" style = "width:70%;max-height:auto;" /></center>
					</div>
				</div>
					<a href="shop.php?id=<?php echo $product->user_id; ?>" ><div class="w3-btn w3-padding-large w3-gray w3-animate-zoom w3-center">Back to shop</div></a>

					<?php require_once 'includes/formcontroller/orderproductformcontroller.php'; ?>
			        <a href=""><form class="form-horizontal" role="form" method="POST"  action="#form-anchor" id="form-anchor"  action="">

			        		<?php require_once 'includes/errors/warning.php'; ?>
			        	
						<div class="form-group">
						    <div class="col-sm-10">
						      <input type="hidden" class="form-control" id="inputproductquantity" name="productquantity"  placeholder="product quantity" value="1" />
						    </div>
						</div>

						    <input type="hidden" class="form-control" id="inputsellerid" name="sellerid"  placeholder="seller id" value = "<?php  echo $product->user_id; ?>" />
							<input type="hidden" class="form-control" id="inputproductname" name = "productname" value = "<?php  echo $product->productname; ?>"  />
							<input type="hidden" class="form-control"  id="inputProductcategory" name = "Productcategory" value = "<?php  echo $product->Productcategory; ?>"  />
							<input type="hidden" class="form-control" id="inputproductmanufacturer" name = "productmanufacturer" value = "<?php  echo $product->productmanufacturer; ?>"  />
							<input type="hidden" class="form-control" id="inputproductprice" name = "productprice" value = "<?php  echo $product->productprice; ?>"  />
							<input type="hidden" class="form-control" id="inputproductquantity" name = "productquantity" value = "<?php  echo $product->productquantity; ?>" />

						<div class="form-group">
						    <div class="col-sm-10">
						      <input type="hidden" class="form-control" id="inputtotalcost" name="totalcost"  placeholder="Total cost" value = "<?php  echo $product->productprice; ?>" />
						    </div>
						</div>
						<div class="form-group">
						    <div class="col-sm-offset-0 col-sm-10">
						      <button type="submit" name = "orderpoduct" class="btn btn-default"><img src = "images/icons/cart.ico" alt = "cart"  />Order product</button>
						    </div>
						</div>

					</form></a> 

				<div class="row" style = "padding:10%;">
					<h4><b>#<?php  echo $product->productid; ?></b></h4>
					<h3 style = "text-align:center;"><?php  echo $product->productname; ?></h3><br />
					<p style = "text-align:justify;"><?php  echo $product->productdetails; ?></p>
					<p style = "text-align:justify;"><?php  echo $product->productspecification; ?></p>
					<p style = "text-align:justify;"><?php  echo $product->productdetails; ?></p>
					<h4 style = "text-align:center;"><?php  echo $product->timeposted; ?></h4>
				</div>


				<div class="jumbotron resetTop">
				
				</div>











            <div class="panel">
                <div class="row">

                    <nav class="navbar navbar-inverse navbar-fixed-bottom">
                        <div class="container-fluid">
                            <div>
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <?php

                                            $stmt = $auth_user->runQuery("SELECT * FROM productstats WHERE `productid` = $product->productid  ");
                                            $stmt->execute(array());
                                            $productstats=$stmt->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($productstats as $productstat) {
                                                if($productstat->productid == $product->productid){

                                                    if($productstat->productid == true) {
                                                        $num = 1;
                                                        @$count += $num;
                                                    }
                                                }
                                            }
                                        echo ' <li role="presentation" class="active"><a href="#">RECOMMENDATIONS <span class="badge">'. @$count  .'</span></a></li> ';
                                        ?>

                                    </li>
                                </ul>

                                
                                <ul class="nav navbar-nav navbar-right">
                                <li>

                                </li>

                                <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <form class="form-horizontal" role="form" method="POST"  action="#form-anchor" id="form-anchor"  action="">
                                    <?php require_once 'includes/formcontroller/productreviewcontroller.php'; ?>
                                    <?php require_once 'includes/errors/warning.php'; ?>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="input-group">
                                                <button type="submit" name = "postproductreview" class="btn btn-default btn-lg">Recommend</button>
                                                <input type="hidden" class="form-control" id="inputproductid" name = "productid" value = "<?php echo $product->productid; ?>" /> 
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>







	        <?php

	    }

	?>
</div>









<?php	
} 
?>

<?php require_once 'includes/widgets/footer/footer.php'; 