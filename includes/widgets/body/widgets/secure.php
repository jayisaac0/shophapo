<?php

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id = $user_id  ");
	$stmt->execute(array());

	$users=$stmt->fetchAll(PDO::FETCH_OBJ);
	foreach ($users as $user) {

		if ( $user->premium == 0 )  {
			?>
				<h1>You cant access this page</h1>
			<?php
			header("Location: pagesite.php");
		 die();
		 
		}
	}

?>