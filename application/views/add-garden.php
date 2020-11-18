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
    <a href="<?=base_url('manage-season/'.$seasonId)?>" class="mr-2 bg-dark" style="padding: 5px">
      <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
    </a>
    <ul class="breadcrumb-realestate" style="display: inline">
      <li><a href="<?=base_url('/')?>">Home</a></li>
      <li class="active"><?=$season?></li>
      <li class="active"><?=$headTittle?></li>
    </ul>
    <br>
    <h1 style="display: inline"><?=$headingMain;?></h1>
    <div class="row mb-3">
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white"><?=$headingMain;?></h3>
      </div>
    </div>

    <div class="add-property-form-container">
      <form action="<?=base_url('seasons/addGarden')?>" method="post" id="gardenAddEdit">
        <input type="hidden" name="seasonId" value="<?=$seasonId?>">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Landlord Name</label>
              <input type="text" name="landlordName" class="form-control" placeholder="Enter Landlord Name" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Landlord Phone</label>
              <input type="text" name="landlordPhone" class="form-control phone-validation" placeholder="Enter Landlord Phone" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Garden Location</label>
              <input type="text" name="gardenLocation" class="form-control" placeholder="Enter Garden Location" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Purchase Amount</label>
              <input type="text" name="purchaseAmount" oninput="seprator(this); withDecimal(this.value, 'add-garden-amount')" class="form-control" placeholder="Enter amount" /> 
              <span id="add-garden-amount" style="color:black;font-weight: bold;display: none"></span>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Garden Acre</label>
              <input type="text" name="gardenAcre" class="form-control acre-masking" placeholder="Enter Garden Acre" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>End of cutting date</label>
              <input type="date" name="endDate" class="form-control"/> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Refernece</label>
              <input type="text" name="reference" class="form-control" placeholder="Enter reference" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>First Installment (Chothai) Date</label>
              <input type="text" name="comingInstallmentDate" class="form-control date-masking" /> 
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-group">
              <label>Jinas Type</label> &nbsp;
              <input type="radio" name="jinasType" value="trees" checked/> By Tree &nbsp; 
              <input type="radio" name="jinasType" value="pieces" /> By Pieces 
              <input type="text" name="jinasValue" class="form-control numeric-masking" placeholder="Enter Quantity" /> 
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
  <!-- footer -->
  <?php $this->load->view('footer-simple'); ?>
</body>
</html>