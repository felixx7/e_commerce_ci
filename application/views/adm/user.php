        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="glyphicon glyphicon-home"></i>  <a href="<?=base_url();?>adm">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-user
                                "></i> User
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <form action="<?=base_url();?>adm/user_update/<?=$user['id'];?>" method="post">
                    <div class="col-sm-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?=$user['username'];?>" readonly><br/>
                        <label>Password Lama</label>
                        <input type="password" name="old_password" class="form-control" value="" required><br/>
                        <label>Password Baru</label>
                        <input type="password" name="new_password" class="form-control" value="" required><br/>
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="new_password_again" class="form-control" value="" required><br/>
                        
                        <input type="hidden" name="password" class="form-control" value="<?=$user['password'];?>">
                        
                        <button class="btn btn-success" type="submit">Change Password</button>
                        <button class="btn btn-default" type="reset">Reset</button>
                    </div>
                </form>  
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->