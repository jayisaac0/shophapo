<?php  require_once 'includes/session/pagesession.php'; ?>
<!--php code goes here-->
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/body/widgets/secure.php'; ?>
<?php require_once 'includes/widgets/header.php'; ?>
<?php require_once 'includes/widgets/body/navigation.php'; ?>

<?php
	if(isset($_GET['message_id'])) {
	$message_id = $_GET['message_id'];


?>


	<!-- !PAGE CONTENT! -->
	<div class="w3-main reset-top my-set-width" style="margin-top:50px;">
		<h3 class="w3-center w3-padding-16">Order Confirmation</h3>
		<div class="w3-row-padding w3-padding-64 w3-card-4" >
			
		<?php

		    $stmt = $auth_user->runQuery("SELECT * FROM `orders` WHERE `message_id`= '$message_id' ");
		    $stmt->execute(array());
		    $orders=$stmt->fetchAll(PDO::FETCH_OBJ);
		    foreach ($orders as $order) {
		        
		        if ($order->message_id === $message_id ) {
		            ?>
		            	<div class = "row" style = "margin:10%;">
		            		<div class = "thumbnail" style = "padding:10%;">
		            		<h1 style = "font-size:50px;text-align:center;font-family:Algerian;"><b>THIS ORDER HAS ALREADY BEEN FILLED</b></h1><br />
		            		<p style = "text-align:center;"><button onclick="redirect()" class = "btn btn-primary">BACK</button></p>

		            		<script type="text/javascript">
		            			function redirect() {
		            				window.location="inbox.php";
		            			}
		            		</script>
		            		</div>
		            	</div>
		            <?php
		            die();
		        }
		    }
		?>

		<?php
		    $stmt = $auth_user->runQuery("SELECT * 
								    	FROM `chat` 

								    	JOIN 	`users`
								    	ON 		`chat`.`user_id`=`users`.`user_id`

								    	WHERE  `message_id` = '$message_id' ");
		    $stmt->execute(array());
		    $chat=$stmt->fetchAll(PDO::FETCH_OBJ);
		    foreach ($chat as $chat) {
		        ?>
					<?php echo $chat->message_id; ?>
					<div class="w3-gray w3-opacity w3-hover-opacity-off w3-padding-large w3-round-large " style = "overflow-x:scroll;">
						<p>
							<?php echo html_entity_decode($chat->message); ?><br />

			<form class="form-horizontal" role="form" method="POST" >

			<?php
				if(isset($_POST['orderplaced']))
				{
				    
				    try
				        {
				            if($auth_user->deliveryorders($user_id, $message_id))
				            {
				                ?>
			                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
			                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
			                        <?php echo 'Order ready for delivery!';
			                        echo '<script type="text/javascript">
			                                window.location = "inbox.php"
			                            </script>';

			                         ?>
			                    </div>
				                <?php
				            }
				            
				        }catch(PDOException $e)
				        {
				            echo $e->getMessage();
				        }
				}

			?>
					
			<div class="caption ">
				<p style = "text-align:center;"><button class=" btn btn-primary" name = "orderplaced" >Order done</button></p>
			</div>
			</form>

							<i style = "float:right;"><?php echo $chat->timeposted; ?></i>
						</p>
					</div><br /> 

		        <?php
		    }

		?>

		</div>
	</div>


<?php
}
?>
<?php require_once 'includes/widgets/footer/footer.php'; ?>
