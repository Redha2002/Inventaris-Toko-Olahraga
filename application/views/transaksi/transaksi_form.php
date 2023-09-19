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
        <h2 style="margin-top:0px">Transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Kode Barang <?php echo form_error('kode_barang') ?></label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Supplier <?php echo form_error('nama_supplier') ?></label>
            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="<?php echo $nama_supplier; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Pemesanan<?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="text" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></label>
            <input type="text" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>