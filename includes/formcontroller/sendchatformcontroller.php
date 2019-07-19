<?php
if(isset($_POST['sendchat']))
{
    $message = strip_tags(trim(stripslashes(htmlspecialchars($_POST['message']))));


    if($message == "") {
        $error[] = "blank chat field";
    }
    else
    {

        try
        {
            if($auth_user->chat($id, $user_id, $message))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Mail sent!'; ?>
                    </div>
                <?php
            }
            
        }catch(PDOException $e)
            {
                echo $e->getMessage();
            }


    }


}

