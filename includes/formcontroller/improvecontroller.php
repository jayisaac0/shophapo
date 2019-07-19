<?php
if(isset($_POST['postimprove']))
{

    $improve = strip_tags(trim(stripslashes(htmlspecialchars($_POST['improve']))));


    if($improve == "") {
        $error[] = "Provide improve";
    }
    else
    {

        try
        {
            if($auth_user->postiprove($improve))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Product posted!'; ?>
                        <?php echo 'Profile Updated!'; 
                            echo '<script type="text/javascript">
                                window.location = "service.php?id='.$service->serviceid.'"
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
}

?>