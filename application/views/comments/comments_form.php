<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Comments <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Sender <?php echo form_error('sender') ?></label>
            <input type="text" class="form-control" name="sender" id="sender" placeholder="Sender" value="<?php echo $sender; ?>" />
        </div>
	    <div class="form-group">
            <label for="comment">Comment <?php echo form_error('comment') ?></label>
            <textarea class="form-control" rows="3" name="comment" id="comment" placeholder="Comment"><?php echo $comment; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Cid <?php echo form_error('cid') ?></label>
            <input type="text" class="form-control" name="cid" id="cid" placeholder="Cid" value="<?php echo $cid; ?>" />
        </div>
	    <input type="hidden" name="slno" value="<?php echo $slno; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('comments') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>