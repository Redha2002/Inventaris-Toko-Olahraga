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
        <h2 style="margin-top:0px">Stok_opname List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('stok_opname/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stok_opname/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stok_opname'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tanggal Pemesanan</th>
		<th>Kode Barang</th>
		<th>Id Pengajuan Pengadaan</th>
		<th>Stok</th>
		<th>Tanggal Keluar</th>
		<th>Action</th>
            </tr><?php
            foreach ($stok_opname_data as $stok_opname)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stok_opname->tanggal_pemesanan ?></td>
			<td><?php echo $stok_opname->kode_barang ?></td>
			<td><?php echo $stok_opname->id_pengajuan_pengadaan ?></td>
			<td><?php echo $stok_opname->stok ?></td>
			<td><?php echo $stok_opname->tanggal_keluar ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stok_opname/read/'.$stok_opname->id_stok_opname),'Read'); 
				echo ' | '; 
				echo anchor(site_url('stok_opname/update/'.$stok_opname->id_stok_opname),'Update'); 
				echo ' | '; 
				echo anchor(site_url('stok_opname/delete/'.$stok_opname->id_stok_opname),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('stok_opname/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>