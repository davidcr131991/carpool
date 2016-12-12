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
        <h2 style="margin-top:0px">Carpools Read</h2>
        <table class="table">
	    <tr><td>Uid</td><td><?php echo $uid; ?></td></tr>
	    <tr><td>From</td><td><?php echo $from; ?></td></tr>
	    <tr><td>To</td><td><?php echo $to; ?></td></tr>
	    <tr><td>Uptime</td><td><?php echo $uptime; ?></td></tr>
	    <tr><td>Downtime</td><td><?php echo $downtime; ?></td></tr>
	    <tr><td>People</td><td><?php echo $people; ?></td></tr>
	    <tr><td>Price</td><td><?php echo $price; ?></td></tr>
	    <tr><td>Vehicle</td><td><?php echo $vehicle; ?></td></tr>
	    <tr><td>Description</td><td><?php echo $description; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('carpools') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>