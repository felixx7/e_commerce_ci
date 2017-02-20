<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Fakoeldjas - login</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url();?>assets/e/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?=base_url();?>assets/e/css/shop-homepage.css" rel="stylesheet">
    </head>
    <body> 
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Silahkan Login</h3>
                        </div>
                        <div class="panel-body">
                            <form action="<?=base_url();?>login_validation" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="<?=base_url();?>assets/e/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url();?>assets/e/js/bootstrap.min.js"></script>
    </body>
</html>