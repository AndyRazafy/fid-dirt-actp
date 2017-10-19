	<div class="col-lg-10">
  		<div class="row">
  			<div class="content-box-large">
				<div class="panel-heading">
					<div class="col-lg-10 panel-title">
						<h3 class="col-lg-5">
							Recherche agence payeur
						</h3>
						<div class="panel-options">
							<button type="button" class="btn btn-success" onclick="javascript:creerPrestataire();"> nouveau</button>
			            </div>
					</div>
					<hr/>
				</div>

				<hr style="margin: 0;"/>
				<div class="panel-body">
					<?php
				        echo $this->session->flashdata('info');
				    ?>
	  				<form action="<?php echo site_url('AgencePaiement_Controller/recherche'); ?>" method="GET" class="form-inline" role="form">
						<input type="hidden" name="page" value="1">
						<div class="form-group col-sm-5">
							<label>Nom</label>
							<input type="text" class="form-control" placeholder="Ex: TELMA" name="nom" value="<?php echo $search_criteria["nom"]; ?>">
						</div>
						<button type="submit" class="btn btn-primary" style="margin-top: 22px;">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</form>

					<form action="<?php echo site_url('AgencePaiement_Controller/create'); ?>" method="POST" id="new">
                    	<div class="modal fade" id="newAgenceModal" role="dialog">
                            <div class="modal-dialog">
                            
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Creation agence payeur</h4>
                                    </div>
                                    <div class="modal-body">
                                    	<div class="form-group">
                                    		<label>* Nom</label>
                                    		<input class="form-control" type="text" name="nom" required>
                                    	</div>
                                    	<div class="modal-footer">
	                                    	<button type="button" onClick="javascript:confirmation();" class="btn btn-primary">Creer</button>
	                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

					<hr>

					<div class="col-lg-12">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center" width="5%">#</th>
									<th><a href="">Agence payeur</a></th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = $debut;
									foreach ($agencePaiements as $row) { ?>
									<tr>
										<td class="text-center"><?php echo $i; $i++; ?></td>
										<td width="70%"><a href="<?php echo site_url('AgencePaiement_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getNom(); ?></a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<ul class="pagination">
							<?php 
								foreach ($pages as $row) 
								{ ?>
									<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('AgencePaiement_Controller/recherche?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
							<?php } ?>
						</ul>
					</div>

					<div class="modal fade" id="validationModal" role="dialog">
				        <div class="modal-dialog">
						<!-- Modal content-->
					        <div class="modal-content">
					            <div class="modal-header">
					                <h4 class="modal-title">Creation</h4>
					            </div>
					            <div class="modal-body">
					            	<h3>Voulez-vous vraiment creer cette agence de paiement?</h3>
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
		function creerPrestataire()
    	{
			$('#newAgenceModal').modal('show');
    	}

    	function confirmation()
    	{
    		var f = document.getElementById('new');
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
    		$('#new').submit();
    	}
   	</script>