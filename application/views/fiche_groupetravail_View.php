		<div class="col-md-10">
	  		<div class="row">
	  			<?php
	  				date_default_timezone_set('Africa/Nairobi');
		            echo $this->session->flashdata('info');
		        ?>
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="col-xs-12 panel-title text-center col-centered">
							<h4>
								<a href="<?php echo site_url('GroupeTravail_Controller/fiche/'.$precedent); ?>"><span class="glyphicon glyphicon-chevron-left" ></span></a>
								GT - <?php echo $groupetravail->getNom(); ?>
								<a href="<?php echo site_url('GroupeTravail_Controller/fiche/'.$suivant); ?>"><span class="glyphicon glyphicon-chevron-right" ></span></a>
							</h4>

							<span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <a href="<?php echo site_url('Terroir_Controller/fiche/'.$groupetravail->getTerroir()->getId()); ?>"> <?php echo $groupetravail->getTerroir()->getNom(); ?></a></span><br>
							<span class="text-muted text-size-small" ><?php echo $groupetravail->getTerroir()->getDistrict()->getNom()." - ".$groupetravail->getTerroir()->getDir()->getNom(); ?></span>
						</div>
						<div class="panel-options">
							<button type="button" class="btn btn-primary" onclick="javascript:modifierGt();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
			            </div>
					</div>

					<hr>

					<div class="panel-body">
				  		
				  		<div class="col-lg-12">
			  				<div class="col-lg-2" style="border-left: solid 3px #999;">
			  					<div class="content-group">
			  						<h5 class="text-semibold no-margin" style="margin: 0;">
			  							<?php echo $groupetravail->getCodeChantier(); ?>
			  						</h5>
			  						<span class="text-muted text-size-small">CODE CHANTIER</span>
			  					</div>
			  				</div>
			  				
			  				<div class="col-lg-6" style="border-left: solid 3px #999;">
			  					<div class="content-group">
			  						<h5 class="text-semibold no-margin" style="margin: 0;">
			  							<?php echo $groupetravail->getTerroir()->getPrestataireAgec()->getNom(); ?>
			  						</h5>
			  						<span class="text-muted text-size-small" >AGEC</span>
			  					</div>
			  				</div>

			  				<div class="col-lg-2" style="border-left: solid 3px #999;">
			  					<div class="content-group">
			  						<h5 class="text-semibold no-margin" style="margin: 0;">
			  							<?php 
			  								echo $groupetravail->getPhase($interventions);
			  							?>
			  						</h5>
			  						<span class="text-muted text-size-small" >PHASE</span>
			  					</div>
			  				</div>
	                    </div>

	                    <form action="<?php echo site_url('GroupeTravail_Controller/update'); ?>" method="POST" id="form">
	                    	<div class="modal fade" id="gtModal" role="dialog">
	                            <div class="modal-dialog">
	                            
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">Groupe travail</h4>
	                                    </div>
	                                    <div class="modal-body">
	                                    	<input class="form-control" type="hidden" name="id" value="<?php echo $groupetravail->getId(); ?>">
	                                    	<input class="form-control" type="hidden" name="nom" value="<?php echo $groupetravail->getNom(); ?>">
	                                    	<input class="form-control" type="hidden" name="terroir" value="<?php echo $groupetravail->getTerroir()->getId(); ?>">
	                                    	<div class="form-group">
	                                    		<label>code chantier</label>
	                                    		<input class="form-control" type="text" name="codechantier" value="<?php echo $groupetravail->getCodeChantier(); ?>" required>
	                                    	</div>
	                                    	<div class="modal-footer">
		                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Modifier</button>
		                                    </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </form>

	                    <div class="col-lg-12">
	                    	<hr>
	                    	<div class="col-lg-12">
		                    	<form action="<?php echo site_url('Intervention_Controller/create/'.$groupetravail->getId().'/1/'.$intervention_rang_suiv); ?>" method="POST" id="formCreationIntervention">
			                    	<h4>
			                    		<?php echo sizeof($interventions)." Intervention(s)"; ?>
			                    		<button type="button" onclick="javascript:creerIntervention();" class="btn btn-success" style="padding: 0.5%;">nouvelle</button>	
			                    	</h4>
		                    	</form>
		                    </div>
			  			</div>

			  			<div class="modal fade" id="<?php echo 'validationCreationInterventionModal'; ?>" role="dialog">
					        <div class="modal-dialog">
							<!-- Modal content-->
						        <div class="modal-content">
						            <div class="modal-header">
						                <h4 class="modal-title">Creation</h4>
						            </div>
						            <div class="modal-body">
						            	<p>Voulez-vous vraiment creer ACTP<?php echo $intervention_rang_suiv; ?>?</p>
						            </div>
						            <div class="modal-footer">
						                <a href="#" class="btn btn-success" onclick="javascript:validationIntervention(<?php echo '\'#formCreationIntervention\''; ?>);" data-dismiss="">Valider</a>
						                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
						            </div>
						        </div>
						    </div>
						</div>

			  			<?php foreach($interventions as $row) { ?>
		                    <div class="col-lg-12">
				  				<div class="content-box-large">
					  				<div class="panel-heading">
							            <div class="panel-title">
							            	<h2>
							            		<?php echo "ACTP".$row->getRang(); ?>
							            	</h2>
							            </div>
							            <span class="text-muted text-size-small" ><?php echo "GT - "; ?> <?php echo $groupetravail->getNom(); ?></a></span><br>
							            <span class="text-muted text-size-small" ><?php echo "UTB - "; ?> <?php echo $groupetravail->getTerroir()->getNom(); ?></a></span>
							            <div class="panel-options">
							              	<a href="javascript:modifierIntervention(<?php echo "'#actp".$row->getId()."'"; ?>);"><button class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i> Modifier</button></a>
							              	<a href="javascript:supprimerIntervention(<?php echo "'#validationSuppressionInterventionModal".$row->getId()."'"; ?>);"><button class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Supprimer</button></a>
							            </div>
							        </div>
					  				<div class="panel-body">
					  					<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center" width="10%">phase</th>
								                	<th class="text-center">Intitule</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $row->getPhase()->getValeur(); ?></td>
													<td class="text-center"><?php echo $row->getIntitule()->getNom(); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
										<table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
													<th class="text-center">Durée des travaux activité</th>
													<th class="text-center">Date prévue début travaux activité</th>
													<th class="text-center">Date réelle début travaux activité</th>
													<th class="text-center">Date Prév RTX activité</th>
													<th class="text-center">Date réelle RTX activité</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
													<td class="text-center"><?php echo $row->getDureeTravaux(); ?></td>
													<td class="text-center"><?php echo ($row->getDPrevDebut() ? date("d-m-Y", strtotime($row->getDPrevDebut())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDReelDebut() ? date("d-m-Y", strtotime($row->getDReelDebut())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDPrevRTX() ? date("d-m-Y", strtotime($row->getDPrevRTX())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDReelRTX() ? date("d-m-Y", strtotime($row->getDReelRTX())) : '-'); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center">Nombre Prév de bénéficiaires</th>
													<th class="text-center">Nombre Réel de bénéficiaires </th>
													<th class="text-center">Nombre Réel de bénéficiaires apte</th>
													<th class="text-center">dont nombre femmes bénéficiaires apte</th>
													<th class="text-center">dont nombre bénéficiaires inaptes</th>
													<th class="text-center">Nombre Prév d'Hommes jour aptes crées</th>
													<th class="text-center">Nombre Réel d'Hommes jour aptes crées</th>
								                </tr>
								            </thead>
								            <tbody>
							                	<tr>
							                		<td class="text-center"><?php echo $row->getNbPrevBenef(); ?></td>
													<td class="text-center"><?php echo $row->getNbReelBenef(); ?></td>
													<td class="text-center"><?php echo $row->getNbReelBenefApte(); ?></td>
													<td class="text-center"><?php echo $row->getNbFemmeBenefApte(); ?></td>
													<td class="text-center"><?php echo $row->getNbBenefInapte(); ?></td>
													<td class="text-center"><?php echo number_format($row->getNbPrevHommeJourApte(), 0, ",", " "); ?></td>
													<td class="text-center"><?php echo number_format($row->getNbReelHommeJourApte(), 0, ",", " "); ?></td>
							                	</tr>
							               	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center" width="10%">Prévision superficie “traitées” avec mesures CES(Hectare(Ha))
 activité</th>
 													<th class="text-center" width="10%">Réalisation superficie “traitées” avec mesures CES (Hectare(Ha))
 activité</th>	
 													<th class="text-center" width="10%">Prévision  superficie re/boisée par des activités FSP (Hectare(Ha))
 activité</th>
 													<th class="text-center" width="10%">Réalisation  superficie re/boisée par des activités FSP (Hectare(Ha))
 activité</th>
												</tr>
											</thead>
											<tbody>
							                	<tr>
							                		<td class="text-center"><?php echo number_format($row->getPrevSurfTraiteeCES(), 3, ",", " "); ?></td>
							                		<td class="text-center"><?php echo number_format($row->getRealSurfTraiteeCES(), 3, ",", " "); ?></td>
							                		<td class="text-center"><?php echo number_format($row->getPrevSurfBoiseeFSP(), 3, ",", " "); ?></td>
							                		<td class="text-center"><?php echo number_format($row->getRealSurfBoiseeFSP(), 3, ",", " "); ?></td>
												</tr>
							              	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">
							              	<thead>
								                <tr>
								                	<th class="text-center" width="10%">Libellé autre indicateur à préciser activité</th>
 													<th class="text-center" width="10%">Prévision autre indicateur à préciser activité</th>	
 													<th class="text-center" width="10%">Réalisation autre indicateur à préciser activité</th>
 													<th class="text-center" width="10%">Unité des autres indicateurs</th>
 													<th class="text-center" width="10%">Obsevations sur les indicateurs</th>
												</tr>
											</thead>
											<tbody>
							                	<tr>
							                		<td class="text-center"><?php echo ""; ?></td>
							                		<td class="text-center"><?php echo number_format($row->getPrevAutreIndic(), 0, ",", " "); ?></td>
							                		<td class="text-center"><?php echo number_format($row->getRealAutreIndic(), 0, ",", " "); ?></td>
							                		<td class="text-center" width="5%"><?php echo $row->getUniteAutreIndic()->getValeur(); ?></td>
							                		<td class="text-center"><?php echo ""; ?></td>
												</tr>
							              	</tbody>
							            </table>
							            <table class="table table-striped table-bordered table_vide">	
							            	<thead>
								                <tr>
								                	<th class="text-center">Date prévue paiement 1</th>
													<th class="text-center">Date réelle paiement 1</th>
													<th class="text-center">Date prévue paiement 2</th>
													<th class="text-center">Date réelle paiement 2</th>
													<th class="text-center">Date prévue paiement 3</th>
													<th class="text-center">Date réelle paiement 3</th>
												</tr>
							              	</thead>
							              	<tbody>
							                	<tr>
													<td class="text-center"><?php echo ($row->getDPrevPaiement1() ? date("d-m-Y", strtotime($row->getDPrevPaiement1())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDReelPaiement1() ? date("d-m-Y", strtotime($row->getDReelPaiement1())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDPrevPaiement2() ? date("d-m-Y", strtotime($row->getDPrevPaiement2())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDReelPaiement2() ? date("d-m-Y", strtotime($row->getDReelPaiement2())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDPrevPaiement3() ? date("d-m-Y", strtotime($row->getDPrevPaiement3())) : '-'); ?></td>
													<td class="text-center"><?php echo ($row->getDReelPaiement3() ? date("d-m-Y", strtotime($row->getDReelPaiement3())) : '-'); ?></td>
							                	</tr>
							              	</tbody>
							            </table>
							        </div>
								</div>
							</div>

	                    	<div class="modal fade" id="<?php echo 'actp'.$row->getId(); ?>" role="dialog">
	                            <div class="modal-dialog">
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                    	<div>
	                                        	<h4 class="modal-title col-lg-2"><?php echo "ACTP".$row->getRang(); ?></h4>
                                        		<span class="text-muted text-size-small" ><?php echo "GT - ".$groupetravail->getNom(); ?></span><br>
					            				<span class="text-muted text-size-small" ><?php echo "UTB - ".$groupetravail->getTerroir()->getNom(); ?></span>
	                                        </div>
	                                    </div>
	                                    <div class="modal-body">
	                                    	<form action="<?php echo site_url('Intervention_Controller/update/'.$row->getId()); ?>" method="POST" id="<?php echo 'formModificationIntervention'.$row->getId(); ?>">
                                    			<input class="form-control" type="hidden" name="id" value="<?php echo $row->getId(); ?>">
		                            			<input class="form-control" type="hidden" name="gt_id" value="<?php echo $groupetravail->getId(); ?>">
		                                    	<div class="form-group">
		                                    		<label>phase</label>
		                                    		<select class="form-control" name="phase">
														<option value="<?php echo $row->getPhase()->getId(); ?>"><?php echo $row->getPhase()->getValeur(); ?></option>
														<?php foreach ($phases as $p) { 
															if($p->getId() != $row->getPhase()->getId()){ ?>
																<option value="<?php echo $p->getId(); ?>"><?php echo $p->getValeur(); ?></option>
														<?php } } ?>
													</select>
		                                    	</div>
		                                    	<div class="form-group">
		                                    		<label>intitule</label>
		                                    		<select class="form-control" name="intitule">
														<option value="<?php echo $row->getIntitule()->getId(); ?>"><?php echo $row->getIntitule()->getNom(); ?></option>
														<?php foreach ($intitules as $i) { 
															if($i->getId() != $row->getIntitule()->getId()){ ?>
																<option value="<?php echo $i->getId(); ?>"><?php echo $i->getNom(); ?></option>
														<?php } } ?>
													</select>
		                                    	</div>
		                                    	<hr>
		                                    	<div class="form-group">
													<label>* duree travaux</label>
													<input class="form-control" type="number" name="dureeTravaux" value="<?php echo $row->getDureeTravaux(); ?>" min="0" required>
												</div>
												<hr>
												<div class="form-group">
													<label>date prevue debut travaux</label>
													<input class="form-control" type="date" name="dPrevDebut" value="<?php echo $row->getDPrevDebut(); ?>">
												</div>
												<div class="form-group">
													<label>date reel debut travaux</label>
													<input class="form-control" type="date" name="dReelDebut" value="<?php echo $row->getDReelDebut(); ?>">
												</div>
												<hr>
												<div class="form-group">
													<label>date prevue paiement 1</label>
													<input class="form-control" type="date" name="dPrevPaiement1" value="<?php echo $row->getDPrevPaiement1(); ?>">
												</div>
												<div class="form-group">
													<label>date reelle paiement 1</label>
													<input class="form-control" type="date" name="dReelPaiement1" value="<?php echo $row->getDReelPaiement1(); ?>">
												</div>
												<div class="form-group">
													<label>date prevue paiement 2</label>
													<input class="form-control" type="date" name="dPrevPaiement2" value="<?php echo $row->getDPrevPaiement2(); ?>">
												</div>
												<div class="form-group">
													<label>date reelle paiement 2</label>
													<input class="form-control" type="date" name="dReelPaiement2" value="<?php echo $row->getDReelPaiement2(); ?>">
												</div>
												<div class="form-group">
													<label>date prevue paiement 3</label>
													<input class="form-control" type="date" name="dPrevPaiement3" value="<?php echo $row->getDPrevPaiement3(); ?>">
												</div>
												<div class="form-group">
													<label>date reelle paiement 3</label>
													<input class="form-control" type="date" name="dReelPaiement3" value="<?php echo $row->getDReelPaiement3(); ?>">
												</div>
												<hr>
												<div class="form-group">
													<label>date prevue RTX</label>
													<input class="form-control" type="date" name="dPrevRXT" value="<?php echo $row->getDPrevRTX(); ?>">
												</div>
												<div class="form-group">
													<label>date reelle RTX</label>
													<input class="form-control" type="date" name="dReelRXT" value="<?php echo $row->getDReelRTX(); ?>">
												</div>
												<hr>
												<div class="form-group">
													<label>* nombre prevue beneficiaires</label>
													<input class="form-control" type="number" name="nbPrevBenef" value="<?php echo $row->getNbPrevBenef(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* nombre reel beneficiaires</label>
													<input class="form-control" type="number" name="nbReelBenef" value="<?php echo $row->getNbReelBenef(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* nombre reel beneficiaires apte</label>
													<input class="form-control" type="number" name="nbReelBenefApte" value="<?php echo $row->getNbReelBenefApte(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* dont nombre femmes beneficiaires apte</label>
													<input class="form-control" type="number" name="nbFemmeBenefApte" value="<?php echo $row->getNbFemmeBenefApte(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* nombre beneficiaires inapte</label>
													<input class="form-control" type="number" name="nbBenefInapte" value="<?php echo $row->getNbBenefInapte(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* nombre prevue homme jour apte</label>
													<input class="form-control" type="number" name="nbPrevHommeJourApte" value="<?php echo $row->getNbPrevHommeJourApte(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* nombre reel homme jour apte</label>
													<input class="form-control" type="number" name="nbReelHommeJourApte" value="<?php echo $row->getNbReelHommeJourApte(); ?>" min="0" required>
												</div>
												<hr>
												<div class="form-group">
													<label>* prévision superficie “traitées” avec mesures CES(Hectare(Ha)) activité</label>
													<input class="form-control" type="number" name="prevSurfTraiteeCES" value="<?php echo $row->getPrevSurfTraiteeCES(); ?>" min="0" step="0.001" required>
												</div>
												<div class="form-group">
													<label>* realisation superficie “traitées” avec mesures CES(Hectare(Ha)) activité</label>
													<input class="form-control" type="number" name="realSurfTraiteeCES" value="<?php echo $row->getRealSurfTraiteeCES(); ?>" min="0" step="0.001" required>
												</div>
												<div class="form-group">
													<label>* prévision superficie re/boisée par des activités FSP (Hectare(Ha)) activité</label>
													<input class="form-control" type="number" name="prevSurfBoiseeFSP" value="<?php echo $row->getPrevSurfBoiseeFSP(); ?>" min="0" step="0.001" required>
												</div>
												<div class="form-group">
													<label>* realisation superficie re/boisée par des activités FSP (Hectare(Ha)) activité</label>
													<input class="form-control" type="number" name="realSurfBoiseeFSP" value="<?php echo $row->getRealSurfBoiseeFSP(); ?>" min="0" step="0.001" required>
												</div>
												<hr>
												<div class="form-group">
													<label>libellé autre indicateur à préciser activité</label>
													<input class="form-control" type="text" name="libelleAutreIndic" value="<?php echo $row->getLibelleAutreIndic(); ?>">
												</div>
												<div class="form-group">
													<label>* prévision autre indicateur à préciser activité</label>
													<input class="form-control" type="number" name="prevAutreIndic" value="<?php echo $row->getPrevAutreIndic(); ?>" min="0" required>
												</div>
												<div class="form-group">
													<label>* réalisation autre indicateur à préciser activité</label>
													<input class="form-control" type="number" name="realAutreIndic" value="<?php echo $row->getRealAutreIndic(); ?>" min="0" required>
												</div>
												<div class="form-group">
		                                    		<label>unite autres indicateurs</label>
		                                    		<select class="form-control" name="uniteAutreIndic">
														<option value="<?php echo $row->getUniteAutreIndic()->getId(); ?>"><?php echo $row->getUniteAutreIndic()->getValeur(); ?></option>
														<?php foreach ($unites as $u) { 
															if($u->getId() != $row->getUniteAutreIndic()->getId()){ ?>
																<option value="<?php echo $u->getId(); ?>"><?php echo $u->getValeur(); ?></option>
														<?php } } ?>
													</select>
		                                    	</div>
												<div class="form-group">
													<label>obsevations sur les indicateurs</label>
													<input class="form-control" type="text" name="observationIndic" value="<?php echo $row->getObservationIndic(); ?>">
												</div>

			                                </form>
	                                    </div>
	                                    <div class="modal-footer">
	                                    	<button type="button" onclick="javascript:confirmationModificationIntervention(<?php echo '\'#validationModificationInterventionModal'.$row->getId().'\''; ?>, <?php echo '\'formModificationIntervention'.$row->getId().'\''; ?>);" class="btn btn-primary">Modifier</button>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>

		                    <form action="<?php echo site_url('Intervention_Controller/delete/'.$row->getId()); ?>" method="POST" id="<?php echo 'formSuppressionIntervention'.$row->getId(); ?>"> 	
		                    </form>

		                    <div class="modal fade" id="<?php echo 'validationModificationInterventionModal'.$row->getId(); ?>" role="dialog">
						        <div class="modal-dialog">
								<!-- Modal content-->
							        <div class="modal-content">
							            <div class="modal-header">
							                <h4 class="modal-title">Modification</h4>
							            </div>
							            <div class="modal-body">
							            	<h3>Voulez-vous vraiment modifier ACTP<?php echo $row->getRang(); ?>?</h3>
							            </div>
							            <div class="modal-footer">
							                <a href="#" class="btn btn-success" onclick="javascript:validationIntervention(<?php echo '\'#formModificationIntervention'.$row->getId().'\''; ?>);" data-dismiss="">Valider</a>
							                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							            </div>
							        </div>
							    </div>
							</div>

							<div class="modal fade" id="<?php echo 'validationSuppressionInterventionModal'.$row->getId(); ?>" role="dialog">
						        <div class="modal-dialog">
								<!-- Modal content-->
							        <div class="modal-content">
							            <div class="modal-header">
							                <h4 class="modal-title">Suppression</h4>
							            </div>
							            <div class="modal-body">
							            	<h3>Voulez-vous vraiment supprimer ACTP<?php echo $row->getRang(); ?>?</h3>
							            </div>
							            <div class="modal-footer">
							                <a href="#" class="btn btn-success" onclick="javascript:validationIntervention(<?php echo '\'#formSuppressionIntervention'.$row->getId().'\''; ?>);" data-dismiss="">Valider</a>
							                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
							            </div>
							        </div>
							    </div>
							</div>
							
		                <?php } ?>

		                <div class="modal fade" id="validationModal" role="dialog">
					        <div class="modal-dialog">
							<!-- Modal content-->
						        <div class="modal-content">
						            <div class="modal-header">
						                <h4 class="modal-title">Modification</h4>
						            </div>
						            <div class="modal-body">
						            	<p>Voulez-vous vraiment modifier?</p>
						            </div>
						            <div class="modal-footer">
						                <a href="#" class="btn btn-success" onclick="javascript:validation();" data-dismiss="">Valider</a>
						                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
						            </div>
						        </div>
						    </div>
						</div>

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

	    	function modifierGt()
	    	{
	    		if(droit() == 1)
	    		{
	    			$('#gtModal').modal('show');
	    		}
	    		else
	    		{
    				$("#infoModal h3").text("Vouz n'avez aucun droit sur ce groupe de travail.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function creerIntervention()
	    	{
    			if(droit() == 1)
    			{
	    			$('#validationCreationInterventionModal').modal('show');
    			}
	    		else
	    		{
    				$("#infoModal h3").text("Vouz n'avez aucun droit sur ce groupe de travail.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function modifierIntervention(nom)
	    	{
	    		if(droit() == 1)
				{
					$(nom).modal('show');
				}
    			else
    			{
    				$("#infoModal h3").text("Vouz n'avez aucun droit sur ce groupe de travail.");
	    			$('#infoModal').modal('show');
    			}	
	    	}

	    	function supprimerIntervention(nom)
	    	{
    			if(droit() == 1)
				{
					$(nom).modal('show');
				}
    			else
    			{
    				$("#infoModal p").text("Vouz n'avez aucun droit sur ce groupe de travail.");
	    			$('#infoModal').modal('show');
    			}	
	    	}

	    	function confirmationModificationIntervention(nom, form)
	    	{
	    		var f = document.getElementById(form);
	    		if(f.checkValidity())
	    		{
	    			$(nom).modal('show');
	    		}
	    		else
	    		{
	    			$("#infoModal p").text("Veuillez remplir les champs *.");
	    			$('#infoModal').modal('show');
	    		}
	    	}

	    	function validationIntervention(nom)
	    	{
    			$(nom).submit();    		
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
	    			$("#infoModal p").text("Veuillez remplir les champs *.");
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