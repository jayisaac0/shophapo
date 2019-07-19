<?php
    if(isset($_POST['containerradiuspost']))
    {
        $productcontainerradius = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productcontainerradius']))));
        $alignment = strip_tags(trim(stripslashes(htmlspecialchars($_POST['alignment']))));
        $border = strip_tags(trim(stripslashes(htmlspecialchars($_POST['border']))));
       

        if($productcontainerradius == "") {
            $error[] = "Select container radius!";
        }
        else if($alignment == "") {
            $error[] = "Select alignment!";
        }
        else if($border == "") {
            $error[] = "Select border!";
        }
        else
        {
            try
            {
                if($auth_user->updatecontainerwidth($productcontainerradius, $alignment, $border)) 
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