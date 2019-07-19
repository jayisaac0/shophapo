<div class="caption w3-animated-top" style = "margin-top:-10px;margin-bottom:-5px;">
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
			    <a href = " shop.php?id=<?php echo $user->user_id; ?> ">
				    <p style = "margin:10px 5px;background:#000000;margin:1px auto;box-shadow:0px 4px 4px 4px  grey;padding:2px 10px;">
					  	<img src = "<?php  echo $user->profile_image; ?> " style = "height:40px;width:40px;border-radius:40px;" />
					  	<b><?php  echo $user->shopname; ?></b>
					</p>
				</a>
	        <?php

	    }

	?>

</div>