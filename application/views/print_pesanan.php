<style>
    * {
        font-family: Arial;
        font-size: 11.5px;
      }

      h1 {
        font-size: 16px;
      }
      
      .tb-border {
        border: 1px solid #000;
        border-spacing: 0;
        border-collapse: collapse;
      }

      .doc {
        font-size: 16px;
        font-weight: bold;
      }
        
    .bold {
        font-weight: bold;
    }

    .neat {
        line-height: 1.5;
    }

    .right{
        text-align:right;
    }
</style>
<?php if (($this->session->userdata('baru_pesan')) && ($this->cart->total_items() == 0)) { 
    $baru_pesan = $this->session->userdata('baru_pesan')?>
        <table width= "900px" cellpadding="5" cellspacing="5" class="tb-border" border="1">
              <tr>
                <td><h1>NO. PESANAN</h1></td><td><h1><?=$baru_pesan['id'];?></h1></td>
              </tr>
              <tr>  
                <td>NAMA LENGKAP</td><td><?=$baru_pesan['nama'];?></td>
              </tr>  
              <tr>
                <td>EMAIL</td><td><?=$baru_pesan['email'];?></td>
              </tr>  
              <tr>
                <td>NO. HP</td><td><?=$baru_pesan['hp'];?></td>
              </tr>  
              <tr>
                <td>TANGGAL PESAN</td><td><?=tanggal($baru_pesan['tanggal']);?></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                  <td>PROVINSI</td><td><?=$baru_pesan['provinsi'];?></td>
              </tr>
              <tr>  
                  <td>KABUPATEN</td><td><?=$baru_pesan['kabupaten'];?></td>
              </tr>
              <tr>  
                  <td>KECAMATAN</td><td><?=$baru_pesan['kecamatan'];?></td>
              </tr>
              <tr>  
                  <td>DETAIL ALAMAT</td><td><?=$baru_pesan['alamat'];?></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>  
                  <td colspan="2"><b style="color:#C72031;">Jika pesanan sebelum 3 hari pembayaran belum di transfer, maka pesanan akan dibatalkan!</b></td>
              </tr>

        </table>
<?php } ?>    
                
<script>
 window.print(); //this triggers the print

   setTimeout("closePrintView()", 3000); //delay required for IE to realise what's going on

   window.onafterprint = closePrintView(); //this is the thing that makes it work i

   function closePrintView() { //this function simply runs something you want it to do

      document.location.href = "<?=base_url()?>home/keranjang"; //in this instance, I'm doing a re-direct

   }
</script>