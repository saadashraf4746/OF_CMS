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

		<div class="row sticky">
			<div class="col-md-12">
				<a href="<?=base_url('manage-factory/manage-labour')?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 class="text-center" style="display: inline"><?=$heading?></h3>
				<?php
				if($selectedForeman->ifSessionEnd == 0)
				{
					?>
					<a href="<?=base_url('seasons/endSessionForeman/'.$seasonId.'/'.$expenseId)?>" class="btn btn-warning float-right mb-2" style="padding: 5px; display: inline" >
						End Session
					</a>
					<?php
				}
				else
				{
					?>
					<p class="float-right" style="background: black;color: white;padding: 8px;border:1px solid;border-radius: 8px">Stopped</p>
					<?php
				}
				?>
			</div>
			<br>
			<br>
			<div class="col-md-12">
				<input type="radio" class="foreman-credential-switcher" name="foreman-credential-switcher" value="payments" <?php if($this->session->userdata('foreman-credential-switcher') == 'payments'){ echo 'checked'; } ?> >&nbsp;Payments Details

				<!-- 				<input type="radio" class="foreman-credential-switcher ml-3" name="foreman-credential-switcher" value="daily_attendance" <?php if($this->session->userdata('foreman-credential-switcher') == 'daily_attendance'){ echo 'checked'; }?> >&nbsp;Foreman Daily Attendance -->

				<input type="radio" class="foreman-credential-switcher ml-3" name="foreman-credential-switcher" value="labour_list" <?php if($this->session->userdata('foreman-credential-switcher') == 'labour_list'){ echo 'checked'; }?> >&nbsp;Labour List

				<input type="radio" class="foreman-credential-switcher ml-3 mb-3" name="foreman-credential-switcher" value="all" <?php if($this->session->userdata('foreman-credential-switcher') == 'all'){ echo 'checked'; }?> >&nbsp;All

				<div id="scroll-link" class="float-right">
					Scroll To: &nbsp;<a href="" class="scroll-top" style="background: black;color: white;padding: 6px;border:1px solid;border-radius: 6px">Top</a>&nbsp;
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_end_foreman')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_end_foreman'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('failed_end_foreman')){ ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('failed_end_foreman'); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Foreman Details</h4>
				<table class="custom-table text-center">
					<thead>
						<tr>
							<th hidden>Go To Section</th>
							<th>Thing</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td hidden>-</td>
							<td><stron>Foreman Start Date</stron></td>
							<td><?=dateConvertDMY($selectedForeman->startDate);?></td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Foreman Fixed And Paid Amount</stron></td>
							<td>
								<?=$selectedForeman->foremanSeasonFixAmount==0?'Foreman Amount Not fixed yet':'Foreman Amounr: <strong>'.numberFormat($selectedForeman->foremanSeasonFixAmount).' Rs</strong>'?>
								<br>
								Total Paid: <?='<strong>'.numberFormat($paidToForeman).' Rs</strong>'?>
							</td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Foreman Balance Status</stron></td>
							<td><?=$foremanBalanceStatus;?></td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Total Paid For Labours</stron></td>
							<td><strong><?=numberFormat($paidToForemanForLabours);?> Rs</strong></td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Total Labour Rent</stron></td>
							<td><?='<strong>'.numberFormat($totalLaboursRent).' Rs</strong>';?></td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Total Paid For Labors</stron></td>
							<td><?=$foremanBalanceStatusForLabours;?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>

		<div class="row" id="foreman-payments-section" <?php if($this->session->userdata('foreman-credential-switcher') != 'payments' && $this->session->userdata('foreman-credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Foreman Payments History</h4>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_pay_payment')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_pay_payment'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_foreman_payment')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_foreman_payment'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-3" id="addForemanPayment" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
				<?php
				if($selectedForeman->foremanSeasonFixAmount == 0)
				{
					?>
					<h5>Set Foreman Amount</h5>
					<form id="setForemanAmount" method="POST" action="<?=base_url('factory/setForemanAmount')?>">
						<input type="hidden" name="foremanId" value="<?=$expenseId?>">
						<input type="hidden" name="seasonId" value="<?=$seasonId?>">
						<label>Foreman Amount</label>
						<input type="text" name="foremanSeasonFixAmount" class="form-control" oninput="seprator(this); withDecimal(this.value, 'fix-foreman-payment')" placeholder="Enter foreman Amount">
						<span id="fix-foreman-payment" style="color:black;font-weight: bold;display: none"></span>
						<button class="btn btn-small btn-warning mt-2" type="submit">Set</button>
					</form>
					<br>
					<br>
					<?php
				}
				?>

				<h3>Give Payment</h3>
				<form id="payForemanPayment" method="POST" action="<?=base_url('factory/payForemanPayment')?>">
					<input type="hidden" name="foremanId" value="<?=$expenseId?>">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<label>Payment Of</label><br>
					<input type="radio" name="paymentOf" value="foreman">Foreman&nbsp;&nbsp;&nbsp;
					<input type="radio" name="paymentOf" value="labour" checked>Labour
					<label>Payment Date</label>
					<input type="text" name="paymentDate" class="form-control date-masking" value="<?=todayDate();?>" />
					<label>Paymnet Amount</label>
					<input type="text" name="paymentAmount" oninput="seprator(this); withDecimal(this.value, 'add-foreman-payment')" class="form-control" placeholder="Enter installment Amount">
					<span id="add-foreman-payment" style="color:black;font-weight: bold;display: none"></span>
					<label>Payment Description</label>
					<textarea name="paymentDescription" class="form-control" placeholder="Enter installment description" /></textarea>
					<label>Next Payment Date</label>
					<input type="text" name="nextPaymentDate"  class="form-control date-masking" />
					<button class="btn btn-small btn-warning mt-2" type="submit">Pay Payment</button>
				</form>
			</div>
			<div class="col-md-3" id="editForemanPayment" style="background: rgb(251 174 162);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
				<h3>Edit Payment</h3>
				<form method="POST" action="<?=base_url('factory/editForemanPayment')?>">
					<input type="hidden" name="paymentId" id="paymentIdForemanEdit" value="">
					<input type="hidden" name="url" id="url_payment_foreman"  value="">
					<label>Payment Of</label><br>
					<input type="radio" name="paymentOf" id="type_foreman" value="foreman">Foreman&nbsp;&nbsp;&nbsp;
					<input type="radio" name="paymentOf"  id="type_labour" value="labour">Labour<br/>
					<label>Payment Date</label>
					<input type="text" name="paymentDate" id="paymentDateForemanEdit" class="form-control date-masking" />
					<label>Paymnet Amount</label>
					<input type="text" name="paymentAmount" oninput="seprator(this); withDecimal(this.value, 'edit-foreman-payment')" id="paymentAmountForemanDate" class="form-control">
					<span id="edit-foreman-payment" style="color:black;font-weight: bold;display: none"></span>
					<label>Payment Description</label>
					<textarea name="paymentDescription" id="paymentDescriptionForemanEdit" class="form-control" /></textarea>
					<button class="btn btn-small btn-warning mt-2" type="submit">Edit Payment</button>
				</form>
			</div>
		<div class="col-md-9">
			<table class="table table-bordered table-sm datatable">
				<thead class="bg-white">
					<tr>
						<th>#</th>
						<th>Payment Date</th>
						<th>Payment Amount</th>
						<th>Payment Type</th>
						<th>Payment Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php
					if(count($foremanPaymentsDetail)==0)
					{
						?>
						<tr>
							<td></td>
							<td>No record found.</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php
					}
					else
					{
						$count = 1;
						foreach($foremanPaymentsDetail as $foremanPayment):
							?>
							<tr id="foreman_payment_row_<?=$foremanPayment->id?>"
								<?php if($foremanPayment->id == $this->session->userdata('edit_foreman_payment'))
								{ 
									echo 'class="recentlyUpdated"';
								}
								?>
								>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($foremanPayment->paymentDate)?></td>
								<td><?=$foremanPayment->amount;?></td>
								<td><?=$foremanPayment->foremanPaymentType==1?'Foreman Payment':'Labour Payment';?></td>
								<td><?=$foremanPayment->paymentDescription==''?'no description':$foremanPayment->paymentDescription;?></td>
								<td>
									<a href="" class="bg-dark editForemanPayment" this-id="<?=$foremanPayment->id?>" this-url="<?=$url?>">
										<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
									</a>
									<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/payments/'.$foremanPayment->id.'/'.$url.'/foreman_payment')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
										<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
									</a>
								</td>
								<?php
								$count++;
							endforeach;
						}
						$this->session->unset_userdata('edit_foreman_payment');
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row" id="foreman-attendance-section" <?php if($this->session->userdata('foreman-credential-switcher') != 'daily_attendance' && $this->session->userdata('foreman-credential-switcher') != 'all'){ echo "style='display:none'"; } ?> hidden>
			<div class="col-md-12">
				<h4 class="text-center bg-dark mt-3" style="color:white">Foreman Daily Attendance</h4>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_change_attendance')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_change_attendance'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_foreman_payment')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_foreman_payment'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<table class="table table-bordered table-sm datatable">
					<thead class="bg-white">
						<tr>
							<th>Sr No.</th>
							<th>Attendance Date</th>
							<th>Attendance Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-striped">
						<?php
						if(count($foremanAttendance)==0)
						{
							?>
							<tr>
								<td></td>
								<td>No record found.</td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 1;
							foreach($foremanAttendance as $foremanAttendance):
								?>
								<tr 
								<?php if($foremanAttendance->id == $this->session->userdata('latestChangeAttendance'))
								{ 
									echo 'class="recentlyUpdated"';
								} ?>
								>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($foremanAttendance->attendanceDate)?></td>
								<td><?=$foremanAttendance->attendance==1?'<strong style="color:green">Present</strong>':'<strong style="color:red">Absent</strong>';?></td>
								<td>
									<?php
									if($foremanAttendance->attendance==1)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$expenseId.'/change-attendance/absent/'.$foremanAttendance->id.'/2')?>" style="padding: 3px;border: 1px solid red;background: red;color: white;border-radius: 5px;font-size:11px">Mark Absent</a>
										<?php
									}
									else if($foremanAttendance->attendance==0)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$expenseId.'/change-attendance/present/'.$foremanAttendance->id.'/2')?>" style="padding: 3px;border: 1px solid green;background: green;color: white;border-radius: 5px;font-size:11px">Mark Present</a>
										<?php
									}
									?>
								</td>
							</tr>
							<?php
							$count++;
						endforeach;
						$this->session->unset_userdata('latestChangeAttendance');
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row mt-3" id="labour-list-section" <?php if($this->session->userdata('foreman-credential-switcher') != 'labour_list' && $this->session->userdata('foreman-credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
		<div class="col-md-12">
			<h4 class="text-center bg-dark" style="color:white">Labour List</h4>
		</div>
		<div class="col-md-12">
			<?php if($this->session->flashdata('success_add_labour')){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('success_add_labour'); ?>
				</div>
			<?php } ?>
			<?php if($this->session->flashdata('global_delete_message_labour_list')){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('global_delete_message_labour_list'); ?>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-3" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3>Add Labour</h3>
			<form method="post" action="<?=base_url('factory/addLabour')?>">
				<input type="hidden" name="foremanId" value="<?=$expenseId?>">
				<input type="hidden" name="seasonId" value="<?=$seasonId?>">
				<label>Labour Start Date</label>
				<input type="text" name="startDate" class="form-control date-masking" />
				<label>Labour Name</label>
				<input type="text" name="name" class="form-control" placeholder="Enter labour name" />
				<label>Labour Mobile</label>
				<input type="text" name="mobile" class="form-control phone-validation" placeholder="Enter foreman mobile" /> 
				<label>Per day Amount</label>
				<input type="text" name="perdayAmount" oninput="seprator(this); withDecimal(this.value, 'add-labour')" class="form-control" placeholder="Enter perday amount" /> 
				<span id="add-labour" style="color:black;font-weight: bold;display: none"></span>
				<button class="btn btn-small btn-warning mt-2" type="submit">Add Labour</button>
			</form>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered table-sm datatable">
				<thead class="bg-white">
					<tr>
						<th>#</th>
						<th>Start Date</th>
						<th>Attendance Status</th>
						<th>Labour Name</th>
						<th>Labour Mobile</th>
						<th>Perday Amount</th>
						<th>Total Amount</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="table-striped">
					<?php
					if(count($labours)==0)
					{
						?>
						<tr>
							<td></td>
							<td>No record found.</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<?php
					}
					else
					{
						$count = 1;
						foreach($labours as $labour):
							$attendanceStatistics = attendanceStatistics($labour->id, 5);
							?>
							<tr 
							<?php if($labour->id == $this->session->userdata('updated-labour'))
							{ 
								echo 'class="recentlyUpdated"';
							} ?>
							>
							<td><?php echo $count;?></td>
							<td><?=dateConvertDMY($labour->startDate)?></td>
							<td><?=$attendanceStatistics->totalDays.' <strong style="color:black">Days</strong><br>'.$attendanceStatistics->totalPresent.' <strong style="color:green">Presents</strong><br>'.$attendanceStatistics->totalAbsent.' <strong style="color:red">Absents</strong>'?></td>
							<td><?=$labour->name;?></td>
							<td><?=$labour->mobile;?></td>
							<td><?=numberFormat($labour->perdayAmount);?> Rs</td>
							<td><?=numberFormat($attendanceStatistics->totalToPaid);?> Rs</td>
							<td>
								<a href="<?=base_url('factory/'.$seasonId.'/foreman/'.$expenseId.'/labour-detail/'.$labour->id)?>" class="bg-dark mb-1">
									<i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
								</a> 
								<a href="<?=base_url('factory/'.$seasonId.'/foreman/'.$expenseId.'/labour-edit/'.$labour->id)?>" class="bg-dark">
									<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
								</a>
								<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/staff/'.$labour->id.'/'.$url.'/labour_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
									<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
						<?php
						$count++;
					endforeach;
					$this->session->unset_userdata('updated-labour');
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<!--  -->
</div>

<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
<script>
	document.addEventListener("DOMContentLoaded", function(event) { 
		var scrollpos = localStorage.getItem('scrollpos');
		if (scrollpos) window.scrollTo(0, scrollpos);
	});

	window.onbeforeunload = function(e) {
		localStorage.setItem('scrollpos', window.scrollY);
	};
  // CHANGE ATTANDANCE
  $('.foreman-credential-switcher').click(function(){
  	var val = $(this).val();
    $.ajax({              //request ajax
    	type: "POST",
    	url: "<?=base_url('seasons/setForemanCredentialSwitcherSession')?>", 
    	data: {val:val},
    	dataType: "json", 
    	success: function(response) 
    	{
    		console.log('session-updated');
    	},
    	error: function()
    	{
    		console.log('ERROR');
    	}
    });

    if(val == 'payments')
    {
    	$('#foreman-payments-section').show();
    	$('#foreman-attendance-section').hide();
    	$('#labour-list-section').hide();
    }
    else if(val == 'daily_attendance')
    {
    	$('#foreman-payments-section').hide();
    	$('#foreman-attendance-section').show();
    	$('#labour-list-section').hide();
    }
    else if(val == 'labour_list')
    {
    	$('#foreman-payments-section').hide();
    	$('#foreman-attendance-section').hide();
    	$('#labour-list-section').show();
    }
    else if(val == 'all')
    {
    	$('#foreman-payments-section').show();
    	$('#foreman-attendance-section').show();
    	$('#labour-list-section').show();
    }

      //SCROLL TO DIV
      if(val == 'payments')
      {
      	$('html, body').animate({
      		scrollTop: $("#foreman-payments-section").offset().top
      	}, 400);
      }
      else if(val == 'daily_attendance')
      {
      	$('html, body').animate({
      		scrollTop: $("#foreman-attendance-section").offset().top
      	}, 400);
      }
      else if(val == 'labour_list')
      {
      	$('html, body').animate({
      		scrollTop: $("#labour-list-section").offset().top
      	}, 400);
      }

  });

  $('.editForemanPayment').click(function(e){
  	e.preventDefault();
  	$('tr').removeClass('activeForEdit');
  	var paymentId = $(this).attr('this-id');
  	var link      = $(this).attr('this-url');
  	var table = 'payments';
      $.ajax({              //request ajax
      	type: "POST",
      	url: "<?=base_url('CommonController/getRecord')?>", 
      	data: {id:paymentId,table:table},
      	dataType: "json",
      	success: function(response) 
      	{
      		$('#addForemanPayment').hide();
      		$('#editForemanPayment').show();
      		$('#paymentIdForemanEdit').val(paymentId);
      		if(response.data.foremanPaymentType == 1)
      		{
      			$('#type_foreman').prop('checked', true);
      		}
      		else
      		{
      			$('#type_labour').prop('checked', true);
      		}
      		$('#paymentDateForemanEdit').val(dateToDMY(response.data.paymentDate));
      		$('#paymentAmountForemanDate').val(response.data.amount);
      		$('#paymentAmountForemanDate').focus();
      		$('#paymentDescriptionForemanEdit').html(response.data.paymentDescription);
      		$('#url_payment_foreman').val(link);
      		$('#foreman_payment_row_'+paymentId).addClass('activeForEdit');

      	},
      	error: function()
      	{
      		console.log('ERROR');
      	}
      });
  });
</script>

</body>
</html>