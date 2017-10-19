		<div class="col-lg-10">
			<div class="row">
				<div class="content-box-large">
					<div class="panel-heading">
						<div class="col-xs-12 panel-title">
							<h2>
								Tableau de bord
							</h2>
						</div>	
						<hr/>
					</div>
					<hr style="margin: 0;"/>
					<div class="panel-body">
		                <div class="content-box-large col-lg-3" style="margin: 2%;">
			  				<div class="panel-body" style="padding: 0%;">
		                        <div class="card">
		                            <div class="content">
		                                <div class="row">
		                                    <div class="col-lg-4">
	                                            <h3 style="margin: 0; padding: 0%;"><?php echo sizeof($terroirs); ?></h3>
	                                            <h4 style="margin: 0; padding: 0%;">UTB</h4>
		                                    </div>
		                                </div>
		                            </div>
	                                <div class="col-lg-12" style="padding: 0;">
	                                    <hr />
	                                    <div class="col-lg-5" style="padding: 0;">
		                                    <a href="<?php echo site_url('Terroir_Controller/recherche?page=1'); ?>">
		                                    	<i class="ti-reload"></i> VOIR
		                                   	</a>
		                                </div>
	                                </div>
		                        </div>
			                </div>
		  				</div>

		  				<div class="content-box-large col-lg-2" style="margin: 2%;">
			  				<div class="panel-body" style="padding: 0%;">
		                        <div class="card">
		                            <div class="content">
		                                <div class="row">
		                                    <div class="col-xs-7">
	                                            <h3 style="margin: 0; padding: 0%;"><?php echo count($groupeTravails); ?></h3>
	                                            <h4 style="margin: 0; padding: 0%;">GT</h4>
		                                    </div>
		                                </div>
		                                <a href="<?php echo site_url('GroupeTravail_Controller/recherche?page=1'); ?>">
			                                <div class="footer">
			                                    <hr />
			                                    <i class="ti-reload"></i> VOIR
			                                </div>
			                            </a>
		                            </div>
		                        </div>
			                </div>
		  				</div>

		  				<div class="content-box-large col-lg-3" style="margin: 2%;">
			  				<div class="panel-body" style="padding: 0%;">
		                        <div class="card">
		                            <div class="content">
		                                <div class="row">
		                                    <div class="col-lg-12">
	                                            <h3 style="margin: 0; padding: 0%;"><?php echo count($paiements); ?></h3>
	                                            <h4 style="margin: 0; padding: 0%;">PAIEMENT(S) EN ATTENTE</h4>
		                                    </div>
		                                </div>
		                                <a href="<?php echo site_url('Paiement_Controller/etatPaiement?page=1'); ?>">
			                                <div class="footer">
			                                    <hr />
			                                    <i class="ti-reload"></i> VOIR
			                                </div>
			                            </a>
		                            </div>
		                        </div>
			                </div>
		  				</div>
			        </div>
			    </div>
		    </div>
	  	</div>