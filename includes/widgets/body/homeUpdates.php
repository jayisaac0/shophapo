<div class="col-sm-12 col-md-8" >
<?php require_once 'includes/searchengine/searchbar.php'; ?>
<div class="col-sm-12 col-md-12 w3-card-4"  id="results" style = "box-shadow:0px 4px 4px 4px  grey;padding:0px;margin:0px;">


<?php
    $stmt = $auth_user->runQuery("
        SELECT `users`.`user_id`,
                `users`.`profile_image`,
                `users`.`user_name`,
                `users`.`shopname`,
                `users`.`country`,

                `businesscycle`.`user_id`,

                `products`.`productid`,
                `products`.`user_id`,
                `products`.`productname`,
                `products`.`product_image`,
                `products`.`productspecification`,
                `products`.`productprice`,
                `products`.`timeposted`

        FROM    `users`

        JOIN    `businesscycle`
        ON      `users`.`user_id`=`businesscycle`.`id`

        JOIN    `products`
        ON      `users`.`user_id`=`products`.`user_id` 

        WHERE   `businesscycle`.`user_id` = '$user_id'

        ");
    $stmt->execute(array());
    
    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
    $users=$stmt->fetchAll(PDO::FETCH_OBJ);

    foreach ($products as $product) {
        if ($product->shopname != "") {
        ?>

            <div class="media" style = "box-shadow:0px 4px 4px 4px  grey;padding:5px;">
                <div class="media-left" style = "background:#FDFFFE;">
                    <a href="shop.php?id=<?php echo $product->user_id; ?>">
                      <img src = " <?php  echo $product->profile_image; ?> " style = "width:50px;height:55px;border-radius:50px;"/>
                    </a>
                    
                    <div class="btn-group"  style = "background:#FDFFFE;">
                        <a href = "#" class=" dropup-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style = "width:122px;">Share</a>
                        <ul class="dropdown-menu">
                            <li><a href = "http://www.facebook.com/share.php?u=?id=<?php  echo $product->productid; ?>" target="_blank"> <img src = "images/icons/facebook.ico" /> </a></li>
                            <li><a href = "http://twitter.com/share?url=http://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank"> <img src = "images/icons/twitter.ico" /> </a></li>
                            <li><a href = "http://plus.google.com/share?url=http://simplesharebuttons.com" target="_blank"> <img src = "images/icons/googleplus.ico" /> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="media-body" style = "background:#FDFFFE;">
                    <h4 class="media-heading"><a href = " shop.php?id=<?php echo $product->user_id; ?>"> <?php  echo $product->shopname; ?></a></h4>
                    <p style = "text-align:justify;"><?php  echo substr($product->productspecification, 0, 400); ?><a href = " product.php?id=<?php  echo $product->productid; ?> ">...view more</a></p>
                    <p><a href = " product.php?id=<?php  echo $product->productid; ?> "> <?php  echo $product->productname; ?> </a></p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <a href="product.php?id=<?php  echo $product->productid; ?>" class="thumbnail" >
                                    <style type="text/css"> .rest{ width:auto;max-height:400px; padding:0; margin:0; } @media (max-width: 980px) { .rest { width:100%; } } </style>
                                    <center><img src = "<?php  echo $product->product_image; ?>" class="rest" /></center>
                                    <p style = "color:#FF0100;">Price: $<?php  echo number_format($product->productprice, 2); ?> <i style = "float:right;color:#98CACB;">Posted on: <?php  echo $product->timeposted; ?></i></p>
                                </a>
                            </div>
                        </div>
                        <style type="text/css"> 
                        .bs-glyphicons .glyphicon { margin-top: 5px; margin-bottom: 10px; font-size: 24px; }
                        .glyphicon { position: relative; top: 1px; display: inline-block; font-family: 'Glyphicons Halflings'; font-style: normal; font-weight: 400 line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
                        .glyphicon-asterisk:before { content: "\002a"; }
                        .bs-glyphicons .glyphicon-class { display: block; text-align: center; word-wrap: break-word; }
                        .bs-glyphicons { margin: 0 -10px 20px; overflow: hidden;}
                        .bs-glyphicons-list { padding-left: 0; list-style: none;}
                        ol, ul { margin-top: 0; margin-bottom: 10px;}
                        .bs-glyphicons li { float: left; width:115px; height: 115px; padding: 10px; font-size: 10px; line-height: 1.4; text-align: center; background-color: #f9f9f9; border: 1px solid #fff;}
                        .bs-glyphicons li:hover{background:#9C83B4;color:#FFFFFF;}
                        .bs-glyphicons .glyphicon { margin-top: 5px; margin-bottom: 10px; font-size: 24px;}
                        .glyphicon { position: relative; top: 1px; display: inline-block; font-family: 'Glyphicons Halflings' font-style: normal font-weight: 400; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
                        </style>
                        <div class="col-sm-6 col-md-12 mscreenhide">
                            <div class="bs-glyphicons">
                                <ul class="bs-glyphicons-list">
                                    <?php
                                        $stmt = $auth_user->runQuery("SELECT * FROM `products` WHERE `user_id`='$product->user_id' ORDER BY timeposted LIMIT 7 ");
                                        $stmt->execute(array());
                                        $products=$stmt->fetchAll(PDO::FETCH_OBJ);

                                        foreach ($products as $product) {
                                        ?>
                                        <li style="padding:2px;margin:0px;"><img src = "<?php  echo $product->product_image; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                                             <span class="glyphicon-class">Price: $<?php  echo number_format($product->productprice, 2); ?></span> 
                                        </li>
                                        <?php
                                        }
                                    ?>  
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>


            <div class="media">
            <a href = "offeredservices.php?id=<?php echo $product->user_id; ?>" style = "text-decoration:none;">...View more services</a>
            </div>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                <?php
                    $stmt = $auth_user->runQuery("SELECT * FROM `products` JOIN `users` ON `products`.`user_id`=`users`.`user_id` ORDER BY timeposted LIMIT 1");
                    $stmt->execute(array());
                    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($products as $product) {
                    ?>
                    <div class="item active col-sm-12 col-md-12">
                        <img src="<?php  echo $product->profile_image; ?>" alt="..."  style = "margin:0px;padding:0px 10px 0px 0px;height:100px;width:auto;float:left;" class="item " />
                        <b>Welcome.</b>
                    </div>
                    <?php
                    }
                ?> 


                    <?php
                        $stmt = $auth_user->runQuery("SELECT `service_image`, `user_id`,`servicedescription`,`service` FROM `services` WHERE `user_id` = '$product->user_id' ORDER BY timeposted ");
                        $stmt->execute(array());
                        $services=$stmt->fetchAll(PDO::FETCH_OBJ);

                        foreach ($services as $service) {
                        ?>
                        <div class="item">
                            <img src = "<?php  echo $service->service_image; ?>" alt = "phone"  style = "width:auto;padding:0px 10px 0px 0px;height:100px;width:auto;float:left;" class="item " />
                            <b>Joshua</b><br />
                            <b><?php echo $service->service; ?></b><br /><?php echo substr($service->servicedescription ,0, 150); ?>
                        </div> 
                        <?php
                        }
                    ?>                   
                </div>
            </div>
            <hr />
        <?php
    } else {
        header("Location: home.php");
    }

    }

?>


</div>
</div>
