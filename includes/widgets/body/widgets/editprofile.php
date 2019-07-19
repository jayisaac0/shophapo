<div class="panel panel-default" >
    <div class="panel-heading" role="tab" id="headingOne">
	    <h4 class="panel-title">
	        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	          Edit my profile
	        </a>
	    </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
	    <div class="panel-body">

	    	<?php require_once 'includes/formcontroller/editprofileformcontroller.php'; ?>

			<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor" enctype="multipart/form-data">

					<?php require_once 'includes/errors/warning.php'; ?>

				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="firstname" class="form-control" id="inputfirstname" name="firstname" value = "<?php echo trim($userRow['firstname']); ?>"  placeholder="First name" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="middlename" class="form-control" id="inputmiddlename" name="middlename" value = "<?php echo trim($userRow['middlename']); ?>"  placeholder="Middle name" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="lastname" class="form-control" id="inputlastname" name="lastname" value = "<?php echo trim($userRow['lastname']); ?>"  placeholder="Last name" />
				    </div>
				</div>
				<div class="form-group">
			        <div class="col-md-12">
			            <input type="file" id="file" name="profile_image" value = "<?php echo trim($userRow['profile_image']); ?>"  placeholder = "Update profile picture"  style = "width:100%;border:1px grey;background:#FFFFFF;padding-top:5px;padding-bottom:5px;"/>
			        </div>
			    </div>
				<div class="form-group">
				    <div class="col-sm-offset-0 col-sm-12">
				      <button type="submit" name = "formaluserdetails" class="btn btn-default">Update</button>
				    </div>
				</div>
			</form>
	    </div>
    </div>
</div>