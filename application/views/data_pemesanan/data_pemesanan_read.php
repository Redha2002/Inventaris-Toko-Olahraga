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
        <h2 style="margin-top:0px">Data_pemesanan Read</h2>
        <table class="table">
	    <tr><td>Id Pengajuan Pengadaan</td><td><?php echo $id_pengajuan_pengadaan; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tanggal_pemesanan; ?></td></tr>
	    <tr><td>Nota Pembelian</td><td><?php echo $nota_pembelian; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>