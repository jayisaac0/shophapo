<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>

<?php
	if ($id == $user_id) {
		header("Location: home.php");
	}
?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">

<style>
.bgimg-1, .bgimg-2, .bgimg-3 {background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;}
.bgimg-1 {background-image: url("images/backtheme/bac.jpg");min-height: 800px;}
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
.bgimg-1 {background-image: url("<?php echo $user->productsbackground; ?>");min-height: 800px;}
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
<br />
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

						<div class="thumbnail productsBackgroundColor">
						<img src="<?php echo $user->profile_image; ?>" alt="joshua"  style = "width:auto;margin-bottom:5px;border-radius:100px;">
							<div class="caption">
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<h3><?php echo $user->firstname; ?>, <?php echo $user->middlename; ?></h3>
										<h3><?php echo $user->city; ?>, <?php echo $user->country; ?></h3> <br />
										<h3><img src = "images/icons/call.ico" alt = "call now" style = "margin-top:-30px;"><a href = "">0728040738</a></h3>
										<div class="caption ">
										<h3 style = "text-align:center;font-family:Budmo Jiggler;"><b><a href = " shop.php?id=<?php echo $user->user_id; ?> ">Back to shop</a></b></h3>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php
					    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $id ");
					    $stmt->execute(array());
					    
					    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

					    foreach ($users as $user) {
							if ($user->user_id == $user_id) {
								header("Location: home.php");
							}
					        ?>
								<div class="caption ">
									<h3 class = "shopNameColor" style = "text-align:center;font-family:Budmo Jiggler;"><b><?php  echo $user->shopname; ?></b></h3>
								</div>
					        <?php
					    }
					?>

						<h3>Contact me on social media</h3>
						<hr />
							<ul class="nav nav-pills" role="tablist">
								<li role="presentation"><a href = "mailto:<?php echo $user->user_email; ?> "> <img src = "images/icons/message.ico" /> </a></li>
								<li role="presentation"><a href = "<?php echo $user->facebook; ?>" target = "_newTab"> <img src = "images/icons/facebook.ico" /> </a></li>
								<li role="presentation"><a href = "<?php echo $user->twitter; ?>" target = "_newTab"> <img src = "images/icons/twitter.ico" /> </a></li>
								<li role="presentation"><a href = "<?php echo $user->googleplus; ?>" target = "_newTab"> <img src = "images/icons/googleplus.ico" /> </a></li>
								<li role="presentation"><a href = "<?php echo $user->linkedin; ?>" target = "_newTab"> <img src = "images/icons/linkedin.ico" /> </a></li>
							</ul>

							
			        <?php
			    }
			?>
			<div class="col-sm-6 col-md-12 productsBackgroundColor myBorder" style = "width:100%;" >
				<div class="thumbnail productsContainerBackgroundColor myBorder" style = "width:100%;" >
					<?php  require_once 'includes/chat/chat.php'; ?>
				</div>
			</div>

		</div>
	</div></center>
</div>




<?php	
} 
?>



<?php require_once 'includes/widgets/footer/footer.php'; 