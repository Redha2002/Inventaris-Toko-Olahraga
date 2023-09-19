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
        <h2 style="margin-top:0px">Data_pemesanan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">status<?php echo form_error('id_pengajuan_pengadaan') ?></label>
            <select name="id_pengajuan_pengadaan" class="form-control">
                <option value="" >Status</option>
                <?php if ($list_pengajuan_pengadaan):?>
                    <?php foreach ($list_pengajuan_pengadaan as $lpp):?>
                        <option value="<?php echo $lpp->id_pengajuan_pengadaan?>"><?php echo $lpp->status?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Jumlah <?php echo form_error('jumlah') ?></label>
            <select name="id_stok_barang" class="form-control">
                <option value="" >Jumlah</option>
                <?php if ($list_stok_barang):?>
                    <?php foreach ($list_stok_barang as $lsb):?>
                        <option value="<?php echo $lsb->id_stok_barang?>"><?php echo $lpp->jumlah?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pemesanan <?php echo form_error('tanggal_pemesanan') ?></label>
            <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan" placeholder="Tanggal Pemesanan" value="<?php echo $tanggal_pemesanan; ?>" />
        </div>
	    <div class="form-group">
            <label for="mediumblob">Nota Pembelian <?php echo form_error('nota_pembelian') ?></label>
            <input type="text" class="form-control" name="nota_pembelian" id="nota_pembelian" placeholder="Nota Pembelian" value="<?php echo $nota_pembelian; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id_data_pemesanan" value="<?php echo $id_data_pemesanan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('data_pemesanan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>