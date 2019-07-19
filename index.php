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
<div class="row resetTop">


    <div class="tab-content">
        <div id="products" class="tab-pane fade in active">
            <?php require_once 'includes/widgets/body/products.php'; ?>
        </div>
        <div id="services" class="tab-pane fade">
            <?php require_once 'includes/widgets/body/services.php'; ?>
        </div>
    </div>


</div>
<?php require_once 'includes/widgets/login.php'; ?>
<?php require_once 'includes/widgets/footer/footer.php'; ?>