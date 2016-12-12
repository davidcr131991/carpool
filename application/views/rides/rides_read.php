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
        <h2 style="margin-top:0px">Rides Read</h2>
        <table class="table">
	    <tr><td>Cid</td><td><?php echo $cid; ?></td></tr>
	    <tr><td>Place</td><td><?php echo $place; ?></td></tr>
	    <tr><td>Serialno</td><td><?php echo $serialno; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rides') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>