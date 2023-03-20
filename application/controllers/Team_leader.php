<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team_leader extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('team_leader_model');
     
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
         	
			$data['team_leader'] = $this->team_leader_model->list_common('team_leader');
          
          	
         	return $this->load->view('admin/master/tl_list',$data); 

		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
  
  
  

	public function addteamleader()
	{
		$tl_name=$this->input->post('tl_name');
        $tl_email=$this->input->post('tl_email');
       	$tl_contact=$this->input->post('tl_contact');
      	$tl_employee=$this->input->post('tl_employee');
        $tl_department=$this->input->post('tl_department');
       	$this->db->where('name',$tl_name);
      $this->db->where('flag','0');
    	$query = $this->db->get('team_leader');

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
              
         
           $insertUser =  $this->db->insert('team_leader',$insertData);
           
          

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
    $this->team_leader_model->delete_team_leader('team_leader',$id,$data);
    redirect('team_leader');
}

public function openeditmodel()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->team_leader_model->list_common_where3('team_leader','id',$id);
		
        
		$this->load->view('admin/master/tl_edit',$data);

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
       		$insertUser= $this->db->update('team_leader',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);


					
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
        
       
}
 public function update()
    {
        $id = $_REQUEST['id'];
        
      	$update = array(
        'flag'  => '1'
        );

        $this->db->where('id',$id);
        $this->db->update('admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        $id = $_REQUEST['id'];

      	$update = array(
        'flag'  => '0'
        );

        $this->db->where('id',$id);
        $this->db->update('admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
    public function changesubpass()
{
		$id =  $this->input->post('id');
		$cur_password =  $this->input->post('cur_password');
		$cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
        $npassword = md5($new_password);
       
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('password',$cpassword);
        $this->db->where('id',$id);
    	$query = $this->db->get('admin');

    	if ($query->num_rows() > 0)
    	{
    		$updatedata = array(
				'password'=>$npassword,
				'updated_at'=>$date
								
           	 );
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('admin',$updatedata);
      
         	if($insertUser)
				{
					echo json_encode(['inserted'=>'1']);
	
				}
				else
				{
					echo json_encode(['inserted'=>'0']);
					 
				}
				
    	}
    	else
    	{

         echo json_encode(['password'=>'0']);
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
  if(isset($_FILES["file"]["name"]))
  {
   $path = $_FILES["file"]["tmp_name"];
   $object = PHPExcel_IOFactory::load($path);
   foreach($object->getWorksheetIterator() as $worksheet)
   {
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    for($row=2; $row<=$highestRow; $row++)
    {
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
   $id=$this->input->post('userid');
        $data['user_data'] = $this->Form_model->list_common_where3('admin','id',$id);    
        $this->load->view('admin/user_password_update',$data);         
    } 
  

	function update_password() {
		$id = $this->input->post('category_id');
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
      	$exist = $this->Form_model->display_sp_single4('admin','id',$id);

      	if(!empty($exist)) {
        //   if( md5($old_pass) == $exist[0]->password){
          	
            if($new_pass == $confirm_pass) {
            	
              	$pass = md5($new_pass);
              	$query = $this->Form_model->changepass($pass,$id);
              	
              	if($query) {
                  	$response = array('status' => true, 'type' => 'success', 'msg' => "<span style='color:green'>Password Changed Successfully</span>");
                }else{
                	$response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>Something went wrong</span>");
                }
            }else{
              	$response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>New & Confirm Password must be same</span>");
            }
        }else{
          	$response = array('status' => false, 'type' => 'error', 'msg' => "<span style='color:red'>User not exist</span>");
        }
      
      	echo json_encode($response);

    }
  
  

}

