		<div class="col-md-10">
	  		<div class="row">
	  			<div class="content-box-large">
  					<div class="panel-heading">
						<div class="panel-title">
							<h4>
								Phase
							</h4>
						</div>
					</div>

					<hr>

					<div class="panel-body">
						<table class="table table-bordered table-hover">
							<thead class="thead">
								<tr>
									<th></th>
									<?php
										for($rang = 1; $rang <= $max_rang;$rang++)
										{
											echo "<th>ACTP".$rang."</th>";
										}
									?>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($phases as $row)
									{
										echo "<tr><td>".$row->getValeur()."</td>";
										for($rang = 1;$rang <= $max_rang;$rang++)
										{
											echo "<td>".sizeof($etat[$row->getValeur()][$rang])."</td>";
										}
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>	
  				</div>
  			</div>
		</div>