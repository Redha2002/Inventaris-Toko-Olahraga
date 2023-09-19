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
        <h2 style="margin-top:0px">Stok_opname Read</h2>
        <table class="table">
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Kode Barang</td><td><?php echo $kode_barang; ?></td></tr>
	    <tr><td>Id Pengajuan Pengadaan</td><td><?php echo $id_pengajuan_pengadaan; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Tanggal Keluar</td><td><?php echo $tanggal_keluar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stok_opname') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>