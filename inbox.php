<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">

<div class="w3-overlay w3-hide-large " onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:;margin-top:50px;">

    <nav class="w3-sidenav w3-collapse w3-white w3-card-2" style="z-index:10;width:300px;" id="mySidenav">
    	<p href="javascript:void(0)" > <a href = "myproducts.php"><img src = "images/icons/back.ico" alt = "back" /></a></p>
        <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
        class="w3-hide-large w3-closenav w3-large">Close <i class="fa fa-remove"></i></a>
        
    	<div class="w3-accordion">
    		<a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)"><i class="fa fa-inbox w3-padding-right"></i>orders <i class="w3-padding-left fa fa-caret-down"></i></a>
    		<div id="Demo1" class="w3-accordion-content ">


    			<?php

    			    $stmt = $auth_user->runQuery("SELECT * 
    									    	FROM `chat` 

    									    	JOIN 	`users`
    									    	ON 		`chat`.`user_id`=`users`.`user_id`

    									    	WHERE  `chat`.`id`= '$user_id' 
                                                GROUP BY `user_name`
    									    	ORDER BY `chat`.`timeposted` DESC ");
    			    $stmt->execute(array());
    			    
    			    $chat=$stmt->fetchAll(PDO::FETCH_OBJ);

    			    foreach ($chat as $chat) {

    			        ?>

    						<a href="javascript:void(0)" class="w3-border-bottom test w3-hover-light-grey" onclick="openMail('<?php echo $chat->user_id; ?>');w3_close();" id="firstTab">
    							<div class="w3-container">
    								<img class="w3-round w3-margin-right" src="<?php echo $chat->profile_image; ?>" style="width:15%;"><span class="w3-opacity w3-large"><?php echo $chat->user_name; ?> </span>
    								<h6><?php echo $chat->firstname; ?> <?php echo $chat->middlename; ?> <?php echo $chat->lastname; ?></h6>
    							</div>
    						</a>


    			        <?php

    			    }

    			?>


    		</div>
    	</div>
    </nav>

    <div class="w3-overlay w3-hide-large " onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;">
    	<i class="fa fa-bars w3-opennav w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
    	<a href="javascript:void(0)" class="w3-hide-large w3-red w3-btn w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>

		<?php

		    $stmt = $auth_user->runQuery("SELECT * 
								    	FROM `chat` 

								    	JOIN 	`users`
								    	ON 		`chat`.`user_id`=`users`.`user_id`

								    	WHERE  `chat`.`id`= '$user_id' 
								    	ORDER BY timeposted DESC ");
		    $stmt->execute(array());
		    
		    $chat=$stmt->fetchAll(PDO::FETCH_OBJ);

		    foreach ($chat as $chat) {

		        ?>

				<div id="<?php echo $chat->user_id; ?>" class="w3-container person">
					<br>
					<img class="w3-round " src="<?php echo $chat->profile_image; ?>" style="width:20%;">
					<h5 class="w3-opacity">Subject: Remember Me </h5>
					<h4><i class="fa fa-clock-o"></i> <?php echo $chat->firstname; ?> <?php echo $chat->middlename; ?> <?php echo $chat->lastname; ?> </h4>
					<form action = "" metod = "" >
					<a class="w3-btn w3-light-grey" >Reply<i class="w3-padding-left fa fa-mail-reply fa-arrow-right"></i></a> 
					
						<textarea type = "mail" name = "mail" placeholder = "Write message..." style = "width:100%;border:none;border-color:none;text-decoration-style:none; "></textarea>
					</form>
					<hr>


					<?php 

						$stmt = $auth_user->runQuery("SELECT * FROM `chat` WHERE `user_id`= '$chat->user_id' AND `id`='$user_id' ORDER BY timeposted DESC ");
						$stmt->execute(array());
						$chat=$stmt->fetchAll(PDO::FETCH_OBJ);
						foreach ($chat as $chat) {

							?>

                                <?php

                                    $stmt = $auth_user->runQuery("SELECT * FROM `orders` WHERE `message_id`= '$chat->message_id' ");
                                    $stmt->execute(array());
                                    $orders=$stmt->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($orders as $order) {
                                        
                                        if ($order->message_id === $chat->message_id ) {
                                            echo '<div class="alert alert-warning"  style = "padding:1px;margin:1px;">
                                            <p><b>ORDER FILLED</b> <i style = "float:right;">'.$order->timeorderfilled.'</i></p>
                                            </div>
                                            ';
                                            
                                            ?>



                                            <?php
                                        }

                                    }

                                ?>

							<div class="w3-gray w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large " style = "overflow-x:scroll;">
								<p>
									<?php echo html_entity_decode($chat->message); ?><br />
									<a href = "confirmorder.php?message_id=<?php echo $chat->message_id; ?>"><button>Order done</button></a><i style = "float:right;"><?php echo $chat->timeposted; ?></i>
								</p>
							</div><br />
							<?php

						}

					?>
					<p><i>Best Regards</i></p>

				</div>


		        <?php

		    }

		?>

    </div>


</div>


<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show"; 
        x.previousElementSibling.className += " w3-red";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
    }
}

openMail("Borge")
function openMail(personName) {
  var i;
  var x = document.getElementsByClassName("person");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x = document.getElementsByClassName("test");
  for (i = 0; i < x.length; i++) {
     x[i].className = x[i].className.replace(" w3-light-grey", "");
  }
  document.getElementById(personName).style.display = "block";
  event.currentTarget.className += " w3-light-grey";
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>




<?php require_once 'includes/widgets/footer/footer.php'; ?>
