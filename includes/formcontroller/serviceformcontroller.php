<?php

if(isset($_POST['addservice']))
{
	$serviceid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['serviceid']))));
    $service = strip_tags(trim(stripslashes(htmlspecialchars($_POST['service']))));
    $serviceprice = strip_tags(trim(stripslashes(htmlspecialchars($_POST['serviceprice']))));
    $servicedescription = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servicedescription']))));
    $fulldetails = strip_tags(trim(stripslashes(htmlspecialchars($_POST['fulldetails']))));
    $service_image = @strip_tags(trim(stripslashes(htmlspecialchars($_POST['service_image']))));


    if($service == "") {
        $error[] = "Provide service name";
    }
    else if($serviceid == "") {
        $error[] = "Provide service id";
    }
    else if(empty($_FILES['service_image']['name']) === true)  {
        $error[] = "Provide your service image";
    }
    else if($serviceprice == "") {
        $error[] = "Provide your service price";
    }
    else if($servicedescription == "") {
        $error[] = "Provide your service description";
    }
    else if($fulldetails == "") {
        $error[] = "Provide your service details";
    }
    else
    {

        $allowed = array('jpg', 'png', 'jpeg', 'gif');

        $file_name = $_FILES['service_image']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['service_image']['tmp_name'];
        if (in_array($file_extn, $allowed) === true) 
        {

            $file_path = 'upload/serviceimages/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                 if($auth_user->services($user_id, $service, $file_path, $serviceprice, $servicedescription, $fulldetails, $serviceid))
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-bg-success"></i> &nbsp; <?php echo 'Service Updated!'; ?>
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