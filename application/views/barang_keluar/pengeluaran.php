<div class="row">
<div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Barang Keluar</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collaps" data-toogle="tooltip" title="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn default btn sm" data-widget="remove" data-toggle="tooltip" title="remove">
                        <i class="fa fa-times"></i></button>
                </div>
                <!-- / tools -->
                </div>
            <!-- / box-header -->
            <div class="box-body pad"></div>
            <form method="post" action="#">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-10">
                            <select name="kode_barang" class="form-control" required="">
                                        <option value="">Pilih Nama Barang</option>
                                        <?php if ($list_stok_barang):?>
                                            <?php foreach ($list_stok_barang as $lsb):?> 
                                                <option value="<?php echo $lsb->kode_barang?>">
                                                <?php echo $lsb->nama_barang?>-<?php echo $lsb->kode_barang?></option>
                                            <?php endforeach?>
                                        <?php endif?>
                                    </select> 
                                    <!--<input type="text" class="form-control" id="inputText" placeholder="Nama Barang">-->
                            </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Sisa Barang</label>
                            <div class="col-sm-10">
                            <!--<select name="stok_barang" class="form-control" required="">
                                        <option value="">Jumlah Keluar</option>
                                        <?php if ($list_stok_barang):?>
                                            <?php foreach ($list_stok_barang as $lsb):?> 
                                                <option value="<?php echo $lsb->id_stok_barang?>">
                                                <?php echo $lsb->kode_barang?>-<?php echo $lsb->sisa_barang?></option>
                                            <?php endforeach?>
                                        <?php endif?>
                                    </select> -->
                                    <input name="stok_barang" type="text" class="form-control" id="inputText" placeholder="Sisa Barang">
                            </div>
                     </div>
                     <br><br>
                <div class="box-footer">
                <button type="submit" name="submit" value="pengeluaran" class="btn btn-info pull-right">Kirim</button>
                </div>
            </form>
        </div>
    </div>

<!-- list pengeluaran -->
   
<div class="box">
            <div class="box-header">
                <h3 class="box-title">Pengeluaran</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collaps" data-toogle="tooltip" title="collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn default btn sm" data-widget="remove" data-toggle="tooltip" title="remove">
                        <i class="fa fa-times"></i></button>
                </div>
                <!-- / tools -->
                </div>
            <!-- / box-header -->
    <div class="box-body pad">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Tanggal Keluar</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($list_brg):?>
                <?php $i=1;?>
                <?php foreach ($list_brg as $lb):?>
                    <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $lb->kode_barang?></td>
                    <td><?php echo $lb->tanggal_keluar?></td>
                    <td><?php echo $lb->status?></td>
                    <td style="text-align:center" width="70px">
				    <?php 
                    echo anchor(site_url('barang_keluar/delete/'.$lb->id_barang_keluar),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                    <!-- <td>
                        <?php if ($lb->status == "terjual"):?>
                        <a href="<?php echo site_url()?>/barang_keluar/belum_terjual/<?php echo $lb->id_barang_keluar?>">Belum Terjual</a>
                        <?php else:?>
                            -
                        <?php endif?>
                    </td> -->
                    </tr>
                    <?php $i++;?>
            <?php endforeach?>
            <?php endif?>
        </tbody>
        </table>
    </div>
