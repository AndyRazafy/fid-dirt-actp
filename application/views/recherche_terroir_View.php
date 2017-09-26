		<div class="col-md-10">
	  		<div class="row">
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="panel-title">
							<h4>
								Recherche UTB
							</h4>
						</div>	
					</div>

					<hr>

					<div class="panel-body">
		  				<form action="<?php echo site_url('Terroir_Controller/recherche'); ?>" method="GET" class="form-inline" role="form">
							<input type="hidden" name="page" value="1">
							<div class="form-group col-sm-5">
								<label>Nom</label>
								<input type="text" class="form-control" placeholder="Ex: BELANITRA" name="nom" value="<?php echo $search_criteria["nom"]; ?>">
							</div>
							<div class="form-group col-sm-3">
								<label>CP</label>
								<input type="text" class="form-control" placeholder="Ex: AND" name="cp_pseudo" value="<?php echo $search_criteria["cp_pseudo"]; ?>">
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
										<th><a href="">NOM</a></th>
										<td>CP</td>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = $debut;
										foreach ($terroirs as $row) { ?>
										<tr>
											<td class="text-center"><?php echo $i; $i++; ?></td>
											<td><a href="<?php echo site_url('Terroir_Controller/fiche/'.$row->getId()); ?>"><?php echo $row->getNom(); ?></a></td>
											<td><?php echo $row->getCp()->getPseudo(); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<ul class="pagination">
								<?php 
									foreach ($pages as $row) 
									{ ?>
										<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('Terroir_Controller/recherche?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
  				</div>
  			</div>
		</div>