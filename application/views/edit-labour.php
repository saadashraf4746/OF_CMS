<!DOCTYPE html>
<html lang="en-US">
<!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
<head>
	<title><?=$headTittle?></title>
	<?php $this->load->view('includes/header-includes'); ?>
</head>
<body class="dashbaord-body">
	<!-- left menu -->
	<?php $this->load->view('includes/left-menu'); ?>

	<div class="dashboard-content">
		<a href="<?=base_url('foreman-detail/'.$seasonId.'/detail/'.$foremanId)?>" class="mr-2 bg-dark" style="padding: 5px">
			<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
		</a>
		<ul class="breadcrumb-realestate" style="display: inline">
			<li><a href="<?=base_url('/')?>">Home</a></li>
			<li class="active"><?=$headTittle?></li>
		</ul>


		<div class="row mb-3 mt-2">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
			</div>
		</div>

		<div>
			<form action="<?=base_url('seasons/labourEdit')?>" method="post" id="labourEdit">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<input type="hidden" name="foremanId" value="<?=$foremanId?>">
					<input type="hidden" name="labourId" value="<?=$labourId?>">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Labour Start Date</label>
							<input type="text" name="startDate" value="<?=dateToDMY($labourRow->startDate)?>" class="form-control" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Labour Name</label>
							<input type="text" name="name" class="form-control" value="<?=$labourRow->name?>" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Labour Mobile</label>
							<input type="text" name="mobile" class="form-control phone-validation" value="<?=$labourRow->mobile?>"/> 
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Per day Amount</label>
							<input type="text" name="perdayAmount" oninput="seprator(this); withDecimal(this.value, 'edit-labour')" class="form-control" value="<?=$labourRow->perdayAmount?>"/> 
							<span id="edit-labour" style="color:black;font-weight: bold;display: none"></span>
						</div>
					</div>
				</div>
				<div class="text-right">
					<button type="reset" class="btn mr-3">No, Cancel</button>
					<button type="submit" class="btn btn-warning">Save & Publish</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
<!-- <script type="text/javascript">
	$(document).ready(function(){
		$('.switch-expense').change(function(){
			var val = $(this).val();
			if(val == 'transport')
			{
				$('.transport-section').show();
				$('.labour-section').hide();
				$('.other-section').hide();
			}
			else if(val == 'labour')
			{
				$('.transport-section').hide();
				$('.labour-section').show();
				$('.other-section').hide();
			}
			else if(val == 'other')
			{
				$('.transport-section').hide();
				$('.labour-section').hide();
				$('.other-section').show();
			}
		});
	});
</script> -->
</body>
</html>