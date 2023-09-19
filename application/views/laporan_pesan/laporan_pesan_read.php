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
        <h2 style="margin-top:0px">Laporan_pesan Read</h2>
        <table class="table">
	    <tr><td>Kode Barang</td><td><?php echo $kode_barang; ?></td></tr>
	    <tr><td>Nama Supplier</td><td><?php echo $nama_supplier; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Tangga Masuk</td><td><?php echo $tangga_masuk; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('laporan_pesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>