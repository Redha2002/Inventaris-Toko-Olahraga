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

                <?php
            $SqlPeriode ="";
            $awalTgl="";
            $akhirTgl="";
            $tglAwal="";
            $tglAkhir="";
            if(isset($_POST['btnTampil'])) {
                $tglAwal = isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : "01-".date('m-Y');
                $tglAkhir = isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
                $SqlPeriode = "where A.tgl_pembayaran BETWEEN '".$tglAwal."' AND '".$tglAkhir."'";
            }
            else {
                $awalTgl = "01-".date('m-Y');
                $akhirTgl = date('d-m-Y');

                $SqlPeriode = "where A.tgl_pembayaran BETWEEN '".$awalTgl."' AND '".$akhirTgl."'";
            }
            ?>
                <body>
                        <h4>Periode Tanggal <b><?php echo ($tglAwal); ?></b> <b><?php echo ($tglAkhir); ?></b></h4>
                        <div class="card shadow">
                            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('Laporan_pesan/tampillaporan'); ?>" method="post" name="form10" target="_self">
                <div class="row">
                    <div class="col-lg-3">
                        <input name="txtTglAwal" type="date" class="form-control" value="<?php echo $awalTgl; ?>" size="10"/>
            </div>
            <div class="col-lg-3">
                        <input name="txtTglAkhir" type="date" class="form-control" value="<?php echo $akhirTgl; ?>" size="10"/>
            </div>
            <div class="col-lg-3">
                        <input name="Tampil" class="btn btn-success" type="submit" value="Tampilkan"/>
            </div>
            </div>
            <br>
            </form>

    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Barang</th>
		<th>Nama Supplier</th>
		<th>Jumlah</th>
		<th>Tanggal Pemesanan</th>
		<th>Tangga Masuk</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($laporan_pesan_data as $laporan_pesan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $laporan_pesan->kode_barang ?></td>
			<td><?php echo $laporan_pesan->nama_supplier ?></td>
			<td><?php echo $laporan_pesan->jumlah ?></td>
			<td><?php echo $laporan_pesan->tanggal_pemesanan ?></td>
			<td><?php echo $laporan_pesan->tangga_masuk ?></td>
			<td><?php echo $laporan_pesan->status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('laporan_pesan/read/'.$laporan_pesan->id_pemesanan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('laporan_pesan/update/'.$laporan_pesan->id_pemesanan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('laporan_pesan/delete/'.$laporan_pesan->id_pemesanan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('laporan_pesan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('laporan_pesan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>