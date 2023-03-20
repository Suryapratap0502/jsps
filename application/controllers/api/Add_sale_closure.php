<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add_sale_closure extends MY_Controller
{


    public function __construct()

    {

        parent::__construct();

        $this->load->model('underwriter_model');
        $this->load->model('filter_model');
        $this->load->model('Form_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('email');
    }
    public function index()
    {
        $request = json_decode(file_get_contents('php://input'), 1);
        $response = array();
		//PERSONAL INFORMATION
      	$details['log_id'] = $request['log_id'];
      	$details['cust_id'] = $request['cust_id'];
        $details['proposer_name'] = $request['proposer_name'];
        $details['dob'] = $request['dob'];
        $details['customer_city']   = $request['customer_city'];
        $details['email']   = $request['email'];
        $details['contact']   = $request['contact'];
        $details['alternate_no']   = $request['alternate_no'];
        $form_data =  $this->Form_model->check_api_data('form', $request['proposer_name'],$request['email'], $request['contact'],$request['log_id'],$request['cust_id']);

        if ($form_data == 0) {
            //POLICY DETAILS
            $details['policy_type']   = $request['policy_type'];
            $details['portability_duration']   = $request['portability_duration'];
            $portability = $this->Form_model->list_common_where3('company', 'name', $request['portability']);
            if (!empty($portability[0]['id'])) {
                $details['portability'] = $portability[0]['id'];
            } else {
                $response = array('status' => 'Check Company Name', 'code' => 400);
            }

            $details['port_end_date']   = $request['port_end_date'];
            $details['policy_no']   = $request['policy_no'];

            $company_name = $this->Form_model->list_common_where3('company', 'name', $request['company_name']);
            if (!empty($company_name[0]['id'])) {
                $details['company_name']   = $company_name[0]['id'];
            } else {
                $response = array('status' => 'Check Company Name', 'code' => 400);
            }

            $product_name = $this->Form_model->list_common_where3('products', 'product_name', $request['product_name']);
            if (!empty($product_name[0]['id'])) {
                $details['product_name']   =  $product_name[0]['id'];
            } else {
                $response = array('status' => 'Check Company Name', 'code' => 400);
            }

            $details['date_of_closure']   = $request['date_of_closure'];
            $details['sum_assured_1']   = $request['sum_assured_1'];
            $details['cover_type']   = $request['cover_type'];
            $details['coverage_type']   = $request['coverage_type'];
            $details['medical']   = $request['medical'];
            $details['data_source']   = $request['data_source'];
            $details['zone']   = $request['zone'];
            $details['agent'] = $request['agent'];

            //INSURED DETAILS
            $insured_data = $request['insured'];
            foreach ($insured_data as $val) {
                $data['member_name'] = $val['member_name'];
                $data['member_gender'] = $val['member_gender'];
                $data['member_dob'] = $val['member_dob'];
                $data['member_relation'] = $val['member_relation'];
                $data['member_height_feet'] = $val['member_height_feet'];
                $data['member_height_inch'] = $val['member_height_inch'];
                $data['member_weight'] = $val['member_weight'];
                $data['any_claim'] = $val['any_claim'];
                $data['underwriter_ped'] = $val['underwriter_ped'];
                $data['insured_pd_details'] = $val['insured_pd_details'];
                $result =  $this->db->insert('add_member', $data);
            }

            //PREMIUM DETAILS
            $details['gross_premium']   = $request['gross_premium'];
            $details['net_premium']   = $request['net_premium'];
            $details['payment_tenure']   = $request['payment_tenure'];
            $details['payment_mode']   = $request['payment_mode'];
            $details['discount']   = $request['discount'];
            $manager = $this->Form_model->list_common_where3('manager', 'name', $request['manager']);
            if (!empty($manager)) {
                $details['manager'] = $manager[0]['id'];
            } else {
                $response = array('status' => 'Check Manager Name', 'code' => 400);
            }

            $tl_name =  $this->Form_model->list_common_where3('team_leader', 'name', $request['tl']);
            if (!empty($tl_name[0]['id'])) {
                $details['tl']   = $tl_name[0]['id'];
            } else {
                $response = array('status' => 'Check Team Leader Name', 'code' => 400);
            }
            $details['flag']   = '0';

            $result =  $this->db->insert('form', $details);
            if (!empty($result)) {
                $response = array('status' => 'Data Inserted Successsfully', 'code' => 200);
            } else {
                $response = array('status' => 'Something went Wrong', 'code' => 400);
            }
        } else {

            $response = array('status' => 'Details Are Already Exist', 'code' => 400);
        }
        echo json_encode($response);
        exit;
    }
}
