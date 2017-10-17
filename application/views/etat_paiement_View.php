		<?php date_default_timezone_set('Africa/Nairobi'); ?>
		<div class="col-md-10">
	  		<div class="row">
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="col-xs-12 panel-title">
							<h3>
								Paiements
							</h3>
						</div>	
						<hr/>
					</div>

					<hr>
					<div class="panel-body">
						<div class="col-lg-12">
			  				<form action="<?php echo site_url('Paiement_Controller/etatPaiement'); ?>" method="GET" role="form">
								<input type="hidden" name="page" value="1">
                            	<div class="form-group col-sm-3">
									<label>GT</label>
									<input type="text" class="form-control" placeholder="Ex: BELANITRA" name="gtnom" value="<?php echo $search_criteria["gtnom"]; ?>">
								</div>
								<div class="form-group col-lg-2">
                            		<label for="paiement">paiement</label>
                            		<select class="form-control" name="paiement">
                            			<option value="<?php echo $search_criteria["paiement"]; ?>"><?php echo $search_criteria["paiement"]; ?></option>
										<?php for ($i = 1;$i < 4;$i++) { 
											if($search_criteria["paiement"] != $i) {?>
											<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } } ?>
									</select>
                            	</div>
								<button type="submit" class="btn btn-primary" style="margin-top: 22px;">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</form>
						</div>

						<div class="col-lg-12">
							<hr>
						</div>

						<table class="table table-bordered table-hover">
							<thead class="thead">
								<tr>
									<th>#</th>
									<th>GT</th>
									<th>intervention</th>
									<th>paiement</th>
									<th>date prevue paiement</th>
									<th>jour(s)</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = $debut;
									$paiement_rang = 1;
									foreach ($paiements as $row)
									{
										echo "<tr>";
										echo "<td>".$i."</td>";
										echo "<td><a href='".site_url("GroupeTravail_Controller/fiche/".$row->getIntervention()->getGroupeTravail()->getId())."'>".$row->getIntervention()->getGroupeTravail()->getNom()."</a></td>";
										echo "<td>ACTP".$row->getIntervention()->getRang()."</td>";
										echo "<td>PAIEMENT ".$row->getRang()."</td>";
										echo "<td>".($row->getDatePrevue() ? date("d/m/Y", strtotime($row->getDatePrevue())) : '-')."</td>";
										echo "<td>".$row->dateDifference($row->getDatePrevue(), date("Y-m-d"), "dans %d jour(s)")."</td>";
										echo "</tr>";
										$i++;
									}
								?>
							</tbody>
						</table>

						<div>
							<ul class="pagination">
								<?php 
									foreach ($pages as $row) 
									{ ?>
										<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('Paiement_Controller/etatPaiement?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>	
  				</div>
  			</div>
		</div>