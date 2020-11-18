<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Factory extends CI_Controller
{
	function __construct() 
	{
        parent::__construct();
        //IS LOGIN CHECK
		if(admin_not_logged_in())
		{
			redirect(base_url('login'));
		}
		
		//SET SITE LANG 
		if(!$this->session->userdata('site_lang'))
		{
			$this->session->set_userdata('site_lang','english');
		}

		//MODELS LOADING
		$this->load->model('Factory_model');
		$this->load->model('Common_model');
		$this->load->model('Seasons_model');

		//INNITILIZING COMMON VARIABLES
		$this->direction   = $this->session->userdata('site_lang') == 'english' ? 'ltr' : 'rtl';
		$this->float = $this->session->userdata('site_lang') == 'english' ? 'left' : 'right';
		$this->createdOn = date('Y-m-d');
		$this->updatedOn = date('Y-m-d');

		if($this->session->userdata('season-id'))
		{
			$this->seasonId = $this->session->userdata('season-id');
			$this->season = $this->Common_model->getSeason($this->seasonId);
		}

    }

	public function index()
	{
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Manage Seasons';
		$data['headTittle']  = 'Manage Seasons';
		$data['seasons'] = $this->Seasons_model->seasonsList();
		$data['link']    = 'factory';
		$data['url']  = $this->uri->uri_string();
		$this->load->view('manage-seasons',$data);
	}

	public function manageFactory($seasonId)
	{
		$this->session->set_userdata('season-id',$seasonId);
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['season'] = $this->Common_model->getSeason($seasonId);
		$data['heading']     = $this->lang->line('factory_modules').' ('.$data['season'].')';
		$data['headTittle']  = $this->lang->line('factory_modules').' ('.$data['season'].')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('manage-factory',$data);
	}

	public function managePurchases()
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['heading']     = $this->lang->line('manage_purchases').' ('.$this->season.')';
		$data['headTittle']  = $this->lang->line('manage_purchases').' ('.$this->season.')';
		$data['suppliers']   = $this->Factory_model->getSuppliers();
		$data['seasonPurchasesStatistics'] = $this->Factory_model->getSeasonPurchasesStatistics($this->seasonId);
		$data['purchasesList'] = $this->Factory_model->getPurchasesList($this->seasonId, 'overall');
		$data['kinowPurchases'] = $this->Factory_model->getKinowPurchasesList($this->seasonId);
		// echo "<pre>";
		// print_r($data['kinowPurchases']);
		// echo "</pre>";
		// die;

		$index = 0;
		if($data['seasonPurchasesStatistics']->seasonTotalPaid > $data['seasonPurchasesStatistics']->seasonTotalPurchases)
		{
			$index = $data['seasonPurchasesStatistics']->seasonTotalPaid - $data['seasonPurchasesStatistics']->seasonTotalPurchases;
			$data['balanceStatus'] = '<strong>Rs '.number_format($index).'</strong> in minus';
		}
		else if($data['seasonPurchasesStatistics']->seasonTotalPaid < $data['seasonPurchasesStatistics']->seasonTotalPurchases)
		{
			$index = $data['seasonPurchasesStatistics']->seasonTotalPurchases - $data['seasonPurchasesStatistics']->seasonTotalPaid;
			$data['balanceStatus'] = 'You have to pay <strong>Rs '.number_format($index).'</strong>';
		}
		else if($data['seasonPurchasesStatistics']->seasonTotalPaid == $data['seasonPurchasesStatistics']->seasonTotalPurchases)
		{
			$data['balanceStatus'] = 'Balance is equal';
		}

		if($this->input->post())
		{
			$insertData = array
			(
				'name'     => strCleaner($_POST['name']),
				'phone'    => strCleaner($_POST['phone']),
				'seasonId' => $this->seasonId,
				'status'   => 1,
				'createdOn'=> $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('suppliers',$insertData);
			if($inserted_id)
			{
				$this->session->set_flashdata('success_add_supplier',$this->lang->line('success_add_supplier'));
				$this->session->set_userdata('supplier-add-edit',$inserted_id);
				redirect(base_url('manage-purchases/'));
			}
		}
		else
		{
			$this->load->view('manage-purchases',$data);
		}
	}

	public function supplierDetail($supplierId)
	{
		$data['supplierId'] = $supplierId;
		$data['seasonId']   = $this->seasonId;
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Manage Supplier ('.$this->season.')';
		$data['headTittle']  = 'Manage Supplier ('.$this->season.')';
		$data['payments'] = $this->Common_model->getPayment($this->seasonId, $supplierId, 1);
		$data['totalPurchaseAmount'] = $this->Common_model->getTotalPurchaseAmount($this->seasonId, $supplierId);
		$data['totalPaidAmount']     = $this->Common_model->getTotalPaidAmount($this->seasonId, $supplierId, 1);
		$data['purchasesList'] = $this->Factory_model->getPurchasesList($this->seasonId, 'supplier', $supplierId);

		$index = 0;
		if($data['totalPaidAmount'] > $data['totalPurchaseAmount'])
		{
			$index = $data['totalPaidAmount'] - $data['totalPurchaseAmount'];
			$data['balanceStatus'] = 'Supplier have <strong>Rs '.number_format($index).'</strong> in advance';
		}
		else if($data['totalPaidAmount'] < $data['totalPurchaseAmount'])
		{
			$index = $data['totalPurchaseAmount'] - $data['totalPaidAmount'];
			$data['balanceStatus'] = 'You have to pay <strong>Rs '.number_format($index).'</strong> to Supplier';
		}
		else if($data['totalPaidAmount'] == $data['totalPurchaseAmount'])
		{
			$data['balanceStatus'] = 'Balance is equal';
		}

		$data['suppliers']    = $this->Factory_model->getSuppliers();
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('supplier-detail',$data);
	}

	public function paySupplierPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'    => strCleaner($_POST['seasonId']),
				'paymentOfId' => strCleaner($_POST['supplierId']),
				'paymentDate' => dateToYMD(strCleaner($_POST['paymentDate'])),
				'amount'	  => removeCommas(strCleaner($_POST['amount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'paymentOf'	  => 1,
				'status'	  => 1,
				'createdOn'	  => $this->createdOn	
			);

			$inserted_id = $this->Common_model->insertion('factory_payments', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('latest-supplier-payment-update', $inserted_id);
				$this->session->set_flashdata('success_pay_supplier', 'Payment has been added successfully');
				redirect(base_url('manage-purchases/supplier-detail/'.strCleaner($_POST['supplierId'])));
			}
		}
	}

	public function patriExpense()
	{
		if($this->input->post())
		{
			if(strCleaner($_POST['patriType']) == 'tenKGcotton')
			{
				$patriExpenseType = 1;
			}
			else if(strCleaner($_POST['patriType']) == 'tenKGphati')
			{
				$patriExpenseType = 2;
			}
			else if(strCleaner($_POST['patriType']) == 'eightKGphati')
			{
				$patriExpenseType = 3;
			}

			$data = array
			(
				'seasonId'         => strCleaner($_POST['seasonId']),
				'expenseDate'      => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount'    => removeCommas(strCleaner($_POST['expenseAmount'])),
				'quantity'         => removeCommas(strCleaner($_POST['quantity'])),
				'totalAmount'      => removeCommas(strCleaner($_POST['expenseAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'expenseType'      => 8,
				'patriExpenseType' => $patriExpenseType,
				'status'	       => 1,
				'createdOn'	       => $this->createdOn	
			);

			$inserted_id = $this->Common_model->insertion('expenses_factory', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('updated-patri-expense', $inserted_id);
				$this->session->set_flashdata('success_add_patri_expense', 'Patri expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses/'));
			}
		}
	}

	public function pattiExpense()
	{
		if($this->input->post())
		{

			$data = array
			(
				'seasonId'    => strCleaner($_POST['seasonId']),
				'expenseDate' => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount' => removeCommas(strCleaner($_POST['expenseAmount'])),
				'quantity'    => removeCommas(strCleaner($_POST['quantity'])),
				'totalAmount' => removeCommas(strCleaner($_POST['expenseAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'expenseType' => 7,
				'status'	  => 1,
				'createdOn'	  => $this->createdOn	
			);

			$inserted_id = $this->Common_model->insertion('expenses_factory', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('updated-patti-expense', $inserted_id);
				$this->session->set_flashdata('success_add_patti_expense', 'patti expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses/'));
			}
		}
	}

	public function addKargal()
	{
		if($this->input->post())
		{

			$data = array
			(
				'seasonId'    => strCleaner($_POST['seasonId']),
				'date'        => dateToYMD(strCleaner($_POST['date'])),
				'perAmount'   => removeCommas(strCleaner($_POST['perAmount'])),
				'quantity'    => removeCommas(strCleaner($_POST['quantity'])),
				'total'       => removeCommas(strCleaner($_POST['perAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'createdOn'	  => $this->createdOn	
			);

			$inserted_id = $this->Common_model->insertion('kargal', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('updated-kargal', $inserted_id);
				$this->session->set_flashdata('success_add_kargal', 'Kargal record has been added successfully');
				redirect(base_url('manage-factory/manage-kargal'));
			}
		}
	}

	public function editPattiExpense()
	{
		if($this->input->post())
		{
			$data = array
			(
				'expenseDate' => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount' => removeCommas(strCleaner($_POST['expenseAmount'])),
				'quantity'    => removeCommas(strCleaner($_POST['quantity'])),
				'totalAmount' => removeCommas(strCleaner($_POST['expenseAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'updatedOn'	  => $this->updatedOn	
			);

			if($this->Common_model->updateRecord($data, 'expenses_factory', strCleaner($_POST['expenseId'])))
			{
				$this->session->set_flashdata('success_add_patti_expense', $this->lang->line('updated_successfully'));
				$this->session->set_userdata('updated-patti-expense', strCleaner($_POST['expenseId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function editKargal()
	{
		if($this->input->post())
		{
			$data = array
			(
				'date'        => dateToYMD(strCleaner($_POST['date'])),
				'perAmount'   => removeCommas(strCleaner($_POST['perAmount'])),
				'quantity'    => removeCommas(strCleaner($_POST['quantity'])),
				'total'       => removeCommas(strCleaner($_POST['perAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'updatedOn'	  => $this->updatedOn	
			);

			if($this->Common_model->updateRecord($data, 'kargal', strCleaner($_POST['kargalId'])))
			{
				$this->session->set_flashdata('success_add_kargal', $this->lang->line('updated_successfully'));
				$this->session->set_userdata('updated-kargal', strCleaner($_POST['kargalId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function editPatriExpense()
	{
		if($this->input->post())
		{
			if(strCleaner($_POST['patriType']) == 'tenKGcotton')
			{
				$patriExpenseType = 1;
			}
			else if(strCleaner($_POST['patriType']) == 'tenKGphati')
			{
				$patriExpenseType = 2;
			}
			else if(strCleaner($_POST['patriType']) == 'eightKGphati')
			{
				$patriExpenseType = 3;
			}

			$data = array
			(
				'expenseDate' => dateToYMD(strCleaner($_POST['expenseDate'])),
				'expenseAmount' => removeCommas(strCleaner($_POST['expenseAmount'])),
				'quantity'    => removeCommas(strCleaner($_POST['quantity'])),
				'patriExpenseType' => $patriExpenseType,
				'totalAmount' => removeCommas(strCleaner($_POST['expenseAmount'])) * removeCommas(strCleaner($_POST['quantity'])),
				'updatedOn'	  => $this->updatedOn	
			);

			if($this->Common_model->updateRecord($data, 'expenses_factory', strCleaner($_POST['expenseId'])))
			{
				$this->session->set_flashdata('success_add_patri_expense', $this->lang->line('updated_successfully'));
				$this->session->set_userdata('updated-patri-expense', strCleaner($_POST['expenseId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function editSupplierPayment()
	{
		if($this->input->post())
		{
			$data = array
			(
				'paymentDate' => dateToYMD(strCleaner($_POST['paymentDate'])),
				'amount'	  => removeCommas(strCleaner($_POST['amount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription']),
				'updatedOn'	  => $this->updatedOn	
			);

			if($this->Common_model->updateRecord($data, 'factory_payments', strCleaner($_POST['paymentId'])))
			{
				$this->session->set_flashdata('success_pay_supplier', $this->lang->line('updated_successfully'));
				$this->session->set_userdata('latest-supplier-payment-update', strCleaner($_POST['paymentId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function addPurchases($supplierId)
	{
		$data['supplierId'] = $supplierId;
		$data['seasonId']   = $this->seasonId;
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = $this->lang->line('purchase_items').' ('.$this->season.')';
		$data['headTittle']  = $this->lang->line('purchase_items').' ('.$this->season.')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('purchase-items',$data);
	}

	public function editPurchaseItem($itemId, $url)
	{
		$data['itemId'] = $itemId;
		$data['redirect_url']    = $url;
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Edit Item ('.$this->season.')';
		$data['headTittle']  = 'Edit Item ('.$this->season.')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['selectedItem'] = $this->Common_model->getRecord($itemId, 'purchases');
		$this->load->view('edit-purchase-item',$data);
	}

	public function editSupplier()
	{
		if($this->input->post())
		{
			$data = array
			(
				'name'     => strCleaner($_POST['name']),
				'phone'    => strCleaner($_POST['phone']),
				'updatedOn'=> $this->updatedOn
			);

			if($this->Common_model->updateRecord($data, 'suppliers', strCleaner($_POST['supplierId'])))
			{
				$this->session->set_flashdata('success_add_supplier', $this->lang->line('updated_successfully'));
				$this->session->set_userdata('supplier-add-edit', strCleaner($_POST['supplierId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function purchaseBardana()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'charPathiQuantity' => removeCommas(strCleaner($_POST['charPathiQuantity'])),
				'charPathiAmount'   => removeCommas(strCleaner($_POST['charPathiAmount'])),
				'charPhatiTotal'	 => removeCommas(strCleaner($_POST['charPathiQuantity'])) * removeCommas(strCleaner($_POST['charPathiAmount'])),
				'panchPathiQuantity' => removeCommas(strCleaner($_POST['panchPathiQuantity'])),
				'panchPathiAmount'	 => removeCommas(strCleaner($_POST['panchPathiAmount'])),
				'panchPhatiTotal'	 => removeCommas(strCleaner($_POST['panchPathiQuantity'])) * removeCommas(strCleaner($_POST['panchPathiAmount'])),
				'sheyPathiQuantity' => removeCommas(strCleaner($_POST['sheyPathiQuantity'])),
				'sheyPathiAmount'	 => removeCommas(strCleaner($_POST['sheyPathiAmount'])),
				'sheyPhatiTotal'	 => removeCommas(strCleaner($_POST['sheyPathiQuantity'])) * removeCommas(strCleaner($_POST['sheyPathiAmount'])),
				'totalAmount'	 => ( removeCommas(strCleaner($_POST['charPathiQuantity'])) * removeCommas(strCleaner($_POST['charPathiAmount'])) ) + ( removeCommas(strCleaner($_POST['panchPathiQuantity'])) * removeCommas(strCleaner($_POST['panchPathiAmount'])) ) + ( removeCommas(strCleaner($_POST['sheyPathiQuantity'])) * removeCommas(strCleaner($_POST['sheyPathiAmount'])) ),
				'item'		   => 1,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_first', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
			}
		}
	}

	public function purchaseRadi()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'radiQuantity' => strCleaner($_POST['radiQuantity']),
				'radiAmount'   => strCleaner($_POST['radiAmount']),
				'totalAmount'  => strCleaner($_POST['radiTotalAmount']),
				'item'		   => 2,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_first', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
			}
		}
	}	

	public function manageExpenses()
	{
		$data['heading']     = 'Manage Factory Expenses';
		$data['headTittle']  = 'Manage Factory Expenses';
		$data['seasonId']    = $this->seasonId;
		$data['season']      = $this->Seasons_model->getSeason($data['seasonId']);
		$data['gardensList'] = $this->Seasons_model->gardenList($data['seasonId']);
		$this->session->set_userdata( 'seasonId' , $data['seasonId'] );
		$data['expenseStatistics'] = $this->Seasons_model->getExpenseStatistics($data['seasonId']);
		$data['totalExpenses']     = $data['expenseStatistics']->totalTransaport + $data['expenseStatistics']->totalLabour + $data['expenseStatistics']->totalOther;
		$data['transportExpenses'] = $this->Seasons_model->getExpensesFactory($data['seasonId'], 1);

		$data['transportOthers']   = $this->Seasons_model->getExpensesFactory($data['seasonId'], 3);
		$data['pumpExpenses']      = $this->Seasons_model->getPumpExpensesFactory($data['seasonId']);
		$data['personalCarExpense'] = $this->Seasons_model->getExpensesFactory($data['seasonId'], 6);
		$data['pattiExpense'] = $this->Seasons_model->getExpensesFactory($data['seasonId'], 7);
		$data['patriExpense'] = $this->Seasons_model->getExpensesFactory($data['seasonId'], 8);
		$data['labourExpenses']    = $this->Seasons_model->getLabourExpenses($data['seasonId']);
		$data['personalStaff']     = $this->Seasons_model->getPersonalStaffFactory($data['seasonId']);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('manage-expenses-factory', $data);
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

			$if_inserted = $this->Seasons_model->addExpenseTransportFactory($data);
			if($if_inserted)
			{
				$this->session->set_flashdata('updated-other-expense', $if_inserted);
				$this->session->set_flashdata('success_message','Expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses'));	
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
		$data['expenseToEdit'] = $this->Seasons_model->getExpenseToEditFactory($expenseId);
		$data['todayDate']   = date('Y-m-d');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('edit-other-expense-factory', $data);
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

			$if_updated = $this->Seasons_model->udpateTransportExpenseFactory($data,$_POST['expenseId']);

			if($if_updated)
			{
				$this->session->set_flashdata('success_add_other','Expense has been updated successfully');
				$this->session->set_flashdata('updated-other-expense',$_POST['expenseId']);
				redirect(base_url('manage-factory/manage-expenses'));
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

			$is_added = $this->Seasons_model->addPersonalCarExpenseFactory($data);
			if($is_added)
			{
				$this->session->set_userdata('updated-personal-expense', $is_added);  
				$this->session->set_flashdata('success_add_personal','Personal expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses/'));
			}
		}
	}

	public function editPersonalExpense($seasonId='', $expenseId='')
	{
		$data['seasonId']    = $seasonId;
		$data['expenseId']   = $expenseId;
		$data['headTittle']  = 'Edit Personal Car Expense';
		$data['heading']     = 'Edit Personal Car Expense';
		$data['headingMain'] = 'Edit Personal Car Expense';
		$data['expenseRow']  = $this->Seasons_model->getPumpExpenseRowFactory($expenseId);
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

			$if_updated = $this->Seasons_model->updatePersonalExpenseFactory($dataForUpdate,$_POST['expenseId']);
			if($if_updated)
			{
				$this->session->set_flashdata('success_add_personal','Personal Car expense has been updated successfully');
				$this->session->set_userdata('updated-personal-expense',$_POST['expenseId']);
				redirect(base_url('manage-factory/manage-expenses/'));
			}
		}
		else
		{
			$this->load->view('edit-personal-expense-factory',$data);
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
		$data['expenseToEdit'] = $this->Seasons_model->getExpenseToEditFactory($expenseId);
		$data['todayDate']   = date('Y-m-d');
		$data['url']         = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('edit-transport-expense-factory',$data);
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

			$if_updated = $this->Seasons_model->udpateTransportExpenseFactory($data,strCleaner($_POST['expenseId']));
			if($if_updated)
			{
				$perDay = removeCommas(strCleaner($_POST['transportHireAmount']));
				if(strCleaner($_POST['expenseId']))
				{
					$strtDate = dateToYMD(strCleaner($_POST['transportStartDate']));
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['expenseId']), 6, $strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['expenseId']), 6, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['expenseId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 6
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

			    	$this->session->set_userdata('transport-add-edit', strCleaner($_POST['expenseId']));
					$this->session->set_flashdata('success_edit_transport','Expense has been edited successfully');
					redirect(base_url('manage-factory/manage-expenses/'));	
				}	
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
				'role'		   =>6, 
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
			        	'managing'       => 7
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

				$this->session->set_userdata('updated-personal-staff', $inserted_id);
				$this->session->set_flashdata('success_add_personal_staff','Personal staff member has been added successfully');
				redirect(base_url('manage-factory/manage-expenses'));
			}
		}
	}

	public function transportExpenseDetail($seasonId,$expenseId)
	{
		$data['expenseId']         = $expenseId;
		$data['seasonId']          = $seasonId;
		$data['paymentsDetail']    = $this->Seasons_model->getTransportExpensePayments($expenseId);
		$data['selectedTransport'] = $this->Seasons_model->getSelectedTransportFactory($expenseId);
		$check = $this->Seasons_model->checkIfAttendanceAlreadyExist($expenseId, 6);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($check == 0 && $data['selectedTransport']->isTransportEnd == 0)
		{
			$dailyAttendanceData = array
			(
				'attendanceOfId' => $expenseId,
				'attendanceDate' => date('Y-m-d'),
				'attendance'	 =>1,
				'perDayAmount'   =>$data['selectedTransport']->transportHireAmount,
				'managing'		 =>6 	
			);
			$this->Seasons_model->addAttendence($dailyAttendanceData);
		}

		$data['headTittle']      = 'Transport Expense Detail';
		$data['heading']         = 'Managing Transport ('.$data['selectedTransport']->transportNumber.' '.$data['selectedTransport']->driverName.')';
		$data['headingMain']     = 'Garden Detail';
		$data['totalPaid']       = $this->Seasons_model->getTotalTransportPaid($expenseId);
		$data['totalRent']       = $this->Seasons_model->getTotalTransportRentFactory($expenseId);
		$data['totalRecords']	 = $this->Seasons_model->getTotalTransportRecord($expenseId, 6);

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

		$this->load->view('transport-expense-detail-factory',$data);
	}

	public function personalStaffDetail($memberId, $seasonId)
	{
		$data['seasonId']    = $seasonId;
		$data['memberId']    = $memberId;
		$data['headTittle']  = 'Member Detail';
		$data['heading']     = 'Member Detail';
		$data['headingMain'] = 'Member Detail';
		$data['memberDetail']= $this->Common_model->getRecord($memberId, 'staff');
		$data['memberAttendace'] = $this->Seasons_model->getForemanAttendace($memberId, 7);
		$data['memberAttendanceStatistics'] = attendanceStatistics($memberId, 7);
		$data['memberPaymentsDetail'] = $this->Seasons_model->getPersonalStaffPaymentsFactory($memberId, $seasonId);
		$data['totalPaid'] = $this->Seasons_model->getPersonalStaffTotalPaidFactory($memberId, $seasonId);
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


		$this->load->view('personal-staff-detail-factory', $data);
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
				'paymenType'		 => 1,
				'status'			 => 1
			);

			$inserted_id = $this->Seasons_model->givePaymentToForeman($data);
			if($inserted_id)
			{
				$this->session->set_userdata('edit_foreman_payment', $inserted_id);
				$this->session->set_flashdata('success_pay_payment','Payment Has been added successfully');
				redirect(base_url('manage-factory/personal-staff-detail/'.$_POST['memberId'].'/'.$_POST['seasonId']));
			}
		}
	}

	public function payEditPersonalStaff()
	{
		if($this->input->post())
		{
			$data = array
			(
				'paymentDate'		 => strCleaner(dateToYMD($_POST['paymentDate'])),
				'amount'		     => removeCommas(strCleaner($_POST['paymentAmount'])),
				'paymentDescription' => strCleaner($_POST['paymentDescription'])
			);

			if($this->Common_model->updateRecord($data, 'payments', strCleaner($_POST['paymentId'])))
			{
				$this->session->set_flashdata('global_delete_message_foreman_payment','Payment Has been edited successfully');
				$this->session->set_userdata('edit_foreman_payment', strCleaner($_POST['paymentId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}		}
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

			$is_added = $this->Seasons_model->addPumpExpenseFactory($data);
			if($is_added)
			{
				$this->session->set_userdata('updated-pump-expense', $is_added);
				$this->session->set_flashdata('success_add_pump','Pump expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses/'));
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
		$data['expenseRow']  = $this->Seasons_model->getPumpExpenseRowFactory($expenseId);
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

			$if_updated = $this->Seasons_model->updatePumpExpenseFactory($dataForUpdate, $_POST['expenseId']);
			if($if_updated)
			{
				$this->session->set_flashdata('success_add_pump','Pump expense has been updated successfully');
				$this->session->set_userdata('updated-pump-expense',$_POST['expenseId']);
				redirect(base_url('manage-factory/manage-expenses'));
			}
		}
		else
		{
			$this->load->view('edit-pump-expense-factory',$data);
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
			$if_updated = $this->Common_model->updateRecord($data, 'staff', strCleaner($_POST['memberId']));
			if($if_updated)
			{
				$perDay = removeCommas(strCleaner($_POST['perdayAmount']));
				if(strCleaner($_POST['memberId']))
				{
					$strtDate = dateToYMD(strCleaner(strCleaner($_POST['startDate'])));
					$endDate  = date('Y-m-d');
				  	while (strtotime($strtDate) <= strtotime($endDate)) 
				  	{
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['memberId']), 7,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['memberId']), 7, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['memberId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 7
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

					$this->session->set_flashdata('success_add_personal_staff','Member has been edited successfully');
					$this->session->set_userdata('updated-personal-staff',$_POST['memberId']);
					redirect(base_url('manage-factory/manage-expenses/'));	
				}	
			}
		}
	}

	public function purchaseKeel()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'keelQuantity' => removeCommas(strCleaner($_POST['boriQuantity'])),
				'keelAmount'   => removeCommas(strCleaner($_POST['boriAmount'])),
				'totalAmount'  => removeCommas(strCleaner($_POST['keelTotalAmount'])),
				'item'		   => 3,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_first', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
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
				'paymenType'      => 1,
				'status'      => 1
			);

			$inserted_id = $this->Seasons_model->addTransportExpensePayment($data);
			if($inserted_id)
			{
				$this->session->set_userdata('edit_transport_payment_session', $inserted_id);
				$this->session->set_flashdata('success_pay_payment','Payment Has been added successfully');
				redirect(base_url('transport-expense-factory/'.$_POST['seasonId'].'/detail/'.$_POST['transportExpenseId']));
			}
		}
	}



	public function purchaseSticker()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'stickerQuantity' => removeCommas(strCleaner($_POST['stickerQuantity'])),
				'stickerAmount'   => removeCommas(strCleaner($_POST['stickerAmount'])),
				'totalAmount'	  => removeCommas(strCleaner($_POST['stickerTotalAmount'])),
				'item'		   => 4,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_first', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
			}
		}
	}

	public function purchaseSheet()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'doPlySheetQuantity' => removeCommas(strCleaner($_POST['doPlyQuantity'])),
				'doPlySheetAmount'   => removeCommas(strCleaner($_POST['doPlyAmount'])),
				'doPlySheetTotal'	 => removeCommas(strCleaner($_POST['doPlyQuantity'])) * removeCommas(strCleaner($_POST['doPlyAmount'])),
				'teenPlySheetQuantity' => removeCommas(strCleaner($_POST['teenPlyQuantity'])),
				'teenPlySheetAmount'	 => removeCommas(strCleaner($_POST['teenPlyAmount'])),
				'teenPlySheetTotal'	 => removeCommas(strCleaner($_POST['teenPlyQuantity'])) * removeCommas(strCleaner($_POST['teenPlyAmount'])),
				'panchPlySheetQuantity' => removeCommas(strCleaner($_POST['panchPlyQuantity'])),
				'panchPlySheetAmount'	 => removeCommas(strCleaner($_POST['panchPlyAmount'])),
				'panchPlySheetTotal'	 => removeCommas(strCleaner($_POST['panchPlyQuantity'])) * removeCommas(strCleaner($_POST['panchPlyAmount'])),
				'totalAmount'	 => ( removeCommas(strCleaner($_POST['doPlyQuantity'])) * removeCommas(strCleaner($_POST['doPlyAmount'])) ) + ( removeCommas(strCleaner($_POST['teenPlyQuantity'])) * removeCommas(strCleaner($_POST['teenPlyAmount'])) ) + ( removeCommas(strCleaner($_POST['panchPlyQuantity'])) * removeCommas(strCleaner($_POST['panchPlyAmount'])) ),
				'item'		   => 5,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);
			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_second', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
			}
		}
	}

	public function purchaseCotton()
	{
		if($this->input->post())
		{
			$data = array
			(
				'supplierId'   => strCleaner($_POST['supplierId']),
				'seasonId'     => strCleaner($_POST['seasonId']),
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'cottonQuantity'   => removeCommas(strCleaner($_POST['cottonQuantity'])),
				'cottonAmount'     => removeCommas(strCleaner($_POST['cottonAmount'])),
				'totalAmount'  => removeCommas(strCleaner($_POST['cottonTotalAmount'])),
				'item'		   => 6,
				'status'       => 1,
				'createdOn'    => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('purchases',$data);
			if($inserted_id)
			{
				$this->session->set_userdata('purchases-list-add-edit', $inserted_id);
				$this->session->set_flashdata('success_purchase_second', 'Item has been purchased successfully');
				redirect(base_url('manage-factory/add-purchases/'.strCleaner($_POST['supplierId'])));
			}
		}
	}

	public function purchaseKinow()
	{
		$data['seasonId']   = $this->seasonId;
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Purcahse Kinow ('.$this->season.')';
		$data['headTittle']  = 'Purcahse Kinow ('.$this->season.')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['gardenList'] = $this->Factory_model->gardenList($this->seasonId);

		if($this->input->post())
		{
			$data = array
			(
				'seasonId'          => strCleaner($_POST['seasonId']),
				'gardenId'          => strCleaner($_POST['gardenId']),
				'quantityInMaan'    => strCleaner($_POST['quantityInMaan']),
				'categoryAQuanity'  => removeCommas(strCleaner($_POST['categoryAQuanity'])),
				'categoryAPrice'    => removeCommas(strCleaner($_POST['categoryAPrice'])),
				'categoryBQuantity' => removeCommas(strCleaner($_POST['categoryBQuanity'])),
				'categoryBPrice'    => removeCommas(strCleaner($_POST['categoryBPrice'])),
				'totalPrice'       => removeCommas(strCleaner($_POST['totalAmount'])),
				'status'		   => 1,
				'purchaseOn'       => $this->createdOn,
				'addedOn'          => $this->createdOn
			);

			if($this->Common_model->insertion('kinow_purchasing', $data))
			{
				$update = array
				(
					'status'      => 2
				);

				if($this->Common_model->updateRecord($update, 'garden_purchasing', strCleaner($_POST['gardenId'])))
				{
					// $this->session->set_userdata('success-add-edit-kinow', 'Garden has been purchased successfully');
					$this->session->set_flashdata('success_add_kinow', 'Garden has been purchased successfully');
					redirect(base_url('manage-purchases'));
				}
			}
		}
		else
		{
			$this->load->view('purchase-kinow',$data);
		}
	}

	public function EditpurchaseBardana()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'charPathiQuantity' => removeCommas(strCleaner($_POST['charPathiQuantity'])),
				'charPathiAmount'   => removeCommas(strCleaner($_POST['charPathiAmount'])),
				'charPhatiTotal'	 => removeCommas(strCleaner($_POST['charPathiQuantity'])) * removeCommas(strCleaner($_POST['charPathiAmount'])),
				'panchPathiQuantity' => removeCommas(strCleaner($_POST['panchPathiQuantity'])),
				'panchPathiAmount'	 => removeCommas(strCleaner($_POST['panchPathiAmount'])),
				'panchPhatiTotal'	 => removeCommas(strCleaner($_POST['panchPathiQuantity'])) * removeCommas(strCleaner($_POST['panchPathiAmount'])),
				'sheyPathiQuantity' => removeCommas(strCleaner($_POST['sheyPathiQuantity'])),
				'sheyPathiAmount'	 => removeCommas(strCleaner($_POST['sheyPathiAmount'])),
				'sheyPhatiTotal'	 => removeCommas(strCleaner($_POST['sheyPathiQuantity'])) * removeCommas(strCleaner($_POST['sheyPathiAmount'])),
				'totalAmount'	 => ( removeCommas(strCleaner($_POST['charPathiQuantity'])) * removeCommas(strCleaner($_POST['charPathiAmount'])) ) + ( removeCommas(strCleaner($_POST['panchPathiQuantity'])) * removeCommas(strCleaner($_POST['panchPathiAmount'])) ) + ( removeCommas(strCleaner($_POST['sheyPathiQuantity'])) * removeCommas(strCleaner($_POST['sheyPathiAmount'])) )
			);
			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function EditpurchaseRadi()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'radiQuantity' => strCleaner($_POST['radiQuantity']),
				'radiAmount'   => strCleaner($_POST['radiAmount']),
				'totalAmount'  => strCleaner($_POST['radiTotalAmount'])
			);

			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}	

	public function EditpurchaseKeel()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'keelQuantity' => removeCommas(strCleaner($_POST['boriQuantity'])),
				'keelAmount'   => removeCommas(strCleaner($_POST['boriAmount'])),
				'totalAmount'  => removeCommas(strCleaner($_POST['keelTotalAmount']))
			);

			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function EditpurchaseSticker()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'stickerQuantity' => removeCommas(strCleaner($_POST['stickerQuantity'])),
				'stickerAmount'   => removeCommas(strCleaner($_POST['stickerAmount'])),
				'totalAmount'	  => removeCommas(strCleaner($_POST['stickerTotalAmount']))
			);

			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function EditpurchaseSheet()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'doPlySheetQuantity' => removeCommas(strCleaner($_POST['doPlyQuantity'])),
				'doPlySheetAmount'   => removeCommas(strCleaner($_POST['doPlyAmount'])),
				'doPlySheetTotal'	 => removeCommas(strCleaner($_POST['doPlyQuantity'])) * removeCommas(strCleaner($_POST['doPlyAmount'])),
				'teenPlySheetQuantity' => removeCommas(strCleaner($_POST['teenPlyQuantity'])),
				'teenPlySheetAmount'	 => removeCommas(strCleaner($_POST['teenPlyAmount'])),
				'teenPlySheetTotal'	 => removeCommas(strCleaner($_POST['teenPlyQuantity'])) * removeCommas(strCleaner($_POST['teenPlyAmount'])),
				'panchPlySheetQuantity' => removeCommas(strCleaner($_POST['panchPlyQuantity'])),
				'panchPlySheetAmount'	 => removeCommas(strCleaner($_POST['panchPlyAmount'])),
				'panchPlySheetTotal'	 => removeCommas(strCleaner($_POST['panchPlyQuantity'])) * removeCommas(strCleaner($_POST['panchPlyAmount'])),
				'totalAmount'	 => ( removeCommas(strCleaner($_POST['doPlyQuantity'])) * removeCommas(strCleaner($_POST['doPlyAmount'])) ) + ( removeCommas(strCleaner($_POST['teenPlyQuantity'])) * removeCommas(strCleaner($_POST['teenPlyAmount'])) ) + ( removeCommas(strCleaner($_POST['panchPlyQuantity'])) * removeCommas(strCleaner($_POST['panchPlyAmount'])))
			);
			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}

		}
	}

	public function EditpurchaseCotton()
	{
		if($this->input->post())
		{
			$update = array
			(
				'purchaseDate' => dateToYMD(strCleaner($_POST['purchaseDate'])),
				'cottonQuantity'   => removeCommas(strCleaner($_POST['cottonQuantity'])),
				'cottonAmount'     => removeCommas(strCleaner($_POST['cottonAmount'])),
				'totalAmount'  => removeCommas(strCleaner($_POST['cottonTotalAmount']))
			);

			if($this->Common_model->updateRecord($update, 'purchases', strCleaner($_POST['itemId'])))
			{
				$this->session->set_userdata('purchases-list-add-edit', strCleaner($_POST['itemId']));
				$this->session->set_flashdata('success_edit_purchase', 'Item has been edited successfully');
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}


	public function purchaseKinowAgain()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'          => strCleaner($_POST['seasonId']),
				'gardenId'          => strCleaner($_POST['gardenId']),
				'quantityInMaan'    => strCleaner($_POST['quantityInMaan']),
				'categoryAQuanity'  => removeCommas(strCleaner($_POST['categoryAQuanity'])),
				'categoryAPrice'    => removeCommas(strCleaner($_POST['categoryAPrice'])),
				'categoryBQuantity' => removeCommas(strCleaner($_POST['categoryBQuanity'])),
				'categoryBPrice'    => removeCommas(strCleaner($_POST['categoryBPrice'])),
				'totalPrice'       => removeCommas(strCleaner($_POST['totalAmount'])),
				'status'		   => 1,
				'purchaseOn'       => $this->createdOn,
				'addedOn'          => $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('kinow_purchasing', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('add-edit-kinow-again', $inserted_id);
				$this->session->set_flashdata('success-add-edit-kinow-again', 'Kinow has been purchased successfully');
				redirect(base_url('manage-purchases/kinow-purchase-detail/'.strCleaner($_POST['gardenId'])));
			}
		}
	}

	public function editPurchaseKinow()
	{
		if($this->input->post())
		{
			$data = array
			(
				'quantityInMaan'    => strCleaner($_POST['quantityInMaan']),
				'categoryAQuanity'  => removeCommas(strCleaner($_POST['categoryAQuanity'])),
				'categoryAPrice'    => removeCommas(strCleaner($_POST['categoryAPrice'])),
				'categoryBQuantity' => removeCommas(strCleaner($_POST['categoryBQuanity'])),
				'categoryBPrice'    => removeCommas(strCleaner($_POST['categoryBPrice'])),
				'totalPrice'       => removeCommas(strCleaner($_POST['totalAmount'])),
				'status'		   => 1,
				'updatedOn'        => $this->updatedOn
			);

			
			if($this->Common_model->updateRecord($data, 'kinow_purchasing', strCleaner($_POST['recordId'])))
			{
				$this->session->set_userdata('add-edit-kinow-again', strCleaner($_POST['recordId']));
				$this->session->set_flashdata('success-add-edit-kinow-again', 'Record has been edited successfully');
				redirect(base_url('manage-purchases/kinow-purchase-detail/'.strCleaner($_POST['gardenId'])));
			}
		}
	}



	public function kinowPurchaseDetail($gardenId)
	{
		$data['seasonId']   = $this->seasonId;
		$data['gardenId']   = $gardenId;
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Purcahse Kinow ('.$this->season.')';
		$data['headTittle']  = 'Purcahse Kinow ('.$this->season.')';
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['gardenList'] = $this->Seasons_model->gardenList($this->seasonId);
		$data['kinowPurchasesByGardenStatictics'] = $this->Factory_model->getKinowPurchasesByGarden($gardenId);
		$data['kinowPurchases'] = $this->Factory_model->getKinowPurchases($gardenId);
		$this->load->view('kinow-purchase-detail', $data);	
	}

	public function manageWarehouse()
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['heading']     = 'Manage Warehose ('.$this->season.')';
		$data['headTittle']  = 'Manage Warehose ('.$this->season.')';
		$data['totalItems']  = $this->Factory_model->getTotalItems($this->seasonId);
		$data['totalKinow']  = $this->Factory_model->getTotalKinow($this->seasonId);
		$this->load->view('manage-warehouse', $data);
	}

	public function manageKargal()
	{
		$data['heading']     = 'Manage Kargal';
		$data['headTittle']  = 'Manage Kargal';
		$data['seasonId']    = $this->seasonId;
		$data['season']      = $this->Seasons_model->getSeason($data['seasonId']);
		$data['kargals']      = $this->Seasons_model->getKargal($data['seasonId']);
		$data['sum'] = 0;
		foreach($data['kargals'] as $kargal):
			$data['sum'] += $kargal->total;
		endforeach;

		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('manage-kargal', $data);
	}

	public function manageFactoryLabour()
	{
		$data['seasonId'] = $this->seasonId;
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['heading']     = 'Manage Factory Labour ('.$this->season.')';
		$data['headTittle']  = 'Manage Factory Labour ('.$this->season.')';
		$data['labourExpenses']    = $this->Factory_model->getLabourExpenses($this->seasonId);
		$this->load->view('factory-labour', $data);	
	}

	public function addExpense($type, $seasonId)
	{
		$data['season']      = $this->season;
		$data['seasonId']    = $seasonId;
		$data['type']        = $type;
		$data['headTittle']  = 'Add Expense';
		$data['heading']     = 'Add Expense (Season '.$data['season'].')';
		$data['headingMain'] = 'Add New '.ucfirst($type).' Expense';
		$data['todayDate']   = date('Y-m-d');
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$this->load->view('add-expense-factory', $data);
	}

	public function addFactoryLabourForeman()
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
				'role'       			 => 4,
				'status'       			 => 1,
				'createdOn'              => date('Y-m-d')
			);

			$inserted_id = $this->Seasons_model->addLabourForeman($data);
			if($inserted_id)
			{
				$this->session->set_userdata('updated-foreman-factory', $inserted_id);
				$this->session->set_flashdata('success_add_foreman_factory','Foreman has been added successfully');
				redirect(base_url('manage-factory/manage-labour/'));
			}
		}
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
			$inserted_id = $this->Seasons_model->addExpenseTransportFactory($data);
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
			        	'managing'       =>6
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

			    $this->session->set_userdata('transport-add-edit', $inserted_id);
				$this->session->set_flashdata('success_message','Expense has been added successfully');
				redirect(base_url('manage-factory/manage-expenses/'));
			}
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
				$this->session->set_flashdata('success_add_foreman_factory','Foreman has been updated successfully');
				$this->session->set_userdata('updated-foreman-factory', $_POST['foremanId']);
				redirect(base_url('manage-factory/manage-labour'));
			}
		}
		else
		{
			$this->load->view('edit-foreman-factory', $data);
		}
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
				'role'		   =>5, 
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
			        	'managing'       =>5
			        );
			        $this->Seasons_model->addAttendence($attendanceData);
			        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
			    }

			    $this->session->set_userdata('updated-labour', $inserted_id);
				$this->session->set_flashdata('success_add_labour','Labour has been added successfully');
				redirect(base_url('foreman-detail-factory/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
			}
		}
	}

	public function foremanDetailFactory($seasonId, $foremanId)
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

		$data['labours'] = $this->Seasons_model->getForemanLaboursFactory($foremanId);
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

		$this->load->view('foreman-detail-factory', $data);
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
				  		if($this->Seasons_model->checkAttendance(strCleaner($_POST['labourId']), 5,$strtDate))
				  		{
					        $updateAttendance = array
					        (
					        	'perDayAmount'	 => $perDay,
					        );
					        $this->Seasons_model->updateAttendance($updateAttendance, strCleaner($_POST['labourId']), 5, $strtDate );
				  		}
				  		else
				  		{
					        $attendanceData = array
					        (
					        	'attendanceOfId' => strCleaner($_POST['labourId']),
					        	'attendanceDate' => $strtDate,
					        	'attendance'     => 1,
					        	'perDayAmount'	 => $perDay,
					        	'managing'       => 5
					        );
					        $this->Seasons_model->addAttendence($attendanceData);
				  		}
				        $strtDate = date ("Y-m-d", strtotime("+1 days", strtotime($strtDate)));
				    }

					$this->session->set_flashdata('success_add_labour','Labour has been edited successfully');
					$this->session->set_userdata('updated-labour',$_POST['labourId']);
					redirect(base_url('foreman-detail-factory/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));	
				}	
			}
		}
		else
		{
			$this->load->view('edit-labour-factory',$data);
		}
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
				redirect(base_url('foreman-detail-factory/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
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
				redirect(base_url('foreman-detail-factory/'.$_POST['seasonId'].'/detail/'.$_POST['foremanId']));
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

			if($this->Common_model->updateRecord($data, 'payments', strCleaner($_POST['paymentId'])))
			{
				$this->session->set_flashdata('global_delete_message_foreman_payment','Payment Has been edited successfully');
				$this->session->set_userdata('edit_foreman_payment', strCleaner($_POST['paymentId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function labourDetails($seasonId,$foremanId,$labourId)
	{
		$data['seasonId']          = $seasonId;
		$data['foremanId']         = $foremanId;
		$data['labourId']          = $labourId;
		$data['selectedLabour'] = $this->Seasons_model->getSelectedLabour($labourId);
		$check = $this->Seasons_model->checkIfAttendanceAlreadyExist($labourId, 5);
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		if($check == 0 && $data['selectedLabour']->ifSessionEnd == 0)
		{
			$dailyAttendanceData = array
			(
				'attendanceOfId' => $labourId,
				'attendanceDate' => date('Y-m-d'),
				'attendance'	 =>1,
				'managing'		 =>5
			);
			$this->Seasons_model->addAttendence($dailyAttendanceData);
		}

		$data['headTittle']       = 'Labour Detail';
		$data['heading']          = 'Managing Labour ('.$data['selectedLabour']->name.')';
		$data['headingMain']      = 'Managing Labour ('.$data['selectedLabour']->name.')';
		// $data['paidToForeman']    = 0;
		$data['labourAttendance'] = $this->Seasons_model->getForemanAttendace($labourId,5);
		$data['labourAttendanceStatistics'] = attendanceStatistics($labourId,5);

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


		$this->load->view('labour-detail-factory',$data);
	}

	public function changeStatus($id)
	{
		$data = array
		(
			'isCompleted' => 1
		);

		if($this->Common_model->updateRecord($data, 'garden_purchasing', $id))
		{
			redirect(base_url('manage-purchases/kinow-purchase-detail/'.$id));
		}
	}

	public function manageProduction()
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['heading']     = 'Manage Prodcution ('.$this->season.')';
		$data['headTittle']  = 'Manage Production ('.$this->season.')';
		$data['productionList'] = $this->Factory_model->getProductionList($this->seasonId);
		$data['selectedRecord'] = $this->Factory_model->getSelectedProductionRecord($this->seasonId, date('Y-m-d'));
		$data['overallStatistics'] = $this->Factory_model->getOverallProductionStatistics($this->seasonId);
		$data['customers']   = $this->Factory_model->getCustomers($this->seasonId);
		// echo "<pre>";
		// print_r($data['overallStatistics']);
		// echo "</pre>";
		// die;
		$this->load->view('manage-production', $data);
	}

	public function addPhatiToProduction()
	{
		if($this->input->post())
		{
			$array = $this->Factory_model->checkIfExist(strCleaner($_POST['seasonId']), strCleaner(dateToYMD($_POST['addDate'])));
			$check = count($array);
			if(strCleaner($_POST['kgType']) == 8)
			{
				if($check > 0)
				{
					$update = array
					(
						'fourtyEight_first'   => strCleaner($_POST['fourtyEight']),
						'fiftySix_first'      => strCleaner($_POST['fiftySix']),
						'sixtyFour_first'     => strCleaner($_POST['sixtyFour']),
						'seventyTwo_first'    => strCleaner($_POST['seventyTwo']),
						'eighty_first'        => strCleaner($_POST['eighty']),
						'ninety_first'        => strCleaner($_POST['ninety']),
						'hundred_first'       => strCleaner($_POST['hundred']),
						'hundredAndTen_first' => strCleaner($_POST['hundredAndTen']),
						'totalFirst'    => strCleaner($_POST['pathi8KgTotal']),
						'isFirstFilled' => 1
					);

					if($this->Factory_model->updateKinowProductionRecod($update, strCleaner($_POST['seasonId']), strCleaner(dateToYMD($_POST['addDate']))))
					{
						// $this->session->set_userdata('add-edit-kinow-production', $inserted_id);
						$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
						redirect(base_url('manage-factory/manage-production/'));
					}
				}
				else
				{
					$data = array
					(
						'seasonId'      => strCleaner($_POST['seasonId']),
						'addDate'       => strCleaner(dateToYMD($_POST['addDate'])),
						'fourtyEight_first'   => strCleaner($_POST['fourtyEight']),
						'fiftySix_first'      => strCleaner($_POST['fiftySix']),
						'sixtyFour_first'     => strCleaner($_POST['sixtyFour']),
						'seventyTwo_first'    => strCleaner($_POST['seventyTwo']),
						'eighty_first'        => strCleaner($_POST['eighty']),
						'ninety_first'        => strCleaner($_POST['ninety']),
						'hundred_first'       => strCleaner($_POST['hundred']),
						'hundredAndTen_first' => strCleaner($_POST['hundredAndTen']),
						'totalFirst'    => strCleaner($_POST['pathi8KgTotal']),
						'status'        => 1,
						'isFirstFilled' => 1,
						'createdOn'     => $this->createdOn
					);	
				}

				if($this->Common_model->insertion('kinow_production', $data))
				{
					$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
					redirect(base_url('manage-factory/manage-production/'));
				}
			}
			else if(strCleaner($_POST['kgType']) == 10)
			{
				if($check > 0)
				{
					$update = array
					(
						'fourtyEight_second'   => strCleaner($_POST['fourtyEight']),
						'fiftySix_second'      => strCleaner($_POST['fiftySix']),
						'sixtyFour_second'     => strCleaner($_POST['sixtyFour']),
						'seventyTwo_second'    => strCleaner($_POST['seventyTwo']),
						'eighty_second'        => strCleaner($_POST['eighty']),
						'ninety_second'        => strCleaner($_POST['ninety']),
						'hundred_second'       => strCleaner($_POST['hundred']),
						'hundredAndTen_second' => strCleaner($_POST['hundredAndTen']),
						'totalSecond'          => strCleaner($_POST['pathi10KgTotal']),
						'isSecondFilled'       => 1

					);

					if($this->Factory_model->updateKinowProductionRecod($update, strCleaner($_POST['seasonId']), strCleaner(dateToYMD($_POST['addDate']))))
					{
						// $this->session->set_userdata('add-edit-kinow-production', $inserted_id);
						$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
						redirect(base_url('manage-factory/manage-production/'));
					}
				}
				else
				{
					$data = array
					(
						'seasonId'      => strCleaner($_POST['seasonId']),
						'addDate'       => strCleaner(dateToYMD($_POST['addDate'])),
						'fourtyEight_second'   => strCleaner($_POST['fourtyEight']),
						'fiftySix_second'      => strCleaner($_POST['fiftySix']),
						'sixtyFour_second'     => strCleaner($_POST['sixtyFour']),
						'seventyTwo_second'    => strCleaner($_POST['seventyTwo']),
						'eighty_second'        => strCleaner($_POST['eighty']),
						'ninety_second'        => strCleaner($_POST['ninety']),
						'hundred_second'       => strCleaner($_POST['hundred']),
						'hundredAndTen_second' => strCleaner($_POST['hundredAndTen']),
						'totalSecond'   => strCleaner($_POST['pathi10KgTotal']),
						'status'		=> 1,
						'isSecondFilled'=> 1,
						'createdOn'     => $this->createdOn
					);

					if($this->Common_model->insertion('kinow_production', $data))
					{
						$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
						redirect(base_url('manage-factory/manage-production/'));
					}
				}
			}

			$inserted_id = $this->Common_model->insertion('kinow_production', $data);
			if($inserted_id)
			{
				$this->session->set_userdata('add-edit-kinow-production', $inserted_id);
				$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
				redirect(base_url('manage-factory/manage-production/'));
			}
		}
	}

	public function addCottonToProduction()
	{
		if($this->input->post())
		{
			$array = $this->Factory_model->checkIfExist(strCleaner($_POST['seasonId']), strCleaner(dateToYMD($_POST['addDate'])));
			$check = count($array);
			if($check > 0)
			{
				$update = array
				(
					'fourtyTwo_cotton'     => strCleaner($_POST['fourtyTwo']),
					'fourtyEight_cotton'   => strCleaner($_POST['fourtyEight']),
					'fiftySix_cotton'      => strCleaner($_POST['fiftySix']),
					'sixty_cotton'         => strCleaner($_POST['sixty']),
					'sixtySix_cotton'      => strCleaner($_POST['sixtySix']),
					'seventyTwo_cotton'    => strCleaner($_POST['seventyTwo']),
					'eighty_cotton'        => strCleaner($_POST['eighty']),
					'ninety_cotton'        => strCleaner($_POST['ninety']),
					'hundred_cotton'       => strCleaner($_POST['hundred']),
					'hundredAndTen_cotton' => strCleaner($_POST['hundredAndTen']),
					'cottonTotal'         => strCleaner($_POST['cottonTotal']),
					'isCottonFilled'=> 1

				);

				if($this->Factory_model->updateKinowProductionRecod($update, strCleaner($_POST['seasonId']), strCleaner(dateToYMD($_POST['addDate']))))
				{
					// $this->session->set_userdata('add-edit-kinow-production', $inserted_id);
					$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
					redirect(base_url('manage-factory/manage-production/'));
				}
			}
			else
			{
				$data = array
				(
					'seasonId'      => strCleaner($_POST['seasonId']),
					'addDate'       => dateToYMD(strCleaner($_POST['addDate'])),
					'fourtyTwo_cotton'     => strCleaner($_POST['fourtyTwo']),
					'fourtyEight_cotton'   => strCleaner($_POST['fourtyEight']),
					'fiftySix_cotton'      => strCleaner($_POST['fiftySix']),
					'sixty_cotton'         => strCleaner($_POST['sixty']),
					'sixtySix_cotton'      => strCleaner($_POST['sixtySix']),
					'seventyTwo_cotton'    => strCleaner($_POST['seventyTwo']),
					'eighty_cotton'        => strCleaner($_POST['eighty']),
					'ninety_cotton'        => strCleaner($_POST['ninety']),
					'hundred_cotton'       => strCleaner($_POST['hundred']),
					'hundredAndTen_cotton' => strCleaner($_POST['hundredAndTen']),
					'cottonTotal'   => strCleaner($_POST['cottonTotal']),
					'status'		=> 1,
					'isCottonFilled'=> 1,
					'createdOn'     => $this->createdOn
				);

				$inserted_id = $this->Common_model->insertion('kinow_production', $data);
				if($inserted_id)
				{
					$this->session->set_userdata('add-edit-kinow-production', $inserted_id);
					$this->session->set_flashdata('success-add-edit-kinow-production', 'Pathi detail has been added successfully');
					redirect(base_url('manage-factory/manage-production/'));
				}
			}

		}
	}

	public function updateRecordProduction()
	{
		if($this->input->post())
		{
			$data = array
			(
				'fourtyEight_first'  => strCleaner($_POST['fourtyEight_first']) == '' ? 0 : strCleaner($_POST['fourtyEight_first']),
				'fiftySix_first'     => strCleaner($_POST['fiftySix_first']) == '' ? 0 : strCleaner($_POST['fiftySix_first']),
				'sixtyFour_first'    => strCleaner($_POST['sixtyFour_first']) == '' ? 0 : strCleaner($_POST['sixtyFour_first']),
				'seventyTwo_first'   => strCleaner($_POST['seventyTwo_first']) == '' ? 0 : strCleaner($_POST['seventyTwo_first']),
				'eighty_first'       => strCleaner($_POST['eighty_first']) == '' ? 0 : strCleaner($_POST['eighty_first']),
				'ninety_first'       => strCleaner($_POST['ninety_first']) == '' ? 0 : strCleaner($_POST['ninety_first']),
				'hundred_first'      => strCleaner($_POST['hundred_first']) == '' ? 0 : strCleaner($_POST['hundred_first']),
				'hundredAndTen_first'=> strCleaner($_POST['hundredAndTen_first']) == '' ? 0 : strCleaner($_POST['hundredAndTen_first']),
				'totalFirst'         => strCleaner($_POST['totalFirst']) == '' ? 0 : strCleaner($_POST['totalFirst']),
				'fourtyEight_second' => strCleaner($_POST['fourtyEight_second']) == '' ? 0 : strCleaner($_POST['fourtyEight_second']),
				'fiftySix_second'    => strCleaner($_POST['fiftySix_second']) == '' ? 0 : strCleaner($_POST['fiftySix_second']),
				'sixtyFour_second'   => strCleaner($_POST['sixtyFour_second']) == '' ? 0 : strCleaner($_POST['sixtyFour_second']),
				'seventyTwo_second'  => strCleaner($_POST['seventyTwo_second']) == '' ? 0 : strCleaner($_POST['seventyTwo_second']),
				'eighty_second'      => strCleaner($_POST['eighty_second']) == '' ? 0 : strCleaner($_POST['eighty_second']),
				'ninety_second'      => strCleaner($_POST['ninety_second']) == '' ? 0 : strCleaner($_POST['ninety_second']),
				'hundred_second'     => strCleaner($_POST['hundred_second']) == '' ? 0 : strCleaner($_POST['hundred_second']),
				'hundredAndTen_second'=> strCleaner($_POST['hundredAndTen_second']) == '' ? 0 : strCleaner($_POST['hundredAndTen_second']),
				'totalSecond'        => strCleaner($_POST['totalSecond']) == '' ? 0 : strCleaner($_POST['totalSecond']),
				'fourtyTwo_cotton'   => strCleaner($_POST['fourtyTwo_cotton']) == '' ? 0 : strCleaner($_POST['fourtyTwo_cotton']),
				'fourtyEight_cotton' => strCleaner($_POST['fourtyEight_cotton']) == '' ? 0 : strCleaner($_POST['fourtyEight_cotton']),
				'fiftySix_cotton'    => strCleaner($_POST['fiftySix_cotton']) == '' ? 0 : strCleaner($_POST['fiftySix_cotton']),
				'sixty_cotton'       => strCleaner($_POST['sixty_cotton']) == '' ? 0 : strCleaner($_POST['sixty_cotton']),
				'sixtySix_cotton'    => strCleaner($_POST['sixtySix_cotton']) == '' ? 0 : strCleaner($_POST['sixtySix_cotton']),
				'seventyTwo_cotton'  => strCleaner($_POST['seventyTwo_cotton']) == '' ? 0 : strCleaner($_POST['seventyTwo_cotton']),
				'eighty_cotton'      => strCleaner($_POST['eighty_cotton']) == '' ? 0 : strCleaner($_POST['eighty_cotton']),
				'ninety_cotton'      => strCleaner($_POST['ninety_cotton']) == '' ? 0 : strCleaner($_POST['ninety_cotton']),
				'hundred_cotton'     => strCleaner($_POST['hundred_cotton']) == '' ? 0 : strCleaner($_POST['hundred_cotton']),
				'hundredAndTen_cotton'=> strCleaner($_POST['hundredAndTen_cotton']) == '' ? 0 : strCleaner($_POST['hundredAndTen_cotton']),
				'cottonTotal'        => strCleaner($_POST['cottonTotal']) == '' ? 0 : strCleaner($_POST['cottonTotal']),
				'updatedOn'          => $this->updatedOn
			);
		}
		if($this->Common_model->updateRecord($data, 'kinow_production', strCleaner($_POST['recordId'])))
		{
			$this->session->set_userdata('add-edit-kinow-production', strCleaner($_POST['recordId']));
			$this->session->set_flashdata('success-add-edit-kinow-production', 'Kinow detail has been updated successfully');
			redirect(base_url('manage-factory/manage-production/'));
		}

	} 

	public function addCustomer()
	{
		if($this->input->post())
		{
			$insertData = array
			(
				'name'     => strCleaner($_POST['name']),
				'phone'    => strCleaner($_POST['phone']),
				'seasonId' => $this->seasonId,
				'status'   => 1,
				'createdOn'=> $this->createdOn
			);

			$inserted_id = $this->Common_model->insertion('customers', $insertData);
			if($inserted_id)
			{
				$this->session->set_flashdata('success_add_edit_customer', 'Customer has been added successfully.');
				$this->session->set_userdata('customer-add-edit', $inserted_id);
				redirect(base_url('manage-factory/manage-production'));
			}
		}
	}

	public function editCustomer()
	{
		if($this->input->post())
		{
			$updatedData = array
			(
				'name'      => strCleaner($_POST['name']),
				'phone'     => strCleaner($_POST['phone']),
				'updatedOn' => $this->updatedOn
			);

			if($this->Common_model->updateRecord($updatedData, 'customers', strCleaner($_POST['customerId'])))
			{
				$this->session->set_flashdata('success_add_edit_customer', 'Customer has been edited successfully.');
				$this->session->set_userdata('customer-add-edit', strCleaner($_POST['customerId']));
				redirect(base_url(str_replace('--', '/', strCleaner($_POST['url']))));
			}
		}
	}

	public function manageCustomer($customerId)
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['customerId'] = $customerId;
		$data['heading']     = 'Manage Customer ('.$this->season.')';
		$data['headTittle']  = 'Manage Customer ('.$this->season.')';
		$data['customers']   = $this->Factory_model->getCustomers($this->seasonId);
		$this->load->view('manage-customer', $data);
	}

	public function sellKinowToCustomer()
	{
		if($this->input->post())
		{
			$data = array
			(
				'seasonId'           => strCleaner($_POST['seasonId']),
				'customerId'         => strCleaner($_POST['customerId']),
				'sellDate'           => dateToYMD(strCleaner($_POST['sellDate'])),
				'fourtyEight_first'  => strCleaner($_POST['fourtyEight_first']) == '' ? 0 : strCleaner($_POST['fourtyEight_first']),
				'fiftySix_first'     => strCleaner($_POST['fiftySix_first']) == '' ? 0 : strCleaner($_POST['fiftySix_first']),
				'sixtyFour_first'    => strCleaner($_POST['sixtyFour_first']) == '' ? 0 : strCleaner($_POST['sixtyFour_first']),
				'seventyTwo_first'   => strCleaner($_POST['seventyTwo_first']) == '' ? 0 : strCleaner($_POST['seventyTwo_first']),
				'eighty_first'       => strCleaner($_POST['eighty_first']) == '' ? 0 : strCleaner($_POST['eighty_first']),
				'ninety_first'       => strCleaner($_POST['ninety_first']) == '' ? 0 : strCleaner($_POST['ninety_first']),
				'hundred_first'      => strCleaner($_POST['hundred_first']) == '' ? 0 : strCleaner($_POST['hundred_first']),
				'hundredAndTen_first'=> strCleaner($_POST['hundredAndTen_first']) == '' ? 0 : strCleaner($_POST['hundredAndTen_first']),
				'fourtyEight_second' => strCleaner($_POST['fourtyEight_second']) == '' ? 0 : strCleaner($_POST['fourtyEight_second']),
				'fiftySix_second'    => strCleaner($_POST['fiftySix_second']) == '' ? 0 : strCleaner($_POST['fiftySix_second']),
				'sixtyFour_second'   => strCleaner($_POST['sixtyFour_second']) == '' ? 0 : strCleaner($_POST['sixtyFour_second']),
				'seventyTwo_second'  => strCleaner($_POST['seventyTwo_second']) == '' ? 0 : strCleaner($_POST['seventyTwo_second']),
				'eighty_second'      => strCleaner($_POST['eighty_second']) == '' ? 0 : strCleaner($_POST['eighty_second']),
				'ninety_second'      => strCleaner($_POST['ninety_second']) == '' ? 0 : strCleaner($_POST['ninety_second']),
				'hundred_second'     => strCleaner($_POST['hundred_second']) == '' ? 0 : strCleaner($_POST['hundred_second']),
				'hundredAndTen_second'=> strCleaner($_POST['hundredAndTen_second']) == '' ? 0 : strCleaner($_POST['hundredAndTen_second']),
				'fourtyTwo_cotton'   => strCleaner($_POST['fourtyTwo_cotton']) == '' ? 0 : strCleaner($_POST['fourtyTwo_cotton']),
				'fourtyEight_cotton' => strCleaner($_POST['fourtyEight_cotton']) == '' ? 0 : strCleaner($_POST['fourtyEight_cotton']),
				'fiftySix_cotton'    => strCleaner($_POST['fiftySix_cotton']) == '' ? 0 : strCleaner($_POST['fiftySix_cotton']),
				'sixty_cotton'       => strCleaner($_POST['sixty_cotton']) == '' ? 0 : strCleaner($_POST['sixty_cotton']),
				'sixtySix_cotton'    => strCleaner($_POST['sixtySix_cotton']) == '' ? 0 : strCleaner($_POST['sixtySix_cotton']),
				'seventyTwo_cotton'  => strCleaner($_POST['seventyTwo_cotton']) == '' ? 0 : strCleaner($_POST['seventyTwo_cotton']),
				'eighty_cotton'      => strCleaner($_POST['eighty_cotton']) == '' ? 0 : strCleaner($_POST['eighty_cotton']),
				'ninety_cotton'      => strCleaner($_POST['ninety_cotton']) == '' ? 0 : strCleaner($_POST['ninety_cotton']),
				'hundred_cotton'     => strCleaner($_POST['hundred_cotton']) == '' ? 0 : strCleaner($_POST['hundred_cotton']),
				'hundredAndTen_cotton'=> strCleaner($_POST['hundredAndTen_cotton']) == '' ? 0 : strCleaner($_POST['hundredAndTen_cotton']),
				'sellerName'         => strCleaner($_POST['sellerName']) == '' ? 0 : strCleaner($_POST['sellerName']),
				'loadingPoint'       => strCleaner($_POST['loadingPoint']) == '' ? 0 : strCleaner($_POST['loadingPoint']),
				'destination'        => strCleaner($_POST['destination']) == '' ? 0 : strCleaner($_POST['destination']),
				'driverName'         => strCleaner($_POST['driverName']) == '' ? 0 : strCleaner($_POST['driverName']),
				'driverNumber'       => strCleaner($_POST['driverNumber']) == '' ? 0 : strCleaner($_POST['driverNumber']),
				'transportNumber'    => strCleaner($_POST['transportNumber']) == '' ? 0 : strCleaner($_POST['transportNumber']),
				'status'             => 1,
				'updatedOn'          => $this->updatedOn
			);

			$inserted_id = $this->Common_model->insertion('kinow_selling', $data); 
			if($inserted_id)
			{
				$this->session->set_userdata('add-edit-kinow-seling', $inserted_id);
				$this->session->set_flashdata('success-add-edit-kinow-selling', 'Kinow selling detail has been added successfully');
				redirect(base_url('manage-production/manage-customer/'.strCleaner($_POST['customerId'])));
			}
		}
	}

	public function manageSales()
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['heading']     = 'Manage Sales ('.$this->season.')';
		$data['headTittle']  = 'Manage Sales ('.$this->season.')';
		$data['salesStatistics'] = $this->Factory_model->getSalesStatictics($this->seasonId);
		$data['SalesByDate']  = $this->Factory_model->getSalesByDate($this->seasonId);
		$this->load->view('manage-sales', $data);
	}

	public function saleDetail($sellDate)
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['sellDate'] = $sellDate;
		$data['heading']     = 'Manage Sale ('.dateConvertDMY($sellDate).')';
		$data['headTittle']  = 'Manage Sale ('.dateConvertDMY($sellDate).')';
		$data['salesOfDate']  = $this->Factory_model->getSalesOfDate($sellDate);
		$this->load->view('sale-detail', $data);	
	}

	public function editSale($saleId)
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['saleId'] = $saleId;
		$data['heading']     = 'Edit Sale ('.$this->season.')';
		$data['headTittle']  = 'Edit Sale ('.$this->season.')';
		$data['sale'] = $this->Common_model->getRecord($saleId, 'kinow_selling');
		if($this->input->post())
		{
			$data = array
			(
				'fourtyEight_first'  => strCleaner($_POST['fourtyEight_first']) == '' ? 0 : strCleaner($_POST['fourtyEight_first']),
				'fiftySix_first'     => strCleaner($_POST['fiftySix_first']) == '' ? 0 : strCleaner($_POST['fiftySix_first']),
				'sixtyFour_first'    => strCleaner($_POST['sixtyFour_first']) == '' ? 0 : strCleaner($_POST['sixtyFour_first']),
				'seventyTwo_first'   => strCleaner($_POST['seventyTwo_first']) == '' ? 0 : strCleaner($_POST['seventyTwo_first']),
				'eighty_first'       => strCleaner($_POST['eighty_first']) == '' ? 0 : strCleaner($_POST['eighty_first']),
				'ninety_first'       => strCleaner($_POST['ninety_first']) == '' ? 0 : strCleaner($_POST['ninety_first']),
				'hundred_first'      => strCleaner($_POST['hundred_first']) == '' ? 0 : strCleaner($_POST['hundred_first']),
				'hundredAndTen_first'=> strCleaner($_POST['hundredAndTen_first']) == '' ? 0 : strCleaner($_POST['hundredAndTen_first']),
				'totalFirst'         => strCleaner($_POST['totalFirst']) == '' ? 0 : strCleaner($_POST['totalFirst']),
				'fourtyEight_second' => strCleaner($_POST['fourtyEight_second']) == '' ? 0 : strCleaner($_POST['fourtyEight_second']),
				'fiftySix_second'    => strCleaner($_POST['fiftySix_second']) == '' ? 0 : strCleaner($_POST['fiftySix_second']),
				'sixtyFour_second'   => strCleaner($_POST['sixtyFour_second']) == '' ? 0 : strCleaner($_POST['sixtyFour_second']),
				'seventyTwo_second'  => strCleaner($_POST['seventyTwo_second']) == '' ? 0 : strCleaner($_POST['seventyTwo_second']),
				'eighty_second'      => strCleaner($_POST['eighty_second']) == '' ? 0 : strCleaner($_POST['eighty_second']),
				'ninety_second'      => strCleaner($_POST['ninety_second']) == '' ? 0 : strCleaner($_POST['ninety_second']),
				'hundred_second'     => strCleaner($_POST['hundred_second']) == '' ? 0 : strCleaner($_POST['hundred_second']),
				'hundredAndTen_second'=> strCleaner($_POST['hundredAndTen_second']) == '' ? 0 : strCleaner($_POST['hundredAndTen_second']),
				'totalSecond'        => strCleaner($_POST['totalSecond']) == '' ? 0 : strCleaner($_POST['totalSecond']),
				'fourtyTwo_cotton'   => strCleaner($_POST['fourtyTwo_cotton']) == '' ? 0 : strCleaner($_POST['fourtyTwo_cotton']),
				'fourtyEight_cotton' => strCleaner($_POST['fourtyEight_cotton']) == '' ? 0 : strCleaner($_POST['fourtyEight_cotton']),
				'fiftySix_cotton'    => strCleaner($_POST['fiftySix_cotton']) == '' ? 0 : strCleaner($_POST['fiftySix_cotton']),
				'sixty_cotton'       => strCleaner($_POST['sixty_cotton']) == '' ? 0 : strCleaner($_POST['sixty_cotton']),
				'sixtySix_cotton'    => strCleaner($_POST['sixtySix_cotton']) == '' ? 0 : strCleaner($_POST['sixtySix_cotton']),
				'seventyTwo_cotton'  => strCleaner($_POST['seventyTwo_cotton']) == '' ? 0 : strCleaner($_POST['seventyTwo_cotton']),
				'eighty_cotton'      => strCleaner($_POST['eighty_cotton']) == '' ? 0 : strCleaner($_POST['eighty_cotton']),
				'ninety_cotton'      => strCleaner($_POST['ninety_cotton']) == '' ? 0 : strCleaner($_POST['ninety_cotton']),
				'hundred_cotton'     => strCleaner($_POST['hundred_cotton']) == '' ? 0 : strCleaner($_POST['hundred_cotton']),
				'hundredAndTen_cotton'=> strCleaner($_POST['hundredAndTen_cotton']) == '' ? 0 : strCleaner($_POST['hundredAndTen_cotton']),
				'cottonTotal'        => strCleaner($_POST['cottonTotal']) == '' ? 0 : strCleaner($_POST['cottonTotal']),
				'updatedOn'          => $this->updatedOn
			);
			if($this->Common_model->updateRecord($data, 'kinow_selling', strCleaner($_POST['saleId'])))
			{
				$this->session->set_userdata('add-edit-kinow-seling', strCleaner($_POST['saleId']));
				$this->session->set_flashdata('success-add-edit-kinow-selling', 'Sale detail has been updated successfully');
				redirect(base_url('manage-sales/sales-detail/'.strCleaner($_POST['sellDate'])));
			}
		}
		else
		{
			$this->load->view('edit_sale', $data);
		}
	}

	public function setSaleAmount($saleId)
	{
		$data['url']  = str_replace('/', '--', $this->uri->uri_string());
		$data['dir']   = $this->direction;
		$data['float'] = $this->float;
		$data['seasonId'] = $this->seasonId;
		$data['saleId'] = $saleId;
		$data['heading']     = 'Edit Sale ('.$this->season.')';
		$data['headTittle']  = 'Edit Sale ('.$this->season.')';
		$data['sale'] = $this->Common_model->getRecord($saleId, 'kinow_selling');
		if($this->input->post())
		{
			// echo "<pre>";
			// print_r($_POST);
			// echo "</pre>";
			// die;
			$data = array
			(
				'fourtyEight_first_amount'  => strCleaner($_POST['fourtyEight_first_amount']) == '' ? 0 : strCleaner($_POST['fourtyEight_first_amount']),
				'fiftySix_first_amount'     => strCleaner($_POST['fiftySix_first_amount']) == '' ? 0 : strCleaner($_POST['fiftySix_first_amount']),
				'sixtyFour_first_amount'    => strCleaner($_POST['sixtyFour_first_amount']) == '' ? 0 : strCleaner($_POST['sixtyFour_first_amount']),
				'seventyTwo_first_amount'   => strCleaner($_POST['seventyTwo_first_amount']) == '' ? 0 : strCleaner($_POST['seventyTwo_first_amount']),
				'eighty_first_amount'       => strCleaner($_POST['eighty_first_amount']) == '' ? 0 : strCleaner($_POST['eighty_first_amount']),
				'ninety_first_amount'       => strCleaner($_POST['ninety_first_amount']) == '' ? 0 : strCleaner($_POST['ninety_first_amount']),
				'hundred_first_amount'      => strCleaner($_POST['hundred_first_amount']) == '' ? 0 : strCleaner($_POST['hundred_first_amount']),
				'hundredAndTen_first_amount'=> strCleaner($_POST['hundredAndTen_first_amount']) == '' ? 0 : strCleaner($_POST['hundredAndTen_first_amount']),
				'totalFirst'         => strCleaner($_POST['totalFirst']) == '' ? 0 : strCleaner($_POST['totalFirst']),
				'fourtyEight_second_amount' => strCleaner($_POST['fourtyEight_second_amount']) == '' ? 0 : strCleaner($_POST['fourtyEight_second_amount']),
				'fiftySix_second_amount'    => strCleaner($_POST['fiftySix_second_amount']) == '' ? 0 : strCleaner($_POST['fiftySix_second_amount']),
				'sixtyFour_second_amount'   => strCleaner($_POST['sixtyFour_second_amount']) == '' ? 0 : strCleaner($_POST['sixtyFour_second_amount']),
				'seventyTwo_second_amount'  => strCleaner($_POST['seventyTwo_second_amount']) == '' ? 0 : strCleaner($_POST['seventyTwo_second_amount']),
				'eighty_second_amount'      => strCleaner($_POST['eighty_second_amount']) == '' ? 0 : strCleaner($_POST['eighty_second_amount']),
				'ninety_second_amount'      => strCleaner($_POST['ninety_second_amount']) == '' ? 0 : strCleaner($_POST['ninety_second_amount']),
				'hundred_second_amount'     => strCleaner($_POST['hundred_second_amount']) == '' ? 0 : strCleaner($_POST['hundred_second_amount']),
				'hundredAndTen_second_amount'=> strCleaner($_POST['hundredAndTen_second_amount']) == '' ? 0 : strCleaner($_POST['hundredAndTen_second_amount']),
				'totalSecond'        => strCleaner($_POST['totalSecond']) == '' ? 0 : strCleaner($_POST['totalSecond']),
				'fourtyTwo_cotton_amount'   => strCleaner($_POST['fourtyTwo_cotton_amount']) == '' ? 0 : strCleaner($_POST['fourtyTwo_cotton_amount']),
				'fourtyEight_cotton_amount' => strCleaner($_POST['fourtyEight_cotton_amount']) == '' ? 0 : strCleaner($_POST['fourtyEight_cotton_amount']),
				'fiftySix_cotton_amount'    => strCleaner($_POST['fiftySix_cotton_amount']) == '' ? 0 : strCleaner($_POST['fiftySix_cotton_amount']),
				'sixty_cotton_amount'       => strCleaner($_POST['sixty_cotton_amount']) == '' ? 0 : strCleaner($_POST['sixty_cotton_amount']),
				'sixtySix_cotton_amount'    => strCleaner($_POST['sixtySix_cotton_amount']) == '' ? 0 : strCleaner($_POST['sixtySix_cotton_amount']),
				'seventyTwo_cotton_amount'  => strCleaner($_POST['seventyTwo_cotton_amount']) == '' ? 0 : strCleaner($_POST['seventyTwo_cotton_amount']),
				'eighty_cotton_amount'      => strCleaner($_POST['eighty_cotton_amount']) == '' ? 0 : strCleaner($_POST['eighty_cotton_amount']),
				'ninety_cotton_amount'      => strCleaner($_POST['ninety_cotton_amount']) == '' ? 0 : strCleaner($_POST['ninety_cotton_amount']),
				'hundred_cotton_amount'     => strCleaner($_POST['hundred_cotton_amount']) == '' ? 0 : strCleaner($_POST['hundred_cotton_amount']),
				'hundredAndTen_cotton_amount'=> strCleaner($_POST['hundredAndTen_cotton_amount']) == '' ? 0 : strCleaner($_POST['hundredAndTen_cotton_amount']),
				'cottonTotal'        => strCleaner($_POST['cottonTotal']) == '' ? 0 : strCleaner($_POST['cottonTotal']),
				'grand_total'        => strCleaner($_POST['grand_total']) == '' ? 0 : strCleaner($_POST['grand_total']),
				'isAmountSet'        => 1,
				'updatedOn'          => $this->updatedOn
			);
			if($this->Common_model->updateRecord($data, 'kinow_selling', strCleaner($_POST['saleId'])))
			{
				$this->session->set_userdata('add-edit-kinow-seling', strCleaner($_POST['saleId']));
				$this->session->set_flashdata('success-add-edit-kinow-selling', 'Sale detail has been updated successfully');
				redirect(base_url('manage-sales/sales-detail/'.strCleaner($_POST['sellDate'])));
			}
		}
		else
		{
			$this->load->view('set_amount', $data);
		}
	}

}