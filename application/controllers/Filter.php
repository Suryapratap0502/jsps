<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends MY_Controller
{


	public function __construct()

	{

		parent::__construct();

		$this->load->model('underwriter_model');
		//$this->load->model('renewals_model');
		$this->load->model('filter_model');
		$this->load->model('Form_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('email');
	}
	public function all_data()
	{
		$module_short_name = $this->input->post('module_short_name');
		$data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group','group_short_name',$module_short_name);
        foreach($data1 as $val){
        $data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id('disposition','module',$val['sidebar_id']);
        }
        $data['subadminData'] = $this->filter_model->all_data();
        $data['sale_view'] = $this->Form_model->list_common('form_disposition_remark');
		$data['company'] = $this->Form_model->list_common('company');
		$this->load->view('admin/filter/filter_data_list_page', $data);
	}
	public function datefilter()
	{

		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
      	$next_month = $this->input->post('next_month');
		$module_short_name = $this->input->post('module_short_name');
		$sel_disposition = $this->input->post('sel_disposition');
		$current_date = $this->input->post('current_date');
		$current_month = $this->input->post('current_month');
      	$data['module_short_name'] = $module_short_name;
		$data['subadminData']  = $this->filter_model->filterdate($startdate, $enddate, $sel_disposition, $current_date, $current_month,$next_month);
		$data['totalpremium'] =(array_sum(array_column($data['subadminData'], 'net_premium')) );	
      $this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function datefilter_list_page()
	{

		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$module_short_name = $this->input->post('module_short_name');
		$sel_disposition = $this->input->post('sel_disposition');
		$current_date = $this->input->post('current_date');
		$current_month = $this->input->post('current_month');
		$data['module_short_name'] = $module_short_name;
		$data['subadminData']  = $this->filter_model->filterdate_listpage($startdate, $enddate, $module_short_name, $sel_disposition, $current_date, $current_month);
		$data['totalpremium'] =(array_sum(array_column($data['subadminData'], 'net_premium')) );	
      	$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function searchdata()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
		$data = array();

		if ($select_attribute == 'by_company') {
			$data['subadminData']  = $this->filter_model->company_searchdata($searchstring, $current_date, $three_month_date);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['subadminData']  = $this->filter_model->policy_searchdata($searchstring, $current_date, $three_month_date);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata($searchstring, $current_date, $three_month_date);
		}


		$this->load->view('admin/filter/filterdata', $data);
	}

	public function searchdata_list_page()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$enddate = $this->input->post('enddate');
		$search_by_disp = $this->input->post('search_by_disp');
		$module_short_name = $this->input->post('module_short_name');

		$current_date = '';
		$current_month = '';
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');
		$data['company'] = $this->Form_model->list_common('company');
		if (!empty($current_date1)) {
			$current_date = date('Y-m-d');
		}
		if (!empty($current_month1)) {
			$current_month = date('Y-m');
		}

		$data = array();
		$data['subadminData']  = $this->filter_model->data_list_page($startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['subadminData']  = $this->filter_model->company_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['subadminData']  = $this->filter_model->policy_search($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['subadminData']  = $this->filter_model->log_id_data($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['subadminData']  = $this->filter_model->cust_id_data($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month);
		}
		$data['module_short_name'] = $module_short_name;
		$data['totalpremium'] = (array_sum(array_column($data['subadminData'], 'net_premium')));


		$this->load->view('admin/filter/filter_data_list_page', $data);
	}
	public function current_date_filter()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
		//$data = array();
		$data['subadminData']  = $this->filter_model->current_date_filter($current_date, $three_month_date);
		$data['counts'] = $data['subadminData'][0]['count'];

		$this->load->view('admin/filter/filterdata', $data);
	}

	public function current_date_filter_list_page()
	{

		$module_short_name = $this->input->post('module_short_name');
		$current_date = '';
		$current_month = '';
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');

		$sel_disp = $this->input->post('sel_disp');
		date_default_timezone_set('Asia/Kolkata');
		if (!empty($current_date1)) {
			$current_date = date('Y-m-d');
		}
		if (!empty($current_month1)) {
			$current_month = date('Y-m');
		}
		$data['module_short_name'] = $module_short_name;
		$data['subadminData']  = $this->filter_model->current_date_filter_list($current_date, $current_month, $sel_disp, $module_short_name);
		$data['totalpremium'] =(array_sum(array_column($data['subadminData'], 'net_premium')) );	
      $this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function current_month_filter()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$current_month = date('Y-m');
		$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
		//$data = array();
		$data['subadminData']  = $this->filter_model->current_month_filter($current_date, $three_month_date, $current_month);
		$data['policy_count'] = $this->Form_model->policy_count('form', $current_date, $three_month_date);
		$this->load->view('admin/filter/filterdata', $data);
	}

	public function current_month_filter_list_page()
	{
		$module_short_name = $this->input->post('module_short_name');
		$sel_disp = $this->input->post('sel_disp');
		date_default_timezone_set('Asia/Kolkata');

		$current_month = date('Y-m');
		$data['subadminData']  = $this->filter_model->current_month_filter_list($current_month, $sel_disp, $module_short_name);
		$data['module_short_name'] = $module_short_name;
		$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function current_month_filter_list()
	{
		date_default_timezone_set('Asia/Kolkata');

		$current_month = date('Y-m');
		$data['subadminData']  = $this->filter_model->current_month_filter_list($current_month);
		
		$this->load->view('admin/filter/filter_data_list_page', $data);
	}
	public function next_month_filter()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$current_month = date('Y-m');
		$next_month = date('Y-m', strtotime('+1 Month', strtotime($current_month)));

		$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
		//$data = array();
		$data['subadminData']  = $this->filter_model->next_month_filter($current_date, $three_month_date, $next_month);
		$data['policy_count'] = $this->Form_model->policy_count('form', $current_date, $three_month_date);
		$this->load->view('admin/filter/filterdata', $data);
	}

	public function next_month_filter_list()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$current_month = date('Y-m');
		$next_month = date('Y-m', strtotime('+1 Month', strtotime($current_month)));
		$data['subadminData']  = $this->filter_model->next_month_filter_list($next_month);

		$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function current_date_filter_report()
	{
		$sel_disp = $this->input->post('sel_disp');
		$date_or_month = $this->input->post('date_or_month');
		$current_date = '';
      $current_month = '';
		$model_short_name = '';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}
      
      if ($date_or_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}

		$data['fresh_operation']  = $this->filter_model->current_date_filter_list($current_date,$current_month, $sel_disp,$model_short_name);
	$data['total_premium']=(array_sum(array_column($data['fresh_operation'], 'net_premium')) );	
      $this->load->view('admin/filter/filter_data_report', $data);
	}

	public function datefilter_report()
	{
		$select_attribute = $this->input->post('select_attribute');
		$model_short_name = 'operations';
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$sel_disp = $this->input->post('sel_disp');
		$date_or_month = $this->input->post('date_or_month');
		$searchstring = $this->input->post('content');
		$current_date = '';
		$current_month = '';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}

		if ($date_or_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		$data['fresh_operation']  = $this->filter_model->filterdate_listpage($startdate, $enddate, $model_short_name, $sel_disp, $current_date, $current_month);
		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['fresh_operation']  = $this->filter_model->company_filterdate_list($searchstring,$startdate, $enddate, $model_short_name, $sel_disp, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['fresh_operation']  = $this->filter_model->policy_filterdate_list($searchstring,$startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['fresh_operation']  = $this->filter_model->cust_filterdate_list($searchstring,$startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_tl') {
			$searchstring = $this->input->post('tl_name1');
			$data['fresh_operation']  = $this->filter_model->teamleader_filterdate_list($searchstring,$startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['fresh_operation']  = $this->filter_model->log_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp, $model_short_name,  $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['fresh_operation']  = $this->filter_model->cust_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp, $model_short_name,  $current_date, $current_month);
		}
		$data['total_premium'] = (array_sum(array_column($data['fresh_operation'], 'net_premium')));
		$this->load->view('admin/filter/filter_data_report', $data);
	}

	/*public function searchdata_reprt()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
		$date_or_month = $this->input->post('date_or_month');
		$current_date = '';
		$current_month = '';
      	$startdate ='';
		$enddate='';
		$search_by_disp='';
		$module_short_name='';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		} else {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}

		$data = array();

		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['fresh_operation']  = $this->filter_model->company_searchdata_list_page1($searchstring, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['fresh_operation']  = $this->filter_model->policy_searchdata_list_page($searchstring, $enddate, $search_by_disp, $module_short_name , $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['fresh_operation']  = $this->filter_model->cus_name_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name , $current_date, $current_month);
		}
		if ($select_attribute == 'by_tl') {
			$searchstring = $this->input->post('tl_name1');
			$data['fresh_operation']  = $this->filter_model->tl_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['fresh_operation']  = $this->filter_model->log_id_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['fresh_operation']  = $this->filter_model->cust_id_searchdata_list_page($searchstring, $current_date, $current_month);
		}
      $data['total_premium']=(array_sum(array_column($data['fresh_operation'], 'net_premium')) );
		$this->load->view('admin/filter/filter_data_report', $data);
	}
*/
	public function current_month_filter_report()
	{
		$sel_disp = $this->input->post('sel_disp');
		$date_or_month = $this->input->post('date_or_month');
		$current_month = '';
		$module_short_name = '';
		if ($date_or_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		$data['fresh_operation']  = $this->filter_model->current_month_filter_list($current_month, $sel_disp,$module_short_name);
      $data['total_premium']=(array_sum(array_column($data['fresh_operation'], 'net_premium')) );
		$this->load->view('admin/filter/filter_data_report', $data);
	}

	public function date_filter_service_report()
	{

		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$select_attribute = $this->input->post('select_attribute');
		$model_short_name = 'services';
		$startdate = $this->input->post('startdate');

		$sel_disp = $this->input->post('sel_disp');
		$date_or_month = $this->input->post('date_or_month');
		$content = $this->input->post('content');
		$current_date = '';
		$current_month = '';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}

		if ($date_or_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		$data['fresh_operation']  = $this->filter_model->list_common_where_services($startdate, $enddate, $model_short_name, $sel_disp, $current_date, $current_month);
		
		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['fresh_operation']  = $this->filter_model->company_searchdata_service_list_page1($searchstring, $startdate, $enddate, $model_short_name, $sel_disp, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['fresh_operation']  = $this->filter_model->policy_searchdata_list_page($content, $startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['fresh_operation']  = $this->filter_model->cust_filterdate_list($content, $startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_tl') {
			$searchstring = $this->input->post('tl_name1');
			$data['fresh_operation']  = $this->filter_model->tl_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp, $model_short_name, $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['fresh_operation']  = $this->filter_model->log_searchdata_list_page($content, $startdate, $enddate, $sel_disp, $model_short_name,  $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['fresh_operation']  = $this->filter_model->cust_searchdata_list_page($content, $startdate, $enddate, $sel_disp, $model_short_name,  $current_date, $current_month);
		}

		$data['total_premium'] = (array_sum(array_column($data['fresh_operation'], 'net_premium')));
		$this->load->view('admin/filter/filter_data_service', $data);
	}

	public function current_date_filter_service_report()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$data['fresh_operation']  = $this->filter_model->current_date_filter_list($current_date);
		$this->load->view('admin/filter/filter_data_service', $data);
	}

	public function current_date_filter_service_report_all()
	{
		$sel_disp = $this->input->post('sel_disp');
		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		$data['fresh_operation']  = $this->filter_model->current_date_filter_all($current_date, $sel_disp);
		$data['total_premium']=(array_sum(array_column($data['fresh_operation'], 'net_premium')) );
     	 $this->load->view('admin/filter/filter_data_service', $data);
	}

	public function searchdata_service_reprt()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
		$date_or_month = $this->input->post('date_or_month');
		$current_date = '';
		$current_month = '';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		} else {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}

		$data = array();

		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['fresh_operation']  = $this->filter_model->company_searchdata_list_page1($searchstring, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['fresh_operation']  = $this->filter_model->policy_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['fresh_operation']  = $this->filter_model->cus_name_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_tl') {
			$data['fresh_operation']  = $this->filter_model->tl_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['fresh_operation']  = $this->filter_model->log_id_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['fresh_operation']  = $this->filter_model->cust_id_searchdata_list_page($searchstring, $current_date, $current_month);
		}
		$this->load->view('admin/filter/filter_data_service', $data);
	}

	public function current_month_filter_service_report()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_month = date('Y-m');
		$data['fresh_operation']  = $this->filter_model->current_month_filter_list($current_month);
		$this->load->view('admin/filter/filter_data_service', $data);
	}

	public function current_month_filter_service_report_all()
	{
		$sel_disp = $this->input->post('sel_disp');
		$current_month = date('Y-m');
		$data['fresh_operation']  = $this->filter_model->current_month_filter_list_all($current_month, $sel_disp);
		$data['total_premium']=(array_sum(array_column($data['fresh_operation'], 'net_premium')) );	
      $this->load->view('admin/filter/filter_data_service', $data);
	}

	public function filter_by_disposition_services()
	{
		$disposition_id = $this->input->post('val');
		$data['fresh_operation']  = $this->filter_model->list_common_where3('form', 'disposition', $disposition_id);
		$this->load->view('admin/filter/filter_data_service', $data);
	}

	public function date_filter_claim_report()
	{
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$sel_disp = $this->input->post('sel_disp');
		date_default_timezone_set('Asia/Kolkata');
		$current_date = $this->input->post('date_or_month');
		$current_date = '';
		$current_month = $this->input->post('date_or_month');
		if ($current_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		if ($current_date == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}
		$data['claim']  = $this->filter_model->filterdate_claim($startdate, $enddate, $current_date, $current_month, $sel_disp);
		// print_r($data);exit;
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');


		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['claim']  = $this->filter_model->company_searchdata_claim_page($searchstring, $startdate, $enddate, $sel_disp, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['claim']  = $this->filter_model->claim_policy_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp, $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['claim']  = $this->filter_model->proposer_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp,$current_date, $current_month);
		}
		if ($select_attribute == 'by_intimation_no') {
			$data['claim']  = $this->filter_model->cust_id_searchdata_list_page($searchstring, $startdate, $enddate, $sel_disp,$current_date, $current_month);
		}
		$data['total_premium'] = (array_sum(array_column($data['claim'], 'total_approve_amt')));
		$this->load->view('admin/filter/filter_data_claim', $data);
	}

	public function filter_by_status_claim()
	{
		$status = $this->input->post('val');
		$data['claim']  = $this->filter_model->list_common_where3('claim', 'claim_status', $status);
		$this->load->view('admin/filter/filter_data_claim', $data);
	}

	public function current_date_filter_claim_report()
	{
		date_default_timezone_set('Asia/Kolkata');
		$current_date = $this->input->post('date_or_month');
		$sel_disp = $this->input->post('sel_disp');
		$current_date = '';

		if ($current_date == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}
		$current_date = date('Y-m-d');
		$data['claim']  = $this->filter_model->curr_date_claim('claim', 'created_at', $current_date, $sel_disp);
      $data['total_premium']=(array_sum(array_column($data['claim'], 'total_approve_amt')) );
		$this->load->view('admin/filter/filter_data_claim', $data);
	}

	public function current_month_filter_claim_report()
	{
		$sel_disp = $this->input->post('sel_disp');
		$current_month = $this->input->post('date_or_month');
		if ($current_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		$data['claim']  = $this->filter_model->current_month_filter_claim($current_month, $sel_disp);
		$data['total_premium']=(array_sum(array_column($data['claim'], 'total_approve_amt')) );
		$this->load->view('admin/filter/filter_data_claim', $data);
	}

	public function searchdata_claim_reprt()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');

		$data = array();

		if ($select_attribute == 'by_company') {
			$data['claim']  = $this->filter_model->company_searchdata_claim_page($searchstring);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['claim']  = $this->filter_model->policy_searchdata_list_page($searchstring);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['claim']  = $this->filter_model->cus_name_searchdata_list_page($searchstring);
		}
		if ($select_attribute == 'by_tl') {
			$data['claim']  = $this->filter_model->tl_searchdata_list_page($searchstring);
		}
		if ($select_attribute == 'by_log_id') {
			$data['claim']  = $this->filter_model->log_id_searchdata_list_page($searchstring);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['claim']  = $this->filter_model->cust_id_searchdata_list_page($searchstring);
		}
		$this->load->view('admin/filter/filter_data_claim', $data);
	}

	public function date_filter_renewal_report()
	{
      	$expstartdate = $this->input->post('expstartdate');
		$expenddate = $this->input->post('expenddate');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$select_attribute = $this->input->post('select_attribute');
		$model_short_name = 'services';
		$startdate = $this->input->post('startdate');
		$sel_disp = $this->input->post('sel_disp');
		$date_or_month = $this->input->post('date_or_month');
		$content = $this->input->post('content');
		$current_date = '';
		$current_month = '';
		if ($date_or_month == 'current_date') {
			date_default_timezone_set('Asia/Kolkata');
			$current_date = date('Y-m-d');
		}

		if ($date_or_month == 'current_month') {
			date_default_timezone_set('Asia/Kolkata');
			$current_month = date('Y-m');
		}
		$data['renewal']  = $this->filter_model->list_common_where_renewal($expstartdate,$expenddate,$startdate, $enddate, $sel_disp,  $current_date, $current_month);
		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['renewal']  = $this->filter_model->company_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_disp, $current_date, $current_month);
		}
		if ($select_attribute == 'by_policy_no') {
			$data['renewal']  = $this->filter_model->policy_filterdate_renewal($content,$expstartdate,$expenddate, $startdate, $enddate, $sel_disp,  $current_date, $current_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['renewal']  = $this->filter_model->cust_filterdate_renewal($content,$expstartdate,$expenddate, $startdate, $enddate, $sel_disp,  $current_date, $current_month);
		}
		if ($select_attribute == 'by_tl') {
			$searchstring = $this->input->post('tl_name1');
			$data['renewal']  = $this->filter_model->teamleader_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_disp,  $current_date, $current_month);
		}
		if ($select_attribute == 'by_log_id') {
			$data['renewal']  = $this->filter_model->log_id_filterdate_renewal($content,$expstartdate,$expenddate,$startdate, $enddate, $sel_disp,   $current_date, $current_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['renewal']  = $this->filter_model->cust_id_filterdate_renewal($content,$expstartdate,$expenddate,$startdate, $enddate, $sel_disp,   $current_date, $current_month);
		}
		
		$data['total_premium'] = (array_sum(array_column($data['renewal'], 'net_premium')));
		$this->load->view('admin/filter/filter_data_renewal', $data);
	}

	public function subdisp_filter_list_page()
	{
		$sel_sub_disp = $this->input->post('val');
		$module_short_name = $this->input->post('module_short_name');
		$sel_disp = $this->input->post('sel_disp');
		$data['subadminData']  = $this->filter_model->subdisp_filter_data($sel_sub_disp, $sel_disp, $module_short_name);
		$data['totalpremium']=(array_sum(array_column($data['subadminData'], 'net_premium')) );		
      	$data['module_short_name'] = $module_short_name;
		$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function expiry_datefilter_service_page()
	{
		$expstartdate = $this->input->post('expstartdate');
		$expenddate = $this->input->post('expenddate');
		$module_short_name = $this->input->post('module_short_name');
		$sel_disposition = $this->input->post('sel_disposition');
		$current_date = $this->input->post('current_date');
		$current_month = $this->input->post('current_month');

		$data['subadminData']  = $this->filter_model->expiry_filterdate_service_page($expstartdate, $expenddate, $module_short_name, $sel_disposition, $current_date, $current_month);
		$data['module_short_name'] = $module_short_name;
		$data['totalpremium']=(array_sum(array_column($data['subadminData'], 'net_premium')) );	
      	$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function claim_date_filter()
	{
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$module_short_name = $this->input->post('module_short_name');
		$sel_disposition = $this->input->post('sel_disposition');
		$current_date = $this->input->post('current_date');
		$current_month = $this->input->post('current_month');

		$data['claim_initiated_list']  = $this->filter_model->claim_date_filter($startdate, $enddate, $sel_disposition, $current_date, $current_month);
		$data['totalpremium'] =(array_sum(array_column($data['claim_initiated_list'], 'total_approve_amt')) );
		$data['module_short_name'] = $module_short_name;
		$this->load->view('admin/filter/filter_data_claim_page', $data);
	}

	public function current_date_filter_claim_page()
	{

		$current_date = '';
		$current_month = '';
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');

		$sel_disp = $this->input->post('sel_disp');
		date_default_timezone_set('Asia/Kolkata');
		if (!empty($current_date1)) {
			$current_date = date('Y-m-d');
		}
		if (!empty($current_month1)) {
			$current_month = date('Y-m');
		}
		$module_short_name = $this->input->post('module_short_name');
		$data['module_short_name'] = $module_short_name;
		$data['claim_initiated_list']  = $this->filter_model->current_date_filter_claim_list($current_date, $current_month, $sel_disp);
     	$data['totalpremium'] =(array_sum(array_column($data['claim_initiated_list'], 'total_approve_amt')) );
		$this->load->view('admin/filter/filter_data_claim_page', $data);
	}

	public function searchdata_claim_page()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$enddate = $this->input->post('enddate');
		$search_by_disp = $this->input->post('search_by_disp');
		$module_short_name = $this->input->post('module_short_name');

		$current_date = '';
		$current_month = '';
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');

		//if (!empty($current_date1)) {
		//$current_date = date('Y-m-d');
		//}
		//if (!empty($current_month1)) {
		//	$current_month = date('Y-m');
		//}

		$data = array();
		$data['claim_initiated_list']  = $this->filter_model->claim_date_filter($startdate, $enddate, $search_by_disp, $current_date, $current_month);
		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['claim_initiated_list']  = $this->filter_model->company_searchdata_cliam_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['claim_initiated_list']  = $this->filter_model->policy_searchdata_claim_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month);
		}
		if ($select_attribute == 'by_patient') {
			$data['claim_initiated_list']  = $this->filter_model->pt_name_searchdata_claim_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month);
		}

		if ($select_attribute == 'by_claim_inti') {
			$data['claim_initiated_list']  = $this->filter_model->clam_init_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month);
		}
      	$data['totalpremium'] =(array_sum(array_column($data['claim_initiated_list'], 'total_approve_amt')) );
		$module_short_name = $this->input->post('module_short_name');
		$data['module_short_name'] = $module_short_name;



		$this->load->view('admin/filter/filter_data_claim_page', $data);
	}

	public function searchdata_renewal_page()
	{
		$searchstring = $this->input->post('content');
		$select_attribute = $this->input->post('select_attribute');
      	$next_month = $this->input->post('next_month');
		
		if(!empty($this->input->post('startdate'))) {
			$startdate = $this->input->post('startdate');	
		}else{
			date_default_timezone_set('Asia/Kolkata');
            $current_date = date('Y-m-d');
          	$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
			$startdate = $three_month_date;
		}

		if(!empty($this->input->post('enddate'))) {
			$enddate = $this->input->post('enddate');	
		}else{
			date_default_timezone_set('Asia/Kolkata');
            $current_date = date('Y-m-d');
          	$three_month_date =  date('Y-m-d', strtotime('- 3 month', strtotime($current_date)));
			$enddate = $three_month_date;
		}
		
		$search_by_disp = $this->input->post('search_by_disp');
		$module_short_name = $this->input->post('module_short_name');

		$current_date = '';
		$current_month = '';
		
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');

		if (!empty($current_date1)) {
			$current_date = date('Y-m-d');
		}
		if (!empty($current_month1)) {
			$current_month = date('Y-m');
		}

		//$data = array();

		if ($select_attribute == 'by_company') {
			$searchstring = $this->input->post('company_name');
			$data['subadminData']  = $this->filter_model->company_searchdata_renewal_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month,$next_month);
		}

		if ($select_attribute == 'by_policy_no') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring,'policy_no', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month,$next_month);
		}
		if ($select_attribute == 'by_customer_name') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring,'proposer_name', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month,$next_month);
		}
		if ($select_attribute == 'by_email') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring,'email', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month,$next_month);
		}
      	if ($select_attribute == 'by_log_id') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring, 'log_id', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month, $next_month);
		}
		if ($select_attribute == 'by_cust_id') {
			$data['by_cust_id']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring, 'cust_id', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month, $next_month);
		}
		if ($select_attribute == 'by_contact') {
			$data['subadminData']  = $this->filter_model->cus_name_searchdata_renewal_page($searchstring,'contact', $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month,$next_month);
		}
      	$data['totalpremium']=(array_sum(array_column($data['subadminData'], 'net_premium')) );
		$data['module_short_name'] = $module_short_name;
		$this->load->view('admin/filter/filter_data_list_page', $data);
	}

	public function renewal_date_filter()
	{
		
		if(!empty($this->input->post('startdate'))) {
			$startdate = $this->input->post('startdate');	
		}else{
			date_default_timezone_set('Asia/Kolkata');
            $current_date = date('Y-m-d');
          	$three_month_date =  date('Y-m-d', strtotime('+ 3 month', strtotime($current_date)));
			$startdate = $three_month_date;
		}

		$current_date = '';
		$current_month = '';
		
		$current_date1 = $this->input->post('current_date');
		$current_month1 = $this->input->post('current_month');

		if (!empty($current_date1)) {
			$current_date = date('Y-m-d');
		}
		if (!empty($current_month1)) {
			$current_month = date('Y-m');
		}
		$enddate = $this->input->post('enddate');
		$sel_disposition = $this->input->post('sel_disposition');
		$module_short_name = $this->input->post('module_short_name');
		$select_attribute = $this->input->post('select_attribute');
		$content = $this->input->post('content');
		$data['subadminData']  = $this->filter_model->renewal_date_filter($startdate, $enddate,$select_attribute,$content,$sel_disposition, $module_short_name, $current_date, $current_month);
		$data['module_short_name'] = $module_short_name;
		$this->load->view('admin/filter/filter_data_list_page', $data);
		

	}

	
}
