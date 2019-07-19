<?php
if(isset($_POST['addproduct']))
{
    $productid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productid']))));
    $productname = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productname']))));
    $product_image = @strip_tags(trim(stripslashes(htmlspecialchars($_POST['product_image']))));
    $Productcategory = strip_tags(trim(stripslashes(htmlspecialchars($_POST['Productcategory']))));
    $productmanufacturer = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productmanufacturer']))));
    $productprice = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productprice']))));
    $productdetails = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productdetails']))));
    $productspecification = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productspecification']))));
    $productquantity = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productquantity']))));
    $productwarrant = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productwarrant']))));


    if($productid == "") {
        $error[] = "Provide product ID!";
    }
    else if(empty($_FILES['product_image']['name']) === true) {
        $error[] = "Provide product image!";
    }
    else if($productname == "") {
        $error[] = "provide product name!";
    }
    else if($Productcategory == "") {
        $error[] = "provide product category!";
    }
    else if($productmanufacturer == "") {
        $error[] = "provide product manufacturer";
    }
    else if($productprice == "") {
        $error[] = "provide product price";
    }
    else if($productdetails == "") {
        $error[] = "provide product details";
    }
    else if($productspecification == "") {
        $error[] = "provide product specification";
    }
    else if($productquantity == "") {
        $error[] = "provide product quantity";
    }
    else if($productwarrant == "") {
        $error[] = "provide product warrant";
    }
    else
    {


        $allowed = array('jpg', 'png', 'jpeg', 'gif');

        $file_name = $_FILES['product_image']['name'];
        @$file_extn = strtolower(end(explode('.', $file_name)));
        $file_tmp = $_FILES['product_image']['tmp_name'];
        if (in_array($file_extn, $allowed) === true) 
        {

            $file_path = 'upload/productimages/' . substr(md5(time()), 0, 20) . '.' . $file_extn;
            move_uploaded_file($file_tmp, $file_path);

            try
            {
                if($auth_user->products($user_id, $productid, $productname, $Productcategory, $productmanufacturer, $productprice, $productdetails, $productspecification, $productquantity, $file_path, $productwarrant))
                {
                    ?>
                        <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                            <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo 'Product posted!'; ?>
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

