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
			                                    <div class="col-xs-7">
		                                            <h3 style="margin: 0; padding: 0%;"><?php echo sizeof($terroirs); ?></h3>
		                                            <h4 style="margin: 0; padding: 0%;">UTB</h4>
			                                    </div>
			                                </div>
			                                <a href="<?php echo site_url('Terroir_Controller/recherche?page=1&cp_pseudo='.$_SESSION['pseudo']); ?>">
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
			                                    <div class="col-xs-7">
		                                            <h3 style="margin: 0; padding: 0%;"><?php echo $nbGt; ?></h3>
		                                            <h4 style="margin: 0; padding: 0%;">GT</h4>
			                                    </div>
			                                </div>
			                                <a href="<?php echo site_url('GroupeTravail_Controller/recherche?page=1&cp_pseudo='.$_SESSION['pseudo']); ?>"">
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