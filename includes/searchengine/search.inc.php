<?php
    if (isset ($_GET['search_text'])) {
      echo $search_text = $_GET['search_text'];
    }

    if (!empty($search_text)) {

        if($connect = mysqli_connect('localhost', 'root', 'Jayluv3139', 'shopup' )) {

        $query = " SELECT * FROM `users` JOIN `products` ON `users`.`user_id`=`products`.`user_id`  WHERE `shopname` LIKE '%".mysqli_real_escape_string($connect, $search_text)."%' ";
        $query_run = mysqli_query($connect, $query);

        while($query_row = mysqli_fetch_assoc($query_run)) {

            ?>

            <div class="media" style = "box-shadow:0px 4px 4px 4px  grey;padding:5px;">

                <div class="media-left" style = "background:#FDFFFE;">
                        <a href=" shop.php?id=<?php echo $query_row['user_id']; ?> ">
                          <img class="media-object img-circle" src = " <?php  echo $query_row['profile_image']; ?> " style = "width:50px;height:55px;border-radius:50px;"/>
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
                        <h4 class="media-heading"><a href = "shop.php?id=<?php echo $query_row['user_id']; ?> "> <?php  echo $query_row['shopname']; ?></a></h4>

                        <p style = "text-align:justify;"><?php  echo substr($query_row['productspecification'], 0, 400); ?><a href = " product.php?id=<?php  echo $query_row['productid']; ?> ">...view more</a></p>

                        <p><a href = " product.php?id=<?php echo $query_row['productid']; ?> "> <?php  echo $query_row['productname']; ?> </a></p>
                        
                </div>


                <div class="row">
                            <div class="col-sm-6 col-md-12">

                                <div class="row">
                                    <div class="col-sm-6 col-md-12">
                                        <a href="product.php?id=<?php echo $query_row['productid']; ?>" class="thumbnail" >
                                            <style type="text/css"> .rest{ width:auto;max-height:400px; padding:0; margin:0; } @media (max-width: 980px) { .rest { width:100%; } } </style>
                                            <center><img src = "<?php echo $query_row['product_image']; ?>" class="rest" /></center>
                                            <p style = "color:#FF0100;">Price: $<?php  echo $query_row['productprice']; ?> <i style = "float:right;color:#98CACB;">Posted on: <?php  echo $query_row['timeposted']; ?></i></p>
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



                                            <li style="padding:2px;margin:0px;"><img src = "<?php  echo $query_row['product_image']; ?>" style = "width:100%;max-height:100%; padding:0; margin:0;padding:2px;margin:0px;" />
                                                 <span class="glyphicon-class">Price: $<?php  echo number_format($query_row['productprice'], 2); ?></span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-scale" aria-hidden="true"></span> <span class="glyphicon-class">glyphicon glyphicon-scale</span> 
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                                
                                

                                
                            </div>
                        </div>

            </div>


            <?php
            
            }
        }
    }
?>