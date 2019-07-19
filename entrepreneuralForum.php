<?php  require_once 'includes/session/pagesession.php'; ?>

<!--php code goes here-->
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>


<?php
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
?>

<?php
	if ($id == $user_id) {
		header("Location: home.php");
	}
?>
<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">




	<!-- First Parallax Image with Logo Text -->
<div class="row resetTop" id="home">	

		<div class="thumbnail col-sm-6 col-md-2">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<center>Invited members</center>
						</a>
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body" style = "overflow-x: scroll;">
							

					    <?php
						    $stmt = $auth_user->runQuery("SELECT * 
													    	FROM 	`foruminvitation`

													    	JOIN 	`users`
													    	ON 		`foruminvitation`.`inviteduserid`=`users`.`user_id`

													    	WHERE 	`foruminvitation`.`forumName_id`='$id'
													    ");
						    $stmt->execute(array());
						    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
						    foreach ($foruminvitation as $foruminvite) {
						    	?>

									<div class="media-left col-sm-6 col-md-6">
										<a href="#">
											<img class="media-object " src=" <?php echo $foruminvite->profile_image; ?> " alt="..." style = "width:100%;height:70px;" >
										</a>
										<h5 class="success"><b style = "font-size:12px;color:green;"><?php echo substr($foruminvite->shopname, 0, 10); ?> </b></h5>
									</div>

	
						    	<?php
						    }
						?>


						</div>
					</div>
				</div>
			</div>
		</div>

		<div class=" col-sm-6 col-md-10">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					
					<div id="" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style = "background:#000000;padding:0px;margin:0px;">
						<div class="panel-body" style = "padding:0px;margin:0px;">


								<link rel="stylesheet" type="text/css" href="engine1/style.css" />
								<script type="text/javascript" src="engine1/jquery.js"></script>


								<div id="wowslider-container1">
									<div class="ws_images">
										<ul>
					    <?php
					    //Link foruminvitation table and user table 
						    $stmt = $auth_user->runQuery("SELECT * 
													    	FROM 	`foruminvitation`

													    	JOIN 	`users`
													    	ON 		`foruminvitation`.`inviteduserid`=`users`.`user_id`


													    	WHERE 	`foruminvitation`.`forumName_id`='$id'
													    ");
						    $stmt->execute(array());
						    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
						    foreach ($foruminvitation as $foruminvite) {
						    	?>
								<li><img src="<?php echo $foruminvite->profile_image; ?>" alt="<?php echo $foruminvite->firstname.' '; ?><?php echo $foruminvite->middlename.' '; ?><?php echo $foruminvite->lastname; ?>" title="<?php echo $foruminvite->firstname.' '; ?><?php echo $foruminvite->middlename. ' '; ?><?php echo $foruminvite->lastname; ?>" id="wows1_0"/></li>
						    	<?php
						    }
						?>


					    <?php
					    //Link foruminvitation table and user table 
						    $stmt = $auth_user->runQuery("SELECT * 
													    	FROM 	`forumname`

													    	JOIN 	`users`
													    	ON 		`forumname`.`user_id`=`users`.`user_id`


													    	WHERE 	`forumname`.`forumName_id`='$id'
													    ");
						    $stmt->execute(array());
						    $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
						    foreach ($foruminvitation as $foruminvite) {
						    	?>
										</ul>
									</div>
								</div>	
								<script type="text/javascript" src="engine1/wowslider.js"></script>
								<script type="text/javascript" src="engine1/script.js"></script>

						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<b>Reply</b>
						</a>
						</h4>
					</div>
					<div id="" class="panel-collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							

							<div class="col-sm-6 col-md-6">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											
											<div id="" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
												<div class="panel-body">
													sdjk llhsd k
												</div>
											</div>

										</div>
									</div>
							</div>

							<div class="col-sm-6 col-md-6">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div id="" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style = "max-height:270px;overflow-y:scroll;">
												<div class="panel-body">


													<div id = "previw"></div>
													<script type="text/javascript">
													//Automaticaly load forum chats
														$(document).ready(function() {
															setInterval(function(){
																$('#previw').load('includes/forum/retrive.php')
															}, 1000);
														});

													</script>

												</div>
											</div>
											<b><a onclick="document.getElementById('payment').style.display='block'" class="w3-btn w3-hover-light-grey buttonWidth" style = "padding-left: 5px;color:#B06001;">View full forum...</a></b>
										</div>
									</div>
							</div>













<div id="payment" class="w3-modal" style = "border:none;z-index: 500 !important;">
	<div class="w3-modal-content w3-animate-zoom"  style = ";margin-top:-50px;">
		<div class="w3-container w3-black">



								<center><h5><b><?php echo strtoupper($foruminvite->createForum); ?></b></h5></center>



			
		</div>
			<div class="w3-container" style = "margin-top:20px;border:none;">

			        <div class="row" style = "border:none;">


							<div class="col-sm-6 col-md-12">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-default">
											<div id="" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne" style = "max-height:500px;overflow-y:scroll;">
												<div class="panel-body">
													
												

													<div id = "show"></div>
													<script type="text/javascript">
													//automaticaly load forum chats
														$(document).ready(function() {
															setInterval(function(){
																$('#show').load('includes/forum/retrive.php')
															}, 1000);
														});

													</script>

												
												</div>
											</div>

											<?php require_once /*chat form*/'includes/forum/forumChat.php'; ?>
											
										</div>
									</div>
							</div>


			        </div>
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




<?php	
} 
?>



<?php require_once 'includes/widgets/footer/footer.php'; 