            <div class="col-md-9">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li>
                                <b>Checkout</b>
                            </li>
                        </ol>
                    </div>
                </div>

                <?php if ($this->session->flashdata('captcha')) { ?>
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
                        <form action="<?=base_url();?>home/checkout_save" method="post">
                            <label>Nama Lengkap*</label>
                            <input type="text" name="nama" id="nama" class="form-control" required><br/>
                            <label>Email*</label>
                            <input type="email" name="email" id="email" class="form-control" required><br/>
                            <label>No. Handphone*</label>
                            <input type="text" name="hp" id="hp" class="form-control" required maxlength="20"><br/>
                            <label>Alamat Tujuan Pengiriman</label><br/><br/>
                            <label>Provinsi*</label>
                            <select name="provinsi" id="provinsi" class="form-control" required>
                                
                            </select><br/>
                            <label>Kota*</label>
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                
                            </select><br/>
                            <label>Kecamatan*</label>
                            <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan*" required><br/>
                            <label>Kelurahan/Desa*</label>
                            <input type="text" name="desa" id="desa" class="form-control" placeholder="Kelurahan/Desa*" required><br/>
                            <label>Alamat Lenkap*</label>
                            <textarea name="alamat" id="alamat" rows="8" cols="40" class="form-control" placeholder="Rt, Rw, Nama Jalan, Nama Perumahan, dan No.Rumah/Blok No.*"required></textarea><br/>
                            <label>Captcha*</label><br/>
                            <?=$captcha['image'];?>&nbsp;&nbsp;
                            <input type="text" name="captcha" style="height:35px;" placeholder="Captcha*" required>
                            <input type="hidden" name="captcha_confirm" value="<?=$captcha['word'];?>">
                            <br/><br/>
                            *) Wajib Diisi <br/><br/>
                            <a href="javascript:window.history.go(-1);" class="btn btn-primary"><i class="glyphicon glyphicon-share-alt"></i> Kembali</a>
                            <a href="<?=base_url();?>home/checkout_save"><button class="pull-right btn btn-success" onclick="order();"><i class="glyphicon glyphicon-shopping-cart"></i> Order</button></a>
                            <?php $sum=0;$no=1; foreach($cart as $barang){ ?>
                                <input type="hidden" name="nama_barang[]" value="<?=$barang['name'];?>"/>
                                <input type="hidden" name="gambar[]" value="<?=$barang['gambar'];?>"/>
                                <input type="hidden" name="kode_barang[]" value="<?=$barang['id'];?>"/>
                                <input type="hidden" name="qty[]" value="<?=$barang['qty'];?>"/>
                                <input type="hidden" name="harga[]" value="<?=$barang['price'];?>"/>
                                <input type="hidden" name="kategori[]" value="<?=$barang['kategori'];?>"/>
                                <input type="hidden" name="berat2[]" value="<?=$barang['berat'];?>"/>
                                <?php $sum+= $barang['berat'] * $barang['qty'];?>
                            <?php } ?>
                            <input type="hidden" name="total" value="<?=$this->cart->total();?>"/>
                            <input type="hidden" name="berat" value="<?=$sum;?>"/>
                        </form>
                    </div>
                </div>

            </div>

            <script>
                document.getElementById("nama").value = localStorage.getItem('nama');
                document.getElementById("email").value = localStorage.getItem('email');
                document.getElementById("hp").value = localStorage.getItem('hp');
                document.getElementById("provinsi").value = localStorage.getItem('provinsi');
                document.getElementById("kabupaten").value = localStorage.getItem('kabupaten');
                document.getElementById("kecamatan").value = localStorage.getItem('kecamatan');
                document.getElementById("desa").value = localStorage.getItem('desa');
                document.getElementById("alamat").value = localStorage.getItem('alamat');

                function order(){
                    localStorage.setItem("nama",document.getElementById('nama').value);
                    localStorage.setItem("email",document.getElementById('email').value);
                    localStorage.setItem("hp",document.getElementById('hp').value);
                    localStorage.setItem("provinsi",document.getElementById('provinsi').value);
                    localStorage.setItem("kabupaten",document.getElementById('kabupaten').value);
                    localStorage.setItem("kecamatan",document.getElementById('kecamatan').value);
                    localStorage.setItem("desa",document.getElementById('desa').value);
                    localStorage.setItem("alamat",document.getElementById('alamat').value);
                }
            </script>
