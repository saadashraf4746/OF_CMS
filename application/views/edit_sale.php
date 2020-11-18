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



		<div class="row sticky">
			<div class="col-md-12">
				<a href="<?=base_url('manage-factory/'.$this->session->userdata('season-id'))?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<h3 style="float: <?=$float?>"><?=$heading?></h3>
			</div>
			<div class="col-md-12">
				<?php if($this->session->flashdata('success-add-edit-kinow-selling')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('success-add-edit-kinow-selling'); ?>
					</div>
				<?php } ?>
			</div>
		</div>


<div class="row mt-5" id="edit-section" 
style="
background: #fffff5;padding: 14px;border: 1px solid #cddede;border-radius: 8px;
-webkit-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
-moz-box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
box-shadow: -3px 2px 10px -3px rgba(0,0,0,0.83);
">
<div class="col-md-12" >
	<h4 class="text-center bg-dark" id="edit-section-heading" style="color:white">Edit Kinow Phati Cotton To Production (<?=dateToDMY($sale->sellDate)?>)</h4>
</div>
<div class="col-md-4" id="edit-first">
	<div id="addForemanPayment" style="background: #baffdc;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
		<h3 class="text-center">Phati 8KG</h3>
		<span id="bardanaAtleastOne" style="color: red; display: none"></span>
		<form id="updateRecordProduction" method="POST">
			<input type="hidden" name="saleId" value="<?=$saleId?>">
			<input type="hidden" name="sellDate" value="<?=$sale->sellDate?>">
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Phati</span>
				</div>
				<input type="text" name="fourtyEight_first" value="<?=$sale->fourtyEight_first?>" id="fourtyEight_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Phati</span>
				</div>
				<input type="text" name="fiftySix_first" value="<?=$sale->fiftySix_first?>" id="fiftySix_one_edit"  class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64 Dana Phati</span>
				</div>
				<input type="text" name="sixtyFour_first" value="<?=$sale->sixtyFour_first?>" id="sixtyFour_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Phati</span>
				</div>
				<input type="text" name="seventyTwo_first" value="<?=$sale->seventyTwo_first?>" id="seventyTwo_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Phati</span>
				</div>
				<input type="text" name="eighty_first" value="<?=$sale->eighty_first?>" id="eighty_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Phati</span>
				</div>
				<input type="text" name="ninety_first" value="<?=$sale->ninety_first?>" id="ninety_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Phati</span>
				</div>
				<input type="text" name="hundred_first" value="<?=$sale->hundred_first?>" id="hundred_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Phati</span>
				</div>
				<input type="text" name="hundredAndTen_first" value="<?=$sale->hundredAndTen_first?>" id="hundredAndTen_one_edit" class="form-control numeric-masking eightKgTotalEdit">
				<input type="text" value="8Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalFirst" value="<?=$sale->totalFirst?>" id="pathi8KgTotal_one_edit" class="form-control" placeholder="Total">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-second">
		<div id="addForemanPayment" style="background: #baffdc;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Phati 10KG</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Phati</span>
				</div>
				<input type="text" name="fourtyEight_second" value="<?=$sale->fourtyEight_second?>" id="fourtyEight_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Phati</span>
				</div>
				<input type="text" name="fiftySix_second" value="<?=$sale->fiftySix_second?>" id="fiftySix_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64 Dana Phati</span>
				</div>
				<input type="text" name="sixtyFour_second" value="<?=$sale->sixtyFour_second?>" id="sixtyFour_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Phati</span>
				</div>
				<input type="text" name="seventyTwo_second" value="<?=$sale->seventyTwo_second?>" id="seventyTwo_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Phati</span>
				</div>
				<input type="text" name="eighty_second" value="<?=$sale->eighty_second?>" id="eighty_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Phati</span>
				</div>
				<input type="text" name="ninety_second" value="<?=$sale->ninety_second?>" id="ninety_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Phati</span>
				</div>
				<input type="text" name="hundred_second" value="<?=$sale->hundred_second?>" id="hundred_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Phati</span>
				</div>
				<input type="text" name="hundredAndTen_second" value="<?=$sale->hundredAndTen_second?>" id="hundredAndTen_second_edit" class="form-control numeric-masking tenKgTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalSecond" value="<?=$sale->totalSecond?>" id="pathi10KgTotal_second_total" class="form-control">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-cotton">
		<div id="addForemanPayment" style="background: #b7b7b7;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Cotton</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span> 
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">42 Dana Cotton</span>
				</div>
				<input type="text" name="fourtyTwo_cotton" value="<?=$sale->fourtyTwo_cotton?>" id="fourtyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">48 Dana Cotton</span>
				</div>
				<input type="text" name="fourtyEight_cotton" value="<?=$sale->fourtyEight_cotton?>" id="fourtyEight_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">56 Dana Cotton</span>
				</div>
				<input type="text" name="fiftySix_cotton" value="<?=$sale->fiftySix_cotton?>" id="fiftySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">60 Dana Cotton</span>
				</div>
				<input type="text" name="sixty_cotton" value="<?=$sale->sixty_cotton?>" id="sixty_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">66 Dana Cotton</span>
				</div>
				<input type="text" name="sixtySix_cotton" value="<?=$sale->sixtySix_cotton?>" id="sixtySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">72 Dana Cotton</span>
				</div>
				<input type="text" name="seventyTwo_cotton" value="<?=$sale->seventyTwo_cotton?>" id="seventyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">80 Dana Cotton</span>
				</div>
				<input type="text" name="eighty_cotton" value="<?=$sale->eighty_cotton?>" id="eighty_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">90 Dana Cotton</span>
				</div>
				<input type="text" name="ninety_cotton" value="<?=$sale->ninety_cotton?>" id="ninety_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">100 Dana Cotton</span>
				</div>
				<input type="text" name="hundred_cotton" value="<?=$sale->hundred_cotton?>" id="hundred_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">110 Dana Cotton</span>
				</div>
				<input type="text" name="hundredAndTen_cotton" value="<?=$sale->hundredAndTen_cotton?>" id="hundredAndTen_cooton_edit" class="form-control numeric-masking cottonTotalEdit">
				<input type="text" value="10Kg" class="form-control" readonly/>
			</div>

			<label class="mt-2">Total</label>
			<input readonly type="text" name="cottonTotal" value="<?=$sale->cottonTotal?>" id="cottonTotal_cooton_edit" class="form-control" placeholder="Total">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
		<button class="btn btn-small btn-warning float-right mt-2" type="submit">Update</button>
	</div>
</form>
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

	$('.eightKgTotal').keyup(function() {
		var sum = 0;
		$('.eightKgTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=pathi8KgTotal]').val(sum);
	});

	$('.eightKgTotalEdit').keyup(function() {
		var sum = 0;
		$('.eightKgTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#pathi8KgTotal_one_edit').val(sum);
	});

	$('.tenKgTotal').keyup(function() {
		var sum = 0;
		$('.tenKgTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=pathi10KgTotal]').val(sum);
	});

	$('.tenKgTotalEdit').keyup(function() {
		var sum = 0;
		$('.tenKgTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#pathi10KgTotal_second_total').val(sum);
	});

	$('.cottonTotal').keyup(function() {
		var sum = 0;
		$('.cottonTotal').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('input[name=cottonTotal]').val(sum);
	});

	$('.cottonTotalEdit').keyup(function() {
		var sum = 0;
		$('.cottonTotalEdit').each(function() {
			sum += (typeof this.value) == NaN ? 0 : parseInt(this.value);
		});
		$('#cottonTotal_cooton_edit').val(sum);
	});

	$('.editProductionRecord').click(function(e){
		e.preventDefault();
		$('tr').removeClass('activeForEdit');

		var recordId = $(this).attr('this-id');
		var link      = $(this).attr('this-url');
		var table = 'kinow_production';
  // console.log(paymentId+' '+link+' '+table );
  $.ajax({              //request ajax
  	type: "POST",
  	url: "<?=base_url('CommonController/getRecord')?>", 
  	data: {id:recordId,table:table},
  	dataType: "json",
  	success: function(response) 
  	{        	
  		$('#add-section').hide();
  		$('#edit-section').show();
  		$('.recordId_edit').val(recordId);
  		$('.url').val(link);
  		$('#edit-section-heading').html('');
  		$('#edit-section-heading').html(`Edit Kinow Phati Cotton To Production Record (${dateToDMY(response.data.addDate)})`);



  		$('#edit-first').show();
  		$('#fourtyEight_one_edit').val(response.data.fourtyEight_first);
  		$('#fiftySix_one_edit').val(response.data.fiftySix_first);
  		$('#sixtyFour_one_edit').val(response.data.sixtyFour_first);
  		$('#seventyTwo_one_edit').val(response.data.seventyTwo_first);
  		$('#eighty_one_edit').val(response.data.eighty_first);
  		$('#ninety_one_edit').val(response.data.ninety_first);
  		$('#hundred_one_edit').val(response.data.hundred_first);
  		$('#hundredAndTen_one_edit').val(response.data.hundredAndTen_first);
  		$('#pathi8KgTotal_one_edit').val(response.data.totalFirst);

  		$('#edit-second').show();
  		$('#fourtyEight_second_edit').val(response.data.fourtyEight_second);
  		$('#fiftySix_second_edit').val(response.data.fiftySix_second);
  		$('#sixtyFour_second_edit').val(response.data.sixtyFour_second);
  		$('#seventyTwo_second_edit').val(response.data.seventyTwo_second);
  		$('#eighty_second_edit').val(response.data.eighty_second);
  		$('#ninety_second_edit').val(response.data.ninety_second);
  		$('#hundred_second_edit').val(response.data.hundred_second);
  		$('#hundredAndTen_second_edit').val(response.data.hundredAndTen_second);
  		$('#pathi10KgTotal_second_total').val(response.data.totalSecond);

  		$('#edit-cotton').show();
  		$('#fourtyTwo_cooton_edit').val(response.data.fourtyTwo_cotton);
  		$('#fourtyEight_cooton_edit').val(response.data.fourtyEight_cotton);
  		$('#fiftySix_cooton_edit').val(response.data.fiftySix_cotton);
  		$('#sixty_cooton_edit').val(response.data.sixty_cotton);
  		$('#sixtySix_cooton_edit').val(response.data.sixtySix_cotton);
  		$('#seventyTwo_cooton_edit').val(response.data.seventyTwo_cotton);
  		$('#eighty_cooton_edit').val(response.data.eighty_cotton);
  		$('#ninety_cooton_edit').val(response.data.ninety_cotton);
  		$('#hundred_cooton_edit').val(response.data.hundred_cotton);
  		$('#hundredAndTen_cooton_edit').val(response.data.hundredAndTen_cotton);
  		$('#cottonTotal_cooton_edit').val(response.data.cottonTotal);

  		$('html, body').animate({
  			scrollTop: $("#edit-section").offset().top
  		}, 500);
      //$('#row_'+paymentId).addClass('activeForEdit');

  },
  error: function()
  {
  	console.log('ERROR');
  }
});
});

	$('.editCustomer').click(function(e){
		e.preventDefault();
		$('tr').removeClass('activeForEdit');

		var customerId = $(this).attr('this-id');
		var link      = $(this).attr('this-url');
		var table = 'customers';
  // console.log(supplierId+' '+link+' '+table );
  $.ajax({              //request ajax
  	type: "POST",
  	url: "<?=base_url('CommonController/getRecord')?>", 
  	data: {id:customerId,table:table},
  	dataType: "json",
  	success: function(response) 
  	{        	
  		$('#addCustomerSection').hide();
  		$('#editCustomerSection').show();
  		$('#nameEditCustomer').val(response.data.name);
  		$('#nameEditCustomer').focus();
  		$('#phoneEditCustomer').val(response.data.phone);
  		$('#customerIdEdit').val(customerId);
  		$('#url_customer_edit').val(link);
  		$('#customers_edit_row_'+customerId).addClass('activeForEdit');

  	},
  	error: function()
  	{
  		console.log('ERROR');
  	}
  });
});
</script>
</html























