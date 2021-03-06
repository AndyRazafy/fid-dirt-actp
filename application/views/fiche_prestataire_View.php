	<div class="col-lg-10">
  		<div class="row">
  			<div class="content-box-large">
				<div class="panel-heading">
					<div class="col-lg-12 panel-title">
						<h3 class="col-lg-8">
							Fiche prestataire
						</h3>
						<div class="col-lg-4">
							<button type="button" class="btn btn-success" onclick="javascript:creerPrestataire();"> nouveau</button>
			            	<button type="button" class="btn btn-primary" onclick="javascript:modifierPrestataire();"><i class="glyphicon glyphicon-pencil"></i> Modifier</button>
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
					<form action="<?php echo site_url('Prestataire_Controller/update/'.$prestataire->getId()); ?>" method="POST" id="update">
						<input class="form-control" type="hidden" name="id" value="<?php echo $prestataire->getId(); ?>">
						<div class="modal fade" id="updateModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Modification</h4>
                                    </div>
                                    <div class="modal-body">	
										<div class="form-group">		
											<label>Nom</label>		
											<input class="form-control" type="text" name="nom" value="<?php echo $prestataire->getNom(); ?>" required>
										</div>
									</div>
									<div class="modal-footer">
	                                	<button type="button" onClick="javascript:confirmationModification();" class="btn btn-primary">Modifier</button>
	                               		<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	                                </div>
								</div>
                            </div>
                        </div>
                    </form>

					<div class="col-lg-12">
		  				<div class="col-lg-6" style="border-left: solid 2px #999;">
		  					<div class="content-group">
		  						<h4 class="text-semibold no-margin" style="margin: 0;">
		  							<?php echo $prestataire->getNom(); ?>
		  						</h4>
		  						<span class="text-muted text-size-small">NOM</span>
		  					</div>
		  				</div>
		  			</div>
				</div>
			</div>
  		</div>
  	</div>

  	<form action="<?php echo site_url('Prestataire_Controller/create'); ?>" method="POST" id="new">
    	<div class="modal fade" id="newPrestataireModal" role="dialog">
            <div class="modal-dialog">
            
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Creation prestataire</h4>
                    </div>
                    <div class="modal-body">
                    	<div class="form-group">
                    		<label>* Nom</label>
                    		<input class="form-control" type="text" name="nom" required>
                    	</div>
                   	</div>
                	<div class="modal-footer">
                    	<button type="button" onClick="javascript:confirmationCreation();" class="btn btn-primary">Creer</button>
                    	<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="<?php echo site_url('Prestataire_Controller/delete/'.$prestataire->getId()); ?>" method="POST" id="delete">
    </form>

    <div class="modal fade" id="validationModificationModal" role="dialog">
        <div class="modal-dialog">
		<!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Modification</h4>
	            </div>
	            <div class="modal-body">
	            	<h3>Voulez-vous vraiment modifier ce prestataire?</h3>
	            </div>
	            <div class="modal-footer">
	                <a href="#" class="btn btn-success" onclick="javascript:validationModification();" data-dismiss="">Valider</a>
	                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	            </div>
	        </div>
	    </div>
	</div>

  	<div class="modal fade" id="validationCreationModal" role="dialog">
        <div class="modal-dialog">
		<!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Creation</h4>
	            </div>
	            <div class="modal-body">
	            	<h3>Voulez-vous vraiment creer ce prestataire?</h3>
	            </div>
	            <div class="modal-footer">
	                <a href="#" class="btn btn-success" onclick="javascript:validationCreation();" data-dismiss="">Valider</a>
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
	            	<h3>Voulez-vous vraiment supprimer ce prestataire?</h3>
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
  		function modifierPrestataire()
    	{
			$('#updateModal').modal('show');
    	}

    	function creerPrestataire()
    	{
			$('#newPrestataireModal').modal('show');
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

    	function confirmationCreation()
    	{
    		var f = document.getElementById('new');
    		if(f.checkValidity())
    		{
    			$('#validationCreationModal').modal('show');
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

    	function validationCreation()
    	{
    		$('#new').submit();
    	}

    	function validationSuppression()
    	{
    		$('#delete').submit();
    	}
  	</script>