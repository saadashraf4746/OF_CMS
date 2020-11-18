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

    <div class="row">
      <div class="col-md-12">
        <a href="<?=base_url('manage-season/'.$seasonId)?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
         <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
       </a>
       <h3 class="text-center" style="display: inline"><?=$heading?></h3>
     </div>
   </div>
   <br>
   <div class="row">
     <div class="col-md-12">
      <h4 class="text-center bg-dark" style="color:white">Payments Details</h4>
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
            <td><stron>Total Purchased Amount</stron></td>
            <td><?=number_format($selectedGarden->purchaseAmount).' Rs';?></td>
          </tr>
          <tr>
            <td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
            <td><stron>Bayana</stron></td>
            <td><?=$selectedGarden->ifBayanaPaid==1?number_format($selectedGarden->bayana).' Rs Paid':'Not paid';?></td>
          </tr>
          <tr>
            <td hidden><a class="scroll-down" to="bayanaDiv"><i class="fa fa-arrow-down" aria-hidden="true"></i></a></td>
            <td><stron>Total Amount Paid And Remaining</stron></td>
            <td>
              <?php
              if($selectedGarden->ifBayanaPaid == 1)
              {
                echo 'Paid: '.number_format($totalPaid).' Rs (With Bayana) <br>Remaining: '.number_format($totalRemaining).' Rs';
              }
              else
              {
                echo 'Paid: '.number_format($totalPaid).' Rs (Without Bayana) <br>Remaining: '.number_format($totalRemaining).' Rs';
              }
              ?>
            </td>
          </tr>
          <tr>
            <td hidden>-</td>
            <td><stron>Total Transactions</stron></td>
            <td><?=count($installments);?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <div class="col-md-12">
      <h4 class="text-center bg-dark" style="color:white">Bayana Details</h4>
    </div>
    <div class="col-md-12">
      <?php if($this->session->flashdata('success_message_bayana')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('success_message_bayana'); ?>
        </div>
      <?php } ?>
    </div>
    <div class="col-md-3" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
      <h3>Bayana Payment</h3>
      <?php
      if($selectedGarden->ifBayanaPaid == 0)
      {
        ?>
        <form id="bayanaForm" method="POST" action="<?=base_url('seasons/payBayana')?>">
          <input type="hidden" name="gardenId" value="<?=$gardenId?>">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <label>Bayana Amount</label>
          <input type="text" id="bayanaAmount" oninput="seprator(this); withDecimal(this.value, 'add-garden-bayana')" name="bayanaAmount" class="form-control" placeholder="Enter Bayana">
          <span id="add-garden-bayana" style="color:black;font-weight: bold;display: none"></span>
          <label>Bayana Date</label>
          <input type="text" name="bayanaDate" class="form-control date-masking" /> 
          <button class="btn btn-small btn-warning mt-2" type="submit">Pay</button>
        </form>
        <?php
      }
      else
      {
        ?>
        <div class="alert alert-info">
          Bayana has been Paid.
        </div>
        <?php
      }
      ?>
    </div>
    <div class="col-md-9">
      <?php
      if($selectedGarden->ifBayanaPaid == 0)
      {
        ?>
        <div class="alert alert-info">
          Bayana not paid yet.
        </div>
        <?php
      }
      else
      {
        ?>
        <h3>Bayana Detail</h3>
        <table class="custom-table">
          <thead>
            <tr>
              <th>Bayana Date</th>
              <th>Bayana Amount</th>
              <th>Updated On</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?=dateConvertDMY($selectedGarden->bayanaDate)?></td>
              <td><?=number_format($selectedGarden->bayana)?> Rs.</td>
              <td><?=$selectedGarden->bayanaEditDate==''?'not updated':dateConvertDMY($selectedGarden->bayanaEditDate)?></td>
              <td>
                <a href="<?=base_url('season/garden-detail/'.$gardenId.'/edit/1/'.$selectedGarden->id)?>" class="bg-dark">
                  <i class="fa fa-edit" style="color: white;padding: 5px" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <?php
      }
      ?>
    </div>
    <br>
    <div class="col-md-12 mt-3">
      <h4 class="text-center bg-dark" style="color:white">Payments Transaction History</h4>
    </div>
    <div class="col-md-12">
      <?php if($this->session->flashdata('success_message_installment')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('success_message_installment'); ?>
        </div>
      <?php } ?>
      <?php if($this->session->flashdata('global_delete_message_garden_payments')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('global_delete_message_garden_payments'); ?>
        </div>
      <?php } ?>
    </div>
    <div class="col-md-3" style="margin-bottom:5px;background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
      <h3>Add Installment</h3>
      <form id="installmentForm" method="POST" action="<?=base_url('seasons/payInstallment')?>">
        <input type="hidden" name="gardenId" value="<?=$gardenId?>">
        <input type="hidden" name="seasonId" value="<?=$seasonId?>">
        <label>Installment Date</label>
        <input type="text" name="installmentDate" class="form-control date-masking" />
        <label>Installment Amount</label>
        <input type="text" id="installmentAmount" name="installmentAmount" class="form-control" oninput="seprator(this); withDecimal(this.value, 'add-garden-payment')" placeholder="Enter installment Amount">
        <span id="add-garden-payment" style="color:black;font-weight: bold;display: none"></span>
        <label>Installment Description</label>
        <textarea name="paymentDescription" class="form-control" placeholder="Enter installment description" /></textarea>
        <label>Next Installment Date</label>
        <input type="text" name="nextInstallmentDate" class="form-control date-masking" />
        <button class="btn btn-small btn-warning mt-2" type="submit">Pay Installment</button>
      </form>
    </div>
    <div class="col-md-9">
      <table class="table table-bordered table-sm datatable">
        <thead class="bg-white">
          <tr>
            <th>Sr No.</th>
            <th>Payment Date</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Updated On</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          <?php
          if(count($installments)==0)
          {
            ?>
            <tr>
              <td>No installment yet.</td>
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
            foreach($installments as $installment):
              ?>
              <tr>
                <td><?php echo $count;?></td>
                <td><?=dateConvertDMY($installment->paymentDate)?></td>
                <td><?=$installment->paymentDescription;?></td>
                <td><?=number_format($installment->amount);?> Rs.</td>
                <td><?=$installment->updatedOn==''?'not updated':dateConvertDMY($installment->updatedOn)?></td>
                <td>
                  <a href="<?=base_url('season/garden-detail/'.$gardenId.'/edit/2/'.$installment->id)?>" class="bg-dark">
                    <i class="fa fa-edit" aria-hidden="true" style="color: white;padding: 5px"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/payments/'.$installment->id.'/'.$url.'/garden_payments')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            endforeach;
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
</script>
</body>
</html>