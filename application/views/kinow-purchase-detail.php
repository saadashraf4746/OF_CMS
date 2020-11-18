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
				<a href="<?=base_url('manage-purchases')?>" class="mr-2 float-left bg-dark" style="padding: 5px;display: inline">
					<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
				</a>
				<ul class="breadcrumb-realestate" style="float: <?=$float?>;display: inline">
					<li><a href="<?=base_url('/')?>">Home</a></li>
					<li class="active"><?=$headTittle?></li>
				</ul>
				<?php
				if($kinowPurchasesByGardenStatictics->isCompleted == 0)
				{
					?>
					<a href="<?=base_url('factory/changeStatus/'.$gardenId)?>" class="btn btn-warning float-right mb-2" style="padding: 5px; display: inline" >
						Complete
					</a>
					<?php
				}
				else
				{
					?>
					<p class="float-right" style="background: black;color: white;padding: 8px;border:1px solid;border-radius: 8px">Completed</p>
					<?php
				}
				?>
			</div>
		</div>

		<div class="row mb-3 mt-2">
			<div class="col-md-12">
				<h3 class="bg-dark text-center text-white">Kinow Purchasing Detail (<?=$kinowPurchasesByGardenStatictics->gardenLocation.') '.$kinowPurchasesByGardenStatictics->landlordName?></h3>
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
		<div class="row">
			<div class="col-md-12">
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
							<td><strong>Total Maan</strong></td>
							<td><?=numberFormat($kinowPurchasesByGardenStatictics->totalQuantityInMaan)?></td>
						</tr>
						<tr>
							<td><strong>Category A Total</strong></td>
							<td><?=numberFormat($kinowPurchasesByGardenStatictics->totalACategory)?></td>
						</tr>
						<tr>
							<td><strong>Category B Total</strong></td>
							<td><?=numberFormat($kinowPurchasesByGardenStatictics->totalBCategory)?></td>
						</tr>
						<tr>
							<td><strong>Total Amount</strong></td>
							<td><?=numberFormat($kinowPurchasesByGardenStatictics->totalPrice)?> Rs</td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<br>
		</div>

		<div class="add-property-form-container">
			<?php if($this->session->flashdata('success-add-edit-kinow-again')){ ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<?php echo $this->session->flashdata('success-add-edit-kinow-again'); ?>
				</div>
			<?php } ?>

			<div id="add-purchasing-kinow"  style="background: rgb(244 255 157);padding: 14px;border: 1px solid #f5ff5b;border-radius: 8px;"
			<?php if($kinowPurchasesByGardenStatictics->isCompleted == 1){ echo 'hidden'; } ?>>
				<h4 class="text-center bg-dark" style="color:white">Add Kinow Purchasing</h4>
				<form action="<?=base_url('factory/purchaseKinowAgain')?>" method="post" id="gardenAddEdit">
					<input type="hidden" name="seasonId" value="<?=$seasonId?>">
					<input type="hidden" name="gardenId" value="<?=$gardenId?>">
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
								<input readonly type="text" name="totalAmount" id="totalAmount" class="form-control numeric-masking" /> 
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

			<div id="edit-purchasing-kinow"  style="background: rgb(245 197 174);padding: 14px;border: 1px solid #ffceaa;border-radius: 8px;display: none">
				<h4 class="text-center bg-dark" style="color:white">Edit Kinow Purchas Record</h4>
				<form action="<?=base_url('factory/editPurchaseKinow')?>" method="post" id="gardenAddEdit">
					<input type="hidden" name="recordId" id="recordId">
					<input type="hidden" name="url" id="url_edit_record">
					<input type="hidden" name="gardenId" value="<?=$gardenId?>">
					<div class="row">
						<div class="col-md-12">
							<div id="statisticsAreaEdit" class="bg-white p-3 mb-2">
								<strong class="ml-5">Kinow Maan: </strong><span id="kinowMaanEdit">x</span>
								<br/>
								<br/>
								<strong class="ml-5">Category A: </strong><span id="totalAQuantityEdit">x</span>
								<br/>
								<br/>
								<strong class="ml-5">Category B: </strong><span id="totalBQuantityEdit">x</span>
								<br/>
								<br/>
								<strong class="ml-5">Total: </strong><span id="totalEdit" style="display: none"></span>

							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Set QUantity In Maan</label>
								<input type="text" name="quantityInMaan" id="quantityInMaanEdit" class="form-control numeric-masking" placeholder="Enter quantity in Maan" /> 
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Set A Category</label>
								<input type="text" name="categoryAQuanity" id="categoryAQuanityEdit" class="form-control" placeholder="Enter Quantity" /> 
								<input type="text" name="categoryAPrice" id="categoryAPriceEdit" oninput="seprator(this); withDecimal(this.value, 'kinow-purchase-catA-price-edit')" class="form-control" placeholder="Enter Price Per Maan" /> 
								<span id="kinow-purchase-catA-price-edit" style="color:black;font-weight: bold;display: none"></span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Set B Category</label>
								<input type="text" name="categoryBQuanity" id="categoryBQuanityEdit" class="form-control" placeholder="Enter Quantity" /> 
								<input type="text" name="categoryBPrice" id="categoryBPriceEdit" oninput="seprator(this); withDecimal(this.value, 'kinow-purchase-catB-price-edit')" class="form-control" placeholder="Enter Price Per Maan" /> 
								<span id="kinow-purchase-catB-price-edit" style="color:black;font-weight: bold;display: none"></span>
							</div>
						</div>

						<div class="col-md-12 col-sm-6">
							<div class="form-group">
								<label>Total</label>
								<input readonly type="text" name="totalAmount" id="totalAmountEdit" class="form-control" /> 
								<span id="total-amount-cat-AaB-edit" style="color:black;font-weight: bold;display: none"></span>
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

		<div class="row mt-5">
			<div class="col-md-12">
				<?php if($this->session->flashdata('global_delete_message_kinow_purchase')){ ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<?php echo $this->session->flashdata('global_delete_message_kinow_purchase'); ?>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
			<h4 class="text-center bg-dark" style="color:white">Kinow Purchasing List</h4>
			<table class="table table-bordered table-sm datatable">
				<thead class="bg-white">
					<tr>
						<th>#</th>
						<th>Purchase Date</th>
						<th>Maan</th>
						<th>Category A Detail</th>
						<th>Category B Detail</th>
						<th>Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php
					if(count($kinowPurchases)==0)
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
						</tr>
						<?php
					}
					else
					{
						$count = 1;
						foreach($kinowPurchases as $purchase):
							?>
							<tr id="kinow_purchase_list_<?=$purchase->id?>"
								<?php if($purchase->id == $this->session->userdata('add-edit-kinow-again'))
								{ 
									echo 'class="recentlyUpdated"';
								}
								?>
								>
								<td><?php echo $count;?></td>
								<td><?=dateConvertDMY($purchase->purchaseOn)?></td>
								<td><?=numberFormat($purchase->quantityInMaan);?></td>
								<td>
									<?='<strong style="color: #f7b148; font-weight: bold">Quantity: </strong>'.numberFormat($purchase->categoryAQuanity).'<br/><strong style="color: #f7b148; font-weight: bold">Per Price: </strong>'.numberFormat($purchase->categoryAPrice)?> Rs
								</td>
								<td>
									<?='<strong style="color: #f7b148; font-weight: bold">Quantity: </strong>'.numberFormat($purchase->categoryBQuantity).'<br/><strong style="color: #f7b148; font-weight: bold">Per Price: </strong>'.numberFormat($purchase->categoryBPrice)?> Rs
								</td>
								<td><?=numberFormat($purchase->totalPrice);?> Rs</td>
								<td>
									<a href="" class="bg-dark editPurchasingRecord" this-id="<?=$purchase->id?>" this-url="<?=$url?>" this-scroll="yes" this-scroll-id="#edit-purchasing-kinow">
										<i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
									</a>
									<a data-href="<?=base_url('CommonController/GLOBAL_DELETE/kinow_purchasing/'.$purchase->id.'/'.$url.'/kinow_purchase')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
										<i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
									</a>
								</td>
								<?php
								$count++;
							endforeach;
						}
						$this->session->unset_userdata('add-edit-kinow-again');
						?>
					</tbody>
				</table>
				</div>
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

// ADD PURCHASE KINOW AGAIN
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

//EDIT RECORD
$('#quantityInMaanEdit').on('keyup', function(){
	var quantity     = $(this).val();
	$('#kinowMaanEdit').html('');
	$('#kinowMaanEdit').append(`${quantity}`);
});
$('#categoryAQuanityEdit, #categoryAPriceEdit').on('keyup', function(){
	var categoryAQuanityEdit = removeCommas($('#categoryAQuanityEdit').val());
	var categoryAPriceEdit   = removeCommas($('#categoryAPriceEdit').val());
	var totalAQuantityEdit   = categoryAQuanityEdit * categoryAPriceEdit;

	var categoryBQuanityEdit = removeCommas($('#categoryBQuanityEdit').val());
	var categoryBPriceEdit   = removeCommas($('#categoryBPriceEdit').val());
	var totalBQuantityEdit = categoryBQuanityEdit * categoryBPriceEdit;

	if(totalBQuantityEdit != 0)
	{
		var totalEdit = totalAQuantityEdit + totalBQuantityEdit;
	}

	$('#totalAQuantityEdit').html('');
	$('#totalAQuantityEdit').append(`${categoryAQuanityEdit} Maan (x) ${categoryAPriceEdit} Per Mann = ${totalAQuantityEdit} Rs`);
	$('input[name=totalAQuantity]').val(totalAQuantityEdit);
	$('#totalEdit').show();
	$('#totalEdit').html('');
	$('#totalEdit').append(`${totalEdit} Rs`);
	$('#total-amount-cat-AaB-edit').show();
	$('#total-amount-cat-AaB-edit').html('');
	$('#total-amount-cat-AaB-edit').html(withDecimalOnlyWords(totalEdit));
	$('#totalAmountEdit').val(totalEdit);
});	
$('#categoryBQuanityEdit, #categoryBPriceEdit').on('keyup', function(){

	var categoryBQuanityEdit = removeCommas($('#categoryBQuanityEdit').val());
	var categoryBPriceEdit   = removeCommas($('#categoryBPriceEdit').val());
	var totalBQuantityEdit = categoryBQuanityEdit * categoryBPriceEdit;

	var categoryAQuanityEdit = removeCommas($('#categoryAQuanityEdit').val());
	var categoryAPriceEdit   = removeCommas($('#categoryAPriceEdit').val());
	var totalAQuantityEdit = categoryAQuanityEdit * categoryAPriceEdit;

	if(totalAQuantityEdit != 0)
	{
		var totalEdit = totalAQuantityEdit + totalBQuantityEdit;
	}

	$('#totalBQuantityEdit').html('');
	$('#totalBQuantityEdit').append(`${categoryBQuanityEdit} Maan (x) ${categoryBPriceEdit} Per Mann = ${totalBQuantityEdit} Rs`);
	$('input[name=totalBQuantity]').val(totalBQuantityEdit);
	$('#totalEdit').show();
	$('#totalEdit').html('');
	$('#totalEdit').append(`${totalEdit} Rs`);
	$('#totalAmountEdit').val(totalEdit);
	$('#total-amount-cat-AaB-edit').show();
	$('#total-amount-cat-AaB-edit').html('');
	$('#total-amount-cat-AaB-edit').html(withDecimalOnlyWords(totalEdit));

});	
//Fetch record and set values
$('.editPurchasingRecord').click(function(e){
  e.preventDefault();
  $('tr').removeClass('activeForEdit');

  var scroll = $(this).attr('this-scroll');
  var scroll_id = $(this).attr('this-scroll-id');
  var recordId = $(this).attr('this-id');
  var link      = $(this).attr('this-url');
  var table = 'kinow_purchasing';
  // console.log(paymentId+' '+link+' '+table );
  $.ajax({              //request ajax
    type: "POST",
    url: "<?=base_url('CommonController/getRecord')?>", 
    data: {id:recordId,table:table},
    dataType: "json",
    success: function(response) 
    {        	
		$('#add-purchasing-kinow').hide();
		$('#edit-purchasing-kinow').show();
		$('#recordId').val(recordId);
		$('#kinowMaanEdit').html('');
		$('#kinowMaanEdit').append(`${response.data.quantityInMaan}`);

		$('#totalAQuantityEdit').html('');
		$('#totalAQuantityEdit').append(`${response.data.categoryAQuanity} Maan (x) ${response.data.categoryAPrice} Per Mann = ${response.data.categoryAQuanity * response.data.categoryAPrice} Rs`);

		$('#totalBQuantityEdit').html('');
		$('#totalBQuantityEdit').append(`${response.data.categoryBQuantity} Maan (x) ${response.data.categoryBPrice} Per Mann = ${response.data.categoryBQuantity * response.data.categoryBPrice} Rs`);

		$('#totalEdit').show();
		$('#totalEdit').html('');
		$('#totalEdit').append(`${response.data.totalPrice} Rs`);

		$('#quantityInMaanEdit').val(response.data.quantityInMaan);
		$('#quantityInMaanEdit').focus();
		$('#categoryAQuanityEdit').val(response.data.categoryAQuanity);
		$('#categoryAPriceEdit').val(response.data.categoryAPrice);
		$('#categoryBQuanityEdit').val(response.data.categoryBQuantity);
		$('#categoryBPriceEdit').val(response.data.categoryBPrice);
		$('#totalAmountEdit').val(response.data.totalPrice);
		$('#url_edit_record').val(link);
		$('#kinow_purchase_list_'+recordId).addClass('activeForEdit');

		if (typeof scroll !== typeof undefined && scroll !== false) {
			$('html, body').animate({
			scrollTop: $(scroll_id).offset().top
			}, 500);
		}
    },
    error: function()
    {
      console.log('ERROR');
    }
  });
});
</script>
</html>