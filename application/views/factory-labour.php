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

    <div class="row sticky">
      <div class="col-md-12 mb-4">
        <a href="<?=base_url('manage-factory/'.$seasonId)?>" class="mr-2 bg-dark" style="padding: 5px;float: left">
          <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
        </a>
        <h3 style="display: inline;"><?=$heading?></h3>
      </div>

      <div class="col-md-12" hidden>
        <input type="radio" class="credential-switcher" name="credential-switcher" value="gardens" <?php if($this->session->userdata('credential-switcher') == 'gardens'){ echo 'checked'; } ?> >&nbsp;Garden List

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="transport-expense" <?php if($this->session->userdata('credential-switcher') == 'transport-expense'){ echo 'checked'; }?> >&nbsp;Transport Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="labour-expense" <?php if($this->session->userdata('credential-switcher') == 'labour-expense'){ echo 'checked'; }?> >&nbsp;Labour Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="personal-staff" <?php if($this->session->userdata('credential-switcher') == 'personal-staff'){ echo 'checked'; }?> >&nbsp;Personal Staff

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="pump-expense" <?php if($this->session->userdata('credential-switcher') == 'pump-expense'){ echo 'checked'; }?> >&nbsp;Pump Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="personal-car-expense" <?php if($this->session->userdata('credential-switcher') == 'personal-car-expense'){ echo 'checked'; }?> >&nbsp;Personal Car Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="other-expense" <?php if($this->session->userdata('credential-switcher') == 'other-expense'){ echo 'checked'; }?> >&nbsp;Other Expense

        <br/>
        <input type="radio" class="credential-switcher mb-3" name="credential-switcher" value="all" <?php if($this->session->userdata('credential-switcher') == 'all'){ echo 'checked'; }?> >&nbsp;All
      </div>
    </div>

    <div class="row" id="labour-section">
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white">Labour Expenses</h3>
        <a href="<?=base_url('factory/add-expense/foreman/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Foreman</a>
      </div>
      <?php if($this->session->flashdata('success_add_foreman')){ ?>
        <div class="col-md-12">
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_add_foreman'); ?>
          </div>
        </div>
      <?php } ?>

      <?php if($this->session->flashdata('global_delete_message_labour_list')){ ?>
        <div class="col-md-12">
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_labour_list'); ?>
          </div>
        </div>
      <?php } ?>

      <div class="col-md-12">
        <table class="table table-bordered datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Start Date</th>
              <th>Fixed Amount</th>
              <th>Foreman Name</th>
              <th>Foreman Mobile</th>
              <th>Foreman CNIC</th>
              <th>Foreman Address</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            <?php
            if(count($labourExpenses) == 0)
            {
              ?>
              <tr>
                <td>No expense found</td>
                <td></td>
                <td></td>
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
              foreach($labourExpenses as $foreman)
              {
                ?>
              <tr 
                <?php if($foreman->id == $this->session->userdata('updated-foreman-factory'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
              >
                  <td><?=$count++;?></td>
                  <td><?=dateConvertDMY($foreman->startDate)?></td>
                  <td><?=$foreman->foremanSeasonFixAmount==0?'not fixed yet':numberFormat($foreman->foremanSeasonFixAmount);?> Rs</td>
                  <td><?=$foreman->name?></td>
                  <td><?=$foreman->mobile?></td>
                  <td><?=$foreman->CNIC?></td>
                  <td><?=$foreman->address?></td>
                  <td>
                  <a href="<?=base_url('foreman-detail-factory/'.$seasonId.'/detail/'.$foreman->id)?>" class="bg-dark mb-1">
                    <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                   <a href="<?=base_url('foreman-factory/'.$seasonId.'/edit/'.$foreman->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                    <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/staff/'.$foreman->id.'/'.$url.'/labour_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                    </a>
                </td>
              </tr>
              <?php
              $count++;
            }
            $this->session->unset_userdata('updated-foreman-factory');
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

  $('.editPersonalStaff').click(function(e){
    e.preventDefault();
    $('tr').removeClass('activeForEdit');
    var memberId = $(this).attr('this-id');
    var link      = $(this).attr('this-url');
    var table = 'staff';
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('CommonController/getRecord')?>", 
        data: {id:memberId,table:table},
        dataType: "json",
        success: function(response) 
        {
          $('#addPersonalStaff').hide();
          $('#editPersonalStaff').show();
          $('#memberIdPersonalStaff').val(memberId);
          $('#startDatePersonalStaff').val(response.data.startDate);
          $('#namePersonalStaff').val(response.data.name);
          $('#namePersonalStaff').focus();
          $('#mobilePersonalStaff').val(response.data.mobile);
          $('#perdayAmountPersonalStaff').val(response.data.perdayAmount);
          $('#memberTypePersonalStaff').val(response.data.memberType);
          $('#url_personal_staff').val(link);
          $('#personal_staff_row_'+memberId).addClass('activeForEdit');

        },
        error: function()
        {
          console.log('ERROR');
        }
      });
  });


  $('.credential-switcher').click(function(){
    var val = $(this).val();
    $.ajax({              //request ajax
      type: "POST",
      url: "<?=base_url('seasons/setCredentialSwitcherSession')?>", 
      data: {val:val},
      dataType: "json", 
      success: function(response) 
      {
        console.log('session-updated');
      },
      error: function()
      {
        console.log('ERROR');
      }
    });

    if(val == 'gardens')
    {
      $('#gardens-section').show();
      $('#transport-section').hide();
      $('#labour-section').hide();
      $('#other-section').hide();
      $('#expense-detail-section').hide();
      $('#pump-expense-section').hide();
      $('#personal-car-section').hide();
      $('#personal-staff').hide();
    }
    else if(val == 'transport-expense')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').show();
      $('#labour-section').hide();
      $('#other-section').hide();
      $('#pump-expense-section').hide();
      $('#personal-car-section').hide();
      $('#personal-staff').hide();
    }
    else if(val == 'labour-expense')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').hide();
      $('#labour-section').show();
      $('#other-section').hide();
      $('#pump-expense-section').hide();
      $('#personal-car-section').hide();
      $('#personal-staff').hide();
    }
    else if(val == 'other-expense')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').hide();
      $('#labour-section').hide();
      $('#other-section').show();
      $('#pump-expense-section').hide();
      $('#personal-car-section').hide();
      $('#personal-staff').hide();
    }
    else if(val == 'pump-expense')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').hide();
      $('#labour-section').hide();
      $('#other-section').hide();
      $('#pump-expense-section').show();
      $('#personal-car-section').hide();
      $('#personal-staff').hide();
    }
    else if(val == 'personal-car-expense')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').hide();
      $('#labour-section').hide();
      $('#other-section').hide();
      $('#pump-expense-section').hide();
      $('#personal-car-section').show();
      $('#personal-staff').hide();
    }
    else if(val == 'personal-staff')
    {
      $('#expense-detail-section').show();
      $('#gardens-section').hide();
      $('#transport-section').hide();
      $('#labour-section').hide();
      $('#other-section').hide();
      $('#pump-expense-section').hide();
      $('#personal-car-section').hide();
      $('#personal-staff').show();
    }
    else if(val == 'all')
    {
      $('#personal-staff').show();
      $('#expense-detail-section').show();
      $('#gardens-section').show();
      $('#transport-section').show();
      $('#labour-section').show();
      $('#other-section').show();
      $('#pump-expense-section').show();
      $('#personal-car-section').show();
    }
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