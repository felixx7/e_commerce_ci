                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="col-md-9">

                    <div class="row">

                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <form action="<?=base_url();?>home/add/<?=$barang['id'];?>" method="post">
                                <div class="col-sm-6 ">
                                    <div class="col-lg-12">
                                        <img src="<?=base_url();?>images/<?=$barang['gambar'];?>" width="100%" alt=""><br/><br/>
                                    </div>
                                    <?php foreach ($gambar as $tampil) { ?>
                                        <div class="col-lg-3" style="height:90px;padding:5px; margin:5px;overflow:hidden;border:1px solid #ccc;">
                                            <a href='#' data-toggle='modal' data-target='#view-<?=$tampil['id'];?>'>
                                                <img src="<?=base_url();?>images/gambar/images_thumb/<?=$tampil['gambar'];?>" width="100%">
                                            </a>    
                                        </div>
                                        <div class='modal fade' id='view-<?=$tampil['id'];?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <center><img src="<?=base_url();?>images/gambar/<?=$tampil['gambar'];?>" width="410px"></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    <?php } ?>                                   
                                </div>
                                <div class="col-sm-6">
                                    <div class="font"><h4><b><?=$barang['nama_barang'];?></b></h4></div>
                                    <p>Rp. <?php echo number_format($barang['harga'],0,'.','.');?></p>
                                    <p><table><tr><td><label>Qty</label>&nbsp;</td><td><input type="number" value="1" name="qty" class="form-control" min="1" max="<?=$barang['stok'];?>" style="width:70px;" onkeydown="return false"></td></tr></table></p>
                                    <p><label>Kode Barang</label> #<?=$barang['kategori'];?>-<?=$barang['id'];?></p>
                                    <p><label>Kategori</label> <?=$barang['kategori'];?></p>
                                    <p><label>Stok</label> <?=$barang['stok'];?></p>
                                    <p><label>Berat</label> <?=$barang['berat'];?> gram</p>
                                    <hr>
                                    <p><?=$barang['ket'];?></p>
                                    <hr>

                                    <input type="hidden" name="nama_barang" value="<?=$barang['nama_barang'];?>"/>
                                    <input type="hidden" name="gambar" value="<?=$barang['gambar'];?>"/>
                                    <input type="hidden" name="harga" value="<?=$barang['harga'];?>"/>
                                    <input type="hidden" name="kategori" value="<?=$barang['kategori'];?>"/>
                                    <input type="hidden" name="stok" value="<?=$barang['stok'];?>"/>
                                    <input type="hidden" name="berat" value="<?=$barang['berat'];?>"/>

                                    <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                                    <button class="pull-right btn btn-success" type="submit"><i class="glyphicon glyphicon-shopping-cart"></i> Tambah ke Keranjang</button>
                                </div>
                            </form>
                            <div class="col-sm-12">
                                <hr>
                                <a class="fb-share-button" href="<?=current_url();?>" data-layout="button"></a>
                                <br/><br/>
                            </div>
                            <?php
                                $id = $barang['id'];
                                $komentar = $this->m_home->tampil_komentar($id);
                            ?>  
                            <div class="col-sm-12">
                                <h4><i><?=$this->m_home->jumlah_komentar($id);?> Komentar</i></h4>
                                <div class="list-group">
                                    <?php foreach ($komentar as $tampil) { ?>
                                        <div class="list-group-item">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="<?=base_url();?>images/a.gif" width="100px" height="100px">
                                                </div>
                                                <div class="media-body">
                                                    <label><?=$tampil['nama'];?></label> <i><?=$tampil['email'];?></i><br/>
                                                    <?=$tampil['komentar'];?> ... <br/><br/>
                                                    <i><?=tanggal($tampil['tanggal']);?></i><br/>
                                                    <?php if($tampil['dari'] != null){ ?>
                                                        <br/>
                                                        <div class="list-group-item">
                                                            <div class="media-left">
                                                                <img src="<?=base_url();?>images/a.gif" width="100px" height="100px">
                                                            </div>
                                                            <div class="media-body">
                                                                <label><?=$tampil['dari'];?></label> <i>Reply</i><br/>
                                                                <?=$tampil['balas'];?> ... <br/><br/>
                                                                <i><?=tanggal($tampil['tanggal_balas']);?></i><br/>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div> 
                                    <?php } ?>
                                </div> 
                            </div>

                            <div class="col-sm-8">
                                <form action="<?=base_url();?>home/komentar_tambah/<?=$barang['id'];?>" method="post">
                                    <input type="text" name="nama" value="" class="form-control" placeholder="Nama*" required><br/>
                                    <input type="email" name="email" value="" class="form-control" placeholder="Email*" required><br/>
                                    <input type="text" name="website" value="" class="form-control" placeholder="Website"><br/>
                                    <textarea name="komentar" rows="8" cols="40" class="form-control" placeholder="Komentar*" required></textarea><br/>
                                    <button type="submit" name="button" class="btn btn-success pull-right">Kirim Komentar</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
