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
        <h2 style="margin-top:0px">Data_pemesanan List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('data_pemesanan/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('data_pemesanan/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('data_pemesanan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Status Pesanan</th>
		<th>Jumlah</th>
		<th>Tanggal Pemesanan</th>
		<th>Nota Pembelian</th>
		<th>Status</th>
		<th>Action</th>
            </tr><?php
            foreach ($data_pemesanan_data as $data_pemesanan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $data_pemesanan->pengajuan_pengadaan ?></td>
			<td><?php echo $data_pemesanan->jumlah ?></td>
			<td><?php echo $data_pemesanan->tanggal_pemesanan ?></td>
			<td><?php echo $data_pemesanan->nota_pembelian ?></td>
			<td><?php echo $data_pemesanan->status ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('data_pemesanan/read/'.$data_pemesanan->id_data_pemesanan),'Read'); 
				echo ' | '; 
				echo anchor(site_url('data_pemesanan/update/'.$data_pemesanan->id_data_pemesanan),'Update'); 
				echo ' | '; 
				echo anchor(site_url('data_pemesanan/delete/'.$data_pemesanan->id_data_pemesanan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('data_pemesanan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>