<div class="modal-body" id="results">
	<?php require_once 'includes/formcontroller/sendmailformcontroller.php'; ?>
	<?php require_once 'includes/formcontroller/sendchatformcontroller.php'; ?>
	<form class="form-horizontal" role="form" method="POST" action="#form-anchor" id="form-anchor" enctype="multipart/form-data">
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
		<div class="form-group">
		    <div class="col-sm-12">
		      <textarea type="message" class="form-control" id="inputsmessage" name = "message" placeholder="Send message" style = "height:150px;min-width:250px;"></textarea>
		    </div>
		</div>
			<input type="submit" name = "sendchat" class="btn btn-default" value = "Send" />
			<input type="submit" name = "mailme" class="btn btn-default" value = "Mail me" />
	</form>
</div>