<div class="row">
<div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pemesanan</h3>
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
                                                <?php echo $lsb->nama_barang?> - <?php echo $lsb->kode_barang?></option>
                                            <?php endforeach?>
                                        <?php endif?>
                                    </select>
                                <!--<input type="text" class="form-control" id="inputText" placeholder="Nama Barang">-->
                            </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Supplier</label>
                            <div class="col-sm-10">
                            <select name="nama_supplier" class="form-control" require="">
                                     <option value="" >Pilih Nama Supplier</option>
                                     <?php if ($list_supplier):?>
                                        <?php foreach ($list_supplier as $ls):?>
                                             <option value="<?php echo $ls->nama_supplier?>">
                                             <?php echo $ls->id_supplier?>  -  <?php echo $ls->nama_supplier?></option>
                                         <?php endforeach?>
                                     <?php endif?>
                             </select>
                            </div>
                     </div>
                     <br><br>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Pemesanan</label>
                            <div class="col-sm-10">
                            <!-- <select name="jumlah" class="form-control" require="">
                                     <option value="" >Pilih Jumlah Pesanan</option>
                                     <?php if ($list_stok_barang):?>
                                        <?php foreach ($list_stok_barang as $lsb):?>
                                             <option value="<?php echo $lsb->jumlah?>">
                                             <?php echo $lsb->kode_barang?> - <?php echo $lsb->jumlah?></option>
                                         <?php endforeach?>
                                     <?php endif?>
                             </select> -->
                            <input name="stok_barang" type="text" class="form-control" id="inputText" placeholder="Jumlah Pemesanan">
                            </div>
                     </div>
                     <br><br>
                <div class="box-footer">
                <button type="submit" name="submit" value="Pemesanan" class="btn btn-info pull-right">Pesan</button>
                </div>

            </form>
        </div>
    </div>

    <!-- list pesan -->
   
    <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemesanan</h3>
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
            <th scope="col">Nama Supplier</th>
            <th scope="col">Tanggal Masuk</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($list_trx):?>
                <?php $i=1;?>
                <?php foreach ($list_trx as $lt):?>
                    <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $lt->kode_barang?></td>
                    <td><?php echo $lt->nama_supplier?></td>
                    <td><?php echo $lt->tanggal_masuk?></td>
                    <td><?php echo $lt->status?></td>
                    <td style="text-align:center" width="70px">
				    <?php 
                        echo anchor(site_url('transaksi/delete/'.$lt->id_transaksi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                    <!-- <td>
                        <?php if ($lt->status == "Sudah dipesan"):?>
                        <a href="<?php echo site_url()?>/transaksi/belum_dipesan/<?php echo $lt->id_transaksi?>">Belum dipesan</a>
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
</div>
</div>
</div>