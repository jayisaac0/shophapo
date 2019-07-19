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
					<div class="panel-collapse " role="tabpanel" style = "overflow-x:scroll;">
						<table class="table table-bordered table-hover">
							<tr>
								<td><b>Email</b></td>
								<td><b>Username</b></td>
								<td><b>City</b></td>
								<td><b>Country</b></td>
							</tr>

							<?php
							    $stmt = $auth_user->runQuery("
							        SELECT `users`.`user_id`,
							            `users`.`user_email`,
							            `users`.`user_name`,
							            `users`.`city`,
							            `users`.`country`,

							            `businesscycle`.`user_id`,
							            `businesscycle`.`id`




							        FROM    `users`

							        JOIN    `businesscycle`
							        ON      `users`.`user_id`=`businesscycle`.`user_id`

							        WHERE   `businesscycle`.`id` = '$user_id' 
							        ");
							    $stmt->execute(array());
							    
							    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

							    foreach ($users as $user) {
								(int)$colors = 1; 
								@$c_u += $colors;
							        ?>
										<tr>
											<td><?php  echo $user->user_email; ?></td>
											<td><?php  echo $user->user_name; ?></td>
											<td><?php  echo $user->city; ?></td>
											<td><?php  echo $user->country; ?></td>
										</tr>
								
							        <?php

							    }

							?>

						</table>
					</div>
				</div>
				<div class="panel panel-default" >
					<div class="panel-collapse " role="tabpanel" >
						<table class="table table-bordered ">
							<tr>
								<td>
									<div class="col-sm-6 col-md-3">
										<div class="thumbnail">
											<div class="caption">
												<h4>Number of customers</h4>
												<h3><?php echo @$c_u; ?></h3>
											</div>
										</div>
									</div>
								</td>
							</tr>

						</table>
					</div>
				</div>

				<div class="panel panel-default" >
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
					        <a class="collapsed" role="button" aria-expanded="false" aria-controls="collapseTwo">
					          	<b>Product orders</b>
					        </a>
					    </h4>
					</div>

				<div class="panel panel-default" >
					<div class="panel-collapse " role="tabpanel" >
						<table class="table table-bordered ">
							<tr>
								<td>
									<div class="col-sm-6 col-md-3">
										<div class="thumbnail">
											<div class="caption">
												<h4>Number of orders</h4>
												<h3><p>  </p></h3>
											</div>
										</div>
									</div>
								</td>
							</tr>

						</table>
					</div>
				</div>


				<div class="panel panel-default"   style = "background:#FF5845;">
					
					<div class="panel-collapse " role="tabpanel">
						<h1 style = "text-align:center;color:red;background:#FF5845;">Customer newsletter</h1>
					</div>

				</div>

				<div class="panel panel-default" >
				    <div class="panel-heading" role="tab" id="headingOne">
					    <h4 class="panel-title">
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					        	<b>Product newsletter</b>
					        </a>
					    </h4>
				    </div>
				    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					    <div class="panel-body" style = "overflow-x:scroll;">

								

					    </div>
				    </div>
				</div>

			</div>
		</div>

	</div>
	
</div>
<?php require_once 'includes/widgets/footer/footer.php'; ?>


