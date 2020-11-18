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
				<a href="<?=base_url('manage-season/'.$seasonId)?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 style="float: <?=$float?>"><?=$heading?></h3>
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
				<h4 class="text-center bg-dark" style="color:white">Overall Season Gardens Detail</h4>
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
							<td class="text-center"><strong>Total Amount</strong></td>
							<td class="text-center">
								<?=numberFormat($totalAmount)?> Rs
							</td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Gardens Purchasing Detail</strong></td>
							<td class="text-center">
								<div>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Total Gardens
									</strong>&nbsp;&nbsp;<strong><?=$gardensStatistics->totalGardens?></strong> Gardens<br/>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Total Acre
									</strong>&nbsp;&nbsp;<strong><?=$gardensStatistics->totalAcre?></strong> Acre<br/><br/>

									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Total Purchase Amount
									</strong>&nbsp;&nbsp;<strong><?=numberFormat($gardensStatistics->totalPurchaseAmount)?></strong> Rs<br/>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px">
										Total Paid Garden
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($gardensStatistics->totalBayana + $totalPaidForGardens)?>
									</strong> Rs<br/>
									<strong style="color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Pending Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($gardensStatistics->totalPurchaseAmount - ($gardensStatistics->totalBayana + $totalPaidForGardens))?>
									</strong> Rs<br/>
								</div>
							</td>
							<td></td>
						</tr>
						<tr>
							<td class="text-center"><strong>Expense Details</strong></td>
							<td class="text-center">
								<div>
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Transport Expense
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Transports
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$transportExpensesStatistics->totalTransport?>
									</strong> Rs <br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Presents
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$transportExpensesStatistics->totalPresent?>
									</strong> Days<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Amount To Paid
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($transportExpensesStatistics->totalAmountToPaid)?>
									</strong> Rs<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Paid Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($transportExpensesStatistics->totalPaid)?>
									</strong> Rs<br/>
									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Balance
									</strong>&nbsp;&nbsp;
									<strong>
										<?php
										$index = 0;
										if($transportExpensesStatistics->totalPaid > $transportExpensesStatistics->totalAmountToPaid)
										{
											$index = $transportExpensesStatistics->totalPaid - $transportExpensesStatistics->totalAmountToPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> is advance';
										}
										else if($transportExpensesStatistics->totalPaid < $transportExpensesStatistics->totalAmountToPaid)
										{
											$index = $transportExpensesStatistics->totalAmountToPaid - $transportExpensesStatistics->totalPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> pending';
										}
										else if($transportExpensesStatistics->totalPaid == $transportExpensesStatistics->totalAmountToPaid)
										{
											$balance = 'Balance is equal';
										}
										echo $balance;
										?>
									</strong><br/>
								</div>

								<div class="mt-3">
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Labour Expense
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Foreman
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$labourExpensesStatistics->totalForeman?>
									</strong> Foremans<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Labours
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$labourExpensesStatistics->totalLabours?>
									</strong> Days<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Labour Presents
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($labourExpensesStatistics->totalLabourPresent)?>
									</strong> Labours<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($labourExpensesStatistics->totalAmountForeman + $labourExpensesStatistics->totalLabourAmount)?>
									</strong> Rs<br/>
									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Paid
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($labourExpensesStatistics->totalPaidToForeman)?>
									</strong> Rs<br/>
									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Balance
									</strong>&nbsp;&nbsp;
									<strong>
										<?php
										$index = 0;
										$totalPaid   = $labourExpensesStatistics->totalPaidToForeman;
										$totalToPaid = $labourExpensesStatistics->totalAmountForeman + $labourExpensesStatistics->totalLabourAmount;
										if($totalPaid > $totalToPaid)
										{
											$index = $totalPaid - $totalToPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> is advance';
										}
										else if($totalPaid < $totalToPaid)
										{
											$index = $totalToPaid - $totalPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> pending';
										}
										else if($totalPaid == $totalToPaid)
										{
											$balance = 'Balance is equal';
										}
										echo $balance;
										?>
									</strong><br/>
								</div>

								<div class="mt-3">
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Personal Staff
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Members
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$personalStaffExpenseDetail->totalMembers?>
									</strong> Members<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Presents
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$personalStaffExpenseDetail->totalPresent?>
									</strong> Days<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total To Paid
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($personalStaffExpenseDetail->totalAmountToPaid)?>
									</strong> Rs<br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Paid
									</strong>&nbsp;&nbsp;
									<strong>
										<?=numberFormat($personalStaffExpenseDetail->totalPaid)?>
									</strong> Rs<br/>
									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Balance
									</strong>&nbsp;&nbsp;
									<strong>
										<?php
										$index = 0;
										$totalPaid   = $personalStaffExpenseDetail->totalPaid;
										$totalToPaid = $personalStaffExpenseDetail->totalAmountToPaid;
										if($totalPaid > $totalToPaid)
										{
											$index = $totalPaid - $totalToPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> is advance';
										}
										else if($totalPaid < $totalToPaid)
										{
											$index = $totalToPaid - $totalPaid;
											$balance = '<strong>Rs '.numberFormat($index).'</strong> pending';
										}
										else if($totalPaid == $totalToPaid)
										{
											$balance = 'Balance is equal';
										}
										echo $balance;
										?>
									</strong><br/>
								</div>

								<div class="mt-3">
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Pump Expense
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Expense
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$pumpExpenseStatistics->totalExpense?>
									</strong><br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$pumpExpenseStatistics->totalExpenseAmount?>
									</strong> Rs<br/>
								</div>

								<div class="mt-3">
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Persoanl Car Expense
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Expense
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$personalCarExpense->totalExpense?>
									</strong><br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$personalCarExpense->totalExpenseAmount?>
									</strong> Rs<br/>
								</div>

								<div class="mt-3">
									<strong style="color:white;background:#f9893a;font-size:14px;font-weight:bold;padding:2px;border-radius:5px">
										Other Expenses
									</strong><br/><br/>

									<strong style="margin-top:3px;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Expense
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$otherExpense->totalExpense?>
									</strong><br/>

									<strong style="margin-top:3px !important;color:white;background:#0e0e01;font-size:12px;font-weight:bold;padding:2px;border-radius:5px;margin-top">
										Total Amount
									</strong>&nbsp;&nbsp;
									<strong>
										<?=$otherExpense->totalExpenseAmount?>
									</strong> Rs<br/>
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