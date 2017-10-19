	<div class="col-lg-10">
  		<div class="row">
  			<div class="content-box-large">
				<div class="panel-heading">
					<div class="col-lg-10 panel-title">
						<h3 class="col-lg-5">
							Recherche charge de proget
						</h3>
					</div>
					<hr/>
				</div>

				<hr style="margin: 0;"/>
				<div class="panel-body">
					<?php
				        echo $this->session->flashdata('info');
				    ?>
	  				<form action="<?php echo site_url('ChargeProjet_Controller/recherche'); ?>" method="GET" class="form-inline" role="form">
						<input type="hidden" name="page" value="1">
						<div class="form-group col-sm-3">
							<label>Nom</label>
							<input type="text" class="form-control" placeholder="" name="nom" value="<?php echo $search_criteria["nom"]; ?>">
						</div>
						<div class="form-group col-sm-3">
							<label>Prenom</label>
							<input type="text" class="form-control" placeholder="" name="prenom" value="<?php echo $search_criteria["prenom"]; ?>">
						</div>
						<div class="form-group col-sm-3">
							<label>Pseudo</label>
							<input type="text" class="form-control" placeholder="" name="pseudo" value="<?php echo $search_criteria["pseudo"]; ?>">
						</div>
						<button type="submit" class="btn btn-primary" style="margin-top: 22px;">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</form>

					<hr>

					<div class="col-lg-12">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center" width="5%">#</th>
									<th><a href="">nom</a></th>
									<td>prenom</td>
									<td>pseudo</td>
									<td>terroir</td>
								</tr>
							</thead>
							<tbody>
								<?php 
									$i = $debut;
									foreach ($cps as $row) { ?>
									<tr>
										<td class="text-center"><?php echo $i; $i++; ?></td>
										<td width="70%"><a href="<?php echo site_url('ChargeProjet_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getNom(); ?></a></td>
										<td width="70%"><a href="<?php echo site_url('ChargeProjet_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getPrenom(); ?></a></td>
										<td width="70%"><a href="<?php echo site_url('ChargeProjet_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getPseudo(); ?></a></td>
										<td width="70%"></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>

						<ul class="pagination">
							<?php 
								foreach ($pages as $row) 
								{ ?>
									<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('ChargePorjet_Controller/recherche?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
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
					            	<h3>Voulez-vous vraiment creer ce prestataire?</h3>
					            </div>
					            <div class="modal-footer">
					                <a href="#" class="btn btn-success" onclick="javascript:validation('form');" data-dismiss="">Valider</a>
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

    	function supprimerCp(nom)
    	{
    		var hash = "#";
			nom = hash.concat(nom)
			$(nom).modal('show');	
    	}

    	function validation(form)
    	{
    		var hash = "#";
			form = hash.concat(form)
    		$(form).submit();
    	}
	</script>