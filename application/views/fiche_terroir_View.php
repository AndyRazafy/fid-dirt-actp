		<div class="col-md-10">
	  		<div class="row">
	  			<?php
		            echo $this->session->flashdata('info');
		        ?>
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="col-xs-12 panel-title text-center col-centered">
							<h4>
								UTB - <?php echo $terroir->getNom(); ?>
							</h4>
							<span class="text-muted text-size-small" ><?php echo $terroir->getDistrict()->getNom()." - ".$terroir->getDir()->getNom(); ?></span>
						</div>	
						<div class="panel-options">
							<button type="button" class="btn btn-primary" onclick="javascript:modifierUtb();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
			            </div>
					</div>

					<hr>

					<div class="panel-body">
						<form action="<?php echo site_url('Terroir_Controller/update'); ?>" method="POST" id="form">
							<div class="modal fade" id="utbModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">UTB</h4>
	                                    </div>
	                                    <div class="modal-body">				
											<input class="form-control" type="hidden" name="id" value="<?php echo $terroir->getId(); ?>">
											<input class="form-control" type="hidden" name="nom" value="<?php echo $terroir->getNom(); ?>">
											<input class="form-control" type="hidden" name="dir" value="<?php echo $terroir->getDir()->getId(); ?>">
											<input class="form-control" type="hidden" name="district" value="<?php echo $terroir->getDistrict()->getId(); ?>">
											<input class="form-control" type="hidden" name="prestataireAgec" value="<?php echo $terroir->getPrestataireAgec()->getId(); ?>">
											<input class="form-control" type="hidden" name="cp" value="<?php echo $terroir->getCp()->getId(); ?>">
											<div class="form-group">
												<label>* nombre de sous activite (SA)</label>
												<input class="form-control" type="number" name="nbsa" value="<?php echo $terroir->getNbsa(); ?>" min="0" required>
											</div>
											<!-- <div class="form-group">
												<label>* nombre de beneficiaire</label>
												<input class="form-control" type="number" name="nbBenef" value="<?php echo $terroir->getNbBenef(); ?>" min="0" required>
											</div>
											<div class="form-group">
												<label>* nombre inapte</label>
												<input class="form-control" type="number" name="nbInapte" value="<?php echo $terroir->getNbInapte(); ?>" min="0" required>
											</div> -->

											<div class="modal-footer">
		                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
										</div>
	                                </div>
	                            </div>
	                        </div>

					  		<div class="col-lg-12">
				  				<div class="col-lg-3" style="border-left: solid 2px #999;">
				  					<div class="content-group">
				  						<h4 class="text-semibold no-margin" style="margin: 0;">
				  							<a href="<?php echo site_url('GroupeTravail_Controller/recherche?page=1&terroir_nom='.$terroir->getNom().'&tri=codechantier'); ?>"><?php echo sizeof($terroir->getGroupeTravails()); ?></a>
				  						</h4>
				  						<span class="text-muted text-size-small">GROUPE DE TRAVAIL</span>
				  					</div>
				  				</div>
				  				
				  				<div class="col-lg-3" style="border-left: solid 2px #999;">
				  					<div class="content-group">
				  						<h4 class="text-semibold no-margin" style="margin: 0;">
				  							<?php echo $terroir->getNbsa(); ?>
				  						</h4>
				  						<span class="text-muted text-size-small" >SOUS ACTIVITEES</span>
				  					</div>
				  				</div>

				  				<div class="col-lg-3" style="border-left: solid 2px #999;">
				  					<div class="content-group">
				  						<h4 class="text-semibold no-margin" style="margin: 0;">
				  							<?php echo number_format($terroir->getNbBenef(), 0, ",", " "); ?>
				  						</h4>
				  						<span class="text-muted text-size-small" >BENEFICIAIRES</span>
				  					</div>
				  				</div>

				  				<div class="col-lg-3" style="border-left: solid 2px #999;">
				  					<div class="content-group">
				  						<h4 class="text-semibold no-margin" style="margin: 0;">
				  							<?php echo number_format($terroir->getNbInapte(), 0, ",", " "); ?>
				  						</h4>
				  						<span class="text-muted text-size-small" >INAPTES</span>
				  					</div>
				  				</div>
				  			</div>

				  			<div class="col-lg-12" style="margin: 2% 0;">
				  				<hr>
				  			</div>

				  			<div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
								            Planification
							        	</div>
							          	<span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							            <div class="panel-options">
							            	<button type="button" class="btn btn-primary" onclick="javascript:modifierPlanification();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
							            </div>
							        </div>
					  				<div class="panel-body">
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Date Prév Engagement</th>
													<th class="text-center">Date Réelle Engagement</th>
													<th class="text-center">Date Prév Fin</th>
													<th class="text-center">Date réelle Fin</th>
													
								                </tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                  		<td class="text-center"><?php echo $terroir->getDpEngPlan(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrEngPlan(); ?></td>
													<td class="text-center"><?php echo $terroir->getDpFinPlan(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrFinPlan(); ?></td>
													
							                	</tr>
							              	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">prestataire</th>
													<th class="text-center">Code marché</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $terroir->getPrestatairePlan()->getNom(); ?></td>
													<td class="text-center"><?php echo $terroir->getCodemarchePlan(); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">Date Prév approbation PAMOs</th>
													<th class="text-center">Date Réelle approbation PAMOs</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $terroir->getDpApprobPamo(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrApprobPamo(); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">Montant réel contrat</th>
								                	<th class="text-center">Montant total des PAMOs</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo number_format($terroir->getMontantReelPlan(), 2, "," ,"."); ?></td>
					                				<td class="text-center"><?php echo number_format($terroir->getMontantTotalPamo(), 2, "," ,"."); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							        </div>
								</div>
							</div>

							<div class="modal fade" id="planModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">
	                                        	Planification
	                                        </h4>
	                                        <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
	                                    </div>
	                                    <div class="modal-body">				
											<div class="form-group">
												<label>Prestataire</label>
												<select class="form-control" name="prestatairePlan">
													<option value="<?php echo $terroir->getPrestatairePlan()->getId(); ?>"><?php echo $terroir->getPrestatairePlan()->getNom(); ?></option>
													<?php foreach ($prestataires as $row) { 
														if($row->getId() != $terroir->getPrestatairePlan()->getId()){ ?>
															<option value="<?php echo $row->getId(); ?>"><?php echo $row->getNom(); ?></option>
													<?php } } ?>
												</select>
											</div>
											<div class="form-group">
												<label>date prevue engagement</label>
												<input class="form-control" type="date" name="dpEngPlan" value="<?php echo $terroir->getDpEngPlan(); ?>">
											</div>
											<div class="form-group">
												<label>date reel engagement</label>
												<input class="form-control" type="date" name="drEngPlan" value="<?php echo $terroir->getDrEngPlan(); ?>">
											</div>
											<div class="form-group">
												<label>code marche</label>
												<input class="form-control" type="text" name="codemarchePlan" value="<?php echo $terroir->getCodemarchePlan(); ?>">
											</div>
											<div class="form-group">
												<label>date prevue fin</label>
												<input class="form-control" type="date" name="dpFinPlan" value="<?php echo $terroir->getDpFinPlan(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle fin</label>
												<input class="form-control" type="date" name="drFinPlan" value="<?php echo $terroir->getDrFinPlan(); ?>">
											</div>
											<div class="form-group">
												<label>* montant reel</label>
												<input class="form-control" type="number" name="montantReelPlan" value="<?php echo $terroir->getMontantReelPlan(); ?>" min="0" min="0" required>
											</div>
											<div class="form-group">
												<label>date prevue approbation PAMO</label>
												<input class="form-control" type="date" name="dpApprobPamo" value="<?php echo $terroir->getDpApprobPamo(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle approbation PAMO</label>
												<input class="form-control" type="date" name="drApprobPamo" value="<?php echo $terroir->getDrApprobPamo(); ?>">
											</div>
											<div class="form-group">
												<label>* montant total PAMO</label>
												<input class="form-control" type="number" name="montantTotalPamo" value="<?php echo $terroir->getMontantTotalPamo(); ?>" min="0" required>
											</div>

											<div class="modal-footer">
		                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
										</div>
	                                </div>
	                            </div>
	                        </div>

							<div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	Ciblage
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							            <div class="panel-options">
							            	<button type="button" class="btn btn-primary" onclick="javascript:modifierCiblage();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
							            </div>
							        </div>
					  				<div class="panel-body">
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Date Prév Engagement</th>
													<th class="text-center">Date Réelle Engagement</th>
													<th class="text-center">Date Prév Fin</th>
													<th class="text-center">Date réelle Fin</th>
													<th class="text-center">Date validation communautaire</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                  		<td class="text-center"><?php echo $terroir->getDpEngCible(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrEngCible(); ?></td>
													<td class="text-center"><?php echo $terroir->getDpFinCible(); ?></td>
													<td class="text-center"><?php echo $terroir->getDpFinCible(); ?></td>
													<td class="text-center"><?php echo $terroir->getDValidCom(); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
								            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">prestataire</th>
													<th class="text-center">Code marché</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $terroir->getPrestataireCible()->getNom(); ?></td>
													<td class="text-center"><?php echo $terroir->getCodemarcheCible(); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">Montant réel contrat</th>	
												</tr>
											</thead>
											<tbody>
							                	<tr>
							                		<td class="text-center"><?php echo number_format($terroir->getMontantReelCible(), 2, ",", "."); ?></td>
												</tr>
							              	</tbody>
							            </table>
							        </div>
								</div>
							</div>

							<div class="modal fade" id="cibleModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">
	                                        	Ciblage
	                                        </h4>
	                                        <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
	                                    </div>
	                                    <div class="modal-body">				
											<div class="form-group">
												<label>Prestataire</label>
												<select class="form-control" name="prestataireCible">
													<option value="<?php echo $terroir->getPrestataireCible()->getId(); ?>"><?php echo $terroir->getPrestataireCible()->getNom(); ?></option>
													<?php foreach ($prestataires as $row) { 
														if($row->getId() != $terroir->getPrestataireCible()->getId()){ ?>
															<option value="<?php echo $row->getId(); ?>"><?php echo $row->getNom(); ?></option>
													<?php } } ?>
												</select>
											</div>	
											<div class="form-group">
												<label>date prevue engagement</label>
												<input class="form-control" type="date" name="dpEngCible" value="<?php echo $terroir->getDpEngCible(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle engagement</label>
												<input class="form-control" type="date" name="drEngPlan" value="<?php echo $terroir->getDrEngCible(); ?>">
											</div>
											<div class="form-group">
												<label>code marche</label>
												<input class="form-control" type="text" name="codemarcheCible" value="<?php echo $terroir->getCodemarcheCible(); ?>">
											</div>
											<div class="form-group">
												<label>date prevue fin</label>
												<input class="form-control" type="date" name="dpFinCible" value="<?php echo $terroir->getDpFinCible(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle fin</label>
												<input class="form-control" type="date" name="drFinCible" value="<?php echo $terroir->getDpFinCible(); ?>">
											</div>
											<div class="form-group">
												<label>* montant reelle</label>
												<input class="form-control" type="number" name="montantReelCible" value="<?php echo $terroir->getMontantReelCible(); ?>" min="0" required>
											</div>
											<div class="form-group">
												<label>validation communautaire</label>
												<input class="form-control" type="date" name="dValidCom" value="<?php echo $terroir->getDValidCom(); ?>">
											</div>
											<div class="modal-footer">
		                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
										</div>
	                                </div>
	                            </div>
	                        </div>

							<div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	AGEC
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							            <div class="panel-options">
							            	<button type="button" class="btn btn-primary" onclick="javascript:modifierAgec();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
							            </div>
							        </div>
					  				<div class="panel-body">
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Date Prév Engagement</th>
													<th class="text-center">Date Réelle Engagement</th>
													<th class="text-center">Date Prév Fin</th>
													<th class="text-center">Date réelle Fin</th>
													
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                  		<td class="text-center"><?php echo $terroir->getDpEngAgec(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrEngAgec(); ?></td>
													<td class="text-center"><?php echo $terroir->getDpFinAgec(); ?></td>
													<td class="text-center"><?php echo $terroir->getDrFinAgec(); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">prestataire</th>
													<th class="text-center">Code marché</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $terroir->getPrestataireAgec()->getNom(); ?></td>
													<td class="text-center"><?php echo $terroir->getCodemarcheAgec(); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">Total Montant réel contrat</th>
													<th class="text-center">Total Montant confié</th>
												</tr>
											</thead>
											<tbody>
							                	<tr>
							                		<td class="text-center"><?php echo number_format($terroir->getMontantTotalAgec(), 2, ",", "."); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getMontantTotalConfieAgec(), 2, ",", "."); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							        </div>
								</div>
							</div>

							<div class="modal fade" id="agecModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">
	                                        	AGEC
	                                        </h4>
	                                        <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
	                                    </div>
	                                    <div class="modal-body">
	                                    	<div class="form-group">
												<label>Prestataire</label>
												<select class="form-control" name="prestataireAgec">
													<option value="<?php echo $terroir->getPrestataireAgec()->getId(); ?>"><?php echo $terroir->getPrestataireAgec()->getNom(); ?></option>
													<?php foreach ($prestataires as $row) { 
														if($row->getId() != $terroir->getPrestataireAgec()->getId()){ ?>
															<option value="<?php echo $row->getId(); ?>"><?php echo $row->getNom(); ?></option>
													<?php } } ?>
												</select>
											</div>				
											<div class="form-group">
												<label>date prevue engagement</label>
												<input class="form-control" type="date" name="dpEngAgec" value="<?php echo $terroir->getDpEngAgec(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle engagement</label>
												<input class="form-control" ype="date" name="drEngAgec" value="<?php echo $terroir->getDrEngAgec(); ?>">
											</div>
											<div class="form-group">
												<label>code marche</label>
												<input class="form-control" type="text" name="codemarcheAgec" value="<?php echo $terroir->getCodemarcheAgec(); ?>">
											</div>
											<div class="form-group">
												<label>date prevue fin</label>
												<input class="form-control" type="date" name="dpFinAgec" value="<?php echo $terroir->getDpFinAgec(); ?>">
											</div>
											<div class="form-group">
												<label>date reelle fin</label>
												<input class="form-control" type="date" name="drFinAgec" value="<?php echo $terroir->getDrFinAgec(); ?>">
											</div>
											<div class="form-group">
												<label>* Montant total</label>
												<input class="form-control" type="number" name="montantTotalAgec" value="<?php echo $terroir->getMontantTotalAgec(); ?>" min="0" required>
											</div>
											<div class="form-group">
												<label>* Montant total confie</label>
												<input class="form-control" type="number" name="montantTotalConfieAgec" value="<?php echo $terroir->getMontantTotalConfieAgec(); ?>" min="0" required>
											</div>

											<div class="modal-footer">
		                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
										</div>
	                                </div>
	                            </div>
	                        </div>

							<div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	Paiement
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							          
							            <div class="panel-options">
							            	<button type="button"  class="btn btn-primary" onclick="javascript:modifierPaiement();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
							            </div>
							        </div>
					  				<div class="panel-body">
					  					<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">agence payeur</th>
													<th class="text-center">Code marché</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $terroir->getAgencePaiement()->getNom(); ?></td>
													<td class="text-center"><?php echo $terroir->getCodemarchePaie(); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Montat réel contrat Agence de paiement</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
													<td class="text-center"><?php echo number_format($terroir->getMontantReelPaie(), 2, ",", "."); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
									</div>
								</div>
							</div>

							<div class="modal fade" id="paiementModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">
	                                        	Paiement
	                                        </h4>
	                                        <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
	                                    </div>
	                                    <div class="modal-body">
	                                    	<div class="form-group">
												<label>Prestataire</label>
												<select class="form-control" name="agencePaiement">
													<option value="<?php echo $terroir->getAgencePaiement()->getId(); ?>"><?php echo $terroir->getAgencePaiement()->getNom(); ?></option>
													<?php foreach ($agencepaiements as $row) { 
														if($row->getId() != $terroir->getAgencePaiement()->getId()){ ?>
															<option value="<?php echo $row->getId(); ?>"><?php echo $row->getNom(); ?></option>
													<?php } } ?>
												</select>
											</div>		
											<div class="form-group">
												<label>code marche</label>
												<input class="form-control" type="text" name="codemarchePaie" value="<?php echo $terroir->getCodemarchePaie(); ?>">
											</div>
											<div class="form-group">
												<label>* montant reel</label>
												<input class="form-control" type="number" name="montantReelPaie" value="<?php echo $terroir->getMontantReelPaie(); ?>" min="0" required>
											</div>
											<div class="modal-footer">
	                                    		<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
										</div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	IOV
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							            <div class="panel-options">
							            	<a href="<?php echo site_url('GroupeTravail_Controller/recherche?page=1&terroir_nom='.$terroir->getNom().'&tri=codechantier'); ?>"><button type="button" class="btn btn-default" > Voir</button></a>
							            </div>
							        </div>
					  				<div class="panel-body">
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Nombre Prév d'Hommes jour crées</th>
													<th class="text-center">Nombre Réel d'Hommes jour crées</th>
													<th class="text-center">Prévision suprficie “traitées” avec mesures CES
(Hectare(Ha))</th>
													<th class="text-center">Réalisation suprficie “traitées” avec mesures CES
(Hectare(Ha))</th>
													<th class="text-center">Prévision  superficie re/boisée par des activités FSP
(Hectare(Ha))</th>
													<th class="text-center">Réalisation  superficie re/boisée par des activités FSP
(Hectare(Ha))</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                  		<td class="text-center"><?php echo number_format($terroir->getNbPrevHommeJourApte(), 0, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getNbReelHommeJourApte(), 0, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getPrevSurfTraiteeCes(), 3, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getRealSurfTraiteeCes(), 3, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getprevSurfBoiseeFsp(), 3, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($terroir->getRealSurfBoiseeFsp(), 3, ",", " "); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							        </div>
								</div>
							</div>
	                    
							<div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	Autres indicateurs
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
							          
							            <div class="panel-options">
							            	<button type="button" class="btn btn-primary" onClick="javascript:modifierAutreIndicateur();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
							            </div>
							        </div>
					  				<div class="panel-body">
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Libellé autre indicateur à préciser</th>
													<th class="text-center">Prévision autre indicateur à préciser </th>
													<th class="text-center">Réalisation autre indicateur à préciser</th>
													<th class="text-center">Obsevations sur les indicateurs</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                  		<td><?php echo $terroir->getLibelleAutreIndic(); ?></td>
													<td class="text-center"><?php echo $terroir->getPrevAutreIndic(); ?></td>
													<td class="text-center"><?php echo $terroir->getRealAutreIndic(); ?></td>
													<td><?php echo $terroir->getObservation(); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							        </div>
								</div>
							</div>

							<div class="modal fade" id="autreIndicateurModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <!-- Modal content-->
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">
	                                        	Autres indicateurs
	                                        </h4>
	                                        <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $terroir->getNom(); ?></a></span>
	                                    </div>
	                                    <div class="modal-body">				
											<div class="form-group">
												<label>libelle</label>
												<input class="form-control" type="text" name="libelleAutreIndic" value="<?php echo $terroir->getLibelleAutreIndic(); ?>">
											</div>
											<div class="form-group">
												<label>* prevision</label>
												<input class="form-control" type="number" name="prevAutreIndic" value="<?php echo $terroir->getPrevAutreIndic(); ?>" min="0" step="0.01" required>
											</div>
											<div class="form-group">
												<label>* realisation</label>
												<input class="form-control" type="number" name="realAutreIndic" value="<?php echo $terroir->getRealAutreIndic(); ?>" min="0" step="0.01" required>
											</div>
											<div class="form-group">
												<label>observations</label>
												<input class="form-control" type="text" name="observation" value="<?php echo $terroir->getObservation(); ?>">
											</div>
										</div>

										<div class="modal-footer">
	                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

	                        <div class="modal fade" id="validationModal" role="dialog">
						        <div class="modal-dialog">
								<!-- Modal content-->
							        <div class="modal-content">
							            <div class="modal-header">
							                <h4 class="modal-title">Modification</h4>
							            </div>
							            <div class="modal-body">
							            	<h3>Voulez-vous vraiment modifier?</h3>
							            </div>
							            <div class="modal-footer">
							                <a href="#" class="btn btn-success" onclick="javascript:validation();" data-dismiss="">Valider</a>
							                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							            </div>
							        </div>
							    </div>
							</div>
	                    </form>

	                    <div class="modal fade" id="infoModal" role="dialog">
					        <div class="modal-dialog">
							<!-- Modal content-->
						        <div class="modal-content">
						            <div class="modal-header">
						                <h4 class="modal-title">Information</h4>
						            </div>
						            <div class="modal-body">
						            	<h3></h3>
						            </div>
						            <div class="modal-footer">
						                <a href="#" class="btn btn-default" data-dismiss="modal">OK</a>
						            </div>
						        </div>
						    </div>
						</div>

					</div>
				</div>
	  		</div>
	  	</div>

	    <script type="text/javascript">
	    	$( document ).ready(function() 
	    	{
	    		$('.table_vide tr td').each(function() 
	    		{
		    		if($(this).text() == "-" || $(this).text() == "")
		    			$(this).css('background-color', '#ff0');
			    });
			});

	    	function modifierUtb()
	    	{
	    		if(droit() == 1)
	    			$('#utbModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function modifierPlanification()
	    	{
	    		if(droit() == 1)
	    			$('#planModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	} 

	    	function modifierCiblage()
	    	{
	    		if(droit() == 1)
	    			$('#cibleModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	} 

	    	function modifierAgec()
	    	{
	    		if(droit() == 1)
	    			$('#agecModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function modifierPaiement()
	    	{
	    		if(droit() == 1)
	    			$('#paiementModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	// function modifierIov()
	    	// {
	    	// 	if(droit() == 1)
	    	// 		$('#iovModal').modal('show');
	    	// 	else
	    	// 	{
	    	// 		$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    	// 		$('#infoModal').modal('show');
	    	// 	}
	    	// }

	    	function modifierAutreIndicateur()
	    	{
	    		if(droit() == 1)
	    			$('#autreIndicateurModal').modal('show');
	    		else
	    		{
	    			$("#infoModal h3").text("Vouz n'avez aucun droit sur cette UTB.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function confirmation()
	    	{
	    		var f = document.getElementById('form');
	    		if(f.checkValidity())
	    		{
					$('#validationModal').modal('show');
	    		}
				else
				{
					$("#infoModal h3").text("Veuillez remplir les champs *.");
	    			$('#infoModal').modal('show');
				}
	    	}

	    	function validation()
	    	{
	    		$('#form').submit();
	    	}

	    	function droit()
	    	{
	    		var droit = <?php echo $droit; ?>;
	    		return droit;
	    	}
	    </script>