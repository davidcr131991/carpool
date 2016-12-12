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
        <h2 style="margin-top:0px">Notifications <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Sender <?php echo form_error('sender') ?></label>
            <input type="text" class="form-control" name="sender" id="sender" placeholder="Sender" value="<?php echo $sender; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Receiver <?php echo form_error('receiver') ?></label>
            <input type="text" class="form-control" name="receiver" id="receiver" placeholder="Receiver" value="<?php echo $receiver; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Type <?php echo form_error('type') ?></label>
            <input type="text" class="form-control" name="type" id="type" placeholder="Type" value="<?php echo $type; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Cid <?php echo form_error('cid') ?></label>
            <input type="text" class="form-control" name="cid" id="cid" placeholder="Cid" value="<?php echo $cid; ?>" />
        </div>
	    <input type="hidden" name="slno" value="<?php echo $slno; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('notifications') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>