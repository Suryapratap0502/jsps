<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Disposition extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Company_model');
      	$this->load->model('Disposition_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('email');
	}
	

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['disposition'] = $this->Company_model->list_common_desposition('disposition');
			$data['module'] = $this->Company_model->list_common('sidebar_group');
        
			return $this->load->view('admin/disposition/list', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('company/login');
		}
	}


	public function adddisposition()
	{

		$dis_module = $this->input->post('dis_module');
		$add_disp = $this->input->post('add_disp');
		$dis_condition = $this->input->post('dis_condition');
      	$assign_to = $this->input->post('assign_to');
		
		$insertData = array(
			'module' => $dis_module,
			'disposition' => $add_disp,
			'desposition_condition' => $dis_condition,
          'assign_to' => $assign_to
			
		);


		$insertUser =  $this->db->insert('disposition', $insertData);
      if($insertUser)
				{
             		
					echo json_encode(['done'=>'1']);

				

					
				}
				else
				{
					echo json_encode(['done'=>'0']);

				}

	}


	public function deletesubadmin($id)
	{
		$id = $this->input->post("id");
		$data = array(
			'flag'  => '2'
		);
		$this->Disposition_model->deletesubadmin('disposition', $id, $data);
		redirect('disposition');
	}

	public function subadminedit()
	{

		$id =  $this->input->post('id');
		$data['content'] = $this->Disposition_model->subadmineditmodel('disposition', $id);
      	$data['module'] = $this->Disposition_model->list_common('sidebar_group');
		$this->load->view('admin/disposition/edit', $data);
	}

	public function updatesubadmi()
	{

		$id = $this->input->post('id');
      
		$updatedata['module'] = $this->input->post('dis_module');
		$updatedata['disposition'] = $this->input->post('add_disp');
		$updatedata['desposition_condition'] = $this->input->post('dis_condition');
		
		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('disposition', $updatedata);

		if ($insertUser) {
			echo json_encode(['inserted' => '1']);
		} else {
			echo json_encode(['inserted' => '0']);
		}
	}
	
  public function update()
    {
        $id = $_REQUEST['id'];
        
      	$update = array(
        'flag'  => '1'
        );

        $this->db->where('id',$id);
        $this->db->update('disposition',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        $id = $_REQUEST['id'];

      	$update = array(
        'flag'  => '0'
        );

        $this->db->where('id',$id);
        $this->db->update('disposition',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }

	
}
