<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UploadExcel extends MY_Controller
{


    public function __construct()

    {

        parent::__construct();
        $this->load->model('upload_excel_model');
    }


    public function index()
    {

        if ($this->session->userdata('pmsadmin') == true) {
			date_default_timezone_set('Asia/Kolkata');
        	$date = date('Y-m-d');
            $data['list'] = $this->upload_excel_model->list_common_where3('upload_renewal_excel','created_at',$date);
            return $this->load->view('admin/master/uploaded_excel_list', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }




    public function upload()
    {
        error_reporting(0);

        require_once APPPATH . "./third_party/PHPExcel.php";
        $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;

        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $flag = true;
            $i = 0;

            foreach ($allDataInSheet as $key => $value) {

                if ($key > 1) {
                    if (!empty($value['A'])) {
                        $inserdata['policy_no'] = $policy_no =  $value['A'];
                        $inserdata['renewal_year'] = $value['B'];
                        $inserdata['renewal_premium'] = $value['C'];
                      	$inserdata['policy_end_date'] = $value['D'];
                      
                      	
                        $check_policy_no = $this->upload_excel_model->check_policy('form', 'policy_no', $policy_no);
                      	$check_policy_no_upload_table = $this->upload_excel_model->check_policy('upload_renewal_excel', 'policy_no', $policy_no);
                        if ($check_policy_no > 0) {
                            $update_data = $this->db->where('policy_no', $policy_no);
                            $update_data = $this->db->update('form', $inserdata);
                            
                        }
                     
                      if($check_policy_no_upload_table > 0)
                      {
                      	$update_data = $this->db->where('policy_no', $policy_no);
                         $update_data = $this->db->update('upload_renewal_excel', $inserdata);
                      }
                      else {
                       $update_data = $this->db->insert('upload_renewal_excel', $inserdata);
                      }
                    }
                }

                $i++;
            }
          
          if($update_data)
          {
          echo json_encode(['inserted' => 1]);
          }
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                . '": ' . $e->getMessage());
        }
    }

    public function openeditmodel()
    {

        $id =  $this->input->post('id');
        $data['content'] = $this->upload_excel_model->list_common_where_edit('upload_renewal_excel', 'id', $id);
        $this->load->view('admin/master/upload_edit', $data);
    }

    public function update()
    {

        $id = $this->input->post('id');
        $data['policy_no'] = $policy_no = $this->input->post('policy_no');
        $data['renewal_year'] = $renewal_year = $this->input->post('renewal_year');
        $data['renewal_premium'] = $renewal_premium = $this->input->post('renewal_premium');
     	$data['policy_end_date'] = $renewal_premium = $this->input->post('policy_end_date');
        $check_policy_no = $this->upload_excel_model->check_policy('form', 'policy_no', $policy_no);

        if ($check_policy_no > 0) {
            $insertUser = $this->db->where('policy_no', $policy_no);
            $insertUser = $this->db->update('form', $data);
        }
        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('upload_renewal_excel', $data);
        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }
}
