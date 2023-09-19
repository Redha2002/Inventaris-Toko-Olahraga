<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Laporan_pesan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Barang</th>
		<th>Nama Supplier</th>
		<th>Jumlah</th>
		<th>Tanggal Pemesanan</th>
		<th>Tangga Masuk</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($laporan_pesan_data as $laporan_pesan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporan_pesan->kode_barang ?></td>
		      <td><?php echo $laporan_pesan->nama_supplier ?></td>
		      <td><?php echo $laporan_pesan->jumlah ?></td>
		      <td><?php echo $laporan_pesan->tanggal_pemesanan ?></td>
		      <td><?php echo $laporan_pesan->tangga_masuk ?></td>
		      <td><?php echo $laporan_pesan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>