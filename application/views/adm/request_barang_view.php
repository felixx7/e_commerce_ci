        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Request Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-send"></i> <a href="<?=base_url();?>adm/request_barang"> Request Barang</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-send"></i> View Request Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-sm-12 col-lg-12 col-md-12">

                    <div class="col-sm-6 ">
                        <img src="<?=base_url();?>images/request/<?=$tampil['gambar'];?>" width="100%" alt=""><br/>
                    </div>  
                    <div class="col-sm-6">      
                        <p><b><?=$tampil['nama'];?></b></p>
                        <p><?=$tampil['email'];?></p>
                        <p><i><?=$tampil['kategori'];?></i></p>
                        <hr>
                        <p><?=$tampil['keterangan'];?></p>
                        <hr>
                        <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                        <a href="<?=base_url();?>adm/request_proses/<?=$this->uri->segment(3);?>" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Proses</a> 
                        <a href="<?=base_url();?>adm/request_proses_batal/<?=$this->uri->segment(3);?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Batalkan Proses</a>  
                    </div>
   
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->