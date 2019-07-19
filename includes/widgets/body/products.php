<div class="col-sm-6 col-md-12" style = "background:red;margin:0px;padding:0px;">
    <div class="jumbotron" style = "padding:5px;margin:0px;">

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default" style = "">

                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <div class="row">



                            <?php

                                $stmt = $general->runQuery("

                                        SELECT `users`.`user_id`,
                                            `users`.`profile_image`,
                                            `users`.`user_name`,
                                            `users`.`shopname`,

                                            `products`.`productid`,
                                            `products`.`product_image`,
                                            `products`.`product_id`,
                                            `products`.`user_id`,
                                            `products`.`productname`,
                                            `products`.`productmanufacturer`,
                                            `products`.`productcategory`,
                                            `products`.`productprice`,
                                            `products`.`productdetails`,
                                            `products`.`productspecification`,
                                            `products`.`productquantity`,
                                            `products`.`productwarrant`,

                                            `products`.`timeposted`




                                        FROM    `users`

                                        JOIN    `products`
                                        ON      `users`.`user_id`=`products`.`user_id` ORDER BY timeposted DESC 
                                        ");
                                $stmt->execute(array());
                                
                                $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                                $users = $stmt->fetchAll(PDO::FETCH_OBJ);


                                foreach ($products as $product)  {

                                    ?>

                                     <div class="col-sm-6 col-md-3 " style = "height:350px;" >
                                        <a id = "<?php  echo $product->productname; ?>" action = "#<?php  echo $product->productname; ?>" class="thumbnail myHover"  title=" #<?php  echo $product->productid; ?> " data-toggle="popover" data-placement = "bottom" data-trigger="" data-content=" <?php  echo $product->productdetails; ?> " style = "padding:20px 5px;">
                                        
                                        <img src="<?php  echo $product->product_image; ?>" alt="joshua" style = "width:auto;max-height:200px;" onclick="document.getElementById('<?php  echo $product->productid; ?>').style.display='block'" class="w3-hover-light-grey " />

                                        </a>
                                        <a onclick="document.getElementById('<?php  echo $product->productid; ?>').style.display='block'" style = "color:blue;cursor:pointer;"><?php  echo $product->productname; ?></a><br />
                                        <a href = "#" style = "color:blue;"><?php  echo $product->shopname; ?></a><br />
                                        <button style = "background:url('images/price.png');background-repeat:no-repeat;background-size:100%;border:none;padding:10px 10px 10px 5px;color:red;font-weight:bold; ">Ksh <?php  echo number_format($product->productprice, 2); ?></button>


                <link rel="stylesheet" href="includes/widgets/body/widgets/panel.css">


                    <div id="<?php  echo $product->productid; ?>" class="w3-modal" style = "border:none;background:#000000;">
                      <div class="w3-modal-content w3-animate-zoom">
                        <div class="w3-container w3-black">
                          <span onclick="document.getElementById('<?php  echo $product->productid; ?>').style.display='none'" class="w3-closebtn w3-hover-text-grey">close</span>
                          <b><?php  echo strtoupper($product->shopname); ?></b>
                        </div>
                        <div class="w3-container" style = "">

                            <div class="row" style = "border:none;">

                                <div class="col-sm-6 col-md-12" style = "border:none;">
                                    <div class="thumbnail"  style = "border:none;">
                                        
                                            <div class="row" style = "border:none;">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="thumbnail" style = "border:none;">
                                                        <img src="<?php  echo $product->product_image; ?>" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />

                                            <div class="row" style = "border:none;">
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:">
                                                        <b>Product name:</b> <b style = "color:blue;"><?php  echo $product->productname; ?></b>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product category:</b>  <?php  echo $product->productcategory; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product manufacturer:</b> <?php  echo $product->productmanufacturer; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product price:</b> <b style = "color:red;">Ksh <?php  echo number_format($product->productprice, 2); ?></b>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product details:</b> <?php  echo $product->productdetails; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product specification:</b> <?php  echo $product->productspecification; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Quantity: </b><?php  echo $product->productquantity; ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-5">
                                                    <div class="thumbnail" style = "border:none;text-align:justify;">
                                                        <b>Product warrant:</b> <?php  echo $product->productwarrant; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row" style = "border:none;">
                                                <div class="col-sm-6 col-md-12">
                                                    <div class="thumbnail" style = "border:none;">
                                                        
                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading" role="tab" id="headingOne">
                                                                    <h4 class="panel-title">
                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                                                            Proceed to shop
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                    <div class="panel-body">
                                                                            <div class="signin-form">
                                                                                <div class="container">

                                                                                    <form class="form-signin" method="post" id="login-form">
                                                                                        <div id="error">
                                                                                        <?php
                                                                                            if(isset($error))
                                                                                            {
                                                                                                ?>
                                                                                                <div class="alert alert-danger">
                                                                                                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                        ?>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-6 col-md-6">
                                                                                            <label>Username:</label>
                                                                                            <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
                                                                                            <span id="check-e"></span>
                                                                                        </div>
                                                                                        <div class="form-group col-sm-6 col-md-6">
                                                                                            <label>Password:</label>
                                                                                            <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
                                                                                        </div>
                                                                                        <div class="form-group col-sm-6 col-md-6">
                                                                                            <button type="submit" name="btn-login" class="btn btn-default">
                                                                                                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
                                                                                            </button>
                                                                                        </div>  
                                                                                    </form>

                                                                                </div>
                                                                            </div>
                                                                            <?php require_once 'includes/widgets/login.php'; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-12" style = "border:none;">
                                    <div class="thumbnail"  style = "border:none;">
                                        
                                        <div class="row" style = "border:none;">
                                                <div class="col-sm-6 col-md-5"  style = "border:none;">
                                                    <div class="thumbnail" style = "border:none;">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      </div>
                    </div>


































                                    </div>         

                                    <?php

                                }

                            ?>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>