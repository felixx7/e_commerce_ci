        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-briefcase"></i> Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if ($this->session->flashdata('barang_delete')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Menghapus</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('barang_tambah')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Menambah</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('barang_edit')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Edit</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <a href="<?=base_url();?>adm/barang_tambah" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</a><br/><br/>
                <table class="datatable table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Publish</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Publish</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1;
                        foreach($barang as $tampil){  ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td>#<?=$tampil['kategori'];?>-<?=$tampil['id'];?></td>
                            <td><?=substr($tampil['nama_barang'],0,20);?></td>
                            <td>Rp. <?php echo number_format($tampil['harga'],0,'.','.');?></td>
                            <td><?=$tampil['publish'];?></td>
                            
                            <td><?=tanggal($tampil['tanggal']);?></td>
                            <td>
                                <a href="<?=base_url();?>adm/barang_view/<?=$tampil['id'];?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-new-window"></i></a>
                                <a href="<?=base_url();?>adm/barang_edit/<?=$tampil['id'];?>" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                <a href='#' data-toggle='modal' data-target='#delete-<?=$tampil['id']; ?>' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        <div class='modal fade' id='delete-<?=$tampil['id']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='myModalLabel'>Hapus Barang</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Hapus <b><?=$tampil['nama_barang']; ?></b> ?</p>
                                        <a href='<?=base_url();?>adm/barang_delete/<?=$tampil['id'];?>' class='btn btn-sm btn-danger'>Yes</a>
                                        <button type='button' class='btn btn-sm btn-default' data-dismiss='modal'>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    <?php } ?>    
                    </tbody>
                </table>       
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->