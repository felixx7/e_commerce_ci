            <div class="col-md-9">

                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Cara Pembelian</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <table class="datatable table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20px">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width="20px">No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Gambar</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php $no=1;
                            foreach($status_request as $tampil){  ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$tampil['nama'];?></td>
                                <td><?=$tampil['email'];?></td>
                                <td><img src="<?=base_url();?>images/request/<?=$tampil['gambar'];?>" width="70px"></td>
                                <td><?=$tampil['kategori'];?></td>
                                <td><?=$tampil['keterangan'];?></td>
                                <td><?=tanggal($tampil['tanggal']);?></td>
                                <td>
                                    <?php if($tampil['status'] == 'Y') { echo '<span class="badge" style="background:#84C720;">Sudah Diproses</span>';} 
                                        else { echo '<span class="badge" style="background:#C72031;">Belum Diproses</span>'; } ?>
                                </td>
                            </tr>   
                        <?php } ?>    
                        </tbody>
                    </table>
                </div>

            </div>


