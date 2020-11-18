<!DOCTYPE html>
<html lang="en-US">
<!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
<head>
  <title>Dashboard</title>
  <?php $this->load->view('includes/header-includes.php'); ?>
</head>
<body class="dashbaord-body">

  <!-- left menu -->
  <?php $this->load->view('includes/left-menu.php'); ?>

  <div class="dashboard-content">

    <h1>My Dashboard <small>Season Detail</small></h1>
    <div class="form-group">
      <div class="inline-dropdown">
        <select class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>home/switchSeason/'+this.value;">
          <?php
          if(count($seasons) == 0)
          {
          ?>
            <option value="">__Blank</option>
          <?php
          }
          else
          {
            foreach($seasons as $season): ?>
              <option value="<?=$season->id?>" <?php if($season->id == $this->session->userdata('selected_season')) echo 'selected';?>>
                <?=$season->season?>  
              </option>
              <?php endforeach; 
          }
          ?>
        </select>
      </div>  
    </div>

    <div class="row">
      <div class="col-md-8">
        <!-- stackChart -->
        <div class="box-shaded">
          <div class="row">
            <div class="col-md-12 text-center mb-2">
              <h3>Season Detail (<?=$selectedSeason?>)</h3>
              <h4 class="bg-dark text-white">Gardens Detail</h4>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <div style="background: #f09dff;padding: 8px;border: 1px solid #ffd3fa;border-radius: 8px;">
                <h5>Gardens</h5>
                Total Purchase: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['gardensStatistics']->totalPurchaseAmount == '' || $seasonStatistics['gardensStatistics']->totalPurchaseAmount == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['gardensStatistics']->totalPurchaseAmount);
                  ?>
                </strong><br>
                Total Gardens: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['gardensStatistics']->totalGardens == '' || $seasonStatistics['gardensStatistics']->totalGardens == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['gardensStatistics']->totalGardens;
                  ?>
                </strong><br>
                Total Bayana: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['gardensStatistics']->totalBayana == '' || $seasonStatistics['gardensStatistics']->totalBayana == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['gardensStatistics']->totalBayana);
                  ?>
                </strong><br>
                Total Acre: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['gardensStatistics']->totalAcre == '' || $seasonStatistics['gardensStatistics']->totalAcre == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['gardensStatistics']->totalAcre;
                  ?>
                </strong><br>
                Total Paid: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['totalPaidForGardens'] == '' || $seasonStatistics['totalPaidForGardens'] == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['totalPaidForGardens']);
                  ?>
                </strong><br>
              </div>
            </div>

              <div class="col-md-4">
                <div style="background: #f4ffb8;padding: 8px;border: 1px solid #e6eaa4;border-radius: 8px;">
                  <h5>Transports</h5>
                  Total Transports: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['transportExpensesStatistics']->totalTransport == '' || $seasonStatistics['transportExpensesStatistics']->totalTransport == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['transportExpensesStatistics']->totalTransport;
                    ?>
                  </strong><br>
                  Total Presents: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['transportExpensesStatistics']->totalPresent == '' || $seasonStatistics['transportExpensesStatistics']->totalPresent == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['transportExpensesStatistics']->totalPresent;
                    ?>
                  </strong><br>
                  Total Rent: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['transportExpensesStatistics']->totalAmountToPaid == '' || $seasonStatistics['transportExpensesStatistics']->totalAmountToPaid == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['transportExpensesStatistics']->totalAmountToPaid);
                    ?>
                  </strong><br>
                  Total Paid: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['transportExpensesStatistics']->totalPaid == '' || $seasonStatistics['transportExpensesStatistics']->totalPaid == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['transportExpensesStatistics']->totalPaid);
                    ?>
                  </strong><br>
                  Total Pending: 
                  <strong class="float-right">
                    <?php
                        echo numberFormat($seasonStatistics['transportExpensesStatistics']->totalAmountToPaid - $seasonStatistics['transportExpensesStatistics']->totalPaid);
                    ?>
                  </strong><br>
                </div>
              </div>

              <div class="col-md-4">
                <div style="background: #b1ff9d;padding: 8px;border: 1px solid #7cda75;border-radius: 8px;">
                  <h5>Labours</h5>
                  Total Foreman: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['labourExpensesStatistics']->totalForeman == '' || $seasonStatistics['labourExpensesStatistics']->totalForeman == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['labourExpensesStatistics']->totalForeman);
                    ?>
                  </strong><br>
                  Total Labours: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['labourExpensesStatistics']->totalLabours == '' || $seasonStatistics['labourExpensesStatistics']->totalLabours == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['labourExpensesStatistics']->totalLabours);
                    ?>
                  </strong><br>
                  Total Presents: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['labourExpensesStatistics']->totalLabourPresent == '' || $seasonStatistics['labourExpensesStatistics']->totalLabourPresent == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['labourExpensesStatistics']->totalLabourPresent);
                    ?>
                  </strong><br>
                  Total Rent: 
                  <strong class="float-right">
                    <?php
                        echo numberFormat($seasonStatistics['labourExpensesStatistics']->totalAmountForeman + $seasonStatistics['labourExpensesStatistics']->totalLabourAmount);
                    ?>
                  </strong><br>
                  Total Pending: 
                  <strong class="float-right">
                    <?php
                        echo numberFormat($seasonStatistics['labourExpensesStatistics']->totalAmountForeman + $seasonStatistics['labourExpensesStatistics']->totalLabourAmount);
                    ?>
                  </strong><br>
                </div>
              </div>
          </div>

          <div class="row mb-2">
            <div class="col-md-4">
              <div style="background: #9cfffa;padding: 8px;border: 1px solid #a5f7f3;border-radius: 8px;">
                <h5>Personal Staff</h5>
                Total Members: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetail']->totalMembers == '' || $seasonStatistics['personalStaffExpenseDetail']->totalMembers == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetail']->totalMembers);
                  ?>
                </strong><br>
                Total Presents: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetail']->totalPresent == '' || $seasonStatistics['personalStaffExpenseDetail']->totalPresent == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['personalStaffExpenseDetail']->totalPresent;
                  ?>
                </strong><br>
                Total Rent: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetail']->totalAmountToPaid == '' || $seasonStatistics['personalStaffExpenseDetail']->totalAmountToPaid == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetail']->totalAmountToPaid);
                  ?>
                </strong><br>
                Total Paid: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetail']->totalPaid == '' || $seasonStatistics['personalStaffExpenseDetail']->totalPaid == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['personalStaffExpenseDetail']->totalPaid;
                  ?>
                </strong><br>
                Total Pending: 
                <strong class="float-right">
                  <?php
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetail']->totalAmountToPaid - $seasonStatistics['personalStaffExpenseDetail']->totalPaid);
                  ?>
                </strong><br>
              </div>
            </div>

              <div class="col-md-4">
                <div style="background: #ffa4ca;padding: 8px;border: 1px solid #f9accc;border-radius: 8px;">
                  <h5>Pump Expense</h5>
                  Total Expenses: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['pumpExpenseStatistics']->totalExpense == '' || $seasonStatistics['pumpExpenseStatistics']->totalExpense == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['pumpExpenseStatistics']->totalExpense;
                    ?>
                  </strong><br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['pumpExpenseStatistics']->totalExpenseAmount == '' || $seasonStatistics['pumpExpenseStatistics']->totalExpenseAmount == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['pumpExpenseStatistics']->totalExpenseAmount);
                    ?>
                  </strong><br>
                  <h5>Personal Car</h5>
                  Total Foreman: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['personalCarExpense']->totalExpense == '' || $seasonStatistics['personalCarExpense']->totalExpense == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['personalCarExpense']->totalExpense);
                    ?>
                  </strong><br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['personalCarExpense']->totalExpenseAmount == '' || $seasonStatistics['personalCarExpense']->totalExpenseAmount == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['personalCarExpense']->totalExpenseAmount);
                    ?>
                  </strong><br>
                </div>
              </div>

              <div class="col-md-4">
                <div style="background: #b9cce8;padding: 8px;border: 1px solid #b2cdf5;border-radius: 8px;">
                  <h5>Other Expenses</h5>
                  Total Expenses: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['otherExpense']->totalExpense == '' || $seasonStatistics['otherExpense']->totalExpense == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['otherExpense']->totalExpense;
                    ?>
                  </strong><br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['otherExpense']->totalExpenseAmount == '' || $seasonStatistics['otherExpense']->totalExpenseAmount == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['otherExpense']->totalExpenseAmount);
                    ?>
                  </strong>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center mb-2">
              <h4 class="bg-dark text-white">Factory Detail</h4>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-12">
              <div style="background: #f7ffb5;padding: 8px;border: 1px solid #f9eded;border-radius: 8px;">
                <h5 class="text-center">Kinow Production</h5>
                <div class="row">
                  <div class="col-md-4">
                    <h6 class="text-center bg-secondary text-white">Phati 8KG</h6>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">48</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fourtyEight_first == '' || $seasonStatistics['seasonProductionStatistics']->fourtyEight_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fourtyEight_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">56</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fiftySix_first == '' || $seasonStatistics['seasonProductionStatistics']->fiftySix_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fiftySix_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">64</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->sixtyFour_first == '' || $seasonStatistics['seasonProductionStatistics']->sixtyFour_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->sixtyFour_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">72</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->seventyTwo_first == '' || $seasonStatistics['seasonProductionStatistics']->seventyTwo_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->seventyTwo_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">80</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->eighty_first == '' || $seasonStatistics['seasonProductionStatistics']->eighty_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->eighty_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">90</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->ninety_first == '' || $seasonStatistics['seasonProductionStatistics']->ninety_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->ninety_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">100</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundred_first == '' || $seasonStatistics['seasonProductionStatistics']->hundred_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundred_first;
                        ?>
                      </strong>
                      <br>
                      Phati 8KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">110</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundredAndTen_first == '' || $seasonStatistics['seasonProductionStatistics']->hundredAndTen_first == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundredAndTen_first;
                        ?>
                      </strong>
                  </div>
                  <div class="col-md-4">
                    <h6 class="text-center  bg-secondary text-white">Phati 10KG</h6>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">48</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fourtyEight_second == '' || $seasonStatistics['seasonProductionStatistics']->fourtyEight_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fourtyEight_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">56</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fiftySix_second == '' || $seasonStatistics['seasonProductionStatistics']->fiftySix_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fiftySix_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">64</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->sixtyFour_second == '' || $seasonStatistics['seasonProductionStatistics']->sixtyFour_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->sixtyFour_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">72</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->seventyTwo_second == '' || $seasonStatistics['seasonProductionStatistics']->seventyTwo_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->seventyTwo_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">80</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->eighty_second == '' || $seasonStatistics['seasonProductionStatistics']->eighty_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->eighty_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">90</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->ninety_second == '' || $seasonStatistics['seasonProductionStatistics']->ninety_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->ninety_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">100</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundred_second == '' || $seasonStatistics['seasonProductionStatistics']->hundred_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundred_second;
                        ?>
                      </strong>
                      <br>
                      Phati 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">110</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundredAndTen_second == '' || $seasonStatistics['seasonProductionStatistics']->hundredAndTen_second == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundredAndTen_second;
                        ?>
                      </strong>
                  </div>

                  <div class="col-md-4">
                    <h6 class="text-center  bg-secondary text-white">Cotton 10KG</h6>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">42</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fourtyTwo_cotton == '' || $seasonStatistics['seasonProductionStatistics']->fourtyTwo_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fourtyTwo_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">48</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fourtyEight_cotton == '' || $seasonStatistics['seasonProductionStatistics']->fourtyEight_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fourtyEight_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">56</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->fiftySix_cotton == '' || $seasonStatistics['seasonProductionStatistics']->fiftySix_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->fiftySix_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">60</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->sixty_cotton == '' || $seasonStatistics['seasonProductionStatistics']->sixty_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->sixty_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">66</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->sixtySix_cotton == '' || $seasonStatistics['seasonProductionStatistics']->sixtySix_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->sixtySix_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">72</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->seventyTwo_cotton == '' || $seasonStatistics['seasonProductionStatistics']->seventyTwo_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->seventyTwo_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">80</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->eighty_cotton == '' || $seasonStatistics['seasonProductionStatistics']->eighty_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->eighty_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">90</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->ninety_cotton == '' || $seasonStatistics['seasonProductionStatistics']->ninety_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->ninety_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">100</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundred_cotton == '' || $seasonStatistics['seasonProductionStatistics']->hundred_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundred_cotton;
                        ?>
                      </strong>
                      <br>
                      Cotton 10KG <span style="color:white;background:#0e0e01;font-weight:bold;padding:2px;border-radius:5px;margin-bottom:2px">110</span>: 
                      <strong class="float-right">
                        <?php
                          if($seasonStatistics['seasonProductionStatistics']->hundredAndTen_cotton == '' || $seasonStatistics['seasonProductionStatistics']->hundredAndTen_cotton == 0)
                            echo '-';
                          else
                            echo $seasonStatistics['seasonProductionStatistics']->hundredAndTen_cotton;
                        ?>
                      </strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
              <div class="col-md-4">
                <div style="background: #ffefef;padding: 8px;border: 1px solid #f9eded;border-radius:8px">
                  <h5>Kinow In</h5>
                  Total Maan: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['kinowProductionStatistics']->totalMaan == '' || $seasonStatistics['kinowProductionStatistics']->totalMaan == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['kinowProductionStatistics']->totalMaan;
                    ?>
                  </strong><br>
                  Category A: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['kinowProductionStatistics']->totalCatA == '' || $seasonStatistics['kinowProductionStatistics']->totalCatA == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['kinowProductionStatistics']->totalCatA);
                    ?>
                  </strong>
                  <br>
                  Category B: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['kinowProductionStatistics']->totalCatB == '' || $seasonStatistics['kinowProductionStatistics']->totalCatB == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['kinowProductionStatistics']->totalCatB);
                    ?>
                  </strong>
                  <br>
                  <br>
                </div>
              </div>
              <div class="col-md-4">
                <div style="background: #f9cc9e;padding: 8px;border: 1px solid #fdd6ae;border-radius: 8px;">
                  <h5>Purchases Items</h5>
                  Total Suppliers: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['seasonPurchasesStatistics']->totalSuppliers == '' || $seasonStatistics['seasonPurchasesStatistics']->totalSuppliers == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['seasonPurchasesStatistics']->totalSuppliers;
                    ?>
                  </strong>
                  <br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['seasonPurchasesStatistics']->seasonTotalPurchases == '' || $seasonStatistics['seasonPurchasesStatistics']->seasonTotalPurchases == 0)
                        echo '0';
                      else
                        echo numberFormat($seasonStatistics['seasonPurchasesStatistics']->seasonTotalPurchases);
                    ?>
                  </strong><br>
                  Total Paid: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['seasonPurchasesStatistics']->seasonTotalPaid == '' || $seasonStatistics['seasonPurchasesStatistics']->seasonTotalPaid == 0)
                        echo '0';
                      else
                        echo $seasonStatistics['seasonPurchasesStatistics']->seasonTotalPaid;
                    ?>
                  </strong><br>
                 Total Pending: 
                  <strong class="float-right">
                    <?php
                        echo numberFormat($seasonStatistics['seasonPurchasesStatistics']->seasonTotalPurchases - $seasonStatistics['seasonPurchasesStatistics']->seasonTotalPaid);
                    ?>
                  </strong>
                  <br>
                </div>
          </div>
          <div class="col-md-4">
            <div style="background: #d2d2d2;padding: 8px;border: 1px solid #e2e2e2;border-radius: 8px;">
              <h5>Sales</h5>
              Sales Amount: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['salesStatistics']->totalAmount == '' || $seasonStatistics['salesStatistics']->totalAmount == 0)
                    echo '0';
                  else
                    echo numberFormat($seasonStatistics['salesStatistics']->totalAmount);
                ?>
              </strong><br>
              Total Sales: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['salesStatistics']->totalSeasonSales == '' || $seasonStatistics['salesStatistics']->totalSeasonSales == 0)
                    echo '-';
                  else
                    echo numberFormat($seasonStatistics['salesStatistics']->totalSeasonSales);
                ?>
              </strong><br>
              Total Today Sales: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['salesStatistics']->totalTodaySales == '' || $seasonStatistics['salesStatistics']->totalTodaySales == 0)
                    echo '-';
                  else
                    echo numberFormat($seasonStatistics['salesStatistics']->totalTodaySales);
                ?>
              </strong>
              <br>
              <br>
            </div>
          </div>
        </div>

          <div class="row mb-2">
            <div class="col-md-4">
              <div style="background: #c79181;padding: 8px;border: 1px solid #dca494;border-radius: 8px;">
                <h5>Factory Transport</h5>
                Total Transports: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['transportExpensesStatisticsFactory']->totalTransport == '' || $seasonStatistics['transportExpensesStatisticsFactory']->totalTransport == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['transportExpensesStatisticsFactory']->totalTransport);
                  ?>
                </strong><br>
                Total Presents:
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['transportExpensesStatisticsFactory']->totalPresent == '' || $seasonStatistics['transportExpensesStatisticsFactory']->totalPresent == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['transportExpensesStatisticsFactory']->totalPresent;
                  ?>
                </strong><br>
                Total Rent: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['transportExpensesStatisticsFactory']->totalAmountToPaid == '' || $seasonStatistics['transportExpensesStatisticsFactory']->totalAmountToPaid == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['transportExpensesStatisticsFactory']->totalAmountToPaid);
                  ?>
                </strong><br>
                Total Paid: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['transportExpensesStatisticsFactory']->totalPaid == '' || $seasonStatistics['transportExpensesStatisticsFactory']->totalPaid == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['transportExpensesStatisticsFactory']->totalPaid);
                  ?>
                </strong><br>
                Total Pending: 
                <strong class="float-right">
                  <?php
                      echo numberFormat($seasonStatistics['transportExpensesStatisticsFactory']->totalAmountToPaid - $seasonStatistics['transportExpensesStatisticsFactory']->totalPaid);
                  ?>
                </strong><br>
              </div>
            </div>
            <div class="col-md-4">
              <div style="background: #E0ABD1;padding: 8px;border: 1px solid #e8b9db;border-radius: 8px;">
                <h5>Labours</h5>
                Total Foreman: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['labourExpensesStatisticsFactory']->totalForeman == '' || $seasonStatistics['labourExpensesStatisticsFactory']->totalForeman == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['labourExpensesStatisticsFactory']->totalForeman);
                  ?>
                </strong><br>
                Total Labours: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['labourExpensesStatisticsFactory']->totalLabours == '' || $seasonStatistics['labourExpensesStatisticsFactory']->totalLabours == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['labourExpensesStatisticsFactory']->totalLabours);
                  ?>
                </strong><br>
                Total Presents: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['labourExpensesStatisticsFactory']->totalLabourPresent == '' || $seasonStatistics['labourExpensesStatisticsFactory']->totalLabourPresent == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['labourExpensesStatisticsFactory']->totalLabourPresent);
                  ?>
                </strong><br>
                Total Rent: 
                <strong class="float-right">
                  <?php
                      echo numberFormat($seasonStatistics['labourExpensesStatisticsFactory']->totalAmountForeman + $seasonStatistics['labourExpensesStatisticsFactory']->totalLabourAmount);
                  ?>
                </strong><br>
                Total Pending: 
                <strong class="float-right">
                  <?php
                      echo numberFormat($seasonStatistics['labourExpensesStatisticsFactory']->totalAmountForeman + $seasonStatistics['labourExpensesStatisticsFactory']->totalLabourAmount);
                  ?>
                </strong><br>
              </div>
            </div>
            <div class="col-md-4">
              <div style="background: #f09dff;padding: 8px;border: 1px solid #ffd3fa;border-radius: 8px;">
                <h5>Personal Staff</h5>
                Total Members: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetailFactory']->totalMembers == '' || $seasonStatistics['personalStaffExpenseDetailFactory']->totalMembers == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetailFactory']->totalMembers);
                  ?>
                </strong><br>
                Total Presents: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetailFactory']->totalPresent == '' || $seasonStatistics['personalStaffExpenseDetailFactory']->totalPresent == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['personalStaffExpenseDetailFactory']->totalPresent;
                  ?>
                </strong><br>
                Total Rent: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetailFactory']->totalAmountToPaid == '' || $seasonStatistics['personalStaffExpenseDetailFactory']->totalAmountToPaid == 0)
                      echo '-';
                    else
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetailFactory']->totalAmountToPaid);
                  ?>
                </strong><br>
                Total Paid: 
                <strong class="float-right">
                  <?php
                    if($seasonStatistics['personalStaffExpenseDetailFactory']->totalPaid == '' || $seasonStatistics['personalStaffExpenseDetailFactory']->totalPaid == 0)
                      echo '-';
                    else
                      echo $seasonStatistics['personalStaffExpenseDetailFactory']->totalPaid;
                  ?>
                </strong><br>
                Total Pending: 
                <strong class="float-right">
                  <?php
                      echo numberFormat($seasonStatistics['personalStaffExpenseDetailFactory']->totalAmountToPaid - $seasonStatistics['personalStaffExpenseDetailFactory']->totalPaid);
                  ?>
                </strong><br>
              </div>
            </div>
          </div>

          <div class="row mb-2">
              <div class="col-md-4">
                <div style="background: #dbdbff;padding: 8px;border: 1px solid #dbdbf7;border-radius: 8px;">
                  <h5>Pump Expense</h5>
                  Total Expenses: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['pumpExpenseStatisticsFactory']->totalExpense == '' || $seasonStatistics['pumpExpenseStatisticsFactory']->totalExpense == 0)
                        echo '-';
                      else
                        echo $seasonStatistics['pumpExpenseStatisticsFactory']->totalExpense;
                    ?>
                  </strong><br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['pumpExpenseStatisticsFactory']->totalExpenseAmount == '' || $seasonStatistics['pumpExpenseStatisticsFactory']->totalExpenseAmount == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['pumpExpenseStatisticsFactory']->totalExpenseAmount);
                    ?>
                  </strong><br>
                  <h5>Personal Car</h5>
                  Total Foreman: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['personalCarExpenseFactory']->totalExpense == '' || $seasonStatistics['personalCarExpenseFactory']->totalExpense == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['personalCarExpenseFactory']->totalExpense);
                    ?>
                  </strong><br>
                  Total Amount: 
                  <strong class="float-right">
                    <?php
                      if($seasonStatistics['personalCarExpenseFactory']->totalExpenseAmount == '' || $seasonStatistics['personalCarExpenseFactory']->totalExpenseAmount == 0)
                        echo '-';
                      else
                        echo numberFormat($seasonStatistics['personalCarExpenseFactory']->totalExpenseAmount);
                    ?>
                  </strong><br>
                </div>
          </div>
          <div class="col-md-4">
            <div style="background: #CDDEDE;padding: 8px;border: 1px solid #cddede;border-radius: 8px;">
              <h5>Other Expenses</h5>
              Total Expenses: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['otherExpenseFactory']->totalExpense == '' || $seasonStatistics['otherExpenseFactory']->totalExpense == 0)
                    echo '-';
                  else
                    echo $seasonStatistics['otherExpenseFactory']->totalExpense;
                ?>
              </strong><br>
              Total Amount: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['otherExpenseFactory']->totalExpenseAmount == '' || $seasonStatistics['otherExpenseFactory']->totalExpenseAmount == 0)
                    echo '-';
                  else
                    echo numberFormat($seasonStatistics['otherExpenseFactory']->totalExpenseAmount);
                ?>
              </strong>
              <br>
              <br>
              <br>
              <br>
            </div>
          </div>
          <div class="col-md-4">
            <div style="background: #CDDEDE;padding: 8px;border: 1px solid #cddede;border-radius: 8px;">
              <h5>Patti Expense</h5>
              Total Expenses: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['pattiExpenseFactory']->totalExpense == '' || $seasonStatistics['pattiExpenseFactory']->totalExpense == 0)
                    echo '-';
                  else
                    echo $seasonStatistics['pattiExpenseFactory']->totalExpense;
                ?>
              </strong><br>
              Total Amount: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['pattiExpenseFactory']->totalExpenseAmount == '' || $seasonStatistics['pattiExpenseFactory']->totalExpenseAmount == 0)
                    echo '-';
                  else
                    echo numberFormat($seasonStatistics['pattiExpenseFactory']->totalExpenseAmount);
                ?>
              </strong><br>
              <h5>Patri Expense</h5>
              Total Expenses: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['patriExpenseFactory']->totalExpense == '' || $seasonStatistics['patriExpenseFactory']->totalExpense == 0)
                    echo '-';
                  else
                    echo $seasonStatistics['patriExpenseFactory']->totalExpense;
                ?>
              </strong><br>
              Total Amount: 
              <strong class="float-right">
                <?php
                  if($seasonStatistics['patriExpenseFactory']->totalExpenseAmount == '' || $seasonStatistics['patriExpenseFactory']->totalExpenseAmount == 0)
                    echo '-';
                  else
                    echo numberFormat($seasonStatistics['patriExpenseFactory']->totalExpenseAmount);
                ?>
              </strong><br>
            </div>
          </div>
        </div>
      </div>

      </div>
      <div class="col-md-4">
        <div class="property-info-inline">
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
          Alerts <br><br><br>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('footer-simple.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Credit/Debit', 'Bank Transfer', 'Cash', 'Cheque', 'Crypto'],
          datasets: [{
                //label: 'Payment Mediums',
                data: [12, 19, 3, 5, 2],
                backgroundColor: [
                '#0984E3',
                '#FF785C',
                '#F9EA71',
                '#00D0A9',
                '#777C80',
                ],
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          });

    // stack chart
    var stackC = document.getElementById('stackChart');
    var stackChart = new Chart(ctx, {
      data: {
        datasets: [
            {fill: 'origin'},      // 0: fill to 'origin'
            {fill: '+2'},          // 1: fill to dataset 3
            {fill: 1},             // 2: fill to dataset 1
            {fill: false},         // 3: no fill
            {fill: '-2'}           // 4: fill to dataset 2
            ]
          },
          options: {
            plugins: {
              filler: {
                propagate: true
              }
            }
          }
        });
      </script>
    </body>
    </html>