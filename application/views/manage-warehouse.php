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



		<div class="row">
			<div class="col-md-12">
				<a href="<?=base_url('manage-factory/'.$this->session->userdata('season-id'))?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 style="float: <?=$float?>"><?=$heading?></h3>
				<a href="<?=base_url('manage-factory/purchase-kinow/')?>" class="btn btn-warning float-right mb-2" style="padding: 5px; display: inline" >
					Purchase
				</a>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_add_kinow')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_add_kinow'); ?>
					</div>
				<?php } ?>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12" style="background: #fdff94; padding: 20px; border-radius: 10px">
				<h4 class="text-center bg-dark" style="color:white">Total Purchases Detail</h4>
				<table class="custom-table">
					<thead>
						<tr class="text-center">
							<th><?=$this->lang->line('things')?></th>
							<th><?=$this->lang->line('description')?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><strong>Total Items Purchased</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Bardana
									</strong>&nbsp;&nbsp; 
									4Pathi Total: <strong><?=numberFormat($totalItems->totalCharPathi)?></strong> Pieces<br/>
									5Pathi Total: <strong><?=numberFormat($totalItems->totalPanchPathi)?></strong> Pieces<br/>
									6Pathi Total: <strong><?=numberFormat($totalItems->totalSheyPathi)?></strong> Pieces <br/>
								</div>
								<br/>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sheet
									</strong>&nbsp;&nbsp; 
									2Ply Total: <strong><?=numberFormat($totalItems->totalDoPlySheet)?></strong> Pieces<br/>
									3Ply Total: <strong><?=numberFormat($totalItems->totalTeenPlySheet)?></strong> Pieces<br/>
									5Ply Total: <strong><?=numberFormat($totalItems->totalPanchPlySheet)?></strong> Pieces <br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Radi
									</strong>&nbsp;&nbsp; 
									Radi Total: <strong><?=numberFormat($totalItems->totalRadi)?></strong> KG<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Keel
									</strong>&nbsp;&nbsp; 
									Keel Total: <strong><?=numberFormat($totalItems->totalKeel)?></strong> Bori<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sticker
									</strong>&nbsp;&nbsp; 
									Sticker Total: <strong><?=numberFormat($totalItems->totalSticker)?></strong> Pieces<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Cotton
									</strong>&nbsp;&nbsp; 
									Cotton Total: <strong><?=numberFormat($totalItems->totalSCotton)?></strong> Pieces<br/>
									<br/>
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Total Kinow</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#f9893a;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Kinow
									</strong>&nbsp;&nbsp; 
									Kinow Total Maan: <strong><?=numberFormat($totalKinow->totalMaan)?></strong> Maan<br/>
									Total A Category: <strong><?=numberFormat($totalKinow->totalCatA)?></strong> Maan<br/>
									Total B Category: <strong><?=numberFormat($totalKinow->totalCatB)?></strong> Maan <br/>
								</div>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>
		<div class="row mt-5">
			<div class="col-md-12" style="background: #fdd599; padding: 20px; border-radius: 10px">
				<h4 class="text-center bg-dark" style="color:white">Total Items Remaining</h4>
				<table class="custom-table">
					<thead>
						<tr class="text-center">
							<th><?=$this->lang->line('things')?></th>
							<th><?=$this->lang->line('description')?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><strong>Total Items Purchased</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Bardana
									</strong>&nbsp;&nbsp; 
									4Pathi Total: <strong><?=numberFormat($totalItems->totalCharPathi)?></strong> Pieces<br/>
									5Pathi Total: <strong><?=numberFormat($totalItems->totalPanchPathi)?></strong> Pieces<br/>
									6Pathi Total: <strong><?=numberFormat($totalItems->totalSheyPathi)?></strong> Pieces <br/>
								</div>
								<br/>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sheet
									</strong>&nbsp;&nbsp; 
									2Ply Total: <strong><?=numberFormat($totalItems->totalDoPlySheet)?></strong> Pieces<br/>
									3Ply Total: <strong><?=numberFormat($totalItems->totalTeenPlySheet)?></strong> Pieces<br/>
									5Ply Total: <strong><?=numberFormat($totalItems->totalPanchPlySheet)?></strong> Pieces <br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Radi
									</strong>&nbsp;&nbsp; 
									Radi Total: <strong><?=numberFormat($totalItems->totalRadi)?></strong> KG<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Keel
									</strong>&nbsp;&nbsp; 
									Keel Total: <strong><?=numberFormat($totalItems->totalKeel)?></strong> Bori<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sticker
									</strong>&nbsp;&nbsp; 
									Sticker Total: <strong><?=numberFormat($totalItems->totalSticker)?></strong> Pieces<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Cotton
									</strong>&nbsp;&nbsp; 
									Cotton Total: <strong><?=numberFormat($totalItems->totalSCotton)?></strong> Pieces<br/>
									<br/>
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Total Kinow</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#f9893a;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Kinow
									</strong>&nbsp;&nbsp; 
									Kinow Total Maan: <strong><?=numberFormat($totalKinow->totalMaan)?></strong> Maan<br/>
									Total A Category: <strong><?=numberFormat($totalKinow->totalCatA)?></strong> Maan<br/>
									Total B Category: <strong><?=numberFormat($totalKinow->totalCatB)?></strong> Maan <br/>
								</div>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>

		<div class="row mt-5">
			<div class="col-md-12" style="background: #dedede; padding: 20px; border-radius: 10px">
				<h4 class="text-center bg-dark" style="color:white">Total Items Used</h4>
				<table class="custom-table">
					<thead>
						<tr class="text-center">
							<th><?=$this->lang->line('things')?></th>
							<th><?=$this->lang->line('description')?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center"><strong>Total Items Purchased</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Bardana
									</strong>&nbsp;&nbsp; 
									4Pathi Total: <strong><?=numberFormat($totalItems->totalCharPathi)?></strong> Pieces<br/>
									5Pathi Total: <strong><?=numberFormat($totalItems->totalPanchPathi)?></strong> Pieces<br/>
									6Pathi Total: <strong><?=numberFormat($totalItems->totalSheyPathi)?></strong> Pieces <br/>
								</div>
								<br/>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sheet
									</strong>&nbsp;&nbsp; 
									2Ply Total: <strong><?=numberFormat($totalItems->totalDoPlySheet)?></strong> Pieces<br/>
									3Ply Total: <strong><?=numberFormat($totalItems->totalTeenPlySheet)?></strong> Pieces<br/>
									5Ply Total: <strong><?=numberFormat($totalItems->totalPanchPlySheet)?></strong> Pieces <br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Radi
									</strong>&nbsp;&nbsp; 
									Radi Total: <strong><?=numberFormat($totalItems->totalRadi)?></strong> KG<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Keel
									</strong>&nbsp;&nbsp; 
									Keel Total: <strong><?=numberFormat($totalItems->totalKeel)?></strong> Bori<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Sticker
									</strong>&nbsp;&nbsp; 
									Sticker Total: <strong><?=numberFormat($totalItems->totalSticker)?></strong> Pieces<br/>
									<br/>
								</div>
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Cotton
									</strong>&nbsp;&nbsp; 
									Cotton Total: <strong><?=numberFormat($totalItems->totalSCotton)?></strong> Pieces<br/>
									<br/>
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Total Kinow</strong></td>
							<td class="text-right">
								<div>
									<strong style="color:white;background:#f9893a;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Kinow
									</strong>&nbsp;&nbsp; 
									Kinow Total Maan: <strong><?=numberFormat($totalKinow->totalMaan)?></strong> Maan<br/>
									Total A Category: <strong><?=numberFormat($totalKinow->totalCatA)?></strong> Maan<br/>
									Total B Category: <strong><?=numberFormat($totalKinow->totalCatB)?></strong> Maan <br/>
								</div>
							</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
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
</html>