        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tambah Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-briefcase"></i> <a href="<?=base_url();?>adm/barang"> Barang</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-briefcase"></i> Tambah Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form action="<?=base_url();?>adm/barang_tambah_proses" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" maxlength="100" required><br/>
                        <label>Harga</label>
                        <input type="text"  name="harga" class="form-control" maxlength="11" required><br/>
                        <div class="col-lg-6">
                            <label>Tanggal</label>
                            <div class="input-group date">
                                <input class="datepicker form-control" name="tanggal" type="text" data-date-format="yyyy-mm-dd" value="<?=date("Y-m-d");?>"/><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <select name="kategori"  class="form-control">
                                <option value="Fashion">Fashion</option>
                                <option value="Kuliner">Kuliner</option>
                                <option value="Jasa">Jasa</option>
                            </select><br/>
                        </div>
                        <div class="col-lg-3">
                            <label>Stok</label>
                            <input type="text"  name="stok" class="form-control" value="0"><br/>
                        </div>
                        <div class="col-lg-3">
                            <label>Berat (gram)</label><br/>
                            <input type="text"  name="berat" class="form-control" value="0"><br/>
                        </div>
                        <div class="col-lg-6">
                            <label>Publish</label><br/>
                            <div class="form-control">
                                <input type="radio"  name="publish" value="Y" checked> Y &nbsp;&nbsp;&nbsp;
                                <input type="radio"  name="publish" value="N"> N
                            </div><br/>  
                        </div>
                    </div>
                    <div class="col-lg-4">  
                        <label>Gambar</label>
                        <input type="file" name="userfile" class="form-control"><br/>  
                    </div>
                    <div class="col-lg-12">
                        <label>Keterangan</label>
                        <textarea name="ket" class="summernote" id="summernote" title="Contents"></textarea>
                        <input type="submit" class="btn btn-sm btn-primary"> <input type="reset" class="btn btn-sm btn-default"><br/>
                    </div>    
                </form> 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->