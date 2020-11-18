<!DOCTYPE html>
<html lang="en-US">
<head>
	<title><?=$headTittle?></title>
	<?php $this->load->view('includes/header-includes'); ?>
</head>
<body class="dashbaord-body" dir="<?=$dir?>">
	<!-- left menu -->
	<?php $this->load->view('includes/left-menu'); ?>

	<div class="dashboard-content">
		<div class="row sticky">
			<div class="col-md-12">
				<a href="<?=base_url('manage-factory/manage-sales')?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 style="float: <?=$float?>"><?=$heading?></h3>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success-add-edit-kinow-production')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success-add-edit-kinow-production'); ?>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="row mt-2">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Sales Detail (<?=dateConvertDMY($sellDate)?>)</h4>
			</div>

			<?php
			$count = 0; 
			foreach($salesOfDate as $sale):
				if($sale->id == $this->session->userdata('add-edit-kinow-seling'))
				{
				?>	<div class="col-md-12 mb-3" 
					style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
					-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
					box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
					background: green">
				<?php
				}
				else
				{
				?>
					<div class="col-md-12 mb-3" 
					style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
					-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
					box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
				<?php
				}
				?>
				<div class="bg-white p-2" style="border-radius: 7px">
					<?php
					if($sale->isAmountSet == 0)
					{
					?>
						<span style="display: inline;color:white;background:#ff2b2b;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">Amount Not Set</span>
					<?php
					}
					else
					{
					?>
						<span style="display: inline;color:white;background:black;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">Amount Set</span>
					<?php
					}
					?>
					<a href="<?=base_url('sales-detail/edit-sale/'.$sale->id)?>" class="bg-dark editProductionRecord float-right" style="display: inline" this-id="<?=$sale->id?>" this-url="<?=$url?>">
						<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
					</a>
					<a href="<?=base_url('sales-detail/set-amount/'.$sale->id)?>" class="bg-dark float-right mr-1" style="display: inline">
						<i class="fa fa-money" style="padding: 5px;color: white" aria-hidden="true"></i>
					</a> 
					<br/>
					<br/>
					<h4 class="text-center">
						<?php
						echo 'Sale no: '.++$count.' ';
						if($sale->isAmountSet != 0)
							echo ' (Sale Amount: '.numberFormat($sale->grand_total).' Rs)';
						?>
					</h4>
					<table class="table text-center">
						<thead>
							<th>Phati 8</th>
							<th>Phati 10</th>
							<th>Cotton</th>
							<th>Loading</th>
						</thead>
						<tbody>
							<tr>
								<?php
								if($sale->isAmountSet == 0)
								{
								?>
									<td>
										<?php
										if(!$sale->fourtyEight_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong><?=$sale->fourtyEight_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong><?=$sale->fiftySix_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtyFour_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong><?=$sale->sixtyFour_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong><?=$sale->seventyTwo_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong><?=$sale->eighty_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong><?=$sale->ninety_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong><?=$sale->hundred_first?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong><?=$sale->hundredAndTen_first?></strong>
											<br/>
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if(!$sale->fourtyEight_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong><?=$sale->fourtyEight_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong><?=$sale->fiftySix_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtyFour_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong><?=$sale->sixtyFour_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong><?=$sale->seventyTwo_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong><?=$sale->eighty_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong><?=$sale->ninety_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong><?=$sale->hundred_second?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong><?=$sale->hundredAndTen_second?></strong>
											<br/>
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if(!$sale->fourtyTwo_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong><?=$sale->fourtyTwo_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fourtyEight_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong><?=$sale->fourtyEight_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong><?=$sale->fiftySix_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixty_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong><?=$sale->sixty_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtySix_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong><?=$sale->sixtySix_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong><?=$sale->seventyTwo_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong><?=$sale->eighty_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong><?=$sale->ninety_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong><?=$sale->hundred_cotton?></strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong><?=$sale->hundredAndTen_cotton?></strong>
											<br/>
										<?php
										}
										?>
									</td>
								<?php
								}
								else
								{
								?>
									<td>
										<?php
										if(!$sale->fourtyEight_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong>
												<?=$sale->fourtyEight_first?> x <?=$sale->fourtyEight_first_amount?> : <?=number_format($sale->fourtyEight_first * $sale->fourtyEight_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong>
												<?=$sale->fiftySix_first?> x <?=$sale->fiftySix_first_amount?> : <?=number_format($sale->fiftySix_first * $sale->fiftySix_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtyFour_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong>
												<?=$sale->sixtyFour_first?> x <?=$sale->sixtyFour_first_amount?> : <?=number_format($sale->sixtyFour_first * $sale->sixtyFour_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong>
												<?=$sale->seventyTwo_first?> x <?=$sale->seventyTwo_first_amount?> : <?=number_format($sale->seventyTwo_first * $sale->seventyTwo_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong>
												<?=$sale->eighty_first?> x <?=$sale->eighty_first_amount?> : <?=number_format($sale->eighty_first * $sale->eighty_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong>
												<?=$sale->ninety_first?> x <?=$sale->ninety_first_amount?> : <?=number_format($sale->ninety_first * $sale->ninety_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong>
												<?=$sale->hundred_first?> x <?=$sale->hundred_first_amount?> : <?=number_format($sale->hundred_first * $sale->hundred_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_first == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong>
												<?=$sale->hundredAndTen_first?> x <?=$sale->hundredAndTen_first_amount?> : <?=number_format($sale->hundredAndTen_first * $sale->hundredAndTen_first_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if(!$sale->fourtyEight_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong>
												<?=$sale->fourtyEight_second?> x <?=$sale->fourtyEight_second_amount?> : <?=number_format($sale->fourtyEight_second * $sale->fourtyEight_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong>
												<?=$sale->fiftySix_second?> x <?=$sale->fiftySix_second_amount?> : <?=number_format($sale->fiftySix_second * $sale->fiftySix_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtyFour_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong>
												<?=$sale->sixtyFour_second?> x <?=$sale->sixtyFour_second_amount?> : <?=number_format($sale->sixtyFour_second * $sale->sixtyFour_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong>
												<?=$sale->seventyTwo_second?> x <?=$sale->seventyTwo_second_amount?> : <?=number_format($sale->seventyTwo_second * $sale->seventyTwo_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong>
												<?=$sale->eighty_second?> x <?=$sale->eighty_second_amount?> : <?=number_format($sale->eighty_second * $sale->eighty_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong>
												<?=$sale->ninety_second?> x <?=$sale->ninety_second_amount?> : <?=number_format($sale->ninety_second * $sale->ninety_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong>
												<?=$sale->hundred_second?> x <?=$sale->hundred_second_amount?> : <?=number_format($sale->hundred_second * $sale->hundred_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_second == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong>
												<?=$sale->hundredAndTen_second?> x <?=$sale->hundredAndTen_second_amount?> : <?=number_format($sale->hundredAndTen_second * $sale->hundredAndTen_second_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
									</td>
									<td>
										<?php
										if(!$sale->fourtyTwo_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
											<strong>
												<?=$sale->fourtyTwo_cotton?> x <?=$sale->fourtyTwo_cotton_amount?> : <?=number_format($sale->fourtyTwo_cotton * $sale->fourtyTwo_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fourtyEight_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
											<strong>
												<?=$sale->fourtyEight_cotton?> x <?=$sale->fourtyEight_cotton_amount?> : <?=number_format($sale->fourtyEight_cotton * $sale->fourtyEight_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->fiftySix_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
											<strong>
												<?=$sale->fiftySix_cotton?> x <?=$sale->fiftySix_cotton_amount?> : <?=number_format($sale->fiftySix_cotton * $sale->fiftySix_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixty_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
											<strong>
												<?=$sale->sixty_cotton?> x <?=$sale->sixty_cotton_amount?> : <?=number_format($sale->sixty_cotton * $sale->sixty_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->sixtySix_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
											<strong>
												<?=$sale->sixtySix_cotton?> x <?=$sale->sixtySix_cotton_amount?> : <?=number_format($sale->sixtySix_cotton * $sale->sixtySix_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->seventyTwo_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
											<strong>
												<?=$sale->seventyTwo_cotton?> x <?=$sale->seventyTwo_cotton_amount?> : <?=number_format($sale->seventyTwo_cotton * $sale->seventyTwo_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->eighty_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong>
												<?=$sale->eighty_cotton?> x <?=$sale->eighty_cotton_amount?> : <?=number_format($sale->eighty_cotton * $sale->eighty_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->ninety_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong>
												<?=$sale->ninety_cotton?> x <?=$sale->ninety_cotton_amount?> : <?=number_format($sale->ninety_cotton * $sale->ninety_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundred_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
											<strong>
												<?=$sale->hundred_cotton?> x <?=$sale->hundred_cotton_amount?> : <?=number_format($sale->hundred_cotton * $sale->hundred_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
										<?php
										if(!$sale->hundredAndTen_cotton == 0)
										{
										?>
											<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
											<strong>
												<?=$sale->hundredAndTen_cotton?> x <?=$sale->hundredAndTen_cotton_amount?> : <?=number_format($sale->hundredAndTen_cotton * $sale->hundredAndTen_cotton_amount)?>
											</strong>
											<br/>
										<?php
										}
										?>
									</td>
								<?php
								}
								?>
								<td>
									<span style="color:white;background:green;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">
										Buyer Name
									</span><br/>
									<?php $buyer = $this->Common_model->getRecord($sale->customerId, 'customers'); ?>
									<span><?=$buyer->name?></span><br/>
									<span style="color:white;background:#BFBF01;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">
										Seller Name
									</span><br/>
									<span><?=$sale->sellerName?></span><br/>
									<span style="color:white;background:grey;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">
										Driver Detail
									</span><br/>
									<span><?=$sale->driverName?></span><br/>
									<span><?=$sale->driverNumber?></span><br/>
									<span style="color:white;background:#af8867;font-weight:bold;padding:2px;border-radius:5px;font-size: 13px">
										Transport Number
									</span><br/>
									<span><?=$sale->transportNumber?></span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<?php
		endforeach;
		$this->session->unset_userdata('add-edit-kinow-seling');

		?>
	</div>
</div>
<!-- footer -->
<?php $this->load->view('footer-simple'); ?>

</body>
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 
		var scrollpos = localStorage.getItem('scrollpos');
		if (scrollpos) window.scrollTo(0, scrollpos);
	});

	window.onbeforeunload = function(e) {
		localStorage.setItem('scrollpos', window.scrollY);
	};
</script>
</html























