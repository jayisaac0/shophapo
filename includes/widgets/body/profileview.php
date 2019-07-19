<div class="col-sm-6 col-md-8">
	<div class="thumbnail">
	  	<div class="caption contentscreenhide">
	        <div class="item">
				  <!--<img src = " <?php echo $userRow['profile_image']; ?> " alt = " joshua " style = "width:100%;" />-->
			</div>
	  	</div>

	  	<div class="caption">
	        <div class="item">
				<div class="row">
				    <div class="col-sm-6 col-md-4 thumbnail"  style = "min-height:300px;border:none;" id = "contentsize">
					      	<img src = " <?php echo $userRow['profile_image']; ?> " style = "width:auto; height:auto; padding:0; margin:0;border-radius:300px;" />
					    <div class="caption">
					    	
					    </div>
				    </div>
				    <div class="col-sm-6 col-md-7 thumbnail"  style = "height:;border:none;margin-left:5%;" id = "contentsize">
					    <div class="caption">
					        <p> <img src = "images/icons/name.ico" /> <a href = ""><?php echo $userRow['firstname']; ?> <?php echo $userRow['middlename']; ?> <?php echo $userRow['lastname']; ?></a></p>
					        <p> <img src = "images/icons/message.ico" /> <a href = ""><?php echo $userRow['postaladdress']; ?>-<?php echo $userRow['postalcode']; ?></a></p>
					        <p> <img src = "images/icons/name.ico" /> <a href = ""><?php echo $userRow['city']; ?>, <?php echo $userRow['country']; ?></a></p>
					        <p> <img src = "images/icons/shopname.ico" /> <a href = ""> <?php echo $userRow['shopname']; ?></a></p>
					        <p> <img src = "images/icons/idnumber.ico" /> <a href = ""><?php echo $userRow['idnumber']; ?></a></p>
					        <p> <img src = "images/icons/name.ico" /> <a href = ""><?php echo $userRow['license']; ?></a></p>
					        <!--<p> <img src = "images/icons/name.ico" /> <a href = ""><?php //echo $userRow['onlinebusinessid']; ?></a></p>
					        <p> <img src = "images/icons/facebook.ico" /> <a href = "<?php //echo $userRow['facebook']; ?>">Facebook</a></p>
					        <p> <img src = "images/icons/twitter.ico" /> <a href = "<?php //echo $userRow['twitter']; ?>">Twitter</a></p>
					        <p> <img src = "images/icons/googleplus.ico" /> <a href = "<?php //echo $userRow['googleplus']; ?>">Google plus</a></p>-->
					    </div>
				    </div>
				</div>
			</div>
	  	</div>
	</div>	


	<div class="thumbnail">
	  	<div class="caption">
	  		<center><h4><b>My entrepreneural forum invites</b></h4></center>
	        <div class="item table-responsive"  style = "overflow-y:scroll;height:300px;">

				<table class="table table-bordered" >
					<tr></tr>
					<tr>
						<td><h4><b>Forum</b></h4></td>
						<td><h4><b>Invitee</b></h4></td>
						<td><h4><b>Forumn date</b></h4></td>
						<td><h4><b>Forumn time</b></h4></td>
					</tr>




					    <?php
						    $stmt = $auth_user->runQuery("SELECT * 
													    	FROM 	`foruminvitation`

													    	JOIN 	`users`
													    	ON 		`foruminvitation`.`inviteduserid`=`users`.`user_id`


													    	WHERE 	`foruminvitation`.`inviteduserid`='$user_id'
													    ");
						    $stmt->execute(array());
						    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
						    foreach ($foruminvitation as $foruminvite) {
						    	?>

									

											    <?php
												    $stmt = $auth_user->runQuery("SELECT * FROM forumname WHERE `user_id`='$foruminvite->shopid' ");
												    $stmt->execute(array());
												    $forumname=$stmt->fetchAll(PDO::FETCH_OBJ);
												    foreach ($forumname as $forumname) {
												    	?>
														<tr>
															<td><?php echo $forumname->createForum; ?></td>
															<td><?php echo $foruminvite->forumName_id; ?></td>
															<td><a href = "entrepreneuralForum.php?id=<?php echo $foruminvite->forumName_id; ?>"><button class = "btn btn-success">Participate</button></a></td>
															<td><button class = "btn btn-primary">Unknown</button></td>
														</tr>
										
												    	<?php
												    }
												?>

										
						    	<?php
						    }
						?>


				</table>

			</div>
	  	</div>

	</div>	    
</div>