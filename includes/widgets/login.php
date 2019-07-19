<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel"><center> LOG IN </center></h4>
				</div>
				<div class="modal-body">


					<div class="form-group messages" >


			       <form class="form-signin" method="post" id="login-form">
			        <div id="error">
			        <?php
			            if(isset($error))
			            {
			                ?>
			                <div class="alert alert-danger">
			                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
			                </div>
			                <?php
			            }
			        ?>
			        </div>
			        
			        <div class="form-group">
			        <label>Username:</label>
			        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
			        <span id="check-e"></span>
			        </div>
			        
			        <div class="form-group">
			        <label>Password:</label>
			        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
			        </div>
			       
			        <hr />
			        
			        <div class="form-group">
			            <button type="submit" name="btn-login" class="btn btn-default">
			                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
			            </button>
			        </div>  
			      </form>



				</div>
				<div class="modal-footer">
				<label>Don't have account yet ! <a href="sign-up.php" >Sign Up</a></label>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			
		</div>
	</div>
</div>
