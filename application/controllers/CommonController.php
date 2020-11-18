<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonController extends CI_Controller
{
	function __construct() 
	{
        parent::__construct();
        //IS LOGIN CHECK
		if(admin_not_logged_in())
		{
			redirect(base_url('login'));
		}

		$this->load->model('Common_model','CM');
	}

	public function GLOBAL_DELETE($table, $delete__Id, $url, $alert__indicator)
	{
		if(!empty($delete__Id))
		{
			$delData = array
			(
				'status' => 0
			);

			if($this->CM->DO_GLOBAL_DELETE($table, $delData, $delete__Id))
			{
				$this->session->set_flashdata('global_delete_message_'.$alert__indicator ,$this->lang->line('deleted_successfully'));
				redirect(base_url(str_replace('--','/',$url)));
			}
		}
	}

	public function getRecord()
	{
		if($this->input->post())
		{
			$record = $this->CM->getRecord(strCleaner($_POST['id']), strCleaner($_POST['table']));
			echo json_encode(array('response'=>'success', 'data'=>$record));
		}
	}



}