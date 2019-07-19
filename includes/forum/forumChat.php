<script type="text/javascript">
    function myFunction() {
        var user_id = document.getElementById("user_id").value;
        var forumName_id = document.getElementById("forumName_id").value;
        var forumChat = document.getElementById("forumChat").value;
    // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'user_id=' + user_id + '&forumName_id=' + forumName_id + '&forumChat=' + forumChat;
        if (forumChat == '')
        {
            
        }
        else
        {
    //AJAX code to submit form.
            $.ajax({
                type: "POST",
                url: "includes/forum/ajaxjs.php",
                data: dataString,
                cache: false,
            });
        }
        return false;
    }
</script>

<form id="form">
	<div class="form-group">
		<input type="hidden" id="user_id" value = "<?php echo $userRow['user_id']; ?>" />
	</div>
	<div class="form-group">
		<input type="hidden" id="forumName_id" value = "<?php echo $id; ?>" />
	</div>
	<div class="form-group">
		<textarea class="form-control" type="text" id="forumChat" rows="3"></textarea>
	</div>
		<input type="button" class="btn btn-primary" id="submit" onclick="myFunction()" value="Submit"/>
		<a class="btn btn-danger"  onclick="document.getElementById('payment').style.display='none'" style = "text-align:right;">Close</a>
</form>