        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Request Barang
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-send"></i> Request Barang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row --> 

                <?php if ($this->session->flashdata('request_delete')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Hapus Request</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <table class="datatable table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1;
                        foreach($request as $tampil){  ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <td><?=substr($tampil['nama'],0,40);?></td>
                            <td><?=substr($tampil['email'],0,40);?></td>
                            <td><?=$tampil['kategori'];?></td>
                            <td><?=tanggal($tampil['tanggal']);?></td>
                            <td>
                                <?php if($tampil['status'] == 'Y') { echo '<span class="badge" style="background:#84C720;">Sudah Diproses</span>';} 
                                    else { echo '<span class="badge" style="background:#C72031;">Belum Diproses</span>'; } ?>
                            </td>
                            <td>
                                <a href="<?=base_url();?>adm/request_barang_view/<?=$tampil['id'];?>" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-new-window"></i></a>
                                <a href='#' data-toggle='modal' data-target='#delete-<?=$tampil['id']; ?>' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        <div class='modal fade' id='delete-<?=$tampil['id']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='myModalLabel'>Hapus Request Barang</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Hapus <b><?=$tampil['nama']; ?></b> ?</p>
                                        <a href='<?=base_url();?>adm/request_barang_delete/<?=$tampil['id'];?>' class='btn btn-sm btn-danger'>Yes</a>
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