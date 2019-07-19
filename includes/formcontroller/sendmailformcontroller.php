<?php
if(isset($_POST['mailme']))
{
    $message = strip_tags(trim(stripslashes(htmlspecialchars($_POST['message']))));

    if($message == "") {
        $error[] = "No message!";
    }
    else
    {

        try
        {
            mail( ''.$user->user_email, 'Contact form', '$message', 'From: '.$userRow['user_email'] );
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