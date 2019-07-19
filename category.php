<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$category = $_GET['category'];
	$category = base64_decode($category);
?>

<?php
	if ($id == $user_id) {
		header("Location: home.php");
		echo '<script type="text/javascript"> window.location = "home.php" </script>';
	}
?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">

<style>
.bgimg-1, .bgimg-2, .bgimg-3 {background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;}
.bgimg-1 {background-image: url("images/backtheme/bac.jpg");min-height: 410px;}
.bgimg-2 {background-image: url("image/logo4.jpg");min-height: 400px;}
.bgimg-3 {background-image: url("image/logo4.jpg");min-height: 400px;}
.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}
</style>
<?php

$stmt = $auth_user->runQuery("SELECT * FROM `users` JOIN `themes` ON `themes`.`user_id`=`users`.`user_id` WHERE `themes`.`user_id` = '$id' ");
$stmt->execute(array());
$users=$stmt->fetchAll(PDO::FETCH_OBJ);
foreach ($users as $user) {
if($user->productsbackground == true) {
?>
<style>
/*----------------------------------------------------------------------
*product theme set
*-----------------------------------------------------------------------
*/
.shopNameColor{color:<?php echo $user->productheadingcolor; ?>;}
.productsFontColor{color:<?php echo $user->productfontcolor; ?>;}
.productsPriceColor{color:<?php echo $user->productpricecolor; ?>;}
.productsBackgroundColor{background:<?php echo $user->productsbackgroundcolor; ?>;}
.productsContainerBackgroundColor{background:<?php echo $user->productbodycontainer; ?>;}
#productsContainerRadius{border-radius:<?php echo $user->productcontainerradius; ?>;}
#productAlignment{text-align:<?php echo $user->alignment; ?>;}
.myBorder{border:<?php echo $user->border; ?>;}

/*----------------------------------------------------------------------
*productc theme set end
*-----------------------------------------------------------------------
*/
.bgimg-1, .bgimg-2, .bgimg-3 {background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;}
.bgimg-1 {background-image: url("<?php echo $user->productsbackground; ?>");min-height: 410px;}
.bgimg-2 {background-image: url("image/logo4.jpg");min-height: 400px;}
.bgimg-3 {background-image: url("image/logo4.jpg");min-height: 400px;}
.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}
</style>
<?php
}
}
?>

	<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
<hr />
	<center><div class="resetTop" style="white-space:nowrap;">
	<style type="text/css">
		.cont{padding:0px;width:50%;clear:both;}
		@media (max-width: 384px){.cont{padding:0px;width:100%;}}
	</style>
		<div class="row cont">
			
			<?php

			    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $id ");
			    $stmt->execute(array());
			    
			    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

			    foreach ($users as $user) {
			    	if ($user->premium == 0){
			    		echo '<script type="text/javascript">
                                window.location = "home.php"
                            </script>';
			    	}

			        ?>

						<div class="thumbnail productsBackgroundColor col-sm-6 col-md-10">
						<img src="<?php echo $user->profile_image; ?>" alt="joshua"  style = "width:100px;height:150px;margin-bottom:5px;border-radius:100px;">
							<div class="caption">
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<?php echo $user->city; ?>, <?php echo $user->country; ?>

										<div class="caption ">
										<h4 style = "text-align:center;font-family:Budmo Jiggler;"><b><a href = " shop.php?id=<?php echo $user->user_id; ?> ">Back</a></b></h4>
										<h4 style = "text-align:center;font-family:Budmo Jiggler;"><b><?php echo $category;  ?></b></h4>
										</div>
									</div>
								</div>
							</div>
								<center><?php require_once 'includes/widgets/body/addtocycle.php'; ?></center>
						</div>
						
						<?php require_once 'includes/widgets/body/widgets/shopMenu.php'; ?>



					<?php
					    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $id ");
					    $stmt->execute(array());
					    
					    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

					    foreach ($users as $user) {
							if ($user->user_id == $user_id) {
								header("Location: home.php");
							}
					        ?>
								<div class="caption col-sm-6 col-md-12">
								<h3 class = "shopNameColor" style = "text-align:center;font-family:Budmo Jiggler;"><b><?php  echo $user->shopname; ?></b></h3>
								</div>
					        <?php
					    }
					?>

						
							
			        <?php
			    }
			?>


		</div>
	</div></center>
</div>




<div class="row productsBackgroundColor">
<br />

	<?php
	    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $id AND `Productcategory`='$category' ORDER BY timeposted DESC");
	    $stmt->execute(array());
	    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
	    foreach ($products as $product) {
	        ?>						
	        	<div class="col-sm-12 col-md-3 myBorder" id = "contentsize">
					<div class="thumbnail myBorder col-sm-12 autofixheight myHover productsContainerBackgroundColor" id = "productsContainerRadius" style = "height:350px;">
					<a href = "product.php?id=<?php echo $product->productid; ?> "><img src="<?php  echo $product->product_image; ?>" alt="joshua" style = "width:auto; height:200px;" class = "myHover" id = "productsContainerRadius" /></a>
						<div class="caption col-md-12 myBorder" id = "productAlignment" style = "height:auto;">
					        <a href = "product.php?id=<?php  echo $product->productid; ?>"><b class = "productsFontColor" style="font-size:24px;"><?php  echo $product->productname; ?></b></a> <br />
					        <category>Category: <?php  echo $product->Productcategory; ?></category> <br />
					        <manufacturer>Manufacturer: <?php echo $product->productmanufacturer; ?></manufacturer> <br />
					        <price class = "productsPriceColor">Price: $<?php echo number_format($product->productprice, 2); ?>   <b style="color:red;"> + VAT</b></price> <br /><b></b>
					        <a href = "cart.php?add=<?php echo $product->productid; ?> " class = "w3-animate-zoom w3-center"><img src = "images/icons/truck.ico" alt = "cart"  /></a>


						</div>
					</div>
				</div>

	        <?php
	    }
	?>
</div>

<footer class="w3-center w3-black w3-padding-64 col-sm-12 col-md-12">
    <a href="#home" class="w3-button w3-light-grey"><button><i class="fa fa-arrow-up w3-margin-right"></i>To the top</button></a>
    <center><i>copyright &copy <?php echo date('Y').' '; ?><?php echo $user->shopname; ?></i></center>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
    </div>
</footer>

<?php	
} 
?>



<?php require_once 'includes/widgets/footer/footer.php'; 