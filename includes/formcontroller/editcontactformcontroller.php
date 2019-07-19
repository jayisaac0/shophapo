<?php
    if(isset($_POST['updatecontact']))
    {
        $postaladdress = strip_tags(trim(stripslashes(htmlspecialchars(mysqli_real_escape_string($_POST['postaladdress'])))));
        $postalcode = strip_tags(trim(stripslashes(htmlspecialchars(mysqli_real_escape_string($_POST['postalcode'])))));
        $city = strip_tags(trim(stripslashes(htmlspecialchars(mysqli_real_escape_string($_POST['city'])))));
        $country = strip_tags(trim(stripslashes(htmlspecialchars(mysqli_real_escape_string($_POST['country'])))));
       

        if($postaladdress == "") {
            $error[] = "provide your first name!";
        }
        else if($postalcode == "") {
            $error[] = "provide your middle name!";
        }
        else if($city == "") {
            $error[] = "provide your town!";
        }
        else if($country == "") {
            $error[] = "provide your facinity!";
        }
        else
        {
            try
            {
                if($auth_user->updateuser($postaladdress, $postalcode, $city, $country, $country)) 
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Profile Updated!'; 
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

?>
