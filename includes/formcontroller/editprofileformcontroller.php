<?php
if(isset($_POST['formaluserdetails']))
{
    $firstname = strip_tags(trim(stripslashes(htmlspecialchars($_POST['firstname']))));
    $profile_image = @strip_tags(trim(stripslashes(htmlspecialchars($_POST['profile_image']))));
    $middlename = strip_tags(trim(stripslashes(htmlspecialchars($_POST['middlename']))));
    $lastname = strip_tags(trim(stripslashes(htmlspecialchars($_POST['lastname']))));
    

    if($firstname == "") {
        $error[] = "Provide first name!";
    }
    else if(empty($_FILES['profile_image']['name']) === true) {
        $error[] = "Provide profile image!";
    }
    else if($middlename == "") {
        $error[] = "provide middle name!";
    }
    else if($lastname == "") {
        $error[] = "provide last name";
    }
    else
    {

        $allowed = array('jpg', 'png', 'jpeg', 'gif');

        $file_name = $_FILES['profile_image']['name'];
        $file_extn = @strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['profile_image']['tmp_name'];
        if (in_array($file_extn, $allowed) === true) 
        {

            $file_path = 'upload/profileimages/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            unlink($userRow['profile_image']);
            
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                if($auth_user->formaluserdetails($firstname, $middlename, $lastname, $file_path))
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Product Updated!'; 
                            echo '<script type="text/javascript">
                                window.location = "profile.php"
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

}


?>
