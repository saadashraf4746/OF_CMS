<!DOCTYPE html>
<html lang="en-US">
<!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
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
				<a href="<?=base_url('manage-purchases')?>" class="mr-2 float-left bg-dark" style="padding: 5px">
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<ul class="breadcrumb-realestate" style="float: <?=$float?>;display: inline">
					<li><a href="<?=base_url('/')?>">Home</a></li>
					<li class="active"><?=$headTittle?></li>
				</ul>
			</div>
		</div>

		<div class="row mb-3 mt-2">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white">Purchase Kinow</h3>
			</div>
		</div>

		<div class="add-property-form-container">
			<div class="row">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success_purchase_first')){ ?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<?php echo $this->session->flashdata('success_purchase_first'); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
      <div class="add-property-form-container">
        <form action="<?=base_url('factory/purchaseKinow')?>" method="post" id="gardenAddEdit">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="hidden" name="gardenAmount" id="gardenAmount">
          <input type="hidden" name="perMaanAmount" id="perMaanAmount">
          <div class="row">
          	<div class="col-md-12">
          		<div id="statisticsArea" class="bg-white p-3 mb-2">
          			<strong class="ml-5">Garden Price: </strong><span id="gardenAmountSpan"> x</span>
          			<strong class="ml-5">Kinow Maan: </strong><span id="kinowMaan">x</span>
          			<!-- <strong class="ml-5">Per Maan: </strong><span id="perMaan">x</span> -->
          			<br/>
          			<br/>
          			<strong class="ml-5">Category A: </strong><span id="totalAQuantity">x</span>
          			<br/>
          			<br/>
          			<strong class="ml-5">Category B: </strong><span id="totalBQuantity">x</span>
          			<br/>
          			<br/>
          			<strong class="ml-5">Total: </strong><span id="total" style="display: none"></span>
          			
          		</div>
          	</div>
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label>Gardens List</label>
                <select name="gardenId" id="gardenId" class="form-control">
                	<option value="">Select Garden</option>
                	<?php
                	if(count($gardenList) == 0)
                	{
                	?>
                		<option value="" disabled>No garden found</option>
                	<?php
                	}
                	else
                	{
                	foreach($gardenList as $garden):
                	?>
                		<option value="<?=$garden->id?>"><?=$garden->landlordName.': '.$garden->gardenLocation.' ('.number_format($garden->purchaseAmount).' Rs)'?></option>
                	<?php
                	endforeach;
                	}
                	?>
                </select>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Set QUantity In Maan</label>
                <input type="text" name="quantityInMaan" id="quantityInMaan" class="form-control numeric-masking" placeholder="Enter quantity in Maan" /> 
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Set A Category</label>
                <input type="text" name="categoryAQuanity" id="categoryAQuanity" class="form-control" placeholder="Enter Quantity" /> 
                <input type="text" name="categoryAPrice" id="categoryAPrice" oninput="seprator(this); withDecimal(this.value, 'kinow-purchase-catA-price')" class="form-control" placeholder="Enter Price Per Maan" /> 
                <span id="kinow-purchase-catA-price" style="color:black;font-weight: bold;display: none"></span>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Set B Category</label>
                <input type="text" name="categoryBQuanity" id="categoryBQuanity" class="form-control" placeholder="Enter Quantity" /> 
                <input type="text" name="categoryBPrice" id="categoryBPrice" oninput="seprator(this); withDecimal(this.value, 'kinow-purchase-catB-price')" class="form-control" placeholder="Enter Price Per Maan" /> 
                <span id="kinow-purchase-catB-price" style="color:black;font-weight: bold;display: none"></span>
              </div>
            </div>

            <div class="col-md-12 col-sm-6">
              <div class="form-group">
                <label>Total</label>
                <input readonly type="text" name="totalAmount" id="totalAmount" class="form-control numeric-masking" placeholder="Enter Garden Acre" /> 
                <span id="total-amount-cat-AaB" style="color:black;font-weight: bold;display: none"></span>
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
<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(event) { 
		var scrollpos = localStorage.getItem('scrollpos');
		if (scrollpos) window.scrollTo(0, scrollpos);
	});

	window.onbeforeunload = function(e) {
		localStorage.setItem('scrollpos', window.scrollY);
	};

	$('#gardenId').on('change', function(){
		var seasonId = $(this).val();
		var table = 'garden_purchasing';
		$.ajax({              //request ajax
			type: "POST",
			url: "<?=base_url('CommonController/getRecord')?>", 
			data: {id:seasonId,table:table},
			dataType: "json",
			success: function(response) 
			{
				$('#gardenAmountSpan').html('');
				$('#gardenAmountSpan').append(`${response.data.purchaseAmount} Rs`);
				$('#gardenAmount').val(response.data.purchaseAmount);
			},
			error: function()
			{
				console.log('ERROR');
			}
		});
	});

	$('#quantityInMaan').on('keyup', function(){
		var quantity     = $(this).val();
		var gardenAmount = $('#gardenAmount').val();
		var perMaan = gardenAmount / quantity;

		$('#kinowMaan').html('');
		$('#kinowMaan').append(`${quantity}`);
		$('#perMaan').html('');
	});

	$('#categoryAQuanity, #categoryAPrice').on('keyup', function(){
		var gardenAmount = $('#gardenAmount').val();

		var categoryAQuanity = removeCommas($('#categoryAQuanity').val());
		var categoryAPrice   = removeCommas($('#categoryAPrice').val());
		var totalAQuantity = categoryAQuanity * categoryAPrice;

		var categoryBQuanity = removeCommas($('#categoryBQuanity').val());
		var categoryBPrice   = removeCommas($('#categoryBPrice').val());
		var totalBQuantity = categoryBQuanity * categoryBPrice;

		if(totalBQuantity != 0)
		{
			var total = totalAQuantity + totalBQuantity;
		}

		$('#totalAQuantity').html('');
		$('#totalAQuantity').append(`${categoryAQuanity} Maan (x) ${categoryAPrice} Per Mann = ${totalAQuantity} Rs`);
		$('input[name=totalAQuantity]').val(totalAQuantity);
		$('#total').show();
		$('#total').html('');
		$('#total').append(`${total} Rs`);
		$('#total-amount-cat-AaB').show();
		$('#total-amount-cat-AaB').html('');
		$('#total-amount-cat-AaB').html(withDecimalOnlyWords(total));
		$('#totalAmount').val(total);
	});	

	$('#categoryBQuanity, #categoryBPrice').on('keyup', function(){
		var gardenAmount = $('#gardenAmount').val();

		var categoryBQuanity = removeCommas($('#categoryBQuanity').val());
		var categoryBPrice   = removeCommas($('#categoryBPrice').val());
		var totalBQuantity = categoryBQuanity * categoryBPrice;

		var categoryAQuanity = removeCommas($('#categoryAQuanity').val());
		var categoryAPrice   = removeCommas($('#categoryAPrice').val());
		var totalAQuantity = categoryAQuanity * categoryAPrice;

		if(totalAQuantity != 0)
		{
			total = totalAQuantity + totalBQuantity;
		}

		$('#totalBQuantity').html('');
		$('#totalBQuantity').append(`${categoryBQuanity} Maan (x) ${categoryBPrice} Per Mann = ${totalBQuantity} Rs`);
		$('input[name=totalBQuantity]').val(totalBQuantity);
		$('#total').show();
		$('#total').html('');
		$('#total').append(`${total} Rs`);
		$('#totalAmount').val(total);
		$('#total-amount-cat-AaB').show();
		$('#total-amount-cat-AaB').html('');
		$('#total-amount-cat-AaB').html(withDecimalOnlyWords(total));
	
	});	
</script>
</html>
