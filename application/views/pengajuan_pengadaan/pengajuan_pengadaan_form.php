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
        <h2 style="margin-top:0px">Pengajuan_pengadaan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Stok Barang <?php echo form_error('id_stok_barang') ?></label>
            <select name="id_stok_barang" class="form-control">
                <option value="" >Kode Barang</option>
                <?php if ($list_stok_barang):?>
                    <?php foreach ($list_stok_barang as $lsb):?>
                        <option value="<?php echo $lsb->id_stok_barang?>"><?php echo $lsb->kode_barang?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <select name="id_stok_barang" class="form-control">
                <option value="" >Nama Barang</option>
                <?php if ($list_stok_barang):?>
                    <?php foreach ($list_stok_barang as $lsb):?>
                        <option value="<?php echo $lsb->id_stok_barang?>"><?php echo $lsb->nama_barang?></option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pengajuan <?php echo form_error('tanggal_pengajuan') ?></label>
            <input type="date" class="form-control" name="tanggal_pengajuan" id="tanggal_pengajuan" placeholder="Tanggal Pengajuan" value="<?php echo $tanggal_pengajuan; ?>" />
        </div>
	    <input type="hidden" name="id_pengajuan_pengadaan" value="<?php echo $id_pengajuan_pengadaan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengajuan_pengadaan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>