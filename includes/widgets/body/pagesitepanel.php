<nav class="w3-sidenav w3-dark-grey w3-collapse w3-white " style="z-index:3;width:300px;" id="mySidenav"><br>
    <div class="w3-container w3-row" >
        <div class="w3-col s4">
            <img src=" <?php echo $userRow['profile_image']; ?> " class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8">
            <span>Welcome, <br /><strong><?php echo $userRow['firstname']; ?> <?php echo $userRow['middlename']; ?> <?php echo $userRow['lastname']; ?></strong></span><br>
            <a href="#" class="w3-hover-none w3-hover-text-red w3-show-inline-block"><i class="fa fa-envelope"></i></a>
            <a href="#" class="w3-hover-none w3-hover-text-green w3-show-inline-block"><i class="fa fa-user"></i></a>
            <a href="#" class="w3-hover-none w3-hover-text-blue w3-show-inline-block"><i class="fa fa-cog"></i></a>
        </div>
    </div>

    <div class="w3-container">
        <h5><?php echo $userRow['shopname']; ?></h5>
    </div>
    <a href="myproducts.php" class="w3-padding" id = "products" ><img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/> My products 
            <?php
                $stmt = $auth_user->runQuery("SELECT * FROM products WHERE user_id = $user_id ORDER BY timeposted DESC");
                $stmt->execute(array());
                $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($products as $product) {
                    (int)$colors=1;
                    $my_products += $colors;
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te"><?php echo @$my_products; ?></span>
    </a>


    <a href="myservices.php" class="w3-padding" id = "services" > <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/> My services 
            <?php
                $stmt = $auth_user->runQuery("SELECT * FROM services WHERE user_id = $user_id  ORDER BY timeposted DESC");
                $stmt->execute(array());
                $services=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($services as $service) {
                    (int)$colors=1;
                    $my_servicess += $colors;
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te"><?php echo @$my_servicess; ?></span>
    </a>

    <a href="addproduct.php" class="w3-padding" id = "product" > <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/>Add product</a>
    <a href="addservice.php" class="w3-padding" id = "service" > <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/>Add service</a>
    <a href="statistics.php" class="w3-padding" id = "Statistics"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/>Statistics
            <?php
                $stmt = $auth_user->runQuery(" SELECT `users`.`user_id`, `users`.`user_email`, `users`.`user_name`, `users`.`city`, `users`.`country`, `businesscycle`.`user_id`, `businesscycle`.`id` FROM    `users` JOIN `businesscycle` ON `users`.`user_id`=`businesscycle`.`user_id` WHERE `businesscycle`.`id` = '$user_id' ");
                $stmt->execute(array());
                $users=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($users as $user) {
                    (int)$colors = 1; 
                    @$customernumber += $colors;
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te">Customers <?php echo @$customernumber; ?></span>
    </a>


    <a href="inbox.php" class="w3-padding" id = "Statistics"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/>Bulk orders
            <?php
                $stmt = $auth_user->runQuery("SELECT *  FROM `chat`  JOIN    `users` ON      `chat`.`user_id`=`users`.`user_id` WHERE  `chat`.`id`= '$user_id'  ORDER BY `chat`.`timeposted` DESC ");
                $stmt->execute(array());
                $chat=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($chat as $chat) {
                    (int)$colors = 1; 
                    @$b_u += $colors;
                }
            ?>
            <?php
                $stmt = $auth_user->runQuery("SELECT * FROM `orders` JOIN `users`ON `orders`.`user_id`=`users`.`user_id` WHERE  `orders`.`user_id`= '$user_id' ");
                $stmt->execute(array());
                $orders=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($orders as $orders) {
                    (int)$colors = 1; 
                    @$ddd += $colors;
                }
            ?>
            <span class="badge w3-right  w3-white w3-text-red te" style="margin:auto 2px;">U: <?php echo @$b_u - @$ddd; ?></span>
            <span class="badge w3-right  w3-white w3-text-green te" style="margin:auto 10px;">F: <?php echo @$ddd; ?></span>
            <span class="badge w3-right  w3-white w3-text-blue te" style="margin:auto 2px;">O: <?php echo @$b_u; ?></span>
    </a>
    <a href="serviceorders.php" class="w3-padding" id = "serviceorder"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/> Service order
            <?php
                $stmt = $auth_user->runQuery(" SELECT *  FROM `serviceorder` JOIN `users`  ON `serviceorder`.`shopid`=`users`.`user_id` WHERE `serviceorder`.`shopid`='$user_id' ");
                $stmt->execute(array());
                $users=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($users as $user) {
                    (int)$colors = 1; 
                    @$s_o += $colors;
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te"><?php echo @$s_o; ?></span>
    </a>


    <a href="singleproduct.php" class="w3-padding" id = "Statistics"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/>Product order
            <?php
                $stmt = $auth_user->runQuery(" SELECT *  FROM `orderproduct`  JOIN `users` ON   `orderproduct`.`user_id`=`users`.`user_id` WHERE `sellerid`='$user_id' ORDER BY ordertime DESC ");
                $stmt->execute(array());
                $orderproduct=$stmt->fetchAll(PDO::FETCH_OBJ);
                $products=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($orderproduct as $orderproduct) {
                    (int)$orders = 1; 
                    @$p_o += $orders;
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te"><?php echo @$p_o; ?></span>
    </a>


    <a href="personalize.php" class="w3-padding" id = "Statistics"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/> Personalize  </a>
    <a href="forumInvites.php" class="w3-padding" id = "forumnInvites"> <img src = "images/icons/fafa.ico" style = "width:30px;height:30px;"/> Forum invites 
            <?php
                $stmt = $auth_user->runQuery("SELECT * FROM forumName WHERE user_id= $user_id ORDER BY dateCreated DESC ");
                $stmt->execute(array());
                $forumName=$stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($forumName as $shopForumName) {
                    (int)$orders = 1; 
                    @$stats += $orders;
                    ?>
                    <?php
                        $stmt = $auth_user->runQuery("SELECT *  FROM  `foruminvitation` JOIN  `users` ON    `foruminvitation`.`inviteduserid`=`users`.`user_id` WHERE   `foruminvitation`.`forumName_id`='$shopForumName->forumName_id'  ORDER BY `dateinvited` DESC ");
                        $stmt->execute(array());
                        $foruminvitation=$stmt->fetchAll(PDO::FETCH_OBJ);
                        foreach ($foruminvitation as $foruminvite) {
                    }
                }
            ?>
        <span class="badge w3-right  w3-white w3-text-blue te"><?php echo @$stats; ?></span>
    </a>

    <br />
    <br />
</nav>