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
                #example2_length{
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
                                <a href="#"><i class="fa fa-cogs"></i> <span>Divers</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <!-- <ul class="treeview-menu">
                                    <li><a href="#">Audit</a></li>
                                    <li><a href="#">Recette par Jours</a></li>
                                    <li><a href="#">Recette par mois</a></li>
                                    <li><a href="#">Recette par mois vendeurs</a></li>
                                </ul>  -->
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
                            RECETTE
                            <small>Par période</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i> Acceuil</a></li>
                            <li class="active">Recette par période</li>
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">

                        <!-- START ALERTS AND CALLOUTS -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <i class="fa fa-calendar"></i>
                                        <h3 class="box-title" id="box-title-form">Choisir</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">

                                        <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Recette par jour
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2017/05/18</td>
                        <td>2000</td>
                        <td><a href="#"><i class="fa fa-trash"></i> </a> | <a href="#"> <i class="fa fa-edit"></i></a></td>
                      </tr>
                      <tr>
                        <td>2017/05/19</td>
                        <td>2000</td>
                        <td><a href="#"><i class="fa fa-trash"></i> </a> | <a href="#"> <i class="fa fa-edit"></i></a></td>
                      </tr>
                
                    </tbody>
                    
                  </table>
                         </div>
                      </div>
                    </div>
                    <div class="panel box">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Recette par mois
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="box-body">
                            <div class="row">
                            <div class="col-md-4">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                     <h3 class="box-title" id="box-title-form">Choisir année</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                    <form action="" method="">
                                        <select class="form-control select2" style="width: 100%;" id="annee">
                                        <option value="">année 1</option>
                                        <option value="">année 2</option>
                                        <option value="">année 3</option>
                                        <option value="">ze année misy</option>
                                        </select>

                                        <select class="form-control select2" style="width: 100%;" id="mois">
                                        <option value="1">Janvier</option>
                                        <option value="2">Février</option>
                                        <option value="3">Mars</option>
                                        <option value="4">Avril</option>
                                        <option value="5">Mai</option>
                                        <option value="6">Juin</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Août</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Novembre</option>
                                        <option value="12">Décembre</option>
                                        </select>
                                        <br>
                                        <button type="button" class="btn btn-primary">Afficher</button>
                                    </form>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                     <h3 class="box-title" id="box-title-form">Total du recette annuel : 250000 Ar</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th>Date</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>2017/05/18</td>
                                            <td>2000</td>
                                            <td><a href="#"><i class="fa fa-trash"></i> </a> | <a href="#"> <i class="fa fa-edit"></i></a></td>
                                          </tr>
                                          <tr>
                                            <td>2017/05/19</td>
                                            <td>2000</td>
                                            <td><a href="#"><i class="fa fa-trash"></i> </a> | <a href="#"> <i class="fa fa-edit"></i></a></td>
                                          </tr>
                                    
                                        </tbody>
                                        
                                      </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel box">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Recette par mois par vendeur
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="box-body">
                            Contenu recette par mois par vendeur
                        </div>
                      </div>
                    </div>
                  </div>

                                    </div><!-- /.box-body -->
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
             <script>
      $(function () {
        $("#example2").DataTable();
        
      });
    </script>
        </body>
    </html>
    <?php
} else
    header('Location: ../index.php');
?>