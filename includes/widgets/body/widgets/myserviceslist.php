<?php

    $stmt = $auth_user->runQuery("SELECT * FROM services WHERE user_id = $user_id  ORDER BY timeposted DESC");
    $stmt->execute(array());
    
    $services=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($services as $service) {

        ?>

			<div class="row">
					<div class="col-sm-6 col-md-12">
					<div class="list-group">
					    <div class="thumbnail col-sm-12 myHover">
						      
						    <div class=" col-md-4" style = "padding:5px;">
						        <img src="<?php  echo $service->service_image; ?>" alt="joshua" style = "width:200px; height:auto;" />
						    </div>
						    <div class=" col-md-6" style = "padding-top:5px;text-align:justify;">
						        Product id: <?php  echo $service->serviceid; ?> <br />
						        Category: <?php // echo $service->fulldetails; ?> <br />
						        Price: $<?php echo number_format($service->serviceprice, 2); ?> <br />
						        Timeposted: <?php echo $service->timeposted; ?> <br />
						    </div>
						    <div class="caption col-md-2" id = "">

								<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor">

									<div class="form-group">
							        	<p style = "text-align:center;"><a href = "remove.php?serviceid=<?php echo $service->serviceid; ?>" type="submit" class="btn btn-primary" name = "deleteproduct" >Delete</a></p>
							        </div>
						        </form>
						    </div>
					    </div>
					</div>
				</div>
			</div>

        <?php

    }

?>