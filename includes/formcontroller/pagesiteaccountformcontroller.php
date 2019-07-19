<?php

    if(isset($_POST['createpagesite']))
    {
        $shopname = strip_tags(trim(stripslashes(htmlspecialchars($_POST['shopname']))));
        $idnumber = strip_tags(trim(stripslashes(htmlspecialchars($_POST['idnumber']))));
        $license = strip_tags(trim(stripslashes(htmlspecialchars($_POST['license']))));
        $onlinebusinessid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['onlinebusinessid']))));
        $facebook = strip_tags(trim(stripslashes(htmlspecialchars($_POST['facebook']))));
        $twitter = strip_tags(trim(stripslashes(htmlspecialchars($_POST['twitter']))));
        $googleplus = strip_tags(trim(stripslashes(htmlspecialchars($_POST['googleplus']))));
        $linkedin = strip_tags(trim(stripslashes(htmlspecialchars($_POST['linkedin']))));
       

        if($shopname == "") {
            $error[] = "provide your first name!";
        }
        else if($idnumber == "") {
            $error[] = "provide your middle name!";
        }
        else if($license == "") {
            $error[] = "provide your middle name!";
        }
        else if($onlinebusinessid == "") {
            $error[] = "provide your town!";
        }
        else if($facebook == "") {
            $error[] = "share your facebook advertisements page!";
        }
        else if($twitter == "") {
            $error[] = "Share your twitter account";
        }
        else if($googleplus == "") {
            $error[] = "share your g++ page";
        }
        else if($linkedin == "") {
            $error[] = "Share your linkedin page!";
        }
        else
        {
            try
            {
                if($auth_user->createpagesite($shopname, $idnumber, $license, $onlinebusinessid, $facebook, $twitter, $googleplus, $linkedin)) 
                {
                    ?>
                        <div class="alert alert-success" style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Profile Updated!';
                            echo '<script type="text/javascript">
                                window.location = "pagesite.php"
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
