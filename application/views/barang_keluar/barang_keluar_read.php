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
        <h2 style="margin-top:0px">Barang_keluar Read</h2>
        <table class="table">
	    <tr><td>Kode Barang</td><td><?php echo $kode_barang; ?></td></tr>
	    <tr><td>Sisa Barang</td><td><?php echo $sisa_barang; ?></td></tr>
	    <tr><td>Tanggal Keluar</td><td><?php echo $tanggal_keluar; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang_keluar') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>