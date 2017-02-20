        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Komentar
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-comments"></i> Komentar
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if ($this->session->flashdata('komentar_delete')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Menghapus</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <table class="datatable table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="20px">No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tampilkan</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tampilkan</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1;
                        foreach($komentar as $tampil){  ?>
                        <tr>
                            <td><?=$no++;?></td>
                            <?php 
                                $id = $tampil['id_barang'];
                                $data_barang = $this->m_adm->data_barang($id);
                            ?>
                            <td>#<?=$data_barang['kategori'];?>-<?=$data_barang['id'];?></td>
                            <td><?=substr($data_barang['nama_barang'],0,15);?></td>
                            <td><?=substr($tampil['nama'],0,15);?></td>
                            <td><?=substr($tampil['email'],0,25);?></td>
                            <td><?=$tampil['tampilkan'];?></td>
                            <td><?=tanggal($tampil['tanggal']);?></td>
                            <td>
                                <a href='#' data-toggle='modal' data-target='#view-<?=$tampil['id']; ?>' class="btn btn-xs btn-success"><i class="glyphicon glyphicon-new-window"></i></a>
                                <a href='#' data-toggle='modal' data-target='#delete-<?=$tampil['id']; ?>' class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        <!-- delete -->
                        <div class='modal fade' id='delete-<?=$tampil['id']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='myModalLabel'>Hapus Komentar</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Hapus <b><?=$tampil['nama']; ?></b> ?</p>
                                        <a href='<?=base_url();?>adm/komentar_delete/<?=$tampil['id'];?>' class='btn btn-sm btn-danger'>Yes</a>
                                        <button type='button' class='btn btn-sm btn-default' data-dismiss='modal'>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- view -->
                        <div class='modal fade' id='view-<?=$tampil['id']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                        <h4 class='modal-title' id='myModalLabel'>Komentar</h4>
                                    </div>
                                    <div class='modal-body'>
                                        <label><?=$tampil['nama']; ?></label> <i><?=$tampil['email']; ?></i>
                                        <p><?=$tampil['komentar']; ?></p>
                                        <p><i><?=tanggal($tampil['tanggal']);?></i></p><br/>
                                        <form action="<?=base_url();?>adm/komentar_balas/<?=$tampil['id']; ?>" method="post">
                                            <p><input type="checkbox" name="tampilkan" value="Y" <?php if($tampil['tampilkan'] == 'Y'){ echo "checked"; }?>> Tampilkan komentar pada web</p>
                                            <input type="text" name="dari" class="form-control" placeholder="Dari" value="<?=$tampil['dari'];?>"><br/>
                                            <textarea name="balas" rows="8" cols="20" class="form-control" placeholder="Balas" ><?=$tampil['balas'];?></textarea><br/>
                                            <button type='submit' class='btn btn-sm btn-success'>Submit</button>
                                        </form>    
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