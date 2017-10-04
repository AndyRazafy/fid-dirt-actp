		<div class="col-md-10">
	  		<div class="row">
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="panel-title">
							<h2>
								Recherche GT
							</h2>
						</div>	
					</div>

					<hr>

					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
				  				<form action="<?php echo site_url('GroupeTravail_Controller/recherche'); ?>" method="GET" class="form-inline" role="form">
									<input type="hidden" name="page" value="1">
									<div class="form-group col-sm-3">
										<label>GT</label>
										<input type="text" class="form-control" placeholder="Ex: BELANITRA" name="gt_nom" value="<?php echo $search_criteria["gtnom"]; ?>">
									</div>
									<div class="form-group  col-sm-2">
										<label>Code chantier</label>
										<input type="text" class="form-control" placeholder="Ex: 1aT02A" name="gt_codechantier" value="<?php echo $search_criteria["gtcodechantier"]; ?>">
									</div>
									<div class="form-group  col-sm-3">
										<label>UTB</label>
										<input type="text" class="form-control" placeholder="Ex: BELANITRA" name="terroir_nom" value="<?php echo $search_criteria["terroirnom"]; ?>">
									</div>
									<div class="form-group  col-sm-3">
										<label>AGEC</label>
										<input type="text" class="form-control" placeholder="Ex: ADID" name="agec_nom" value="<?php echo $search_criteria["agecnom"]; ?>">
									</div>
									<div class="form-group  col-sm-2">
										<label>CP</label>
										<input type="text" class="form-control" placeholder="Ex: AND" name="cp_pseudo" value="<?php echo $search_criteria["cppseudo"]; ?>">
									</div>
									<button type="submit" class="btn btn-primary" style="margin-top: 22px;">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</form>

							</div>

							<div class="col-lg-12">
								<hr>
								<table class="table table-bordered table-hover">
									<thead class="thead">
										<tr>
											<th class="text-center">#</th>
											<th>GT</th>
											<th class="text-center" width="10%">code chantier</th>
											<th>UTB</th>
											<th>AGEC</th>
											<th class="text-center">phase</th>
											<th class="text-center">CP</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$i = $debut;
											foreach ($groupetravails as $row) { ?>	
												<tr>
													<td class="text-center"><?php echo $i; $i++; ?></td>
													<td><a href="<?php echo site_url('GroupeTravail_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getNom(); ?></a></td>
													<td class="text-center"><?php echo $row->getCodeChantier(); ?></td>
													<td><a href="<?php echo site_url('Terroir_Controller/fiche/'.$row->getTerroir()->getId()); ?>"><?php echo $row->getTerroir()->getNom(); ?></a></td>
													<td><?php echo $row->getTerroir()->getPrestataireAgec()->getNom(); ?></td>
													<td class="text-center"><?php echo $row->getPhase($row->getInterventions()); ?></td>
													<td class="text-center"><?php echo $row->getTerroir()->getCp()->getPseudo(); ?></td>
												</tr>
										<?php } ?>
									</tbody>
								</table>

								<div>
									<ul class="pagination">
										<?php 
											foreach ($pages as $row) 
											{ ?>
												<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('GroupeTravail_Controller/recherche?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
  				</div>
  			</div>
		</div>