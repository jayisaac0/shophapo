<?php
    if(isset($_POST['productsbackgroundpost']))
    {
        $productsbackground = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productsbackground']))));
        $productsbackgroundcolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productsbackgroundcolor']))));
        $productpricecolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productpricecolor']))));
        $productfontcolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productfontcolor']))));
        $productheadingcolor = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productheadingcolor']))));
        $productbodycontainer = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productbodycontainer']))));
        

        if(empty($_FILES['productsbackground']['name']) === true) {
        $error[] = "Provide product background image!";
        }
        else if($productsbackgroundcolor == "") {
            $error[] = "Provide product background color";
        }
        else if($productpricecolor == "") {
            $error[] = "Provide product price color";
        }

        else if($productfontcolor == "") {
            $error[] = "Provide product font color";
        }
        else if($productheadingcolor == "") {
            $error[] = "Provide product heading color";
        }
        
        else if($productbodycontainer == "") {
            $error[] = "Provide body container color";
        }
        else
        {

            $allowed = array('jpg', 'png', 'jpeg', 'gif');

            $file_name = $_FILES['productsbackground']['name'];
            @$file_extn = strtolower(end(explode('.', $file_name)));
            $file_tmp = $_FILES['productsbackground']['tmp_name'];
            if (in_array($file_extn, $allowed) === true) 
            {

            $file_path = 'upload/backgrounds/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            unlink($user->productsbackground);
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                if($auth_user->updateproductbackground($file_path, $productsbackgroundcolor, $productpricecolor, $productfontcolor, $productheadingcolor, $productbodycontainer)) 
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

