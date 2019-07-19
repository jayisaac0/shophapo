<div class="col-sm-12 col-md-2 mscreenhide">
    <div class="thumbnail thumbnailReset" style = "box-shadow:0px 4px 4px 4px  grey;">
        <div class="caption">
            <center><img src = " <?php echo $userRow['profile_image']; ?> " style = "width:150px; height:auto; padding:0; margin:0;border-radius:150px;" /></center>
        </div>
            <hr />
        <div class="caption">
            <img src = "images/icons/name.ico" /><a href="profile.php" style="font-size:18px;text-decoration:none;"><?php echo $userRow['firstname'].' '; ?><?php echo $userRow['middlename'].' '; ?></a><br />
            <img src = "images/icons/name.ico" /> <a style="text-decoration:none;"><?php echo $userRow['city']; ?>, <?php echo $userRow['country']; ?></a><br />
            <img src = "images/icons/idnumber.ico" /> ID number: <a style="text-decoration:none;"><?php echo $userRow['idnumber']; ?></a><br />
            <img src = "images/icons/name.ico" /> License: <a style="text-decoration:none;"><?php echo $userRow['license']; ?></a><br />
        </div>
    </div>
    <p style = "text-align:center;">
        <a href = "about.php">About</a> &copy <?php echo date("Y"); ?> www.shopup.com
    </p>







  <style>.affix {top: 45px;}</style>

<div style="margin:0px auto;" class="nav nav-pills nav-stacked " data-spy="affix" data-offset-top="205" >

<!-- Insert to your webpage where you want to display the carousel -->
<div id="amazingcarousel-container-1" style="background:#FFFFFF;">
    <div id="amazingcarousel-1" style="display:none;position:relative;width:100%;max-width:240px;margin:0px auto 0px;">
        <div class="amazingcarousel-list-container" style = "box-shadow:0px 4px 4px 4px  grey;">
            <ul class="amazingcarousel-list">


                <?php
                    $stmt = $auth_user->runQuery("SELECT * FROM products  ");
                    $stmt->execute(array());
                    $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach ($products as $product) {
                        ?>
                        <li class="amazingcarousel-item col-md-12">
                            <div class="amazingcarousel-item-container">
                                <div class="w3-card-4">
                                    <a href="<?php echo $product->product_image; ?>" title="<?php echo $product->productname. ' '; ?>Ksh<?php echo $product->productprice; ?>"  class="html5lightbox" data-group="amazingcarousel-1"><img src="<?php echo $product->product_image; ?>"  alt="<?php echo $product->productname; ?>" style="width:100%;" /></a>
                                    <div class="amazingcarousel-text">
                                        <div class="amazingcarousel-text-bg"></div>
                                        <div class="amazingcarousel-title" style="color:red;background:#000000;">Ksh <?php echo $product->productprice; ?></div>
                                    </div>
                                </div>
                                <a href="product.php?id=<?php echo $product->productid ?>" style="text-decoration:none;"><b style="color:blue;"><?php echo $product->productname. ' '; ?></b><b style="color:red;">Ksh<?php echo $product->productprice; ?></b></a> 
                            </div>
                        </li>

                        <?php
                    }
                ?>

            </ul>
            <div class="amazingcarousel-prev"></div>
            <div class="amazingcarousel-next"></div>
        </div>
    </div>
</div>
<!-- End of body section HTML codes -->
   
</div>






</div>