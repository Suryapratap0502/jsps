<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CallerAdmin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()

{

parent::__construct();

		$this->load->model('Caller_modal');
      $this->load->model('Department_model');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
    

}
	public function index()
	{
		
		if ($this->session->userdata('pmsadmin') == true) {
			$data['calleradminData'] = $this->Caller_modal->userdata();
          $data['subadminData'] = $this->Department_model->getregionalhead();
		return $this->load->view('admin/Caller/caller',$data);
			 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}
  public function followLead()
	{
    	if ($this->session->userdata('pmsadmin') == true) {
    	 $data['useruploaddata'] = $this->Caller_modal->followleaddata();
          $data['follow'] = $this->Caller_modal->followupdate();
	return	$this->load->view('admin/marketing/follow_lead',$data);
        }
    else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
	}

	public function addcaller()
	{
		$sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];


  		$caller_name=$this->input->post('caller_name');
        $caller_email=$this->input->post('caller_email');
        $caller_password=$this->input->post('caller_password');
        $password = md5($caller_password);
        $caller_contact=$this->input->post('caller_contact');
        $caller_select=$this->input->post('caller_select');
        $caller_address=$this->input->post('caller_address');
       $pregional=$this->input->post('pregional');


        //check mail

        $this->db->where('admin_email',$caller_email);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       
		if($role == 'Master')
        {
         $insertData = array('admin_name'=>$caller_name,
								'admin_email'=>$caller_email,
								'admin_password'=>$password,
								'admin_contact'=>$caller_contact,
								'admin_role'=>$caller_select,
								'admin_address'=>$caller_address,
                             'user_created_by'=>$id,
                             'user_regional_head'=>$pregional
           	 );
              
           $insertUser =  $this->db->insert('master_admin',$insertData);
        }
              else{
               $insertData = array('admin_name'=>$caller_name,
								'admin_email'=>$caller_email,
								'admin_password'=>$password,
								'admin_contact'=>$caller_contact,
								'admin_role'=>$caller_select,
								'admin_address'=>$caller_address,
                             'user_created_by'=>$id,
                             'user_regional_head'=>$id
           	 );
              
           $insertUser =  $this->db->insert('master_admin',$insertData);
              }
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

	public function deletecalleradmin($id)
{
    $id = $this->input->post("admin_user_id");
    $this->Caller_modal->deletecalleradmin($id);
    redirect('CallerAdmin');
}

public function changecallerpass()
{
		$id =  $this->input->post('admin_user_id');
		$cur_password =  $this->input->post('cur_password');
		 $cpassword = md5($cur_password);
		$new_password=$this->input->post('new_password');
        
         $npassword = md5($new_password);
       
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

        $this->db->where('admin_password',$cpassword);
        $this->db->where('admin_user_id',$id);
    	$query = $this->db->get('master_admin');

    	if ($query->num_rows() > 0)
    	{

    		$updatedata = array(
								'admin_password'=>$npassword,
								
								'updated_at'=>$date
								
           	 );
          
         
           	$insertUser= $this->db->where('admin_user_id',$id);
       		$insertUser= $this->db->update('master_admin',$updatedata);
      
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
  

    public function calleredit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->Caller_modal->callereditmodel($id);

        
		$this->load->view('admin/Caller/callereditmodal',$data);

}
	
	public function updatecaller()
{

		$id =  $this->input->post('admin_user_id'); 
		
  		$caller_name=$this->input->post('caller_name');
        $caller_email=$this->input->post('caller_email');
       
        $caller_contact=$this->input->post('caller_contact');
        
        $caller_address=$this->input->post('caller_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$caller_name,
								'admin_email'=>$caller_email,
								
								'admin_contact'=>$caller_contact,
								'updated_at' => $date,
								'admin_address'=>$caller_address
           	 );
          
         
           	$insertUser= $this->db->where('admin_user_id',$id);
       		$insertUser= $this->db->update('master_admin',$updatedata);
      
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
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Enable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }


 public function updatedisable()
    {
        

        $admin_user_id = $_REQUEST['admin_user_id'];
        
     

      	$update = array(
        'admin_status'  => 'Disable'
        );

        $this->db->where('admin_user_id',$admin_user_id);
        $this->db->update('master_admin',$update);
        
    	redirect($_SERVER['REQUEST_URI'], 'refresh'); 
      
    }
  
  public function followleaddata()
	{
		
        
        require_once APPPATH . "./third_party/PHPExcel.php";
        $path = 'uploads/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $sess = $this->session->userdata('pmsadmin');
            
          $id = $sess['id'];
            $role = $sess['role'];

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
            $i=0;

            foreach ($allDataInSheet as $value) {
                $inserdata['c_follow_name'] = $value['B'];
                $inserdata['c_follow_email'] = $value['C'];
                $inserdata['c_follow_contact'] = $value['D'];
                $inserdata['c_follow_address'] = $value['E'];
               $inserdata['c_follow_status'] = $value['F'];
              $inserdata['c_follow_uploaded_by'] = $id;

                $this->db->insert('caller_follow_lead', $inserdata);
                $i++;
            } 
          
         redirect('CallerAdmin/followLead', 'refresh');


          
        } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
 }
  
  public function addrespond()
{
    $sess = $this->session->userdata('pmsadmin');
            $name = $sess['name'];
            $role = $sess['role'];
            $id = $sess['id'];
		$followid =  $this->input->post('follow_id');
		$resremark =  $this->input->post('resremark');
    $status =  $this->input->post('status');
    $date = $this->input->post('date');
		 $insertData = array('follow_user_id'=>$followid,
								'follow_remarks'=>$resremark,
								'follow_up_date'=>$date,
								'follow_up_status'=>$status,
								
                             'follow_up_created_by'=>$id
                            
           	 );

              
           $insertUser =  $this->db->insert('follow_up_data',$insertData);
    
    	$insertData = array('c_follow_status'=>$status
								
                            
           	 );
                $this->db->where('c_follow_id',$followid);
                    $this->db->update('caller_follow_lead',$insertData);
      
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
