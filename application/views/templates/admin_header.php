<!DOCTYPE html>
<html>
    <head>
        <title>FID - ACTP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- styles -->
        <link href="<?php echo base_url('assets/css/styles.css'); ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
             <div class="container">
                <div class="row">
                   <div class="col-md-5">
                      <!-- Logo -->
                      <div class="logo">
                         <h1><a href="index.html">FID - ACTP</a></h1>
                      </div>
                   </div>
                   <div class="col-md-7">
                      <div class="navbar navbar-inverse" role="banner">
                          <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['prenom']; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu animated fadeInUp">
                                      <li><a href="<?php echo site_url('Login_Controller/deconnexion'); ?>">Deconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>
                          </nav>
                      </div>
                   </div>
                </div>
             </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar content-box" style="display: block;">
                        <ul class="nav">
                            <!-- Main menu -->
                            <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Tableau de bord</a></li>
                            <li class="submenu">
                                <a href="#">
                                    <i class="glyphicon glyphicon-list"></i> Recherche
                                    <span class="caret pull-right"></span>
                                </a>
                                 <!-- Sub menu -->
                                <ul>
                                    <li><a href="#">Terroir</a></li>
                                    <li><a href="#">Groupe travail</a></li>
                                    <li><a href="#">Intervention</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>