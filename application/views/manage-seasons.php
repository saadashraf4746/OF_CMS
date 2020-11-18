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
        <?php if($this->session->flashdata('global_delete_message_season')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_season'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('edit_message_season')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('edit_message_season'); ?>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-8">
        <h3 style="float: <?=$float?>"><?=$this->lang->line('seasons_list')?></h3>
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
                <td><?=dateConvertDMY($season->addedOn)?></td>
                <td><?=$season->season?></td>
                <td>
                  <?php
                  if($link == 'gardens')
                  {
                    ?>
                    <a href="<?=base_url()?>manage-season/<?=$season->id?>" class="bg-dark">
                      <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                    </a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <a href="<?=base_url()?>manage-factory/<?=$season->id?>" class="bg-dark">
                      <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                    </a>
                    <?php
                  }
                  ?>
                  <a href="" class="bg-dark editSeason" this-id="<?=$season->id?>" this-link="<?=$link?>">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>

                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/seasons/'.$season->id.'/'.$url.'/season')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; } ?>
          </tbody>
        </table>
      </div>

      <div class="col-md-4" id="addSeason" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
        <h3 style="float: <?=$float?>"><?=$this->lang->line('start_season')?></h3>
        <form id="startSeasonForm">
          <input type="text" id="seasonYear" name="seasonYear" class="form-control season-validation" placeholder="<?=$this->lang->line('enter_season_year')?>">
          <button style="float: <?=$float?>" class="btn btn-small btn-warning mt-2" type="submit" id="addSeasonBtn"><?=$this->lang->line('start_season')?></button>
        </form>
      </div>
      <div class="col-md-4" id="editSeason" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
        <h3 style="float: <?=$float?>;display: inline" class="mr-2"><?=$this->lang->line('edit_season')?></h3>
        <button onClick="window.location.reload();">Reset</button>
        <form id="startSeasonForm" action="<?=base_url('seasons/editSeason')?>" method="POST">
          <input type="text" id="seasonYearEdit" name="seasonYear" class="form-control season-validation" placeholder="<?=$this->lang->line('enter_season_year')?>">
          <input type="hidden" id="seasonYearId" name="seasonYearId" value="">
          <input type="hidden" id="seasonLink" name="seasonLink" value="">

          <button style="float: <?=$float?>" class="btn btn-small btn-warning mt-2" type="submit" id="addSeasonBtn"><?=$this->lang->line('edit_season')?></button>
        </form>
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

    $('.editSeason').click(function(e){
      e.preventDefault();
      var seasonId = $(this).attr('this-id');
      var link     = $(this).attr('this-link');
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('seasons/getSeasonValue')?>", 
        data: {seasonId:seasonId},
        dataType: "json",
        success: function(response) 
        {
          $('#addSeason').hide();
          $('#editSeason').show();
          $('#seasonYearEdit').val(response.val);
          $('#seasonYearId').val(seasonId);
          $('#seasonLink').val(link);
          $('#seasonYearEdit').focus();

        },
        error: function()
        {
          console.log('ERROR');
        }
      });
    });
  </script>

</body>
</html>