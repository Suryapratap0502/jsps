<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactAccess extends MY_Controller
{


    public function __construct()

    {

        parent::__construct();

        $this->load->model('Contact_Access');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('email');
    }
    public function index()
    {

        if ($this->session->userdata('pmsadmin') == true) {
            $data['accessinfo'] = $this->Contact_Access->list_common_list();
            $data['accessadmin'] = $this->Contact_Access->list_common('admin');
            $data['admin'] = $this->Contact_Access->getuserlist();
            return $this->load->view('admin/contact_access', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
    public function add_useraccess()
    {

        $user_id = $this->input->post('user_id');
        $contact_access = $this->input->post('contact_access');
        if ($contact_access == '') {
            $contact_access = "0";
        }
        $alt_no_access = $this->input->post('alt_no_access');
        if ($alt_no_access == '') {
            $alt_no_access = "0";
        }
        $alt_no_2_access = $this->input->post('alt_no_2_access');
        if ($alt_no_2_access == '') {
            $alt_no_2_access = "0";
        }
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');
        $id = $this->input->post('id');
        $data['content'] = $this->Contact_Access->list_common_where3('contact_access', 'user_id', $user_id);
        if (!empty($data['content'])) {


            $updatedata = array(
                'user_id' => $user_id,
                'contact_access' => $contact_access,
                'alt_no_access' => $alt_no_access,
                'alt_no_2_access' => $alt_no_2_access,
                'updated_at' => $date
            );


            $insertupdate = $this->db->where('user_id', $user_id);
            $insertupdate = $this->db->update('contact_access', $updatedata);
            if ($insertupdate) {
                echo json_encode(['status' => '1', 'msg' => 'Data Updated']);
            } else {
                echo json_encode(['status' => '0', 'msg' => 'Something Wrong']);
            }
        } else {
            $insertData = array(
                'user_id' => $user_id,
                'contact_access' => $contact_access,
                'alt_no_access' => $alt_no_access,
                'alt_no_2_access' => $alt_no_2_access,
            );
            $insertupdate = $this->db->insert('contact_access', $insertData);
            if ($insertupdate) {
                echo json_encode(['code' => '200', 'msg' => 'Data Inserted']);
            } else {
                echo json_encode(['code' => '400', 'msg' => 'Something Wrong']);
            }
        }
      
    }
    public function delete($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'flag'  => '2'
        );
        $this->Contact_Access->delete('contact_access', $id, $data);
    }
    public function openeditmodel()
    {

        $id =  $this->input->post('id');
        $data['admin'] = $this->Contact_Access->getuserlist();
        $data['accessinfo'] = $this->Contact_Access->list_common('contact_access');
        $data['content'] = $this->Contact_Access->list_common_where3('contact_access', 'id', $id);

        $this->load->view('admin/contact_access_ajax', $data);
    }
    public function updateaccess()
    {
        $id = $this->input->post('id');
        $user_id = $this->input->post('user_id');
        $contact_access = $this->input->post('contact_access');
        if ($contact_access == '') {
            $contact_access = "0";
        }
        $alt_no_access = $this->input->post('alt_no_access');
        if ($alt_no_access == '') {
            $alt_no_access = "0";
        }
        $alt_no_2_access = $this->input->post('alt_no_2_access');
        if ($alt_no_2_access == '') {
            $alt_no_2_access = "0";
        }
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $updatedata = array(
            'user_id' => $user_id,
            'contact_access' => $contact_access,
            'alt_no_access' => $alt_no_access,
            'alt_no_2_access' => $alt_no_2_access,
            'updated_at' => $date
        );


        $insertUser = $this->db->where('id', $id);
        $insertUser = $this->db->update('contact_access', $updatedata);

        if ($insertUser) {
            echo json_encode(['inserted' => '1']);
        } else {
            echo json_encode(['inserted' => '0']);
        }
    }
    public function getdata()
    {
        $user_id = $this->input->post('user_id');

        $data['admin'] = $this->Contact_Access->getuserlist();
        $data['accessinfo'] = $this->Contact_Access->list_common('contact_access');
        $data['content'] = $this->Contact_Access->list_common_where3('contact_access', 'user_id', $user_id);


        $this->load->view('admin/edit_contact_access', $data);
    }
}
