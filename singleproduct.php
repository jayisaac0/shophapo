<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">
<?php require_once 'includes/widgets/body/pagesitepanel.php' ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:50px;">
			
	<?php require_once 'includes/widgets/body/pagesitepanel.php'; ?>
	<div class="col-sm-6 col-md-12 " id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



				<div class="panel panel-default" >
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
					        <a class="collapsed" role="button" aria-expanded="false" aria-controls="collapseTwo">
					          	<b>Product orders</b>
					        </a>
					    </h4>
					</div>
					<div class="panel-collapse  table-responsive" role="tabpanel"  style = "overflow-x:scroll;">

						<table class="table table-bordered table-hover"  >
							<tr>
								<td><b>Product ID</b></td>
								<td><b>Username</b></td>
								<td><b>Name</b></td>
								<td><b>Product name</b></td>
								<td><b>Product category</b></td>
								<td><b>Product manufacturer</b></td>
								<td><b>Price</b></td>
								<td><b>Quantity</b></td>
								<td><b>Total</b></td>
								<td><b>Address</b></td>
								<td><b>City</b></td>
								<td><b>Country</b></td>
								<td><b>Order date</b></td>
							</tr>

							<?php
							    $stmt = $auth_user->runQuery("
							    	SELECT * 

							    	FROM `orderproduct` 

							    	JOIN `users`
							    	ON   `orderproduct`.`user_id`=`users`.`user_id`

							    	WHERE `sellerid`='$user_id'
							    	ORDER BY ordertime DESC

							    	
							    	");
							    $stmt->execute(array());
							    
							    $orderproduct=$stmt->fetchAll(PDO::FETCH_OBJ);
							    $products=$stmt->fetchAll(PDO::FETCH_OBJ);

							    foreach ($orderproduct as $orderproduct) {
							    	(int)$orders = 1; 
							    	@$sum += $orders;
							    	?>
										<tr>
											<td>#<?php  echo $orderproduct->id; ?></td>
											<td><?php  echo $orderproduct->user_name; ?> </td>
											<td><?php  echo $orderproduct->firstname; ?> <?php  echo $orderproduct->middlename; ?> <?php  echo $orderproduct->lastname; ?></td>
											<td><b> <?php  echo $orderproduct->productname; ?> </b></td>
											<td> <?php  echo $orderproduct->Productcategory; ?> </td>
											<td> <?php  echo $orderproduct->productmanufacturer; ?> </td>
											<td> <?php  echo $orderproduct->productprice; ?> </td>
											<td> <?php  echo $orderproduct->productquantity; ?> </td>
											<td><?php  echo $orderproduct->totalcost; ?></td>
											<td><?php  echo $orderproduct->postaladdress; ?>-<?php  echo $orderproduct->postalcode; ?></td>
											<td><?php  echo $orderproduct->city; ?></td>
											<td><?php  echo $orderproduct->country; ?></td>
											<td><?php  echo $orderproduct->ordertime; ?></td>
										</tr>
							        <?php

							    }

							?>

						</table>

					</div>
				</div>




			</div>
		</div>

	</div>
	
</div>
<?php require_once 'includes/widgets/footer/footer.php'; ?>


