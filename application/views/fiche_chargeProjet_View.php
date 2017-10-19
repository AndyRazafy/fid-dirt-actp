	<div class="col-lg-10">
  		<div class="row">
  			<div class="content-box-large">
				<div class="panel-heading">
					<div class="col-lg-12 panel-title">
						<h3 class="col-lg-8">
							Fiche charge de projet
						</h3>
						<div class="col-lg-4">
			            	<button type="button" class="btn btn-primary" onclick="javascript:modifierCp();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
			            	<button type="button" class="btn btn-danger" onclick="javascript:confirmationSuppression();"><i class="glyphicon glyphicon-remove"></i> Supprimer</button>
			            </div>
					</div>
					<hr>
				</div>

				<hr style="margin: 0;"/>
				<div class="panel-body">
					<?php
		  				date_default_timezone_set('Africa/Nairobi');
			            echo $this->session->flashdata('info');
			        ?>
					<form action="<?php echo site_url('ChargeProjet_Controller/update/'.$cp->getId()); ?>" method="POST" id="update">
						<input class="form-control" type="hidden" name="id" value="<?php echo $cp->getId(); ?>">
                   		<div class="modal fade" id="updateModal" role="dialog">
					        <div class="modal-dialog">
					        
					            <!-- Modal content-->
					            <div class="modal-content">
					                <div class="modal-header">
					                    <h4 class="modal-title">Modification</h4>
					                </div>
					                <div class="modal-body">	
										<div class="form-group">		
											<label>* Nom</label>		
											<input class="form-control" type="text" name="nom" value="<?php echo $cp->getNom(); ?>" required>
										</div>
										<div class="form-group">
											<label>* Prenom</label>			
											<input class="form-control" type="text" name="prenom" value="<?php echo $cp->getPrenom(); ?>" required>
										</div>
										<div class="form-group">	
											<label>* Pseudo</label>			
											<input class="form-control" type="text" name="pseudo" value="<?php echo $cp->getPseudo(); ?>" required>
										</div>
										<div class="form-group">
											<label>* Email</label>			
											<input class="form-control" type="email" name="email" value="<?php echo $cp->getEmail(); ?>" required>
										</div>
									</div>
									<div class="modal-footer">
					                	<button type="button" onclick="javascript:confirmationModification();" class="btn btn-primary">Modifier</button>
					                	<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
					                </div>
								</div>
					        </div>
					    </div>
                    </form>

                    <form action="<?php echo site_url('ChargeProjet_Controller/delete/'.$cp->getId()); ?>" method="POST" id="delete">
    				</form>

					<div class="col-lg-12">
		  				<div class="col-lg-3" style="border-left: solid 2px #999;">
		  					<div class="content-group">
		  						<h4 class="text-semibold no-margin" style="margin: 0;">
		  							<?php echo $cp->getNom(); ?>
		  						</h4>
		  						<span class="text-muted text-size-small">NOM</span>
		  					</div>
		  				</div>
		  				
		  				<div class="col-lg-3" style="border-left: solid 2px #999;">
		  					<div class="content-group">
		  						<h4 class="text-semibold no-margin" style="margin: 0;">
		  							<?php echo $cp->getPrenom(); ?>
		  						</h4>
		  						<span class="text-muted text-size-small" >PRENOM</span>
		  					</div>
		  				</div>

		  				<div class="col-lg-3" style="border-left: solid 2px #999;">
		  					<div class="content-group">
		  						<h4 class="text-semibold no-margin" style="margin: 0;">
		  							<?php echo $cp->getPseudo(); ?>
		  						</h4>
		  						<span class="text-muted text-size-small" >PSEUDO</span>
		  					</div>
		  				</div>

		  				<div class="col-lg-3" style="border-left: solid 2px #999;">
		  					<div class="content-group">
		  						<h4 class="text-semibold no-margin" style="margin: 0;">
		  							<?php echo $cp->getEmail(); ?>
		  						</h4>
		  						<span class="text-muted text-size-small" >EMAIL</span>
		  					</div>
		  				</div>
		  			</div>

		  			<div class="col-lg-12">
		  				<hr>
		  				<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title">
					            	<h4>
					            		UTB
					            	</h4>
					            </div>
					        </div>
			  				<div class="panel-body">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center" width="5%">#</th>
											<th><a href="">NOM</a></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i = 1;
											foreach ($terroirs as $row) { ?>
											<tr>
												<td class="text-center"><?php echo $i; $i++; ?></td>
												<td><a href="<?php echo site_url('Terroir_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getNom(); ?></a></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
  		</div>
  	</div>

    <div class="modal fade" id="validationModificationModal" role="dialog">
        <div class="modal-dialog">
		<!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Modification</h4>
	            </div>
	            <div class="modal-body">
	            	<h3>Voulez-vous vraiment modifier ce charge de projet?</h3>
	            </div>
	            <div class="modal-footer">
	                <a href="#" class="btn btn-success" onclick="javascript:validationModification();" data-dismiss="">Valider</a>
	                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="modal fade" id="validationSuppressionModal" role="dialog">
        <div class="modal-dialog">
		<!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Suppression</h4>
	            </div>
	            <div class="modal-body">
	            	<h3>Voulez-vous vraiment supprimer ce charge de projet?</h3>
	            </div>
	            <div class="modal-footer">
	                <a href="#" class="btn btn-success" onclick="javascript:validationSuppression();" data-dismiss="">Valider</a>
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

  	<script type="text/javascript">
  		function modifierCp()
    	{
			$('#updateModal').modal('show');
    	}

    	function modifierCp()
    	{
			$('#updateModal').modal('show');
    	}

    	function confirmationModification()
    	{
    		var f = document.getElementById('update');
    		if(f.checkValidity())
    		{
    			$('#validationModificationModal').modal('show');
    		}
    		else
    		{
    			$("#infoModal h3").text("Veuillez remplir les champs *.");
    			$('#infoModal').modal('show');
    		}
    	}

    	function confirmationSuppression()
    	{
			$('#validationSuppressionModal').modal('show');
    	}

    	function validationModification()
    	{
    		$('#update').submit();
    	}

    	function validationSuppression()
    	{
    		$('#delete').submit();
    	}
  	</script>