<?php

    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE user_id = $user_id  ORDER BY timeposted DESC limit 1 ");
    $stmt->execute(array());
    
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($services as $service) {

        ?>

			<div class="item">
				  <img src = "<?php  echo $service->service_image; ?>" style = "width:100%; max-height:auto; padding:0; margin:0;" />
			</div>

        <?php

    }

?>