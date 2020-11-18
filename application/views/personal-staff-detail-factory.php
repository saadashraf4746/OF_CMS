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
				<a href="<?=base_url('manage-factory/manage-expenses')?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 class="text-center" style="display: inline"><?=$heading?></h3>
			</div>
			<br>
			<br>
			<div class="col-md-12">
				<input type="radio" class="transport-credential-switcher" name="transport-credential-switcher" value="payments" <?php if($this->session->userdata('transport-credential-switcher') == 'payments'){ echo 'checked'; } ?> >&nbsp;Payments Details

				<input type="radio" class="transport-credential-switcher ml-3" name="transport-credential-switcher" value="daily_attendance" <?php if($this->session->userdata('transport-credential-switcher') == 'daily_attendance'){ echo 'checked'; }?> >&nbsp;Daily Attendance

				<input type="radio" class="transport-credential-switcher ml-3 mb-3" name="transport-credential-switcher" value="all" <?php if($this->session->userdata('transport-credential-switcher') == 'all'){ echo 'checked'; }?> >&nbsp;All

				<div id="scroll-link" class="float-right">
					Scroll To: &nbsp;<a href="" class="scroll-top" style="background: black;color: white;padding: 6px;border:1px solid;border-radius: 6px">Top</a>&nbsp;
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_end_transport')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_end_transport'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('failed_end_transport')){ ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('failed_end_transport'); ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Member Details</h4>
				<table class="custom-table text-center">
					<thead>
						<tr>
							<th>Thing</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><stron>Member Start Date</stron></td>
							<td><?=dateConvertDMY($memberDetail->startDate);?></td>
						</tr>
						<tr>
							<td><stron>Member Per Day And Total</stron></td>
							<td>
								<?='<strong>Per Day: </strong>'.$memberDetail->perdayAmount.' Rs'?>
								<br>
								<strong>Total To Paid: </strong><?=numberFormat($memberAttendanceStatistics->totalToPaid)?> Rs
							</td>
						</tr>
						<tr>
							<td><stron>Attendance Status</stron></td>
							<td><?=$memberAttendanceStatistics->totalDays.' <strong style="color:black">Days</strong><br>'.$memberAttendanceStatistics->totalPresent.' <strong style="color:green">Presents</strong><br>'.$memberAttendanceStatistics->totalAbsent.' <strong style="color:red">Absents</strong>'?></td>
						</tr>
						<tr>
							<td><stron>Total Paid</stron></td>
							<td><?=numberFormat($totalPaid)?> Rs</td>
						</tr>
						<tr>
							<td><stron>Member Balance Status</stron></td>
							<td><?=$personalStaffBalanceStatus?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>

		<div class="row" id="personal-staff-seaction">
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Member Payments History</h4>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_pay_payment')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_pay_payment'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_personal_staff')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_personal_staff'); ?>
					</div>
				<?php } ?>
			</div>

			<div class="col-md-3">
				<div id="addPersonalStaffpayment" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
					<h3>Give Payment</h3>
					<form id="payForemanPayment" method="POST" action="<?=base_url('factory/payPersonalStaff')?>">
						<input type="hidden" name="memberId" value="<?=$memberId?>">
						<input type="hidden" name="seasonId" value="<?=$seasonId?>">
						<label>Payment Date</label>
						<input type="text" name="paymentDate" value="<?=todayDate();?>" class="form-control date-masking" />
						<label>Paymnet Amount</label>
						<input type="text" name="paymentAmount" oninput="seprator(this); withDecimal(this.value, 'add-payment-personal-staff')" class="form-control" placeholder="Enter installment Amount">
						<span id="add-payment-personal-staff" style="color:black;font-weight: bold;display: none"></span>
						<label>Payment Description</label>
						<textarea name="paymentDescription" class="form-control" placeholder="Enter installment description" /></textarea>
						<label>Next Payment Date</label>
						<input type="text" name="nextPaymentDate" class="form-control date-masking" />
						<button class="btn btn-small btn-warning mt-2" type="submit">Pay Payment</button>
					</form>
				</div>
				<div id="editPersonalStaffpayment" style="background: rgb(172 247 178);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
					<h3>Edit Payment</h3>
					<form method="POST" action="<?=base_url('factory/editForemanPayment')?>">
						<input type="hidden" name="paymentId" id="paymentIdPersonalStaffEdit" value="">
						<input type="hidden" name="url" id="url_payment_personal_staff"  value="">
						<label>Payment Date</label>
						<input type="text" name="paymentDate" id="paymentDatePersonalStaffEdit" class="form-control date-masking" />
						<label>Paymnet Amount</label>
						<input type="text" name="paymentAmount" oninput="seprator(this); withDecimal(this.value, 'edit-payment-personal-staff')" id="paymentAmountPersonalStaffDate" class="form-control">
						<span id="edit-payment-personal-staff" style="color:black;font-weight: bold;display: none"></span>
						<label>Payment Description</label>
						<textarea name="paymentDescription" id="paymentDescriptionPersonalStaffEdit" class="form-control" /></textarea>
						<button class="btn btn-small btn-warning mt-2" type="submit">Edit Payment</button>
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<table class="table table-bordered table-sm datatable">
					<thead class="bg-white">
						<tr>
							<th>#</th>
							<th>Payment Date</th>
							<th>Payment Amount</th>
							<th>Payment Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-hover">
						<?php
						if(count($memberPaymentsDetail)==0)
						{
							?>
							<tr>
								<td></td>
								<td>No record found.</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<?php
						}
						else
						{
							$count = 1;
							foreach($memberPaymentsDetail as $memberPayment):
								?>
								<tr id="personal_staff_row_payment_<?=$memberPayment->id?>"
									<?php if($memberPayment->id == $this->session->userdata('edit_foreman_payment'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>
									>
									<td><?php echo $count;?></td>
									<td><?=dateConvertDMY($memberPayment->paymentDate)?></td>
									<td><?=numberFormat($memberPayment->amount);?> Rs</td>
									<td><?=$memberPayment->paymentDescription==''?'no description':$memberPayment->paymentDescription;?></td>
									<td>
										<a href="" class="bg-dark editPersonalStaffpayment" this-id="<?=$memberPayment->id?>" this-url="<?=$url?>">
											<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
										</a>
										<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/payments/'.$memberPayment->id.'/'.$url.'/personal_staff')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
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

		<div class="row" id="transport-attendance-section" <?php if($this->session->userdata('transport-credential-switcher') != 'daily_attendance' && $this->session->userdata('transport-credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
			<div class="col-md-12">
				<h4 class="text-center bg-dark mt-3" style="color:white">Member Daily Attendance</h4>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_change_attendance')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_change_attendance'); ?>
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
						if(count($memberAttendace)==0)
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
							foreach($memberAttendace as $memberDetail):
								?>
								<tr id="personal_staff_row_payment<?=$memberDetail->id?>"
								<?php if($memberDetail->id == $this->session->userdata('latestChangeAttendance'))
								{ 
									echo 'class="recentlyUpdated"';
								} ?>>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($memberDetail->attendanceDate)?></td>
								<td><?=$memberDetail->attendance==1?'<strong style="color:green">Present</strong>':'<strong style="color:red">Absent</strong>';?></td>
								<td>
									<?php
									if($memberDetail->attendance==1)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$memberId.'/change-attendance/absent/'.$memberDetail->id.'/4')?>" style="padding: 3px;border: 1px solid red;background: red;color: white;border-radius: 5px;font-size:11px">Mark Absent</a>
										<?php
									}
									else if($memberDetail->attendance==0)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$memberId.'/change-attendance/present/'.$memberDetail->id.'/4')?>" style="padding: 3px;border: 1px solid green;background: green;color: white;border-radius: 5px;font-size:11px">Mark Present</a>
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
  $('.transport-credential-switcher').click(function(){
  	var val = $(this).val();
    $.ajax({              //request ajax
    	type: "POST",
    	url: "<?=base_url('seasons/setTransportCredentialSwitcherSession')?>", 
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
    	$('#transport-payments-section').show();
    	$('#transport-attendance-section').hide();
    }
    else if(val == 'daily_attendance')
    {
    	$('#transport-payments-section').hide();
    	$('#transport-attendance-section').show();
    }
    else if(val == 'all')
    {
    	$('#transport-payments-section').show();
    	$('#transport-attendance-section').show();
    }

      //SCROLL TO DIV
      if(val == 'payments')
      {
      	$('html, body').animate({
      		scrollTop: $("#transport-payments-section").offset().top
      	}, 400);
      }
      else if(val == 'daily_attendance')
      {
      	$('html, body').animate({
      		scrollTop: $("#transport-attendance-section").offset().top
      	}, 400);
      }

  });

    $('.editPersonalStaffpayment').click(function(e){
      e.preventDefault();
	  $('tr').removeClass('activeForEdit');

      var paymentId = $(this).attr('this-id');
      var link      = $(this).attr('this-url');
      var table = 'payments';
      // console.log(paymentId+' '+link+' '+table );
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('CommonController/getRecord')?>", 
        data: {id:paymentId,table:table},
        dataType: "json",
        success: function(response) 
        {        	
          $('#addPersonalStaffpayment').hide();
          $('#editPersonalStaffpayment').show();
          $('#paymentIdPersonalStaffEdit').val(paymentId);
          $('#paymentDatePersonalStaffEdit').val(response.data.paymentDate);
          $('#paymentAmountPersonalStaffDate').val(response.data.amount);
          $('#paymentAmountPersonalStaffDate').focus();
          $('#paymentDescriptionPersonalStaffEdit').html(response.data.paymentDescription);
          $('#url_payment_personal_staff').val(link);
          $('#personal_staff_row_payment_'+paymentId).addClass('activeForEdit');
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