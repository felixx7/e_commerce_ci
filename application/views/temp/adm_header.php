<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fakoelture - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/adm/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>assets/adm/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?=base_url();?>assets/adm/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/adm/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Datatable -->
    <link href="<?=base_url();?>assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url();?>assets/summernote/summernote.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url();?>assets/bootstrap/datepicker.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>adm">Fakoeltur Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?=$this->session->userdata('login_admin')['username'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=base_url();?>login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if($this->uri->segment(2) == ''){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'barang'){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm/barang"><i class="glyphicon glyphicon-briefcase"></i> Barang</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'pesanan'){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm/pesanan"><i class="glyphicon glyphicon-shopping-cart"></i> Pesanan</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'request_barang'){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm/request_barang"><i class="glyphicon glyphicon-send"></i> Request Barang</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'komentar'){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm/komentar"><i class="fa fa-comments"></i> Komentar</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == 'user'){ echo 'active'; } ?>">
                        <a href="<?=base_url();?>adm/user"><i class="glyphicon glyphicon-user"></i> User</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>