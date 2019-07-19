<?php
    if(isset($_POST['servicecontainerpost']))
    {
        $servicecontainerwidth = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servicecontainerwidth']))));
       

        if($servicecontainerwidth == "") {
            $error[] = "Select container width!";
        }
        else
        {
            try
            {
                if($auth_user->updateservicecontainerwidth($servicecontainerwidth)) 
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
        
    }

?>