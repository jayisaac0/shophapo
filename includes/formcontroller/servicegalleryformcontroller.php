<?php

if(isset($_POST['servicegallerypost']))
{
	
    $servicegallery = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servicegallery']))));
    $service_gallery_image = @strip_tags(trim(stripslashes(htmlspecialchars($_POST['service_gallery_image']))));


    if(empty($_FILES['service_gallery_image']['name']) === true)  {
        $error[] = "Provide your service image";
    }
    else if($servicegallery == "") {
        $error[] = "Provide ythis service info";
    }
    else
    {

        $allowed = array('jpg', 'png', 'jpeg', 'gif');

        $file_name = $_FILES['service_gallery_image']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['service_gallery_image']['tmp_name'];
        if (in_array($file_extn, $allowed) === true) 
        {

            $file_path = 'upload/servicegallery/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                 if($auth_user->servicegallery($user_id, $file_path, $servicegallery))
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon bg-success"></i> &nbsp; <?php echo 'Service gallery Updated!'; ?>
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