<?php
    if(isset($_POST['disapprove']))
    {
        try
        {
            if($auth_user->updatedisapprove($disapprove)) 
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                        <?php echo 'Container set!'; 
                        
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