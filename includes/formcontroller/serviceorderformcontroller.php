<?php
if(isset($_POST['serviceorder']))
{

    $shopid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['shopid']))));
    $specificserviceid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['specificserviceid']))));
    $service_id = strip_tags(trim(stripslashes(htmlspecialchars($_POST['service_id']))));
    $service_image = strip_tags(trim(stripslashes(htmlspecialchars($_POST['service_image']))));
    $customername = strip_tags(trim(stripslashes(htmlspecialchars($_POST['customername']))));
    $servicename = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servicename']))));


    if($shopid == "") {
        $error[] = "Provide shopid";
    }
    elseif($specificserviceid == "") {
        $error[] = "Provide specificserviceid";
    }
    elseif($service_id == "") {
        $error[] = "Provide service_id";
    }
    elseif($service_image == "") {
        $error[] = "Provide service_image";
    }
    elseif($customername == "") {
        $error[] = "Provide customername";
    }
    elseif($servicename == "") {
        $error[] = "Provide servicename";
    }
    else
    {

        try
        {
            if($auth_user->serviceorderpost($user_id, $shopid, $specificserviceid, $service_id, $service_image, $customername, $servicename))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                        <?php echo 'Order placed!'; ?>
                        <script type="text/javascript">
                            alert("<?php echo strtoupper($servicename); ?> ORDER PLACED" );
                        </script>
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