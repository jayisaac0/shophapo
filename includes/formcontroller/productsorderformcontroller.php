<?php
if(isset($_POST['ordermail']))
{
    $myemail = strip_tags(trim(stripslashes(htmlspecialchars($_POST['myemail']))));
    $tomail = strip_tags(trim(stripslashes(htmlspecialchars($_POST['tomail']))));

    if($myemail == "") {
        $error[] = "Please provide your email";
    }
    else if($tomail == "") {
        $error[] = "Please provide your email";
    }
    else
    {

        try
        {
            mail( ''.$tomail, 'Contact form', '$orderform', 'From: '. $myemail );
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
