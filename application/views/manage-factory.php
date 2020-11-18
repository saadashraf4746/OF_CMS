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
		<a href="<?=base_url('factory/')?>" class="mr-2 bg-dark float-left" style="padding: 5px; display: inline" >
			<i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
		</a>
        <h3 style="float: <?=$float?>"><?=$heading?></h3>
        <table class="custom-table text-center" style="font-size: 20px">
          <thead class="bg-dark" style="color: white">
            <tr>
              <th>#</th>
              <th><?=$this->lang->line('module_name')?></th>
              <th><?=$this->lang->line('action')?></th>
            </tr>
          </thead>
          <tbody class="table-hover">
          	<tr>
          		<td>1</td>
          		<td><?=$this->lang->line('purchases')?></td>
          		<td><a href="<?=base_url('manage-purchases/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
          	<tr>
          		<td>2</td>
          		<td><?=$this->lang->line('warehouse')?></td>
          		<td><a href="<?=base_url('manage-warehouse/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
          	<tr>
          		<td>3</td>
          		<td><?=$this->lang->line('production')?></td>
          		<td><a href="<?=base_url('manage-factory/manage-production/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
          	<tr>
          		<td>4</td>
          		<td><?=$this->lang->line('sales')?></td>
          		<td><a href="<?=base_url('manage-factory/manage-sales/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
          	<tr>
          		<td>5</td>
          		<td><?=$this->lang->line('labour')?></td>
          		<td><a href="<?=base_url('manage-factory/manage-labour/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
          	<tr>
          		<td>6 </td>
          		<td><?=$this->lang->line('expense')?></td>
          		<td><a href="<?=base_url('manage-factory/manage-expenses/')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
					<i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
				</a>
				</td>
          	</tr>
            <tr>
              <td>7 </td>
              <td><?=$this->lang->line('kargal')?></td>
              <td><a href="<?=base_url('manage-factory/manage-kargal')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
          <i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
        </a>
        </td>
            </tr>

            <tr hidden>
              <td>8 </td>
              <td><?=$this->lang->line('local_sale')?></td>
              <td><a href="<?=base_url('manage-factory/manage-local-sale')?>" class="mr-2 bg-dark" style="padding: 5px; display: inline" >
          <i class="fa fa-arrow-right text-white" aria-hidden="true"></i>
        </a>
        </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!--  -->
  </div>

<!-- footer -->
<?php $this->load->view('footer-simple'); ?>
  <script type="text/javascript">
    $('#addSeasonBtn').click(function(e){
      e.preventDefault();
      if($('#startSeasonForm').valid())
      {
        var seasonYear = $('#seasonYear').val();
        $.ajax({              //request ajax
          type: "POST",
          url: "<?=base_url('seasons/addSeason')?>", 
          data: {seasonYear:seasonYear},
          dataType: "json", 
          success: function(response) 
          {
            $('#seasonYearNoRecord').hide();
            $('#seasonsListTable').prepend(response.html);
            $('#seasonYear').val('');
            $("#successSeasonStart").fadeTo(2000, 500).slideUp(500, function(){
                $("#successSeasonStart").slideUp(1000);
            });
          },
          error: function()
          {
            console.log('ERROR');
          }
          });
      }
      else
      {
        return false;
      }
    });
  </script>
</body>
</html>