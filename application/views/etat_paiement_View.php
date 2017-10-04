		<?php date_default_timezone_set('Africa/Nairobi'); ?>
		<div class="col-md-10">
	  		<div class="row">
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="panel-title">
							<h4>
								Paiements
							</h4>
						</div>
					</div>

					<hr>

					<div class="panel-body">
						<div class="col-lg-12">
			  				<form action="<?php echo site_url('Intervention_Controller/etatPaiement'); ?>" method="GET" role="form">
								<input type="hidden" name="page" value="1">
								<div class="form-group col-lg-2">
                            		<label for="rang">intervention</label>
                            		<select class="form-control" name="rang">
                            			<option value="all">tout</option>
										<?php for ($i = 1;$i <= $max_rang;$i++) { ?>
											<option value="<?php echo $i; ?>"><?php echo "ACTP".$i; ?></option>
										<?php } ?>
									</select>
                            	</div>
                            	<div class="form-group col-sm-3">
										<label>GT</label>
										<input type="text" class="form-control" placeholder="Ex: BELANITRA" name="gtnom" value="<?php echo $search_criteria["gtnom"]; ?>">
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
									<th>jour(s) restant(s)</th>
								</tr>
							</thead>
							<tbody>
								<?php
									// $i = $debut;
									// foreach ($interventions as $row)
									// {
									// 	echo "<tr>";
									// 	echo "<td>".$i."</td>";
									// 	echo "<td><a href='".site_url("GroupeTravail_Controller/fiche/".$row->getGroupeTravail()->getId())."'>".$row->getGroupeTravail()->getNom()."</a></td>";
									// 	echo "<td>ACTP".$row->getRang()."</td>";
									// 	echo "<td>".($row->getDPrevPaiement1() ? date("d/m/Y", strtotime($row->getDPrevPaiement1())) : '-')."</td>";
									// 	echo "<td>".$row->dateDifference($row->getDPrevPaiement1(), date("Y-m-d"), "dans %d jour(s)")."</td>";
									// 	echo "<td>".($row->getDPrevPaiement2() ? date("d/m/Y", strtotime($row->getDPrevPaiement2())) : '-')."</td>";
									// 	echo "<td>".$row->dateDifference($row->getDPrevPaiement2(), date("Y-m-d"), "dans %d jour(s)")."</td>";
									// 	echo "<td>".($row->getDPrevPaiement3() ? date("d/m/Y", strtotime($row->getDPrevPaiement3())) : '-')."</td>";
									// 	echo "<td>".$row->dateDifference($row->getDPrevPaiement3(), date("Y-m-d"), "dans %d jour(s)")."</td>";
									// 	echo "</tr>";
									// 	$i++;
									// }

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
										echo "<td>".$row->getIntervention()->dateDifference($row->getDatePrevue(), date("Y-m-d"), "dans %d jour(s)")."</td>";
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
										<li class="<?php echo $row->getBootstrapClassName(); ?>"><a href="<?php echo site_url('Intervention_Controller/etatPaiement?page='.$row->getPage().'&'.$search_url); ?>"><?php echo $row->getPage(); ?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>	
  				</div>
  			</div>
		</div>