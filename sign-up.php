<?php
session_start();
require_once('database/class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<?php require_once 'includes/widgets/header.php' ?>

<?php require_once 'includes/widgets/body/head.php'; ?>




<div class="signin-form" style = "margin-top:70px;">
	<div class="container">
		<div class="jumbotron">
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
			              <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='login.php'>login</a> here
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
			    
			</form>
			<div class="modal-footer">
                <label>have an account ! <a href="login.php"  id = "login" >Login</a></label>
            </div>
			
		</div>
	</div>
</div>


<?php require_once 'includes/widgets/footer/footer.php'; ?>