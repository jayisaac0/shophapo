<?php
session_start();
require_once("database/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
    $login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $uname = strip_tags($_POST['txt_uname_email']);
    $umail = strip_tags($_POST['txt_uname_email']);
    $upass = strip_tags($_POST['txt_password']);
        
    if($login->doLogin($uname,$umail,$upass))
    {
        $login->redirect('home.php');
    }
    else
    {
        $error = "Wrong Details !";
    }   
}

$general = new USER();

?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/head.php'; ?>



<div class="signin-form" style = "margin-top:70px;">
    <div class="container">
        <div class="jumbotron"> 




                    <div class="form-group messages" >


                   <form class="form-signin" method="post" id="login-form">
                   <h2 class="form-signin-heading">Login .</h2><hr />
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
                </div>



        </div>
    </div>
</div>


<?php require_once 'includes/widgets/login.php'; ?>
<?php require_once 'includes/widgets/footer/footer.php'; ?>