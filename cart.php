<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>


<?php
$page = 'cart.php';

if(isset($_GET['add'])) {
	@$_SESSION['cart_'.$_GET['add']];

	$quantity = ($stmt = $auth_user->runQuery('SELECT `productquantity`, `productid` FROM products WHERE productid = '.$_GET['add'] ));
	$stmt->execute(array());
	$productRow=$stmt->fetch(PDO::FETCH_ASSOC);
	if ($productRow['productquantity'] != @$_SESSION['cart_'.$_GET['add']] ) {

		@$_SESSION['cart_'.$_GET['add']] ++;	
		header('Location:cart.php');
	}

} 


if (isset($_GET['delete'])) {
$_SESSION['cart_'.(int)$_GET['delete']] = '0';
	header('Location:cart.php');
}


if (isset($_GET['remove'])) {
$_SESSION['cart_'.(int)$_GET['remove']] --;
	header('Location:cart.php');
}
?>




<div class="row resetTop">
	<div class="col-sm-12 col-md-12">
		<div class="thumbnail col-sm-12 col-md-12"  style = "margin:2px;padding:5px;">

			<div class=" panel-collapse col-sm-12 col-md-12" role="tabpanel" style = ";margin:;padding:10px;overflow-x:scroll;">
				<table class="table" style = "min-width:600px;">
					<?php
						foreach( $_SESSION as $name => $value ){
							//echo $name. ' has value '. $value . '<br />' ;
							if ($value > 0) {
								if (substr($name, 0, 5) == 'cart_') {
									//echo $name. '<br />';
									$id = substr($name, 5, (strlen($name) -5));
									//echo $id. '<br />';

									    $stmt = $auth_user->runQuery("SELECT * 
															    	FROM `products` 
															    	JOIN `users`
															    	ON 	 `products`.`user_id`=`users`.`user_id`
															    	WHERE `productid` = '$id' ");
									    $stmt->execute(array());
									    
									    $products=$stmt->fetchAll(PDO::FETCH_OBJ);


									    foreach ($products as $product) {
								    	@$total = $product->productprice * $value;
								    	@$num = 1;
								    	@$totalcost += $total;
								    	@$count += $num;
								        ?>						
								        	
										<?php 
											echo '<tr class = "myHover" style = "background:#EBE9FF;border:2px solid #FFFFFF;">';
											echo '<td>' . $product->user_name . '</td>'; 
											echo '<td>' . $product->user_id . '</td>'; 
											echo '<td>' . $product->productname . '</td>'; 
											echo '<td>' . 'Qty <input type = "input" name = "value" value = "'. $value.'" style = "width:50px;"/>' . '</td>';
											echo '<td>' . ' <a href = "cart.php?add='.$id.' "><img src = "images/icons/add.ico" /></a> ' . '</td>';
											echo '<td>' . ' <a href = "cart.php?remove='.$id.' "><img src = "images/icons/remove.ico" /></a> ' . '</td>';
											echo '<td>' . ' @ ' . '</td>';
											echo '<td>' . number_format($product->productprice, 2) . '</td>';
											echo '<td>' . ' = ' . '</td>';
											echo '<td>' . number_format($total, 2) . '</td>';
											echo '<td>' . ' <a href = "cart.php?delete='.$id.'">delete</a> ' . '</td>';
											echo '</tr>';
										?>
											
								        <?php

								    }

								}
								
							}

						}
						
					?>

				</table>
				<div style = "padding-bottom:20px;">
				<button type="button" class="btn btn-primary btn-lg  col-sm-12 col-md-12"  style = ""> $ <?php echo number_format(@$totalcost, 2);  ?></button><br />
				</div>
			</div>


			<div class=" panel-collapse col-sm-12 col-md-12" role="tabpanel" style = "margin:;padding:10px;">

				<?php
					if (@$totalcost != 0) {
					?>
					<a href="shop.php?id=<?php echo $product->user_id; ?>" >
						<div class="w3-btn w3-padding-large w3-blue w3-animate-zoom w3-center btn btn-lg btn-primary">
							Back to <?php echo $product->shopname; ?>
						</div>
					</a>

					<div class="alert alert-warning alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong><a href = "#"></a> <a href = "#">HINT! </a></strong> Check out or order from one shop at a time.
						
					</div>
					<?php
					}else {
						?>
						<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h1><b><center><strong><a href = "#"></a> <a href = "#">!!! </a></strong>EMPTY ORDER CART</center></b></h1>
						</div>
					<?php
					}
				?>
			</div>
		</div>
	</div>
</div>



<div class="row ">
	<div class="col-sm-12 col-md-12">
		<div class="thumbnail col-sm-12 col-md-12" style = "margin:2px;padding:5px;">
			<div class=" panel-collapse col-sm-12 col-md-12" role="tabpanel" style = "margin:;padding:5px;overflow-x:scroll;">
				<?php require_once 'includes/formcontroller/productsorderformcontroller.php'; ?>
				<?php require_once 'includes/formcontroller/siteproductsorderformcontroller.php'; ?>

				






		<form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
					<?php
				        if(isset($error))
				        {
				            foreach($error as $error)
				            {
				                 ?>
				                 <div class="alert alert-danger" style = "padding:1px;margin:1px;">
				                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
				                 </div>
				                 <?php
				            }
				        }
				    ?>


				<input type="hidden" class="form-control" id="inputid" name = "id" value = "<?php echo $product->user_id; ?>" placeholder="Myemail" />
				<input type="hidden" class="form-control" id="inputuser_id" name = "user_id" value = "<?php echo $userRow['user_id']; ?>" placeholder="Myemail" />
				<input type="hidden" class="form-control" id="inputmyemail" name = "myemail" value = "<?php echo $userRow['user_email']; ?>" placeholder="Myemail" />
				<input type="hidden" class="form-control" id="inputtomail" value = "<?php echo $product->user_email; ?>" name = "tomail" />


				<table class="table  table-bordered table-hover">
					<tr class = "myHover" style = "background:#EBE9FF;border:2px solid #FFFFFF;">
						<td><b>Shop name:</b></td>
						<td><b>Product name:</b></td>
						<td><b>Qty:</b></td>
						<td><b>Price:</b></td>
						<td><b>Total:</b></td>
						<td><b>Contact:</b></td>
					</tr>				

			
				<?php
					foreach( $_SESSION as $name => $value ){
						//echo $name. ' has value '. $value . '<br />' ;
						if ($value > 0) {
							if (substr($name, 0, 5) == 'cart_') {
								//echo $name. '<br />';
								$id = substr($name, 5, (strlen($name) -5));
								//echo $id. '<br />';

								    $stmt = $auth_user->runQuery("SELECT * 
														    	FROM `products` 
														    	JOIN `users`
														    	ON 	 `products`.`user_id`=`users`.`user_id`
														    	WHERE `productid` = '$id' ");
								    $stmt->execute(array());
								    
								    $products=$stmt->fetchAll(PDO::FETCH_OBJ);


								    foreach ($products as $product) {
							    	@$total = $product->productprice * $value;
							    	@$totalcosts += $total;
							       
					$orderform = '<tr class = "myHover" style = "background:#EBE9FF;border:2px solid #FFFFFF;">'.
									'<td>'.$product->shopname.'</td>'.
									'<td>'.$product->productname.'</td>'.
									'<td>'.(int)$value.'</td>'.
									'<td>'.trim(number_format($product->productprice, 2)).'</td>'.
									'<td>'.trim(number_format($total, 2)).'</td>'.
									'<td>'.$product->postaladdress.'-'.$product->postalcode.', <br />'.$product->city.', '.$product->country.' '.'</td>'.
								'</tr>';
						
								print_r($orderform);
				?>

							        <?php

							    }

							}
							
						}

					}
					
				?>
				</table>
				<div style = "padding-bottom:20px;">
				<button type="button" class="btn btn-primary btn-lg  col-sm-12 col-md-12"  style = "margin:0px 5px 20px 5px;"> $ <?php echo number_format(@$totalcost, 2);  ?></button><br />
				</div>

			<div class="form-group">
			    <div class="col-sm-12">
			      <textarea type="hidden" class="form-control" id="inputsmessage" name = "message" placeholder="Send message" style = "height:0px;width:0px;resize:none;">
<table class="table  table-bordered table-hover">
<tr class = "myHover" style = "background:#EBE9FF;border:2px solid #FFFFFF;">
<td><b>Shop name:</b></td>
<td><b>Product name:</b></td>
<td><b>Qty:</b></td>
<td><b>Price:</b></td>
<td><b>Total:</b></td>
<td><b>Contact:</b></td>
</tr>				
<?php
	foreach( $_SESSION as $name => $value ){
		//echo $name. ' has value '. $value . '<br />' ;
		if ($value > 0) {
			if (substr($name, 0, 5) == 'cart_') {
				//echo $name. '<br />';
				$id = substr($name, 5, (strlen($name) -5));
				//echo $id. '<br />';

				    $stmt = $auth_user->runQuery("SELECT * 
										    	FROM `products` 
										    	JOIN `users`
										    	ON 	 `products`.`user_id`=`users`.`user_id`
										    	WHERE `productid` = '$id' ");
				    $stmt->execute(array());
				    
				    $products=$stmt->fetchAll(PDO::FETCH_OBJ);


				    foreach ($products as $product) {
			    	@$total = $product->productprice * $value;
			    	@$totalcosts += $total;
$orderform = '<tr class = "myHover" style = "background:#EBE9FF;border:2px solid #FFFFFF;">'.
'<td>'.$product->shopname.'</td>'.
'<td>'.$product->productname.'</td>'.
'<td>'.(int)$value.'</td>'.
'<td>'.trim(number_format($product->productprice, 2)).'</td>'.
'<td>'.trim(number_format($total, 2)).'</td>'.
'<td>'.$product->postaladdress.'-'.$product->postalcode.',<br />'.$product->city.', '.$product->country.' '.'</td>'.
'</tr>';
				print_r($orderform);
?>
			        <?php
			    }
			}
		}
	}
?>

</table>
<div style = "padding-bottom:20px;">
<button type="button" class="btn btn-primary btn-lg  col-sm-12 col-md-12"  style = ""> $ <?php echo number_format(@$totalcost, 2);  ?></button><br />
</div>
			      </textarea>
			    </div>
			</div>

			<input type="submit" id = "button" class="btn btn-primary btn-lg  col-sm-0 col-md-2" name = "ordermail" class="btn btn-default" value = "Mail order" />
			<input type="submit" id = "order" class="btn btn-primary btn-lg  col-sm-0 col-md-2" name = "order" class="btn btn-default" value = "Place order" />
		</form>

			</div>
		</div>
	</div>
</div>


<?php require_once 'includes/widgets/footer/footer.php'; 

