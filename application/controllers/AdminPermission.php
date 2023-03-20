<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminPermission extends MY_Controller {

	
	public function __construct()

{

parent::__construct();

		$this->load->model('Admin_permission');
		$this->load->helper('url');
 		$this->load->library('form_validation');
      	$this->load->library('session');
      	$this->load->helper('email');
    

}


	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			//$data['admin'] = $this->Admin_permission->getadminroles();
          $data['admin'] = $this->Admin_permission->getuserlist();
			$data['category'] = $this->Admin_permission->getcategory();
			return $this->load->view('admin/admin_permission',$data); 
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('admin/login');
		}
		
	}

	public function addsubadmin()
	{

  		$sub_name=$this->input->post('sub_name');
        $sub_email=$this->input->post('sub_email');
        $sub_password=$this->input->post('sub_password');
        $password = md5($sub_password);
        $sub_contact=$this->input->post('sub_contact');
        $sub_select=$this->input->post('sub_select');
        $sub_address=$this->input->post('sub_address');

        //check mail
        $subject = 'test Mail';
        $message = 'test msg';
        $this->db->where('admin_email',$sub_email);
    	$query = $this->db->get('admin');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['email'=>'0']);

    	}
    		else

    	{
       

         $insertData = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'admin_address'=>$sub_address
           	 );
         sendmail($sub_email,$subject,$message);
         exit();
           $insertUser =  $this->db->insert('admin',$insertData);
           
          

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
    $this->subadmin_model->deletesubadmin($id);
    redirect('subadmin');
}

public function subadminedit()
{
	
		$id =  $this->input->post('id');
		$data['content'] = $this->subadmin_model->subadmineditmodel($id);

        
		$this->load->view('admin/subadmin/subadmineditmodel',$data);

}

public function updatesubadmi()
{

		$id =  $this->input->post('admin_user_id'); 
		$sub_name=$this->input->post('admin_name');
        $sub_email=$this->input->post('admin_email');
        $sub_password=$this->input->post('admin_password');
         $password = md5($sub_password);
        $sub_contact=$this->input->post('admin_contact');
        $sub_select=$this->input->post('admin_role');
        $sub_address=$this->input->post('admin_address');
         date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('admin_name'=>$sub_name,
								'admin_email'=>$sub_email,
								'admin_password'=>$password,
								'admin_contact'=>$sub_contact,
								'admin_role'=>$sub_select,
								'updated_at'=>$date,
								'admin_address'=>$sub_address
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
        $accept_status  = $_REQUEST['accept_status']; 
     

      	$update = array(
        'admin_status'  => $accept_status
        );

        $this->db->where('id',$admin_user_id);
        $this->db->update('admin',$update);
        
    	redirect('Subadmin', 'refresh');
      
    }



    public function getpermissiondata() {
    	$adminid = $this->input->post('adminid');

    	$data['admin_id'] = $adminid;
    	$data['permission'] = $this->Admin_permission->getPermission($adminid);
		$data['category'] = $this->Admin_permission->getcategory();
      
    	$this->load->view('admin/admin_permission_ajax',$data);

    }
  
  public function updatepermission()
{
   $admin_select = $this->input->post('admin_select');
   $subtree = $this->input->post('attribute_name');

   date_default_timezone_set('Asia/Kolkata');
   $date = date('d-m-Y H:i A');

   for ($i = 0; $i < count($subtree); ++$i) {

   		$ids = $subtree[$i];
   		$add1 = $this->input->post('can_add_'.$ids);
   		$edit1 =$this->input->post('can_add_'.$ids);
   		$delete1 =$this->input->post('can_add_'.$ids);
   		$view1 = $this->input->post('can_view_'.$ids);
   		$changepass1 = $this->input->post('can_change_pass_'.$ids);
   		//$payment1 = $this->input->post('can_update_payment_'.$ids);


		if(!empty($add1)) {     $add = $add1;    }else{ $add = '0'; }
	    if(!empty($edit1)) {     $edit = $add1;    }else{ $edit = '0'; }
	    if(!empty($delete1)) {     $delete = $add1;    }else{ $delete = '0'; }
	    if(!empty($view1)) {     $view = $view1;    }else{ $view = '0'; }
	    if(!empty($changepass1)) {     $changepass = $changepass1;    }else{ $changepass = '0'; }
	    //if(!empty($payment1)) {     $updatepay = $payment1;    }else{ $updatepay = 0; }   		


	    $updatedata = array(
              
               'can_view' => $view,
               'can_edit' => $edit,
               'can_delete' => $delete,
               'can_add' => $add,
               'can_change_pass' => $changepass,
               //'can_update_payment' => $updatepay,
               'updated_at' => $date
            );
     	

	    $this->db->where('role_id',$admin_select);
	    $this->db->where('sidebar_subtree_id',$ids);
    	$query = $this->db->get('role_permission');

    	if ($query->num_rows() > 0) {

    		

 	 		$insertUser = $this->db->where('role_id', $admin_select);
 	 		$insertUser = $this->db->where('sidebar_subtree_id', $ids);
	    	$insertUser = $this->db->update('role_permission', $updatedata);
	    	
     
    	}else{

    		if($add != 0 || $view != 0  || $edit != 0  || $delete != 0  || $changepass != 0) {

    			 $updatedata = array(
               'role_id' => $admin_select,
               'sidebar_subtree_id' => $ids,
               'can_view' => $view,
               'can_edit' => $edit,
               'can_delete' => $delete,
               'can_add' => $add,
               'can_change_pass   ' => $changepass,
              
               'created_at' => $date
            );
              
    			$insertUser = $this->db->insert('role_permission', $updatedata);	
    		}
    	}

    		
   		}
   	

 	if ($insertUser) {
            echo json_encode(['done' => '1']);
         } else {
            echo json_encode(['done' => '0']);
         }
     
 }
}

