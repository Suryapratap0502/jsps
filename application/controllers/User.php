<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('User_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}
public function test(){
	$this->sendmail('sp9522385@gmail.com','sp9522385@gmail.com','test Mail','hello');
 
}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['subadminData'] = $this->User_model->masterData();
          $data['country'] = $this->User_model->list_common('countries');
        
			return $this->load->view('admin/user',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}
  
   public function showstates($id){       

        if($id != '0') {
          
           

            $states = $this->User_model->list_common_where3('states','country_id',$id);

            $output = '<option value="0">Select</option>';
            foreach($states as $value) {
             
                $output .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
            }

            $response = array('status' => true, 'output' => $output);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }        
    }



    public function showcity($id){       

        $states = $this->User_model->list_common_where3('user','id',$id);

        $output = '<option value="0">Select</option>';
        foreach($states as $value) {
            $output .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
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
		$this->form_validation->set_rules('sub_email', 'email', 'required|is_unique[admin.email]');


  		$sub_name=$this->input->post('sub_name');
        $sub_email=$this->input->post('sub_email');
        $sub_password=$this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact=$this->input->post('sub_contact');
        $sub_employee=$this->input->post('sub_employee');
        $sub_department=$this->input->post('sub_department');
      //	$sub_adminrole=$this->input->post('sub_adminrole');
     
      	// $subject = "Welcome to Axepert Exhibit Pvt Ltd.";
      	// $message = "We are greatfully to inform you ($sub_email),<br>$name is added you $sub_email in Axepert Exhibit Admin Panel as a Regional Head.<br>Your username is your email ($sub_email) and your password is $sub_password.<br>Please click here for login https://axepertexhibits.com/AdminPanelPMS2/";

        //check mail
      
        $this->db->where('email',$sub_email);
    	$query = $this->db->get('admin');
		//$this->load->view('user',$query);

    	 if ($query->num_rows() > 0)
    	 {
 	 	 	echo json_encode(['email'=>'0']);
    	 }
    	 	else
    	 {
       //if ($this->form_validation->run($this) == FALSE) {
			//$msg=$this->session->set_flashdata('message', 'Email already exist.');
			//$this->load->view('user',$msg);
		//}else{

         $insertData = array('name'=>$sub_name,
								'email'=>$sub_email,
								'password'=>$password,
								'contact'=>$sub_contact,
                             	'emp_id'=>$sub_employee,
                             	'department'=>$sub_department
                             	//'admin_role'=>$sub_adminrole,
           	 );
              
           $insertUser =  $this->db->insert('admin',$insertData);
           
      // }

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


	public function deletesubadmin($id)
{
    $id = $this->input->post("id");
	$data = array(
        'flag'  => '2'
        );
    $this->User_model->deletesubadmin('admin',$id,$data);
    redirect('user');
}

public function subadminedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->User_model->subadmineditmodel('admin',$id);

        
		$this->load->view('admin/user/user',$data);

}

public function updatesubadmi()
{

		$id = $this->input->post('id'); 
		$sub_name=$this->input->post('sub_name');
        $sub_email=$this->input->post('sub_email');
        // $sub_password=$this->input->post('admin_password');
        // $password = md5($sub_password);
        $sub_contact=$this->input->post('sub_contact');
        $sub_empid=$this->input->post('sub_employee');
        $sub_department=$this->input->post('sub_department');
        $sub_adminrole=$this->input->post('sub_adminrole');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array
		 	(	'name'=>$sub_name,
				'email'=>$sub_email,
				// 'admin_password'=>$password,
				'contact'=>$sub_contact,
				'emp_id'=>$sub_empid,
				'department'=>$sub_department, 
				'admin_role'=>$sub_adminrole, 
				'updated_at'=>$date,
           	 );
          
         	//check mail
          //$this->db->where('email',$sub_email);
          //$query = $this->db->get('admin');
          // $this->load->view('user',$query);

           //if ($query->num_rows() > 0)
           //{
            //  echo json_encode(['email'=>'0']);
          // }
             // else
           //{
                
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
           //}
       
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
      $data = $this->User_model->getname($postData);

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
        $data['user_data'] = $this->User_model->list_common_where3('admin','id',$id);    
        $this->load->view('admin/user_password_update',$data);         
    } 
  

	function update_password() {
		$id = $this->input->post('category_id');
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
      	$exist = $this->User_model->display_sp_single4('admin','id',$id);

      	if(!empty($exist)) {
        //   if( md5($old_pass) == $exist[0]->password){
          	
            if($new_pass == $confirm_pass) {
            	
              	$pass = md5($new_pass);
              	$query = $this->User_model->changepass($pass,$id);
              	
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

