<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Karachi');

class Seasons extends CI_Controller
{
	function __construct() 
	{
        parent::__construct();

        //IS LOGIN CHECK
		if(admin_not_logged_in())
		{
			redirect(base_url('login'));
		}
		//SESSION FOR SWITCHING ON SEASON DETAIL PAGE
		if(!$this->session->userdata('credential-switcher'))
		{
			$this->session->set_userdata('credential-switcher','gardens');
		}
		//SESSION FOR SWITCHING ON SEASON DETAIL PAGE
		if(!$this->session->userdata('transport-credential-switcher'))
		{
			$this->session->set_userdata('transport-credential-switcher','payments');
		}
		//SESSION FOR SWITCHING ON SEASON DETAIL PAGE
		if(!$this->session->userdata('foreman-credential-switcher'))
		{
			$this->session->set_userdata('foreman-credential-switcher','payments');
		}
		//SET SITE LANG 
		if(!$this->session->userdata('site_lang'))
		{
			$this->session->set_userdata('site_lang','english');
		}
		//MODELS
        $this->load->model('Seasons_model');
        $this->load->model('Common_model','CM');

        

    }

	public function index()
	{
		$data['dir']   = $this->session->userdata('site_lang') == 'english' ? 'ltr' : 'rtl';
		$data['float'] = $this->session->userdata('site_lang') == 'english' ? 'left' : 'right';
		$data['heading']     = 'Manage Seasons';
		$data['headTittle']  = 'Manage Seasons';
		$data['seasons'] = $this->Seasons_model->seasonsList();
		$data['link']    = 'gardens';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('manage-seasons',$data);
	}



	public function seasonOverallDetail($seasonId)
	{
		$data['seasonId'] = $seasonId;
		$data['dir']   = $this->session->userdata('site_lang') == 'english' ? 'ltr' : 'rtl';
		$data['float'] = $this->session->userdata('site_lang') == 'english' ? 'left' : 'right';
		$data['heading']     = 'Season Detail ('.$this->Seasons_model->getSeason($seasonId).')';
		$data['headTittle']  = 'Season Detail ('.$this->Seasons_model->getSeason($seasonId).')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['gardensStatistics']  = $this->Seasons_model->getGardenStatistics($seasonId);
		$data['totalPaidForGardens']  = $this->Seasons_model->getPaidForGarden($seasonId);
		$data['transportExpensesStatistics'] = $this->Seasons_model->getTransportExpenseStatistics($seasonId);
		$data['labourExpensesStatistics']    = $this->Seasons_model->getLabourExpenseStatistics($seasonId);
		$data['personalStaffExpenseDetail']  = $this->Seasons_model->getPersonalStaffStatistics($seasonId);
		$data['pumpExpenseStatistics']       = $this->Seasons_model->getPumpExpenseStatistics($seasonId);
		$data['personalCarExpense']          = $this->Seasons_model->getPersoanlCarStatistics($seasonId);
		$data['otherExpense']                = $this->Seasons_model->getOtherExpense($seasonId);

		$data['totalAmount'] =  $data['gardensStatistics']->totalPurchaseAmount + $data['transportExpensesStatistics']->totalAmountToPaid + $data['labourExpensesStatistics']->totalAmountForeman + $data['labourExpensesStatistics']->totalLabourAmount + $data['personalStaffExpenseDetail']->totalAmountToPaid + $data['pumpExpenseStatistics']->totalExpenseAmount + $data['personalCarExpense']->totalExpenseAmount + $data['otherExpense']->totalExpenseAmount;
		// echo "<pre>";
		// print_r($data['pumpExpenseStatistics']);
		// echo "</pre>";
		// die;

		$this->load->view('season-overall-detail', $data);
	}

	public function addSeason()
	{
		if($this->input->post())
		{
			$html = '';
			$data = array
			(
				'season'     => trim($_POST['seasonYear']),
				'isCurrent'  => 1,
				'addedOn'	 => date('Y-m-d'),
				'status'	 => 1
			);

			$seasonId = $this->Seasons_model->insertSeason($data);

			if($seasonId)
			{
				// $update_current = $this->Seasons_model->updateCurent($seasonId);
				// $seasons =
				$html .= 
				'
					<tr>
						<td>'.date('Y-m-d').'</td>
						<td>'.trim($_POST['seasonYear']).'</td>
						<td><a href="'.base_url().'manage-season/'.$seasonId.'">Manage</a></td>
					</tr>
				';
				echo json_encode(array('response'=>'success','html'=>$html));
			}
			else
			{
				echo json_encode(array('response'=>'false'));
			}
		}
	}

	public function seasonAlreadyExist()
	{
		if($this->input->post())
		{
			return $this->Seasons_model->checkSeasonAlreadyExist($_POST['seasonYear']);
		}
	}

	public function manageSeason($seasonId)
	{
		$data['heading']     = 'Season Detail';
		$data['headTittle']  = 'Season Detail';
		$data['seasonId']    = $seasonId;
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['gardensList'] = $this->Seasons_model->gardenList($seasonId);
		$this->session->set_userdata( 'seasonId' , $seasonId );
		$data['expenseStatistics'] = $this->Seasons_model->getExpenseStatistics($seasonId);
		$data['totalExpenses']     = $data['expenseStatistics']->totalTransaport + $data['expenseStatistics']->totalLabour + $data['expenseStatistics']->totalOther;
		$data['transportExpenses'] = $this->Seasons_model->getExpenses($seasonId,1);

		$data['transportOthers']   = $this->Seasons_model->getExpenses($seasonId,3);
		$data['pumpExpenses']      = $this->Seasons_model->getPumpExpenses($seasonId);
		$data['personalCarExpense'] = $this->Seasons_model->getExpenses($seasonId,6);

		$data['labourExpenses']    = $this->Seasons_model->getLabourExpenses($seasonId);
		$data['personalStaff']     = $this->Seasons_model->getPersonalStaff($seasonId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('season-detail',$data);
	}

	public function manageCredential($seasonId)
	{
		$data['dir']   = $this->session->userdata('site_lang') == 'english' ? 'ltr' : 'rtl';
		$data['float'] = $this->session->userdata('site_lang') == 'english' ? 'left' : 'right';
		$data['heading']     = 'Season Credentials';
		$data['headTittle']  = 'Season Credentials';
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['seasons'] = $this->Seasons_model->seasonsList();
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('season-credentials',$data);
	}

	public function addGarden($season='' , $seasonId='')
	{
		$data['headTittle']  = 'Add Garden';
		$data['heading']     = 'Add Garden (Season '.$season.')';
		$data['headingMain'] = 'Add New Garden';
		$data['season']		 = $season;	
		$data['seasonId']	 = $seasonId;
		$data['todayDate']	 = date('m/d/Y');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$season  = $this->Seasons_model->getSeason($_POST['seasonId']);
			$gardenData = array
			(
				'landlordName'    => strCleaner($_POST['landlordName']),
				'landlordPhone'   => strCleaner($_POST['landlordPhone']),
				'gardenLocation'  => strCleaner($_POST['gardenLocation']),
				'reference'       => strCleaner($_POST['reference']),
				'purchaseAmount'  => removeCommas(strCleaner($_POST['purchaseAmount'])),
				'gardenAcre'      => strCleaner($_POST['gardenAcre']),
				'endDate'         => dateToYMD($_POST['endDate']),
				'comingInstallmentDate' => dateToYMD($_POST['comingInstallmentDate']),
				'jinasType'       => $_POST['jinasType']=='trees'?1:2,
				'jinasValue'      => strCleaner($_POST['jinasValue']),
				'status'		  => 1,
				'seasonId'		  => $_POST['seasonId']
			);

			$is_inserted = $this->Seasons_model->insertGarden($gardenData);
			if($is_inserted)
			{
				$this->session->set_userdata('garden-add-edit', $is_inserted);
				$this->session->set_flashdata('success_message','The garden has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
		else
		{
			$this->load->view('add-garden',$data);
		}
	}

	public function editGarden($gardenId='')
	{
		$data['headTittle']      = 'Edit Garden';
		$data['heading']         = 'Edit Garden';
		$data['headingMain']     = 'Edit Garden';
		$data['gardenId']        = $gardenId;
		$data['selectedGarden']  = $this->Seasons_model->getSelectedGarden($gardenId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$gardenData = array
			(
				'landlordName'    => strCleaner($_POST['landlordName']),
				'landlordPhone'   => strCleaner($_POST['landlordPhone']),
				'gardenLocation'  => strCleaner($_POST['gardenLocation']),
				'purchaseAmount'  => removeCommas(strCleaner($_POST['purchaseAmount'])),
				'gardenAcre'      => strCleaner($_POST['gardenAcre']),
				'endDate'         => dateToYMD($_POST['endDate']),
				'jinasType'       => $_POST['jinasType']=='trees'?1:2,
				'jinasValue'      => strCleaner($_POST['jinasValue']),
				'updatedOn'		  => date('Y-m-d')
			);

			$is_updated = $this->Seasons_model->updateGarden($gardenData,$_POST['gardenId']);
			if($is_updated)
			{
				$this->session->set_userdata('garden-add-edit', $_POST['gardenId']);
				$this->session->set_flashdata('success_message','The garden has been updated successfully');
				redirect(base_url('manage-season/'.$this->session->userdata('seasonId')));
			}
		}
		else
		{
			$this->load->view('edit-garden',$data);
		}
	}

	public function gardenDetail($seasonId,$gardenId)
	{
		$data['gardenId']        = $gardenId;
		$data['seasonId']        = $seasonId;
		$data['selectedGarden']  = $this->Seasons_model->getSelectedGarden($gardenId);
		$data['headTittle']      = 'Garden Detail';
		$data['heading']         = 'Managing ('.$data['selectedGarden']->gardenLocation.')';
		$data['headingMain']     = 'Garden Detail';
		$data['installments']	 = $this->Seasons_model->getInstallments($gardenId);
		$data['totalPaid']       = $this->Seasons_model->getTotalPaid($gardenId) + $data['selectedGarden']->bayana;
		$data['totalRemaining']  = $data['selectedGarden']->purchaseAmount - $data['totalPaid'];
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('garden-details',$data);
	}

	public function payBayana()
	{
		if($this->input->post())
		{
			$gardenId = $_POST['gardenId'];
			$data = array
			(
				'bayana'       => removeCommas(strCleaner($_POST['bayanaAmount'])),
				'ifBayanaPaid' => 1,
				'bayanaDate'   => dateToYMD($_POST['bayanaDate'])
			);
			$if_done = $this->Seasons_model->setBayana($data,$gardenId);
			if($if_done)
			{
				$this->session->set_flashdata('success_message_bayana','Bayana has been added Successfully');
				redirect(base_url('season/'.$_POST['seasonId'].'/garden-detail/'.$gardenId));
			}
		}
	}

	public function payInstallment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'amount'      => removeCommas(strCleaner($_POST['installmentAmount'])),
				'gardenId'    => $_POST['gardenId'],
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'paymentDate' => dateToYMD($_POST['installmentDate']),			
				'createdOn'   => date('Y-m-d'),
				'status'	  =>1			
			);

			$installment_added = $this->Seasons_model->addInstallment($data);
			if($installment_added)
			{
				$nextDateData = array
				(
					'comingInstallmentDate' => strCleaner(dateToYMD($_POST['comingInstallmentDate']))
				);
				$if_updated = $this->Seasons_model->updateNexInstallmentDate($nextDateData,$gardenId);
				if($if_updated)
				{
					$this->session->set_flashdata('success_message_installment','Installment has been added successfully');
					redirect(base_url('season/'.$_POST['seasonId'].'/garden-detail/'.$_POST['gardenId']));
				}
			}
		}
	}

	public function editForm($gardenId,$what,$id)
	{
		// 1 = Bayana
		// 2 = installment
		$data['headTittle']  = $what == 1 ? 'Edit Bayana' : 'Edit Installment';
		$data['heading']     = $what == 1 ? 'Edit Bayana' : 'Edit Installment';
		$data['headingMain'] = $what == 1 ? 'Edit Bayana' : 'Edit Installment';
		$data['what']		 = $what;		
		$data['id']		     = $id;
		$data['gardenId']	 = $gardenId;
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($what == 1)
		{
			$data['table'] = 'garden_purchasing';
		}
		else if($what == 2)
		{
			$data['table'] = 'payments';
		}
		$data['amount'] = $this->Seasons_model->fetchAmount($data['table'],$id);

		$this->load->view('edit-form',$data);	
	}

	public function editFormValue()
	{
		if($this->input->post())
		{
			if($_POST['table'] == 'garden_purchasing')
			{
				$data = array
				(
					'bayana' => strCleaner($_POST['amount']),
					'bayanaEditDate' => date('Y-m-d')
				);

				$if_updated = $this->Seasons_model->updateEditFormValue($data,$_POST['table'],$_POST['id']);
				if($if_updated)
				{
					$this->session->set_flashdata('success_message_bayana','Bayana has been Updated successfully');
					redirect(base_url('season/'.$this->session->userdata('seasonId').'/garden-detail/'.$_POST['gardenId']));	
				}
			}
			else if($_POST['table'] == 'payments')
			{
				$data = array
				(
					'amount' => strCleaner($_POST['amount']),
					'updatedOn' => date('Y-m-d')
				);
				$if_updated = $this->Seasons_model->updateEditFormValue($data,$_POST['table'],$_POST['id']);
				if($if_updated)
				{
					$this->session->set_flashdata('success_message_installment','Installment has been updated successfully');
					redirect(base_url('season/'.$this->session->userdata('seasonId').'/garden-detail/'.$_POST['gardenId']));	
				}
			}
		}
	}

	public function addExpense($type,$seasonId)
	{
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['seasonId']    = $seasonId;
		$data['type']        = $type;
		$data['headTittle']  = 'Add Expense';
		$data['heading']     = 'Add Expense (Season '.$data['season'].')';
		$data['headingMain'] = 'Add New '.ucfirst($type).' Expense';
		$data['todayDate']   = date('Y-m-d');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('add-expense',$data);
	}

	public function addExpenseTransport()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'           => $_POST['seasonId'],
				'expenseType'        => 1,
				'ownerName'          => strCleaner($_POST['ownerName']),
				'transportStartDate' => dateToYMD(strCleaner($_POST['transportStartDate'])),
				'ownerMobile'        => strCleaner($_POST['ownerMobile']),
				'driverName'         => strCleaner($_POST['driverName']),
				'driverNumber'       => strCleaner($_POST['driverNumber']),
				'transportNumber'    => strCleaner($_POST['transportNumber']),
				'transportHireAmount'=> removeCommas(strCleaner($_POST['transportHireAmount'])),
				'expenseDescription' => strCleaner($_POST['expenseDescription']),
				'status'             => 1,
				'createdOn'          => date('Y-m-d')
			);

			$perDay = removeCommas(strCleaner($_POST['transportHireAmount']));
			$inserted_id = $this->Seasons_model->addExpenseTransport($data);
			if($inserted_id)
			{
				$strtDate = dateToYMD(strCleaner($_POST['transportStartDate']));
				$endDate  = date('Y-m-d');
			  	while (strtotime($strtDate) <= strtotime($endDate)) {
			        $attendanceData = array
			        (
			        	'attendanceOfId' => $inserted_id,
			        	'attendanceDate' => $strtDate,
			        	'attendance'     =>1,
			        	'perDayAmount'	 =>$perDay,
			        	'managing'       =>1
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

			    $this->session->set_userdata('transport-add-edit', $inserted_id);
				$this->session->set_flashdata('success_message','Expense has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));	
			}
		}
	}

	public function addLabourForeman()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'               => $_POST['seasonId'],
				'startDate'              => dateToYMD(strCleaner($_POST['startDate'])),
				'name'                   => strCleaner($_POST['name']),
				'mobile'                 => strCleaner($_POST['mobile']),
				'CNIC'                   => strCleaner($_POST['CNIC']),
				'address'                => strCleaner($_POST['address']),
				'role'       			 => 1,
				'status'       			 => 1,
				'createdOn'              => date('Y-m-d')
			);

			$inserted_id = $this->Seasons_model->addLabourForeman($data);
			if($inserted_id)
			{
				$this->session->set_userdata('updated-foreman', $inserted_id);
				$this->session->set_flashdata('success_add_foreman','Foreman has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
	}

	public function addExpenseOther()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'           => $_POST['seasonId'],
				'expenseType'        => 3,
				'expenseTittle'      => strCleaner($_POST['expenseTittle']),
				'expenseAmount'      => removeCommas(strCleaner($_POST['expenseAmount'])),
				'expenseDate'        => dateToYMD(strCleaner($_POST['expenseDate'])),
				'status'			 => 1,	
				'createdOn'          => date('Y-m-d')
			);

			$if_inserted = $this->Seasons_model->addExpenseTransport($data);
			if($if_inserted)
			{
				$this->session->set_flashdata('updated-other-expense', $if_inserted);
				$this->session->set_flashdata('success_message','Expense has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));	
			}
		}
	}

	public function editTransportExpense($seasonId,$expenseId)
	{
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['seasonId']    = $seasonId;
		$data['expenseId']    = $expenseId;
		$data['headTittle']  = 'Edit Transport Expense';
		$data['heading']     = 'Edit Transport Expense (Season '.$data['season'].')';
		$data['headingMain'] = 'Edit Transport Expense';
		$data['expenseToEdit'] = $this->Seasons_model->getExpenseToEdit($expenseId);
		$data['todayDate']   = date('Y-m-d');
		$data['url']         = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('edit-transport-expense',$data);
	}

	public function editExpenseTransportFunction()
	{
		if($this->input->post())
		{
			$data = array
			(
				'ownerName'          => strCleaner($_POST['ownerName']),
				'transportStartDate' => dateToYMD(strCleaner($_POST['transportStartDate'])),
				'ownerMobile'        => strCleaner($_POST['ownerMobile']),
				'driverName'         => strCleaner($_POST['driverName']),
				'driverNumber'       => strCleaner($_POST['driverNumber']),
				'transportNumber'    => strCleaner($_POST['transportNumber']),
				'transportHireAmount'=> removeCommas(strCleaner($_POST['transportHireAmount'])),
				'expenseDescription' => strCleaner($_POST['expenseDescription']),
				'updatedOn'          => date('Y-m-d')
			);

			$if_updated = $this->Seasons_model->udpateTransportExpense($data,strCleaner($_POST['expenseId']));
			if($if_updated)
			{
				$perDay = removeCommas(strCleaner($_POST['transportHireAmount']));
				if(strCleaner($_POST['expenseId']))
				{
					$strtDate = dateToYMD(strCleaner($_POST['transportStartDate']));
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['expenseId']),1,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['expenseId']), 1, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['expenseId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 1
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

			    	$this->session->set_userdata('transport-add-edit', strCleaner($_POST['expenseId']));
					$this->session->set_flashdata('success_edit_transport','Expense has been edited successfully');
					redirect(base_url('manage-season/'.$_POST['seasonId']));	
				}	
			}
		}
	}

	public function editOtherExpense($seasonId,$expenseId)
	{
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['seasonId']    = $seasonId;
		$data['expenseId']    = $expenseId;
		$data['headTittle']  = 'Edit Other Expense';
		$data['heading']     = 'Edit Other Expense (Season '.$data['season'].')';
		$data['headingMain'] = 'Edit Other Expense';
		$data['expenseToEdit'] = $this->Seasons_model->getExpenseToEdit($expenseId);
		$data['todayDate']   = date('Y-m-d');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('edit-other-expense',$data);
	}

	public function editOtherExpenseFunction()
	{
		if($this->input->post())
		{
			$data = array
			(
				'expenseTittle' => strCleaner($_POST['expenseTittle']),
				'expenseAmount' => removeCommas(strCleaner($_POST['expenseAmount'])),
				'expenseDate'   => dateToYMD(strCleaner($_POST['expenseDate'])),
				'updatedOn'     => date('Y-m-d')
			);

			$if_updated = $this->Seasons_model->udpateTransportExpense($data,$_POST['expenseId']);

			if($if_updated)
			{
				$this->session->set_flashdata('success_add_other','Expense has been updated successfully');
				$this->session->set_flashdata('updated-other-expense',$_POST['expenseId']);
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
	}

	public function setCredentialSwitcherSession()
	{
		if($this->input->post())
		{
			$this->session->set_userdata('credential-switcher',strCleaner($_POST['val']));
			echo json_encode(array('response'=>'success'));
		}
	}

	public function setTransportCredentialSwitcherSession()
	{
		if($this->input->post())
		{
			$this->session->set_userdata('transport-credential-switcher',strCleaner($_POST['val']));
			echo json_encode(array('response'=>'success'));
		}
	}

	public function setForemanCredentialSwitcherSession()
	{
		if($this->input->post())
		{
			$this->session->set_userdata('foreman-credential-switcher',strCleaner($_POST['val']));
			echo json_encode(array('response'=>'success'));
		}
	}
	

	public function transportExpenseDetail($seasonId,$expenseId)
	{
		$data['expenseId']         = $expenseId;
		$data['seasonId']          = $seasonId;
		$data['paymentsDetail']    = $this->Seasons_model->getTransportExpensePayments($expenseId);
		$data['selectedTransport'] = $this->Seasons_model->getSelectedTransport($expenseId);
		$check = $this->Seasons_model->checkIfAttendanceAlreadyExist($expenseId,1);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($check == 0 && $data['selectedTransport']->isTransportEnd == 0)
		{
			$dailyAttendanceData = array
			(
				'attendanceOfId' => $expenseId,
				'attendanceDate' => date('Y-m-d'),
				'attendance'	 =>1,
				'perDayAmount'   =>$data['selectedTransport']->transportHireAmount,
				'managing'		 =>1 	
			);
			$this->Seasons_model->addAttendence($dailyAttendanceData);
		}

		$data['headTittle']      = 'Transport Expense Detail';
		$data['heading']         = 'Managing Transport ('.$data['selectedTransport']->transportNumber.' '.$data['selectedTransport']->driverName.')';
		$data['headingMain']     = 'Garden Detail';
		$data['totalPaid']       = $this->Seasons_model->getTotalTransportPaid($expenseId);
		$data['totalRent']       = $this->Seasons_model->getTotalTransportRent($expenseId);
		$data['totalRecords']	 = $this->Seasons_model->getTotalTransportRecord($expenseId,1);

		$index = 0;
		if($data['totalPaid'] > $data['totalRent'])
		{
			$index = $data['totalPaid'] - $data['totalRent'];
			$data['balanceStatus'] = 'Transport have <strong>Rs '.numberFormat($index).'</strong> in advance';
		}
		else if($data['totalPaid'] < $data['totalRent'])
		{
			$index = $data['totalRent'] - $data['totalPaid'];
			$data['balanceStatus'] = 'You have to pay <strong>Rs '.numberFormat($index).'</strong> to transport';
		}
		else if($data['totalPaid'] == $data['totalRent'])
		{
			$data['balanceStatus'] = 'Balance is equal';
		}

		$this->load->view('transport-expense-detail',$data);
	}

	public function changeAttendance($seasonId,$expenseId,$action,$id,$redirect)
	{
		$data = array
		(
			'attendance' => $action=='present'?1:0
		);

		$if_updated = $this->Seasons_model->changeAttendance($data,$id);
		if($if_updated)
		{
			$this->session->set_userdata('latestChangeAttendance',$id);
			$this->session->set_flashdata('success_change_attendance','Mark as '.$action.' successfully.');
			if($redirect == 1)
			{
				redirect(base_url('transport-expense/'.$seasonId.'/detail/'.$expenseId));
			}
			else if($redirect == 2)
			{
				redirect(base_url('foreman-detail/'.$seasonId.'/detail/'.$expenseId));
			}
			else if($redirect == 3)
			{
				$labourId = $this->Seasons_model->getLabourId($id);
				redirect(base_url('season/'.$seasonId.'/foreman/'.$expenseId.'/labour-detail/'.$labourId));
			}
			else if($redirect == 4)
			{
				redirect(base_url('manage-season/personal-staff-detail/'.$expenseId.'/'.$seasonId));
			}
		}
	}

	public function payTransportPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'paymentOfExpenseId' => $_POST['transportExpenseId'],
				'paymentDate' => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'	  => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'status'      => 1
			);

			$inserted_id = $this->Seasons_model->addTransportExpensePayment($data);
			if($inserted_id)
			{
				$this->session->set_userdata('edit_transport_payment_session', $inserted_id);
				$this->session->set_flashdata('success_pay_payment','Payment Has been added successfully');
				redirect(base_url('transport-expense/'.$_POST['seasonId'].'/detail/'.$_POST['transportExpenseId']));
			}
		}
	}

	public function endSession($seasonId,$expenseId)
	{
		$data = array
		(
			'transportEndDate' => date('Y-m-d'),
			'isTransportEnd'   =>1
		);

		if($this->Seasons_model->endSession($data,$expenseId))
		{
			$this->session->set_flashdata('success_end_transport','Transport session has been end successfully');
			redirect(base_url('transport-expense/'.$seasonId.'/detail/'.$expenseId));	
		}
		else
		{
			$this->session->set_flashdata('failed_end_transport','Error! Try again later');
			redirect(base_url('transport-expense/'.$seasonId.'/detail/'.$expenseId));	
		}

	}

	public function endSessionForeman($seasonId,$id)
	{
		$data = array
		(
			'endDate' => date('Y-m-d'),
			'ifSessionEnd'=>1
		);

		if($this->Seasons_model->endSessionForeman($data,$id))
		{
			$this->session->set_flashdata('success_end_foreman','Transport session has been end successfully');
			redirect(base_url('foreman-detail/'.$seasonId.'/detail/'.$id));	
		}
		else
		{
			$this->session->set_flashdata('failed_end_foreman','Error! Try again later');
			redirect(base_url('foreman-detail/'.$seasonId.'/detail/'.$id));
		}

	}

	public function foremanDetail($seasonId, $foremanId)
	{
		$data['expenseId']         = $foremanId;
		$data['seasonId']          = $seasonId;
		// $data['paymentsDetail']    = $this->Seasons_model->getTransportExpensePayments($foremanId);
		$data['selectedForeman'] = $this->Seasons_model->getSelectedForeman($foremanId);
		$check = $this->Seasons_model->checkIfAttendanceAlreadyExist($foremanId,2);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
 		$labourIds = [];
		$foremanLabourIds = foremanLabourIds($foremanId);
		if(count($foremanLabourIds) == 0)
		{
			$data['totalLaboursRent'] = 0;
		}
		else
		{
			foreach($foremanLabourIds as $labourId)
			{
				$labourIdIndex[] = $labourId->id;
			}
			$labourIds = implode(",",$labourIdIndex);
			$data['totalLaboursRent'] = $this->Seasons_model->getTotalLabourRent($foremanId, $labourIds);
		}

		$data['headTittle']       = 'Foreman Detail';
		$data['heading']          = 'Managing Foreman ('.$data['selectedForeman']->name.')';
		$data['headingMain']      = 'Managing Foreman ('.$data['selectedForeman']->name.')';
		$data['paidToForeman']    = $this->Seasons_model->getTotalPaidForeman($foremanId);
		$data['paidToForemanForLabours']    = $this->Seasons_model->paidToForemanForLabours($foremanId);
		//$data['foremanAttendance']= $this->Seasons_model->getForemanAttendace($foremanId,2);

		$index = 0;
		if($data['selectedForeman']->foremanSeasonFixAmount > $data['paidToForeman'])
		{
			$index = $data['selectedForeman']->foremanSeasonFixAmount - $data['paidToForeman'];
			$data['foremanBalanceStatus'] = 'You have to pay <strong>Rs '.numberFormat($index).' Rs</strong> to foreman';
		}
		else if($data['selectedForeman']->foremanSeasonFixAmount < $data['paidToForeman'])
		{
			$index = $data['paidToForeman'] - $data['selectedForeman']->foremanSeasonFixAmount;
			$data['foremanBalanceStatus'] = 'Foreman have <strong>Rs '.numberFormat($index).'</strong> in advance';
		}
		else if($data['selectedForeman']->foremanSeasonFixAmount == $data['paidToForeman'])
		{
			$data['foremanBalanceStatus'] = 'Balance is equal';
		}

		$data['labours'] = $this->Seasons_model->getForemanLabours($foremanId);
		$data['foremanPaymentsDetail'] = $this->Seasons_model->getForemanPaymentsDetail($foremanId);
		$data['paidToForeman']    = $this->Seasons_model->getTotalPaidForeman($foremanId);

		$index2 = 0;
		if($data['totalLaboursRent'] > $data['paidToForemanForLabours'])
		{
			$index2 = $data['totalLaboursRent'] - $data['paidToForemanForLabours'];
			$data['foremanBalanceStatusForLabours'] = 'You have to pay <strong>Rs '.numberFormat($index2).' Rs</strong> to foreman for labours';
		}
		else if($data['totalLaboursRent'] < $data['paidToForemanForLabours'])
		{
			$index2 = $data['paidToForemanForLabours'] - $data['totalLaboursRent'];
			$data['foremanBalanceStatusForLabours'] = 'Foreman have <strong>Rs '.numberFormat($index2).'</strong> labour payments in advance';
		}
		else if($data['totalLaboursRent'] == $data['paidToForemanForLabours'])
		{
			$data['foremanBalanceStatusForLabours'] = 'Balance is equal';
		}

		$this->load->view('foreman-detail',$data);
	}

	public function addLabour()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'     => strCleaner($_POST['seasonId']),
				'foremanId'    => strCleaner($_POST['foremanId']),
				'startDate'    => strCleaner(dateToYMD($_POST['startDate'])),
				'name'         => strCleaner($_POST['name']),
				'mobile'       => strCleaner($_POST['mobile']),
				'perdayAmount' => removeCommas(strCleaner($_POST['perdayAmount'])),
				'role'		   =>2, 
				'status'	   =>1, 
				'createdOn'	   => date('Y-m-d')
			);
			$inserted_id = $this->Seasons_model->addLabourOfForeman($data);
			if($inserted_id)
			{

				$strtDate = dateToYMD(strCleaner($_POST['startDate']));
				$endDate  = date('Y-m-d');
			  	while (strtotime($strtDate) <= strtotime($endDate)) {
			        $attendanceData = array
			        (
			        	'attendanceOfId' => $inserted_id,
			        	'foremanId'		 => strCleaner($_POST['foremanId']),	
			        	'attendanceDate' => $strtDate,
			        	'attendance'     =>1,
			        	'perDayAmount'   =>strCleaner($_POST['perdayAmount']),
			        	'managing'       =>3
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

			    $this->session->set_userdata('updated-labour', $inserted_id);
				$this->session->set_flashdata('success_add_labour','Labour has been added successfully');
				redirect(base_url('foreman-detail/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
			}
		}
	}

	public function addPersonalStaff()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'     => strCleaner($_POST['seasonId']),
				'startDate'    => strCleaner(dateToYMD($_POST['startDate'])),
				'name'         => strCleaner($_POST['name']),
				'mobile'       => strCleaner($_POST['mobile']),
				'perdayAmount' => removeCommas(strCleaner($_POST['perdayAmount'])),
				'memberType'   => strCleaner($_POST['memberType']),
				'role'		   =>3, 
				'status'	   =>1, 
				'createdOn'	   => date('Y-m-d')
			);
			$inserted_id = $this->Seasons_model->addLabourOfForeman($data);
			if($inserted_id)
			{

				$strtDate = dateToYMD(strCleaner($_POST['startDate']));
				$endDate  = date('Y-m-d');
			  	while (strtotime($strtDate) <= strtotime($endDate)) {
			        $attendanceData = array
			        (
			        	'attendanceOfId' => $inserted_id,
			        	'attendanceDate' => $strtDate,
			        	'attendance'     => 1,
			        	'perDayAmount'   => removeCommas(strCleaner($_POST['perdayAmount'])),
			        	'managing'       => 4
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

				$this->session->set_userdata('updated-personal-staff', $inserted_id);
				$this->session->set_flashdata('success_add_personal_staff','Personal staff member has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
	}


	public function labourDetails($seasonId,$foremanId,$labourId)
	{
		$data['seasonId']          = $seasonId;
		$data['foremanId']         = $foremanId;
		$data['labourId']          = $labourId;
		$data['selectedLabour'] = $this->Seasons_model->getSelectedLabour($labourId);
		$check = $this->Seasons_model->checkIfAttendanceAlreadyExist($labourId,3);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($check == 0 && $data['selectedLabour']->ifSessionEnd == 0)
		{
			$dailyAttendanceData = array
			(
				'attendanceOfId' => $labourId,
				'attendanceDate' => date('Y-m-d'),
				'attendance'	 =>1,
				'managing'		 =>3
			);
			$this->Seasons_model->addAttendence($dailyAttendanceData);
		}

		$data['headTittle']       = 'Labour Detail';
		$data['heading']          = 'Managing Labour ('.$data['selectedLabour']->name.')';
		$data['headingMain']      = 'Managing Labour ('.$data['selectedLabour']->name.')';
		// $data['paidToForeman']    = 0;
		$data['labourAttendance'] = $this->Seasons_model->getForemanAttendace($labourId,3);
		$data['labourAttendanceStatistics'] = attendanceStatistics($labourId,3);

		// $index = 0;
		// if($data['selectedForeman']->foremanSeasonFixAmount > $data['paidToForeman'])
		// {
		// 	$index = $data['selectedForeman']->foremanSeasonFixAmount - $data['paidToForeman'];
		// 	$data['foremanBalanceStatus'] = 'Foreman have <strong>Rs '.number_format($index).'</strong> in advance';
		// }
		// else if($data['selectedForeman']->foremanSeasonFixAmount < $data['paidToForeman'])
		// {
		// 	$index = $data['paidToForeman'] - $data['selectedForeman']->foremanSeasonFixAmount;
		// 	$data['foremanBalanceStatus'] = 'You have to pay <strong>Rs '.number_format($index).'</strong> to foreman';
		// }
		// else if($data['selectedForeman']->foremanSeasonFixAmount == $data['paidToForeman'])
		// {
		// 	$data['foremanBalanceStatus'] = 'Balance is equal';
		// }


		$this->load->view('labour-detail',$data);
	}

	public function setForemanAmount()
	{
		if($this->input->post())
		{
			$data = array
			(
				'foremanSeasonFixAmount' => removeCommas(strCleaner($_POST['foremanSeasonFixAmount']))
			);

			if($this->Seasons_model->setForemanAmount($data,strCleaner($_POST['foremanId'])))
			{

				$this->session->set_flashdata('success_pay_payment','Foreman Amount has been fixed successfully');
				redirect(base_url('foreman-detail/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
			}
		}
	}

	public function payForemanPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'paymentOfForemanId' => strCleaner($_POST['foremanId']),
				'foremanPaymentType' => $_POST['paymentOf']=='foreman'?1:2,
				'paymentDate'		 => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'		     => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'status'			 => 1
			);

			$inserted_id = $this->Seasons_model->givePaymentToForeman($data);
			if($inserted_id)
			{
				$this->session->set_userdata('edit_foreman_payment', $inserted_id);
				$this->session->set_flashdata('success_pay_payment','Payment Has been added successfully');
				redirect(base_url('foreman-detail/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
			}
		}
	}

	public function payPersonalStaff()
	{
		if($this->input->post())
		{
			$data = array
			(
				'personalStaffId'    => strCleaner($_POST['memberId']),
				'seasonId'           => strCleaner($_POST['seasonId']),
				'paymentDate'		 => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'		     => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'status'			 => 1
			);

			$inserted_id = $this->Seasons_model->givePaymentToForeman($data);
			if($inserted_id)
			{
				$this->session->set_userdata('edit_foreman_payment', $inserted_id);
				$this->session->set_flashdata('success_pay_payment','Payment Has been added successfully');
				redirect(base_url('manage-season/personal-staff-detail/'.$_POST['memberId'].'/'.$_POST['seasonId']));
			}
		}
	}

	public function addPumpTransaction()
	{
		if($this->input->post())
		{
			if(isset($_FILES))
			{
			    if(empty($_FILES['expenseSlip']['name']))
			    {
			    	$filename = NULL;
			    }
			    else
			    {
			        $config['upload_path'] = APPPATH . 'uploads/expenses/pump';
			        $config["allowed_types"] = 'jpg|jpeg|png|gif';
			        $config["max_size"] = 1024;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('expenseSlip')) 
			        {               
			        	$imgData = $this->upload->data();
			        	$filename = $imgData['orig_name'];
			        }
			        else
			        {
			            $this->data['error'] = $this->upload->display_errors();
			        }
			    }
			}
			

			$data = array
			(
				'seasonId'        => strCleaner($_POST['seasonId']),
				'expenseSlip'     => $filename,
				'expenseType'     => strCleaner($_POST['fuelType'])=='petrol'?4:5,
				'expenseDate'     => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount'   => removeCommas(strCleaner($_POST['expenseAmount'])),
				'transportNumber' => strCleaner($_POST['transportNumber']),
				'status'          => 1,
				'createdOn'       => date('Y-m-d')
			);

			$is_added = $this->Seasons_model->addPumpExpense($data);
			if($is_added)
			{
				$this->session->set_userdata('updated-pump-expense', $is_added);
				$this->session->set_flashdata('success_add_pump','Pump expense has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
	}

	public function addPersonalExpense()
	{
		if($this->input->post())
		{
			if(isset($_FILES))
			{
			    if(empty($_FILES['expenseSlip']['name']))
			    {
			    	$filename = NULL;
			    }
			    else
			    {
			        $config['upload_path'] = APPPATH . 'uploads/expenses/personalExpense';
			        $config["allowed_types"] = 'jpg|jpeg|png|gif';
			        $config["max_size"] = 1024;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('expenseSlip')) 
			        {               
			        	$imgData = $this->upload->data();
			        	$filename = $imgData['orig_name'];
			        }
			        else
			        {
			            $this->data['error'] = $this->upload->display_errors();
			        }
			    }
			}
			

			$data = array
			(
				'seasonId'           => strCleaner($_POST['seasonId']),
				'expenseSlip'        => $filename,
				'expenseType'        => 6,
				'expenseDate'        => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount'      => removeCommas(strCleaner($_POST['expenseAmount'])),
				'expenseDescription' => strCleaner($_POST['expenseDescription']),
				'status'			 => 1,
				'createdOn'          => date('Y-m-d')				
			);

			$is_added = $this->Seasons_model->addPersonalCarExpense($data);
			if($is_added)
			{
				$this->session->set_userdata('updated-personal-expense', $is_added);  
				$this->session->set_flashdata('success_add_personal','Personal expense has been added successfully');
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
	}

	public function editPumpExpense($seasonId='', $expenseId='')
	{
		$data['seasonId']    = $seasonId;
		$data['expenseId']   = $expenseId;
		$data['headTittle']  = 'Edit Pump Expense';
		$data['heading']     = 'Edit Pump Expense';
		$data['headingMain'] = 'Edit Pump Expense';
		$data['expenseRow']  = $this->Seasons_model->getPumpExpenseRow($expenseId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$dataForUpdate =  array();
			if(isset($_FILES))
			{
			    if(empty($_FILES['expenseSlip']['name']))
			    {
					$dataForUpdate = array
					(
						'expenseType'     => strCleaner($_POST['fuelType'])=='petrol'?4:5,
						'expenseDate'     => dateToYMD(strCleaner($_POST['expenseDate'])),
						'expenseAmount'   => removeCommas(strCleaner($_POST['expenseAmount'])),
						'transportNumber' => strCleaner($_POST['transportNumber']),
						'updatedOn'       => date('Y-m-d')				
					);
			    }
			    else
			    {
			        $config['upload_path'] = APPPATH . 'uploads/expenses/pump';
			        $config["allowed_types"] = 'jpg|jpeg|png|gif';
			        $config["max_size"] = 1024;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('expenseSlip')) 
			        {               
			        	$imgData = $this->upload->data();
			        	$filename = $imgData['orig_name'];
						$dataForUpdate = array
						(
							'expenseSlip'     => $filename,
							'expenseType'     => strCleaner($_POST['fuelType'])=='petrol'?4:5,
							'expenseDate'     => dateToYMD(strCleaner($_POST['expenseDate'])),
							'expenseAmount'   => strCleaner($_POST['expenseAmount']),
							'transportNumber' => strCleaner($_POST['transportNumber']),
							'updatedOn'       => date('Y-m-d')				
						);
			        }
			        else
			        {
			            $this->data['error'] = $this->upload->display_errors();
			        }
			    }
			}

			$if_updated = $this->Seasons_model->updatePumpExpense($dataForUpdate,$_POST['expenseId']);
			if($if_updated)
			{
				$this->session->set_flashdata('success_add_pump','Pump expense has been updated successfully');
				$this->session->set_userdata('updated-pump-expense',$_POST['expenseId']);
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
		else
		{
			$this->load->view('edit-pump-expense',$data);
		}
	}

	public function editPersonalExpense($seasonId='', $expenseId='')
	{
		$data['seasonId']    = $seasonId;
		$data['expenseId']   = $expenseId;
		$data['headTittle']  = 'Edit Personal Car Expense';
		$data['heading']     = 'Edit Personal Car Expense';
		$data['headingMain'] = 'Edit Personal Car Expense';
		$data['expenseRow']  = $this->Seasons_model->getPersonalExpenseRow($expenseId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$dataForUpdate =  array();
			if(isset($_FILES))
			{
			    if(empty($_FILES['expenseSlip']['name']))
			    {
					$dataForUpdate = array
					(
						'expenseDate'        => dateToYMD(strCleaner($_POST['expenseDate'])),
						'expenseAmount'      => removeCommas(strCleaner($_POST['expenseAmount'])),
						'expenseDescription' => strCleaner($_POST['expenseDescription']),
						'updatedOn'          => date('Y-m-d')				
					);
			    }
			    else
			    {
			        $config['upload_path'] = APPPATH . 'uploads/expenses/personalExpense';
			        $config["allowed_types"] = 'jpg|jpeg|png|gif';
			        $config["max_size"] = 1024;
			        $this->load->library('upload', $config);

			        if($this->upload->do_upload('expenseSlip')) 
			        {               
			        	$imgData = $this->upload->data();
			        	$filename = $imgData['orig_name'];
						$dataForUpdate = array
						(
							'expenseSlip'        => $filename,
							'expenseDate'        => dateToYMD(strCleaner($_POST['expenseDate'])),
							'expenseAmount'      => strCleaner($_POST['expenseAmount']),
							'expenseDescription' => strCleaner($_POST['expenseDescription']),
							'updatedOn'          => date('Y-m-d')				
						);
			        }
			        else
			        {
			            $this->data['error'] = $this->upload->display_errors();
			        }
			    }
			}

			$if_updated = $this->Seasons_model->updatePersonalExpense($dataForUpdate,$_POST['expenseId']);
			if($if_updated)
			{
				$this->session->set_flashdata('success_add_personal','Personal Car expense has been updated successfully');
				$this->session->set_userdata('updated-personal-expense',$_POST['expenseId']);
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
		else
		{
			$this->load->view('edit-personal-expense',$data);
		}
	}

	public function editForeman($seasonId='',$foremanId='')
	{
		$data['season']      = $this->Seasons_model->getSeason($seasonId);
		$data['seasonId']    = $seasonId;
		$data['foremanId']   = $foremanId;
		$data['headTittle']  = 'Edit Foreman';
		$data['heading']     = 'Edit Foreman (Season '.$data['season'].')';
		$data['headingMain'] = 'Edit Foreman Expense';
		$data['foremanRow']  = $this->Seasons_model->getForemanRow($foremanId);
		$data['todayDate']   = date('Y-m-d');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$update = array
			(
				'startDate'              => dateToYMD($_POST['startDate']),
				'name'                   => strCleaner($_POST['name']),
				'mobile'                 => strCleaner($_POST['mobile']),
				'CNIC'                   => strCleaner($_POST['CNIC']),
				'address'                => strCleaner($_POST['address']),
				'updatedOn'              => date('Y-m-d')
			);

			$if_updated = $this->Seasons_model->updateForeman($update,$_POST['foremanId']);
			if($if_updated)
			{
				$this->session->set_flashdata('success_add_foreman','Foreman has been updated successfully');
				$this->session->set_userdata('updated-foreman',$_POST['foremanId']);
				redirect(base_url('manage-season/'.$_POST['seasonId']));
			}
		}
		else
		{
			$this->load->view('edit-foreman',$data);
		}
	}

	public function labourEdit($seasonId='', $foremanId='', $labourId='')
	{
		$data['seasonId']    = $seasonId;
		$data['foremanId']   = $foremanId;
		$data['labourId']    = $labourId;
		$data['headTittle']  = 'Edit Labour';
		$data['heading']     = 'Edit Labour';
		$data['headingMain'] = 'Edit Labour';	
		$data['labourRow']   = $this->Seasons_model->getLabourRow($labourId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($this->input->post())
		{
			$update = array
			(
				'startDate'    => dateToYMD(strCleaner($_POST['startDate'])),
				'name'         => strCleaner($_POST['name']),
				'mobile'       => strCleaner($_POST['mobile']),
				'perdayAmount' => removeCommas(strCleaner($_POST['perdayAmount'])),
				'updatedOn'	   => date('Y-m-d')
			);	
			$if_updated = $this->Seasons_model->updateLabour($update,$_POST['labourId']);
			if($if_updated)
			{
				$perDay = strCleaner($_POST['perdayAmount']);
				if(strCleaner($_POST['labourId']))
				{
					$strtDate = dateToYMD(strCleaner(strCleaner($_POST['startDate'])));
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['labourId']),3,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['labourId']), 3, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['labourId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 3
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

					$this->session->set_flashdata('success_add_labour','Labour has been edited successfully');
					$this->session->set_userdata('updated-labour',$_POST['labourId']);
					redirect(base_url('foreman-detail/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));	
				}	
			}
		}
		else
		{
			$this->load->view('edit-labour',$data);
		}
	}

	public function getSeasonValue()
	{
		if($this->input->post())
		{
			echo json_encode(array('response'=>'success','val'=>$this->Seasons_model->getSeason(strCleaner($_POST['seasonId']))));
		}
	}

	public function editSeason()
	{
		if($this->input->post())
		{
			$data = array
			(
				'season' => strCleaner($_POST['seasonYear'])
			);

			if($this->Seasons_model->updateSeason($data, strCleaner($_POST['seasonYearId'])))
			{
				if(strCleaner($_POST['seasonLInk']) == 'gardens')
				{
					$this->session->set_flashdata('edit_message_season','Season has been updated successfully');
					redirect(base_url('seasons'));	
				}
				else
				{
					$this->session->set_flashdata('edit_message_season','Season has been updated successfully');
					redirect(base_url('factory'));
				}
			}
		}
	}

	public function editTransportPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'paymentDate' => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'	  => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
			);

			if($this->CM->updateRecord($data, 'payments', strCleaner($_POST['paymentId'])))
			{
				$this->session->set_flashdata('success_pay_payment','Payment Has been edited successfully');
				$this->session->set_userdata('edit_transport_payment_session', strCleaner($_POST['paymentId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['link_transportPayment']))));
			}
		}
	}

	public function editForemanPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'foremanPaymentType' => $_POST['paymentOf']=='foreman'?1:2,
				'paymentDate'		 => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'		     => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription'])
			);

			if($this->CM->updateRecord($data, 'payments', strCleaner($_POST['paymentId'])))
			{
				$this->session->set_flashdata('global_delete_message_foreman_payment','Payment Has been edited successfully');
				$this->session->set_userdata('edit_foreman_payment', strCleaner($_POST['paymentId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function editPersonalStaff()
	{
		if($this->input->post())
		{
			$data = array
			(
				'startDate'    => strCleaner(dateToYMD($_POST['startDate'])),
				'name'         => strCleaner($_POST['name']),
				'mobile'       => strCleaner($_POST['mobile']),
				'perdayAmount' => removeCommas(strCleaner($_POST['perdayAmount'])),
				'memberType'   => strCleaner($_POST['memberType']),
				'updatedOn'	   => date('Y-m-d')
			);
			$if_updated = $this->CM->updateRecord($data, 'staff', strCleaner($_POST['memberId']));
			if($if_updated)
			{
				$perDay = removeCommas(strCleaner($_POST['perdayAmount']));
				if(strCleaner($_POST['memberId']))
				{
					$strtDate = dateToYMD(strCleaner(strCleaner($_POST['startDate'])));
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['memberId']),4,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['memberId']), 4, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['memberId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 4
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

					$this->session->set_flashdata('success_add_personal_staff','Member has been edited successfully');
					$this->session->set_userdata('updated-personal-staff',$_POST['memberId']);
					redirect(base_url('manage-season/'.$_POST['seasonId']));	
				}	
			}
		}
	}

	public function personalStaffDetail($memberId, $seasonId)
	{
		$data['seasonId']    = $seasonId;
		$data['memberId']    = $memberId;
		$data['headTittle']  = 'Member Detail';
		$data['heading']     = 'Member Detail';
		$data['headingMain'] = 'Member Detail';
		$data['memberDetail']= $this->CM->getRecord($memberId,'staff');
		$data['memberAttendace'] = $this->Seasons_model->getForemanAttendace($memberId, 4);
		$data['memberAttendanceStatistics'] = attendanceStatistics($memberId,4);
		$data['memberPaymentsDetail'] = $this->Seasons_model->getPersonalStaffPayments($memberId, $seasonId);
		$data['totalPaid'] = $this->Seasons_model->getPersonalStaffTotalPaid($memberId, $seasonId);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());

		$index2 = 0;
		if($data['memberAttendanceStatistics']->totalToPaid > $data['totalPaid'])
		{
			$index2 = $data['memberAttendanceStatistics']->totalToPaid - $data['totalPaid'];
			$data['personalStaffBalanceStatus'] = 'You have to pay <strong>Rs '.numberFormat($index2).' Rs</strong> to Member';
		}
		else if($data['memberAttendanceStatistics']->totalToPaid < $data['totalPaid'])
		{
			$index2 = $data['totalPaid'] - $data['memberAttendanceStatistics']->totalToPaid;
			$data['personalStaffBalanceStatus'] = 'Member have <strong>Rs '.numberFormat($index2).'</strong>payments in advance';
		}
		else if($data['memberAttendanceStatistics']->totalToPaid == $data['totalPaid'])
		{
			$data['personalStaffBalanceStatus'] = 'Balance is equal';
		}


		$this->load->view('personal-staff-detail', $data);
	} 

}
