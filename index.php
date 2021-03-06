<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trigger Vendeur</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="views/style/bootstrap/css/bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="views/style/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="views/style/plugins/iCheck/square/blue.css">
        <link href="views/style/dist/img/avatar.png" rel="icon">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>TRIGGER-</b>vendeur</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Connectez-vous pour ouvrir session</p>
                <form action="#" method="post" id="form-users">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="login">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" id="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div id="text-notif-login"></div>
                        <div class="col-xs-4">
                            <button type="button" onclick="checkUser()" id="form-users-submit" class="btn btn-primary btn-block btn-flat">Log in</button>
                        </div><!-- /.col -->
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.4 -->
        <script src="views/style/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="views/style/bootstrap/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="views/style/plugins/iCheck/icheck.min.js"></script>
        <script src="views/js/app_connect.js"></script>
    </body>
</html>
