        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Pesanan Detail
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-shopping-cart"></i> <a href="<?=base_url();?>adm/pesanan">Pesanan</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-shopping-cart"></i> Pesanan Detail
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-sm-12 col-lg-12 col-md-12"> 
                    <?php foreach($pemesan as $tampil){ ?>
                        <div class="col-sm-6">      
                            <p><label>Nama Lengkap</label> <?=$tampil['nama'];?></p>
                            <p><label>Email</label> <?=$tampil['email'];?></p>
                            <p><label>No. HP</label> <?=$tampil['hp'];?></p>
                            <p><label>Tanggal</label> <?=tanggal($tampil['tanggal']);?></p>
                            <p><label>Service</label> <?=$tampil['service'];?></p>
                        </div>
                        <div class="col-sm-6">
                            <p><label>Provinsi</label> <?=$tampil['provinsi'];?></p>
                            <p><label>Kabupaten/Kota</label> <?=$tampil['kabupaten'];?></p>
                            <p><label>Kecamatan</label> <?=$tampil['kecamatan'];?></p>
                            <p><label>Kelurahan/Desa</label> <?=$tampil['desa'];?></p>      
                            <p><label>Detail Alamat</label> <?=$tampil['alamat'];?></p>
                        </div>
                    <?php } ?>    
                </div>
                
                <div class="col-sm-12 col-lg-12 col-md-12"> 
                    <div class="row">
                        <br/><br/><br/>
                    </div>
                </div>
                
                <div class="col-sm-12 col-lg-12 col-md-12"> 
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Berat</th>
                            <th>Harga</th>
                        </tr>
                        <?php $sum=0;$no=1; foreach($pesanan as $barang){ ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><div style="height:70px;overflow:hidden;"><img src="<?=base_url()."images/images_thumb/".$barang['gambar'];?>" style="width:100px;"></div></td>
                                <td>#<?=$barang['kategori'];?>-<?=$barang['id_barang'];?></td>
                                <td><?=$barang['nama_barang'];?></td>
                                <td><?=$barang['qty'];?></td>
                                <td><?=$barang['berat'];?></td>
                                <td>Rp. <?php echo number_format($barang['harga'],0,'.','.');?></td>
                            </tr>
                            <?php $sum+= $barang['berat'] * $barang['qty'];?>
                        <?php } ?>
                        <tr>
                            <td colspan="6"><b class="pull-right">Sub Total</b></td><td><b>Rp. <?php echo number_format($total['total'],0,'.','.');?></b></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b class="pull-right">Total</b></td><td><b>Rp. <?php echo number_format($total['totalongkir'],0,'.','.');?></b></td>
                        </tr>
                        <tr>
                            <td colspan="6"><b class="pull-right">Berat Total</b></td><td><b><?=$sum;?> gram</b></td>
                        </tr>
                    </table>

                    <?php if ($resi != null){ ?>
                        <div class="col-lg-3">
                            <label>No Rek:</label>
                            <h1><?=$resi['gambar'];?></h1>   
                        </div>
                    <?php } ?> 
                </div>
                <div class="pull-right">
                    <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                    <a href="<?=base_url();?>adm/pesanan_proses/<?=$this->uri->segment(3);?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Proses</a> 
                    <a href="<?=base_url();?>adm/pesanan_proses_batal/<?=$this->uri->segment(3);?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batalkan Proses</a>         
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->