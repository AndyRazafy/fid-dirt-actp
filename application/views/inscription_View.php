<!DOCTYPE html>
<html>
  	<head>
	    <title>FID - ACTP login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                    	<li><a href="<?php echo site_url('Base_Controller'); ?>">Identification</a></li>
                                        <li class="active"><a href="<?php echo site_url('Inscription_Controller'); ?>">Inscription</a></li>
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
				            		<img style="max-width: 75%;" src="<?php echo base_url('assets/pictures/fid/logo/logo.jpg'); ?>">
				            	</div>
				                
	                            <form action="<?php echo site_url('Inscription_Controller/inscription');?>" method="POST">
					                <div class="form-group text-left">
										<label>Nom</label>
										<input class="form-control" type="text" name="nom" placeholder="nom" value="<?php echo $nom; ?>" required>
									</div>
									<div class="form-group text-left">
										<label>Prenom</label>
										<input class="form-control" type="text" name="prenom" placeholder="prenom" value="<?php echo $prenom; ?>" required>
									</div>
									<div class="form-group text-left">
										<label>pseudo</label>
										<input class="form-control" type="text" name="pseudo" placeholder="pseudo" value="<?php echo $pseudo; ?>" required>
									</div>
									<div class="form-group text-left">
										<label>date de naissance</label>
										<input class="form-control" type="date" name="datenaissance" required>
									</div>
									<div class="form-group text-left">
										<label>email</label>
										<input class="form-control" type="email" name="email" placeholder="email" value="<?php echo $email; ?>"required>
									</div>
									<div class="form-group text-left">
										<label>mot de passe</label>
										<input class="form-control" type="password" name="motpasse1" placeholder="mot de passe" required>
									</div>
									<div class="form-group text-left">
										<label>confirmer mot de passe</label>
										<input class="form-control" type="password" name="motpasse2" placeholder="confirmer mot de passe">
									</div>
					                <div class="form-group">
					                    <button type="submit" class="btn btn-primary">s'inscrir</a>
					                </div>    
					            </form>            
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
  	</body>
</html>