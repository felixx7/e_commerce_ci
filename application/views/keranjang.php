            <div class="col-md-9">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Keranjang</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <?php if ($this->session->flashdata('keranjang_kosong')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Keranjang Anda Masih Kosong</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('berhasil_pesan')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Memesan</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (($this->session->userdata('baru_pesan')) && ($this->cart->total_items() == 0)) { 
                    $baru_pesan = $this->session->userdata('baru_pesan')?>

                        <div class="col-lg-12">
                            <h1><p>Nomor Pesanan : <b><?=$baru_pesan['id'];?></b></p></h1>
                            <div class="col-sm-6">
                                <p>&nbsp;</p>      
                                <p><label>Nama Lengkap</label> <?=$baru_pesan['nama'];?></p>
                                <p><label>Email</label> <?=$baru_pesan['email'];?></p>
                                <p><label>No. HP</label> <?=$baru_pesan['hp'];?></p>
                                <p><label>Tanggal Pesan</label> <?=tanggal($baru_pesan['tanggal']);?></p>
                                <p><label>Service</label> <?=$baru_pesan['service'];?></p>
                            </div>
                            <div class="col-sm-6">
                                <p>&nbsp;</p>  
                                <p><label>Provinsi</label> <?=$baru_pesan['provinsi'];?></p>
                                <p><label>Kabupaten/Kota</label> <?=$baru_pesan['kabupaten'];?></p>
                                <p><label>Kecamatan</label> <?=$baru_pesan['kecamatan'];?></p>
                                <p><label>Keluarahn/Desa</label> <?=$baru_pesan['desa'];?></p>       
                                <p><label>Detail Alamat</label> <?=$baru_pesan['alamat'];?></p>
                            </div>
                            <p>&nbsp;</p>
                            <p>Kirim Melalui:</p>
                            <p>BCA - 007-305-8071 - Aditya Radika </p>
                            <p>Atau</p>
                            <p>Mandiri - 007-305-8071 - Aditya Radika </p>  
                            <p><b style="color:#C72031;">Jika pesanan sebelum 3 hari pembayaran belum di transfer, maka pesanan akan dibatalkan!</b></p>
                            <p>&nbsp;</p>  
                            <a href="<?=base_url();?>home/print_pesanan" class="pull-right btn btn-primary"><i class="glyphicon glyphicon-new-window"></i> Print</a>
                        </div>

                <?php } ?>

                <?php if($cart != null){ ?>
                    <div class="row">
                        <table class="table table-striped table-hover">
                        	<tr>
                        	    <th>#</th>
                        		<th>No.</th>
                        		<th>Gambar</th>
                        		<th>Kode Barang</th>
                        		<th>Nama Barang</th>
                        		<th>Qty</th>
                                <th>Berat</th>
                        		<th>Harga</th>
                        	</tr>
                        	<?php $sum = 0;$no=1; foreach($cart as $barang){ ?>
                            	<tr>
                            		<td><a href="<?=base_url();?>home/remove/<?=$barang['rowid'];?>" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                            		<td><?=$no++;?></td>
                            		<td><div style="height:70px;overflow:hidden;"><img src="<?=base_url()."images/images_thumb/".$barang['gambar'];?>" style="width:100px;"></div></td>
                            		<td>#<?=$barang['kategori'];?>-<?=$barang['id'];?></td>
                            		<td><?=$barang['name'];?></td>
                            		<td>
                                        <form method="post" action="<?=base_url();?>home/update/<?=$barang['rowid'];?>">
                                            <div class="input-group date">
                                                <input type="number" value="<?=$barang['qty'];?>" style="width:50px;" name="qty" min="1" max="<?php if(($barang['stok']) <= 6){ echo $barang['stok']; } else { echo "6"; }?>" onkeydown="return false"><button><i class="glyphicon glyphicon-pencil"></i></button>
                                            </div>    
                                        </form>
                                    </td>
                                    <td><?=$barang['berat'];?> gram</td>
                                    <?php $sum+= $barang['berat'] * $barang['qty'];?>
                            		<td>Rp. <?php echo number_format($barang['price'],0,'.','.');?></td>
                            	</tr>
                        	<?php } ?>
                        	<tr>
                        	    <td colspan="7"><b class="pull-right">Sub Total</b></td><td><b>Rp. <?php echo number_format($this->cart->total(),0,'.','.');?></b></td>
                        	</tr>
                            <tr>
                                <td colspan="7"><b class="pull-right">Berat Total</b></td><td><b><?=$sum;?> gram</b></td>
                            </tr>
                        </table>   
                        <a href="<?=base_url();?>home/check_out" class="pull-right btn btn-success"><i class="glyphicon glyphicon-new-window"></i> Checkout</a>
                        <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                        <a href="<?=base_url();?>home/destroy" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Kosongkan</a>     
                    </div>
                <?php } ?>

            </div>


