<!DOCTYPE html>
<html lang="en-US">
<head>
  <title><?=$headTittle?></title>
  <?php $this->load->view('includes/header-includes'); ?>
</head>
<body class="dashbaord-body">
  <!-- left menu -->
  <?php $this->load->view('includes/left-menu'); ?>

  <div class="dashboard-content">


    <div class="row property-boxes" hidden>
      <div class="col-lg-3 col-md-6">
        <div class="property-info-inline">
          <div class="img-wrapper">
            <img src="assets/images/wallet-orange.svg" alt="" />
          </div>
          <h4>Current Balance</h4>
          <div class="amount">2.33M AED</div>
          <div class="statistics">
            This Month
            <span class="orange-light">12.5%</span>
            <img src="assets/images/up-arrow-light-orange.svg" alt="" />
          </div>
        </div>
      </div>
    </div>

    <?php if($this->session->flashdata('success_message')){ ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo $this->session->flashdata('success_message'); ?>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-md-12 mb-4">
        <a href="<?=base_url('manage-factory/'.$seasonId)?>" class="mr-2 bg-dark" style="padding: 5px;float: left">
          <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
        </a>
        <h3 style="display: inline;">Managing (Kargal <?=$season?>) This Season Total (<?=numberFormat($sum) .'Rs'?>)</h3>
      </div>
    </div>



    <div class="row bg-white mb-3" id="expense-detail-section" <?php if($this->session->userdata('credential-switcher') == 'gardens'){ echo "style='display:none'"; } ?> hidden>
      <div class="col-md-12" style="padding: 10px 10px">
        <h2 class="text-center"><strong>Total Expenses = </strong> <?=$totalExpenses == ''?0:numberFormat($totalExpenses)?> Rs</h2>
      </div>
      <div class="col-md-4 text-center">
        <h4><strong> Transport: </strong> <?=$expenseStatistics->totalTransaport==''?0:numberFormat($expenseStatistics->totalTransaport)?> Rs</h4>
      </div>
      <div class="col-md-4 text-center">
        <h4><strong> Labour: </strong> <?=$expenseStatistics->totalLabour==''?0:numberFormat($expenseStatistics->totalLabour)?> Rs</h4>
      </div>
      <div class="col-md-4 text-center mb-4">
        <h4><strong> Other: </strong> <?=$expenseStatistics->totalOther==''?0:numberFormat($expenseStatistics->totalOther)?> Rs</h4>
      </div>
    </div>

    <div class="row mt-2" id="kargal">
      <div class="col-md-12">
        <h4 class="text-center bg-dark" style="color:white">Manage Kargal</h4>
      </div>
      <div class="col-md-12">
        <?php if($this->session->flashdata('success_add_kargal')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_add_kargal'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('global_delete_message_kargal')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_kargal'); ?>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-3" id="addKargal" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
        <h3>Add Kargal</h3>
        <form method="post" action="<?=base_url('factory/addKargal')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <label>Date</label>
          <input type="text" name="date" class="form-control date-masking" />
          <label>Quantity</label>
          <input type="text" name="quantity" oninput="seprator(this); withDecimal(this.value, 'add-kargal-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="add-kargal-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Amount</label>
          <input type="text" name="perAmount" oninput="seprator(this); withDecimal(this.value, 'edit-kargal-amount')" class="form-control" placeholder="Enter amount" /> 
          <span id="edit-kargal-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Add Kargal</button>
        </form>
      </div>

      <div class="col-md-3" id="editKargal" style="background: rgb(255 247 153);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
        <h3>Edit Patti Expense</h3>
        <form method="post" action="<?=base_url('factory/editKargal')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="hidden" name="kargalId" id="kargalIdEdit" value="">
          <input type="hidden" name="url" id="url_kargal" value="">
          <label>Expense Date</label>
          <input type="text" name="date" id="dateKargalEdit" class="form-control date-masking" />
          <label>Quantity 10KG Cotton</label>
          <input type="text" name="quantity" id="quantityKargalEdit" oninput="seprator(this); withDecimal(this.value, 'edit-kargal-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="edit-kargal-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Per Price</label>
          <input type="text" name="perAmount" id="perAmountKargalEdit" oninput="seprator(this); withDecimal(this.value, 'edit-kargal-amount')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="edit-kargal-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Edit Kargal</button>
        </form>
      </div>
      <div class="col-md-9">
        <table class="table table-bordered table-sm datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Quantity</th>
              <th>Per Amount</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-striped">
            <?php
            if(count($kargals)==0)
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
              foreach($kargals as $kargal):
                ?>
                <tr id="kargal_row_<?=$kargal->id?>"
                <?php if($kargal->id == $this->session->userdata('updated-kargal'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
                >
                <td><?php echo $count;?></td>
                <td><?=dateConvertDMY($kargal->date)?></td>
                <td><?=numberFormat($kargal->quantity)?></td>
                <td><?=numberFormat($kargal->perAmount)?></td>
                <td><?=numberFormat($kargal->total)?></td>
                <td>
                  <a href="" class="bg-dark mb-1 editKargal" this-id="<?=$kargal->id?>" this-url="<?=$url?>">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/kargal/'.$kargal->id.'/'.$url.'/kargal')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            endforeach;
            $this->session->unset_userdata('updated-kargal');
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
<script>





$('.editKargal').click(function(e){
e.preventDefault();
$('tr').removeClass('activeForEdit');
var kargalId = $(this).attr('this-id');
var link      = $(this).attr('this-url');
var table = 'kargal';
  $.ajax({              //request ajax
    type: "POST",
    url: "<?=base_url('CommonController/getRecord')?>", 
    data: {id:kargalId,table:table},
    dataType: "json",
    success: function(response) 
    {
      $('#addKargal').hide();
      $('#editKargal').show();
      $('#kargalIdEdit').val(kargalId);
      $('#dateKargalEdit').val(response.data.date);
      $('#quantityKargalEdit').val(response.data.quantity);
      $('#perAmountKargalEdit').val(response.data.perAmount);
      $('#perAmountKargalEdit').focus();
      $('#url_kargal').val(link);
      $('#kargal_row_'+kargalId).addClass('activeForEdit');

    },
    error: function()
    {
      console.log('ERROR');
    }
  });
});

//REFRESH BACK AND SCROLL TO SAME LOCATION
document.addEventListener("DOMContentLoaded", function(event) { 
	var scrollpos = localStorage.getItem('scrollpos');
	if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
	localStorage.setItem('scrollpos', window.scrollY);
};
</script>
</body>
</html>