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
		<a href="<?=base_url('manage-factory/manage-labour')?>" class="mr-2 bg-dark" style="padding: 5px">
			<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
		</a>
		<ul class="breadcrumb-realestate" style="display: inline">
			<li><a href="<?=base_url('/')?>">Home</a></li>
			<li class="active"><?=$season?></li>
			<li class="active"><?=$headTittle?></li>
		</ul>


		<div class="row mb-3 mt-2">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
			</div>
		</div>

		<div>
			<form action="<?=base_url('factory/editForeman')?>" method="post" id="editForeman">
				<input type="hidden" name="seasonId" value="<?=$seasonId?>">
				<input type="hidden" name="foremanId" value="<?=$foremanId?>">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Foreman Start Date</label>
							<input type="text" name="startDate" value="<?=dateToDMY($foremanRow->startDate)?>" class="form-control date-masking" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Foreman Name</label>
							<input type="text" name="name" class="form-control" value="<?=$foremanRow->name?>" />
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Foreman Mobile</label>
							<input type="text" name="mobile" class="form-control phone-validation" value="<?=$foremanRow->mobile?>" /> 
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Foreman CNIC</label>
							<input type="text" name="CNIC" class="form-control CNIC-masking" value="<?=$foremanRow->CNIC?>" /> 
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<label>Foreman Address</label>
							<input type="text" name="address" class="form-control" value="<?=$foremanRow->address?>" /> 
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