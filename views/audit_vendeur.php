<?php
session_start();
if ($_SESSION["username"] != null) {
    ?>
    <!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>TP TRIGGER</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.5 -->
            <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="style/font-awesome/css/font-awesome.min.css">
            <!-- Ionicons -->
            <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
            <!-- DataTables -->
            <link rel="stylesheet" href="style/plugins/datatables/dataTables.bootstrap.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
            <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                  page. However, you can choose any other skin. Make sure you
                  apply the skin class to the body tag so the changes take effect.
            -->
            <link rel="stylesheet" href="style/dist/css/skins/skin-blue.min.css">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style>
                #example1_length{
                    display: none;
                }
            </style>
        </head>
        <!--
        BODY TAG OPTIONS:
        =================
        Apply one or more of the following classes to get the
        desired effect
        |---------------------------------------------------------|
        | SKINS         | skin-blue                               |
        |               | skin-black                              |
        |               | skin-purple                             |
        |               | skin-yellow                             |
        |               | skin-red                                |
        |               | skin-green                              |
        |---------------------------------------------------------|
        |LAYOUT OPTIONS | fixed                                   |
        |               | layout-boxed                            |
        |               | layout-top-nav                          |
        |               | sidebar-collapse                        |
        |               | sidebar-mini                            |
        |---------------------------------------------------------|
        -->
        <body class="hold-transition skin-blue sidebar-mini">
            <div class="wrapper">

                <!-- Main Header -->
                <header class="main-header">

                    <!-- Logo -->
                    <a href="#" class="logo">
                        <!-- mini logo for sidebar mini 50x50 pixels -->

                        <!-- logo for regular state and mobile devices -->
                        <span class="logo-lg"><b>TRIGGER </b>VENDEUR</span>
                    </a>

                    <!-- Header Navbar -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->

                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <img src="style/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"><?php print $_SESSION["username"] ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <img src="style/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            <p>
                                                <?php print $_SESSION["username"] ?> - Web Developer
                                                <small>Member since Nov. 2012</small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="http://localhost/trigger/controllers/DestroySession.php" class="btn btn-default btn-flat">Déconnexion</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!-- Control Sidebar Toggle Button -->
                                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">

                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">

                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="style/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <div class="pull-left info">
                                <p><?php print $_SESSION["username"] ?></p>
                                <!-- Status -->
                                <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <ul class="sidebar-menu">
                            <li class="header">TRIGGER</li>
                            <!-- Optionally, you can add icons to the links -->
                            <li><a href="index.php"><i class="fa fa-users"></i> <span>Vendeur</span></a></li>
                            <li><a href="recette_vendeur.php"><i class="fa fa-money"></i> <span>Recette vendeur</span></a></li>
                            <li class="active">
                                <a href="audit_vendeur.php"><i class="fa fa-cog"></i> <span>Audit Vendeur</span></a>
                            </li>
                            <li>
                                <a href="recette_periode.php"><i class="fa fa-cogs"></i> <span>Divers</span></a>
                            </li>
                           
                        </ul><!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            VENDEUR
                            <small>Audit vendeur</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i> Acceuil</a></li>
                            <li class="active">Audit</li>
                        </ol>
                    </section>
                    <div style="" class="margin" id="info-delete"></div>
                    <!-- Main content -->
                    <section class="content">

                        <!-- START ALERTS AND CALLOUTS -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <i class="fa fa-list-alt"></i>
                                        <h3 class="box-title">Liste vendeur</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="table_vendeur_audit"></div>
                                    </div>
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div> <!-- /.row -->
                        <!-- END ALERTS AND CALLOUTS -->
                        <!-- Your Page Content Here -->
                    </section><!-- /.content -->
                </div><!-- /.content-wrapper -->
                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">
                        Ecole Nationale d'Informatique
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2017 <a href="#">ENI</a>.</strong> Projet Trigger.
                </footer>
            </div><!-- ./wrapper -->

            <!-- REQUIRED JS SCRIPTS -->

            <!-- jQuery 2.1.4 -->
            <script src="style/plugins/jQuery/jQuery-2.1.4.min.js"></script>
            <!-- Bootstrap 3.3.5 -->
            <script src="style/bootstrap/js/bootstrap.min.js"></script>
            <!-- AdminLTE App -->
            <script src="style/dist/js/app.min.js"></script>

            <!-- Optionally, you can add Slimscroll and FastClick plugins.
                 Both of these plugins are recommended to enhance the
                 user experience. Slimscroll is required when using the
                 fixed layout. -->

            <script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="style/plugins/datatables/dataTables.bootstrap.min.js"></script>
            <!-- SlimScroll -->
            <script src="style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="style/plugins/fastclick/fastclick.min.js"></script>
            <!-- AdminLTE App -->
            <script src="style/dist/js/app.min.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="style/dist/js/demo.js"></script>
            <!-- page script -->
            <script src="js/app_v.js"></script>
        </body>
    </html>
    <?php
} else
    header('Location: ../index.php');
?>