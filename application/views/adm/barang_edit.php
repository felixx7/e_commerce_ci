        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-briefcase"></i> <a href="<?=base_url();?>adm/barang"> Barang</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-briefcase"></i> Edit Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form action="<?=base_url();?>adm/barang_edit_proses/<?=$this->uri->segment(3);?>" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" maxlength="100" value="<?=$barang['nama_barang'];?>"><br/>
                        <label>Harga</label>
                        <input type="text"  name="harga" class="form-control" maxlength="11" value="<?=$barang['harga'];?>"><br/>
                        <div class="col-lg-6">
                            <label>Tanggal</label>
                            <div class="input-group date">
                                <input class="datepicker form-control" name="tanggal" type="text" data-date-format="yyyy-mm-dd" value="<?=$barang['tanggal'];?>"/><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <select name="kategori"  class="form-control">
                                <option value="Fashion" <?php if($barang['kategori'] == 'Fashion'){ echo 'selected'; }?>>Fashion</option>
                                <option value="Kuliner" <?php if($barang['kategori'] == 'Kuliner'){ echo 'selected'; }?>>Kuliner</option>
                                <option value="Jasa" <?php if($barang['kategori'] == 'Jasa'){ echo 'selected'; }?>>Jasa</option>
                            </select><br/>
                        </div>
                        <div class="col-lg-3">
                            <label>Stok</label>
                            <input type="text"  name="stok" class="form-control" value="<?=$barang['stok'];?>"><br/>
                        </div>
                        <div class="col-lg-3">
                            <label>Berat (gram)</label>
                            <input type="text"  name="berat" class="form-control" value="<?=$barang['berat'];?>"><br/>
                        </div>
                        <div class="col-lg-6">
                            <label>Publish</label><br/>
                            <div class="form-control">
                                <input type="radio"  name="publish" value="Y" <?php if($barang['publish'] == 'Y'){ echo 'checked'; }?>> Y &nbsp;&nbsp;&nbsp;
                                <input type="radio"  name="publish" value="N" <?php if($barang['publish'] == 'N'){ echo 'checked'; }?>> N
                            </div><br/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Gambar</label>
                        <input type="file" name="userfile" class="form-control"><br/>
                        <div style="height:135px;overflow:hidden;">
                            <img src="<?=base_url();?>images/images_thumb/<?=$barang['gambar'];?>" width="185px"><br/>
                        </div>   
                    </div>
                    <div class="col-lg-12">
                        <label>Keterangan</label>
                        <textarea name="edittext" id="edittext" class="edittext" style="display:none;"><?=$barang['ket']; ?></textarea>
                        <textarea name="ket" class="summernote" id="summernote" title="Contents"></textarea>
                        <button class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-floppy-disk"></i> Save</button>
                        <a href="javascript:window.history.go(-1);" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>               
                    </div>    
                </form> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->