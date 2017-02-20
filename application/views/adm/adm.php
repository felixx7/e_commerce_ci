        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Selamat Datang!</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="glyphicon glyphicon-home"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$this->db->get('komentar')->num_rows();?></div>
                                        <div>Jumlah Komentar!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url();?>adm/komentar">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-briefcase fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$this->db->get('barang')->num_rows();?></div>
                                        <div>Jumlah Barang!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url();?>adm/barang">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$this->db->get('pesanan')->num_rows();?></div>
                                        <div>Jumlah Pesanan!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url();?>adm/pesanan">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-send fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=$this->db->get('request_barang')->num_rows();?></div>
                                        <div>Request Barang!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?=base_url();?>adm/request_barang">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <label>Slider</label>
                    </div>    
                    <div class="col-lg-12">
                        <br/>
                    </div>
                    <div class="col-lg-12">
                        <?php foreach($slider as $tampil){ ?>
                            <div class="col-lg-11">
                                <label>Gambar <?=$tampil['id'];?></label>  
                                <form method="post" action="<?=base_url();?>adm/slider/<?=$tampil['id'];?>" enctype="multipart/form-data">
                                    <div class="col-lg-7"><img src="<?=base_url();?>images/slider/<?=$tampil['gambar'];?>" width="100%"></div>
                                    <div class="col-lg-4">
                                        <input type="file" name="userfile" class="form-control"><br/>
                                        <div class="alert alert-danger alert-dismissable">
                                            <i class="fa fa-info-circle"></i>  <strong>Ukuran Harus 800 x 300 px</strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-1"><input type="submit" class="pull-right btn btn-primary" value="Ganti"></div>
                                </form>                                     
                            </div>
                            <div class="col-lg-11"><br/><br/></div>
                        <?php } ?>
                    </div>
                </div>
                <hr>
                <!-- /.row -->
                <?php $cara_pembelian = $this->m_adm->tampil_cara_pembelian();?>
                <form action="<?=base_url();?>adm/cara_pembelian/1" method="post">
                    <label>Cara Pembelian</label>
                    <textarea name="edittext" id="edittext" class="edittext" style="display:none;"><?=$cara_pembelian['isi']; ?></textarea>
                    <textarea name="isi" class="summernote" id="summernote" title="Contents"></textarea>
                    <input type="submit" value="Save" class="btn btn-sm btn-primary"><br/>
                </form>  
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


