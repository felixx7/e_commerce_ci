            <div class="col-md-9">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Requst</b>
                            </li>
                        </ol>
                    </div>
                </div>
                
                <?php if ($this->session->flashdata('request_barang')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Berhasil Request</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($this->session->flashdata('captcha_request')) { ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i>  <strong>Salah Masukan Captcha</strong>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-lg-12">
                        <p><b>Request</b> adalah tempat untuk mengirim permintaan agar dipertimbangkan oleh admin untuk dijual, 
                        <b>Bukan tempat memesan item</b>, jika ingin memesan item, lihat pada caranya di tab <b>Cara Pembelian</b></p>
                    </div>
                    <div class="col-lg-12">
                        <br/>
                    </div>
                </div>

                <div class="row">
                    <form action="<?=base_url();?>home/request_barang_proses" method="post" enctype="multipart/form-data">
                        <div class="col-lg-8">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama_r" class="form-control" required><br/>
                            <label>Email</label>
                            <input type="email" name="email" id="email_r" class="form-control" required><br/>
                            <label>Gambar</label>
                            <input type="file" name="userfile" class="form-control" required><br/>
                            <label>Kategori</label>
                            <select name="kategori" class="form-control" id="kategori_r">
                                <option value="Fashion">Fashion</option>
                                <option value="Kuliner">Kuliner</option>
                                <option value="Jasa">Jasa</option>
                            </select><br/>
                            <label>Keterangan</label>
                            <textarea name="keterangan" id="keterangan_r" rows="8" cols="40" class="form-control" required></textarea><br/>
                            <label>Captcha</label><br/>
                            <?=$captcha['image'];?>&nbsp;&nbsp;
                            <input type="text" name="captcha" style="height:35px;" placeholder="Captcha*" required>
                            <input type="hidden" name="captcha_confirm" value="<?=$captcha['word'];?>">
                            <br/><br/>
                            <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                            <a href="<?=base_url();?>home/status_request" class="btn btn-primary">Status Request</a>
                            <button class="pull-right btn btn-success"  onclick="order();">Request</button>
                        </div>
                    </form>    
                </div>

            </div>

            <script>
                document.getElementById("nama_r").value = localStorage.getItem('nama_r');
                document.getElementById("email_r").value = localStorage.getItem('email_r');
                document.getElementById("kategori_r").value = localStorage.getItem('kategori_r');
                document.getElementById("keterangan_r").value = localStorage.getItem('keterangan_r');

                function order(){
                    localStorage.setItem("nama_r",document.getElementById('nama_r').value);
                    localStorage.setItem("email_r",document.getElementById('email_r').value);
                    localStorage.setItem("kategori_r",document.getElementById('kategori_r').value);
                    localStorage.setItem("keterangan_r",document.getElementById('keterangan_r').value);
                }
            </script>
