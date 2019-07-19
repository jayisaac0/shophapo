<?php
if(isset($_POST['createForumpost']))
{
    $createForum = strip_tags(trim(stripslashes(htmlspecialchars($_POST['createForum']))));


    if($createForum == "") {
        $error[] = "Provide forum name";
    }
    else
    {

        try
        {
            if($auth_user->createForum($user_id, $createForum))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Forum created!'; ?>
                    </div>
                <?php
            }
            
        }catch(PDOException $e)
            {
                echo $e->getMessage();
            }


    }


}
