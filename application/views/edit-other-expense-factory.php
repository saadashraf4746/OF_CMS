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
		<a href="<?=base_url('manage-factory/manage-expenses')?>" class="mr-2 bg-dark mb-1" style="padding: 5px">
		 <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
		</a>
		<ul class="breadcrumb-realestate" style="display: inline">
			<li><a href="<?=base_url('/')?>">Home</a></li>
			<li class="active"><?=$season?></li>
			<li class="active"><?=$headTittle?></li>
		</ul>


		<div class="clearfix"></div>

		<div class="row mb-3">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
			</div>
		</div>

		<div class="add-property-form-container">
			<div class="other-section">
				<form action="<?=base_url('factory/editOtherExpenseFunction')?>" method="post" id="addOtherExpense">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<input type="hidden" name="expenseId" value="<?=$expenseId?>">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
					          <label>Start Date</label>
					          <input type="text" name="expenseDate" class="form-control" value="<?=dateToDMY($expenseToEdit->expenseDate)?>" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Expense Tittle</label>
								<input type="text" name="expenseTittle" class="form-control" value="<?=$expenseToEdit->expenseTittle?>" />
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Expense Amount</label>
								<input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'edit-other-expese')" class="form-control numberic-masking" value="<?=$expenseToEdit->expenseAmount?>" /> 
								<span id="edit-other-expese" style="color:black;font-weight: bold;display: none"></span>
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