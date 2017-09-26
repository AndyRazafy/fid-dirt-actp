<!DOCTYPE html>
<html>
    <head>
        <title>Call Center</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
        <!-- styles -->
        <link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

          <!-- Angular JavaScript -->
        <script src="<?php echo base_url('assets/js/angular.min.js');?>"></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <!-- Logo -->
                        <div class="logo">
                            <h1><a href="index.html">Call Center - Manager</a></h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="navbar navbar-inverse" role="banner">
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Compte <b class="caret"></b></a>
                                        <ul class="dropdown-menu animated fadeInUp">
                                            <li><a href="<?php echo site_url('Login_Controller/disconnect');?>">Deconnexion</a></li>
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
                            <li class="submenu">
                                 <a href="#">
                                    <i class=""></i> Agent
                                    <span class="caret pull-right"></span>
                                 </a>
                                 <!-- Sub menu -->
                                 <ul>
                                    <li><a href="<?php echo site_url('Agent_Controller/createNewAgentPage');?>"><i class="glyphicon glyphicon-plus"></i> Nouveau</a></li>
                                    <li><a href="<?php echo site_url('Agent_Controller/search/?page=1');?>"><i class="glyphicon glyphicon-list-alt"></i> Liste</a></li>
                                    <!--<li><a href="<?php echo site_url('Agent_Controller/etat');?>"><i class="glyphicon glyphicon-signal"></i> Etats</a></li>-->
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url('Appel_Controller/search');?>"><i class=""></i> Appels</a></li>
                        </ul>
                    </div>
                </div>