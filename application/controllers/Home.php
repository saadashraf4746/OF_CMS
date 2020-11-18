<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
		if(admin_not_logged_in())
		{
			redirect(base_url('login'));
		}

		$this->load->model('Seasons_model');
		$this->load->model('Factory_model');
		$this->load->model('Common_model');
		$seasons = $this->Seasons_model->seasonsList();
		if(!$this->session->userdata('selected_season'))
		{
			if(count($seasons) > 0)
			{
				$this->session->set_userdata('selected_season', $seasons[0]->id);
			}
			else
			{
				$this->session->set_userdata('selected_season', '');
			}
		}

		$this->autoAttandance();

    }

	public function index()
	{
		$data['dir']   = $this->session->userdata('site_lang') == 'english' ? 'ltr' : 'rtl';
		$data['float'] = $this->session->userdata('site_lang') == 'english' ? 'left' : 'right';
		$data['heading']     = 'Manage Seasons';
		$data['headTittle']  = 'Manage Seasons';
		$data['seasons'] = $this->Seasons_model->seasonsList();
		$data['selectedSeason']  = $this->Seasons_model->getSeason($this->session->userdata('selected_season'));
		$data['seasonStatistics'] = $this->factoryStatictics($this->session->userdata('selected_season'));
		// echo "<pre>";
		// print_r($data['seasonStatistics']);
		// echo "</pre>";
		// die;
		$this->load->view('dashboard', $data);
	}

	public function autoAttandance()
	{
		$gardenTransports  = $this->Seasons_model->getExpenseAttance('expenses', 1);
		$factoryTransports = $this->Seasons_model->getExpenseAttance('expenses_factory', 1);
		$gardenLabours      = $this->Seasons_model->getStaffExpense('staff', 2);
		$personallStaffs    = $this->Seasons_model->getStaffExpense('staff', 3);
		$factoryLabours     = $this->Seasons_model->getStaffExpense('staff', 5);
		$factoryPersonalStaffs  = $this->Seasons_model->getStaffExpense('staff', 6);

		if(count($gardenTransports) > 0)
		{
			foreach($gardenTransports as $gardenTransport)
			{
				if($gardenTransport->isTransportEnd != 1)
				{
					$strtDate = $gardenTransport->transportStartDate;
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance($gardenTransport->id, 1 ,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $gardenTransport->transportHireAmount,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, $gardenTransport->id, 1, $strtDate);
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => $gardenTransport->id,
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $gardenTransport->transportHireAmount,
					        	'managing'       => 1
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }
				}
			}
		}

		if(count($factoryTransports) > 0)
		{
			foreach($factoryTransports as $factoryTransport)
			{
				if($factoryTransport->isTransportEnd != 1)
				{
					$strtDate = $factoryTransport->transportStartDate;
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance($factoryTransport->id, 6 ,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $factoryTransport->transportHireAmount,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, $factoryTransport->id, 6, $strtDate);
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => $factoryTransport->id,
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $factoryTransport->transportHireAmount,
					        	'managing'       => 6
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }
				}
			}
		}

		if(count($gardenLabours) > 0)
		{
			foreach($gardenLabours as $gardenLabour)
			{
				$foreman = $this->Common_model->getRecord($gardenLabour->foremanId, 'staff');
				if($foreman->ifSessionEnd != 1)
				{
					if($gardenLabour->ifSessionEnd != 1)
					{
						$strtDate = $gardenLabour->startDate;
						$endDate  = date('Y-m-d');
					  	while (strtotime($strtDate) <= strtotime($endDate)) 
					  	{
					  		if($this->Seasons_model->checkAttendance($gardenLabour->id, 3 ,$strtDate))
					  		{
						        $updateAttendance = array
						        (
						        	'perDayAmount'	 => $gardenLabour->perdayAmount,
						        );
						        $this->Seasons_model->updateAttendance($updateAttendance, $gardenLabour->id, 3, $strtDate);
					  		}
					  		else
					  		{
						        $attendanceData = array
						        (
						        	'attendanceOfId' => $gardenLabour->id,
						        	'attendanceDate' => $strtDate,
						        	'attendance'     => 1,
						        	'perDayAmount'	 => $gardenLabour->perdayAmount,
						        	'managing'       => 3
						        );
						        $this->Seasons_model->addAttendence($attendanceData);
					  		}
					        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
					    }
					}
				}
			}
		}

		if(count($personallStaffs) > 0)
		{
			foreach($personallStaffs as $personallStaff)
			{
				if($personallStaff->ifSessionEnd != 1)
				{
					$strtDate = $personallStaff->startDate;
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance($personallStaff->id, 4 ,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $personallStaff->perdayAmount,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, $personallStaff->id, 4, $strtDate);
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => $personallStaff->id,
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $personallStaff->perdayAmount,
					        	'managing'       => 4
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }
				}
			}
		}

		if(count($factoryLabours) > 0)
		{
			foreach($factoryLabours as $factoryLabour)
			{
				$foreman = $this->Common_model->getRecord($factoryLabour->foremanId, 'staff');
				if($foreman->ifSessionEnd != 1)
				{
					if($factoryLabour->ifSessionEnd != 1)
					{
						$strtDate = $factoryLabour->startDate;
						$endDate  = date('Y-m-d');
					  	while (strtotime($strtDate) <= strtotime($endDate)) 
					  	{
					  		if($this->Seasons_model->checkAttendance($factoryLabour->id, 5, $strtDate))
					  		{
						        $updateAttendance = array
						        (
						        	'perDayAmount'	 => $factoryLabour->perdayAmount,
						        );
						        $this->Seasons_model->updateAttendance($updateAttendance, $factoryLabour->id, 5, $strtDate);
					  		}
					  		else
					  		{
						        $attendanceData = array
						        (
						        	'attendanceOfId' => $factoryLabour->id,
						        	'attendanceDate' => $strtDate,
						        	'attendance'     => 1,
						        	'perDayAmount'	 => $factoryLabour->perdayAmount,
						        	'managing'       => 5
						        );
						        $this->Seasons_model->addAttendence($attendanceData);
					  		}
					        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
					    }
					}
				}
			}
		}

		if(count($factoryPersonalStaffs) > 0)
		{
			foreach($factoryPersonalStaffs as $factoryPersonalStaff)
			{
				if($factoryPersonalStaff->ifSessionEnd != 1)
				{
					$strtDate = $factoryPersonalStaff->startDate;
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance($factoryPersonalStaff->id, 7, $strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $factoryPersonalStaff->perdayAmount,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, $factoryPersonalStaff->id, 7, $strtDate);
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => $factoryPersonalStaff->id,
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $factoryPersonalStaff->perdayAmount,
					        	'managing'       => 7
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }
				}
			}
		}

	}

    function switchSeason($seasonId)
    {
        $this->session->set_userdata('selected_season', $seasonId);
        redirect($_SERVER['HTTP_REFERER']);    
    }

    public function factoryStatictics($seasonId)
    {
		$data['gardensStatistics']  = $this->Seasons_model->getGardenStatistics($seasonId);
		$data['totalPaidForGardens']  = $this->Seasons_model->getPaidForGarden($seasonId);
		$data['transportExpensesStatistics'] = $this->Seasons_model->getTransportExpenseStatistics($seasonId);
		$data['labourExpensesStatistics']    = $this->Seasons_model->getLabourExpenseStatistics($seasonId);
		$data['personalStaffExpenseDetail']  = $this->Seasons_model->getPersonalStaffStatistics($seasonId);
		$data['pumpExpenseStatistics']       = $this->Seasons_model->getPumpExpenseStatistics($seasonId);
		$data['personalCarExpense']          = $this->Seasons_model->getPersoanlCarStatistics($seasonId);
		$data['otherExpense']                = $this->Seasons_model->getOtherExpense($seasonId);

		$data['totalAmount'] =  $data['gardensStatistics']->totalPurchaseAmount + $data['transportExpensesStatistics']->totalAmountToPaid + $data['labourExpensesStatistics']->totalAmountForeman + $data['labourExpensesStatistics']->totalLabourAmount + $data['personalStaffExpenseDetail']->totalAmountToPaid + $data['pumpExpenseStatistics']->totalExpenseAmount + $data['personalCarExpense']->totalExpenseAmount + $data['otherExpense']->totalExpenseAmount;

		//FACTORY
		$data['transportExpensesStatisticsFactory'] = $this->Seasons_model->getTransportExpenseStatisticsFactory($seasonId);
		$data['labourExpensesStatisticsFactory']    = $this->Seasons_model->getLabourExpenseStatisticsFactory($seasonId);
		$data['personalStaffExpenseDetailFactory']  = $this->Seasons_model->getPersonalStaffStatisticsFactory($seasonId);
		$data['pumpExpenseStatisticsFactory']       = $this->Seasons_model->getPumpExpenseStatisticsFactory($seasonId);
		$data['personalCarExpenseFactory']          = $this->Seasons_model->getPersoanlCarStatisticsFactory($seasonId);
		$data['otherExpenseFactory']                = $this->Seasons_model->getOtherExpenseFactory($seasonId);
		$data['pattiExpenseFactory']                = $this->Seasons_model->getpattiExpenseFactory($seasonId);
		$data['patriExpenseFactory']                = $this->Seasons_model->getpatriExpenseFactory($seasonId);
		$data['seasonPurchasesStatistics']          = $this->Factory_model->getSeasonPurchasesStatistics($seasonId);
		$data['seasonProductionStatistics']         = $this->Factory_model->getOverallProductionStatistics($seasonId);
		$data['salesStatistics']                    = $this->Factory_model->getSalesStatictics($seasonId);
		$data['kinowProductionStatistics']          = $this->Factory_model->getTotalKinow($seasonId);


		return $data;
    }

}
