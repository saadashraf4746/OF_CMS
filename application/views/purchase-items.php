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
				<a href="<?=base_url('manage-purchases/supplier-detail/'.$supplierId)?>" class="mr-2 float-left bg-dark" style="padding: 5px">
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
				<h3 class="bg-dark text-center text-white"><?=$this->lang->line('purchase_items')?></h3>
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
				<div class="col-md-3" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Bardana</h3>
						<span id="bardanaAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseBardana" method="POST" action="<?=base_url('factory/purchaseBardana')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							
							<label class="mt-2">4 Phati</label>
							<input type="text" name="charPathiQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="charPathiAmount" oninput="seprator(this); withDecimal(this.value, 'purchase-4pathi')" class="form-control" placeholder="Enter Amount">
              <span id="purchase-4pathi" style="color:black;font-weight: bold;display: none"></span>
							<span id="charPathiTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							
							<label class="mt-2">5 Phati</label>
							<input type="text" name="panchPathiQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="panchPathiAmount" oninput="seprator(this); withDecimal(this.value, 'purchase-5pathi')" class="form-control" placeholder="Enter Amount">
              <span id="purchase-5pathi" style="color:black;font-weight: bold;display: none"></span>
							<span id="panchPathiTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							
							<label class="mt-2">6 Phati</label>
							<input type="text" name="sheyPathiQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="sheyPathiAmount" oninput="seprator(this); withDecimal(this.value, 'purchase-6pathi')" class="form-control" placeholder="Enter Amount">
              <span id="purchase-6pathi" style="color:black;font-weight: bold;display: none"></span>
							<span id="sheyPathiTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							
							<label class="mt-2">Total</label>
							<input readonly type="text" name="bardanaTotalAmount" class="form-control" placeholder="Total">
              <span id="baradana-total" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
				</div>

				<div class="col-md-3" style="background: #f09dff;padding: 14px;border: 1px solid #ffd3fa;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Radi</h3>
						<span id="radiAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseRadi" method="POST" action="<?=base_url('factory/purchaseRadi')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							
							<label class="mt-2">Radi Quantity, Amount</label>
							<input type="text" name="radiQuantity" class="form-control numeric-masking" placeholder="Enter radi quanity in KG">
							<input type="text" name="radiAmount" oninput="seprator(this); withDecimal(this.value, 'radi-amount')" class="form-control" placeholder="Enter amount">
              <span id="radi-amount" style="color:black;font-weight: bold;display: none"></span>
							<label class="mt-2">Total</label>
							<input readonly type="text" name="radiTotalAmount" class="form-control" placeholder="Total">
              <span id="total-radi-amount" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
				</div>

				<div class="col-md-3" style="background: #f9b5bb;padding: 14px;border: 1px solid #fbd6f7;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Keel</h3>
						<span id="keelAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseKeel" method="POST" action="<?=base_url('factory/purchaseKeel')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />

							<label class="mt-2">Number Of Bori, Amount</label>
							<input type="text" name="boriQuantity" class="form-control numeric-masking" placeholder="Enter quantity">
							<input type="text" name="boriAmount" oninput="seprator(this); withDecimal(this.value, 'keel-amount')" class="form-control" placeholder="Enter amount">
              <span id="keel-amount" style="color:black;font-weight: bold;display: none"></span>
							<label class="mt-2">Total</label>
							<input readonly type="text" name="keelTotalAmount" class="form-control" placeholder="Total">
              <span id="tota-keel-amount" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
				</div>

				<div class="col-md-3" style="background: #b5f9b7;padding: 14px;border: 1px solid #d8fbd6;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Sticker</h3>
						<span id="stickerAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseSticker" method="POST" action="<?=base_url('factory/purchaseSticker')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							
							<label class="mt-2">Sticker Pieces, Amount</label>
							<input type="text" name="stickerQuantity" class="form-control numeric-masking" placeholder="Enter quantity">
							<input type="text" name="stickerAmount" class="form-control" oninput="seprator(this); withDecimal(this.value, 'sticker-amount')" placeholder="Enter amount">
              <span id="sticker-amount" style="color:black;font-weight: bold;display: none"></span>
							<label class="mt-2">Total</label>
							<input readonly type="text" name="stickerTotalAmount" class="form-control" placeholder="Total">
              <span id="total-sticker-amount" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
				</div>

			</div>

			<div class="row mt-3">
				<div class="col-md-12">
					<?php if($this->session->flashdata('success_purchase_second')){ ?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<?php echo $this->session->flashdata('success_purchase_second'); ?>
						</div>
					<?php } ?>
				</div>
				<div class="col-md-3" style="background: #ccb6b8;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Sheet</h3>
						<span id="sheetAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseSheet" method="POST" action="<?=base_url('factory/purchaseSheet')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							
							<label class="mt-2">2 Ply</label>
							<input type="text" name="doPlyQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="doPlyAmount" oninput="seprator(this); withDecimal(this.value, 'doPly-sheet')" class="form-control" placeholder="Enter Amount">
              <span id="doPly-sheet" style="color:black;font-weight: bold;display: none"></span>
							<span id="doPlyTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							<label class="mt-2">3 Ply</label>
							<input type="text" name="teenPlyQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="teenPlyAmount" oninput="seprator(this); withDecimal(this.value, 'teenPly-sheet')" class="form-control" placeholder="Enter Amount">
              <span id="teenPly-sheet" style="color:black;font-weight: bold;display: none"></span>
							<span id="teenPlyTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							
							<label class="mt-2">5 Ply</label>
							<input type="text" name="panchPlyQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="panchPlyAmount" oninput="seprator(this); withDecimal(this.value, 'panchPly-sheet')" class="form-control" placeholder="Enter Amount">
              <span id="panchPly-sheet" style="color:black;font-weight: bold;display: none"></span>
							<span id="panchPlyTotal" style="color: black;font-weight: bold; display: none"></span><br/>
							<label class="mt-2">Total</label>
							<input readonly type="text" name="sheetTotalAmount" class="form-control" placeholder="Total">
              <span id="sheet-total-amount" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
				</div>

				<div class="col-md-3" style="background: #f7ffb5;padding: 14px;border: 1px solid #f7fbb7;border-radius: 8px;">
					<div id="addForemanPayment">
						<h3 class="text-center">Cotton</h3>
						<span id="cottonAtleastOne" style="color: red; display: none"></span>
						<form id="purchaseCotton" method="POST" action="<?=base_url('factory/purchaseCotton')?>">
							<input type="hidden" name="seasonId" value="<?=$seasonId?>">
							<input type="hidden" name="supplierId" value="<?=$supplierId?>">
							<label>Purchase Date</label>
							<input type="text" name="purchaseDate" value="<?=todayDate();?>" class="form-control date-masking" />
							<label class="mt-2">Cotton Piece, Amount</label>
							<input type="text" name="cottonQuantity" class="form-control numeric-masking" placeholder="Enter Quantity">
							<input type="text" name="cottonAmount" class="form-control" oninput="seprator(this); withDecimal(this.value, 'cotton-amount')" placeholder="Enter amount">
              <span id="cotton-amount" style="color:black;font-weight: bold;display: none"></span>
							<label class="mt-2">Total</label>
							<input readonly type="text" name="cottonTotalAmount" class="form-control" placeholder="Total">
              <span id="total-cotton-amount" style="color:black;font-weight: bold;display: none"></span>
							<button class="btn btn-small btn-warning mt-2" type="submit">Purchase</button>
						</form>
					</div>
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
//bardana
$(function () {
  $("#purchaseBardana").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#bardanaAtleastOne').show();
      $('#bardanaAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#bardanaAtleastOne').hide();
      return true;
    }
  });
});
//Radi
$(function () {
  $("#purchaseRadi").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#radiAtleastOne').show();
      $('#radiAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#radiAtleastOne').hide();
      return true;
    }
  });
});
//Keel
$(function () {
  $("#purchaseKeel").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#keelAtleastOne').show();
      $('#keelAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#keelAtleastOne').hide();
      return true;
    }
  });
});
//Sticker
$(function () {
  $("#purchaseSticker").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#stickerAtleastOne').show();
      $('#stickerAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#stickerAtleastOne').hide();
      return true;
    }
  });
});
//Sticker
$(function () {
  $("#purchaseSticker").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#stickerAtleastOne').show();
      $('#stickerAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#stickerAtleastOne').hide();
      return true;
    }
  });
});
//Sheet
$(function () {
  $("#purchaseSheet").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#sheetAtleastOne').show();
      $('#sheetAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#sheetAtleastOne').hide();
      return true;
    }
  });
});
//Cotton
$(function () {
  $("#purchaseCotton").submit(function () {
    if ($("input[type=text]").filter(function () {
      return $(this).val().trim().length > 0;
    }).length == 0)
    {
      $('#cottonAtleastOne').show();
      $('#cottonAtleastOne').html('!_ Alteast one field should be filled');
      return false;
    }
    else
    {
      $('#cottonAtleastOne').hide();
      return true;
    }
  });
});

//VALIDATIOn
    $('#purchaseBardana').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        charPathiQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=charPathiAmount]').val().length > 0;
    		}
        },
        charPathiAmount:
        {
    		required:function()
    		{
    			return $('input[name=charPathiQuantity]').val().length > 0;
    		}
        },
        panchPathiQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=panchPathiAmount]').val().length > 0;
    		}
        },
        panchPathiAmount:
        {
    		required:function()
    		{
    			return $('input[name=panchPathiQuantity]').val().length > 0;
    		}
        },
        sheyPathiQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=sheyPathiAmount]').val().length > 0;
    		}
        },
        sheyPathiAmount:
        {
    		required:function()
    		{
    			return $('input[name=sheyPathiQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        charPathiQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        charPathiAmount:
        {
    		required:"Please Enter Amount"
        },
        panchPathiQuantity: 
        {
			required:"Please Enter Quantity"
        },
        panchPathiAmount:
        {
			required:"Please Enter Amount"
        },
        sheyPathiQuantity: 
        {
 			required:"Please Enter Quantity"
        },
        sheyPathiAmount:
        {
			required:"Please Enter Amount"
        }
      }
    });
//VALIDATIOn
    $('#purchaseRadi').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        radiQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=radiAmount]').val().length > 0;
    		}
        },
        radiAmount:
        {
    		required:function()
    		{
    			return $('input[name=radiQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        radiQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        radiAmount:
        {
    		required:"Please Enter Amount"
        }
      }
    });
//VALIDATIOn
    $('#purchaseKeel').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        boriQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=boriAmount]').val().length > 0;
    		}
        },
        boriAmount:
        {
    		required:function()
    		{
    			return $('input[name=boriQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        boriQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        boriAmount:
        {
    		required:"Please Enter Amount"
        }
      }
    });
//VALIDATIOn
    $('#purchaseSticker').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        stickerQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=stickerAmount]').val().length > 0;
    		}
        },
        stickerAmount:
        {
    		required:function()
    		{
    			return $('input[name=stickerQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        stickerQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        stickerAmount:
        {
    		required:"Please Enter Amount"
        }
      }
    });
//VALIDATIOn
    $('#purchaseCotton').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        cottonQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=cottonAmount]').val().length > 0;
    		}
        },
        cottonAmount:
        {
    		required:function()
    		{
    			return $('input[name=cottonQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        cottonQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        cottonAmount:
        {
    		required:"Please Enter Amount"
        }
      }
    });
//VALIDATIOn
    $('#purchaseSheet').validate({
      errorElement: "span",
      errorClass: "error",
      rules: 
      {
        doPlyQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=doPlyAmount]').val().length > 0;
    		}
        },
        doPlyAmount:
        {
    		required:function()
    		{
    			return $('input[name=doPlyQuantity]').val().length > 0;
    		}
        },
        teenPlyQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=teenPlyAmount]').val().length > 0;
    		}
        },
        teenPlyAmount:
        {
    		required:function()
    		{
    			return $('input[name=teenPlyQuantity]').val().length > 0;
    		}
        },
        panchPlyQuantity: 
        {
    		required:function()
    		{
    			return $('input[name=panchPlyAmount]').val().length > 0;
    		}
        },
        panchPlyAmount:
        {
    		required:function()
    		{
    			return $('input[name=panchPlyQuantity]').val().length > 0;
    		}
        }
      },
      messages:
      {
        doPlyQuantity: 
        {
    		required:"Please Enter Quantity"
        },
        doPlyAmount:
        {
    		required:"Please Enter Amount"
        },
        teenPlyQuantity: 
        {
			required:"Please Enter Quantity"
        },
        teenPlyAmount:
        {
			required:"Please Enter Amount"
        },
        panchPlyQuantity: 
        {
 			required:"Please Enter Quantity"
        },
        panchPlyAmount:
        {
			required:"Please Enter Amount"
        }
      }
    });

 $('input[name=radiQuantity], input[name=radiAmount]').on('keyup', function(){
 	var quantity = $('input[name=radiQuantity]').val().replace(/,/g, '');
 	var amount   = $('input[name=radiAmount]').val().replace(/,/g, '');
 	var final = quantity*amount;
 	if(final != 0)
  $('input[name=radiTotalAmount]').val(final);
  $('#total-radi-amount').show();
  $('#total-radi-amount').html('');
 	$('#total-radi-amount').html(withDecimalOnlyWords(final));
 });

 $('input[name=boriQuantity], input[name=boriAmount]').on('keyup', function(){
 	var quantity = $('input[name=boriQuantity]').val().replace(/,/g, '');
 	var amount   = $('input[name=boriAmount]').val().replace(/,/g, '');
 	var final = quantity*amount;
 	if(final != 0)
  $('input[name=keelTotalAmount]').val(final);
  $('#tota-keel-amount').show();
  $('#tota-keel-amount').html('');
  $('#tota-keel-amount').html(withDecimalOnlyWords(final));
 });

 $('input[name=stickerQuantity], input[name=stickerAmount]').on('keyup', function(){
 	var quantity = $('input[name=stickerQuantity]').val().replace(/,/g, '');
 	var amount   = $('input[name=stickerAmount]').val().replace(/,/g, '');
 	var final = quantity*amount;
 	if(final != 0)
  $('input[name=stickerTotalAmount]').val(final);
  $('#total-sticker-amount').show();
  $('#total-sticker-amount').html('');
  $('#total-sticker-amount').html(withDecimalOnlyWords(final));
 });

 $('input[name=cottonQuantity], input[name=cottonAmount]').on('keyup', function(){
 	var quantity = $('input[name=cottonQuantity]').val().replace(/,/g, '');
 	var amount   = $('input[name=cottonAmount]').val().replace(/,/g, '');
 	var final = quantity*amount;
 	if(final != 0)
 	$('input[name=cottonTotalAmount]').val(final);
  $('#total-cotton-amount').show();
  $('#total-cotton-amount').html('');
  $('#total-cotton-amount').html(withDecimalOnlyWords(final));
 });

 $('input[name=charPathiQuantity], input[name=charPathiAmount], input[name=panchPathiQuantity], input[name=panchPathiAmount], input[name=sheyPathiQuantity], input[name=sheyPathiAmount]').on('keyup', function(){
 	var charQuantity = $('input[name=charPathiQuantity]').val().replace(/,/g, '');
 	var charAmount   = $('input[name=charPathiAmount]').val().replace(/,/g, '');
 	var panchQuantity= $('input[name=panchPathiQuantity]').val().replace(/,/g, '');
 	var panchAmount   = $('input[name=panchPathiAmount]').val().replace(/,/g, '');
 	var sheyPathiQuantity = $('input[name=sheyPathiQuantity]').val().replace(/,/g, '');
 	var sheyPathiAmount   = $('input[name=sheyPathiAmount]').val().replace(/,/g, '');

 	if((charQuantity * charAmount) != 0)
 	{
 		$('#charPathiTotal').show();
 		$('#charPathiTotal').html('');
 		$('#charPathiTotal').html(`Total: (${charQuantity * charAmount}) ${withDecimalOnlyWords(charQuantity * charAmount)}`);
 	}
 	else
 	{
 		$('#charPathiTotal').hide();
 		$('#charPathiTotal').html('');
 	}

 	if((panchQuantity * panchAmount) != 0)
 	{
 		$('#panchPathiTotal').show();
 		$('#panchPathiTotal').html('');
 		$('#panchPathiTotal').html(`Total: (${panchQuantity * panchAmount}) ${withDecimalOnlyWords(panchQuantity * panchAmount)}`);
 	}
 	else
 	{
 		$('#panchPathiTotal').hide();
 		$('#panchPathiTotal').html('');
 	}

  	if((sheyPathiQuantity * sheyPathiAmount) != 0)
 	{
 		$('#sheyPathiTotal').show();
 		$('#sheyPathiTotal').html('');
 		$('#sheyPathiTotal').html(`Total: (${sheyPathiQuantity * sheyPathiAmount}) ${withDecimalOnlyWords(sheyPathiQuantity * sheyPathiAmount)}`);
 	}
 	else
 	{
 		$('#sheyPathiTotal').hide();
 		$('#sheyPathiTotal').html('');
 	}

 	var final = (charQuantity * charAmount) + (panchQuantity * panchAmount) + (sheyPathiQuantity * sheyPathiAmount);
 	if(final != 0)
  $('input[name=bardanaTotalAmount]').val(final);
  $('#baradana-total').show();
  $('#baradana-total').html('');
 	$('#baradana-total').html(withDecimalOnlyWords(final));
 });

  $('input[name=doPlyQuantity], input[name=doPlyAmount], input[name=teenPlyQuantity], input[name=teenPlyAmount], input[name=panchPlyQuantity], input[name=panchPlyAmount]').on('keyup', function(){
 	var doPlyQuantity = $('input[name=doPlyQuantity]').val().replace(/,/g, '');
 	var doPlyAmount   = $('input[name=doPlyAmount]').val().replace(/,/g, '');
 	var teenPlyQuantity= $('input[name=teenPlyQuantity]').val().replace(/,/g, '');
 	var teenPlyAmount   = $('input[name=teenPlyAmount]').val().replace(/,/g, '');
 	var panchPlyQuantity = $('input[name=panchPlyQuantity]').val().replace(/,/g, '');
 	var panchPlyAmount   = $('input[name=panchPlyAmount]').val().replace(/,/g, '');

 	if((doPlyQuantity * doPlyAmount) != 0)
 	{
 		$('#doPlyTotal').show();
 		$('#doPlyTotal').html('');
 		$('#doPlyTotal').html(`Total: (${doPlyQuantity * doPlyAmount}) ${withDecimalOnlyWords(doPlyQuantity * doPlyAmount)}`);
 	}
 	else
 	{
 		$('#doPlyTotal').hide();
 		$('#doPlyTotal').html('');
 	}

 	if((teenPlyQuantity * teenPlyAmount) != 0)
 	{
 		$('#teenPlyTotal').show();
 		$('#teenPlyTotal').html('');
 		$('#teenPlyTotal').html(`Total: (${teenPlyQuantity * teenPlyAmount}) ${withDecimalOnlyWords(teenPlyQuantity * teenPlyAmount)}`);
 	}
 	else
 	{
 		$('#teenPlyTotal').hide();
 		$('#teenPlyTotal').html('');
 	}

  	if((panchPlyQuantity * panchPlyAmount) != 0)
 	{
 		$('#panchPlyTotal').show();
 		$('#panchPlyTotal').html('');
 		$('#panchPlyTotal').html(`Total: (${panchPlyQuantity * panchPlyAmount}) ${withDecimalOnlyWords(panchPlyQuantity * panchPlyAmount)}`);
 	}
 	else
 	{
 		$('#panchPlyTotal').hide();
 		$('#panchPlyTotal').html('');
 	}

 	var final = (doPlyQuantity * doPlyAmount) + (teenPlyQuantity * teenPlyAmount) + (panchPlyQuantity * panchPlyAmount);
 	if(final != 0)
 	$('input[name=sheetTotalAmount]').val(final);
  $('#sheet-total-amount').show();
  $('#sheet-total-amount').html('');
  $('#sheet-total-amount').html(withDecimalOnlyWords(final));
 });

</script>
</html>
