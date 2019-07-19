<?php  require_once 'includes/session/pagesession.php'; ?>
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>










<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">
<?php require_once 'includes/widgets/body/pagesitepanel.php'; ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:50px;">
			
	












	<?php require_once 'includes/widgets/body/pagesitepanel.php'; ?>
	<div class="col-sm-6 col-md-12 " id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="jumbotron" style = "padding:5px;margin:0px;">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default" >
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">My Services</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						    <div class="panel-body">
								<div class="row ">
								  	<div class="col-sm-6 col-md-8">
										<div class="thumbnail">
										  	<div class="caption">
										        <?php require_once 'includes/widgets/body/widgets/servicelattestimage.php'; ?>
										  	</div>
										  	<hr />
										  	<div class="caption">
										        <div class="item">
													<div class="row">
														<?php require_once 'includes/widgets/body/widgets/myserviceslist.php'; ?>
													</div>
												</div>
										  	</div>
										</div>	    
									</div>
								  	<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
										  	<div class="caption">
										        <div class="item">
										        	<div class="row">
														<?php require_once 'includes/widgets/body/widgets/myservicesgallery.php'; ?>
													</div>
												</div>
										  	</div>
										</div>
									</div>
								</div>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once 'includes/widgets/footer/footer.php'; ?>


