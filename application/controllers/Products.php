<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{


    public function __construct()

    {

        parent::__construct();
        $this->load->model('Products_model');
        $this->load->model('Form_model');
    }
    public function index()
    {

        if ($this->session->userdata('pmsadmin') == true) {
            $data['company'] = $this->Products_model->list_common('company');
            $data['products_list'] = $this->Products_model->masterData('products');
           
            return $this->load->view('admin/master/products',$data);
        } else {
            $this->session->set_flashdata('denied', 'Access Denied!');
            return $this->load->view('admin/login');
        }
    }

    public function getproduct()
    {
        $id = $this->input->post('com_id');
  
        $data = $this->Form_model->list_common_where3('products','company_id',$id);
        $output = "<option value='' selected>Select</option>";
        if (!empty($data)) {
            foreach ($data as $value) {
                $output .= '<option value="' . $value['product_name'] . '">' . $value['product_name'] . '</option>';
            }
        }
      
        echo $output;
    }
    public function addproducts(){
        $company_name=$this->input->post('company_name');
        $product_name=$this->input->post('product_name');
      
       	$this->db->where('product_name',$product_name);
      $this->db->where('flag','0');
    	$query = $this->db->get('products');

    	if ($query->num_rows() > 0)
    	{
        
 	 		echo json_encode(['exist'=>'0']);

    	}
    		else

    	{
       	 $insertData = array('company_id'=>$company_name,
								'product_name'=>$product_name,
						);
              
         
           $insertUser =  $this->db->insert('products',$insertData);
           
          

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
    public function update()
	{
		$id = $_REQUEST['id'];

		$update = array(
			'flag'  => '1'
		);

		$this->db->where('id', $id);
		$this->db->update('products', $update);
		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}


	public function updatedisable()
	{
		$id = $_REQUEST['id'];

		$update = array(
			'flag'  => '0'
		);

		$this->db->where('id', $id);
		$this->db->update('products', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}
    public function delete(){
        $id = $this->input->post("id");
        $data = array(
            'flag'  => '2'
            );
        $this->Products_model->delete_products('products',$id,$data);
        redirect('products');
    }
    public function openeditmodel()
    {
        
            $id =  $this->input->post('id');
            $data['content'] = $this->Products_model->list_common_where3('products','id',$id);
            $data['company'] = $this->Products_model->list_common('company');
            
            $this->load->view('admin/master/products_edit',$data);
    
    }
    public function updateproducts(){
        $id = $this->input->post('id'); 
        $company_name=$this->input->post('company_name');
        $product_name=$this->input->post('product_name');
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H:i A');

         $updatedata = array('company_id'=>$company_name,
								'product_name'=>$product_name,
								'updated_at'=>$date
						);
          
         
           	$insertUser= $this->db->where('id',$id);
       		$insertUser= $this->db->update('products',$updatedata);
      
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