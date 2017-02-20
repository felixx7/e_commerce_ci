<!DOCTYPE html>
<html lang="en">
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="//v2.zopim.com/?3kh0z7VpwecCrkobUde7tPx1BJnBmS55";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fashion, Kuliner, dan Jasa">
    <meta name="author" content="Fakoeldjas">
    <meta name="keywords" content="Fashion Kuliner Jasa" />

    <title>Fakoelture</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/e/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/e/css/shop-homepage.css" rel="stylesheet">

    <link href="<?=base_url();?>assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header font">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>home">Fakoelture</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav font">
                    <li>
                        <a href="<?=base_url();?>home" <?php if($this->uri->segment(2) == ''){ echo 'style=color:#fff;'; } ?> >Beranda</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>home/cara_pembelian" <?php if($this->uri->segment(2) == 'cara_pembelian'){ echo 'style=color:#fff;'; } ?>>Cara Pembelian</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>home/cek_pesanan" <?php if($this->uri->segment(2) == 'cek_pesanan'){ echo 'style=color:#fff;'; } ?>>Cek Pesanan</a>
                    </li>
                    <li>
                        <a href="<?=base_url();?>home/request_barang" <?php if($this->uri->segment(2) == 'request_barang'){ echo 'style=color:#fff;'; } ?>>Request</a>
                    </li>  
                    <li>
                        <a href="<?=base_url();?>home/keranjang" <?php if($this->uri->segment(2) == 'keranjang'){ echo 'style=color:#fff;'; } ?>><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang <span class="badge" style="background:#C72031;">&nbsp;<?=$this->cart->total_items();?>&nbsp;</span></a>
                    </li>     
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <!-- child of the body tag -->
    <span id="top-link-block" class="hidden">
        <a href="#top" class="well well-sm" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
            <i class="glyphicon glyphicon-chevron-up"></i>
        </a>
    </span>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <hr>
                <div class="font"><h1>FAKOELTURE</h1></div>
                <hr>
                <div class="list-group font">
                    <h4>
                        <a href="<?=base_url();?>home/fashion" class="list-group-item" <?php if($this->uri->segment(2) == 'fashion'){ echo 'style=background-color:#f0f0f0;'; } ?>><div style="margin:15px;">Fashion</div></a>
                        <a href="<?=base_url();?>home/kuliner" class="list-group-item" <?php if($this->uri->segment(2) == 'kuliner'){ echo 'style=background-color:#f0f0f0;'; } ?>><div style="margin:15px;">Kuliner</div></a>
                        <a href="<?=base_url();?>home/jasa" class="list-group-item" <?php if($this->uri->segment(2) == 'jasa'){ echo 'style=background-color:#f0f0f0;'; } ?>><div style="margin:15px;">Jasa</div></a>
                    </h4>
                </div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/face book.png" width="35px" height="35px"/></a>&nbsp;Facebook</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/twitter.png" width="35px" height="35px"/></a>&nbsp;Twitter</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/instagram.png" width="35px" height="35px"/></a>&nbsp;Instagram</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/pinterest.png" width="35px" height="35px"/></a>&nbsp;Pinterest</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/blog.png" width="35px" height="35px"/></a>&nbsp;Blogger</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/youtube.png" width="35px" height="35px"/></a>&nbsp;Youtube</div>
                <div style="margin:15px;"><a href="#"><img src="<?=base_url();?>images/sm/linked in.png" width="35px" height="35px"/></a>&nbsp;Linked In</div>
                <div class="list-group">
                    <?php $cara_pembelian = $this->m_home->tampil_cara_pembelian();?>
                    <p>
                        <?=$cara_pembelian['isi'];?>
                    </p>
                </div>
            </div>