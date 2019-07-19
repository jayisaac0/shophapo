
<?php
    if(isset($_POST['servicebackgroundpost']))
    {
        $servicebackground = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servicebackground']))));
        $servisefontcolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['servisefontcolor']))));
        $serviseheadingcolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['serviseheadingcolor']))));
        

        if(empty($_FILES['servicebackground']['name']) === true) {
        $error[] = "Provide product background image!";
        }
        else if($servisefontcolor == "") {
            $error[] = "Provide product background color";
        }
        else if($serviseheadingcolor == "") {
            $error[] = "Provide product price color";
        }
        else
        {

            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            $file_name = $_FILES['servicebackground']['name'];
            @$file_extn = strtolower(end(explode('.', $file_name)));
            $file_tmp = $_FILES['servicebackground']['tmp_name'];
            if (in_array($file_extn, $allowed) === true) 
            {

            $file_path = 'upload/backgrounds/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                if($auth_user->updateservicebackground($file_path, $servisefontcolor, $serviseheadingcolor)) 
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                            <?php echo 'Product background set!'; 
                      
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