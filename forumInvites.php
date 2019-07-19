<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">
<?php require_once 'includes/widgets/body/pagesitepanel.php'; ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:50px;">
			
	<?php require_once 'includes/widgets/body/pagesitepanel.php' ?>
	<div class="col-sm-6 col-md-12 " id = "mp" style = "padding:0px;">
		<div class="thumbnail">
			<div class="jumbotron" style = "padding:5px;margin:0px;">


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default" style = "">
					    <div class="panel-heading" role="tab" id="headingOne">
						    <h4 class="panel-title">
						        <a role="button">Forum creation</a>
						    </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						    <div class="panel-body">



									<div class = "row">
										<div class="col-sm-6 col-md-12">
											<div class="alert alert-success alert-dismissible " role="alert">
												<strong> Create a forum </strong>

												<?php require_once 'includes/formcontroller/forumcreation.php'; ?>

												<form class="form-horizontal" role="form" method="POST" id="galleryid" enctype="multipart/form-data">
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

													<div class="form-group">
												        <div class="col-sm-12">
													    	<input type="createForum" name="createForum" class="form-control" id="createForum" placeholder="Create forum" />
													    </div>
												    </div>

													<div class="form-group">
													    <div class="col-sm-offset-0 col-sm-10">
													      <button type="submit" name = "createForumpost" class="btn btn-default">Create Forum</button>
													    </div>
													</div>
												</form>

											</div>
										</div>
									</div>

									<div class = "row">


										<div class="col-sm-6 col-md-12">
											<div class="alert alert-success alert-dismissible " role="alert" style = "min-height:400px;">
												
												<?php
												    $stmt = $auth_user->runQuery("SELECT * FROM forumName WHERE user_id= $user_id ORDER BY dateCreated DESC LIMIT 1 ");
												    $stmt->execute(array());
												    $forumName=$stmt->fetchAll(PDO::FETCH_OBJ);
												    foreach ($forumName as $shopForumName) {
												    	?>
															<strong><?php  echo strtoupper($shopForumName->createForum); ?></strong>
												    	<?php
												    }
												?>
												<?php $myid=$userRow['user_id']; ?>


												<div class="form-horizontal" role="form" method="POST" action="" id = "search" name = "search">
												    <div class="form-group ">
												        <div class="col-sm-12">
												            <h4>SELECT FROM YOUR CYCLE WHO TO INVITE FOR A FORUM</h4>
												        </div>
												    </div>
												</div>

												<div class="col-sm-12 col-md-6">
												<div class="col-sm-12 col-md-12 table-responsive"   id="results" style = "height:300px;overflow-y:scroll;max-height:3000px;background:#CDCBCC;">





												<?php

												    $stmt = $auth_user->runQuery("
												    		SELECT *

															FROM	`users`
															JOIN	`businesscycle`
															ON		`users`.`user_id`=`businesscycle`.`id`
															WHERE   `businesscycle`.`user_id` = '$user_id'

												    	");
												    $stmt->execute(array());
												    
												    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

												    foreach ($users as $user ) {
												        ?>

									                    <table class="table table-stripped" style="width:420px;">
									                        <tr>
									                            <td><img src="<?php echo $user->profile_image; ?>" alt="..." style = "height:100px;width:100px;border-radius:;border:5px solid #DDFFC8;" class = "myHover" /></td>
									                            <td style="text-align:center;">
									                                <?php echo $user->user_name . ' <br /> ' ; ?>
									                                <?php echo $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname . ' <br /> ' ; ?>
									                                <?php echo $user->shopname . ' <br /> ' ; ?>
									                                <?php echo $user->postaladdress . '-' . $user->postalcode . ' <br /> ' ; ?>
									                                <?php echo $user->city . ', ' . $user->country; ?>
									                            </td>
									                            <td>

									                            


																<?php
																    $stmt = $auth_user->runQuery("SELECT * FROM foruminvitation WHERE inviteduserid = $user->id ");
																    $stmt->execute(array());
																    
																    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);

																    foreach ($foruminvitation as $foruminvitations) {
																    	if ( $foruminvitations->inviteduserid == $user->id ){
																    		//echo $foruminvitations->inviteduserid .' found';
																    	}else {
																    		//echo $foruminvitations->inviteduserid .' not found';
																    	}
																	}

																?>



															    <?php
																    $stmt = $auth_user->runQuery("SELECT * FROM forumName WHERE user_id= $user_id ORDER BY dateCreated DESC LIMIT 1 ");
																    $stmt->execute(array());
																    $forumName=$stmt->fetchAll(PDO::FETCH_OBJ);
																    foreach ($forumName as $shopForumName) {
																    	?>

																		<?php require_once 'includes/formcontroller/inviteformcontroller.php'; ?>
																		<form class="form-horizontal" role="form" method="POST" >
																	        <div class="form-group"><input type="hidden" name="forumName_id" value = "<?php echo $shopForumName->forumName_id; ?>" style="width:50px;" /></div>
																	        <div class="form-group"><input type="hidden" name="shopid" value = "<?php echo $user->user_id; ?>" style="width:50px;" /></div>
																	        <div class="form-group"><input type="hidden" name="inviteduserid" value = "<?php echo $user->id; ?>" style="width:50px;" /></div>


																	        <button type="submit" name="foruminvitationbutton" class = "btn btn-primary">Send invite</button> <br />

																	        
																	    </form>
																    	<?php
																    }
																?>







									                            </td>
									                        </tr>
									                    </table>

												        <?php

												    }

												?>







												</div>
												</div>









												<div class="table-responsive" style = "height:300px;">
													<table class="table table-stripped" >

													    <?php
														    $stmt = $auth_user->runQuery("SELECT * 

																					    	FROM 	`foruminvitation`
																					    	JOIN 	`users`
																					    	ON 		`foruminvitation`.`inviteduserid`=`users`.`user_id`
																					    	WHERE 	`foruminvitation`.`forumName_id`='$shopForumName->forumName_id' 
																					    	ORDER BY `dateinvited` DESC


																					    ");
														    $stmt->execute(array());
														    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
														    foreach ($foruminvitation as $foruminvite) {
														    	?>
																	<tr>
																		<td><img src="<?php echo $foruminvite->profile_image; ?>" alt="<?php echo $foruminvite->firstname; ?>" style="width:25px;" /></td>
																		<td><?php echo $foruminvite->inviteduserid. ' '; ?><?php echo $foruminvite->firstname. ' '; ?><?php echo $foruminvite->middlename. ' '; ?><?php echo $foruminvite->lastname. ' '; ?></td>
																		<td><button class = "btn btn-primary">1 Uninvite</button></td>
																	</tr>
																
														    	<?php
														    }
														?>

														
												
													</table>
												</div>
											</div>
										</div>







										<?php
										    $stmt = $auth_user->runQuery("SELECT * FROM forumName WHERE user_id= $user_id ORDER BY dateCreated DESC ");
										    $stmt->execute(array());
										    $forumName=$stmt->fetchAll(PDO::FETCH_OBJ);
										    foreach ($forumName as $shopForumName) {
										    	?>
												<div class="col-sm-6 col-md-6">
													<div class="alert alert-success alert-dismissible " role="alert">
														<strong><?php  echo strtoupper($shopForumName->createForum); ?></strong>
														<?php //echo  ' forum: '. $shopForumName->forumName_id; ?>
														<div class="table-responsive" style = "max-height:300px;">
															<table class="table table-stripped" >
															    <?php
																    $stmt = $auth_user->runQuery("SELECT * 

																							    	FROM 	`foruminvitation`
																							    	JOIN 	`users`
																							    	ON 		`foruminvitation`.`inviteduserid`=`users`.`user_id`
																							    	WHERE 	`foruminvitation`.`forumName_id`='$shopForumName->forumName_id' 
																							    	ORDER BY `dateinvited` DESC


																							    ");
																    $stmt->execute(array());
																    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
																    foreach ($foruminvitation as $foruminvite) {
																    	?>
																			<tr>
																				<td><img src="<?php echo $foruminvite->profile_image; ?>" alt="<?php echo $foruminvite->firstname; ?>" style="width:25px;" /></td>
																				<td><?php echo $foruminvite->inviteduserid. ' '; ?><?php echo $foruminvite->firstname. ' '; ?><?php echo $foruminvite->middlename. ' '; ?><?php echo $foruminvite->lastname. ' '; ?></td>
																				<td><button class = "btn btn-primary">1 Uninvite</button></td>
																			</tr>
																		
																    	<?php
																    }
																?>

																
															</table>
														</div>
													</div>
												</div>

										    	<?php
										    }
										?>


									</div>

						    </div>
					    </div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/widgets/footer/footer.php'; ?>
