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
		<a href="<?=base_url('manage-season/'.$seasonId)?>" class="mr-2 bg-dark" style="padding: 5px">
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

		<div class="add-property-form-container">
			<div class="labour-section">
				<form method="post" id="">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Start Date</label>
					          <input type="date" name="startDate" data-date-format="dd-mm-yyyy" class="form-control" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Labour Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter foreman name" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Labour Mobile</label>
								<input type="text" name="mobile" class="form-control phone-validation" placeholder="Enter foreman mobile" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Per day Amount</label>
								<input type="text" name="CNIC" class="form-control CNIC-masking" placeholder="Enter foreman CNIC" /> 
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
</body>
</html>