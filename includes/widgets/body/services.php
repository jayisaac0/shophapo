<div class="col-sm-6 col-md-12"  style = "background:red;margin:0px;padding:0px;">
    <div class="jumbotron" style = "padding:5px;margin:0px;">

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default" >
             
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <?php

                            $stmt = $general->runQuery("SELECT * FROM services ORDER BY timeposted DESC");
                            $stmt->execute(array());
                            
                            $services=$stmt->fetchAll(PDO::FETCH_OBJ);

                            foreach ($services as $service) {

                                ?>

                                <div class="col-sm-6 col-md-4 myHover " style = "height:400px;">
                                    <a href="#" class="thumbnail ">
                                      <img src=" <?php  echo $service->service_image; ?> " alt=" <?php  echo $service->service; ?> " style = "width:auto;max-height:300px;">
                                    </a>
                                    joshua isaac
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