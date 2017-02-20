            <div class="col-md-9">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Cek Pesanan</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <form action="<?=base_url();?>home/cek_pesanan" method="post">
                        <table class="pull-right">
                            <tr>
                                <td><input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email"></td>
                                <td>&nbsp;</td>
                                <td><input type="text" id="cek_pesanan" name="cek_pesanan" class="form-control" placeholder="Masukan Kode Pesanan"></td>
                                <td>&nbsp;<button class="btn btn-primary" onclick="order();">Lihat</button></td>
                            </tr>
                            <tr>
                                <td><a href='#' data-toggle='modal' data-target='#view-lupa'><b>Lupa Kode Pemasanan?</b></a></td>
                            </tr>
                        </table>
                    </form>
                    <div class='modal fade' id='view-lupa' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <b>Lupa Kode Pemesanan</b><button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                </div>
                                <div class='modal-body'>
                                    <form action="<?=base_url();?>home/mailer" method="post">
                                        <label>Email</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Masukan Email"><br/>
                                        <input type="submit" class="btn btn-primary pull-right" value="Submit"><br/><br/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <?php if ($cek_pesanan != null) { ?>
                    <br/><br/>
                    <div class="col-sm-12 col-lg-12 col-md-12"> 
                        <?php foreach($cek_pesanan as $tampil){ ?>
                            <div class="col-sm-6">      
                                <p><label>Nama Lengkap</label> <?=$tampil['nama'];?></p>
                                <p><label>Email</label> <?=$tampil['email'];?></p>
                                <p><label>No. HP</label> <?=$tampil['hp'];?></p>
                                <p><label>Tanggal</label> <?=tanggal($tampil['tanggal']);?></p>
                            </div>
                            <div class="col-sm-6">
                                <p><label>Provinsi</label> <?=$tampil['provinsi'];?></p>
                                <p><label>Kabupaten/Kota</label> <?=$tampil['kabupaten'];?></p>
                                <p><label>Kecamatan</label> <?=$tampil['kecamatan'];?></p>
                                <p><label>Kelurahan/Desa</label> <?=$tampil['desa'];?></p>       
                                <p><label>Detail Alamat</label> <?=$tampil['alamat'];?></p>
                            </div>

                            <?php $id_pes = $tampil['id'];?>

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
                            <?php $no=1; foreach($detail_pesanan as $barang){ ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><div style="height:70px;overflow:hidden;"><img src="<?=base_url()."images/images_thumb/".$barang['gambar'];?>" style="width:100px;"></div></td>
                                    <td>#<?=$barang['kategori'];?>-<?=$barang['id_barang'];?></td>
                                    <td><?=$barang['nama_barang'];?></td>
                                    <td><?=$barang['qty'];?> </td>
                                    <td><?=$barang['berat'];?> </td>
                                    <td>Rp. <?php echo number_format($barang['harga'],0,'.','.');?></td>
                                </tr>
                            <?php } ?>
                            <tr>    
                                <td colspan="6"><b class="pull-right">Berat Total</b></td><td><b><?=$total['berat'];?> gr</b></td>
                            </tr>
                            <tr>    
                                <td colspan="6"><b class="pull-right">Total + Ongkir</b></td><td><b>Rp. <?php echo number_format($total['totalongkir'],0,'.','.');?></b></td>
                            </tr>
                        </table>
                        <p>&nbsp;</p>
                    </div>

                    <?php foreach($pesanan as $tampil){ ?>
                        <?php if($tampil['status'] == 'Y') { echo '<span class="badge font pull-right" style="background:#84C720;"><h4>Sudah Transfer</h4></span>';} 
                            else { echo '<span class="badge font pull-right" style="background:#C72031;"><h4>Belum Transfer</h4></span>'; } ?>
                    <?php } ?>

                    <div class="col-lg-5">
                        <form action="<?=base_url();?>home/resi" method="post" enctype="multipart/form-data">  
                            <label>Input No. Rekening</label>
                            <input type="text" name="rekening" class="form-control"><br/>
                            <input type="hidden" name="id_pesanan" class="form-control" value="<?=$id_pes;?>">
                            <input type="submit" class="btn btn-sm btn-primary">
                        </form>
                    </div>

                    <?php if ($resi != null){ ?>
                        <div class="col-lg-3">
                            <label>No. Rekening Anda:</label>
                            <h3><?=$resi['gambar'];?> </h3> 
                        </div>  
                    <?php } ?>          

                <?php } else { ?>

                    <?php if ($this->session->flashdata('resi')){ ?>
                        <p>&nbsp;</p> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-info-circle"></i>  <strong>Berhasil Input No. Rekening</strong>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('mailer')){ ?>
                        <p>&nbsp;</p> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="fa fa-info-circle"></i>  <strong>Silahkan Cek Email Anda, Kode Pesanan Anda berhasil kami kirim melalui email yang anda berikan</strong>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } ?> 

            </div>
