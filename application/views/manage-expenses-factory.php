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
        <h3 style="display: inline;">Managing (Factory Expenses <?=$season?>)</h3>
        <!-- //<a href="<?=base_url('manage-season/season-detail/'.$seasonId)?>" class="btn btn-warning float-right">Factory Details</a> -->
      </div>

      <div class="col-md-12">
        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="transport-expense" <?php if($this->session->userdata('credential-switcher') == 'transport-expense'){ echo 'checked'; }?> >&nbsp;Transport Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="personal-staff" <?php if($this->session->userdata('credential-switcher') == 'personal-staff'){ echo 'checked'; }?> >&nbsp;Personal Staff

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="pump-expense" <?php if($this->session->userdata('credential-switcher') == 'pump-expense'){ echo 'checked'; }?> >&nbsp;Pump Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="personal-car-expense" <?php if($this->session->userdata('credential-switcher') == 'personal-car-expense'){ echo 'checked'; }?> >&nbsp;Personal Car Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="other-expense" <?php if($this->session->userdata('credential-switcher') == 'other-expense'){ echo 'checked'; }?> >&nbsp;Other Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="patti-expense" <?php if($this->session->userdata('credential-switcher') == 'patti-expense'){ echo 'checked'; }?> >&nbsp;Patti Expense

        <input type="radio" class="credential-switcher ml-3" name="credential-switcher" value="patri-expense" <?php if($this->session->userdata('credential-switcher') == 'patri-expense'){ echo 'checked'; }?> >&nbsp;Patri Expense

        <br>
        <input type="radio" class="credential-switcher mb-3" name="credential-switcher" value="all" <?php if($this->session->userdata('credential-switcher') == 'all'){ echo 'checked'; }?> >&nbsp;All
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

        <a href="<?=base_url('factory/add-expense/transport/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Expense</a> <br />

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
                $attendanceStatistics = attendanceStatistics($transportExpense->id, 6);
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
                  <td><?=dateConvertDMY($transportExpense->transportStartDate)?></td>
                  <td>
                  <a href="<?=base_url('transport-expense-factory/'.$seasonId.'/detail/'.$transportExpense->id)?>" class="bg-dark mb-1">
                    <i class="fa fa-tasks" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                   <a href="<?=base_url('transport-expense-factory/'.$seasonId.'/edit/'.$transportExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$transportExpense->id.'/'.$url.'/transport_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
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
        <form method="post" action="<?=base_url('factory/addPersonalStaff')?>" id="">
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
        <form method="post" action="<?=base_url('factory/editPersonalStaff')?>" id="">
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
          <button class="btn btn-small btn-warning mt-2" type="submit">Edit Member</button>
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
                $attendanceStatistics = attendanceStatistics($member->id, 7);
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
                  <a href="<?=base_url('manage-factory/personal-staff-detail/'.$member->id.'/'.$seasonId)?>" class="bg-dark">
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

    <div class="row mt-2" id="patti-expense" >
      <div class="col-md-12">
        <h4 class="text-center bg-dark" style="color:white">Patti Expense</h4>
      </div>
      <div class="col-md-12">
        <?php if($this->session->flashdata('success_add_patti_expense')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_add_patti_expense'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('global_delete_message_patti_expense')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_patti_expense'); ?>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-3" id="addPattiExpesne" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
        <h3>Add Expense</h3>
        <form method="post" action="<?=base_url('factory/pattiExpense')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <label>Expense Date</label>
          <input type="text" name="expenseDate" class="form-control date-masking" />
          <label>Quantity 10KG Cotton</label>
          <input type="text" name="quantity" oninput="seprator(this); withDecimal(this.value, 'add-patti-expense-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="add-patti-expense-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Per Price</label>
          <input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'add-patti-expense-amount')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="add-patti-expense-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Add Expense</button>
        </form>
      </div>

      <div class="col-md-3" id="editPattiExpesne" style="background: rgb(255 247 153);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
        <h3>Edit Patti Expense</h3>
        <form method="post" action="<?=base_url('factory/editPattiExpense')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="hidden" name="expenseId" id="expenseIdPatti" value="">
          <input type="hidden" name="url" id="url_patti_expense" value="">
          <label>Expense Date</label>
          <input type="text" name="expenseDate" id="expenseDatePattiEdit" class="form-control date-masking" />
          <label>Quantity 10KG Cotton</label>
          <input type="text" name="quantity" id="quantityPattiEdit" oninput="seprator(this); withDecimal(this.value, 'edit-patti-expense-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="edit-patti-expense-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Per Price</label>
          <input type="text" name="expenseAmount" id="expenseAmountPattiEdit" oninput="seprator(this); withDecimal(this.value, 'edit-patri-expense-amount')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="edit-patri-expense-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Edit Expense</button>
        </form>
      </div>
      <div class="col-md-9">
        <table class="table table-bordered table-sm datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Expense Date</th>
              <th>10 Kg Cotton Quantity</th>
              <th>Per Amount</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-striped">
            <?php
            if(count($pattiExpense)==0)
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
              foreach($pattiExpense as $patti):
                $attendanceStatistics = attendanceStatistics($patti->id, 7);
                ?>
                <tr id="patti_expense_row_<?=$patti->id?>"
                <?php if($patti->id == $this->session->userdata('updated-patti-expense'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
                >
                <td><?php echo $count;?></td>
                <td><?=dateConvertDMY($patti->expenseDate)?></td>
                <td><?=numberFormat($patti->quantity)?></td>
                <td><?=numberFormat($patti->expenseAmount)?></td>
                <td><?=numberFormat($patti->totalAmount)?></td>
                <td>
                  <a href="" class="bg-dark mb-1 editPattiExpense" this-id="<?=$patti->id?>" this-url="<?=$url?>">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$patti->id.'/'.$url.'/personal_staff')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            endforeach;
            $this->session->unset_userdata('updated-patti-expense');
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

    <div class="row mt-2" id="patri-expense" >
      <div class="col-md-12">
        <h4 class="text-center bg-dark" style="color:white">Patri Expense</h4>
      </div>
      <div class="col-md-12">
        <?php if($this->session->flashdata('success_add_patri_expense')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('success_add_patri_expense'); ?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('global_delete_message_patri_expense')){ ?>
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo $this->session->flashdata('global_delete_message_patri_expense'); ?>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-3" id="addPatriExpesne" style="background: #CDDEDE;padding: 14px;border: 1px solid #cddede;border-radius: 8px;">
        <h3>Add Expense</h3>
        <form method="post" action="<?=base_url('factory/patriExpense')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="radio"  name="patriType" value="tenKGcotton" checked><strong>10 KG Cotton</strong>&nbsp;&nbsp;
          <input type="radio"  name="patriType" value="tenKGphati"><strong>10 KG Phati</strong>&nbsp;&nbsp;<br>
          <input type="radio"  name="patriType" value="eightKGphati"><strong>8 KG Phati</strong><br>
          <label>Expense Date</label>
          <input type="text" name="expenseDate" class="form-control date-masking" />
          <label>Quantity 10KG Cotton</label>
          <input type="text" name="quantity" oninput="seprator(this); withDecimal(this.value, 'add-patri-expense-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="add-patri-expense-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Per Price</label>
          <input type="text" name="expenseAmount" oninput="seprator(this); withDecimal(this.value, 'add-patri-expense-amount')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="add-patri-expense-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Add Expense</button>
        </form>
      </div>

      <div class="col-md-3" id="editPatriExpesne" style="background: rgb(255 247 153);padding: 14px;border: 1px solid #cddede;border-radius: 8px;display: none">
        <h3>Edit Patri Expense</h3>
        <form method="post" action="<?=base_url('factory/editPatriExpense')?>" id="">
          <input type="hidden" name="seasonId" value="<?=$seasonId?>">
          <input type="hidden" name="expenseId" id="expenseIdPatri" value="">
          <input type="hidden" name="url" id="url_patri_expense" value="">
          <input type="radio"  name="patriType" value="tenKGcotton" id="tenKGcottonPatriEdit" checked><strong>10 KG Cotton</strong>&nbsp;&nbsp;
          <input type="radio"  name="patriType" value="tenKGphati" id="tenKGphatiPatriEdit"><strong>10 KG Phati</strong>&nbsp;&nbsp;<br>
          <input type="radio"  name="patriType" value="eightKGphati" id="eightKGphatiPatriEdit"><strong>8 KG Phati</strong><br>
          <label>Expense Date</label>
          <input type="text" name="expenseDate" id="expenseDatePatriEdit" class="form-control date-masking" />
          <label>Quantity 10KG Cotton</label>
          <input type="text" name="quantity" id="quantityPatriEdit" oninput="seprator(this); withDecimal(this.value, 'edit-patri-expense-quantity')" class="form-control" placeholder="Enter quantity" /> 
          <span id="edit-patri-expense-quantity" style="color:black;font-weight: bold;display: none"></span>
          <label>Per Price</label>
          <input type="text" name="expenseAmount" id="expenseAmountPatriEdit" oninput="seprator(this); withDecimal(this.value, 'edit-patri-expense-amount')" class="form-control" placeholder="Enter perday amount" /> 
          <span id="edit-patri-expense-amount" style="color:black;font-weight: bold;display: none"></span>
          <button class="btn btn-small btn-warning mt-2" type="submit">Edit Expense</button>
        </form>
      </div>
      <div class="col-md-9">
        <table class="table table-bordered table-sm datatable">
          <thead class="bg-white">
            <tr>
              <th>#</th>
              <th>Expense Date</th>
              <th>Type</th>
              <th>Quantity</th>
              <th>Per Amount</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-striped">
            <?php
            if(count($patriExpense)==0)
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
              foreach($patriExpense as $patri):
                $attendanceStatistics = attendanceStatistics($patri->id, 7);
                ?>
                <tr id="patri_expense_row_<?=$patri->id?>"
                <?php if($patri->id == $this->session->userdata('updated-patri-expense'))
                { 
                  echo 'class="recentlyUpdated"';
                } ?>
                >
                <td><?php echo $count;?></td>
                <td><?=dateConvertDMY($patri->expenseDate)?></td>
                <td>
                <?php
                  if($patri->patriExpenseType == 1)
                  {
                    echo '10 KG Cotton';
                  }
                  else if($patri->patriExpenseType == 2)
                  {
                    echo '10 KG Phati';
                  }
                  if($patri->patriExpenseType == 3)
                  {
                    echo '8 KG Phati';
                  }
                ?>
                </td>
                <td><?=numberFormat($patri->quantity)?></td>
                <td><?=numberFormat($patri->expenseAmount)?></td>
                <td><?=numberFormat($patri->totalAmount)?></td>
                <td>
                  <a href="" class="bg-dark mb-1 editPatriExpense" this-id="<?=$patri->id?>" this-url="<?=$url?>">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$patri->id.'/'.$url.'/personal_staff')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
                    <i class="fa fa-trash" style="padding: 5px;color: white;cursor: pointer" aria-hidden="true"></i>
                  </a>
                </td>
              </tr>
              <?php
              $count++;
            endforeach;
            $this->session->unset_userdata('updated-patri-expense');
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
      <form id="addPumpTransaction" method="POST" action="<?=base_url('factory/addPumpTransaction')?>" enctype="multipart/form-data">
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
                  <a href="<?=base_url('factory/'.$seasonId.'/edit-pump-expense/'.$pumpExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i></a>
                    <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$pumpExpense->id.'/'.$url.'/pump_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
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
      <form id="addPersonalExpense" method="POST" action="<?=base_url('factory/addPersonalExpense')?>" enctype="multipart/form-data">
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
                  <a href="<?=base_url('factory/'.$seasonId.'/edit-personal-expense/'.$personalExpense->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$personalExpense->id.'/'.$url.'/personal_car_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
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

        <a href="<?=base_url('factory/add-expense/other/'.$seasonId)?>" class="btn btn-warning float-right mb-3">Add Expense</a>
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
                   <a href="<?=base_url('other-expense-factory/'.$seasonId.'/edit/'.$transportOther->id)?>" class="bg-dark">
                    <i class="fa fa-edit" style="padding: 5px;color: white" aria-hidden="true"></i>
                  </a>
                  <a data-href="<?=base_url('CommonController/GLOBAL_DELETE/expenses_factory/'.$transportOther->id.'/'.$url.'/other_list')?>" data-toggle="modal" data-target="#confirm-delete" class="bg-dark">
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


  $('.editPattiExpense').click(function(e){
    e.preventDefault();
    $('tr').removeClass('activeForEdit');
    var expenseId = $(this).attr('this-id');
    var link      = $(this).attr('this-url');
    var table = 'expenses_factory';
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('CommonController/getRecord')?>", 
        data: {id:expenseId,table:table},
        dataType: "json",
        success: function(response) 
        {
          $('#addPattiExpesne').hide();
          $('#editPattiExpesne').show();
          $('#expenseIdPatti').val(expenseId);
          $('#expenseDatePattiEdit').val(response.data.expenseDate);
          $('#quantityPattiEdit').val(response.data.quantity);
          $('#expenseAmountPattiEdit').val(response.data.expenseAmount);
          $('#expenseAmountPattiEdit').focus();
          $('#url_patti_expense').val(link);
          $('#patti_expense_row_'+expenseId).addClass('activeForEdit');

        },
        error: function()
        {
          console.log('ERROR');
        }
      });
  });

  


  $('.editPatriExpense').click(function(e){
    e.preventDefault();
    $('tr').removeClass('activeForEdit');
    var expenseId = $(this).attr('this-id');
    var link      = $(this).attr('this-url');
    var table = 'expenses_factory';
      $.ajax({              //request ajax
        type: "POST",
        url: "<?=base_url('CommonController/getRecord')?>", 
        data: {id:expenseId,table:table},
        dataType: "json",
        success: function(response) 
        {
          $('#addPatriExpesne').hide();
          $('#editPatriExpesne').show();
          $('#expenseIdPatri').val(expenseId);
          if(response.data.patriExpenseType == 1)
          {
            $('#tenKGcottonPatriEdit').attr('checked', 'true');
          }
          else if(response.data.patriExpenseType == 2)
          {
            $('#tenKGphatiPatriEdit').attr('checked', 'true');
          }
          else if(response.data.patriExpenseType == 3)
          {
            $('#eightKGphatiPatriEdit').attr('checked', 'true');
          }

          $('#expenseDatePatriEdit').val(response.data.expenseDate);
          $('#quantityPatriEdit').val(response.data.quantity);
          $('#expenseAmountPatriEdit').val(response.data.expenseAmount);
          $('#expenseAmountPatriEdit').focus();
          $('#url_patri_expense').val(link);
          $('#patri_expense_row_'+expenseId).addClass('activeForEdit');

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