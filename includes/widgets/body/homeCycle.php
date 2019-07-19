<div class="col-sm-6 col-md-2 mscreenhide">
	<div class="alert alert-dismissible" role="alert" style="padding:0px;margin:0px;box-shadow:0px 4px 4px 4px  grey;">
		<center><img src = "images/logo.png" alt = "logo" style = "max-width:70%;" /></center>
		<strong><p style = "text-align:center;">My business cycle </p></strong>
	</div>

 	<style>.affix {top: 45px;}</style>
 
    <div class="thumbnail nav nav-pills nav-stacked " data-spy="affix" data-offset-top="205" style = "box-shadow:0px 4px 4px 4px  grey;">
		<div class="caption" >

			<?php

			    $stmt = $auth_user->runQuery("
			    		SELECT `users`.`user_id`,
								`users`.`profile_image`,
								`users`.`user_name`,
								`users`.`shopname`,
								`businesscycle`.`id`

						FROM	`users`
						JOIN	`businesscycle`
						ON		`users`.`user_id`=`businesscycle`.`id`
						WHERE   `businesscycle`.`user_id` = '$user_id' LIMIT 1

			    	");
			    $stmt->execute(array());
			    
			    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

			    foreach ($users as $user ) {
			        ?>

					    <a href = " shop.php?id=<?php echo $user->user_id; ?>" style = "text-decoration:none;">
						    <p style="background:#000000;">
							  	<img src = " <?php  echo $user->profile_image; ?>" style = "width:40px;height:40px;border-radius:45px;"/>
							  	<b style="font-size:13px;"><?php echo $user->shopname; 
							  	?>
							  	</b>
							</p>
						</a>
			        <?php

			    }

			?>
		</div>


		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<b><center>My full cycle</center></b>
						</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<?php

							    $stmt = $auth_user->runQuery("
							    		SELECT `users`.`user_id`,
												`users`.`profile_image`,
												`users`.`user_name`,
												`users`.`shopname`,
												`businesscycle`.`id`

										FROM	`users`
										JOIN	`businesscycle`
										ON		`users`.`user_id`=`businesscycle`.`id`
										WHERE   `businesscycle`.`user_id` = '$user_id'

							    	");
							    $stmt->execute(array());
							    
							    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

							    foreach ($users as $user ) {
							        ?>

									    <a href = " shop.php?id=<?php echo $user->user_id; ?>" style = "text-decoration:none;">
										    <p style="background:#000000;padding:2px;margin:0px;box-shadow:0px 4px 4px 4px  grey;">
											  	<img src = " <?php  echo $user->profile_image; ?>" style = "width:40px;height:45px;border-radius:45px;"/>
											  	<b style="font-size:13px;"><?php echo $user->shopname; 
											  	?>
											  	</b>
											</p>
										</a>
							        <?php

							    }

							?>
				</div>
			</div>
		</div>





    </div>
</div>

