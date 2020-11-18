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
				<h4 class="text-center bg-dark" style="color:white">Sales Details</h4>
				<table class="custom-table text-center">
					<thead>
						<tr>
							<th>Thing</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>Season Overall Sales</strong></td>
							<td><?=$salesStatistics->totalSeasonSales?> Sales</td>
						</tr>
						<tr>
							<td><strong>Today's Total Sales</strong></td>
							<td><?=$salesStatistics->totalTodaySales?> Sales</td>
						</tr>
						<tr>
							<td><strong>Total Sales Amount</strong></td>
							<td><?=numberFormat($salesStatistics->totalAmount)?> Rs</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Sales Details By Date</h4>
			</div>

			<?php
			foreach($SalesByDate as $sale):
				?>
				<div class="col-md-3 mb-3" 
				style="-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
				-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
				box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);">
				<div class="bg-white p-2" style="border-radius: 7px">
					<a href="<?=base_url('manage-sales/sales-detail/'.$sale->sellDate)?>" class="bg-dark mb-1 float-right">
						<i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
					</a>
					<br/>
					<h4 class="text-center">
						<?=dateConvertDMY($sale->sellDate)?>
					</h4>
					<table class="table text-center">
						<thead>
							<th>Sales</th>
						</thead>
						<tbody>
							<tr>
								<td>
									<strong style="color: #f7b148; font-weight: bold; font-size: 16px">Total: </strong>
									<strong><?=$sale->totalSales?></strong>
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























