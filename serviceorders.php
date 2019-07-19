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
					          	<b>My customers</b>
					        </a>
					    </h4>
					</div>
					<div class="panel-collapse  table-responsive" role="tabpanel" style = "overflow-x:scroll;">
						<table class="table table-bordered table-hover">
							<tr>
								<td><b>Service</b></td>
								<td><b>Time ordered</b></td>
								<td><b>City</b></td>
								<td><b>Country</b></td>

								<td><b>serviceid</b></td>
								<td><b>customername</b></td>
								<td><b>image</b></td>
								<td><b>image</b></td>
							</tr>

							<?php
							    $stmt = $auth_user->runQuery("
							        SELECT * 

							        FROM `serviceorder`

							        JOIN `users` 
							        ON `serviceorder`.`shopid`=`users`.`user_id`

							        WHERE `serviceorder`.`shopid`='$user_id'

							        ");
							    $stmt->execute(array());
							    
							    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

							    foreach ($users as $user) {
								(int)$colors = 1; 
								@$num += $colors;
							        ?>
										<tr>
											<td style="color:#000000;font-size:15px;"><b><?php  echo $user->servicename; ?></b></td>
											<td><?php  echo $user->timeordered; ?></td>
											<td><?php  echo $user->city; ?></td>
											<td><?php  echo $user->country; ?></td>

											<td><?php  echo $user->specificserviceid; ?>-<?php echo $user->serviceorder_id; ?></td>
											<td><?php  echo $user->customername; ?></td>
											<td style="padding:0px;margin:0px;"><img src="<?php  echo $user->service_image; ?>" style="width:50px;height:37px;padding:0px;margin:0px;" /></td>
											<td style="padding:0px;margin:0px;">
										<?php
										if($user->ordered == 0){
										?>
											<button type="submit" name="serviceorderasap" class="btn-group btn-primary btn-group-xs w3-btn w3-padding-8 w3-blue" style="width:100%;height:100%;padding:0px;margin:0px;">Order</button>
										<?php
										}elseif($user->ordered == 1){
										?>
											<button class="btn-group btn-primary btn-group-xs w3-btn w3-padding-8 w3-green" style="width:100%;height:100%;padding:0px;margin:0px;">Done</button>
										<?php
										}
										?>


											</td>
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


