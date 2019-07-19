<?php

    $stmt = $auth_user->runQuery("SELECT * FROM servicegallery WHERE user_id = $user_id  ORDER BY timeposted DESC");
    $stmt->execute(array());
    
    $servicegallery=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($servicegallery as $servicegallery) {

        ?>

			<div class="col-sm-6 col-md-12" style = "padding:0px; margin:0px;">
				    <a href="#" class="thumbnail myHover">
				      <img src="<?php  echo $servicegallery->service_gallery_image; ?>" alt="joshua" />
				    </a>
			</div>

        <?php

    }

?>