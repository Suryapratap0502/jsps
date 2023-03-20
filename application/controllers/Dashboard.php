<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()

	{

		parent::__construct();

		$this->load->model('Dashboard_model');
      	$this->load->model('Form_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index2()
	{
		//$this->session->set('login', true);
		//check that whether the  session is set or not 
		date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
      	$short_name = "renewals";
		if ($this->session->userdata('pmsadmin') == true) {
			$data['total_employee'] = $this->Dashboard_model->total_employee();
			$data['today_fresh_bus'] = $this->Dashboard_model->today_fresh_bus('form', $date);
			$data['total_fresh_bus'] = $this->Dashboard_model->total_fresh_bus('form');
			$data['today_claim'] = $this->Dashboard_model->today_claim('claim', $date);
			$data['total_claim'] = $this->Dashboard_model->total_claim('claim');
			$data['subadminData'] = $this->Form_model->list_common_where3('form','updated_by_user_module',$short_name);
			$data['company'] = $this->Form_model->list_common('company');
			$remark = $this->Dashboard_model->today_renewal('form', $date);
			
			foreach($remark as $val)
		{
		$json = json_decode($val['remark'], true);
			$arr = array($json['Net Premium']) ;
		$arr_aum = array_sum($arr);
				
				
			}
			return $this->load->view('admin/index',$data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
		public function index()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');

		if ($this->session->userdata('pmsadmin') == true) {
			$data['total_employee'] = $this->Dashboard_model->total_employee();
			$data['today_fresh_bus'] = $this->Dashboard_model->today_fresh_bus('form', $date);
			$data['total_fresh_bus'] = $this->Dashboard_model->total_fresh_bus('form');
			$data['today_claim'] = $this->Dashboard_model->today_claim('claim', $date);
			$data['total_claim'] = $this->Dashboard_model->total_claim('claim');
			$data['total_policy'] = $this->Dashboard_model->total_policy('form');
			// $data['todayrevenue'] = $this->Dashboard_model->total_revenue('form', $date);
			$data['subadminData'] = $this->Form_model->list_common_where3('form', 'updated_by_user_module', 'renewals');
			$data['company'] = $this->Dashboard_model->list_common('company');
			$remark = $this->Dashboard_model->today_renewal('form', $date);

			foreach ($remark as $val) {
				$json = json_decode($val['remark'], true);
				$arr = array($json['Net Premium']);
				$arr_aum = array_sum($arr);
			}

			$data['total_revenue'] =  $this->Dashboard_model->total_revenue();
			$numbers = array_column($data['total_revenue'], 'total_revenue');
			$data['min'] = min($numbers);
			$data['max'] = max($numbers);
			$data['etc'] =  $this->Dashboard_model->chart_total_years();
			return $this->load->view('admin/index2', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	public function logout()
	{

		$sess = $this->session->userdata('pmsadmin');
		$name = $sess['name'];
		$role = $sess['role'];
		$id = $sess['id'];
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');
		$this->db->query("UPDATE master_admin set last_login = '$date' WHERE admin_user_id = '$id'");
		session_destroy();
		unset($_SESSION);
		return $this->load->view('admin/logout');
	}

	public function notification()
	{
		$update = array(
			'read_status'  => '1'
		);
		$insertUser = $this->db->update('notification', $update);
		if ($insertUser) {
			echo json_encode(['done' => '1']);
		} else {
			echo json_encode(['done' => '0']);
		}
	}

	public function getnotification()
	{
		$module_short = $this->input->post('module_short_name');
	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		
      if (empty($module_short) || $module_short ==  'sale_closure') {
			$sql = $this->db->query("SELECT * FROM notification WHERE flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else if ($module_short ==  'underwriter_verifier') {
			$sql = $this->db->query("SELECT * FROM notification WHERE `created_by_module` = 'underwriter_verifier' AND flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else if ($module_short ==  'operations') {
			$sql = $this->db->query("SELECT * FROM notification WHERE `created_by_module` IN ( 'operations' , 'underwriter_verifier') AND flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else if ($module_short ==  'services') {
			$sql = $this->db->query("SELECT * FROM notification WHERE `created_by_module` IN ( 'underwriter_verifier','operations' , 'services') AND flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else if ($module_short ==  'renewals') {
			$sql = $this->db->query("SELECT * FROM notification WHERE `created_by_module` IN ( 'underwriter_verifier','operations' , 'services','renewals') AND flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else if ($module_short ==  'claims') {
			$sql = $this->db->query("SELECT * FROM notification WHERE `created_by_module` = 'claims' AND flag= '0' AND LEFT(created_at,10) = '$date' order by id desc");
			$data['notdata'] = $sql->result_array();
		} else {
			echo "No Notifictaion for Today";
		}
      	return $this->load->view('admin/notification', $data);
	}
  public function renewal_filter()
	{
		$id = $this->input->post('id');

		date_default_timezone_set('Asia/Kolkata');
		$current_date = date('Y-m-d');
		if ($id == 'all') {
			$data['subadminData']  = $this->Form_model->list_common_where3('form', 'updated_by_user_module', 'renewals');
		} else if ($id == '6M') {
			$six_month_date =  date('Y-m-d', strtotime('- 6 month', strtotime($current_date)));
			$six_month_renewal = $six_month_date;
			$data['subadminData']  = $this->Dashboard_model->list_data($six_month_renewal, $current_date);
		} else if ($id == '1M') {
			$six_month_date =  date('Y-m-d', strtotime('- 1 month', strtotime($current_date)));
			$one_month_renewal = $six_month_date;
			$data['subadminData']  = $this->Dashboard_model->list_data($one_month_renewal, $current_date);
		} else if ($id == '1Y') {
			$six_month_date =  date('Y-m-d', strtotime('- 12 month', strtotime($current_date)));
			$year_renewal = $six_month_date;
			$data['subadminData']  = $this->Dashboard_model->list_data($year_renewal, $current_date);
		} else {
			echo "No data";
		}

		$data['company'] = $this->Form_model->list_common('company');
		$this->load->view('admin/filter/filter_dashboard_page', $data);
	}


	public function claim_paid_filter()
	{
		$data['id'] = $this->input->post('id');

		$data['company'] = $this->Form_model->list_common('company');
		$this->load->view('admin/filter/filter_dashboard_piechart_1', $data);
	}
	public function claim_register_filter()
	{
		$data['id'] = $this->input->post('id');
		$data['company'] = $this->Form_model->list_common('company');
		$this->load->view('admin/filter/filter_dashboard_piechart', $data);
	}
}
