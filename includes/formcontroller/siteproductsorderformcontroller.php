<?php
if(isset($_POST['order']))
{
    $id = strip_tags(trim(stripslashes(htmlspecialchars($_POST['id']))));
    $user_id = strip_tags(trim(stripslashes(htmlspecialchars($_POST['user_id']))));
    $message = strip_tags(trim(stripslashes(htmlspecialchars($_POST['message']))));

    if($id == "") {
        $error[] = "blank!";
    }
    else if($user_id == "") {
        $error[] = "blank!";
    }
    else if($message == "") {
        $error[] = "blank!";
    }
    else
    {

        try
        {
            if($auth_user->chat($id, $user_id, $message))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Sent!'; ?>
                    </div>
                <?php
            }
            
        }catch(PDOException $e)
            {
                echo $e->getMessage();
            }


    }


}

