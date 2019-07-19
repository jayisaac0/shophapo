<?php
if(isset($_POST['addtocycle']))
{
    
   
    try
        {
            if($auth_user->businesscycle($user_id, $id))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;
                        <?php echo 'Added to business cycle!';
                        echo '<script type="text/javascript">
                                window.location = "shop.php?id='.$user->user_id.'"
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

