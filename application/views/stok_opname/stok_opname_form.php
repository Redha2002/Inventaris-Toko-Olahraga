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
        <h2 style="margin-top:0px">Stok_opname <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="text" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Pengajuan Pengadaan <?php echo form_error('id_pengajuan_pengadaan') ?></label>
            <input type="text" class="form-control" name="id_pengajuan_pengadaan" id="id_pengajuan_pengadaan" placeholder="Id Pengajuan Pengadaan" value="<?php echo $id_pengajuan_pengadaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Keluar <?php echo form_error('tanggal_keluar') ?></label>
            <input type="text" class="form-control" name="tanggal_keluar" id="tanggal_keluar" placeholder="Tanggal Keluar" value="<?php echo $tanggal_keluar; ?>" />
        </div>
	    <input type="hidden" name="id_stok_opname" value="<?php echo $id_stok_opname; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stok_opname') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>