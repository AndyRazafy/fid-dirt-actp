<!DOCTYPE html>
<html>
  	<head>
	    <title>FID - ACTP login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- Bootstrap -->
	    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	    <!-- styles -->
	    <link href="<?php echo base_url('assets/css/styles.css');?>" rel="stylesheet">
	</head>
  	<body class="login-bg">

  		<div class="header">
            <div class="container">
                <div class="row">
                	<div class="col-md-5">
                	</div>
                    <div class="col-md-7">
                        <div class="navbar navbar-inverse" role="banner">
                            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                    	<li class="active"><a href="<?php echo site_url('Base_Controller'); ?>">Login</a></li>
                                        <li><a href="<?php echo site_url('Inscription_Controller'); ?>">Inscription</a></li>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
             </div>
        </div>

		<div class="page-content container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="login-wrapper">
				        <div class="box">
				            <div class="content-wrap">
				            	<?php
	                                echo $this->session->flashdata('error');
	                            ?>
				            	<div class="col-lg-12" style="margin: 5% 0; padding: 0;">
				            		<img style="max-width: 75%;" src="<?php echo base_url('assets/images/fid/logo/logo.jpg'); ?>">
				            	</div>
				                
				                
				                <form action="<?php echo site_url('Login_Controller/connexion');?>" method="POST">
					                <input type="text" class="form-control" name="email" placeholder="email" required="required">
					                <input type="password" class="form-control" name="motdepasse" placeholder="mot de passe" required="required">
					                <input class="btn btn-primary signup" type="submit" value="Connexion"/>
					            </form>             
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
  	</body>
</html>