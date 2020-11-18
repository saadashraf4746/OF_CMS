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

    <div>
    	<h2 class="text-center">EDIT AMOUNT</h2>
    </div>

    <?php if($this->session->flashdata('success_message')){ ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo $this->session->flashdata('success_message'); ?>
      </div>
    <?php } ?>


    <div class="row">
    	<div class="col-md-12">
    		<h4 class="text-center bg-dark" style="color:white"><?=$heading?></h4>
    	</div>
    	<div class="col-md-4 offset-4">
        <form id="editAmountForm" method="post" action="<?=base_url('seasons/editFormValue');?>">
          <label>Enter Amount</label>
          <input type="hidden" name="table" value="<?=$table?>">
          <input type="hidden" name="id" value="<?=$id?>">
          <input type="hidden" name="gardenId" value="<?=$gardenId?>">
          <input type="text" id="amount" name="amount" class="form-control numeric-masking" value="<?=$amount?>">
          <button class="btn btn-small btn-warning mt-2" type="submit" id="addSeasonBtn">Update</button>
        </form>
    	</div>
    </div>

    <!--  -->
  </div>

<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
</body>
</html>