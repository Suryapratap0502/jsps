<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('team_leader_model');
     	$this->load->model('form_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}

  public function old_form(){
	$this->load->view('old_form');
 
}

	public function index()
	{
      	
		if ($this->session->userdata('pmsadmin') == true) {
         	
			$data['city'] = $this->team_leader_model->list_common('city');
          
          	
         	return $this->load->view('admin/master/city_list',$data); 

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
  	
  	public function getcity()
    {
    
       $query = $this->input->post('query');
	   $data = $this->form_model->getcity_fun($query);
   
        $city = array();
       
		foreach ($data as $value) {
            
          array_push($city,array('name' => $value['name']));
            
        }
        $result[] = $city;
        echo json_encode($result);
    
    }
  
  

	public function addcity()
	{
		$city_name=$this->input->post('city_name');
        
       	$this->db->where('name',$city_name);
    	$query = $this->db->get('city');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['exist'=>'0']);

    	}
    		else

    	{
       	 $insertData = array('name'=>$city_name,
								
						);
              
         
           $insertUser =  $this->db->insert('city',$insertData);
           
          

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
    	 
	


	public function delete()
{
    $id = $this->input->post("id");
	$data = array(
        'flag'  => '2'
        );
    $this->team_leader_model->delete_team_leader('city',$id,$data);
    redirect('city');
}

public function openeditmodel($id)
{
	
	
		$data['content'] = $this->team_leader_model->list_common_where3('city','id',$id);
		
        
		$this->load->view('admin/master/city_edit',$data);

}

public function updatetecity()
{

		$id = $this->input->post('id'); 
		$name=$this->input->post('city_name');
       	date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('name'=>$name,
								
						);
          
        
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('city',$updatedata);
      
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

