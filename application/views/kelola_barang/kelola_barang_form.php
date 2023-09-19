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
        <h2 style="margin-top:0px">Kelola_barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jumlah <?php echo form_error('Jumlah') ?></label>
            <input type="text" class="form-control" name="Jumlah" id="Jumlah" placeholder="Jumlah" value="<?php echo $Jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('Nama_Barang') ?></label>
            <input type="text" class="form-control" name="Nama_Barang" id="Nama_Barang" placeholder="Nama Barang" value="<?php echo $Nama_Barang; ?>" />
        </div>
	    <input type="hidden" name="Id" value="<?php echo $Id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelola_barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>