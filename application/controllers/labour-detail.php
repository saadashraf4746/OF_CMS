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
				<a href="<?=base_url('manage-season/'.$seasonId)?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
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
								<?=$selectedForeman->foremanSeasonFixAmount==0?'Foreman Amount Not fixed yet':'Foreman Amounr: '.numberFormat($selectedForeman->foremanSeasonFixAmount).' Rs'?>
								<br>
								Total Paid: <?=numberFormat($paidToForeman)?> Rs
							</td>
						</tr>
						<tr>
							<td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
							<td><stron>Foreman Balance Status</stron></td>
							<td><?=$foremanBalanceStatus;?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
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
										echo 'style="background: #ababab;box-shadow: 0px 0px 10px #484848;"';
									} ?>>
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
</script>

</body>
</html>