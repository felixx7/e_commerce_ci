<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>rajaongkir/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>rajaongkir/css/skeleton.css">
	<script type="text/javascript" src="<?=base_url();?>rajaongkir/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>rajaongkir/js/script.js"></script>
	<title>Checkout</title>
</head>
<body>
	<div class="container">
		<form action="<?=base_url();?>home/checkout_save" method="post">
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

			<div class="row">
				<br/>
				<div class="twelve columns"><h1>Data</h1></div>
			</div>
            <label>Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="twelve columns" required><br/>
            <label>Email</label>
            <input type="email" name="email" id="email" class="twelve columns" required><br/>
            <label>No. Handphone</label>
            <input type="text" name="hp" id="hp" class="twelve columns" required maxlength="20"><br/>
		<div class="row">
			<br/>
			<div class="twelve columns"><h1>Hitung Ongkos Kirim</h1></div>
		</div>
		<div class="row">
			<div class="twelve columns"><h5>Masukan Data</h5></div>
		</div>
		<div class="row">
			<!-- <form method="POST" action="gettotal.php"> -->
			<div class="four columns">
				Dari<br/>
				<!--<select id="oriprovince">
					<option>Provinsi</option>
				</select>
				<br/>
				<select name="oricity" id="oricity">
					<option>Kota</option>
				</select>-->
				<br/>
				Jakarta Barat			
			</div>
			<div class="four columns">
				Tujuan<br/>
				<select id="desprovince" name="provinsi" onclick="get();" required>
					<option>Provinsi</option>
				</select>
				<br/>
				<select name="descity" id="descity" name="descity" onclick="gett();" required>
					<option>Kota</option>
				</select>
	            <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required><br/>
	            <input type="text" name="desa" id="desa" placeholder="Kelurahan/Desa" required><br/>
	            <textarea name="alamat" id="alamat" rows="8" cols="30" placeholder="Rt, Rw, Nama Jalan, Nama Perumahan, dan No.Rumah/Blok No."required></textarea><br/> 
			</div>
			<div class="two columns">
				Layanan<br/>
				<select name="service" id="service" required>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select> 
				<br/>
				Berat (gram)<br/>
				<input name="weight"  style="width:100px" id="berat" type="number" value="<?=$sum;?>" required>
			</div>
			<div class="two columns">
				<br/>
				<input type="button" onclick="cekHarga()" value="Cek Harga" id="cek_harga">
			</div>
			<!-- </form> -->
		</div>
		<div class="row">
			<div class="twelve columns"><h5>Harga</h5></div>
			
			<hr/>
			<table class="twelve columns">
				<thead>
				<tr>
					<th>Kurir</th>
					<th>Servis</th>
					<th>Deskripsi Servis</th>
					<th>Lama Kirim (hari)</th>
					<th>Total Biaya (Rp)</th>
					<th>Pilih</th>
				</tr>
				</thead>
				<tbody id="resultsbox"></tbody>
			</table>
		</div>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<div class="row">
		<div class="u-pull-right">
		<table>
			<tr>
				<td>Sub Total</td><td>Rp.</td><td><h4><?=$this->cart->total();?></h4></td><td><h4>,-</h4></td>
			</tr>
			<tr>	
				<td>Total (Sub Total + Ongkir)</td><td>Rp.</td><td><h4><div id="total"><?=$this->cart->total();?></div></h4></td><td><h4>,-</h4></td>
			</tr>
		</table>
		<input type="hidden" value="<?=$this->cart->total();?>" id="subtotal" name="subtotal">
		<input type="hidden" value="" id="totalongkir" name="totalongkir">
		<input type="hidden" value="" id="prov" name="prov">
		<input type="hidden" value="" id="kota" name="kota">	
		</div>
		</div>
		<div class="row">
			<div id="test"></div>
        </div>
        </form>
	</div>
	<script>
		function getValue() {
		    var pil = $('input[name="pilih"]:checked').val();
		    var subtotal = document.getElementById("subtotal").value;
		    parseInt(pil);
			document.getElementById("total").innerHTML = parseInt(pil) + parseInt(subtotal);
			document.getElementById("totalongkir").value = parseInt(pil) + parseInt(subtotal);

			$(document).one("click",function(){
				$("#test").html("<div class='u-pull-right'><a href='<?=base_url();?>home/checkout_save'><button class='pull-right btn btn-success' onclick='order();'><i class='glyphicon glyphicon-shopping-cart'></i> Pesan</button></a></div>");
			});
		}

		function get() {
			var pil = $('#desprovince option:selected').text();
			document.getElementById("prov").value = pil;
		}

		function gett() {
			var pil = $('#descity option:selected').text();
			document.getElementById("kota").value = pil;
		}
	</script>
</body>
</html>