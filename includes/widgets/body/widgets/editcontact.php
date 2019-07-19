<div class="panel panel-default" >
    <div class="panel-heading" role="tab" id="headingTwo">
	    <h4 class="panel-title">
	        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	          Edit contact details
	        </a>
	    </h4>
    </div>
    <div id="collapseTwo" class="" role="tabpanel" aria-labelledby="headingTwo">
	    <div class="panel-body">

	    	<?php require_once 'includes/formcontroller/editcontactformcontroller.php'; ?>

	        <form class="form-horizontal" role="form" method="POST"  action="#form-anchor" id="form-anchor">

	        		<?php require_once 'includes/errors/warning.php'; ?>
	        	
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="postaladdress" class="form-control" id="inputpostaladdress" name="postaladdress" value = "" placeholder="Postal ddress eg(<?php echo trim($userRow['postaladdress']); ?>)" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="postalcode" class="form-control" id="inputpostalcode" name="postalcode" value = ""  placeholder="Postal code eg(<?php echo trim($userRow['postalcode']); ?>)" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="city" class="form-control" id="inputcity" name="city" value = "<?php echo trim($userRow['city']); ?>"  placeholder="City" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-12">
				      <input type="country" class="form-control" id="inputcountry" name="country" value = "<?php echo trim($userRow['country']); ?>"  placeholder="Country" />
				    </div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-0 col-sm-12">
				      <button type="submit" name = "updatecontact" class="btn btn-default">Update</button>
				    </div>
				</div>
			</form>
	    </div>
    </div>
</div>