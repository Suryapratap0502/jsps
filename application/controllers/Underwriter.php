<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Underwriter extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('underwriter_model');
      	$this->load->model('Form_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}
	public function index($short_name,$offset = null)
	{
	
		if ($this->session->userdata('pmsadmin') == true) {
			$limit = 10;
			$offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
			$data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group', 'group_short_name', $short_name);
			foreach ($data1 as $val) {
				$data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'module', $val['sidebar_id']);
			}
			$data['subadminData'] = $this->Form_model->masterData($limit, $offset);
			// print_r($data['subadminData']);exit;
			$total = $this->Form_model->master_count($limit, $offset);
			
			$data['count'] = $total;
			
			$data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
			$data['sale_view'] = $this->Form_model->list_common('form_disposition_remark');
			$data['company'] = $this->Form_model->list_common('company');

			return $this->load->view('admin/form/module_wise_list', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
  
}

