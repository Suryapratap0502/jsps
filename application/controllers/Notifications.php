<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notifications extends MY_Controller
{


    public function __construct()

    {

        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Notification_model');
    }

    public function delete()
    {
        $id = $this->input->post("id");
        $data = array(
            'flag'  => '2'
        );
        $this->Notification_model->delete_notification('notification', $id, $data);
        redirect('notifications/list');
    }
    public function list()
    {

        if ($this->session->userdata('pmsadmin') == true) {

            $data['list'] = $this->Notification_model->masterData('notification');
            return $this->load->view('admin/notifications/list', $data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }
    public function update()
    {
        $id = $_REQUEST['id'];
        
            $update = array(
                'read_status'  => '1'
            );


        $this->db->where('id', $id);
        $this->db->update('notification', $update);
        redirect($_SERVER['REQUEST_URI'], 'refresh');
    }
}
