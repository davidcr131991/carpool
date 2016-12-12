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
        <h2 style="margin-top:0px">Carpools <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Uid <?php echo form_error('uid') ?></label>
            <input type="text" class="form-control" name="uid" id="uid" placeholder="Uid" value="<?php echo $uid; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">From <?php echo form_error('from') ?></label>
            <input type="text" class="form-control" name="from" id="from" placeholder="From" value="<?php echo $from; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">To <?php echo form_error('to') ?></label>
            <input type="text" class="form-control" name="to" id="to" placeholder="To" value="<?php echo $to; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Uptime <?php echo form_error('uptime') ?></label>
            <input type="text" class="form-control" name="uptime" id="uptime" placeholder="Uptime" value="<?php echo $uptime; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Downtime <?php echo form_error('downtime') ?></label>
            <input type="text" class="form-control" name="downtime" id="downtime" placeholder="Downtime" value="<?php echo $downtime; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">People <?php echo form_error('people') ?></label>
            <input type="text" class="form-control" name="people" id="people" placeholder="People" value="<?php echo $people; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Price <?php echo form_error('price') ?></label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $price; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Vehicle <?php echo form_error('vehicle') ?></label>
            <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Vehicle" value="<?php echo $vehicle; ?>" />
        </div>
	    <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('carpools') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>