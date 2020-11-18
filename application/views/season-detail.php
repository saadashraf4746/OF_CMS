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
        <a href="<?=base_url('seasons')?>" class="mr-2 bg-dark" style="padding: 5px;float: left">
          <i class="fa fa-arrow-left text-white" aria-hidden="true"></i>
        </a>
        <h3 style="display: inline;">Managing (Season <?=$season?>)</h3>
        <a href="<?=base_url($season.'/add-garden/'.$seasonId)?>" class="btn btn-warning float-right  mr-2">Add Garden</a>
        <a href="<?=base_url('manage-season/season-detail/'.$seasonId)?>" class="btn btn-warning float-right">Season Details</a>
      </div>

      <div class="col-md-12">
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


    <div class="row" id="gardens-section" <?php if($this->session->userdata('credential-switcher') != 'gardens' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white">Manage Gardens</h3>
        <?php if($this->session->flashdata('global_delete_message_garden_list')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_garden_list'); ?>
          </div>
        <?php } ?>
        <table class="custom-table">
          <thead>
            <tr>
              <th>Status</th>
              <th>Purchase On</th>
              <th>Landlord Name, Phone</th>
              <th>Location</th>
              <th>Purchase Amount</th>
              <th>Acre</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(count($gardensList) == 0)
            {
              ?>
              <tr>
                <td></td>
                <td>No garden found</td>
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
              foreach($gardensList as $garden)
              {
                ?>
                <tr
                  <?php if($garden->id == $this->session->userdata('garden-add-edit'))
                  { 
                    echo 'class="recentlyUpdated"';
                  }
                  ?>
                  >
                  <td>
                    <?php
                    if($garden->status == 2 && $garden->isCompleted == 0)
                    {
                      echo 'Running';
                    }
                    else if($garden->status == 1)
                    {
                      echo 'Not Started';
                    }
                    else if($garden->status == 2 && $garden->isCompleted == 1)
                    {
                      echo 'Completed';
                    }
                    ?>
                  </td>
                  <td><?=dateConvertDMY($garden->createdOn)?></td>
                  <td><?=$garden->landlordName.'<br/>'.$garden->landlordPhone;?></td>
                  <td><?=$garden->gardenLocation;?></td>
                  <td><?=numberFormat($garden->purchaseAmount)?> Rs</td>
                  <td><?=$garden->gardenAcre?></td>
                  <td>
                    <a href="<?=base_url('season/'.$seasonId.'/garden-detail/'.$garden->id)?>" class="bg-dark mb-1">
                      <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                    </a>
                    <a href="<?=base_url('season/edit-garden/'.$garden->id)?>" class="bg-dark">
                      <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                    </a>
                    <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/garden_purchasing/'.$garden->id.'/'.$url.'/garden_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                <?php
              }
              $this->session->unset_userdata('garden-add-edit');
            }
            ?>
          </tbody>
        </table>
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

    <div class="row" id="transport-section" <?php if($this->session->userdata('credential-switcher') != 'transport-expense' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; }?>>
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white">Transport Expenses</h3>

        <?php if($this->session->flashdata('success_edit_transport')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_edit_transport'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('global_delete_message_transport_list')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_transport_list'); ?>
          </div>
        <?php } ?>

        <a href="<?=base_url('season/add-expense/transport/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Expense</a> <br />

      </div>
      <div class="col-md-12">
        <table class="table table-sm table-bordered datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Owner Name, Mobile</th>
              <th>Driver Name, Mobile</th>
              <th>Transport Number</th>
              <th>Attendance</th>
              <th>Per Day Amount</th>
              <th>Total Amount</th>
              <th>Start Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            <?php
            if(count($transportExpenses) == 0)
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
                <td></td>
              </tr>
              <?php
            }
            else
            {
              $count = 1;
              foreach($transportExpenses as $transportExpense)
              {
                $attendanceStatistics = attendanceStatistics($transportExpense->id,1);
                ?>
                <tr
                  <?php if($transportExpense->id == $this->session->userdata('transport-add-edit'))
                  { 
                    echo 'class="recentlyUpdated"';
                  }
                  ?>
                  >
                  <td><?=$count?></td>
                  <td><?=$transportExpense->ownerName.'<br/>'.$transportExpense->ownerMobile?></td>
                  <td><?=$transportExpense->driverName.'<br/>'.$transportExpense->driverNumber?></td>
                  <td><?=$transportExpense->transportNumber?></td>
                  <td><?=$attendanceStatistics->totalDays.' <strong style="color:black">Days</strong><br>'.$attendanceStatistics->totalPresent.' <strong style="color:green">Presents</strong><br>'.$attendanceStatistics->totalAbsent.' <strong style="color:red">Absents</strong>'?></td>
                  <td><?=numberFormat($transportExpense->transportHireAmount)?> Rs</td>
                  <td><?=numberFormat($attendanceStatistics->totalToPaid)?> Rs</td>
                  <td><?=dateConvertDMY($transportExpense->createdOn)?></td>
                  <td>
                  <a href="<?=base_url('transport-expense/'.$seasonId.'/detail/'.$transportExpense->id)?>" class="bg-dark mb-1">
                    <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                   <a href="<?=base_url('transport-expense/'.$seasonId.'/edit/'.$transportExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses/'.$transportExpense->id.'/'.$url.'/transport_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                  </td>
                </tr>
                <?php
                $count++;
              }
              $this->session->unset_userdata('transport-add-edit');
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row" id="labour-section" <?php if($this->session->userdata('credential-switcher') != 'labour-expense' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white">Labour Expenses</h3>
        <a href="<?=base_url('season/add-expense/foreman/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Foreman</a>
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
                <?php if($foreman->id == $this->session->userdata('updated-foreman'))
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
                  <a href="<?=base_url('foreman-detail/'.$seasonId.'/detail/'.$foreman->id)?>" class="bg-dark mb-1">
                    <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                   <a href="<?=base_url('foreman/'.$seasonId.'/edit/'.$foreman->id)?>" class="bg-dark">
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
            $this->session->unset_userdata('updated-foreman');
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

    <div class="row" id="personal-staff" <?php if($this->session->userdata('credential-switcher') != 'personal-staff' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
      <div class="col-md-12">
        <h4 class="text-center bg-dark" style="color:white">Personal Staff</h4>
      </div>
      <div class="col-md-12">
        <?php if($this->session->flashdata('success_add_personal_staff')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_add_personal_staff'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('global_delete_message_personal_staff')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_personal_staff'); ?>
          </div>
        <?php } ?>
      </div>
      <div class="col-md-3" id="addPersonalStaff" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
        <h3>Add Staff</h3>
        <form method="post" action="<?=base_url('seasons/addPersonalStaff')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <label>Member Start Date</label>
          <input type="text" name="startDate" class="form-control date-masking" />
          <label>Member Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter foreman name" />
          <label>Member Mobile</label>
          <input type="text" name="mobile" class="form-control phone-validation" placeholder="Enter foreman mobile" /> 
          <label>Per day Amount</label>
          <input type="text" name="perdayAmount" oninput="seprator(this); withDecimal(this.value, 'add-personal-staff')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="add-personal-staff" style="color:black;font-weight: bold;display: none"></span>
          <label>Member Type</label>
          <input type="text" name="memberType" class="form-control" placeholder="Enter Member Type" /> 
          <button class="btn btn-small btn-warning mt-2" type="submit">Add Member</button>
        </form>
      </div>
      <div class="col-md-3" id="editPersonalStaff" style="background: rgb(255 247 153);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
        <h3>Edit Staff Member</h3>
        <form method="post" action="<?=base_url('seasons/editPersonalStaff')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="hidden" name="memberId" id="memberIdPersonalStaff" value="">
          <input type="hidden" name="url" id="url_personal_staff" value="">
          <label>Member Start Date</label>
          <input type="text" name="startDate" id="startDatePersonalStaff" class="form-control date-masking" />
          <label>Member Name</label>
          <input type="text" name="name" id="namePersonalStaff" class="form-control" />
          <label>Member Mobile</label>
          <input type="text" name="mobile" id="mobilePersonalStaff" class="form-control phone-validation" /> 
          <label>Per day Amount</label>
          <input type="text" name="perdayAmount" oninput="seprator(this); withDecimal(this.value, 'edit-personal-staff')" id="perdayAmountPersonalStaff" class="form-control" /> 
          <span id="edit-personal-staff" style="color:black;font-weight: bold;display: none"></span>
          <label>Member Type</label>
          <input type="text" name="memberType" id="memberTypePersonalStaff" class="form-control" /> 
          <button class="btn btn-small btn-warning mt-2" type="submit">Add Member</button>
        </form>
      </div>
      <div class="col-md-9">
        <table class="table table-bordered table-sm datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Start Date</th>
              <th>Member Type</th>
              <th>Member Name, Mobile</th>
              <th>Attendance Status</th>
              <th>Amount Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-striped">
            <?php
            if(count($personalStaff)==0)
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
              foreach($personalStaff as $member):
                $attendanceStatistics = attendanceStatistics($member->id,4);
                ?>
                <tr id="personal_staff_row_<?=$member->id?>"
                <?php if($member->id == $this->session->userdata('updated-personal-staff'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
                >
                <td><?php echo $count;?></td>
                <td><?=dateConvertDMY($member->startDate)?></td>
                <td><?=ucfirst($member->memberType)?></td>
                <td><?=$member->name.'<br/>'.$member->mobile;?></td>
                <td><?=$attendanceStatistics->totalDays.' <strong style="color:black">Days</strong><br>'.$attendanceStatistics->totalPresent.' <strong style="color:green">Presents</strong><br>'.$attendanceStatistics->totalAbsent.' <strong style="color:red">Absents</strong>'?></td>
                <td><?='<strong style="color:black">Per Day:</strong> '.numberFormat($member->perdayAmount).' Rs<br/><strong style="color:black">Total:</strong> '.numberFormat($attendanceStatistics->totalToPaid).' Rs';?></td>
                <td>
                  <a href="<?=base_url('manage-season/personal-staff-detail/'.$member->id.'/'.$seasonId)?>" class="bg-dark">
                    <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a> 
                  <a href="" class="bg-dark mb-1 editPersonalStaff" this-id="<?=$member->id?>" this-url="<?=$url?>">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/staff/'.$member->id.'/'.$url.'/personal_staff')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            endforeach;
            $this->session->unset_userdata('updated-personal-staff');
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>



  <div class="row mt-2" id="pump-expense-section" <?php if($this->session->userdata('credential-switcher') != 'pump-expense' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
    <div class="col-md-12">
      <h4 class="text-center bg-dark" style="color:white">Pump Expense</h4>
    </div>

    <div class="col-md-12">
      <?php if($this->session->flashdata('success_add_pump')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('success_add_pump'); ?>
        </div>
      <?php } ?>
    </div>

    <div class="col-md-12">
      <?php if($this->session->flashdata('global_delete_message_pump_list')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('global_delete_message_pump_list'); ?>
        </div>
      <?php } ?>
    </div>

    <div class="col-md-3" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
      <h3>Add Expense</h3>
      <form id="addPumpTransaction" method="POST" action="<?=base_url('seasons/addPumpTransaction')?>" enctype="multipart/form-data">
        <input type="hidden" name="seasonId" value="<?=$seasonId?>">
        <input type="radio"  name="fuelType" value="petrol" checked><strong>Petrol</strong>&nbsp;&nbsp;&nbsp;
        <input type="radio"  name="fuelType" value="diesel"><strong>Diesel</strong><br>
        <label>Expense Date</label>
        <input type="text" name="expenseDate" value="<?=todayDate();?>" class="form-control date-masking" />
        <label>Expense Amount</label>
        <input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'add-pump-expense')" class="form-control" placeholder="Enter expense amount">
        <span id="add-pump-expense" style="color:black;font-weight: bold;display: none"></span>
        <label>Transport Number</label>
        <input type="text" name="transportNumber" class="form-control" placeholder="Enter transport number">
        <label>Expense Slip</label>
        <input type="file" name="expenseSlip" class="form-control">
        <button class="btn btn-small btn-warning mt-2 mb-3" type="submit">Add Expense</button>
      </form>
    </div>
    <div class="col-md-9">
      <table class="table table-bordered table-sm datatable">
        <thead class="bg-white">
          <tr>
            <th>Sr No.</th>
            <th>Expense Slip</th>
            <th>Expense Date</th>
            <th>Transport Number</th> 
            <th>Expense Amount</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          <?php
          if(count($pumpExpenses)==0)
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
            $count = 0;
            foreach($pumpExpenses as $pumpExpense):
              ?>
              <tr 
                <?php if($pumpExpense->id == $this->session->userdata('updated-pump-expense'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
              >
                <td><?php echo ++$count;?></td>
                <?php
                if($pumpExpense->expenseSlip == '')
                {
                ?>
                  <td>
                    <a href="<?=base_url('application/uploads/no_image.png')?>" target="_blank">
                      <img height="100px" width="100px" src="<?=base_url('application/uploads/no_image.png')?>">
                    </a>
                  </td>
                <?php
                }
                else
                {
                ?>
                  <td>
                    <a href="<?=base_url('application/uploads/expenses/pump/'.$pumpExpense->expenseSlip)?>" target="_blank">
                      <img height="100px" width="100px" src="<?=base_url('application/uploads/expenses/pump/'.$pumpExpense->expenseSlip)?>">
                    </a>
                  </td>
                <?php
                }
                ?>
                <td><?=dateConvertDMY($pumpExpense->expenseDate)?></td>
                <td><?=$pumpExpense->transportNumber==''?'not available':$pumpExpense->transportNumber;?></td>
                <td><?=numberFormat($pumpExpense->expenseAmount);?> Rs</td>
                <td><?=$pumpExpense->expenseType==4?'Petrol':'Diesel';?></td>
                <td>
                  <a href="<?=base_url('season/'.$seasonId.'/edit-pump-expense/'.$pumpExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i></a>
                    <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses/'.$pumpExpense->id.'/'.$url.'/pump_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                    </a>
                  </td>
                </tr>
                <?php
              endforeach;
              $this->session->unset_userdata('updated-pump-expense');
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  <div class="row mt-3" id="personal-car-section" <?php if($this->session->userdata('credential-switcher') != 'personal-car-expense' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
    <div class="col-md-12">
      <h4 class="text-center bg-dark" style="color:white">Personal Car Expense</h4>
    </div>
    <div class="col-md-12">

      <?php if($this->session->flashdata('success_add_personal')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('success_add_personal'); ?>
        </div>
      <?php } ?>

      <?php if($this->session->flashdata('global_delete_message_personal_car_list')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('global_delete_message_personal_car_list'); ?>
        </div>
      <?php } ?>
    </div>
    <div class="col-md-3" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
      <h3>Add Expense</h3>
      <form id="addPersonalExpense" method="POST" action="<?=base_url('seasons/addPersonalExpense')?>" enctype="multipart/form-data">
        <input type="hidden" name="seasonId" value="<?=$seasonId?>">
        <label>Expense Date</label>
        <input type="text" name="expenseDate" value="<?=todayDate();?>" class="form-control date-masking" />
        <label>Expense Amount</label>
        <input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'add-personal-car-expense')" class="form-control" placeholder="Enter expense amount">
        <span id="add-personal-car-expense" style="color:black;font-weight: bold;display: none"></span>
        <label>Expense Slip</label>
        <input type="file" name="expenseSlip" class="form-control">
        <label>Transport Number</label>
        <textarea class="form-control" placeholder="Enter expense decription" name="expenseDescription"></textarea>
        <button class="btn btn-small btn-warning mt-2 mb-3" type="submit">Add Expense</button>
      </form>
    </div>
    <div class="col-md-9">
      <table class="table table-bordered table-sm datatable">
        <thead class="bg-white">
          <tr>
            <th>Sr No.</th>
            <th>Expense Slip</th>
            <th>Expense Date</th>
            <th>Expense Amount</th>
            <th>Expense Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-hover">
          <?php
          if(count($personalCarExpense)==0)
          {
            ?>
            <tr>
              <td></td>
              <td>No record found.</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <?php
          }
          else
          {
            $count = 0;
            foreach($personalCarExpense as $personalExpense):
              ?>
              <tr 
                <?php if($personalExpense->id == $this->session->userdata('updated-personal-expense'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
              >
                <td><?php echo ++$count;?></td>
                <?php
                if($personalExpense->expenseSlip == '')
                {
                ?>
                  <td>
                    <a href="<?=base_url('application/uploads/no_image.png')?>" target="_blank">
                      <img height="100px" width="100px" src="<?=base_url('application/uploads/no_image.png')?>">
                    </a>
                  </td>
                <?php
                }
                else
                {
                ?>
                  <td>
                    <a href="<?=base_url('application/uploads/expenses/personalExpense/'.$personalExpense->expenseSlip)?>" target="_blank">
                      <img height="100px" width="100px" src="<?=base_url('application/uploads/expenses/personalExpense/'.$personalExpense->expenseSlip)?>">
                    </a>
                  </td>
                <?php
                }
                ?>
                <td><?=dateConvertDMY($personalExpense->expenseDate)?></td>
                <td><?=numberFormat($personalExpense->expenseAmount);?> Rs</td>
                <td><?=$personalExpense->expenseDescription==''?'no description':$personalExpense->expenseDescription;?></td>
                <td>
                  <a href="<?=base_url('season/'.$seasonId.'/edit-personal-expense/'.$personalExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses/'.$personalExpense->id.'/'.$url.'/personal_car_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                  </td>
                </tr>
                <?php
              endforeach;
              $this->session->unset_userdata('updated-personal-expense');
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row mt-3" id="other-section" <?php if($this->session->userdata('credential-switcher') != 'other-expense' && $this->session->userdata('credential-switcher') != 'all'){ echo "style='display:none'"; } ?>>
      <div class="col-md-12">
        <h3 class="bg-dark text-center text-white">Other Expenses</h3>
    <?php if($this->session->flashdata('success_add_other')){ ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <?php echo $this->session->flashdata('success_add_other'); ?>
      </div>
    <?php } ?>

      <?php if($this->session->flashdata('global_delete_message_other_list')){ ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">x</button>
          <?php echo $this->session->flashdata('global_delete_message_other_list'); ?>
        </div>
      <?php } ?>

        <a href="<?=base_url('season/add-expense/other/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Expense</a>
      </div>
      <div class="col-md-12">
        <table class="table table-bordered datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Expense Date</th>
              <th>Expense Tittle</th>
              <th>Expense Amount</th>
              <th>Update Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-hover">
            <?php
            if(count($transportOthers) == 0)
            {
              ?>
              <tr>
                <td>No expense found</td>
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
              foreach($transportOthers as $transportOther)
              {
                ?>
                  <tr 
                  <?php if($transportOther->id == $this->session->userdata('updated-other-expense'))
                  { 
                    echo 'class="recentlyUpdated"';
                  } ?>
                  >
                  <td><?=$count?></td>
                  <td><?=dateConvertDMY($transportOther->expenseDate)?></td>
                  <td><?=$transportOther->expenseTittle?></td>
                  <td><?=numberFormat($transportOther->expenseAmount)?> Rs</td>
                  <td><?=$transportOther->updatedOn==''?'not updated':dateConvertDMY($transportOther->updatedOn)?></td>
                  <td>
                   <a href="<?=base_url('other-expense/'.$seasonId.'/edit/'.$transportOther->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses/'.$transportOther->id.'/'.$url.'/other_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                      <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            }
            $this->session->unset_userdata('updated-other-expense');
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