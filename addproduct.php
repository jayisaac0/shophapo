<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">
<?php require_once 'includes/widgets/body/pagesitepanel.php'; ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:50px;">
			
	<?php require_once 'includes/widgets/body/pagesitepanel.php' ?>
	<div class="col-sm-6 col-md-12 " id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="jumbotron" style = "padding:5px;margin:0px;">


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default" style = "">
				    <div class="panel-heading" role="tab" id="headingOne">
					    <h4 class="panel-title">
					        <a role="button">Add product to my pagesite</a>
					    </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					    <div class="panel-body">

					    	<?php require_once 'includes/formcontroller/productformcontroller.php'; ?>

							<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor" enctype="multipart/form-data">

									<?php
                                        if(isset($error))
                                        {
                                            foreach($error as $error)
                                            {
                                                 ?>
                                                 <div class="alert alert-danger" style = "padding:1px;margin:1px;">
                                                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                                                 </div>
                                                 <?php
                                            }
                                        }
                                    ?>

								    <div class="col-sm-12">
								      <input type="hidden" class="form-control btn btn-primary disabled" id="inputproductid" name = "productid" placeholder="Product ID" value = "<?php echo time(); ?>" />
								    </div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <input type="productname" class="form-control" id="inputproductname" name = "productname" placeholder="Product name eg.(Iphone 6S)" />
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <select type="Productcategory" class="form-control"  id="inputProductcategory" name = "Productcategory" placeholder="Product category eg.(Electronic gadget)" >
											<option value="Phones & Accessories">Phones & Accessories</option>
											<option value="Computers & Tablets">Computers & Tablets</option>
											<option value="Electronics & Appliances">Electronics & Appliances</option>
											<option value="Home & Living">Home & Living</option>
											<option value="Clothes">Clothes</option>
											<option value="Shoes">Shoes</option>
											<option value="Fashion">Fashion</option>
											<option value="Sports & Outdoor">Sports & Outdoor</option>
											<option value="Beauty & Hair">Beauty & Hair</option>
											<option value="Kids, Baby, Toys">Kids, Baby, Toys</option>
											<option value="Office Products">Office Products</option>
											<option value="Automotive">Automotive</option>
											<option value="Books & Music">Books & Music</option>
											<option value="Digital Products">Digital Products</option>
								        </select>
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <input type="productmanufacturer" class="form-control" id="inputproductmanufacturer" name = "productmanufacturer" placeholder="Product manufacturer eg.(Apple co-operation)" />
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <input type="productprice" class="form-control" id="inputproductprice" name = "productprice" placeholder="Product price eg.($980.00)" />
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <textarea type="productdetails" class="form-control" id="inputproductdetails" name = "productdetails" placeholder="Product details" style = "max-height:100px;min-height:100px;"></textarea>
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <textarea type="productspecification" class="form-control" id="inputproductspecification" name = "productspecification" placeholder="Product specification" style = "max-height:100px;min-height:100px;"></textarea>
								    </div>
								</div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <input type="productquantity" class="form-control" id="inputproductquantity" name = "productquantity" placeholder="Product quantity" />
								    </div>
								</div>
							    <div class="form-group">
							        <div class="col-md-12" >
							            <input id="product_image" type="file" class="" id = "inputproduct_image" name ="product_image" placeholder = "Upload product image"  style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;"/>
							        </div>
							    </div>
								<div class="form-group">
								    <div class="col-sm-12">
								      <select type="productwarrant"  class="form-control" id="inputproductwarrant" name = "productwarrant" placeholder="Product warrant" >
								        	<option value="Null">None</option>
								            <option value="3 months">3 months</option>
								            <option value="5 months">5 months</option>
								            <option value="6 months">6 months</option>
								            <option value="7 months">7 months</option>
								            <option value="8 months">8 months</option>
								            <option value="9 months">9 months</option>
								            <option value="10 months">10 months</option>
								            <option value="11 months">11 months</option>
								            <option value="12 months">12 months</option>
								            <option value="18 months">18 months</option>
								            <option value="24 months">24 months</option>
								            <option value="36 months">36 months</option>
								            <option value="48 months">48 months</option>
								        </select>
								    </div>
								</div>

								<div class="form-group">
								    <div class="col-sm-offset-0 col-sm-10">
								      <button type="submit" name = "addproduct" class="btn btn-default">Post</button>
								    </div>
								</div>
							</form>

					    </div>
				    </div>
				</div>
			</div>


			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/widgets/footer/footer.php'; ?>
