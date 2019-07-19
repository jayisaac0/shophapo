<?php

    $stmt = $auth_user->runQuery("SELECT * FROM `businesscycle` WHERE `user_id`='$user_id' AND `id`='$id' ");
    $stmt->execute(array());

    if( $businesscycle=$stmt->fetch(PDO::FETCH_OBJ)  ) {
    	?>
			<form class="form-horizontal" role="form" method="POST"  action="#form-anchor" id="form-anchor" >

					<?php
					    if(isset($_POST['removefromcycle']))
					    {
					        
				            try
				            {
				                if($auth_user->deletefromcircle($id)) 
				                {
				                    ?>
				                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
				                            <?php echo 'Deleted!';
				                            echo '<script type="text/javascript">
				                                window.location = "home.php"
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
					<button class=" btn btn-primary" name = "removefromcycle" >Remove business</button>
				</div>
			</form>
    	<?php
    }else {
    	?>
			<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor" >
			<?php require_once 'includes/formcontroller/addtocycleformcontroller.php'; ?>
				<?php
			        if(isset($error))
			        {
			            foreach($error as $error)
			            {
			                 ?>
			                 <div class="alert alert-danger" style = "padding:1px;margin:1px;">
			                    <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
			                 </div>
			                 <?php
			            }
			        }
			    ?>
				<div class="caption ">
					<button name = "addtocycle" class=" btn btn-primary">Add business</button>
				</div>
			</form>
    	<?php
    }

?>
