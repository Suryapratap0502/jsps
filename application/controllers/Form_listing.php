<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Form_listing extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model');
        $this->load->model('underwriter_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('email');      
    }
  
    public function test()
    {
        $this->sendmail('sp9522385@gmail.com', 'sp9522385@gmail.com', 'test Mail', 'hello');
    }
  
  public function view_sale($id)
    {
      $get_policy = $this->Form_model->list_common_where3('form', 'id', $id);
       $data['present_date'] =$this->db->query("SELECT DISTINCT YEAR(created_at) as present_year FROM form order by id desc;")->result_array();
       $present_date_y =$this->db->query("SELECT DISTINCT YEAR(created_at) as present_year FROM form order by id desc;")->result_array();
        $data['member_details'] = $this->Form_model->list_common_where3('add_member', 'form_id', $id);
        $data['sale_details'] = $this->Form_model->list_common_where3('form', 'id', $id);
       
        return $this->load->view('admin/view_sale', $data);
    }
  
  public function index($short_name = null,$offset = null)
    {
        if ($this->session->userdata('pmsadmin') == true) {
           	$limit = 10;
            $offset = ($offset == null || $offset == 1) ? '0' : ($offset - 1) * ($limit);
            $data['subadminData'] = $this->Form_model->masterData($limit, $offset);
            $total = $this->Form_model->master_data_count('form', 'flag', '0');
            $data['country'] = $this->Form_model->list_common('countries');
            $data['count'] = $total;
            $data['offset'] = (empty($offset) || $offset == 1) ? '1' : $offset + 1;
            $data['company'] = $this->Form_model->list_common('company');
            return $this->load->view('admin/form_listing', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
  
  
    public function showstates($id)
    {
        if ($id != '0') {
            $states = $this->Form_model->list_common_where3('states', 'country_id', $id);
            $output = '<option value="0">Select</option>';
            foreach ($states as $value) {
                $output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
            }
            $response = array('status' => true, 'output' => $output);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }
  
  
    public function showcity($id)
    {
        $states = $this->Form_model->list_common_where3('user', 'id', $id);
        $output = '<option value="0">Select</option>';
        foreach ($states as $value) {
            $output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
        $response = array('status' => true, 'output' => $output);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
  
  
    public function addsubadmin()
    {
        // $sess = $this->session->userdata('pmsadmin');
        // $id = $sess['id'];
        // $role = $sess['role'];
        // $name = $sess['name'];
        $sub_name = $this->input->post('sub_name');
        $sub_email = $this->input->post('sub_email');
        $sub_password = $this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact = $this->input->post('sub_contact');
        $sub_employee = $this->input->post('sub_employee');
        $sub_department = $this->input->post('sub_department');
        $sub_adminrole = $this->input->post('sub_adminrole');
        // $subject = "Welcome to Axepert Exhibit Pvt Ltd.";
        // $message = "We are greatfully to inform you ($sub_email),<br>$name is added you $sub_email in Axepert Exhibit Admin Panel as a Regional Head.<br>Your username is your email ($sub_email) and your password is $sub_password.<br>Please click here for login https://axepertexhibits.com/AdminPanelPMS2/";
        //check mail
        // $this->db->where('admin_email',$sub_email);
        $query = $this->db->get('admin');
        // $this->load->view('user',$query);
        // if ($query->num_rows() > 0)
        // {
        // 	echo json_encode(['email'=>'0']);
        // }
        // 	else
        // {
        $insertData = array(
            'name' => $sub_name,
            'email' => $sub_email,
            'password' => $password,
            'contact' => $sub_contact,
            'emp_id' => $sub_employee,
            'department' => $sub_department,
            'admin_role' => $sub_adminrole,
        );
        $insertUser =  $this->db->insert('admin', $insertData);
        //    if($insertUser)
        // 		{
        //      		$this->sendmail('webticsindia@gmail.com',$sub_email,$subject,$message);
        // 			echo json_encode(['done'=>'1']);
        // 		}
        // 		else
        // 		{
        // 			echo json_encode(['done'=>'0']);
        // 		}
        // }
        // }
    }
    public function deletesubadmin($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'flag'  => '2'
        );
        $this->Form_model->deletesubadmin('form', $id, $data);
        redirect('form_listing');
    }
  
  
    public function subadminedit($short=null, $id=null)
    {
        $sess = $this->session->userdata('pmsadmin');
        $name = $sess['name'];
        $role = $sess['role'];
        $sess_id = $sess['id'];
        $data['module_short'] = $short;
        $data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group', 'group_short_name', $short);
        foreach ($data1 as $val) {
            $data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id1('disposition', 'module', $val['sidebar_id']);
        }
        $data['content'] = $this->Form_model->subadmineditmodel('form', $id);
      	
        $short_id = $sess_id . '-' . $short;
        $data['remark'] = $this->Form_model->getremark('form_disposition_remark', 'form_id', $id, 'updated_by_user_module', $short_id);
      	$data['getlogdata'] = $this->Form_model->getlogdata($id,$short);
        $data['getlogdata_operation'] = $this->Form_model->getlogdata_operation($id,$short);
        $data['getlogdata_services'] = $this->Form_model->getlogdata_services($id,$short);
        $data['getlogdata_renewals'] = $this->Form_model->getlogdata_renewals($id,$short);
       
        $data['scheduled_call'] = $this->Form_model->list_common('call_reminder');
        $data['scheduled_list'] = $this->Form_model->list_common('call_reminder');
      	$data['manager'] = $this->Form_model->list_common('manager');
        $data['team_leader'] = $this->Form_model->list_common('team_leader');
      	$data['member_details'] = $this->Form_model->list_common_where3('add_member','form_id',$id);
        
        $data['company'] = $this->Form_model->list_common('company');
        $this->load->view('admin/form/form_edit', $data);
    }
  
  
  
    public function updatesubadmi()
    {      
       
        $proposer_name = $this->input->post('proposer_name');
        $policy_no = $this->input->post('policy_no');
        $portability = $this->input->post('portability');
        $medical = $this->input->post('medical');
        $insured_1_ped = $this->input->post('insured_1_ped');
        $discount = $this->input->post('discount');
        $company_name = $this->input->post('company_name');
        $date_of_closure = $this->input->post('date_of_closure');
        $cover_type = $this->input->post('cover_type');
        $payment_tenure = $this->input->post('payment_tenure');
        $insured_2_ped = $this->input->post('insured_2_ped');
        $alternate_no = $this->input->post('alternate_no');
        $product_name = $this->input->post('product_name');
        $sum_assured_1 = $this->input->post('sum_assured_1');
        $coverage_type = $this->input->post('coverage_type');
        $data_source = $this->input->post('data_source');
        $insured_3_ped = $this->input->post('insured_3_ped');
        $tl = $this->input->post('tl');
        $gross_premium = $this->input->post('gross_premium');
        $policy_type = $this->input->post('policy_type');
        $dob = $this->input->post('dob');
        $zone = $this->input->post('zone');
        $insured_4_ped = $this->input->post('insured_4_ped');
        $net_premium = $this->input->post('net_premium');
        $portability_duration = $this->input->post('portability_duration');
        $customer_city = $this->input->post('customer_city');
        $payment_mode = $this->input->post('payment_mode');
        $email = $this->input->post('email');
        $label = $this->input->post('doc_label');
        $image = $this->input->post('doc_image');
        $disposition_name = $this->input->post('disposition_name');
        $reminder_date = $this->input->post('reminder_date');
        $reminder_remark = $this->input->post('reminder_remark');
        $remark = $this->input->post('remarks');
      
      	$policy_start_date = $this->input->post('policy_start_date');
        $policy_end_date = $this->input->post('policy_end_date');
        $policy_issue_date = $this->input->post('policy_issue_date');
      
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
       
        $updatedata = array(
            'proposer_name' => $proposer_name,
            'policy_no' => $policy_no,
            'portability' => $portability,
            'medical' => $medical,
            'insured_1_ped' => $insured_1_ped,
            'discount' => $discount,
            'company_name' => $company_name,
            'date_of_closure' => $date_of_closure,
            'cover_type' => $cover_type,
            'payment_tenure' => $payment_tenure,
            'insured_2_ped' => $insured_2_ped,
            'alternate_no' => $alternate_no,
            'product_name' => $product_name,
            'sum_assured_1' => $sum_assured_1,
            'coverage_type' => $coverage_type,
            'data_source' => $data_source,
            'insured_3_ped' => $insured_3_ped,
            'tl' => $tl,
            'gross_premium' => $gross_premium,
            'policy_type' => $policy_type,
            'dob' => $dob,
            'zone' => $zone,
            'insured_4_ped' => $insured_4_ped,
            'net_premium' => $net_premium,
            'portability_duration' => $portability_duration,
            'customer_city' => $customer_city,
            'payment_mode' => $payment_mode,
            'email' => $email,
        );
      	
      	if(!empty($policy_start_date) && !empty($policy_end_date) && !empty($policy_issue_date))
        { 
        	$updatedata['policy_start_date'] = $policy_start_date;
          $updatedata['policy_end_date'] = $policy_end_date;
          $updatedata['policy_issue_date'] = $policy_issue_date;
                   
               
         }
      
      
      
      
        $insertUser = $this->db->where('id', $this->input->post('id'));
        $insertUser = $this->db->update('form', $updatedata);
      
      	
        $model_short_name = $this->input->post('module_short_name');
        $created_user_module = $this->input->post('id') . '-' . $model_short_name;
        if (!empty($model_short_name) && !empty($_FILES['doc_image']['name'])) {
            for ($i = 0; $i < count($_FILES['doc_image']['name']); $i++) {
                $docs_image = $_FILES['doc_image']['name'][$i];
                $updatedata1 = array(
                    'module_name' => $model_short_name,
                    'user_id' => $this->input->post('id'),
                    'docs_name' => $label[$i],
                    'sale_docs' => $docs_image,
                    'form_id' => $this->input->post('id'),
                    'created_by_user_module' => $created_user_module,
                );
                $insertUser = $this->db->where('id', $this->input->post('id'));
                $insertUser = $this->db->update('sale_docs', $updatedata1);
            }
        }
        if (!empty($disposition_name)) {
            $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
            $disposition_condition = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'id', $disposition_name);
            $disposition_action = $disposition_condition[0]['desposition_condition'];
            $model_short_name = $this->input->post('module_short_name');
            $created_user_module = $id . '-' . $model_short_name;
            $remark_user_module = $id . '-' . $model_short_name;
            $insertData = array(
                'form_id' => $this->input->post('id'),
                'user_id' => $id,
                'disposition' => $disposition_name,
                'disposition_action' => $disposition_action,
                'updated_by_user_module' => $created_user_module,
                'remark' => $remark,
              	'done_by_module' => $model_short_name,
                'remark_by_user_module' => $remark_user_module,
            );
            $insertUser =  $this->db->insert('form_disposition_remark', $insertData);
        }
        // call reminder
        if (!empty($reminder_date) && !empty($reminder_remark)) {
            $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
            $model_short_name = $this->input->post('module_short_name');
            $remark_user_module = $id . '-' . $model_short_name;
            $insertData = array(
                'form_id' => $this->input->post('id'),
                'user_id' => $id,
                'module_name' => $model_short_name,
                'call_time' => $reminder_date,
                'call_remark' => $reminder_remark,
                'reminder_by_user_module' => $remark_user_module,
            );
            $insertUser =  $this->db->insert('call_reminder', $insertData);
        }
        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }
    public function changesubpass()
    {
        $id =  $this->input->post('id');
        $cur_password =  $this->input->post('cur_password');
        $cpassword = md5($cur_password);
        $new_password = $this->input->post('new_password');
        $npassword = md5($new_password);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $this->db->where('password', $cpassword);
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            $updatedata = array(
                'password' => $npassword,
                'updated_at' => $date
            );
            $insertUser = $this->db->where('id', $id);
            $insertUser = $this->db->update('admin', $updatedata);
            if ($insertUser) {
                echo json_encode(['inserted' => '1']);
            } else {
                echo json_encode(['inserted' => '0']);
            }
        } else {
            echo json_encode(['password' => '0']);
        }
    }
    public function searchbyname()
    {
        $postData = $this->input->post();
        // Get data
        $data = $this->Form_model->getname($postData);
        echo json_encode($data);
    }
    public function changepass()
    {
        $id = $this->input->post('userid');
        $data['user_data'] = $this->Form_model->list_common_where3('admin', 'id', $id);
        $this->load->view('admin/user_password_update', $data);
    }
    function update_password()
    {
        $id = $this->input->post('category_id');
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
        $exist = $this->Form_model->display_sp_single4('admin', 'id', $id);
        if (!empty($exist)) {
            //   if( md5($old_pass) == $exist[0]->password){
            if ($new_pass == $confirm_pass) {
                $pass = md5($new_pass);
                $query = $this->Form_model->changepass($pass, $id);
                if ($query) {
                    $response = array('status' => true, 'type' => 'success', 'msg' => "<span style='color:green'>Password Changed Successfully</span>");
                } else {
                    $response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>Something went wrong</span>");
                }
            } else {
                $response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>New & Confirm Password must be same</span>");
            }
        } else {
            $response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>User not exist</span>");
        }
        echo json_encode($response);
    }
}
