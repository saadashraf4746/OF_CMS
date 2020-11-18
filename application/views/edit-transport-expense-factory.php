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
		<a href="<?=base_url('manage-factory/manage-expenses')?>" class="mr-2 bg-dark" style="padding: 5px">
		 <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
		</a>
		<ul class="breadcrumb-realestate" style="display: inline">
			<li><a href="<?=base_url('/')?>">Home</a></li>
			<li class="active"><?=$season?></li>
			<li class="active"><?=$headTittle?></li>
		</ul>


		<div class="clearfix"></div>

		<div class="row mb-3 mt-1">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
			</div>
		</div>

		<div class="add-property-form-container">
			<div class="transport-section">
				<form action="<?=base_url('factory/editExpenseTransportFunction')?>" method="post" id="addExpenseTransport">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<input type="hidden" name="expenseId" value="<?=$expenseId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Transport Start Date</label>
					          <input type="text" name="transportStartDate" value="<?=dateToDMY($expenseToEdit->transportStartDate)?>" class="form-control" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Owner Name</label>
								<input type="text" name="ownerName" class="form-control" value="<?=$expenseToEdit->ownerName?>" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Owner Mobile</label>
								<input type="text" name="ownerMobile" class="form-control phone-validation" value="<?=$expenseToEdit->ownerMobile?>"  /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Driver Name</label>
								<input type="text" name="driverName" class="form-control" value="<?=$expenseToEdit->driverName?>"  /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Driver Number</label>
								<input type="text" name="driverNumber" class="form-control phone-validation" value="<?=$expenseToEdit->driverNumber?>"  /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Transport Number</label>
								<input type="text" name="transportNumber" class="form-control" value="<?=$expenseToEdit->transportNumber?>"  /> 
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group">
								<label>Per Day Amount</label>
								<input type="text" name="transportHireAmount" oninput="seprator(this); withDecimal(this.value, 'edit-transport-expense')" class="form-control" value="<?=$expenseToEdit->transportHireAmount?>"  /> 
								<span id="edit-transport-expense" style="color:black;font-weight: bold;display: none"></span>
							</div>
						</div>
						<hr />
						<div class="col-md-12 col-sm-6">
							<div class="form-group">
								<label>Expense Description</label>
								<textarea type="text" name="expenseDescription" class="form-control" /><?=$expenseToEdit->expenseDescription?></textarea>
							</div>
						</div>
					</div>
					<hr />
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