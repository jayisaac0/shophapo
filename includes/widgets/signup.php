<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel"><center> LOG IN </center></h4>
			</div>
				<div class="modal-body">


				<div class="form-group messages" >


				<form method="post" class="form-signin">
		            <h2 class="form-signin-heading">Sign up.</h2><hr />
		            <?php
					if(isset($error))
					{
					 	foreach($error as $error)
					 	{
							 ?>
		                     <div class="alert alert-danger">
		                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
		                     </div>
		                     <?php
						}
					}
					else if(isset($_GET['joined']))
					{
						 ?>
		                 <div class="alert alert-info">
		                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
		                 </div>
		                 <?php
					}
					?>
		            <div class="form-group">
		            <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
		            </div>
		            <div class="form-group">
		            <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
		            </div>
		            <div class="form-group">
		            	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
		            </div>
		            <div class="clearfix"></div><hr />
		            <div class="form-group">
		            	<button type="submit" class="btn btn-primary" name="btn-signup">
		                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
		                </button>
		            </div>
		            <br />
		            <label>have an account ! <a href="index.php">Sign In</a></label>
		        </form>



				</div>
				<div class="modal-footer">
				<label>Don't have account yet ! <a href=""  id = "login"  data-toggle="modal" data-target="#myModal" >Sign Up</a></label>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" name="btn-login" class="btn btn-default  btn-primary">
			                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
			        </button>
				</div>
			</div>
		
		</div>
	</div>
</div>
