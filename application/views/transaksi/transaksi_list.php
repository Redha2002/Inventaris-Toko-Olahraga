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
        <h2 style="margin-top:0px">Laporan Barang Masuk</h2>
        <div class="row" style="margin-bottom: 10px">
           
        <div>
            <div class="row">
            
            <!--<div class="col-md-4">
                <?php echo anchor(site_url('transaksi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>-->
          
            </div>
            
        <!-- <div class="col-md-4">
        </div> -->
        </div>
            <div class="col-md-9 text-center">
           <div class="row">
           <form action="" method="POST" >
                <div class="col-md-2">
                <!-- <label for="">Filter</label> -->
            <input type="date"   name="dateawal">
            </div>
            <div class="col-md-2">
            <input type="date"   name="dateakhir">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Submit</button>
            </div> 
        </form>
           </div>
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <!-- <div class="col-md-1 text-right">
            </div> -->
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('transaksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('transaksi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Kode Barang</th>
		<th>Nama Supplier</th>
		<th>Jumlah Pemesanan</th>
		<th>Tanggal Pemesanan</th>
		<th>Tanggal Masuk</th>
		<th>Status</th>
        <!-- <th>Action</th> -->
            </tr><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $transaksi->kode_barang ?></td>
			<td><?php echo $transaksi->nama_supplier ?></td>
			<td><?php echo $transaksi->jumlah ?></td>
			<td><?php echo $transaksi->tanggal_pemesanan ?></td>
			<td><?php echo $transaksi->tanggal_masuk ?></td>
			<td><?php echo $transaksi->status ?></td>
			<!-- <td style="text-align:center" width="200px">
				<?php 
				//echo anchor(site_url('transaksi/read/'.$transaksi->id_transaksi),'Read'); 
				//echo ' | '; 
				//echo anchor(site_url('transaksi/update/'.$transaksi->id_transaksi),'Update'); 
				//echo ' | '; 
				echo anchor(site_url('transaksi/delete/'.$transaksi->id_transaksi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td> -->
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('transaksi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
            <!-- <?php echo $pagination ?> -->
            </div>
        </div>
    </body>
</html>