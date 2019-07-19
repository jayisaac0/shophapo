<?php
if(isset($_POST['postproductreview']))
{

    $productid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productid']))));


    if($productid == "") {
        $error[] = "Provide productid";
    }
    else
    {

        try
        {
            if($auth_user->postproductreview($productid, $user_id))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Product posted!'; ?>
                        <?php echo 'Profile Updated!'; 
                            echo '<script type="text/javascript">
                                window.location = "product.php?id='.$product->productid.'"
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