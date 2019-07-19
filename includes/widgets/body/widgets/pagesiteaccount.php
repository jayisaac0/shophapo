<div class="panel panel-default" >
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          	Create your pagesite account here
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="" role="tabpanel" aria-labelledby="headingThree">
	    <div class="panel-body">

	    	<?php require_once 'includes/formcontroller/pagesiteaccountformcontroller.php'; ?>

	        <form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor"  enctype="multipart/form-data">

	        		<?php require_once 'includes/errors/warning.php'; ?>

				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="shopname" class="form-control" id="inputshopname" name="shopname"  placeholder="My shop name" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="idnumber" class="form-control" id="inputidnumber" name="idnumber"  placeholder="My ID number" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="license" class="form-control" id="inputlicense" name="license" placeholder="My business license" />
				    </div>
				</div>
				    <div class="col-sm-12">
				        <input type="hidden" class="form-control btn btn-primary disabled" id="inputonlinebusinessid" value = "<?php echo strtoupper(md5(time())); ?>" name="onlinebusinessid" placeholder="Generate online business ID" />
				    </div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="facebook" class="form-control" id="inputfacebook" name="facebook" placeholder="Facebook page link" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="twitter" class="form-control" id="inputTwitter" name="twitter" placeholder="Twitter page link" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="googleplus" class="form-control" id="inputgoogleplus" name="googleplus" placeholder="G++ page link" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				        <input type="linkedin" class="form-control" id="inputlinkedin" name="linkedin" placeholder="linkedin link" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-0 col-sm-12">
				        <button type="submit" name = "createpagesite" class="btn btn-default">Create pagesite</button>
				    </div>
				</div>
			</form>
	    </div>
    </div>
</div>