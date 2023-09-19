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
        <h2 style="margin-top:0px">Barang_keluar <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sisa Barang <?php echo form_error('sisa_barang') ?></label>
            <input type="text" class="form-control" name="sisa_barang" id="sisa_barang" placeholder="Sisa Barang" value="<?php echo $sisa_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Keluar <?php echo form_error('tanggal_keluar') ?></label>
            <input type="text" class="form-control" name="tanggal_keluar" id="tanggal_keluar" placeholder="Tanggal Keluar" value="<?php echo $tanggal_keluar; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_barang_keluar" value="<?php echo $id_barang_keluar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang_keluar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>