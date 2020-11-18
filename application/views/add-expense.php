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


		<div class="clearfix"></div>
		<div class="row mb-4" hidden>
			<div class="col-md-4">
				<label>Expense Type</label>
				<select class="form-control switch-expense">
					<option value="transport" selected>Transaport</option>
					<option value="labour">Labour</option>
					<option value="other">Other</option>
				</select>
			</div>
		</div>

		<div class="row mb-3 mt-2">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
			</div>
		</div>

		<div class="add-property-form-container">
			<div class="transport-section" <?php if($type != 'transport'){ echo 'style="display:none"'; } ?>>
				<form action="<?=base_url('seasons/addExpenseTransport')?>" method="post" id="addExpenseTransport">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Transport Start Date</label>
					          <input type="date" name="transportStartDate" class="form-control" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Owner Name</label>
								<input type="text" name="ownerName" class="form-control" placeholder="Enter owner name" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Owner Mobile</label>
								<input type="text" name="ownerMobile" class="form-control phone-validation" placeholder="Enter owner mobile" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Driver Name</label>
								<input type="text" name="driverName" class="form-control" placeholder="Enter driver name" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Driver Number</label>
								<input type="text" name="driverNumber" class="form-control phone-validation" placeholder="Enter driver number" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Transport Number</label>
								<input type="text" name="transportNumber" class="form-control" placeholder="Enter transport number" /> 
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group">
								<label>Per Day Amount</label>
								<input type="text" name="transportHireAmount" oninput="seprator(this); withDecimal(this.value, 'add-transport-amount')" class="form-control" placeholder="Enter per day amount" /> 
								<span id="add-transport-amount" style="color:black;font-weight: bold;display: none"></span>
							</div>
						</div>
						<div class="col-md-12 col-sm-6">
							<div class="form-group">
								<label>Expense Description</label>
								<textarea type="text" name="expenseDescription" class="form-control" placeholder="Enter expense description" /></textarea>
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="reset" class="btn mr-3">No, Cancel</button>
						<button type="submit" class="btn btn-warning">Save & Publish</button>
					</div>
				</form>
			</div>
			<div class="labour-section" <?php if($type != 'foreman'){ echo 'style="display:none"'; } ?>>
				<form action="<?=base_url('seasons/addLabourForeman')?>" method="post" id="">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Foreman Start Date</label>
					          <input type="date" name="startDate" class="form-control" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Foreman Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter foreman name" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Foreman Mobile</label>
								<input type="text" name="mobile" class="form-control phone-validation" placeholder="Enter foreman mobile" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Foreman CNIC</label>
								<input type="text" name="CNIC" class="form-control CNIC-masking" placeholder="Enter foreman CNIC" /> 
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Foreman Address</label>
								<input type="text" name="address" class="form-control" placeholder="Enter foreman address" /> 
							</div>
						</div>
					</div>
					<div class="text-right">
						<button type="reset" class="btn mr-3">No, Cancel</button>
						<button type="submit" class="btn btn-warning">Save & Publish</button>
					</div>
				</form>
			</div>
			
			<div class="other-section" <?php if($type != 'other'){ echo 'style="display:none"'; } ?>>
				<form action="<?=base_url('seasons/addExpenseOther')?>" method="post" id="addOtherExpense">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Expense Date</label>
					          <input type="text" name="expenseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Expense Tittle</label>
								<input type="text" name="expenseTittle" class="form-control" placeholder="Enter expense tittle" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Expense Amount</label>
								<input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'add-other-expense')" class="form-control" placeholder="Enter expense amount" /> 
								<span id="add-other-expense" style="color:black;font-weight: bold;display: none"></span>
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