<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends MY_Controller
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
  public function old_form()
  {
    $this->load->view('admin/old_form');
  }

  public function index($short_name = null)
  {

    if ($this->session->userdata('pmsadmin') == true) {
      $data1 = $this->underwriter_model->fetch_sidebar_group_id('sidebar_group', 'group_short_name', $short_name);
      foreach ($data1 as $val) {
        $data['disposition_name'] = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'module', $val['sidebar_id']);
      }
      $data['subadminData'] = $this->Form_model->masterData();
      $data['team_leader'] = $this->Form_model->list_common('team_leader');
      $data['manager'] = $this->Form_model->list_common('manager');

      $data['company'] = $this->Form_model->list_common('company');

      return $this->load->view('admin/form', $data);
    } else {
      $this->session->set_flashdata('denied', 'Access Denied!');
      return $this->load->view('admin/login');
    }
  }




  public function addsubadmin()
  {
    $sess = $this->session->userdata('pmsadmin');
    $name = $sess['name'];
    $role = $sess['role'];
    $id = $sess['id'];
    $proposer_name = $this->input->post('proposer_name');
    $manager = $this->input->post('manager');
    $policy_no = $this->input->post('policy_no');
    $portability = $this->input->post('portability');
    $medical = $this->input->post('medical');
    $insured_1_ped = $this->input->post('insured_1_ped');
    $discount = $this->input->post('discount');
    $company_name = $this->input->post('company_name');
    $date_of_closure = $this->input->post('date_of_closure');
    $cover_type = $this->input->post('cover_type');
    $payment_tenure = $this->input->post('payment_tenure');
    $expiry_date =  date('Y-m-d', strtotime('+' . $payment_tenure, strtotime($date_of_closure)));
    $expiry_date = date('Y-m-d', strtotime('-1 day', strtotime($expiry_date)));
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
    $insured_5_ped = $this->input->post('insured_5_ped');
    $net_premium = $this->input->post('net_premium');
    $portability_duration = $this->input->post('portability_duration');
    $port_end_date = $this->input->post('port_end_date');
    $customer_city = $this->input->post('customer_city');
    $payment_mode = $this->input->post('payment_mode');
    $email = $this->input->post('email');
    $agent = $this->input->post('agent');
    $contact = $this->input->post('contact');
    $this->db->where('policy_no', $policy_no);
    $query = $this->db->get('form');

    if ($query->num_rows() > 0) {

      echo json_encode(['policy_no' => '0']);
    } else {
      $insertData = array(
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
        'agent' => $agent,
        'gross_premium' => $gross_premium,
        'policy_type' => $policy_type,
        'dob' => $dob,
        'zone' => $zone,
        'insured_4_ped' => $insured_4_ped,
        'insured_5_ped' => $insured_5_ped,
        'net_premium' => $net_premium,
        'portability_duration' => $portability_duration,
        'customer_city' => $customer_city,
        'payment_mode' => $payment_mode,
        'email' => $email,
        'port_end_date' => $port_end_date,
        'manager' => $manager,
        'contact' => $contact,

      );

      $insertUser =  $this->db->insert('form', $insertData);
      $last_id = $this->db->insert_id();


      if (!empty($coverage_type)) {
        $coverage_type = $this->input->post('coverage_type');
        $insured_1_name = $this->input->post('insured_1_name');
        $insured_1_gender = $this->input->post('insured_1_gender');
        $insured_1_dob = $this->input->post('insured_1_dob');
        $insured_1_relation = $this->input->post('insured_1_relation');
        $insured_1_feet = $this->input->post('insured_1_feet');
        $insured_1_inch = $this->input->post('insured_1_inch');
        $insured_1_claim = $this->input->post('insured_1_claim');
        $insured_1_weight = $this->input->post('insured_1_weight');
        $insured_1_ped_details = $this->input->post('insured_1_ped');
        $underwriter_1_ped = $this->input->post('underwriter_1_ped');

        $insured_2_name = $this->input->post('insured_2_name');
        $insured_2_gender = $this->input->post('insured_2_gender');
        $insured_2_dob = $this->input->post('insured_2_dob');
        $insured_2_relation = $this->input->post('insured_2_relation');
        $insured_2_feet = $this->input->post('insured_2_feet');
        $insured_2_inch = $this->input->post('insured_2_inch');
        $insured_2_claim = $this->input->post('insured_2_claim');
        $insured_2_weight = $this->input->post('insured_2_weight');
        $insured_2_ped_details = $this->input->post('insured_2_ped');
        $underwriter_2_ped = $this->input->post('underwriter_2_ped');

        $insured_3_name = $this->input->post('insured_3_name');
        $insured_3_gender = $this->input->post('insured_3_gender');
        $insured_3_dob = $this->input->post('insured_3_dob');
        $insured_3_relation = $this->input->post('insured_3_relation');
        $insured_3_feet = $this->input->post('insured_3_feet');
        $insured_3_inch = $this->input->post('insured_3_inch');
        $insured_3_claim = $this->input->post('insured_3_claim');
        $insured_3_weight = $this->input->post('insured_3_weight');
        $insured_3_ped_details = $this->input->post('insured_3_ped');
        $underwriter_3_ped = $this->input->post('underwriter_3_ped');

        $insured_4_name = $this->input->post('insured_4_name');
        $insured_4_gender = $this->input->post('insured_4_gender');
        $insured_4_dob = $this->input->post('insured_4_dob');
        $insured_4_relation = $this->input->post('insured_4_relation');
        $insured_4_feet = $this->input->post('insured_4_feet');
        $insured_4_inch = $this->input->post('insured_4_inch');
        $insured_4_claim = $this->input->post('insured_4_claim');
        $insured_4_weight = $this->input->post('insured_4_weight');
        $insured_4_ped_details = $this->input->post('insured_4_ped');
        $underwriter_4_ped = $this->input->post('underwriter_4_ped');

        $insured_5_name = $this->input->post('insured_5_name');
        $insured_5_gender = $this->input->post('insured_5_gender');
        $insured_5_dob = $this->input->post('insured_5_dob');
        $insured_5_relation = $this->input->post('insured_5_relation');
        $insured_5_feet = $this->input->post('insured_5_feet');
        $insured_5_inch = $this->input->post('insured_5_inch');
        $insured_5_claim = $this->input->post('insured_5_claim');
        $insured_5_weight = $this->input->post('insured_5_weight');
        $insured_5_ped_details = $this->input->post('insured_5_ped');
        $underwriter_5_ped = $this->input->post('underwriter_5_ped');

        $insured_6_name = $this->input->post('insured_6_name');
        $insured_6_gender = $this->input->post('insured_6_gender');
        $insured_6_dob = $this->input->post('insured_6_dob');
        $insured_6_relation = $this->input->post('insured_6_relation');
        $insured_6_feet = $this->input->post('insured_6_feet');
        $insured_6_inch = $this->input->post('insured_6_inch');
        $insured_6_claim = $this->input->post('insured_6_claim');
        $insured_6_weight = $this->input->post('insured_6_weight');
        $insured_6_ped_details = $this->input->post('insured_6_ped');
        $underwriter_6_ped = $this->input->post('underwriter_6_ped');

        $insured_7_name = $this->input->post('insured_7_name');
        $insured_7_gender = $this->input->post('insured_7_gender');
        $insured_7_dob = $this->input->post('insured_7_dob');
        $insured_7_relation = $this->input->post('insured_7_relation');
        $insured_7_feet = $this->input->post('insured_7_feet');
        $insured_7_inch = $this->input->post('insured_7_inch');
        $insured_7_claim = $this->input->post('insured_7_claim');
        $insured_7_weight = $this->input->post('insured_7_weight');
        $insured_7_ped_details = $this->input->post('insured_7_ped');
        $underwriter_7_ped = $this->input->post('underwriter_7_ped');

        $insured_8_name = $this->input->post('insured_8_name');
        $insured_8_gender = $this->input->post('insured_8_gender');
        $insured_8_dob = $this->input->post('insured_8_dob');
        $insured_8_relation = $this->input->post('insured_8_relation');
        $insured_8_feet = $this->input->post('insured_8_feet');
        $insured_8_inch = $this->input->post('insured_8_inch');
        $insured_8_claim = $this->input->post('insured_8_claim');
        $insured_8_weight = $this->input->post('insured_8_weight');
        $insured_8_ped_details = $this->input->post('insured_8_ped');
        $underwriter_8_ped = $this->input->post('underwriter_8_ped');
        $policy_no = $this->input->post('policy_no');

        if (!empty($insured_1_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_1_name,
            'member_gender' => $insured_1_gender,
            'member_weight' =>  $insured_1_weight,
            'any_claim' => $insured_1_claim,
            'member_dob' => $insured_1_dob,
            'member_height_feet' => $insured_1_feet,
            'member_height_inch' => $insured_1_inch,
            'member_relation' => $insured_1_relation,
            'insured_pd_details' => $insured_1_ped_details,
            'underwriter_ped' => $underwriter_1_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_2_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_2_name,
            'member_gender' => $insured_2_gender,
            'member_dob' => $insured_2_dob,
            'member_relation' => $insured_2_relation,
            'member_height_feet' => $insured_2_feet,
            'member_height_inch' => $insured_2_inch,
            'any_claim' => $insured_2_claim,
            'member_weight' =>  $insured_2_weight,
            'insured_pd_details' => $insured_2_ped_details,
            'underwriter_ped' => $underwriter_2_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_3_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_3_name,
            'member_gender' => $insured_3_gender,
            'member_dob' => $insured_3_dob,
            'member_relation' => $insured_3_relation,
            'member_height_feet' => $insured_3_feet,
            'member_height_inch' => $insured_3_inch,
            'any_claim' => $insured_3_claim,
            'member_weight' =>  $insured_3_weight,
            'insured_pd_details' => $insured_3_ped_details,
            'underwriter_ped' => $underwriter_3_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_4_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_4_name,
            'member_gender' => $insured_4_gender,
            'member_dob' => $insured_4_dob,
            'member_relation' => $insured_4_relation,
            'member_height_feet' => $insured_4_feet,
            'member_height_inch' => $insured_4_inch,
            'any_claim' => $insured_4_claim,
            'member_weight' =>  $insured_4_weight,
            'insured_pd_details' => $insured_4_ped_details,
            'underwriter_ped' => $underwriter_4_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_5_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_5_name,
            'member_gender' => $insured_5_gender,
            'member_dob' => $insured_5_dob,
            'member_relation' => $insured_5_relation,
            'member_height_feet' => $insured_5_feet,
            'member_height_inch' => $insured_5_inch,
            'any_claim' => $insured_5_claim,
            'member_weight' =>  $insured_5_weight,
            'insured_pd_details' => $insured_5_ped_details,
            'underwriter_ped' => $underwriter_5_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_6_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_6_name,
            'member_gender' => $insured_6_gender,
            'member_dob' => $insured_6_dob,
            'member_relation' => $insured_6_relation,
            'member_height_feet' => $insured_6_feet,
            'member_height_inch' => $insured_6_inch,
            'any_claim' => $insured_6_claim,
            'member_weight' =>  $insured_6_weight,
            'insured_pd_details' => $insured_6_ped_details,
            'underwriter_ped' => $underwriter_6_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_7_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_7_name,
            'member_gender' => $insured_7_gender,
            'member_dob' => $insured_7_dob,
            'member_relation' => $insured_7_relation,
            'member_height_feet' => $insured_7_feet,
            'member_height_inch' => $insured_7_inch,
            'any_claim' => $insured_7_claim,
            'member_weight' =>  $insured_7_weight,
            'insured_pd_details' => $insured_7_ped_details,
            'underwriter_ped' => $underwriter_7_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }

        if (!empty($insured_8_name)) {
          $insertData = array(
            'user_id' => $id,
            'policy_no' => $policy_no,
            'form_id' => $last_id,
            'family_type' => $coverage_type,
            'member_name' => $insured_8_name,
            'member_gender' => $insured_8_gender,
            'member_dob' => $insured_8_dob,
            'member_relation' => $insured_8_relation,
            'member_height_feet' => $insured_8_feet,
            'member_height_inch' => $insured_8_inch,
            'any_claim' => $insured_8_claim,
            'member_weight' =>  $insured_8_weight,
            'insured_pd_details' => $insured_8_ped_details,
            'underwriter_ped' => $underwriter_8_ped,
          );
          $insertUser =  $this->db->insert('add_member', $insertData);
        }
      }

      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      $model_short_name = $this->input->post('module_short_name');
      $created_user_module = $id . '-' . $model_short_name;
      if (!empty($model_short_name)) {

        for ($i = 0; $i < count($_FILES['doc_image']['name']); $i++) {
          $docs_image = $_FILES['doc_image']['name'][$i];
          $insertData = array(
            'module_name' => $model_short_name,
            'user_id' => $id,
            'docs_name' => $label[$i],
            'sale_docs' => $docs_image,
            'remark' => $remark,
            'disposition' => $disposition_name,
            'done_by_module' => $model_short_name,
            'created_by_user_module' => $created_user_module,
          );
          $insertUser =  $this->db->insert('sale_docs', $insertData);
        }
      }

      if ($insertUser) {
        echo json_encode(['done' => '1']);
      } else {
        echo json_encode(['done' => '0']);
      }
    }
  }


  public function deletesubadmin($id)
  {
    $id = $this->input->post("id");
    $data = array(
      'flag'  => '2'
    );
    $this->Form_model->deletesubadmin('admin', $id, $data);
    redirect('user');
  }

  public function subadminedit()
  {

    $id =  $this->input->post('id');
    $data['content'] = $this->Form_model->subadmineditmodel('admin', $id);


    $this->load->view('admin/user/user', $data);
  }


  public function updatesubadmi()
  {
    $disposition_action = "";

    //input type hidden 
    $sess = $this->session->userdata('pmsadmin');
    $name = $sess['name'];
    $role = $sess['role'];
    $id = $sess['id'];
    $sms_type_label = $this->input->post('sms_type_label');
    $send_sms_type = $this->input->post('send_sms_type');

    $sub_disposition_label_not_renewd = $this->input->post('sub_disposition_label_not_renewd');
    $not_renewed_sub = $this->input->post('not_renewed_sub');


    $company_name_2 = $this->input->post('company_name_2');
    $manager = $this->input->post('manager');

    $new_policy_number = $this->input->post('new_policy_number');

    $proposer_dob_label = $this->input->post('proposer_dob_label');
    $proposer_dob = $this->input->post('proposer_dob');

    $sum_assured_label = $this->input->post('sum_assured_label');
    $new_sum_assured_1 = $this->input->post('new_sum_assured_1');

    $net_premium_label = $this->input->post('net_premium_label');
    $new_net_premium = $this->input->post('new_net_premium');

    $upselling_label = $this->input->post('upselling_label');
    $upselling = $this->input->post('upselling');

    $alt_number_label = $this->input->post('alt_number_label');
    $alternate_number = $this->input->post('alternate_number');
    $new_payment_mode = $this->input->post('new_payment_mode');
    $new_payment_tenure = $this->input->post('new_payment_tenure');
    $new_coverage_type = $this->input->post('new_coverage_type');
    $new_gross_premium = $this->input->post('new_gross_premium');
    $emi = $this->input->post('emi');
    $discount_new = $this->input->post('discount_new');
    $company_name_2 = $this->input->post('company_name_2');
    $new_gross_premium_port_in = $this->input->post('new_gross_premium_2');
    $date_of_portIN = $this->input->post('date_of_port_2');

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
    $sel_member = $this->input->post('sel_member');
    $member_add_details = $this->input->post('member_add_details');
    $insured_pd = $this->input->post('insured_pd');
    $add_insured_pd_details = $this->input->post('add_insured_pd_details');
    $port_end_date = $this->input->post('port_end_date');
    $sub_disposition_name = $this->input->post('sub_disposition_name');


    $reminder_date = $this->input->post('reminder_date');
    $reminder_remark = $this->input->post('reminder_remark');
    $remark = $this->input->post('remarks');

    $policy_start_date = $this->input->post('policy_start_date');
    $policy_end_date = $this->input->post('policy_end_date');
    $policy_issue_date = $this->input->post('policy_issue_date');
    $model_short_name = $this->input->post('module_short_name');
    $policy_source = $this->input->post('policy_source');
    $contact = $this->input->post('contact');
    $renewal_primium = $this->input->post('renewal_primium');
    $counted_premium = $this->input->post('counted_premium');
    $rider = $this->input->post('rider');
    $agent = $this->input->post('agent');
    $login = $this->input->post('login');
    $form_id = $this->input->post('id');
    $docs_img = $this->input->post('doc_image');
    $docs_img_name = $this->input->post('doc_image');
    // member update / Add
    $coverage_type = $this->input->post('coverage_type');
    $insured_1_name = $this->input->post('insured_1_name');
    $insured_1_gender = $this->input->post('insured_1_gender');
    $insured_1_dob = $this->input->post('insured_1_dob');
    $insured_1_relation = $this->input->post('insured_1_relation');
    $insured_1_feet = $this->input->post('insured_1_feet');
    $insured_1_inch = $this->input->post('insured_1_inch');
    $insured_1_claim = $this->input->post('insured_1_claim');
    $insured_1_weight = $this->input->post('insured_1_weight');
    $insured_1_ped_details = $this->input->post('insured_1_ped');
    $underwriter_1_ped = $this->input->post('underwriter_1_ped');
    $member_table_id_1 = $this->input->post('member_table_id_1');

    $insured_2_name = $this->input->post('insured_2_name');
    $insured_2_gender = $this->input->post('insured_2_gender');
    $insured_2_dob = $this->input->post('insured_2_dob');
    $insured_2_relation = $this->input->post('insured_2_relation');
    $insured_2_feet = $this->input->post('insured_2_feet');
    $insured_2_inch = $this->input->post('insured_2_inch');
    $insured_2_claim = $this->input->post('insured_2_claim');
    $insured_2_weight = $this->input->post('insured_2_weight');
    $insured_2_ped_details = $this->input->post('insured_2_ped');
    $underwriter_2_ped = $this->input->post('underwriter_2_ped');
    $member_table_id_2 = $this->input->post('member_table_id_2');

    $insured_3_name = $this->input->post('insured_3_name');
    $insured_3_gender = $this->input->post('insured_3_gender');
    $insured_3_dob = $this->input->post('insured_3_dob');
    $insured_3_relation = $this->input->post('insured_3_relation');
    $insured_3_feet = $this->input->post('insured_3_feet');
    $insured_3_inch = $this->input->post('insured_3_inch');
    $insured_3_claim = $this->input->post('insured_3_claim');
    $insured_3_weight = $this->input->post('insured_3_weight');
    $insured_3_ped_details = $this->input->post('insured_3_ped');
    $underwriter_3_ped = $this->input->post('underwriter_3_ped');
    $member_table_id_3 = $this->input->post('member_table_id_3');

    $insured_4_name = $this->input->post('insured_4_name');
    $insured_4_gender = $this->input->post('insured_4_gender');
    $insured_4_dob = $this->input->post('insured_4_dob');
    $insured_4_relation = $this->input->post('insured_4_relation');
    $insured_4_feet = $this->input->post('insured_4_feet');
    $insured_4_inch = $this->input->post('insured_4_inch');
    $insured_4_claim = $this->input->post('insured_4_claim');
    $insured_4_weight = $this->input->post('insured_4_weight');
    $insured_4_ped_details = $this->input->post('insured_4_ped');
    $underwriter_4_ped = $this->input->post('underwriter_4_ped');
    $member_table_id_4 = $this->input->post('member_table_id_4');

    $insured_5_name = $this->input->post('insured_5_name');
    $insured_5_gender = $this->input->post('insured_5_gender');
    $insured_5_dob = $this->input->post('insured_5_dob');
    $insured_5_relation = $this->input->post('insured_5_relation');
    $insured_5_feet = $this->input->post('insured_5_feet');
    $insured_5_inch = $this->input->post('insured_5_inch');
    $insured_5_claim = $this->input->post('insured_5_claim');
    $insured_5_weight = $this->input->post('insured_5_weight');
    $insured_5_ped_details = $this->input->post('insured_5_ped');
    $underwriter_5_ped = $this->input->post('underwriter_5_ped');
    $member_table_id_5 = $this->input->post('member_table_id_5');

    $insured_6_name = $this->input->post('insured_6_name');
    $insured_6_gender = $this->input->post('insured_6_gender');
    $insured_6_dob = $this->input->post('insured_6_dob');
    $insured_6_relation = $this->input->post('insured_6_relation');
    $insured_6_feet = $this->input->post('insured_6_feet');
    $insured_6_inch = $this->input->post('insured_6_inch');
    $insured_6_claim = $this->input->post('insured_6_claim');
    $insured_6_weight = $this->input->post('insured_6_weight');
    $insured_6_ped_details = $this->input->post('insured_6_ped');
    $underwriter_6_ped = $this->input->post('underwriter_6_ped');
    $member_table_id_6 = $this->input->post('member_table_id_6');

    $insured_7_name = $this->input->post('insured_7_name');
    $insured_7_gender = $this->input->post('insured_7_gender');
    $insured_7_dob = $this->input->post('insured_7_dob');
    $insured_7_relation = $this->input->post('insured_7_relation');
    $insured_7_feet = $this->input->post('insured_7_feet');
    $insured_7_inch = $this->input->post('insured_7_inch');
    $insured_7_claim = $this->input->post('insured_7_claim');
    $insured_7_weight = $this->input->post('insured_7_weight');
    $insured_7_ped_details = $this->input->post('insured_7_ped');
    $underwriter_7_ped = $this->input->post('underwriter_7_ped');
    $member_table_id_7 = $this->input->post('member_table_id_7');

    $insured_8_name = $this->input->post('insured_8_name');
    $insured_8_gender = $this->input->post('insured_8_gender');
    $insured_8_dob = $this->input->post('insured_8_dob');
    $insured_8_relation = $this->input->post('insured_8_relation');
    $insured_8_feet = $this->input->post('insured_8_feet');
    $insured_8_inch = $this->input->post('insured_8_inch');
    $insured_8_claim = $this->input->post('insured_8_claim');
    $insured_8_weight = $this->input->post('insured_8_weight');
    $insured_8_ped_details = $this->input->post('insured_8_ped');
    $underwriter_8_ped = $this->input->post('underwriter_8_ped');
    $member_table_id_8 = $this->input->post('member_table_id_8');
    $policy_no = $this->input->post('policy_no');
    $address = $this->input->post('address');
    $model_short_name = $this->input->post('module_short_name');
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i A');





    date_default_timezone_set('Asia/Kolkata');
    if (!empty($disposition_name)) {
      $dis_name = $this->Form_model->list_common_where3('disposition', 'id', $disposition_name);
      $disp_name  = $dis_name[0]['disposition'];
    } else {
      $disp_name = 'NA';
    }
    $date = date('d-m-Y H:i A');
    $date1 = date('d/m/Y');
    $model_short_name = $this->input->post('module_short_name');
    $created_user_module = $this->input->post('id') . '-' . $model_short_name;
    $this->db->where('policy_no', $policy_no);
    $query = $this->db->get('form');

    if ($model_short_name == 'underwriter_verifier') {

      $updatedata = array(
        'address' => $address,
      );
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata);
    }
    if ($model_short_name == 'sale_closure') {

      $updatedata_form['proposer_name'] = $proposer_name;
      $updatedata_form['port_end_date'] = $port_end_date;
      $updatedata_form['policy_no'] = $policy_no;
      $updatedata_form['portability'] = $portability;
      $updatedata_form['medical'] = $medical;
      $updatedata_form['insured_1_ped'] = $insured_1_ped;
      $updatedata_form['discount'] = $discount;
      $updatedata_form['company_name'] = $company_name;
      $updatedata_form['date_of_closure'] = $date_of_closure;
      $updatedata_form['cover_type'] = $cover_type;
      $updatedata_form['payment_tenure'] = $payment_tenure;
      $updatedata_form['insured_2_ped'] = $insured_2_ped;
      $updatedata_form['alternate_no'] = $alternate_no;
      $updatedata_form['product_name'] = $product_name;
      $updatedata_form['sum_assured_1'] = $sum_assured_1;
      $updatedata_form['coverage_type'] = $coverage_type;
      $updatedata_form['data_source'] = $data_source;
      $updatedata_form['insured_3_ped'] = $insured_3_ped;
      $updatedata_form['tl'] = $tl;
      $updatedata_form['gross_premium'] = $gross_premium;
      $updatedata_form['policy_type'] = $policy_type;
      $updatedata_form['dob'] = $dob;
      $updatedata_form['zone'] = $zone;
      $updatedata_form['manager'] = $manager;
      $updatedata_form['agent'] = $agent;
      $updatedata_form['insured_4_ped'] = $insured_4_ped;
      $updatedata_form['net_premium'] = $net_premium;
      $updatedata_form['portability_duration'] = $portability_duration;
      $updatedata_form['customer_city'] = $customer_city;
      $updatedata_form['payment_mode'] = $payment_mode;
      $updatedata_form['email'] = $email;
      $updatedata_form['contact'] = $contact;
      $updatedata_form['disposition'] = $disposition_name;
      $updatedata_form['updated_by_user_module'] = $model_short_name;

      $updatedata_form['remark_by_user_module'] = $created_user_module;
      $updatedata_form['disposition_action'] = $disp_name;
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata_form);
      // echo "hi";exit;
      date_default_timezone_set('Asia/Kolkata');
      $updated_time = date('d-m-Y H:i A');

      if (!empty($member_table_id_1)) {

        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_1_name,
          'member_gender' => $insured_1_gender,
          'member_dob' => $insured_1_dob,
          'member_relation' => $insured_1_relation,
          'member_weight' =>  $insured_1_weight,
          'any_claim' => $insured_1_claim,
          'member_height_feet' => $insured_1_feet,
          'member_height_inch' => $insured_1_inch,
          'insured_pd_details' => $insured_1_ped_details,
          'underwriter_ped' => $underwriter_1_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_1);
        $insertUser = $this->db->update('add_member', $updatedata);
      }
      if (!empty($member_table_id_2)) {

        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_2_name,
          'member_gender' => $insured_2_gender,
          'member_dob' => $insured_2_dob,
          'member_relation' => $insured_2_relation,
          'member_weight' =>  $insured_2_weight,
          'any_claim' => $insured_2_claim,
          'member_height_feet' => $insured_2_feet,
          'member_height_inch' => $insured_2_inch,
          'insured_pd_details' => $insured_2_ped_details,
          'underwriter_ped' => $underwriter_2_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_2);
        $insertUser = $this->db->update('add_member', $updatedata);
      }

      if (!empty($member_table_id_3)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_3_name,
          'member_gender' => $insured_3_gender,
          'member_dob' => $insured_3_dob,
          'member_relation' => $insured_3_relation,
          'member_weight' =>  $insured_3_weight,
          'any_claim' => $insured_3_claim,
          'member_height_feet' => $insured_3_feet,
          'member_height_inch' => $insured_3_inch,
          'insured_pd_details' => $insured_3_ped_details,
          'underwriter_ped' => $underwriter_3_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_3);
        $insertUser = $this->db->update('add_member', $updatedata);
      }
      if (!empty($member_table_id_4)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_4_name,
          'member_gender' => $insured_4_gender,
          'member_dob' => $insured_4_dob,
          'member_relation' => $insured_4_relation,
          'member_weight' =>  $insured_4_weight,
          'any_claim' => $insured_4_claim,
          'member_height_feet' => $insured_4_feet,
          'member_height_inch' => $insured_4_inch,
          'insured_pd_details' => $insured_4_ped_details,
          'underwriter_ped' => $underwriter_4_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_4);
        $insertUser = $this->db->update('add_member', $updatedata);
      }

      if (!empty($member_table_id_5)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_5_name,
          'member_gender' => $insured_5_gender,
          'member_dob' => $insured_5_dob,
          'member_relation' => $insured_5_relation,
          'member_weight' =>  $insured_5_weight,
          'any_claim' => $insured_5_claim,
          'member_height_feet' => $insured_5_feet,
          'member_height_inch' => $insured_5_inch,
          'insured_pd_details' => $insured_5_ped_details,
          'underwriter_ped' => $underwriter_5_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_5);
        $insertUser = $this->db->update('add_member', $updatedata);
      }

      if (!empty($member_table_id_6)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_6_name,
          'member_gender' => $insured_6_gender,
          'member_dob' => $insured_6_dob,
          'member_relation' => $insured_6_relation,
          'member_weight' =>  $insured_6_weight,
          'any_claim' => $insured_6_claim,
          'member_height_feet' => $insured_6_feet,
          'member_height_inch' => $insured_6_inch,
          'insured_pd_details' => $insured_6_ped_details,
          'underwriter_ped' => $underwriter_6_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_6);
        $insertUser = $this->db->update('add_member', $updatedata);
      }

      if (!empty($member_table_id_7)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_7_name,
          'member_gender' => $insured_7_gender,
          'member_dob' => $insured_7_dob,
          'member_relation' => $insured_7_relation,
          'member_weight' =>  $insured_7_weight,
          'any_claim' => $insured_7_claim,
          'member_height_feet' => $insured_7_feet,
          'member_height_inch' => $insured_7_inch,
          'insured_pd_details' => $insured_7_ped_details,
          'underwriter_ped' => $underwriter_7_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_7);
        $insertUser = $this->db->update('add_member', $updatedata);
      }
      if (!empty($member_table_id_8)) {
        $updatedata = array(

          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $cover_type,
          'member_name' => $insured_8_name,
          'member_gender' => $insured_8_gender,
          'member_dob' => $insured_8_dob,
          'member_relation' => $insured_8_relation,
          'member_weight' =>  $insured_8_weight,
          'any_claim' => $insured_8_claim,
          'member_height_feet' => $insured_8_feet,
          'member_height_inch' => $insured_8_inch,
          'insured_pd_details' => $insured_8_ped_details,
          'underwriter_ped' => $underwriter_8_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_8);
        $insertUser = $this->db->update('add_member', $updatedata);
      }

    }


    if ($model_short_name != 'services' && $model_short_name != 'sale_closure') {

      $updatedata = array(
        'proposer_name' => $proposer_name,
        'port_end_date' => $port_end_date,
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

        'disposition' => $disposition_name,
        'updated_by_user_module' => $model_short_name,
        'remark' => $remark,
        'remark_by_user_module' => $created_user_module,
        'disposition_action' => $disp_name,


      );


      if (!empty($policy_start_date) && !empty($policy_end_date) && !empty($policy_issue_date)) {
        $updatedata['policy_start_date'] = $policy_start_date;
        $updatedata['policy_end_date'] = $policy_end_date;
        $updatedata['expiry_date'] = $policy_end_date;
        $updatedata['policy_issue_date'] = $policy_issue_date;
        $updatedata['policy_source'] = $policy_source;
      }
      if ($model_short_name == 'operations') {

        $updatedata['renewal_premium'] = $renewal_primium;
        $updatedata['counted_premium'] = $counted_premium;
        $updatedata['rider'] = $rider;
        $updatedata['agent'] = $agent;
        $updatedata['login'] = $login;
        $updatedata['contact'] = $contact;
        $updatedata['alternate_no'] = $alternate_no;
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $updatedata['updated_at'] = $date;
      }

      $insertUser = $this->db->where('id', $this->input->post('id'));


      $insertUser = $this->db->update('form', $updatedata);
    }

    $model_short_name = $this->input->post('module_short_name');
    $created_user_module = $this->input->post('id') . '-' . $model_short_name;
	if($model_short_name != 'sale_closure'){
    if (!empty($_FILES['doc_image']['name'][0])) {

      for ($i = 0; $i < count($_FILES['doc_image']['name']); $i++) {
        $docs_image = $_FILES['doc_image']['name'][$i];
        $path_parts = pathinfo($_FILES['doc_image']['name'][$i]);
        $image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
        $imgname = $image_path;

        $source =  $_FILES['doc_image']['tmp_name'][$i];
        $originalpath  = "assets/upload/documents/" . $docs_image;

        move_uploaded_file($source, $originalpath);

        $updatedata1 = array(
          'policy_no' => $policy_no,
          'module_name' => $model_short_name,
          'user_id' =>  $id,
          'docs_name' => $label[$i],
          'sale_docs' => $docs_image,
          'remark' => $remark,
          'disposition' => $disposition_name,
          'done_by_module' => $model_short_name,
          'form_id' => $this->input->post('id'),
          'created_by_user_module' => $created_user_module,
        );


        $insertUser =  $this->db->insert('sale_docs', $updatedata1);

        if ($model_short_name == 'underwriter_verifier') {
          $model_name = 'Underwriter';
        } else if ($model_short_name == 'operations') {
          $model_name = 'Operation';
        } else if ($model_short_name == 'services') {
          $model_name = 'Services';
        } else if ($model_short_name == 'renewals') {
          $model_name = 'Renewal';
        }

        $dis_name = $this->Form_model->list_common_where3('disposition', 'id', $disposition_name);
        $disp_name  = $dis_name[0]['disposition'];
        $msg = $proposer_name . ' is disposed by ' . $model_name .  ' with ' .  $disp_name;
        $updatedata1_notification = array(
          'created_by_id' => $id,
          'created_by_module' => $model_short_name,
          'msg' =>  $msg,
          'remark' => $remark,
          'disposition' => $disp_name
        );
        $insertUser =  $this->db->insert('notification', $updatedata1_notification);

        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $date_update['updated_at'] = $date;
        $updatedata1 = $this->db->where('id', $this->input->post('id'));
        $updatedata1 = $this->db->update('form', $date_update);
      }
    } else {
      $updatedata1 = array(
        'policy_no' => $policy_no,
        'module_name' => $model_short_name,
        'user_id' =>  $id,
        'remark' => $remark,
        'disposition' => $disposition_name,
        'done_by_module' => $model_short_name,
        'form_id' => $this->input->post('id'),
        'created_by_user_module' => $created_user_module,
      );
      $insertUser =  $this->db->insert('sale_docs', $updatedata1);

      if ($model_short_name == 'underwriter_verifier') {
        $model_name = 'Underwriter';
      } else if ($model_short_name == 'operations') {
        $model_name = 'Operation';
      } else if ($model_short_name == 'services') {
        $model_name = 'Services';
      } else if ($model_short_name == 'renewals') {
        $model_name = 'Renewal';
      }
      $dis_name = $this->Form_model->list_common_where3('disposition', 'id', $disposition_name);
      $disp_name  = $dis_name[0]['disposition'];
      $msg = $proposer_name . ' is disposed by ' . $model_name .  ' with ' .  $disp_name;
      $updatedata1_notification = array(
        'created_by_id' => $id,
        'created_by_module' => $model_short_name,
        'msg' =>  $msg,
        'remark' => $remark,
        'disposition' => $disp_name
      );
      $insertUser =  $this->db->insert('notification', $updatedata1_notification);

      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $date_update['updated_at'] = $date;
      $updatedata1 = $this->db->where('id', $this->input->post('id'));
      $updatedata1 = $this->db->update('form', $date_update);
    }
    }




    if (!empty($disposition_name)) {
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      $disposition_condition = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'id', $disposition_name);
      $disposition_action = $disposition_condition[0]['desposition_condition'] ?? '';
      $model_short_name = $this->input->post('module_short_name');
      $created_user_module = $id . '-' . $model_short_name;
      $remark_user_module = $id . '-' . $model_short_name;
      $insertData9 = array(
        'form_id' => $this->input->post('id'),
        'user_id' => $id,
        'disposition' => $disposition_name,
        'disposition_action' => $disposition_action,
        'updated_by_user_module' => $created_user_module,
        'remark' => $remark,
        'done_by_module' => $model_short_name,
        'remark_by_user_module' => $remark_user_module,
      );

      $updatedata101 = array(
        'disposition' => $disposition_name,
        'updated_by_user_module' => $model_short_name,
        'remark' => $remark,
        'remark_by_user_module' => $created_user_module,
        'disposition_action' => $disp_name,
        'alt_no_2' => $this->input->post('alt_no_2')
      );

      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $updatedata101['updated_at'] = $date;
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata101);
    }
    // call reminder
    if (!empty($reminder_date) && !empty($reminder_remark)) {
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      date_default_timezone_set('Asia/Kolkata');
      $current_date = date('Y-m-d H:i');
      $three_month_date =  date('Y-m-d H:i', strtotime('-10 min', strtotime($current_date)));
      $startdate = $three_month_date;
      $model_short_name = $this->input->post('module_short_name');
      $remark_user_module = $id . '-' . $model_short_name;
      $insertData10 = array(
        'form_id' => $this->input->post('id'),
        'user_id' => $id,
        'policy_no' => $policy_no,
        '10_min_before' => $startdate,
        'module_name' => $model_short_name,
        'call_time' => $reminder_date,
        'call_remark' => $reminder_remark,
        'reminder_by_user_module' => $remark_user_module,
      );
      $insertUser =  $this->db->insert('call_reminder', $insertData10);
      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $updatedata1001['updated_at'] = $date;
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata1001);
    }

    if (!empty($disposition_name)) {
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      $disposition_condition = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'id', $disposition_name);
      $disposition_action = $disposition_condition[0]['desposition_condition'];
      $model_short_name = $this->input->post('module_short_name');
      $pending_op_sub_disp = '';
      if (!empty($this->input->post('pending_op_sub_disp'))) {
        $pending_op_sub_disp = $this->input->post('pending_op_sub_disp');
      }
      if (!empty($this->input->post('cancell_op_sub_disp'))) {
        $pending_op_sub_disp = $this->input->post('cancell_op_sub_disp');
      }
      if (!empty($this->input->post('sub_disposition_name'))) {
        $pending_op_sub_disp = $this->input->post('sub_disposition_name');
      }
      if (!empty($this->input->post('sub_disposition_not_conn'))) {
        $pending_op_sub_disp = $this->input->post('sub_disposition_not_conn');
      }
      $created_user_module = $id . '-' . $model_short_name;
      $remark_user_module = $id . '-' . $model_short_name;
      $insertData = array(
        'form_id' => $this->input->post('id'),
        'user_id' => $id,
        'disposition' => $disposition_name,
        'sub_disposition' => $pending_op_sub_disp,
        'disposition_action' => $disposition_action,
        'updated_by_user_module' => $created_user_module,
        'remark' => $remark,
        'done_by_module' => $model_short_name,
        'remark_by_user_module' => $remark_user_module,
      );
      $insertUser =  $this->db->insert('form_disposition_remark', $insertData);
      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $updatedata1002['updated_at'] = $date;
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata1002);
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
      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $updatedata1003['updated_at'] = $date;
      $insertUser = $this->db->where('id', $this->input->post('id'));
      $insertUser = $this->db->update('form', $updatedata1003);
    }

    if (!empty($sel_member) && !empty($member_add_details)) {
      $disposition_condition = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'id', $disposition_name);
      $disposition_action = $disposition_condition[0]['desposition_condition'];
      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      $insertData11 = array(
        'form_id' => $this->input->post('id'),
        'user_id' => $id,
        'policy_no' => $policy_no,
        'disposition_id' => $disposition_name,

        'disposition_action' => $disposition_action,
        'member_type' => $sel_member,
        'member_details' => $member_add_details,
        'remark' => $remark,
        'sub_disposition' => $sub_disposition_name

      );
      $insertUser =  $this->db->insert('add_member', $insertData11);
    }


    if (!empty($insured_pd) && !empty($add_insured_pd_details)) {

      $disposition_condition = $this->underwriter_model->fetch_sidebar_group_id('disposition', 'id', $disposition_name);
      $disposition_action = $disposition_condition[0]['desposition_condition'];

      $sess = $this->session->userdata('pmsadmin');
      $name = $sess['name'];
      $role = $sess['role'];
      $id = $sess['id'];
      if ($insured_pd == 'insured1') {
        $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
        $insured = $disposition_condition[0]['insured_1_ped'];
        $updatedata2['insured_1_ped'] = $insured . ' ' . $add_insured_pd_details . ' ( Added On ' . $date1 . ' ) ';
        $updatedata2['updated_at'] = $date;
        $insertUser1 = $this->db->where('id', $this->input->post('id'));
        $insertUser1 = $this->db->update('form', $updatedata2);
      }

      if ($insured_pd == 'insured2') {

        $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
        $insured = $disposition_condition[0]['insured_2_ped'];

        $updatedata3['insured_2_ped'] = $insured . ' ' . $add_insured_pd_details . ' ( Added On ' . $date1 . ' ) ';
        $updatedata3['cover_type'] = $cover_type;
        $updatedata3['updated_at'] = $date;
        $insertUser2 = $this->db->where('id', $this->input->post('id'));
        $insertUser2 = $this->db->update('form', $updatedata3);
      }
      if ($insured_pd == 'insured3') {
        $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
        $insured = $disposition_condition[0]['insured_3_ped'];
        $updatedata4['insured_3_ped'] = $insured . ' ' . $add_insured_pd_details . ' ( Added On ' . $date1 . ' ) ';
        $updatedata4['cover_type'] = $cover_type;
        $updatedata4['updated_at'] = $date;
        $insertUser = $this->db->where('id', $this->input->post('id'));
        $insertUser = $this->db->update('form', $updatedata4);
      }
      if ($insured_pd == 'insured4') {
        $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
        $insured = $disposition_condition[0]['insured_4_ped'];
        $updatedata5['insured_4_ped'] = $insured . ' ' . $add_insured_pd_details . ' ( Added On ' . $date1 . ' ) ';
        $updatedata5['cover_type'] = $cover_type;
        $updatedata5['updated_at'] = $date;
        $insertUser = $this->db->where('id', $this->input->post('id'));
        $insertUser = $this->db->update('form', $updatedata5);
      }
      if ($insured_pd == 'insured5') {
        $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
        $insured = $disposition_condition[0]['insured_5_ped'];
        $updatedata6['insured_5_ped'] = $insured . ' ' . $add_insured_pd_details . '( Added On ' . $date1 . ' ) ';
        $updatedata6['cover_type'] = $cover_type;
        $updatedata6['updated_at'] = $date;
        $insertUser = $this->db->where('id', $this->input->post('id'));
        $insertUser = $this->db->update('form', $updatedata6);
      }

      $insured_details = $insured . ' ' . $add_insured_pd_details . '( Added On ' . $date1 . ' ) ';
      $insertData12 = array(
        'form_id' => $this->input->post('id'),
        'user_id' => $id,
        'policy_no' => $policy_no,
        'disposition_id' => $disposition_name,

        'disposition_action' => $disposition_action,
        'insured_type' => $insured_pd,
        'insured_details' => $insured_details,
        'insured_prev_details' => $insured,
        'remark' => $remark,
        'sub_disposition' => $sub_disposition_name

      );

      $insertUser =  $this->db->insert('add_insured_ped_details', $insertData12);
    }
    if (!empty($new_policy_number)) {
      $disposition_condition = $this->Form_model->fetch_insured_details('form', 'id', $this->input->post('id'));
      $expiry_date1 = $disposition_condition[0]['expiry_date'];
      date_default_timezone_set('Asia/Kolkata');
      $renewal_date = date('Y-m-d');
      if ($renewal_date > $expiry_date1) {

        $new_expiry_date =  date('Y-m-d', strtotime('+' . $new_payment_tenure, strtotime($renewal_date)));
      } else {
        $new_expiry_date =  date('Y-m-d', strtotime('+' . $new_payment_tenure, strtotime($expiry_date1)));
      }

      if ($sub_disposition_name == '') {
        $sub_disposition_name = '';
      }
      $subdesp = array(

        'New Policy' => $new_policy_number,

        'Proposer Date Of Birth' => $proposer_dob,

        'New Sum Assured' => $new_sum_assured_1,

        'Net Premium' => $new_net_premium,

        'Upselling' => $upselling,

        'Alternate Number' => $alternate_number,
        'New Payment Mode' => $new_payment_mode,
        'New Payment Tenure' => $new_payment_tenure,
        'New Covergae Type' => $new_coverage_type,
        'New Gross Premium' => $new_gross_premium,
        'EMI' => $emi,
        'New Discount' => $discount_new,
      );

      $json_data = json_encode($subdesp);

      $updatedata_renewal = array(

        'form_id' => $this->input->post('id'),
        'policy_no' => $policy_no,
        'desposition_id' => $disposition_name,


        'sub_desposition_name' => $sub_disposition_name,
        'remark' => $json_data,
        'module' => $model_short_name,

      );

      $insertUser =  $this->db->insert('sub_desposition', $updatedata_renewal);
      $updatedata = array(
        'policy_no' => $new_policy_number,
        'discount' => $discount_new,
        'payment_tenure' => $new_payment_tenure,
        'alternate_no' => $alternate_number,
        'coverage_type' => $new_coverage_type,
        'gross_premium' => $new_gross_premium,
        'dob' => $proposer_dob,
        'net_premium' => $new_net_premium,
        'payment_mode' => $new_payment_mode,
        'new_policy_after_renewal' => $policy_no,
        'expiry_date' => $new_expiry_date,


      );
      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i A');
      $updatedata['updated_at'] = $date;

      $insertUser = $this->db->where('id', $this->input->post('id'));


      $insertUser = $this->db->update('form', $updatedata);
    }



    if (!empty($send_sms_type)) {
      $updatedata_renewal = array(

        'form_id' => $this->input->post('id'),
        'policy_no' => $policy_no,
        'desposition_id' => $disposition_name,
        'remark' => $remark,

        'sub_desposition_name' => $send_sms_type,

        'module' => $model_short_name,

      );
      $insertUser =  $this->db->insert('sub_desposition', $updatedata_renewal);
    }
    if (!empty($not_renewed_sub)) {
      $new_company_name = $this->input->post('new_company_name');
      if (!empty($new_company_name)) {
        $subdesp_not_renewed = array(

          'Company Name (Not Renewed)' => $new_company_name,
          'Not Renewed Remark' => $remark,
        );
        $json_data = json_encode($subdesp_not_renewed);
        $updatedata_renewal = array(

          'form_id' => $this->input->post('id'),
          'policy_no' => $policy_no,
          'desposition_id' => $disposition_name,


          'sub_desposition_name' => $not_renewed_sub,
          'remark' => $json_data,
          'module' => $model_short_name,

        );
        $insertUser =  $this->db->insert('sub_desposition', $updatedata_renewal);
      } else {
        $updatedata_renewal = array(

          'form_id' => $this->input->post('id'),
          'policy_no' => $policy_no,
          'desposition_id' => $disposition_name,
          'remark' => $remark,

          'sub_desposition_name' => $not_renewed_sub,

          'module' => $model_short_name,

        );
        $insertUser =  $this->db->insert('sub_desposition', $updatedata_renewal);
      }
    }
    if (!empty($company_name_2)) {
      $field_port_in = array(

        'Company Name (PORT IN)' => $company_name_2,
        'Port IN Remark' => $remark,
        'Gross Premium' => $new_gross_premium_port_in,
        'Date of PORT IN' => $date_of_portIN
      );
      $json_data = json_encode($field_port_in);
      $updatedata_renewal = array(

        'form_id' => $this->input->post('id'),
        'policy_no' => $policy_no,
        'desposition_id' => $disposition_name,
        'remark' => $json_data,
        'module' => $model_short_name,

      );
      $insertUser =  $this->db->insert('sub_desposition', $updatedata_renewal);
    }

    if (!empty($coverage_type)) {
      date_default_timezone_set('Asia/Kolkata');
      $updated_time = date('d-m-Y H:i A');

      if (!empty($member_table_id_1)) {

        if (!empty($disposition_name)) {
          $disposition_name = $disposition_name;
        }
        if (!empty($sub_disposition_name)) {
          $sub_disposition_name = $sub_disposition_name;
        }
        if (!empty($disposition_action)) {
          $disposition_action = $disposition_action;
        }

        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_1_name,
          'member_gender' => $insured_1_gender,
          'member_dob' => $insured_1_dob,
          'member_relation' => $insured_1_relation,
          'member_weight' =>  $insured_1_weight,
          'any_claim' => $insured_1_claim,
          'member_height_feet' => $insured_1_feet,
          'member_height_inch' => $insured_1_inch,
          'insured_pd_details' => $insured_1_ped_details,
          'underwriter_ped' => $underwriter_1_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_1);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_1_name)) {

        if (!empty($disposition_name)) {
          $disposition_name = $disposition_name;
        }
        if (!empty($sub_disposition_name)) {
          $sub_disposition_name = $sub_disposition_name;
        }
        if (!empty($disposition_action)) {
          $disposition_action = $disposition_action;
        }
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_1_name,
          'member_gender' => $insured_1_gender,
          'member_dob' => $insured_1_dob,
          'member_relation' => $insured_1_relation,
          'member_weight' =>  $insured_1_weight,
          'any_claim' => $insured_1_claim,
          'member_height_feet' => $insured_1_feet,
          'member_height_inch' => $insured_1_inch,
          'insured_pd_details' => $insured_1_ped_details,
          'underwriter_ped' => $underwriter_1_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData2['coverage_type'] = $coverage_type;
        $insertData2['updated_at'] = $updated_time;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData2);
      }

      if (!empty($member_table_id_2)) {
        if (!empty($disposition_name)) {
          $disposition_name = $disposition_name;
        }
        if (!empty($sub_disposition_name)) {
          $sub_disposition_name = $sub_disposition_name;
        }
        if (!empty($disposition_action)) {
          $disposition_action = $disposition_action;
        }
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_2_name,
          'member_gender' => $insured_2_gender,
          'member_dob' => $insured_2_dob,
          'member_relation' => $insured_2_relation,
          'member_weight' =>  $insured_2_weight,
          'any_claim' => $insured_2_claim,
          'member_height_feet' => $insured_2_feet,
          'member_height_inch' => $insured_2_inch,
          'insured_pd_details' => $insured_2_ped_details,
          'underwriter_ped' => $underwriter_2_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_2);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_2_name)) {
        if (!empty($disposition_name)) {
          $disposition_name = $disposition_name;
        }
        if (!empty($sub_disposition_name)) {
          $sub_disposition_name = $sub_disposition_name;
        }
        if (!empty($disposition_action)) {
          $disposition_action = $disposition_action;
        }
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_2_name,
          'member_gender' => $insured_2_gender,
          'member_dob' => $insured_2_dob,
          'member_relation' => $insured_2_relation,
          'member_weight' =>  $insured_2_weight,
          'any_claim' => $insured_2_claim,
          'member_height_feet' => $insured_2_feet,
          'member_height_inch' => $insured_2_inch,
          'insured_pd_details' => $insured_2_ped_details,
          'underwriter_ped' => $underwriter_2_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData300['coverage_type'] = $coverage_type;
        $insertData300['updated_at'] = $updated_time;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData300);
      }

      if (!empty($member_table_id_3)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_3_name,
          'member_gender' => $insured_3_gender,
          'member_dob' => $insured_3_dob,
          'member_relation' => $insured_3_relation,
          'member_weight' =>  $insured_3_weight,
          'any_claim' => $insured_3_claim,
          'member_height_feet' => $insured_3_feet,
          'member_height_inch' => $insured_3_inch,
          'insured_pd_details' => $insured_3_ped_details,
          'underwriter_ped' => $underwriter_3_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_3);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_3_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_3_name,
          'member_gender' => $insured_3_gender,
          'member_dob' => $insured_3_dob,
          'member_relation' => $insured_3_relation,
          'member_weight' =>  $insured_3_weight,
          'any_claim' => $insured_3_claim,
          'member_height_feet' => $insured_3_feet,
          'member_height_inch' => $insured_3_inch,
          'insured_pd_details' => $insured_3_ped_details,
          'underwriter_ped' => $underwriter_3_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData301['coverage_type'] = $coverage_type;
        $insertData301['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData301);
      }

      if (!empty($member_table_id_4)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_4_name,
          'member_gender' => $insured_4_gender,
          'member_dob' => $insured_4_dob,
          'member_relation' => $insured_4_relation,
          'member_weight' =>  $insured_4_weight,
          'any_claim' => $insured_4_claim,
          'member_height_feet' => $insured_4_feet,
          'member_height_inch' => $insured_4_inch,
          'insured_pd_details' => $insured_4_ped_details,
          'underwriter_ped' => $underwriter_4_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_4);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_4_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_4_name,
          'member_gender' => $insured_4_gender,
          'member_dob' => $insured_4_dob,
          'member_relation' => $insured_4_relation,
          'member_weight' =>  $insured_4_weight,
          'any_claim' => $insured_4_claim,
          'member_height_feet' => $insured_4_feet,
          'member_height_inch' => $insured_4_inch,
          'insured_pd_details' => $insured_4_ped_details,
          'underwriter_ped' => $underwriter_4_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData302['coverage_type'] = $coverage_type;
        $insertData302['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData302);
      }

      if (!empty($member_table_id_5)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_5_name,
          'member_gender' => $insured_5_gender,
          'member_dob' => $insured_5_dob,
          'member_relation' => $insured_5_relation,
          'member_weight' =>  $insured_5_weight,
          'any_claim' => $insured_5_claim,
          'member_height_feet' => $insured_5_feet,
          'member_height_inch' => $insured_5_inch,
          'insured_pd_details' => $insured_5_ped_details,
          'underwriter_ped' => $underwriter_5_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_5);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_5_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_5_name,
          'member_gender' => $insured_5_gender,
          'member_dob' => $insured_5_dob,
          'member_relation' => $insured_5_relation,
          'member_weight' =>  $insured_5_weight,
          'any_claim' => $insured_5_claim,
          'member_height_feet' => $insured_5_feet,
          'member_height_inch' => $insured_5_inch,
          'insured_pd_details' => $insured_5_ped_details,
          'underwriter_ped' => $underwriter_5_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData303['coverage_type'] = $coverage_type;
        $insertData303['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData303);
      }

      if (!empty($member_table_id_6) && !empty($insured_6_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_6_name,
          'member_gender' => $insured_6_gender,
          'member_dob' => $insured_6_dob,
          'member_relation' => $insured_6_relation,
          'member_weight' =>  $insured_6_weight,
          'any_claim' => $insured_6_claim,
          'member_height_feet' => $insured_6_feet,
          'member_height_inch' => $insured_6_inch,
          'insured_pd_details' => $insured_6_ped_details,
          'underwriter_ped' => $underwriter_6_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_6);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_6_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_6_name,
          'member_gender' => $insured_6_gender,
          'member_dob' => $insured_6_dob,
          'member_relation' => $insured_6_relation,
          'member_weight' =>  $insured_6_weight,
          'any_claim' => $insured_6_claim,
          'member_height_feet' => $insured_6_feet,
          'member_height_inch' => $insured_6_inch,
          'insured_pd_details' => $insured_6_ped_details,
          'underwriter_ped' => $underwriter_6_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData304['coverage_type'] = $coverage_type;
        $insertData304['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData304);
      }
      $sub_disposition_name = "";
      if (($member_table_id_7 == '') && !empty($insured_7_relation)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_7_name,
          'member_gender' => $insured_7_gender,
          'member_dob' => $insured_7_dob,
          'member_relation' => $insured_7_relation,
          'member_weight' =>  $insured_7_weight,
          'any_claim' => $insured_7_claim,
          'member_height_feet' => $insured_7_feet,
          'member_height_inch' => $insured_7_inch,
          'insured_pd_details' => $insured_7_ped_details,
          'underwriter_ped' => $underwriter_7_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_7);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_7_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_7_name,
          'member_gender' => $insured_7_gender,
          'member_dob' => $insured_7_dob,
          'member_relation' => $insured_7_relation,
          'member_weight' =>  $insured_7_weight,
          'any_claim' => $insured_7_claim,
          'member_height_feet' => $insured_7_feet,
          'member_height_inch' => $insured_7_inch,
          'insured_pd_details' => $insured_7_ped_details,
          'underwriter_ped' => $underwriter_7_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData305['coverage_type'] = $coverage_type;
        $insertData305['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData305);
      }

      if (!empty($member_table_id_8) && !empty($insured_8_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_8_name,
          'member_gender' => $insured_8_gender,
          'member_dob' => $insured_8_dob,
          'member_relation' => $insured_8_relation,
          'member_weight' =>  $insured_8_weight,
          'any_claim' => $insured_8_claim,
          'member_height_feet' => $insured_8_feet,
          'member_height_inch' => $insured_8_inch,
          'insured_pd_details' => $insured_8_ped_details,
          'underwriter_ped' => $underwriter_8_ped,
          'updated_by_id' => $id,
          'updated_by_module' => $model_short_name,
          'updated_at' => $updated_time
        );
        $insertUser = $this->db->where('id', $member_table_id_8);
        $insertUser = $this->db->update('add_member', $insertData);
      } else if (!empty($insured_8_name)) {
        $insertData = array(
          'disposition_id' => $disposition_name,
          'disposition_action' => $disposition_action,
          'sub_disposition' => $sub_disposition_name,
          'user_id' => $id,
          'policy_no' => $policy_no,
          'form_id' => $form_id,
          'family_type' => $coverage_type,
          'member_name' => $insured_8_name,
          'member_gender' => $insured_8_gender,
          'member_dob' => $insured_8_dob,
          'member_relation' => $insured_8_relation,
          'member_weight' =>  $insured_8_weight,
          'any_claim' => $insured_8_claim,
          'member_height_feet' => $insured_8_feet,
          'member_height_inch' => $insured_8_inch,
          'insured_pd_details' => $insured_8_ped_details,
          'underwriter_ped' => $underwriter_8_ped,
        );
        $insertUser =  $this->db->insert('add_member', $insertData);
        $insertData306['coverage_type'] = $coverage_type;
        $insertData306['updated_at'] = $date;
        $insertUser = $this->db->where('id', $form_id);
        $insertUser = $this->db->update('form', $insertData306);
      }


      if ($insertUser) {
        echo json_encode(['inserted' => '1']);
      } else {
        echo json_encode(['inserted' => '0']);
      }
    }
  }


  public function update()
  {
    $id = $_REQUEST['id'];

    $update = array(
      'flag'  => '1'
    );

    $this->db->where('id', $id);
    $this->db->update('admin', $update);

    redirect($_SERVER['REQUEST_URI'], 'refresh');
  }


  public function updatedisable()
  {
    $id = $_REQUEST['id'];

    $update = array(
      'flag'  => '0'
    );

    $this->db->where('id', $id);
    $this->db->update('admin', $update);

    redirect($_SERVER['REQUEST_URI'], 'refresh');
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

  function import()
  {
    if (isset($_FILES["file"]["name"])) {
      $path = $_FILES["file"]["tmp_name"];
      $object = PHPExcel_IOFactory::load($path);
      foreach ($object->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
          $customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $data[] = array(
            'CustomerName'  => $customer_name,
            'Address'   => $address,
            'City'    => $city,
            'PostalCode'  => $postal_code,
            'Country'   => $country
          );
        }
      }
      //$this->excel_import_model->insert($data);
      echo 'Data Imported successfully';
    }
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

  public function changestatus()
  {
    $id = $this->input->post('id');
    $data['status'] = $this->input->post('status');
    $insertUser = $this->db->where('id', $id);
    $insertUser = $this->db->update('claim', $data);
    if ($insertUser) {
      echo json_encode(['done' => '1']);
    } else {
      echo json_encode(['done' => '0']);
    }
  }

  public function updateclaim()
  {
    $sess = $this->session->userdata('pmsadmin');
		$sess_id = $sess['id'];
    $claim_id = $this->input->post('claim_id');
    
    $insertData['policy_no'] =  $policy_number = $this->input->post('policy_number');
    $insertData['patient_name'] = $patient_name = $this->input->post('patient_name');
    $insertData['company_name'] = $company_name = $this->input->post('company_name');
    $insertData['claim_intimation_no'] = $claim_intimation_no = $this->input->post('claim_intimation_no');
    $insertData['reason_admit'] = $reason_admit = $this->input->post('reason_admit');
    $insertData['health_card'] = $health_card = $this->input->post('health_card');
	$form_id = $this->Form_model->list_common_where3('form', 'policy_no', $policy_number);
    $f_id = $form_id[0]['id'];
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
	$module_name = $this->input->post('module_name');
    $insertData['deduction_amt_details'] = $deduction_amt_details = $this->input->post('deduction_amt_details');
    $insertData['paid_on'] = $paid_on = $this->input->post('paid_on');
    $insertData['final_status'] = $final_status = $this->input->post('final_status');
    $insertData['deduction_details'] = $final_status = $this->input->post('deduction_details');
    $insertData['remarks'] = $remarks = $this->input->post('remarks');
    $image = $this->input->post('doc_image');
    $title = $this->input->post('doc_label');
  	
    
    $msg = $patient_name . ' is disposed by ' . $module_name;
    $updatedata1_notification = array(
      'created_by_id' => $sess_id,
      'created_by_module' => $module_name,
      'msg' =>  $msg,
      'disposition' =>$title[0]
    );
 
    $insertUser =  $this->db->insert('notification', $updatedata1_notification);
    $saved = $this->db->where('id', $claim_id);
    $saved = $this->db->update('claim', $insertData);
$created_user_module = $sess_id . '-' . $module_name;
    if (!empty($_FILES['doc_image']['name'])) {
      $title = $this->input->post('doc_label');
      $image = $this->input->post('doc_image');
      $sale_id = $this->input->post('sale_id');
      //$updatedata1['claim_id'] = $claim_id;
      for ($i = 0; $i < count($_FILES['doc_image']['name']); $i++) {
        if (!empty($_FILES['doc_image']['name'][$i])) {
          $path_parts = pathinfo($_FILES['doc_image']['name'][$i]);
          $image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
          $imgname = $image_path;

          $source =  $_FILES['doc_image']['tmp_name'][$i];
          $originalpath  = "assets/upload/documents/" . $imgname;

          move_uploaded_file($source, $originalpath);

          $updatedata1 = array(
			'module_name' => $module_name,
            'user_id' => $sess_id,
            'docs_name' => $title[$i],
            'sale_docs' => $imgname,
            'policy_no' => $policy_number,
            'form_id' => $f_id,
            'claim_id' => $claim_id,
            'created_by_user_module' => $created_user_module,


          );
		
          $saved = $this->db->where('id', $sale_id);
          $saved = $this->db->insert('sale_docs', $updatedata1);
        }
      }
    }
    if ($saved) {
      echo json_encode(['inserted' => '1']);
    } else {
      echo json_encode(['inserted' => '0']);
    }
  }

  public function get_policy_data_after_search()
  {
    $policy_no = $this->input->post('items');

    $data['claim_initiated_list'] = $this->Form_model->data_after_search_claim($policy_no);
    return $this->load->view('admin/form/get_policy_wise_data', $data);
  }

  public function show_member_details()
  {
    $form_id = $this->input->post('form_id');
    $member_details = $this->Form_model->list_common_where3('add_member', 'form_id', $form_id);
    $output = '<option value="0" selcted>Select</option>';
    foreach ($member_details as $value) {
      $output .= '<option value="' . $value['id'] . '">' . $value['member_name'] . '</option>';
    }

    $response = array('status' => true, 'output' => $output);

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }

  public function delete_member()
  {
    $id_for_dlt = $this->input->post('id_for_dlt');
    $form_id = $this->input->post('form_id');
    $data['flag'] = '2';
    $member_details = $this->Form_model->update_common('add_member', $data, 'id', $id_for_dlt);
    $count_member = $this->Form_model->count_member('add_member', 'form_id', $form_id);

    $data2['coverage_type'] = $count_member;
    $member_details = $this->Form_model->update_common('form', $data2, 'id', $form_id);

    $data1['family_type'] = $count_member;
    $member_details = $this->Form_model->update_common('add_member', $data1, 'form_id', $form_id);

    if ($member_details) {
      $response = array('status' => true);
    } else {
      $response = array('status' => false);
    }
    echo json_encode($response);
  }

  public function fetch_call_reminder()
  {

    $call_reminder = $this->Form_model->fetch_call_reminder_data('call_reminder');
    if (!empty($call_reminder)) {
      $time = $call_reminder->minute;
      if ($time <= 15) {
        $response = array('status' => true, 'data' => '<h5><span style="color:red;"> ' . $call_reminder->call_remark . ' </span> against <span style="color:green;"><a href="' . base_url() . 'form_listing/view_sale/' . $call_reminder->form_id . '"> ' . $call_reminder->policy_no . ' </a></span> on <span style="color:blue;"> ' . $call_reminder->call_time . ' </span></h5>', 'form_id' => $call_reminder->form_id);
      }
    } else {
      $response = array('status' => false, 'data' => 'No Record Found');
    }
    echo json_encode($response);
  }

  public function update_reminder_status()
  {
    $form_id = $this->input->post('form_id');
    $data2['reminder_flag'] = '1';
    $update_call_reminder = $this->Form_model->update_common('call_reminder', $data2, 'form_id', $form_id);
    if ($update_call_reminder) {
      $response = '1';
    } else {
      $response = '0';
    }
    echo json_encode($response);
  }
}
