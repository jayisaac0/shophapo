<?php  require_once 'includes/session/pagesession.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">




<style>
	body,h1 {font-family: "Raleway", sans-serif}
	body, html {height: 100%;clear:both;}
	.bgimg {
	    background-image: url('images/backtheme/forestbridge.jpg');
	    min-height: 100%;
	    background-position: center;
	    background-size: cover;
	}
</style>


<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
		<br />



	<div class = "row resetTop" style = "padding-left:;">
	
		<?php
			$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $user_id  ");
			$stmt->execute(array());

			$users=$stmt->fetchAll(PDO::FETCH_OBJ);
			foreach ($users as $user) {

			echo $user->shopname;

				if ( $user->premium == 0 )  {
						if ( $user->shopname === NULL) {
							?>
								<div class=" w3-padding col-sm-6 col-md-12"  style = "text-align:center;font-family;position:center;margin-top:5%;width:80%;margin-left:10%;border:none;">
									<?php require_once 'includes/widgets/body/widgets/pagesiteaccount.php'; ?>	
								</div>
							<?php
						} else {
							?>
								<div class="reset resetTop" style = "border:none;">
									<center><h1 class="w3-jumbo w3-animate-top"><?php print($userRow['shopname']); ?></h1></center>
									<hr class="w3-border-grey" style="margin:auto;width:40%">
									<p class="w3-large w3-center"><a href = "#"><button type="button" class="btn btn-primary" onclick="document.getElementById('payment').style.display='block'" class="w3-btn w3-hover-light-grey buttonWidth">PROCEED TO SUBSCRIPTION</button></a></p>
								</div>
								<!-- payment Modal -->
									<div id="payment" class="w3-modal" style = "border:none;">
									  <div class="w3-modal-content w3-animate-zoom">
									    <div class="w3-container w3-black">
									      <span onclick="document.getElementById('payment').style.display='none'" class="w3-closebtn w3-hover-text-grey">x</span>
									      <h5><b>SELECT YOUR PREFERED PAYMENT METHOD</b></h5>
									    </div>
									    <div class="w3-container" style = "margin-top:20px;border:none;">

									        <div class="row" style = "border:none;">


									            <div class="col-sm-6 col-md-12" style = "border:none;">
									                <div class="thumbnail"  style = "border:none;">
									                    
									                	<div class="row" style = "border:none;">
															    <div class="col-sm-6 col-md-5"  style = "border:none;">
															        <div class="thumbnail" style = "border:none;">
															            <img src="images/icons/paypal.png" alt="..." />
															        </div>
															    </div>
															    <div class="col-sm-6 col-md-5"  style = "border:none;">
															        <div class="thumbnail" style = "border:none;">
															        	





<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">

    <input type ="hidden" name = "business" value = "jayisaac0-facilitator@gmail.com">
    <input type="hidden" name="lc" value="US">
	<input type="hidden" name="item_name" value="Premium shop Membership">
	<input type="hidden" name="no_note" value="1">
	<input type="hidden" name="no_shipping" value="2">
	<input type="hidden" name="src" value="1">
	<input type="hidden" name="a3" value="5.00">
	<input type="hidden" name="p3" value="1">
	<input type="hidden" name="t3" value="M">
	<input type="hidden" name="currency_code" value="USD">

    <input type = "hidden" name = "custom" value = "<?php echo $_SESSION['user_session']; ?>">

    <input type = "hidden" name = "return" value = "http://127.0.0.1/www.shopup.com/success.php">
    <input type = "hidden" name = "cancel_return" value = "http://127.0.0.1/www.shopup.com/pagesite.php">
    <input type = "hidden" name = "notify_url" value = "http://127.0.0.1/www.shopup.com/success.php">


    <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHosted">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>






															        </div>
															    </div>
															    <div class="col-sm-6 col-md-2"  style = "border:none;">
															        <div class="thumbnail" style = "border:none;">
															            <img src="image/icons/imagesgallery.ico" alt="..." />
															            <div class="caption"">
															            <h6><a href = "">SUBSCRIBE</a></h6>
															            </div>
															        </div>
															    </div>
															</div>

									                </div>
									            </div>
									            <?php
									            $country = "kenya";
									            if ( strtolower($user->country) === $country) {
									            	?>
									    		<div class="col-sm-6 col-md-12" style = "border:none;">
									                <div class="thumbnail" style = "color:green;border:none;">
									                	<div class="alert alert-warning alert-dismissible" role="alert">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<strong><a href = "#">Mpesa! </a></strong> Only available for East Africa.
														</div>

															<div class="row" style = "border:none;">
															    <div class="col-sm-6 col-md-5" style = "border:none;" >
															        <div class="thumbnail" style = "border:none;">
															        <h3><b>LIPA NA MPESA</b></h3>
															            <img src="images/icons/mpesa.jpg" alt="..." />
															            <div class="caption"">
															            </div>
															        </div>
															    </div>
															    <div class="col-sm-6 col-md-5" style = "border:none;" >
															        <div class="thumbnail" style = "border:none;">
															        	<h3><b>PAY BILL NUMBER</b></h3>
															            <div class="caption"">
															            	<a href = "">
																				<table class="table" >
																					<tr class = "" style = "background:#EBE9FF;border:2px solid #FFFFFF;">
																						<td><h4><b>5</b></h4></td>
																						<td><h4><b>5</b></h4></td>
																						<td><h4><b>5</b></h4></td>
																						<td><h4><b>5</b></h4></td>
																						<td><h4><b>5</b></h4></td>
																						<td><h4><b>5</b></h4></td>
																					</tr>
																				</table>
																			</a>
															            </div>
															        </div>
															    </div>
															    <div class="col-sm-6 col-md-2"  style = "border:none;">
															        <div class="thumbnail" style = "border:none;">
															            <img src="image/icons/imagesgallery.ico" alt="..." />
															            <div class="caption"">
															            <h3><a href = ""><b>SUBSCRIBE</b></a></h3>
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

							<?php
						}
					
				} else {
					?>
						<div class="reset resetTop">
							<center><h1 class="w3-jumbo w3-animate-top"><?php print($userRow['shopname']); ?></h1></center>
							<hr class="w3-border-grey" style="margin:auto;width:40%">
							<p class="w3-large w3-center"><a href = "addproduct.php"><button type="button" class="btn btn-primary">ACCESS</button></a></p>
							<p class="w3-large w3-center">
								<button type="button" class="btn ">
									<div class="jumbotron w3-black">
										<h2 class="black">TRIAL PERIOD</h2>
										
										<h1><a class="btn btn-primary btn-lg" href="#" role="button" style="font-size:14px;">
											<?php
												echo "Today is " . date("Y"). ' ' .date("l"). ' ' .date("m"). ' ' .date("d") . "<br>";
												echo "Today is " . date("Y"). ' ' .date("l"). ' ' .date("m + 1"). ' ' .date("d") . "<br>";
											?>
											<p id="timer" style="text-align:center;"></p>
											<script>
												// Set the date we're counting down to
												var countDownDate = new Date("May 28, 2017 15:37:25").getTime();

												// Update the count down every 1 second
												var x = setInterval(function() {

												    // Get todays date and time
												    var now = new Date().getTime();
												    
												    // Find the distance between now an the count down date
												    var distance = countDownDate - now;
												    
												    // Time calculations for days, hours, minutes and seconds
												    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
												    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
												    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
												    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
												    
												    // Output the result in an element with id="timer"
												    document.getElementById("timer").innerHTML = days + "d " + hours + "h "
												    + minutes + "m " + seconds + "s ";
												    
												    // If the count down is over, write some text 
												    if (distance < 0) {
												        clearInterval(x);
												        document.getElementById("timer").innerHTML = "EXPIRED";
												    }
												}, 1000);
											</script>

											</a></h1>
									</div>
								</button>
							</p>
						</div>



					<?php
				}			
			}
		    

		?>
		
	</div>
</div>


<?php require_once 'includes/widgets/footer/footer.php'; ?>


