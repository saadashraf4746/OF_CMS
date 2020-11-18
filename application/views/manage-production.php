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
				<a href="<?=base_url('manage-factory/'.$this->session->userdata('season-id'))?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
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

		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Kinow Phati And Cotton Detail</h4>
			</div>
			<div class="col-md-4 mb-3" 
			style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
			<div class="bg-white p-2" style="border-radius: 7px">
				<h4 class="text-center">
					Overall In Detail
				</h4>
				<table class="table text-center">
					<thead>
						<th>Phati 8 Kg</th>
						<th>Phati 10 Kg</th>
						<th>Cotton</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_first?></strong>
								<br/>

								<br/>
								<br/>
								<br/>
								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalFirst?></strong>
								<br/>
							</td>

							<td>
								<strong style="color: green; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_second?></strong>
								<br/>
								<br/>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalSecond?></strong>
								<br/>
							</td>


							<td>
								<strong style="color: grey; font-weight: bold; font-size: 16px">42:</strong>
								<strong><?=$overallStatistics->fourtyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">60:</strong>
								<strong><?=$overallStatistics->sixty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">66:</strong>
								<strong><?=$overallStatistics->sixtySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_cotton?></strong>
								<br/>


								<strong style="color: grey; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_cotton?></strong>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->cottonTotal?></strong>
								<br/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
			<div class="col-md-4 mb-3" 
			style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
			<div class="bg-white p-2" style="border-radius: 7px">
				<h4 class="text-center">
					Overall Sell Detail
				</h4>
				<table class="table text-center">
					<thead>
						<th>Phati 8 Kg</th>
						<th>Phati 10 Kg</th>
						<th>Cotton</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_first?></strong>
								<br/>

								<br/>
								<br/>
								<br/>
								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalFirst?></strong>
								<br/>
							</td>

							<td>
								<strong style="color: green; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_second?></strong>
								<br/>
								<br/>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalSecond?></strong>
								<br/>
							</td>


							<td>
								<strong style="color: grey; font-weight: bold; font-size: 16px">42:</strong>
								<strong><?=$overallStatistics->fourtyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">60:</strong>
								<strong><?=$overallStatistics->sixty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">66:</strong>
								<strong><?=$overallStatistics->sixtySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_cotton?></strong>
								<br/>


								<strong style="color: grey; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_cotton?></strong>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->cottonTotal?></strong>
								<br/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
			<div class="col-md-4 mb-3" 
			style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
			box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
			<div class="bg-white p-2" style="border-radius: 7px">
				<h4 class="text-center">
					Overall Remaining Detail
				</h4>
				<table class="table text-center">
					<thead>
						<th>Phati 8 Kg</th>
						<th>Phati 10 Kg</th>
						<th>Cotton</th>
					</thead>
					<tbody>
						<tr>
							<td>
								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_first?></strong>
								<br/>

								<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_first?></strong>
								<br/>

								<br/>
								<br/>
								<br/>
								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalFirst?></strong>
								<br/>
							</td>

							<td>
								<strong style="color: green; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">64:</strong>
								<strong><?=$overallStatistics->sixtyFour_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_second?></strong>
								<br/>

								<strong style="color: green; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_second?></strong>
								<br/>
								<br/>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->totalSecond?></strong>
								<br/>
							</td>


							<td>
								<strong style="color: grey; font-weight: bold; font-size: 16px">42:</strong>
								<strong><?=$overallStatistics->fourtyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">48:</strong>
								<strong><?=$overallStatistics->fourtyEight_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">56:</strong>
								<strong><?=$overallStatistics->fiftySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">60:</strong>
								<strong><?=$overallStatistics->sixty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">66:</strong>
								<strong><?=$overallStatistics->sixtySix_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">72:</strong>
								<strong><?=$overallStatistics->seventyTwo_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">80:</strong>
								<strong><?=$overallStatistics->eighty_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">90:</strong>
								<strong><?=$overallStatistics->ninety_cotton?></strong>
								<br/>


								<strong style="color: grey; font-weight: bold; font-size: 16px">100:</strong>
								<strong><?=$overallStatistics->hundred_cotton?></strong>
								<br/>

								<strong style="color: grey; font-weight: bold; font-size: 16px">110:</strong>
								<strong><?=$overallStatistics->hundredAndTen_cotton?></strong>
								<br/>
								<br/>

								<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
								<strong><?=$overallStatistics->cottonTotal?></strong>
								<br/>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row" id="add-section" 
	style="background: #fffff5;padding: 14px;border: 1px solid #cddede;border-radius: 8px;
	-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
	-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
	box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
	">
	<div class="col-md-12">
		<h4 class="text-center bg-dark" style="color:white">Add Kinow Phati Cotton To Production</h4>
	</div>
	<?php
	if(count($selectedRecord) > 0 && $selectedRecord->isFirstFilled)
	{
		echo '<div class="col-md-4" hidden>';
	}
	else
	{
		echo '<div class="col-md-4">';
	}
	?>
	<div id="addForemanPayment" style="background: #fdfbb5;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
		<h3 class="text-center">Phati 8KG</h3>
		<span id="bardanaAtleastOne" style="color: red; display: none"></span>
		<form id="addPhatiToProduction" method="POST" action="<?=base_url('factory/addPhatiToProduction')?>">
			<input type="hidden" name="seasonId" value="<?=$seasonId?>">
			<input type="hidden" name="kgType" value="8">
			<label>Date</label>
			<input type="text" name="addDate" value="<?=todayDate();?>" class="form-control date-masking" />
			<br/>

			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Phati</span>
				</div>
				<input type="text" name="fourtyEight" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Phati</span>
				</div>
				<input type="text" name="fiftySix" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64 Dana Phati</span>
				</div>
				<input type="text" name="sixtyFour" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Phati</span>
				</div>
				<input type="text" name="seventyTwo" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Phati</span>
				</div>
				<input type="text" name="eighty" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Phati</span>
				</div>
				<input type="text" name="ninety" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Phati</span>
				</div>
				<input type="text" name="hundred" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Phati</span>
				</div>
				<input type="text" name="hundredAndTen" value="0" class="form-control numeric-masking eightKgTotal">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="pathi8KgTotal" class="form-control" placeholder="Total">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
			<button class="btn btn-small btn-warning mt-2" type="submit">Add</button>
		</form>
	</div>
</div>

<?php
if(count($selectedRecord) > 0 && $selectedRecord->isSecondFilled)
{
	echo '<div class="col-md-4" hidden>';
}
else
{
	echo '<div class="col-md-4">';
}
?>
<div id="addForemanPayment" style="background: #fdfbb5;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
	<h3 class="text-center">Phati 10KG</h3>
	<span id="bardanaAtleastOne" style="color: red; display: none"></span>
	<form id="addPhatiToProduction" method="POST" action="<?=base_url('factory/addPhatiToProduction')?>">
		<input type="hidden" name="seasonId" value="<?=$seasonId?>">
		<input type="hidden" name="kgType" value="10">
		<label>Date</label>
		<input type="text" name="addDate" value="<?=todayDate();?>" class="form-control date-masking" />
		<br/>

		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">48 Dana Phati</span>
			</div>
			<input type="text" name="fourtyEight" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">56 Dana Phati</span>
			</div>
			<input type="text" name="fiftySix" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">64 Dana Phati</span>
			</div>
			<input type="text" name="sixtyFour" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">72 Dana Phati</span>
			</div>
			<input type="text" name="seventyTwo" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">80 Dana Phati</span>
			</div>
			<input type="text" name="eighty" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">90 Dana Phati</span>
			</div>
			<input type="text" name="ninety" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">100 Dana Phati</span>
			</div>
			<input type="text" name="hundred" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">110 Dana Phati</span>
			</div>
			<input type="text" name="hundredAndTen" value="0" class="form-control numeric-masking tenKgTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>

		<label class="mt-2">Total</label>
		<input readonly type="text" name="pathi10KgTotal" class="form-control" placeholder="Total">
		<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		<button class="btn btn-small btn-warning mt-2" type="submit">Add</button>
	</form>
</div>
</div>

<?php
if(count($selectedRecord) > 0 && $selectedRecord->isCottonFilled)
{
	echo '<div class="col-md-4" hidden>';
}
else
{
	echo '<div class="col-md-4">';
}
?>
<div id="addForemanPayment" style="background: #fbc084;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
	<h3 class="text-center">Cotton</h3>
	<span id="bardanaAtleastOne" style="color: red; display: none"></span>
	<form id="addCottonToProduction" method="POST" action="<?=base_url('factory/addCottonToProduction')?>">
		<input type="hidden" name="seasonId" value="<?=$seasonId?>">
		<label>Date</label>
		<input type="text" name="addDate" value="<?=todayDate();?>" class="form-control date-masking" />
		<br/>

		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">42 Dana Cotton</span>
			</div>
			<input type="text" name="fourtyTwo" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">48 Dana Cotton</span>
			</div>
			<input type="text" name="fourtyEight" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">56 Dana Cotton</span>
			</div>
			<input type="text" name="fiftySix" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">60 Dana Cotton</span>
			</div>
			<input type="text" name="sixty" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">66 Dana Cotton</span>
			</div>
			<input type="text" name="sixtySix" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">72 Dana Cotton</span>
			</div>
			<input type="text" name="seventyTwo" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">80 Dana Cotton</span>
			</div>
			<input type="text" name="eighty" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">90 Dana Cotton</span>
			</div>
			<input type="text" name="ninety" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">100 Dana Cotton</span>
			</div>
			<input type="text" name="hundred" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>
		<div class="input-group mb-1">
			<div class="input-group-prepend">
				<span class="input-group-text">110 Dana Cotton</span>
			</div>
			<input type="text" name="hundredAndTen" value="0" class="form-control numeric-masking cottonTotal">
			<input type="text" value="10Kg" class="form-control" readonly/>
		</div>

		<label class="mt-2">Total</label>
		<input readonly type="text" name="cottonTotal" class="form-control" placeholder="Total">
		<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		<button class="btn btn-small btn-warning mt-2" type="submit">Add</button>
	</form>
</div>
</div>
</div>

<div class="row mt-5" id="edit-section" 
style="
display:none;background: #fffff5;padding: 14px;border: 1px solid #cddede;border-radius: 8px;
-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
">
<div class="col-md-12" >
	<h4 class="text-center bg-dark" id="edit-section-heading" style="color:white">Edit Kinow Phati Cotton To Production</h4>
</div>
<div class="col-md-4" id="edit-first" style="display: none">
	<div id="addForemanPayment" style="background: #baffdc;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
		<h3 class="text-center">Phati 8KG</h3>
		<span id="bardanaAtleastOne" style="color: red; display: none"></span>
		<form id="updateRecordProduction" method="POST" action="<?=base_url('factory/updateRecordProduction')?>">
			<input type="hidden" name="recordId" class="recordId_edit">
			<input type="hidden" name="url" class="url">
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Phati</span>
				</div>
				<input type="text" name="fourtyEight_first" id="fourtyEight_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Phati</span>
				</div>
				<input type="text" name="fiftySix_first" id="fiftySix_one_edit"  class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64 Dana Phati</span>
				</div>
				<input type="text" name="sixtyFour_first" id="sixtyFour_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Phati</span>
				</div>
				<input type="text" name="seventyTwo_first" id="seventyTwo_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Phati</span>
				</div>
				<input type="text" name="eighty_first" id="eighty_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Phati</span>
				</div>
				<input type="text" name="ninety_first" id="ninety_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Phati</span>
				</div>
				<input type="text" name="hundred_first" id="hundred_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Phati</span>
				</div>
				<input type="text" name="hundredAndTen_first" id="hundredAndTen_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalFirst" id="pathi8KgTotal_one_edit" class="form-control" placeholder="Total">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-second" style="display: none">
		<div id="addForemanPayment" style="background: #baffdc;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Phati 10KG</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Phati</span>
				</div>
				<input type="text" name="fourtyEight_second" id="fourtyEight_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Phati</span>
				</div>
				<input type="text" name="fiftySix_second" id="fiftySix_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64 Dana Phati</span>
				</div>
				<input type="text" name="sixtyFour_second" id="sixtyFour_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Phati</span>
				</div>
				<input type="text" name="seventyTwo_second" id="seventyTwo_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Phati</span>
				</div>
				<input type="text" name="eighty_second" id="eighty_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Phati</span>
				</div>
				<input type="text" name="ninety_second" id="ninety_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Phati</span>
				</div>
				<input type="text" name="hundred_second" id="hundred_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Phati</span>
				</div>
				<input type="text" name="hundredAndTen_second" id="hundredAndTen_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalSecond" id="pathi10KgTotal_second_total" class="form-control">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-cotton" style="display: none">
		<div id="addForemanPayment" style="background: #b7b7b7;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Cotton</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span> 
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">42 Dana Cotton</span>
				</div>
				<input type="text" name="fourtyTwo_cotton" id="fourtyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Cotton</span>
				</div>
				<input type="text" name="fourtyEight_cotton" id="fourtyEight_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Cotton</span>
				</div>
				<input type="text" name="fiftySix_cotton" id="fiftySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">60 Dana Cotton</span>
				</div>
				<input type="text" name="sixty_cotton" id="sixty_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">66 Dana Cotton</span>
				</div>
				<input type="text" name="sixtySix_cotton" id="sixtySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Cotton</span>
				</div>
				<input type="text" name="seventyTwo_cotton" id="seventyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Cotton</span>
				</div>
				<input type="text" name="eighty_cotton" id="eighty_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Cotton</span>
				</div>
				<input type="text" name="ninety_cotton" id="ninety_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Cotton</span>
				</div>
				<input type="text" name="hundred_cotton" id="hundred_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Cotton</span>
				</div>
				<input type="text" name="hundredAndTen_cotton" id="hundredAndTen_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="cottonTotal" id="cottonTotal_cooton_edit" class="form-control" placeholder="Total">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
		<button class="btn btn-small btn-warning float-right mt-2" type="submit">Update</button>
	</div>
</form>
</div>

<div class="row mt-5">
	<div class="col-md-12">
		<h4 class="text-center bg-dark" style="color:white">Kinow Phati And Cotton Detail</h4>
	</div>

	<?php
	foreach($productionList as $list):
		?>
		<div class="col-md-4 mb-3" 
		style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
		-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
		box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
		<div class="bg-white p-2" style="border-radius: 7px">
			<a href="" class="bg-dark editProductionRecord" this-id="<?=$list->id?>" this-url="<?=$url?>">
				<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
			</a>
			<h4 class="text-center">
				<?=dateConvertDMY($list->addDate)?> (<?=$list->totalFirst+$list->totalSecond+$list->cottonTotal?>)
			</h4>
			<table class="table text-center">
				<thead>
					<th>Phati 8 Kg</th>
					<th>Phati 10 Kg</th>
					<th>Cotton</th>
				</thead>
				<tbody>
					<tr>
						<td>
							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">48:</strong>
							<strong><?=$list->fourtyEight_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">56:</strong>
							<strong><?=$list->fiftySix_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">64:</strong>
							<strong><?=$list->sixtyFour_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">72:</strong>
							<strong><?=$list->seventyTwo_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">80:</strong>
							<strong><?=$list->eighty_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">90:</strong>
							<strong><?=$list->ninety_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">100:</strong>
							<strong><?=$list->hundred_first?></strong>
							<br/>

							<strong style="color: #f7b148; font-weight: bold; font-size: 16px">110:</strong>
							<strong><?=$list->hundredAndTen_first?></strong>
							<br/>
							<br/>
							<br/>
							<br/>

							<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
							<strong><?=$list->totalFirst?></strong>
							<br/>
						</td>

						<td>
							<strong style="color: green; font-weight: bold; font-size: 16px">48:</strong>
							<strong><?=$list->fourtyEight_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">56:</strong>
							<strong><?=$list->fiftySix_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">64:</strong>
							<strong><?=$list->sixtyFour_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">72:</strong>
							<strong><?=$list->seventyTwo_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">80:</strong>
							<strong><?=$list->eighty_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">90:</strong>
							<strong><?=$list->ninety_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">100:</strong>
							<strong><?=$list->hundred_second?></strong>
							<br/>

							<strong style="color: green; font-weight: bold; font-size: 16px">110:</strong>
							<strong><?=$list->hundredAndTen_second?></strong>
							<br/>
							<br/>
							<br/>
							<br/>

							<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
							<strong><?=$list->totalSecond?></strong>
							<br/>
						</td>


						<td>
							<strong style="color: grey; font-weight: bold; font-size: 16px">42:</strong>
							<strong><?=$list->fourtyTwo_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">48:</strong>
							<strong><?=$list->fourtyEight_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">56:</strong>
							<strong><?=$list->fiftySix_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">60:</strong>
							<strong><?=$list->sixty_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">66:</strong>
							<strong><?=$list->sixtySix_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">72:</strong>
							<strong><?=$list->seventyTwo_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">80:</strong>
							<strong><?=$list->eighty_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">90:</strong>
							<strong><?=$list->ninety_cotton?></strong>
							<br/>


							<strong style="color: grey; font-weight: bold; font-size: 16px">100:</strong>
							<strong><?=$list->hundred_cotton?></strong>
							<br/>

							<strong style="color: grey; font-weight: bold; font-size: 16px">110:</strong>
							<strong><?=$list->hundredAndTen_cotton?></strong>
							<br/>
							<br/>

							<strong style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px">Total:</strong>
							<strong><?=$list->cottonTotal?></strong>
							<br/>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php
endforeach;
?>
</div>

		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Manage Customers</h4>
				<?php if($this->session->flashdata('success_add_edit_customer')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_add_edit_customer'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_customer_list')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_customer_list'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3 mb-2" id="addCustomerSection">
				<div style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
					<h3>Add Customer</h3>
					<form id="addCustomer" method="POST" action="<?=base_url('factory/addCustomer')?>">
						<label>Customer Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter Customer Name">
						<label>Customer Phone</label>
						<input type="text" name="phone" class="form-control phone-validation" placeholder="Enter customer phone" />
						<button class="btn btn-small btn-warning mt-2" name="addCustomer" type="submit">Add</button>
					</form>
				</div>
			</div>
			<div class="col-md-3 mb-2" id="editCustomerSection" style="background: #f3a8a8;padding: 14px;border: 1px solid #fb9e9e;border-radius: 8px;display: none;">
				<h3>Edit Customer</h3>
				<form id="editCustomer" method="POST" action="<?=base_url('factory/editCustomer')?>">
					<input type="hidden" name="customerId" id="customerIdEdit">
					<input type="hidden" name="url" id="url_customer_edit">
					<label>Supplier Name</label>
					<input type="text" name="name" id="nameEditCustomer" class="form-control" >
					<label>Customer Phone</label>
					<input type="text" name="phone" id="phoneEditCustomer" class="form-control phone-validation" />
					<button class="btn btn-small btn-warning mt-2" name="editCustomer" type="submit">Edit Customer</button>
				</form>
			</div>
			<div class="col-md-9">
				<table class="table table-bordered table-sm datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>Customer Name</th>
							<th>Customer Phone</th>
							<th><?=$this->lang->line('action')?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if(count($customers)==0)
						{
							?>
							<tr>
								<td></td>
								<td><?=$this->lang->line('no_record_found')?></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 0;
							foreach($customers as $customer):
								?>
								<tr id="customers_edit_row_<?=$customer->id?>"
									<?php if($customer->id == $this->session->userdata('customer-add-edit'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>
								>
									<td><?=++$count;?></td>
									<td><?=$customer->name;?></td>
									<td><?=$customer->phone;?></td>
									<td>
										<a href="<?=base_url('manage-production/manage-customer/'.$customer->id)?>" class="bg-dark mb-1">
											<i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a> 
										<a href="" class="bg-dark editCustomer" this-id="<?=$customer->id?>" this-url="<?=$url?>">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/customers/'.$customer->id.'/'.$url.'/customer_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
											<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
										</a>
									</td>
								</tr>
								<?php
							endforeach;
							$this->session->unset_userdata('customer-add-edit');
						}
						?>
					</tbody>
				</table>
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

	$('.eightKgTotal').keyup(function() {
		var sum = 0;
		$('.eightKgTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=pathi8KgTotal]').val(sum);
	});

	$('.eightKgTotalEdit').keyup(function() {
		var sum = 0;
		$('.eightKgTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#pathi8KgTotal_one_edit').val(sum);
	});

	$('.tenKgTotal').keyup(function() {
		var sum = 0;
		$('.tenKgTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=pathi10KgTotal]').val(sum);
	});

	$('.tenKgTotalEdit').keyup(function() {
		var sum = 0;
		$('.tenKgTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#pathi10KgTotal_second_total').val(sum);
	});

	$('.cottonTotal').keyup(function() {
		var sum = 0;
		$('.cottonTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=cottonTotal]').val(sum);
	});

	$('.cottonTotalEdit').keyup(function() {
		var sum = 0;
		$('.cottonTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#cottonTotal_cooton_edit').val(sum);
	});

	$('.editProductionRecord').click(function(e){
		e.preventDefault();
		$('tr').removeClass('activeForEdit');

		var recordId = $(this).attr('this-id');
		var link      = $(this).attr('this-url');
		var table = 'kinow_production';
  // console.log(paymentId+' '+link+' '+table );
  $.ajax({              //request ajax
  	type: "POST",
  	url: "<?=base_url('CommonController/getRecord')?>", 
  	data: {id:recordId,table:table},
  	dataType: "json",
  	success: function(response) 
  	{        	
  		$('#add-section').hide();
  		$('#edit-section').show();
  		$('.recordId_edit').val(recordId);
  		$('.url').val(link);
  		$('#edit-section-heading').html('');
  		$('#edit-section-heading').html(`Edit Kinow Phati Cotton To Production Record (${dateToDMY(response.data.addDate)})`);



  		$('#edit-first').show();
  		$('#fourtyEight_one_edit').val(response.data.fourtyEight_first);
  		$('#fiftySix_one_edit').val(response.data.fiftySix_first);
  		$('#sixtyFour_one_edit').val(response.data.sixtyFour_first);
  		$('#seventyTwo_one_edit').val(response.data.seventyTwo_first);
  		$('#eighty_one_edit').val(response.data.eighty_first);
  		$('#ninety_one_edit').val(response.data.ninety_first);
  		$('#hundred_one_edit').val(response.data.hundred_first);
  		$('#hundredAndTen_one_edit').val(response.data.hundredAndTen_first);
  		$('#pathi8KgTotal_one_edit').val(response.data.totalFirst);

  		$('#edit-second').show();
  		$('#fourtyEight_second_edit').val(response.data.fourtyEight_second);
  		$('#fiftySix_second_edit').val(response.data.fiftySix_second);
  		$('#sixtyFour_second_edit').val(response.data.sixtyFour_second);
  		$('#seventyTwo_second_edit').val(response.data.seventyTwo_second);
  		$('#eighty_second_edit').val(response.data.eighty_second);
  		$('#ninety_second_edit').val(response.data.ninety_second);
  		$('#hundred_second_edit').val(response.data.hundred_second);
  		$('#hundredAndTen_second_edit').val(response.data.hundredAndTen_second);
  		$('#pathi10KgTotal_second_total').val(response.data.totalSecond);

  		$('#edit-cotton').show();
  		$('#fourtyTwo_cooton_edit').val(response.data.fourtyTwo_cotton);
  		$('#fourtyEight_cooton_edit').val(response.data.fourtyEight_cotton);
  		$('#fiftySix_cooton_edit').val(response.data.fiftySix_cotton);
  		$('#sixty_cooton_edit').val(response.data.sixty_cotton);
  		$('#sixtySix_cooton_edit').val(response.data.sixtySix_cotton);
  		$('#seventyTwo_cooton_edit').val(response.data.seventyTwo_cotton);
  		$('#eighty_cooton_edit').val(response.data.eighty_cotton);
  		$('#ninety_cooton_edit').val(response.data.ninety_cotton);
  		$('#hundred_cooton_edit').val(response.data.hundred_cotton);
  		$('#hundredAndTen_cooton_edit').val(response.data.hundredAndTen_cotton);
  		$('#cottonTotal_cooton_edit').val(response.data.cottonTotal);

  		$('html, body').animate({
  			scrollTop: $("#edit-section").offset().top
  		}, 500);
      //$('#row_'+paymentId).addClass('activeForEdit');

  },
  error: function()
  {
  	console.log('ERROR');
  }
});
});

$('.editCustomer').click(function(e){
  e.preventDefault();
  $('tr').removeClass('activeForEdit');

  var customerId = $(this).attr('this-id');
  var link      = $(this).attr('this-url');
  var table = 'customers';
  // console.log(supplierId+' '+link+' '+table );
  $.ajax({              //request ajax
    type: "POST",
    url: "<?=base_url('CommonController/getRecord')?>", 
    data: {id:customerId,table:table},
    dataType: "json",
    success: function(response) 
    {        	
      $('#addCustomerSection').hide();
      $('#editCustomerSection').show();
      $('#nameEditCustomer').val(response.data.name);
      $('#nameEditCustomer').focus();
      $('#phoneEditCustomer').val(response.data.phone);
      $('#customerIdEdit').val(customerId);
      $('#url_customer_edit').val(link);
      $('#customers_edit_row_'+customerId).addClass('activeForEdit');

    },
    error: function()
    {
      console.log('ERROR');
    }
  });
});
</script>
</html























