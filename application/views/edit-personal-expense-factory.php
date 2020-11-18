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
    <a href="<?=base_url('manage-factory/manage-expenses')?>" class="mr-2 bg-dark" style="padding: 5px">
     <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
   </a>
   <ul class="breadcrumb-realestate" style="display: inline">
    <li><a href="<?=base_url('/')?>">Home</a></li>
    <li class="active"><?=$headingMain?></li>
  </ul>


  <h1><?=$headingMain;?></h1>

  <div class="add-property-form-container">
   <form action="<?=base_url('seasons/editPersonalExpense')?>" method="post" id="editPersonalExpense" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="form-group">
         <input type="hidden" name="seasonId" value="<?=$seasonId?>">
         <input type="hidden" name="expenseId" value="<?=$expenseId?>">
         <label>Expense Date</label>
         <input type="text" name="expenseDate" class="form-control" value="<?=dateToDMY($expenseRow->expenseDate)?>" />
       </div>
     </div>
     <div class="col-md-4 col-sm-6">
      <div class="form-group">
        <label>Expense Amount</label>
        <input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'edit-personal-car-expense')" class="form-control" value="<?=$expenseRow->expenseAmount?>">
        <span id="edit-personal-car-expense" style="color:black;font-weight: bold;display: none"></span>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
    <div class="form-group">
      <label>Expense Slip</label>
      <input type="file" name="expenseSlip" class="form-control">
    </div>
  </div>
  <div class="col-md-12 col-sm-6">
    <div class="form-group">
      <label>Expense Description</label>
      <textarea name="expenseDescription" class="form-control"><?=$expenseRow->expenseDescription?></textarea>
    </div>
  </div>
  <div class="col-md-4 col-sm-6">
    <div class="form-group">
      <label>Current Image :</label><br>
      <?php
      if($expenseRow->expenseSlip == '')
      {
        ?>
        <a href="<?=base_url('application/uploads/no_image.png')?>" target="_blank">
          <img height="200px" width="200px" src="<?=base_url('application/uploads/no_image.png')?>">
        </a>
        <?php
      }
      else
      {
        ?>
        <a href="<?=base_url('application/uploads/expenses/personalExpense/'.$expenseRow->expenseSlip);?>" target="_blank">
          <img width="200px" height="200px" src="<?=base_url('application/uploads/expenses/personalExpense/'.$expenseRow->expenseSlip);?>">
        </a>
        <?php
      }
      ?>
    </div>
  </div>
</div>
<hr />
<div class="text-right">
  <button type="reset" class="btn mr-3">No, Cancel</button>
  <button type="submit" class="btn btn-warning">Update & Publish</button>
</div>
</form>
</div>
</div>
<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
</body>
</html>