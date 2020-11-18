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

    <div class="alert alert-success" id="successSeasonStart" style="display: none;">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>Success! </strong> Season have started successfully.
    </div>


    <div class="row">
      <div class="col-md-12">
        <h3 style="float: <?=$float?>"><?=$this->lang->line('seasons_credentials')?> (<?=$season?>)</h3>
        <table class="custom-table" style="font-size: 20px">
          <thead>
            <tr>
              <th><?=$this->lang->line('start_date')?></th>
              <th><?=$this->lang->line('season')?></th>
              <th><?=$this->lang->line('action')?></th>
            </tr>
          </thead>
          <tbody id="seasonsListTable">
            <?php if(count($seasons) == 0){ ?>
              <tr id="seasonYearNoRecord">
                <td></td>
                <td>No season found.</td>
                <td></td>
                <td></td>
              </tr>
            <?php
            } else { foreach($seasons as $season): ?>
              <tr>
                <td><?=$season->addedOn?></td>
                <td><?=$season->season?></td>
                <td><a href="<?=base_url()?>manage-season/<?=$season->id?>"><?=$this->lang->line('manage')?></a></td>
              </tr>
            <?php endforeach; } ?>
          </tbody>
        </table>
      </div>
    </div>
    <!--  -->
  </div>

<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
</body>
</html>