<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>









<div class="row resetTop">
<?php

    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE serviceid = $id ");
    $stmt->execute(array());
    
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($services as $service) {

        ?>

            <div class="jumbotron w3-display-container w3-center " style = "padding:10px;">

                <div class="container slidr" style = "position:center;">
                    <img src="<?php echo $service->service_image; ?>" alt="joshua" style = "width:70%;height:auto;" class = "myHover" />
                </div>

                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                    <p><b>#<?php echo $service->serviceid; ?></b></p>   
                </div>
            </div>
            <a href="offeredservices.php?id=<?php echo $service->user_id; ?>" ><div class="w3-btn w3-padding-large w3-gray w3-animate-zoom w3-center">Back to shop</div></a>

            <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
                <h2 class="w3-wide"><?php echo $service->service; ?></h2>
                <p class="w3-justify"><?php echo $service->servicedescription; ?></p>
            </div>






                <div class="jumbotron resetTop">

                </div>









            <div class="panel">
                <div class="row">

                    <nav class="navbar navbar-inverse navbar-fixed-bottom">
                        <div class="container-fluid">
                            <div>
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <?php

                                            $stmt = $auth_user->runQuery("SELECT * FROM servicestats WHERE `serviceid` = $service->serviceid  ");
                                            $stmt->execute(array());
                                            $servicestats=$stmt->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($servicestats as $servicestat) {
                                                if($servicestat->serviceid == $service->serviceid){

                                                    if($servicestat->serviceid == true) {
                                                        $num = 1;
                                                        @$count += $num;
                                                    }
                                                }
                                            }
                                        echo ' <li role="presentation" class="active"><a href="#">RECOMMENDATIONS <span class="badge">'. @$count  .'</span></a></li> ';
                                        ?>

                                    </li>
                                </ul>

                                <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <form class="form-horizontal" role="form" method="POST"  action="#form-anchor" id="form-anchor"  action="">
                                    <?php require_once 'includes/formcontroller/reviewcontroller.php'; ?>
                                    <?php require_once 'includes/errors/warning.php'; ?>
                                        <div class="col-sm-12 col-md-2">
                                            <div class="input-group">
                                                    <button type="submit" name = "postreview" class="btn btn-default btn-lg">Recommend</button>
                                                    <input type="hidden" class="form-control" id="inputproductid" name = "serviceid" value = "<?php echo $service->serviceid; ?>" /> 
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>




        <?php

    }

?>
</div>



<?php	
} 
?>

<?php require_once 'includes/widgets/footer/footer.php'; ?>