<?php
    if(isset($_POST['foruminvitationbutton']))
    {
        $forumName_id = strip_tags(trim(stripslashes(htmlspecialchars($_POST['forumName_id']))));
        $shopid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['shopid']))));
        $inviteduserid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['inviteduserid']))));       

        if($forumName_id == "") {
            $error[] = "provide your first name!";
        }
        else if($shopid == "") {
            $error[] = "provide your middle name!";
        }
        else if($inviteduserid == "") {
            $error[] = "provide your town!";
        }
        else
        {
            try
            {
                if($auth_user->foruminvite($forumName_id, $shopid, $inviteduserid)) 
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Invited'; 
                            echo '<script type="text/javascript">
                                window.location = "forumInvites.php"
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
