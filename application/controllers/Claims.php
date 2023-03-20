<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claims extends MY_Controller {

	
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
            $data['claim_initiated_list'] = $this->Form_model->initiated_claim_list();

            $data['company'] = $this->Form_model->list_common('company');
            $total = $this->Form_model->initiated_claim_count($limit, $offset);
			$data['count'] = $total;
			$data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            return $this->load->view('admin/form/claim_sale_list', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }

    public function searchclaim()
    {
        $product = array();
        $query = $this->input->post('query');

        if (strlen($query) > 4 && strlen($query) != 10) {
            
            $data = $this->Form_model->searchpolicy('policy_no',$query);
            if (!empty($data)) {
                foreach ($data as $value) {
                    $product[] = $value['form_policy'];
                }
            }
        }
        
        if (strlen($query) == 10) {
            $data = $this->Form_model->searchpolicy('contact',$query);
            if (!empty($data)) {
                foreach ($data as $value) {
                    $product[] = $value['form_contact'];
                }
            }
        }
        
        if (strpos($query, '@') !== false) {

            $data = $this->Form_model->searchpolicy('email',$query);
            if (!empty($data)) {
                foreach ($data as $value) {
                    $product[] = $value['form_email']; 
                }
            }
        }


        echo json_encode($product);
    }

    public function get_policy_data_after_search()
    {
        $policy_no = $this->input->post('items');
        $data['claim_initiated_list'] = $this->Form_model->list_common_where3('form','policy_no', $policy_no);
        return $this->load->view('admin/form/get_policy_wise_data', $data);

    }
  	public function initiate_claim($policy_no)
    {
      $data['policy_no'] = $policy_no;
     
      $data['company'] = $this->Form_model->list_common('company');
      $this->load->view('admin/form/initiate_claim',$data);
  	}
  
  	public function claim_sale_edit($short, $id)
    {
    	$sess = $this->session->userdata('pmsadmin');
        $name = $sess['name'];
        $role = $sess['role'];
        $sess_id = $sess['id'];
        $data['module_short'] = $short;
        $data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group', 'group_short_name', $short);
        foreach ($data1 as $val) {
            $data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'module', $val['sidebar_id']);
        }
        $data['content'] = $this->Form_model->subadmineditmodel('form', $id);
        $short_id = $sess_id . '-' . $short;
        $data['remark'] = $this->Form_model->getremark('form_disposition_remark', 'form_id', $id, 'updated_by_user_module', $short_id);
        $data['scheduled_call'] = $this->Form_model->list_common('call_reminder');
        $data['company'] = $this->Form_model->list_common('company');
        $this->load->view('admin/form/claim_sale_edit_view', $data);
    
    
    }
  
  public function view_claims($policy_no_0)
  {		$policy_no = base64_decode($policy_no_0);
		
    	$data['claim_list'] = $this->Form_model->claim_details_policy_wise('claim','policy_no', $policy_no);
        $data['company'] = $this->Form_model->list_common('company');
   		$data['policy_no'] = $policy_no;
    	$data['scheduled_call'] = $this->Form_model->list_common('call_reminder');
        $this->load->view('admin/form/view_claim_policy',$data);
  }
  
  public function add_initiate_claim()
  {		
    	$sess = $this->session->userdata('pmsadmin');
       	$id = $sess['id'];
        $role = $sess['role'];
      	$name = $sess['name'];
    	$claim_id = $this->uri->segment(3);
    	
  		$insertData['policy_no'] =	$policy_number = $this->input->post('policy_number');
    	$form_id = $this->Form_model->list_common_where3('form','policy_no', $policy_number);
    	$f_id = $form_id[0]['id'];
         $insertData['patient_name'] = $patient_name = $this->input->post('patient_name');
         $insertData['company_name'] = $company_name = $this->input->post('company_name');
    	$insertData['claim_intimation_no'] = $claim_intimation_no = $this->input->post('claim_intimation_no');
        $insertData['reason_admit'] = $reason_admit = $this->input->post('reason_admit');
        $insertData['health_card'] = $health_card = $this->input->post('health_card');
    
    	$insertData['admission_date'] = $admission_date = $this->input->post('admission_date');
        $insertData['is_network'] = $is_network = $this->input->post('is_network');
    	$insertData['claim_type'] = $claim_type = $this->input->post('claim_type');
        $insertData['claim_for'] = $claim_for = $this->input->post('claim_for');
        $insertData['pre_auth_status'] = $pre_auth_status = $this->input->post('pre_auth_status');
    
    	$insertData['pre_auth_amt'] = $pre_auth_amt = $this->input->post('pre_auth_amt');
        $insertData['claim_status'] = $claim_status = $this->input->post('claim_status');
        $insertData['total_bill_amt'] = $total_bill_amt = $this->input->post('total_bill_amt');
    	$insertData['total_approve_amt'] = $total_approve_amt = $this->input->post('total_approve_amt');
        $insertData['hospital_discount'] = $hospital_discount = $this->input->post('hospital_discount');
        $insertData['deduction_amt'] = $deduction_amt = $this->input->post('deduction_amt');
    
    	$insertData['deduction_amt_details'] = $deduction_amt_details = $this->input->post('deduction_amt_details');
        //$insertData['customer_remarks'] = $customer_remarks = $this->input->post('customer_remarks');
    	$insertData['paid_on'] = $paid_on = $this->input->post('paid_on');
        $insertData['final_status'] = $final_status = $this->input->post('final_status');
        $insertData['remarks'] = $remarks = $this->input->post('remarks');
    
    
        $title = $this->input->post('doc_label');
        $image = $this->input->post('doc_image');
        $module_name = $this->input->post('module_name');
        $module_short_name = $this->input->post('module_short_name');
        $created_user_module = $id. '-' . $module_name;
    	 $claim_id = "JSPS" .$policy_number. mt_rand();
         $msg = $patient_name . ' is disposed by ' . $module_name;
         $updatedata1_notification = array(
           'created_by_id' => $id,
           'created_by_module' => $module_short_name,
           'msg' =>  $msg,
           'disposition' =>$title[0]
         );
      
         $insertUser =  $this->db->insert('notification', $updatedata1_notification);
    
    
    	$insertUser =  $this->db->insert('claim',$insertData);
    	$last_id = $this->db->insert_id();
        //if(!empty($title) && !empty($image))
        //{
    	 if (!empty($_FILES['doc_image']['name'])) {
            for ($i = 0; $i < count($_FILES['doc_image']['name']); $i++) {
              
              	  $path_parts = pathinfo($_FILES['doc_image']['name'][$i]);
                  $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                  $imgname=$image_path;

                  $source =  $_FILES['doc_image']['tmp_name'][$i];      
                  $originalpath  = "assets/upload/documents/".$imgname;

                  move_uploaded_file($source,$originalpath);
              
                $updatedata1 = array(
                    'module_name' => $module_name,
                    'user_id' => $id,
                    'docs_name' => $title[$i],
                    'sale_docs' => $imgname,
                    'policy_no' => $policy_number,
                  	'form_id' => $f_id,
                  	'claim_id'=>$last_id,
                    'created_by_user_module' => $created_user_module,
                );
                $insertUser =  $this->db->insert('sale_docs',$updatedata1);
            }
        }
      // }
    		 if($insertUser)
				{
             	echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	 
  }
  
  	public function add_reminder()
    {
      	$sess = $this->session->userdata('pmsadmin');
       	$id = $sess['id'];
        $role = $sess['role'];
      	$name = $sess['name'];
    	$claim_id = $this->uri->segment(3);
    	$sel_schedule = $this->input->post('sel_scheduled');
        $reminder_date = $this->input->post('reminder_date');
        $reminder_remark = $this->input->post('reminder_remark');
      	$module_name = $this->input->post('module_name');
    	$created_user_module = $id. '-' . $module_name;
      	$insertData = array(
                'crated_by' => $id,
				'created_to' => $sel_schedule,
          		'notification_msg'=>$reminder_remark,
          		'module'=>$sel_schedule,
              'reminder_date_time'=>$reminder_date,
          		 );
         	$insertUser =  $this->db->insert('notification',$insertData);
      if($insertUser)
				{
             	echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    
    }
  
  
  	public function claim_details($claim_id)
    {
    	
      	
      $data['claim_details'] = $this->Form_model->list_common_where3('claim','claim_intimation_no', $claim_id);
    	if(!empty($data['claim_details'])){
        foreach ($data as $val) {
            $data['policy_details'] = $this->Form_model->list_common_where3('form', 'policy_no', $val[0]['policy_no']);
        }
        }
      
      	if(!empty($data['claim_details'])){
      	foreach ($data as $val1) {
            $data['claim_docs'] = $this->Form_model->list_common_where3('sale_docs', 'policy_no', $val1[0]['policy_no']);
        }
        }
         $data['thread_docs'] = $this->Form_model->list_common_where3('claim','claim_intimation_no', $claim_id);   
      
      
       $this->load->view('admin/form/claim_details', $data);
      
    }
  
  	public function add_new_thread()
    {
    	$sess = $this->session->userdata('pmsadmin');
       	$id = $sess['id'];
    	$policy_no = $this->input->post('policy_no');
        $claim_id = $this->input->post('claim_id');
        $description = $this->input->post('description');
    	$title = $this->input->post('title');
        $image = $this->input->post('image');
    	$module_name = $this->input->post('module_name');
      	$created_user_module = $id. '-' . $module_name;
      	 if (!empty($_FILES['image']['name'])) {
            for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
                $docs_image = $_FILES['image']['name'][$i];
              	$path_parts = pathinfo($_FILES['image']['name']);
                $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
                $imgname=$docs_image;

                $source =  $_FILES['image']['tmp_name'];      
                $originalpath  = "./assets/upload/documents/".$imgname;
              	move_uploaded_file($source,$originalpath); 
                $updatedata1 = array(
                    'module_name' => $module_name,
                    'user_id' => $id,
                    'docs_name' => $title[$i],
                    'sale_docs' => $imgname,
                   
                  	'description' => $description,
                  	'claim_id' => $claim_id,
                    'created_by_user_module' => $created_user_module,
                );
                $insertUser =  $this->db->insert('sale_docs',$updatedata1);
            }
        }
      		 if($insertUser)
				{
             	echo json_encode(['done'=>'1']);
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    
    
    }
  public function showclaimdetails($id)
    {   
        $data['claim_details'] = $this->Form_model->list_common_where3('claim','id',$id);
    
    	$data['company'] = $this->Form_model->list_common('company');
        $this->load->view('admin/form/initiate_edit',$data);         
    }
  
  	
  

  
}

