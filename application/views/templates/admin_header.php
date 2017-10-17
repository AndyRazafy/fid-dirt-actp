<!DOCTYPE html>
<html>
    <head>
        <title>FID - ACTP</title>
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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
                        <a href="<?php echo site_url('Base_Controller'); ?>">
                            <img style="max-width: 15%;" src="<?php echo base_url('assets/pictures/fid/logo/nav_logo.png'); ?>">
                        </a>
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
                            <li><a href="<?php echo site_url('Administration_Controller/dashboard'); ?>"><i class="glyphicon glyphicon-home"></i> Tableau de bord</a></li>
                            <li class="submenu">
                                <a href="#">
                                    <i class="glyphicon glyphicon-search"></i> Recherche
                                    <span class="caret pull-right"></span>
                                </a>
                                 <!-- Sub menu -->
                                <ul>
                                    <li><a href="<?php echo site_url('Terroir_Controller/recherche?page=1'); ?>">UTB</a></li>
                                    <li><a href="<?php echo site_url('GroupeTravail_Controller/recherche?page=1'); ?>">GT</a></li>
                                    <li><a href="<?php echo site_url('Prestataire_Controller/recherche?page=1'); ?>">Prestataire</a></li>
                                    <li><a href="<?php echo site_url('AgencePaiement_Controller/recherche?page=1'); ?>">Agence paiement</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#">
                                    <i class="glyphicon glyphicon-th-list"></i> Etats
                                    <span class="caret pull-right"></span>
                                </a>
                                 <!-- Sub menu -->
                                <ul>
                                    <li><a href="<?php echo site_url('Paiement_Controller/etatPaiement?page=1'); ?>">paiements</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#">
                                    <i class=""></i> Exporter
                                    <span class="caret pull-right"></span>
                                </a>
                                <ul>
                                    <li><a href="<?php echo site_url('Intervention_Controller/exportToExcel'); ?>"><i class=""></i> <button type="button" class="btn btn-primary" >BDD Excel</button></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>