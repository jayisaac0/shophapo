<?php
if(isset($_POST['postreview']))
{

    $serviceid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['serviceid']))));


    if($serviceid == "") {
        $error[] = "Provide serviceid";
    }
    else
    {

        try
        {
            if($auth_user->postreview($serviceid, $user_id))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Review posted!'; ?>
                        <?php
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