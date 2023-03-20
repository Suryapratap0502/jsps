<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grievance extends MY_Controller
{


	public function __construct()

	{

		parent::__construct();

		$this->load->model('underwriter_model');
		$this->load->model('Form_model');
		$this->load->model('grievance_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('email');
	}
	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['gr_list'] = $this->grievance_model->list_common('grievance');
			return $this->load->view('admin/form/gr_sale_list', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
	public function view_gr($policy_no)
	{
		$data['gr_list'] = $this->Form_model->list_common_where3('grievance', 'policy_no', $policy_no);
		$data['company'] = $this->Form_model->list_common('company');
		$this->load->view('admin/form/view_gr_policy_data', $data);
	}

	public function add()
	{
		$this->load->view('admin/form/add_grievance');
	}

	public function searchpolicyno()
	{
		$query = $this->input->post('query');
        $product = array();
        $data = $this->grievance_model->searchpolicy($query);
		if(!empty($data)){
            foreach ($data as $value) {
                
                $product[] = $value['policy_no'];
				
            }
        }
       
        echo json_encode($product);
	}

	public function data_of_policy()
	{
	  $policy_no = $this->input->post('items');
  
	  $data = $this->grievance_model->policy_data($policy_no);
	  $responce['cust_id'] = $data->id;
	  $responce['company_name'] = $data->com_name;
	  $responce['book_date'] = $data->date_of_closure;
	  $responce['gross_premium'] = $data->gross_premium;
	  $responce['agent_name'] = $data->agent;
	  $responce['team_leader'] = $data->tl_name;
	  echo json_encode($responce);
	  
	}

	public function add_gr_form()
	{
      	date_default_timezone_set('Asia/Kolkata');
        $date = date('Y');
      	$rand = rand(1000, 9999);
		$data['ticket_id'] = "JSPS/" .$date.'/'. $rand;
		$data['priority'] = $this->input->post('priority');
		$data['policy_no'] = $this->input->post('policy_no');
      	$this->db->where('policy_no',$this->input->post('policy_no'));
    	$query = $this->db->get('form');
    	if ($query->num_rows() > 0)
    	{
        
 	 	$data['cus_id'] = $this->input->post('cust_id');
		$data['company_name'] = $this->input->post('company_name');
		$data['sale_book_date'] = $this->input->post('sale_book_date');
		$data['premium'] = $this->input->post('premium');
		$data['complaint_recv_by'] = $this->input->post('complaint_recv_by');
		$data['rise_date_time'] = $this->input->post('rise_date_time');
		$data['agent_name'] = $this->input->post('agent_name');
		$data['tl_name'] = $this->input->post('tl_name');
		$data['status'] = 'Pending';
		$data['gr_type'] = $this->input->post('gr_type');
		$data['action_taken'] = $this->input->post('action_taken');
		
		$insertUser =  $this->db->insert('grievance', $data);
		if ($insertUser) {
			echo json_encode(['inserted' => '1']);
		  } else {
			echo json_encode(['inserted' => '0']);
		  }

    	}
      else{
      		echo json_encode(['policy' => '0']);
      }
		
		
	}
  
  public function view_ticket($encode_ticket_id)
	{	
    	$decode_ticket = base64_decode($encode_ticket_id);
		$data['token_details'] = $this->Form_model->list_common_where3('grievance', 'ticket_id', $decode_ticket);
    	$this->load->view('admin/form/view_gr_ticket_details', $data);
	}
  
  	public function fetch_resp_msg_data()
	{
		$ticket_id  = $this->input->post('ticket_id');
		$data['all_msg'] = $this->Form_model->list_common_where3('gr_token_response', 'token_id', $ticket_id);
		$this->load->view('admin/form/resp_msg_data', $data);
	}

	public function add_ticket_resp()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');
		if ($_FILES['gr_docs']['name'] != "") {
			$path_parts = pathinfo($_FILES['gr_docs']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$source =  $_FILES['gr_docs']['tmp_name'];
		 $originalpath  = "webupload/" . $imgname;

			move_uploaded_file($source, $originalpath);
			$data['docs'] = $imgname;
		}
		$data['token_id'] = $this->input->post('ticket_id');
		$data['policy_no'] = $this->input->post('policy_no');
		$data['cust_id'] = $this->input->post('cus_id');
		$data['reply_from'] = $this->input->post('reply_from');
		$data['department'] = $this->input->post('department_name');
		$data['emp_name'] = $this->input->post('emp_name');
		$data['emp_user_name'] = $this->input->post('user_name');
		$data['msg'] = $this->input->post('msg');
		$data['reply_date_time'] = $date;
		
		$insertUser =  $this->db->insert('gr_token_response', $data);
		if ($insertUser) {
			$response = array('status' => true);
		} else {
			$response = array('status' => false);
		}
		echo json_encode($response);
	}

	public function update_status()
	{
		$val = $this->input->post('val');
		$token_id = $this->input->post('ticket_id');
		$data['status'] = $val;
		$update_status = $this->Form_model->update_common('grievance', $data,'ticket_id',$token_id);
		if ($update_status) {
			$response = array('status' => true);
		} else {
			$response = array('status' => false);
		}
		echo json_encode($response);
	}

	}
