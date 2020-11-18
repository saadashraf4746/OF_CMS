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
				<a href="<?=base_url('manage-sales/sales-detail/'.$sale->sellDate)?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
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
			<?php
			if(!$sale->fourtyEight_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">48</span>
					</div>
					<input type="text" name="fourtyEight_first" value="<?=$sale->fourtyEight_first?>" id="fourtyEight_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="fourtyEight_first_amount" oninput="calculateTotal('fourtyEight_one_edit', this.value, 'fourtyEight_first')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="fourtyEight_first" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->fiftySix_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">56</span>
					</div>
					<input type="text" name="fiftySix_first" value="<?=$sale->fiftySix_first?>" id="fiftySix_one_edit"  class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="fiftySix_first_amount" oninput="calculateTotal('fiftySix_one_edit', this.value, 'fiftySix_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="fiftySix_first_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->sixtyFour_first == 0)
			{
			?>
			<div class="input-group mb-1">
				<div class="input-group-prepend">
					<span class="input-group-text">64</span>
				</div>
				<input type="text" name="sixtyFour_first" value="<?=$sale->sixtyFour_first?>" id="sixtyFour_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
				<input type="text" name="sixtyFour_first_amount" oninput="calculateTotal('sixtyFour_one_edit', this.value, 'sixtyFour_first_total')" class="form-control">
				<input type="text" class="form-control firstTotalAmount" id="sixtyFour_first_total" readonly>
			</div>
			<?php
			}
			?>
			<?php
			if(!$sale->seventyTwo_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">72</span>
					</div>
					<input type="text" name="seventyTwo_first" value="<?=$sale->seventyTwo_first?>" id="seventyTwo_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="seventyTwo_first_amount" oninput="calculateTotal('seventyTwo_one_edit', this.value, 'seventyTwo_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="seventyTwo_first_total" readonly>
					
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->eighty_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">80</span>
					</div>
					<input type="text" name="eighty_first" value="<?=$sale->eighty_first?>" id="eighty_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="eighty_first_amount" oninput="calculateTotal('eighty_one_edit', this.value, 'eighty_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="eighty_first_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->ninety_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">90</span>
					</div>
					<input type="text" name="ninety_first" value="<?=$sale->ninety_first?>" id="ninety_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="ninety_first_amount" oninput="calculateTotal('ninety_one_edit', this.value, 'ninety_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="ninety_first_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundred_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">100</span>
					</div>
					<input type="text" name="hundred_first" value="<?=$sale->hundred_first?>" id="hundred_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="hundred_first_amount" oninput="calculateTotal('hundred_one_edit', this.value, 'hundred_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="hundred_first_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundredAndTen_first == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">110</span>
					</div>
					<input type="text" name="hundredAndTen_first" value="<?=$sale->hundredAndTen_first?>" id="hundredAndTen_one_edit" class="form-control numeric-masking eightKgTotalEdit" readonly>
					<input type="text" name="hundredAndTen_first_amount" oninput="calculateTotal('hundredAndTen_one_edit', this.value, 'hundredAndTen_first_total')" class="form-control">
					<input type="text" class="form-control firstTotalAmount" id="hundredAndTen_first_total" readonly>
				</div>
			<?php
			}
			?>
			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalFirst" value="<?=$sale->totalFirst?>" id="pathi8KgTotal_one_edit" class="form-control" placeholder="Total">
			<input readonly type="text" id="first_total_amount" class="form-control total" placeholder="Total Amount">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-second">
		<div id="addForemanPayment" style="background: #baffdc;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Phati 10KG</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span>
			<?php
			if(!$sale->fourtyEight_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">48</span>
					</div>
					<input type="text" name="fourtyEight_second" value="<?=$sale->fourtyEight_second?>" id="fourtyEight_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="fourtyEight_second_amount" oninput="calculateTotal('fourtyEight_second_edit', this.value, 'fourtyEight_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="fourtyEight_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->fiftySix_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">56</span>
					</div>
					<input type="text" name="fiftySix_second" value="<?=$sale->fiftySix_second?>" id="fiftySix_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="fiftySix_second_amount" oninput="calculateTotal('fiftySix_second_edit', this.value, 'fiftySix_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="fiftySix_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->sixtyFour_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">64</span>
					</div>
					<input type="text" name="sixtyFour_second" value="<?=$sale->sixtyFour_second?>" id="sixtyFour_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="sixtyFour_second_amount" oninput="calculateTotal('sixtyFour_second_edit', this.value, 'sixtyFour_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="sixtyFour_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->seventyTwo_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">72</span>
					</div>
					<input type="text" name="seventyTwo_second" value="<?=$sale->seventyTwo_second?>" id="seventyTwo_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="seventyTwo_second_amount" oninput="calculateTotal('seventyTwo_second_edit', this.value, 'seventyTwo_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="seventyTwo_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->eighty_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">80</span>
					</div>
					<input type="text" name="eighty_second" value="<?=$sale->eighty_second?>" id="eighty_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="eighty_second_amount" oninput="calculateTotal('eighty_second_edit', this.value, 'eighty_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="eighty_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->ninety_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">90</span>
					</div>
					<input type="text" name="ninety_second" value="<?=$sale->ninety_second?>" id="ninety_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="ninety_second_amount" oninput="calculateTotal('ninety_second_edit', this.value, 'ninety_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="ninety_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundred_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">100</span>
					</div>
					<input type="text" name="hundred_second" value="<?=$sale->hundred_second?>" id="hundred_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="hundred_second_amount" oninput="calculateTotal('hundred_second_edit', this.value, 'hundred_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="hundred_second_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundredAndTen_second == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">110</span>
					</div>
					<input type="text" name="hundredAndTen_second" value="<?=$sale->hundredAndTen_second?>" id="hundredAndTen_second_edit" class="form-control numeric-masking tenKgTotalEdit" readonly>
					<input type="text" name="hundredAndTen_second_amount" oninput="calculateTotal('hundredAndTen_second_edit', this.value, 'hundredAndTen_second_total')" class="form-control">
					<input type="text" class="form-control secondTotalAmount" id="hundredAndTen_second_total" readonly>
				</div>
			<?php
			}
			?>
			<label class="mt-2">Total</label>
			<input readonly type="text" name="totalSecond" value="<?=$sale->totalSecond?>" id="pathi10KgTotal_second_total" class="form-control">
			<input readonly type="text" id="second_total_amount" class="form-control total" placeholder="Total Amount">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
	</div>

	<div class="col-md-4" id="edit-cotton">
		<div id="addForemanPayment" style="background: #b7b7b7;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
			<h3 class="text-center">Cotton</h3>
			<span id="bardanaAtleastOne" style="color: red; display: none"></span> 
			<?php
			if(!$sale->fourtyTwo_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">42</span>
					</div>
					<input type="text" name="fourtyTwo_cotton" value="<?=$sale->fourtyTwo_cotton?>" id="fourtyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="fourtyTwo_cotton_amount" oninput="calculateTotal('fourtyTwo_cooton_edit', this.value, 'fourtyTwo_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="fourtyTwo_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->fourtyEight_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">48</span>
					</div>
					<input type="text" name="fourtyEight_cotton" value="<?=$sale->fourtyEight_cotton?>" id="fourtyEight_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="fourtyEight_cotton_amount" oninput="calculateTotal('fourtyEight_cooton_edit', this.value, 'fourtyEight_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="fourtyEight_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->fiftySix_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">56</span>
					</div>
					<input type="text" name="fiftySix_cotton" value="<?=$sale->fiftySix_cotton?>" id="fiftySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="fiftySix_cotton_amount" oninput="calculateTotal('fiftySix_cooton_edit', this.value, 'fiftySix_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="fiftySix_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->sixty_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">60</span>
					</div>
					<input type="text" name="sixty_cotton" value="<?=$sale->sixty_cotton?>" id="sixty_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="sixty_cotton_amount" oninput="calculateTotal('sixty_cooton_edit', this.value, 'sixty_cotton_total')" class="form-control">
					<input type="text" class="form-control" id="sixty_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->sixtySix_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">66</span>
					</div>
					<input type="text" name="sixtySix_cotton" value="<?=$sale->sixtySix_cotton?>" id="sixtySix_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="sixtySix_cotton_amount" oninput="calculateTotal('sixtySix_cooton_edit', this.value, 'sixtySix_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="sixtySix_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->seventyTwo_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">72</span>
					</div>
					<input type="text" name="seventyTwo_cotton" value="<?=$sale->seventyTwo_cotton?>" id="seventyTwo_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="seventyTwo_cotton_amount" oninput="calculateTotal('seventyTwo_cooton_edit', this.value, 'seventyTwo_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="seventyTwo_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->eighty_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">80</span>
					</div>
					<input type="text" name="eighty_cotton" value="<?=$sale->eighty_cotton?>" id="eighty_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="eighty_cotton_amount" oninput="calculateTotal('eighty_cooton_edit', this.value, 'eighty_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="eighty_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->ninety_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">90</span>
					</div>
					<input type="text" name="ninety_cotton" value="<?=$sale->ninety_cotton?>" id="ninety_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="ninety_cotton_amount" oninput="calculateTotal('ninety_cooton_edit', this.value, 'ninety_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="ninety_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundred_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">100</span>
					</div>
					<input type="text" name="hundred_cotton" value="<?=$sale->hundred_cotton?>" id="hundred_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="hundred_cotton_amount" oninput="calculateTotal('hundred_cooton_edit', this.value, 'hundred_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="hundred_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<?php
			if(!$sale->hundredAndTen_cotton == 0)
			{
			?>
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text">110</span>
					</div>
					<input type="text" name="hundredAndTen_cotton" value="<?=$sale->hundredAndTen_cotton?>" id="hundredAndTen_cooton_edit" class="form-control numeric-masking cottonTotalEdit" readonly>
					<input type="text" name="hundredAndTen_cotton_amount" oninput="calculateTotal('hundredAndTen_cooton_edit', this.value, 'hundredAndTen_cotton_total')" class="form-control">
					<input type="text" class="form-control thirdTotalAmount" id="hundredAndTen_cotton_total" readonly>
				</div>
			<?php
			}
			?>
			<label class="mt-2">Total</label>
			<input readonly type="text" name="cottonTotal" value="<?=$sale->cottonTotal?>" id="cottonTotal_cooton_edit" class="form-control" placeholder="Total">
			<input readonly type="text" id="third_total_amount" class="form-control total" placeholder="Total Amount">
			<span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
		</div>
		<br/>
		<input readonly type="text" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total">
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

	function calculateTotal(quantity, amount, appendTo)
	{
		var quantity = $('#'+quantity).val();
		$('#'+appendTo).val('');
		$('#'+appendTo).val(quantity * amount);
	}

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

	$('.firstTotalAmount').keyup(function() {
		var sum = 0;
		$('.firstTotalAmount').each(function() {
			sum += this.value == '' ? 0 : parseInt(this.value);
		});
		$('#first_total_amount').val(sum);
	});

	$('.secondTotalAmount').keyup(function() {
		var sum = 0;
		$('.secondTotalAmount').each(function() {
			sum += this.value == '' ? 0 : parseInt(this.value);
		});
		$('#second_total_amount').val(sum);
	});

	$('.thirdTotalAmount').keyup(function() {
		var sum = 0;
		$('.thirdTotalAmount').each(function() {
			sum += this.value == '' ? 0 : parseInt(this.value);
		});
		$('#third_total_amount').val(sum);
	});

	$('.total').keyup(function() {
		var sum = 0;
		$('.total').each(function() {
			sum += this.value == '' ? 0 : parseInt(this.value);
		});
		$('#grand_total').val(sum);
	});

	// var sum = 0;
	// $('.total1, .total2, .total3').change(function() {
	// 	alert();
	// 	var val1 = $('.total1').val();
	// 	var1 = (var1 == '' ? 0 : parseInt(var1));
	// 	var val2 = $('.total2').val();
	// 	var2 = (var2 == '' ? 0 : parseInt(var2));
	// 	var val3 = $('.total3').val();
	// 	var3 = (var3 == '' ? 0 : parseInt(var3));

	// 	sum = parseInt(var1) + parseInt(var2) + parseInt(var3);
	// 	$('#grand_total').val(sum);
	// });

	
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























