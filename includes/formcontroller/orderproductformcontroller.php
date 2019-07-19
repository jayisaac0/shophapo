<?php
if(isset($_POST['orderpoduct']))
{
    $productquantity = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productquantity']))));
    $sellerid = strip_tags(trim(stripslashes(htmlspecialchars($_POST['sellerid']))));


    $productname = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productname']))));
    $Productcategory = strip_tags(trim(stripslashes(htmlspecialchars($_POST['Productcategory']))));
    $productmanufacturer = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productmanufacturer']))));
    $productprice = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productprice']))));
    $productquantity = strip_tags(trim(stripslashes(htmlspecialchars($_POST['productquantity']))));


    $totalcost = strip_tags(trim(stripslashes(htmlspecialchars($_POST['totalcost']))));



    if($productquantity == "") {
        $error[] = "Provide product quantity";
    }
    else if($sellerid == "") {
        $error[] = "provide seller id ";
    }
    else if($totalcost == "") {
        $error[] = "provide total cost ";
    }
    else
    {

        try
        {
            if($auth_user->orderproduct($user_id, $id, $sellerid, $productname, $Productcategory, $productmanufacturer, $productprice, $productquantity, $totalcost))
            {
                ?>
                    <div class="alert alert-success"  style = "padding:1px;margin:1px;">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; 
                        <?php echo $product->productname.' '.'Order placed!'; ?>
                        <script type="text/javascript">
                            alert("<?php echo strtoupper($product->productname); ?> ORDER PLACED" );
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

