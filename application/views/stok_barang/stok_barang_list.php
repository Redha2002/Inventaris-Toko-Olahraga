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
        <h2 style="margin-top:0px">Data barang List</h2>
        <div class="row" style="margin-bottom: 10px">
        <?php if ($_SESSION['hak_akses'] == 'K'){
          ?>
            <div class="col-md-4">
                <?php echo anchor(site_url('stok_barang/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <?php
          }
          ?>
           <div class="col-md-4">
            </div> 
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stok_barang/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stok_barang'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Barang</th>
        <th>Jumlah Stok</th>
        <?php if ($_SESSION['hak_akses'] == 'K'){
            ?>
            <th>Action</th>
        <?php
          }
          ?>
            </tr><?php
            foreach ($stok_barang_data as $stok_barang)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stok_barang->kode_barang ?></td>
			<td><?php echo $stok_barang->nama_barang ?></td>
            <td><?php echo $stok_barang->jumlah_stok ?></td>
            <?php if ($_SESSION['hak_akses'] == 'K'){
            ?>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stok_barang/read/'.$stok_barang->id_stok_barang),'Read'); 
				echo ' | '; 
				echo anchor(site_url('stok_barang/update/'.$stok_barang->id_stok_barang),'Update'); 
				echo ' | '; 
				echo anchor(site_url('stok_barang/delete/'.$stok_barang->id_stok_barang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
            <?php
          }
          ?>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('stok_barang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>