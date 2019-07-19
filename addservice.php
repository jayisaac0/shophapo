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
					<div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Add Services to my pagesite</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" />
						    <div class="panel-body">

						    	<?php require_once 'includes/formcontroller/serviceformcontroller.php'; ?>

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
									      <input type="hidden" class="form-control btn btn-primary disabled" id="inputserviceid" name = "serviceid" placeholder="Service ID" value = "<?php echo time(); ?>" />
									    </div>
									<div class="form-group">
									    <div class="col-sm-12">
									      <input type="service" class="form-control" id="inputservice" name = "service" placeholder="Service" />
									    </div>
									</div>
									<div class="form-group">
									    <div class="col-sm-12">
									      <input type="serviceprice" class="form-control" id="inputserviceprice" name = "serviceprice" placeholder="Service price" />
									    </div>
									</div>
									<div class="form-group">
									    <div class="col-sm-12">
									      <textarea type="servicedescription" class="form-control" id="inputservicedescription" name = "servicedescription" placeholder="Service description" maxlength = "1000" style = "max-height:100px;min-height:100px;"></textarea>
									    </div>
									</div>
									<div class="form-group">
									    <div class="col-sm-12">
									      <textarea type="fulldetails" class="form-control" id="inputfulldetails" name = "fulldetails" maxlength = "3500"  placeholder="Full details" style = "max-height:100px;min-height:100px;"></textarea>
									    </div>
									</div>
									<div class="form-group">
								        <div class="col-md-12" >
								            <input id="service_image" type="file" class="" name ="service_image" placeholder = "Upload service image"  style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;"/>
								        </div>
								    </div>

									<div class="form-group">
									    <div class="col-sm-offset-0 col-sm-10">
									      <button type="submit" name = "addservice" class="btn btn-default">Post</button>
									    </div>
									</div>
								</form>

						    </div>
					    </div>
					</div>


					<div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Service gallery</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" />
						    <div class="panel-body">

						    	<?php require_once 'includes/formcontroller/servicegalleryformcontroller.php'; ?>

								<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">

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

									<div class="form-group">
									    <div class="col-sm-12">
									      <textarea type="servicegallery" class="form-control" id="inputservicegallery" name = "servicegallery" placeholder="Full details" style = "max-height:100px;min-height:100px;"></textarea>
									    </div>
									</div>
									<div class="form-group">
								        <div class="col-md-12" >
								            <input id="service_gallery_image" type="file" class="" name ="service_gallery_image" placeholder = "Upload service image"  style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;"/>
								        </div>
								    </div>

									<div class="form-group">
									    <div class="col-sm-offset-0 col-sm-10">
									      <button type="submit" name = "servicegallerypost" class="btn btn-default">Post</button>
									    </div>
									</div>
								</form>

						    </div>
					    </div>
					</div>


					<div class="panel panel-default">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Advertisement clip</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" />
						    <div class="panel-body">

								<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">
									<div class="form-group">
								        <div class="col-md-12" >
								            <input id="advert_clip" type="file" class="" name ="advert_clip" placeholder = "Upload advert clip" />
								        </div>
								    </div>

									<div class="form-group">
									    <div class="col-sm-offset-0 col-sm-10">
									      <button type="submit" name = "advert_clip_post" class="btn btn-default">Post</button>
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


