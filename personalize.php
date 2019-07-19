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
	<div class="col-sm-0 col-md-12" id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="jumbotron" style = "padding:5px;margin:0px;">


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default" style = "">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Theme up your pagesite</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						    <div class="panel-body">

								<div class = "row">
									<div class="col-sm-6 col-md-12">
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong> Give your theme a name </strong>
											<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
											

<?php
    if(isset($_POST['postThemeName']))
    {
        $themename = strip_tags($_POST['themename']);
       

        if($themename == "") {
            $error[] = "provide theme name!";
        }
        else
        {
            try
            {
                if($auth_user->createthemename($user_id, $themename)) 
                {
                    ?>
                        <div class="alert alert-warning"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Theme created!'; 
                            
                            ?>
                        </div>
                    <?php
                } 
            }catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
        }
        
    }

?>



											
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
												    	<input type="themename" class="form-control" id="themename" name = "themename" placeholder="Theme name" />
												    </div>
											    </div>
												<div class="form-group">
												    <div class="col-sm-offset-0 col-sm-10">
												      <button type="submit" name = "postThemeName" class="btn btn-default">Post</button>
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
		</div>
	</div>


	<div class="col-sm-0 col-md-12" id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="jumbotron" style = "padding:5px;margin:0px;">


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default" style = "">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Theme up your pagesite</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						    <div class="panel-body">

								<div class = "row">
									<div class="col-sm-6 col-md-6">
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">
											

											<?php require_once 'includes/formcontroller/productsbackgroundthemecontroller.php'; ?>
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

												<label>Background image</label>
												<div class="form-group">
											        <div class="col-md-12" >
											            <input id="file" type="file" name ="productsbackground" placeholder = "Products background image"  style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;overflow:hidden;"/>
											        </div>
											    </div>
											    <label>Background color</label>
											    <div class="form-group">
											        <div class="col-md-12" >
											            <input id="productsbackgroundcolor" type="inputproductsbackgroundcolor"  class="form-control" name ="productsbackgroundcolor" placeholder = "Products background color" />
											        </div>
											    </div>
											    <label>Price color</label>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<input type="productpricecolor" class="form-control" id="inputproductpricecolor" name = "productpricecolor" placeholder="product price color" />
												    </div>
											    </div>
											    <label>Font color</label>
												<div class="form-group">
											        <div class="col-sm-12">
												    	<input type="productfontcolor" class="form-control" id="inputproductfontcolor" name = "productfontcolor" placeholder="product font color" />
												    </div>
											    </div>
											    <label>Heading color</label>
												<div class="form-group">
											        <div class="col-sm-12">
												    	<input type="productheadingcolor" class="form-control" id="inputproductheadingcolor" name = "productheadingcolor" placeholder="product heading color" />
												    </div>
											    </div>
											    <label>Container color</label>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<input type="productbodycontainer" class="form-control" id="inputproductbodycontainer" name = "productbodycontainer" placeholder="product body container background" />
												    </div>
											    </div>

												<div class="form-group">
												    <div class="col-sm-offset-0 col-sm-10">
												      <button type="submit" name = "productsbackgroundpost" class="btn btn-default">Post</button>
												    </div>
												</div>
											</form>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">
											<?php require_once 'includes/formcontroller/productcontainercontroller.php'; ?>

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
												<label>Container shape</label>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<select type="productcontainerradius" class="form-control"  id="inputproductcontainerradius" name = "productcontainerradius" placeholder="container width" >
															<option value="0px">None</option>
															<option value="50px">50 pixels</option>
															<option value="100px">100 pixels</option>
															<option value="200px">200 pixels</option>
															<option value="300px">300 pixels</option>
												        </select>
												    </div>
											    </div>
											    <label>Align</label>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<select type="alignment" class="form-control"  id="inputalignment" name = "alignment" placeholder="alignment" >
															<option value="left">Left</option>
															<option value="right">Right</option>
															<option value="center">Center</option>
															<option value="justify">Justify</option>
												        </select>
												    </div>
											    </div>
											    <label>Border</label>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<select type="border" class="form-control"  id="inputborder" name = "border" placeholder="border" >
												    		<option value=" ">Default</option>
															<option value="none">None</option>
															<option value="dashed">Dashed</option>
															<option value="dotted">Dotted</option>
												        </select>
												    </div>
											    </div>
												<div class="form-group">
												    <div class="col-sm-offset-0 col-sm-10">
												      <button type="submit" name = "containerradiuspost" class="btn btn-default">Post</button>
												    </div>
												</div>
											</form>
										</div>
									</div>
								</div>





								<div class = "row">
									<div class="col-sm-6 col-md-6">
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong> Service page background! </strong>
											<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">
											<?php require_once 'includes/formcontroller/servicebackgroundthemecontroller.php'; ?>


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
											        <div class="col-md-12" >
											            <input id="file" type="file" name ="servicebackground" placeholder = "Upload service page background image" style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;overflow:hidden;"/>
											        </div>
											    </div>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<input type="servisefontcolor" class="form-control" id="inputservisefontcolor" name = "servisefontcolor" placeholder="font color" />
												    </div>
											    </div>
											    <div class="form-group">
											        <div class="col-sm-12">
												    	<input type="serviseheadingcolor" class="form-control" id="inputserviseheadingcolor" name = "serviseheadingcolor" placeholder="heading color" />
												    </div>
											    </div>

												<div class="form-group">
												    <div class="col-sm-offset-0 col-sm-10">
												      <button type="submit" name = "servicebackgroundpost" class="btn btn-default">Post</button>
												    </div>
												</div>
											</form>
										</div>
									</div>
									<div class="col-sm-6 col-md-6">
										<div class="alert alert-success alert-dismissible " role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong> Service containers! </strong>
											<form class="form-horizontal" role="form" method="POST"  action="#galleryid" id="galleryid" enctype="multipart/form-data">
											<?php require_once 'includes/formcontroller/servicecontainercontroller.php'; ?>

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
												    	<select type="servicecontainerwidth" class="form-control"  id="inputservicecontainerwidth" name = "servicecontainerwidth" placeholder="container width" >
															<option value="col-sm-6 col-md-3">Quater</option>
															<option value="col-sm-6 col-md-4">Third</option>
															<option value="col-sm-6 col-md-6">Half</option>
															<option value="col-sm-6 col-md-12">Full</option>
												        </select>
												    </div>
											    </div>
												<div class="row">
													<div class="col-sm-6 col-md-12">
														<div class="thumbnail">
															<img src = "images/themesample/quater.png" />
															quater
															<img src = "images/themesample/third.png" />
															third
															<img src = "images/themesample/half.png" />
															half
															<img src = "images/themesample/full.png" />
															full
														</div>
													</div>
												</div>

												<div class="form-group">
												    <div class="col-sm-offset-0 col-sm-10">
												      <button type="submit" name = "servicecontainerpost" class="btn btn-default">Post</button>
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
		</div>
	</div>



</div>




<?php require_once 'includes/widgets/footer/footer.php'; ?>
