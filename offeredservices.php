<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php' ?>
<?php require_once 'includes/widgets/body/navigation.php' ?>


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>
<?php
	if ($id == $user_id) {
		header("Location: home.php");
		echo '<script type="text/javascript"> window.location = "home.php" </script>';
	}
?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">


		<style>

			/* Create a Parallax Effect */
			.bgimg-1, .bgimg-2, .bgimg-3 {
			    background-attachment: fixed;
			    background-position: center;
			    background-repeat: no-repeat;
			    background-size: cover;
			}

			/* First image (Logo. Full height) */
			.bgimg-1 {
			    background-image: url("images/backtheme/bac.jpg");
			    min-height: 410px;

			}

			/* Second image (Portfolio) */
			.bgimg-2 {
			    background-image: url("image/logo4.jpg");
			    min-height: 400px;
			}

			/* Third image (Contact) */
			.bgimg-3 {
			    background-image: url("image/logo4.jpg");
			    min-height: 400px;
			}

			.w3-wide {letter-spacing: 10px;}
			.w3-hover-opacity {cursor: pointer;}

			/* Turn off parallax scrolling for tablets and phones */
			@media only screen and (max-device-width: 1024px) {
			    
			}
			</style>
			<?php

			    $stmt = $auth_user->runQuery("SELECT * 
			    							FROM `users`
			    							JOIN `themes`
			    							ON    `themes`.`user_id`=`users`.`user_id`
			    							WHERE `themes`.`user_id` = '$id' ");
			    $stmt->execute(array());
			    
			    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

			    foreach ($users as $user) {

			    	if($user->servicebackground == true) {
			    		?>
							
						<style>
							/*----------------------------------------------------------------------
							*service theme set
							*-----------------------------------------------------------------------
							*/


								.shopNameColor{
									color:<?php echo $user->productheadingcolor; ?>;
								}
								.productsFontColor{
									color:<?php echo $user->productfontcolor; ?>;
								}
								.productsPriceColor{
									color:<?php echo $user->productpricecolor; ?>;
								}
								.productsBackgroundColor{
									background:<?php echo $user->productsbackgroundcolor; ?>;
								}
								.productsContainerBackgroundColor{
									background:<?php echo $user->productbodycontainer; ?>;
								}
								#productsContainerRadius{
									border-radius:<?php echo $user->productcontainerradius; ?>;
								}
								#productAlignment{
									text-align:<?php echo $user->alignment; ?>;
								}
								.myBorder{
									border:<?php echo $user->border; ?>;
								}

							/*----------------------------------------------------------------------
							*service theme set end
							*-----------------------------------------------------------------------
							*/

						body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
						body, html {
						    height: 100%;
						    color: #777;
						    line-height: 1.8;
						}

						/* Create a Parallax Effect */
						.bgimg-1, .bgimg-2, .bgimg-3 {
						    background-attachment: fixed;
						    background-position: center;
						    background-repeat: no-repeat;
						    background-size: cover;
						}

						/* First image (Logo. Full height) */
						.bgimg-1 {
						    background-image: url("<?php echo $user->servicebackground; ?>");
						    min-height: 410px;
						}

						/* Second image (Portfolio) */
						.bgimg-2 {
						    background-image: url("<?php echo $user->servicebackground; ?>");
						    min-height: 400px;
						}

						/* Third image (Contact) */
						.bgimg-3 {
						    background-image: url("<?php echo $user->servicebackground; ?>");
						    min-height: 400px;
						}

						.w3-wide {letter-spacing: 10px;}
						.w3-hover-opacity {cursor: pointer;}


						</style>
			    		<?php
			    	}


			    }
			?>



<div class="bgimg-1 w3-display-container w3-opacity-min " id="home">
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

			    	if ($user->user_id == $user_id) {
						header("Location: home.php");
					}
					if ($user->premium == 0){
			    		echo '<script type="text/javascript">
                                window.location = "home.php"
                            </script>';
			    	}

			        ?>

					
						<div class="thumbnail productsBackgroundColor col-sm-6 col-md-10">
						<img src="<?php echo $user->profile_image; ?>" alt="joshua" style = "width:100px;height:150px;margin-bottom:5px;border-radius:100px;" />
						
						
							<div class="caption">
								<div class="row">
									<div class="col-sm-12 col-md-12">
										<?php echo $user->city; ?>, <?php echo $user->country; ?> <br />

										<div class="caption ">
										<h3 style = "text-align:center;font-family:Budmo Jiggler;"><b><a href = " shop.php?id=<?php echo $user->user_id; ?> ">View products</a></b></h3>
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



<div class="w3-row w3-center productsBackgroundColor myBorder w3-padding-16">

	<div class="row productsContainerBackgroundColor myBorder">

			<?php

			    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE user_id = $id ORDER BY timeposted DESC LIMIT 4 ");
			    $stmt->execute(array());
			    
			    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

			    foreach ($services as $service) {

			        ?>
					<div class="col-sm-3 col-md-3 myBorder" id = "contentsize " >
						<div class="thumbnail myBorder" style = "min-height:400px;">
						<img src = " <?php echo $service->service_image; ?> "  style = "width:auto;height:200px;" id = "productsContainerRadius" />
							<div class="caption">
							<h3 class = "productsFontColor" style = "text-align:center;"> <?php echo $service->service; ?> </h3>
							<p id = "productAlignment" style = "min-height:100px;">
								<?php echo substr ( $service->servicedescription,0, 300) ; ?>...<a href=" service.php?id=<?php echo $service->serviceid; ?> ">
								<b>View all</b></a></p>
							</div>
						</div>
					</div>
			        <?php

			    }

			?>

	</div>
</div>




<div class="bgimg-2 w3-display-container w3-opacity-min">
	<div class="w3-display-middle">
		<span class="w3-xxlarge w3-text-light-grey w3-wide">VIEW MORE SERVISES</span>
	</div>
</div>





<div class="productsBackgroundColor w3-container w3-padding-64" id="portfolio">
<h3 style = "text-align:center;">Please view  more services below</h3>
<div class="row productsContainerBackgroundColor " style = "overflow-y:scroll;max-height:600px;">
<div class="col-sm-12 col-md-12 myBorder">
	<?php require_once 'includes/formcontroller/serviceorderformcontroller.php'; ?>
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
<div class="list-group myBorder">

<?php

    $stmt = $auth_user->runQuery("SELECT service_id, serviceid, service_image, servicedescription, service FROM services WHERE user_id = $id ORDER BY timeposted DESC");
    $stmt->execute(array());
    
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($services as $service) {
    ?>
	<div href=" service.php?id=<?php  echo $service->serviceid; ?>  " class="list-group-item col-sm-12 col-md-2" style = "height:305px;padding:1px;">
		<span class="badge"  style = "padding:0px;" id="<?php echo $service->service_id; ?>">
		  	<img class="media-object " src = " <?php  echo $service->service_image; ?> " style = "width:100%;height:150px;" />
		</span><br />
		<center>
			<b><?php echo $service->service; ?></b>
		</center>
		<footer style="line-height:1.4;text-align:center;">
			<?php echo substr ($service->servicedescription,0, 110); ?>...
			<a href=" service.php?id=<?php  echo $service->serviceid; ?> "><b style = "color:blue;">more</b></a><br />
			<form class="form-horizontal" role="form" method="POST" action="#<?php echo $service->service_id; ?>"  enctype="multipart/form-data">

            <input type="hidden" name="shopid" value="<?php echo $id; ?>" />
            <input type="hidden" name="specificserviceid" value="<?php echo $service->serviceid; ?>" />
            <input type="hidden" name="service_id" value="<?php echo $service->service_id; ?>" />
            <input type="hidden" name="service_image" value="<?php echo $service->service_image; ?>" />
            <input type="hidden" name="service_id" value="<?php echo $service->service_id; ?>" />
            <input type="hidden" name="servicename" value="<?php echo $service->service; ?>" />
            <input type="hidden" name="customername" value="<?php echo $userRow['user_name']; ?>" />
			<button class="btn-group btn-primary btn-group-xs w3-btn w3-padding-large w3-blue" name="serviceorder" style="width:100%;" role="group" aria-label="...">Order</button>
			</form>
		</footer>
	</div>

		
    <?php
    }
?>

</div>
</div>
</div>
</div>


<div id="modal01" class="w3-modal w3-black myBorder" onclick="this.style.display='none'">
	<span class="w3-closebtn w3-text-white w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
	<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64 myBorder  ">
		<img id="img01" class="w3-image">
		<p id="caption" class="w3-opacity w3-large"></p>
	</div>
</div>

<div class="bgimg-3 w3-display-container w3-opacity-min myBorder">
	<div class="w3-display-middle myBorder">
		<span class="w3-xxlarge w3-text-light-grey w3-wide">SERVICE GALLERY</span>
	</div>
</div>

<div class="panel myBorder" id="contact">

	<div class="col-sm-12 col-md-8 productsBackgroundColor"><br />
		<div class="thumbnail productsOntainerBackgroundColor" style = "border:none;">


					<script src="js/jssor.slider-22.2.16.min.js" type="text/javascript"></script>
					<script type="text/javascript">
					jssor_1_slider_init = function() {

					var jssor_1_SlideshowTransitions = [
					{$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
					{$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
					{$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
					{$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
					{$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
					{$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
					{$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
					{$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
					{$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
					{$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
					{$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
					{$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
					];

					var jssor_1_options = {
						$AutoPlay: true,
						$SlideshowOptions: {
						$Class: $JssorSlideshowRunner$,
						$Transitions: jssor_1_SlideshowTransitions,
						$TransitionsOrder: 1
						},
						$ArrowNavigatorOptions: {
						$Class: $JssorArrowNavigator$
						},
						$ThumbnailNavigatorOptions: {
						$Class: $JssorThumbnailNavigator$,
						$Rows: 2,
						$Cols: 6,
						$SpacingX: 14,
						$SpacingY: 12,
						$Orientation: 2,
						$Align: 156
						}
					};

					var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

					/*responsive code begin*/
					/*remove responsive code if you don't want the slider scales while window resizing*/
					function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
					refSize = Math.min(refSize, 960);
					refSize = Math.max(refSize, 300);
					jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
					window.setTimeout(ScaleSlider, 30);
					}
					}
					ScaleSlider();
					$Jssor$.$AddEvent(window, "load", ScaleSlider);
					$Jssor$.$AddEvent(window, "resize", ScaleSlider);
					$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
					/*responsive code end*/
					};
					</script>
					<style>
					.jssora05l, .jssora05r {
					display: block;
					position: absolute;
					/* size of arrow element */
					width: 40px;
					height: 40px;
					cursor: pointer;
					background: url('img/a17.png') no-repeat;
					overflow: hidden;
					}
					.jssora05l { background-position: -10px -40px; }
					.jssora05r { background-position: -70px -40px; }
					.jssora05l:hover { background-position: -130px -40px; }
					.jssora05r:hover { background-position: -190px -40px; }
					.jssora05l.jssora05ldn { background-position: -250px -40px; }
					.jssora05r.jssora05rdn { background-position: -310px -40px; }
					.jssora05l.jssora05lds { background-position: -10px -40px; opacity: .3; pointer-events: none; }
					.jssora05r.jssora05rds { background-position: -70px -40px; opacity: .3; pointer-events: none; }
					/* jssor slider thumbnail navigator skin 01 css *//*.jssort01-99-66 .p            (normal).jssort01-99-66 .p:hover      (normal mouseover).jssort01-99-66 .p.pav        (active).jssort01-99-66 .p.pdn        (mousedown)*/.jssort01-99-66 .p {    position: absolute;    top: 0;    left: 0;    width: 99px;    height: 66px;}.jssort01-99-66 .t {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}.jssort01-99-66 .w {    position: absolute;    top: 0px;    left: 0px;    width: 100%;    height: 100%;}.jssort01-99-66 .c {    position: absolute;    top: 0px;    left: 0px;    width: 95px;    height: 62px;    border: #000 2px solid;    box-sizing: content-box;    background: url('img/t01.png') -800px -800px no-repeat;    _background: none;}.jssort01-99-66 .pav .c {    top: 2px;    _top: 0px;    left: 2px;    _left: 0px;    width: 95px;    height: 62px;    border: #000 0px solid;    _border: #fff 2px solid;    background-position: 50% 50%;}.jssort01-99-66 .p:hover .c {    top: 0px;    left: 0px;    width: 97px;    height: 64px;    border: #fff 1px solid;    background-position: 50% 50%;}.jssort01-99-66 .p.pdn .c {    background-position: 50% 50%;    width: 95px;    height: 62px;    border: #000 2px solid;}* html .jssort01-99-66 .c, * html .jssort01-99-66 .pdn .c, * html .jssort01-99-66 .pav .c {    /* ie quirks mode adjust */    width /**/: 99px;    height /**/: 66px;}
					</style>

					<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
						<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
							<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
							<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
						</div>
						<div data-u="slides" style="cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;">

							<?php
							$stmt = $auth_user->runQuery("SELECT * FROM servicegallery WHERE user_id = $id ORDER BY timeposted DESC ");
							$stmt->execute(array());
							$servicegallery=$stmt->fetchAll(PDO::FETCH_OBJ);
							foreach ($servicegallery as $servicegallery) {
							?>
							<div>
							<a>
							<img data-u="image" src = " <?php echo $servicegallery->service_gallery_image; ?> " style = "cursor:zoom-in;" onclick="onClick(this)" onclick="onClick(this)" alt=" <?php echo $servicegallery->servicegallery; ?> " />
							</a>
							</div>
							<?php
							}
							?>

						</div>
						<div data-u="thumbnavigator" class="jssort01-99-66" style="position:absolute;left:0px;top:0px;width:240px;height:480px;" data-autocenter="2">
							<div data-u="slides" style="cursor: default;">
								<div data-u="prototype" class="p">
									<div class="w">
										<div data-u="thumbnailtemplate" class="t"></div>
									</div>
									<div class="c"></div>
								</div>
							</div>
						</div>
						<span data-u="arrowleft" class="jssora05l" style="top:0px;left:248px;width:40px;height:40px;" data-autocenter="2"></span>
						<span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
					</div>

					<script type="text/javascript">jssor_1_slider_init();</script>

		</div>
	</div>
	<div class="col-sm-12 col-md-4 productsBackgroundColor"><br />
	            <style type="text/css"> 
	    .bs-glyphicons .glyphicon { margin-top: 5px; margin-bottom: 10px; font-size: 24px; }
	    .glyphicon { position: relative; top: 1px; display: inline-block; font-family: 'Glyphicons Halflings'; font-style: normal; font-weight: 400 line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
	    .glyphicon-asterisk:before { content: "\002a"; }
	    .bs-glyphicons .glyphicon-class { display: block; text-align: center; word-wrap: break-word; }
	    .bs-glyphicons { margin: 0 -10px 20px; overflow: hidden;}
	    .bs-glyphicons-list { padding-left: 0; list-style: none;}
	    ol, ul { margin-top: 0; margin-bottom: 10px;}
	    .bs-glyphicons li { float: left; width:115px; height: 115px; padding: 10px; font-size: 10px; line-height: 1.4; text-align: center; background-color: #f9f9f9; border: 1px solid #fff;}
	    .bs-glyphicons li:hover{background:#9C83B4;color:#FFFFFF;}
	    .bs-glyphicons .glyphicon { margin-top: 5px; margin-bottom: 10px; font-size: 24px;}
	    .glyphicon { position: relative; top: 1px; display: inline-block; font-family: 'Glyphicons Halflings' font-style: normal font-weight: 400; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
	    </style>
        <div class="bs-glyphicons">
            <ul class="bs-glyphicons-list">
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
                <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                     <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                </li>
            </ul>
        </div>
	</div>
</div>

<div id="modal01" class="w3-modal w3-black w3-padding-0" onclick="this.style.display='none'"  style = "margin-top:0px;">
	<span class="w3-closebtn w3-text-white w3-opacity w3-hover-opacity-off w3-xxlarge w3-container w3-display-topright">×</span>
	<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64" style = "margin-top:0px;">
		<div class="col-sm-0 col-md-8"><img id="img01" class="w3-image" style = "margin-top:0px;" /></div>
		<div class="col-sm-0 col-md-4" ><p id="caption"> </p></div>
	</div>
</div>



<!-- Footer -->
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



<!-- Add Google Maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
<!-- Google Map Location -->
var myCenter = new google.maps.LatLng(41.878114, -87.629798);

function initialize() {
var mapProp = {
  center: myCenter,
  zoom: 12,
  scrollwheel: false,
  draggable: false,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position: myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-navbar" + " w3-card-2" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>




<?php require_once 'includes/widgets/footer/footer.php'; ?>