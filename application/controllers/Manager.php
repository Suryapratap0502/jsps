<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('manager_model');
     
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}


	public function index()
	{
      	
		if ($this->session->userdata('pmsadmin') == true) {
         	
			$data['manager'] = $this->manager_model->list_common('manager');
          
          	
         	return $this->load->view('admin/master/manager_list',$data); 

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
  
  
  

	public function addmanager()
	{
		$tl_name=$this->input->post('tl_name');
        $tl_email=$this->input->post('tl_email');
       	$tl_contact=$this->input->post('tl_contact');
      	$tl_employee=$this->input->post('tl_employee');
        $tl_department=$this->input->post('tl_department');
       	$this->db->where('name',$tl_name);
      $this->db->where('flag','0');
    	$query = $this->db->get('manager');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['exist'=>'0']);

    	}
    		else

    	{
       	 $insertData = array('name'=>$tl_name,
								'email'=>$tl_email,
								'contact'=>$tl_contact,
								'emp_id'=>$tl_employee,
								'department'=>$tl_department,
						);
              
         
           $insertUser =  $this->db->insert('manager',$insertData);
           
          

           if($insertUser)
				{
             		
					echo json_encode(['done'=>'1']);
			}
				else
				{
					echo json_encode(['done'=>'0']);

				}
    	}
    }
    	 
	


	public function delete($id)
{
    $id = $this->input->post("id");
	$data = array(
        'flag'  => '2'
        );
    $this->team_leader_model->delete_team_leader('manager',$id,$data);
    redirect('master');
}

public function openeditmodel()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->manager_model->list_common_where3('manager','id',$id);
		
        
		$this->load->view('admin/master/manager_edit',$data);

}

public function updateteamleader()
{

		$id = $this->input->post('id'); 
		$tl_name=$this->input->post('tl_name');
        $tl_email=$this->input->post('tl_email');
        $tl_contact=$this->input->post('tl_contact');
        $employee_id=$this->input->post('employee_id');
        $tl_department=$this->input->post('tl_department');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('name'=>$tl_name,
								'email'=>$tl_email,
								'contact'=>$tl_contact,
								'emp_id'=>$employee_id,
								'department'=>$tl_department,
						);
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('manager',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}


}

