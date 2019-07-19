<?php
    if(isset($_POST['postThemeName']))
    {
        $themename = strip_tags(trim(stripslashes(htmlspecialchars($_POST['themename']))));
       

        if($themename == "") {
            $error[] = "provide theme name!";
        }
        else
        {
            try
            {
                if($auth_user->createthemename($user_id, $themename)) 
                {
                    ?>
                        <div class="alert alert-warning"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Theme created!'; 
                            
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
