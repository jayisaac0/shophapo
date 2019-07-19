<nav class="navbar navbar-fixed-top" style = "background:green;">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style = "color:#000000;background:#FFFFFF;margin-right:0px;" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </a>

            <a class="navbar-toggle" data-toggle="dropdown" style = "padding:9px;margin:0px;"><img src = "images/icons/bscycle.ico" /></a>
            <ul class="dropdown-menu">
                <?php include 'includes/widgets/body/widgets/cycle.php'; ?>
            </ul>

            <a class="navbar-brand" href="#"  onclick="w3_open();" style = "color:red;background:#000000;">☰</a>
            <a class="navbar-brand"  href="profile.php" style = "padding:9px;margin-left:5px;"><img src = "images/icons/profile.ico" style = "padding:0px;margin:0px;" /> <span class="sr-only"></span></a>
            <a class="navbar-brand"  href="index.php" style = "padding:9px;margin-left:5px;"><img src = "images/icons/home.ico" style = "padding:0px;margin:0px;" /></a>
            <a class="navbar-brand"  href="pagesite.php" style = "padding:9px;margin-left:5px;"><img src = "images/icons/shop.ico" style = "padding:0px;margin:0px;" /></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



            <ul class="nav navbar-nav navbar-right">
                <li><a href = "cart.php"  style = "padding:9px;"><img src = "images/icons/truckNav.ico" style = "padding:0px;margin:0px;" />
                    <?php
                        foreach( $_SESSION as $name => $value ){
                            if ($value > 0) {
                                if (substr($name, 0, 5) == 'cart_') {
                                    $id = substr($name, 5, (strlen($name) -5));
                                        $stmt = $auth_user->runQuery("SELECT *  FROM `products`  JOIN `users` ON   `products`.`user_id`=`users`.`user_id` WHERE `productid` = '$id' ");
                                        $stmt->execute(array());
                                        $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                                        foreach ($products as $product) {
                                        @$num = 1;
                                        @$count += $num;
                                    }
                                }
                            }

                        }?><span class="badge w3-circle w3-hover-text-red w3-white w3-text-blue te" style="border-radius:10px;background:#FFFFFF;color:green;"><?php echo $count; ?></span> <?php
                    ?>
                </a></li>
                <li class="dropdown">
                <a href="logout.php?logout=true" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"  style = "padding:10px;">
                    <img src = "<?php print($userRow['profile_image']); ?>" style = "padding:0px;margin:0px;height:30px;" /> Sign Out
                 </a>
                </li>
            </ul>
        </div>
    </div>
</nav>