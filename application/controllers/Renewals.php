<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewals extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('underwriter_model');
      	//$this->load->model('renewals_model');
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
          $data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group','group_short_name',$short_name);
          foreach($data1 as $val){
          	$data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id('disposition','module',$val['sidebar_id']);
           	}
          	//$data['subadminData'] = $this->Form_model->masterData();
          	date_default_timezone_set('Asia/Kolkata');
            $current_date = date('Y-m-d');
          	$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
          	 $data['subadminData'] = $this->Form_model->get_renewal_data('form',$current_date,$three_month_date);
          
			$data['sale_view'] = $this->Form_model->list_common('form_disposition_remark');
          	$data['policy_count'] = $this->Form_model->policy_count('form',$current_date,$three_month_date);
			$data['company'] = $this->Form_model->list_common('company');
          	$total = $this->Form_model->get_renewal_count('form',$current_date,$three_month_date,$limit, $offset);
			$data['count'] = $total;
			$data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
         	//$data['sum_premium_renewal'] = $this->Form_model->sum_pre_renewal('form',$current_date,$three_month_date);
          
          
         	return $this->load->view('admin/form/renewal_lsit',$data);
         
			
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
  
  public function view_renewals($id,$policy_no)
  {
  	  $data['renewals_details'] = $this->Form_model->list_common_where4('sub_desposition','policy_no', $policy_no,'form_id',$id);
     $data['sale_details'] = $this->Form_model->list_common_where3('form', 'id', $id);
    
      $this->load->view('admin/form/renewal_details',$data);
  }
  
  
  

  
}

