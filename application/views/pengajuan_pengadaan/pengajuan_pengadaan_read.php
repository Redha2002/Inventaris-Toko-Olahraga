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
        <h2 style="margin-top:0px">Pengajuan_pengadaan Read</h2>
        <table class="table">
	    <tr><td>Id Stok Barang</td><td><?php echo $id_stok_barang; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Tanggal Pengajuan</td><td><?php echo $tanggal_pengajuan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengajuan_pengadaan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>