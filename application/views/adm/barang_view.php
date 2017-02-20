        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-briefcase"></i> <a href="<?=base_url();?>adm/barang"> Barang</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-briefcase"></i> View Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-sm-12 col-lg-12 col-md-12">

                    <div class="col-sm-6 ">
                        <img src="<?=base_url();?>images/<?=$barang['gambar'];?>" width="100%" alt=""><br/>
                    </div>  
                    <div class="col-sm-6">
                        <div class="col-lg-12">      
                            <p><b><?=$barang['nama_barang'];?></b></p>
                            <p>Rp. <?php echo number_format($barang['harga'],0,'.','.');?></p>
                            <p><label>Kode Barang</label> #<?=$barang['kategori'];?>-<?=$barang['id'];?></p>
                            <p><label>Kategori</label> <?=$barang['kategori'];?></p>
                            <p><label>Stok</label> <?=$barang['stok'];?></p>
                            <p><label>Berat</label> <?=$barang['berat'];?> gram</p>
                            <hr>
                            <p><?=$barang['ket'];?></p>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <?php foreach ($gambar as $tampil) { ?>
                                <div class="col-lg-4">
                                    <div class="col-lg-12" style="height:75px;padding:5px; margin:5px;overflow:hidden;border:1px solid #ccc;">
                                        <a href='#' data-toggle='modal' data-target='#view-<?=$tampil['id'];?>'>
                                            <img src="<?=base_url();?>images/gambar/images_thumb/<?=$tampil['gambar'];?>" width="100%">
                                        </a>    
                                    </div>
                                    <div class="col-lg-9">
                                        <a href='#' data-toggle='modal' data-target='#delete-<?=$tampil['id'];?>'><button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i>  </button></a>
                                        <a href='#' data-toggle='modal' data-target='#view-<?=$tampil['id'];?>'><button type="button" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-new-window"></i>  </button></a>
                                    </div>
                                </div>
                                <div class='modal fade' id='delete-<?=$tampil['id'];?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='myModalLabel'>Delete image</h4>
                                            </div>
                                            <div class='modal-body'>
                                                <p>Delete from <?=$tampil['id'];?> ?</p>
                                                <a href='<?=base_url();?>adm/gambar_delete/<?=$tampil['id'];?>/<?=$tampil['id_barang'];?>' class='btn btn-sm btn-danger'>Yes</a>
                                                <button type='button' class='btn btn-sm btn-default' data-dismiss='modal'>Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='modal fade' id='view-<?=$tampil['id'];?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            </div>
                                            <div class='modal-body'>
                                                <img src="<?=base_url();?>images/gambar/<?=$tampil['gambar'];?>" width="550px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-lg-12">
                                <br/>
                                <form method="post" action="<?=base_url();?>adm/gambar/<?=$barang['id'];?>" enctype="multipart/form-data">
                                    <div class="col-lg-8"><input type="file" name="userfile" class="form-control"></div>
                                    <div class="col-lg-2"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Gambar</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12"> 
                            <hr> 
                            <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a> 
                            <a href="<?=base_url();?>adm/barang_edit/<?=$barang['id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Edit</a> 
                            <hr>
                        </div>
                    </div>
   
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->