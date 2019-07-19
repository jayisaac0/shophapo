<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>
<?php
	if(isset($_GET['productid'])) {
	$productid = $_GET['productid'];

$page = 'myproducts.php';	
?>





<div class="row resetTop">
	<?php

	    $stmt = $auth_user->runQuery("SELECT * FROM products WHERE productid = $productid ");
	    $stmt->execute(array());
	    
	    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

	    foreach ($products as $product) {

	        ?>
				<div class="jumbotron" style = "padding:10px;">

					<div class="container slidr" id = "div1"  style = "position:center;">
						<center><img src="<?php  echo $product->product_image; ?>" alt="joshua" style = "width:50%;max-height:auto;" class = "myHover" /></center>
					</div>
				</div>

					<form class="form-horizontal" role="form" method="POST" >

							<?php
							    if(isset($_POST['removeproduct']))
							    {
						            try
						            {
						                if($auth_user->deleteproduct($productid)) 
						                {
						                	unlink($product->product_image);
						                    ?>
						                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
						                            <?php echo 'Deleted!';
													echo '<script type="text/javascript">
														window.location = "myproducts.php"
													</script>';
						                             ?>
						                        </div>

											
						                    <?php
						                    
						                } 
						            }catch(PDOException $e)
					                {
					                    echo $e->getMessage();
					                }
							    }
							    

							?>
							
						<div class="caption ">
							<p style = "text-align:center;"><button class=" btn btn-primary" name = "removeproduct" >Confirm delete</button></p>
						</div>
					</form>

				</div>

	        <?php

	    }

	?>
</div>







<?php
}
?>
