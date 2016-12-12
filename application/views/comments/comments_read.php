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
        <h2 style="margin-top:0px">Comments Read</h2>
        <table class="table">
	    <tr><td>Sender</td><td><?php echo $sender; ?></td></tr>
	    <tr><td>Comment</td><td><?php echo $comment; ?></td></tr>
	    <tr><td>Cid</td><td><?php echo $cid; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('comments') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>