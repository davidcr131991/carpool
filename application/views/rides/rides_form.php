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
        <h2 style="margin-top:0px">Rides <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Cid <?php echo form_error('cid') ?></label>
            <input type="text" class="form-control" name="cid" id="cid" placeholder="Cid" value="<?php echo $cid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Place <?php echo form_error('place') ?></label>
            <input type="text" class="form-control" name="place" id="place" placeholder="Place" value="<?php echo $place; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Serialno <?php echo form_error('serialno') ?></label>
            <input type="text" class="form-control" name="serialno" id="serialno" placeholder="Serialno" value="<?php echo $serialno; ?>" />
        </div>
	    <input type="hidden" name="routeid" value="<?php echo $routeid; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rides') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>