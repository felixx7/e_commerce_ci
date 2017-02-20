            <div class="col-md-9">

                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                Kategori <b>Jasa</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <form method="post" action="<?=base_url();?>home/jasa">
                    Pencarian
                    <button type="submit" name="pilihan" value="terbaru" class="btn btn-xs btn-success">Terbaru</button>
                    <button type="submit" name="pilihan" value="termurah" class="btn btn-xs btn-default">Termurah</button>
                </form><br/>

                <div class="row">

                    <?php foreach ($barang as $tampil){ ?>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <a href="<?=base_url();?>home/detail/<?=$tampil['id'];?>" style="text-decoration: none;">
                                <div class="thumbnail thumbhover" style="height:280px; overflow:hidden;" >
                                    <div style="height:180px; margin:10px;overflow:hidden;">
                                        <img src="<?=base_url();?>images/images_thumb/<?=$tampil['gambar'];?>" width="100%" alt="">
                                    </div>
                                    <div class="caption font" style="height:70px; overflow:hidden;">
                                        <b><?=$tampil['nama_barang'];?></b><br/>
                                        Rp. <?php echo number_format($tampil['harga'],0,'.','.');?><br/>
                                    </div>  
                                </div>
                            </a>    
                        </div>
                    <?php } ?>

                </div>
                <?=$pagination;?>
            </div>


