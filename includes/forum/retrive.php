<?php
	$conn = new mysqli('localhost', 'root', 'Jayluv3139', 'shopup');
	if($conn->connect_error) {
		die("Connection error: " . $conn->connect_error);
	}

	$result = $conn->query("SELECT * FROM forum ");
	if ($result->num_rows > 0) {
		while ($row =  $result->fetch_assoc()) {
			echo '

<p style = "border-radius:10px;padding:2px 10px;background:#DFFFFA;font-size:;line-height:1.2;">'. $row['forumChat']  .'
	<br />
	<i style = "text-align:right;color:#006800;"><b></b> <b style = "float:right;"></b></i>
</p>';
		}//'. $forumchat->user_name .''. $forumchat->timeposted .'
	}
?>


<?php /*
    $stmt = $auth_user->runQuery("SELECT * 
							    	FROM `forum`
							    	JOIN `users`
							    	ON 	 `users`.`user_id`=`forum`.`user_id` 
							    	WHERE `forum`.`forumName_id` = $id 
							    	");
    $stmt->execute(array());
    $forum=$stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($forum as $forumchat) {
        ?>						
			<p style = "border-radius:10px;padding:2px 10px;background:#7CFF7D;font-size:;line-height:1.2;">
				<?php  echo $forumchat->forumChat; ?>
				<br />
				<i style = "text-align:right;color:#006800;"><b><?php  echo $forumchat->user_name; ?></b> <b style = "float:right;"><?php echo $forumchat->timeposted; ?></b></i>
			</p>

			<p style = "border-radius:10px;padding:2px 10px;background:#DFFFFA;font-size:;line-height:1.2;">
				<?php  echo $forumchat->forumChat; ?>
				<br />
				<i style = "text-align:right;color:#006800;"><b><?php  echo $forumchat->user_name; ?></b> <b style = "float:right;"><?php echo $forumchat->timeposted; ?></b></i>
			</p>
        <?php
    }*/
//?>