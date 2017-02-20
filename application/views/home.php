            <?php foreach($slider as $tampil) { ?>
                <?php $gambar[] = $tampil['gambar'];?>
            <?php } ?>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="<?=base_url();?>images/slider/<?=$gambar[0];?>" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?=base_url();?>images/slider/<?=$gambar[1];?>" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="<?=base_url();?>images/slider/<?=$gambar[2];?>" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                
                <form method="post" action="<?=base_url();?>home">
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


