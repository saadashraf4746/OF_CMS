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
				<?php
				if($selectedTransport->isTransportEnd == 0)
				{
					?>
					<a href="<?=base_url('seasons/endSession/'.$seasonId.'/'.$expenseId)?>" class="btn btn-warning float-right mb-2" style="padding: 5px; display: inline" >
						End Transport
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
				<h4 class="text-center bg-dark" style="color:white">Transport Details</h4>
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
							<td><stron>Transport Start Date</stron></td>
							<td><?=dateConvertDMY($selectedTransport->transportStartDate);?></td>
						</tr>
						<tr>
							<td hidden>-</td>
							<td><stron>Attendance Status</stron></td>
							<td><?php
							$attendanceStatistics = attendanceStatistics($expenseId, 6);
							echo $attendanceStatistics->totalDays.' <strong style="color:black">Days</strong><br>'.$attendanceStatistics->totalPresent.' <strong style="color:green">Presents</strong><br>'.$attendanceStatistics->totalAbsent.' <strong style="color:red">Absents</strong>';
							?></td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Total Paid Amount</stron></td>
							<td><?=numberFormat($totalPaid);?> Rs</td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Total Rent (Start To Today)</stron></td>
							<td><?=numberFormat($totalRent);?> Rs</td>
						</tr>
						<tr>
							<td hidden>-</td>
							<td><stron>Balance Status</stron></td>
							<td><?=$balanceStatus?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>
		<div class="row" id="transport-payments-section" <?php if($this->session->userdata('transport-credential-switcher') != 'payments' && $this->session->userdata('transport-credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
			<div class="col-md-12">
				<h4 class="text-center bg-dark" style="color:white">Transport Payments History</h4>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success_pay_payment')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success_pay_payment'); ?>
					</div>
				<?php } ?>
				<?php if($this->session->flashdata('global_delete_message_transport_payment')){ ?>
				  <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert">x</button>
				    <?php echo $this->session->flashdata('global_delete_message_transport_payment'); ?>
				  </div>
				<?php } ?>
			</div>
			<div class="col-md-3" id="addTransportPayment" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
				<h3>Give Payment</h3>
				<form id="giveTransportPayment" method="POST" action="<?=base_url('factory/payTransportPayment')?>">
					<input type="hidden" name="transportExpenseId" value="<?=$expenseId?>">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<label>Payment Date</label>
					<input type="text" name="paymentDate" value="<?=todayDate();?>" class="form-control date-masking" />
					<label>Paymnet Amount</label>
					<input type="text" name="paymentAmount" class="form-control" oninput="seprator(this); withDecimal(this.value, 'add-payment-transport')" placeholder="Enter installment Amount">
					<span id="add-payment-transport" style="color:black;font-weight: bold;display: none"></span>
					<label>Payment Description</label>
					<textarea name="paymentDescription" class="form-control" placeholder="Enter installment description" /></textarea>
					<label>Next Payment Date</label>
					<input type="text" name="nextPaymentDate" class="form-control date-masking" />
					<button class="btn btn-small btn-warning mt-2" type="submit">Pay Payment</button>
				</form>
			</div>
			<div class="col-md-3" id="editTransportPayment" style="background: rgb(153 255 152);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
				<h3>Edit Payment</h3>
				<form method="POST" action="<?=base_url('seasons/editTransportPayment')?>">
					<input type="hidden" name="paymentId" id="paymentId" value="">
					<input type="hidden" name="link_transportPayment" id="link_transportPayment" value="">
					<label>Payment Date</label>
					<input type="text" name="paymentDate" id="paymentDateEdit" class="form-control date-masking" />
					<label>Paymnet Amount</label>
					<input type="text" name="paymentAmount" oninput="seprator(this); withDecimal(this.value, 'edit-payment-transport')" id="paymentAmountEdit" class="form-control">
					<span id="edit-payment-transport" style="color:black;font-weight: bold;display: none"></span>
					<label>Payment Description</label>
					<textarea name="paymentDescription" class="form-control" id="paymentDescriptionEdit"/></textarea>
<!-- 					<label>Next Payment Date</label>
					<input type="date" name="nextPaymentDate" data-date-format="DD MM YYYY" class="form-control" /> -->
					<button class="btn btn-small btn-warning mt-2" type="submit">Edit Payment</button>
				</form>
			</div>
			<div class="col-md-9">
				<table class="table table-bordered table-sm datatable" id="paymentsForTransport">
					<thead class="bg-white">
						<tr>
							<th>Sr No.</th>
							<th>Payment Date</th>
							<th>Payment Amount</th>
							<th>Payment Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody class="table-hover">
						<?php
						if(count($paymentsDetail)==0)
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
							foreach($paymentsDetail as $payment):
								?>
								<tr id="row_<?=$payment->id?>"
									<?php if($payment->id == $this->session->userdata('edit_transport_payment_session'))
									{ 
										echo 'class="recentlyUpdated"';
									}
									?>
								>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($payment->paymentDate)?></td>
								<td><?=numberFormat($payment->amount).' Rs';?></td>
								<td><?=$payment->paymentDescription==''?'no description':$payment->paymentDescription;?></td>
								<td>
									<a href="" class="bg-dark editTransportPayemnt" this-id="<?=$payment->id?>" this-url="<?=$url?>" >
										<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
									</a>
				                    <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/payments/'.$payment->id.'/'.$url.'/transport_payment')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
				                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
				                    </a>
									</td>
								</tr>
								<?php
								$count++;
							endforeach;
							$this->session->unset_userdata('edit_transport_payment_session');
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row" id="transport-attendance-section" <?php if($this->session->userdata('transport-credential-switcher') != 'daily_attendance' && $this->session->userdata('transport-credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
			<div class="col-md-12">
				<h4 class="text-center bg-dark mt-3" style="color:white">Transport Daily Attendance</h4>
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
					<tbody class="table-hover">
						<?php
						if(count($totalRecords)==0)
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
							foreach($totalRecords as $record):
								?>
								<tr 
								<?php if($record->id == $this->session->userdata('latestChangeAttendance'))
								{ 
									echo 'class="recentlyUpdated"';
								} ?>>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($record->attendanceDate)?></td>
								<td><?=$record->attendance==1?'<strong style="color:green">Present</strong>':'<strong style="color:red">Absent</strong>';?></td>
								<td>
									<?php
									if($record->attendance==1)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$expenseId.'/change-attendance/absent/'.$record->id.'/1')?>" style="padding: 3px;border: 1px solid red;background: red;color: white;border-radius: 5px;font-size:11px">Mark Absent</a>
										<?php
									}
									else if($record->attendance==0)
									{
										?>
										<a href="<?=base_url($seasonId.'/'.$expenseId.'/change-attendance/present/'.$record->id.'/1')?>" style="padding: 3px;border: 1px solid green;background: green;color: white;border-radius: 5px;font-size:11px">Mark Present</a>
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

    $('.editTransportPayemnt').click(function(e){
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
          $('#addTransportPayment').hide();
          $('#editTransportPayment').show();
          $('#paymentId').val(paymentId);
          $('#paymentDateEdit').val(dateToDMY(response.data.paymentDate));
          $('#paymentAmountEdit').val(response.data.amount);
          $('#paymentAmountEdit').focus();
          $('#paymentDescriptionEdit').html(response.data.paymentDescription);
          $('#link_transportPayment').val(link);
          $('#row_'+paymentId).addClass('activeForEdit');

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