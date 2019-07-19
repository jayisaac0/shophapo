<?php
    if(isset($error))
    {
        foreach($error as $error)
        {
             ?>
             <div class="alert alert-danger" style = "padding:1px;margin:1px;">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
             </div>
             <?php
        }
    }
?>