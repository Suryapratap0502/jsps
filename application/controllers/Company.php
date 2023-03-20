<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends MY_Controller
{

	public function __construct()

	{

		parent::__construct();

		$this->load->model('Company_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('email');
	}
	public function test()
	{
		$this->sendmail('sp9522385@gmail.com', 'sp9522385@gmail.com', 'test Mail', 'hello');
	}

	public function index()
	{

		if ($this->session->userdata('pmsadmin') == true) {
			$data['subadminData'] = $this->Company_model->masterData();
			$data['country'] = $this->Company_model->list_common('countries');

			return $this->load->view('admin/company', $data);
		} else {
			$this->session->set_flashdata('denied', 'Access Denied!');
			return $this->load->view('company/login');
		}
	}

	public function showstates($id)
	{

		if ($id != '0') {

			$states = $this->Company_model->list_common_where3('states', 'country_id', $id);

			$output = '<option value="0">Select</option>';
			foreach ($states as $value) {

				$output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
			}

			$response = array('status' => true, 'output' => $output);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
		}
	}



	public function showcity($id)
	{

		$states = $this->Company_model->list_common_where3('cities', 'state_id', $id);

		$output = '<option value="0">Select</option>';
		foreach ($states as $value) {
			$output .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
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

		$sub_name = $this->input->post('sub_name');
		$sub_email = $this->input->post('sub_email');
		$sub_contact = $this->input->post('sub_contact');
		$sub_address = $this->input->post('sub_address');
      $gstin = $this->input->post('gstin');
      $is_policy_change_renewal = $this->input->post('is_policy_change_renewal');
		if ($_FILES['image']['name'] != "") {

			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/company_logo/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}


		// $subject = "Welcome to Axepert Exhibit Pvt Ltd.";
		// $message = "We are greatfully to inform you ($sub_email),<br>$name is added you $sub_email in Axepert Exhibit Admin Panel as a Regional Head.<br>Your username is your email ($sub_email) and your password is $sub_password.<br>Please click here for login https://axepertexhibits.com/AdminPanelPMS2/";

		//check mail
		$this->db->where('email',$sub_email);
		$query = $this->db->get('company');
		// $this->load->view('user',$query);

		 if ($query->num_rows() > 0)
	 	 {
	 		echo json_encode(['email'=>'0']);
		 }
		 	else
		 {

		$insertData = array(
			'name' => $sub_name,
			'email' => $sub_email,
			'contact' => $sub_contact,
			'address' => $sub_address,
			'logo' => $imgname,
          'gstin' => $gstin,
          'is_policy_change' => $is_policy_change_renewal
		);


		$insertUser =  $this->db->insert('company', $insertData);

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
		$this->Company_model->deletesubadmin('company', $id, $data);
		redirect('company');
	}

	public function subadminedit()
	{

		$id =  $this->input->post('id');
		$data['content'] = $this->Company_model->subadmineditmodel('company', $id);
		$this->load->view('admin/company/company', $data);
	}

	public function updatesubadmi()
	{
		
		$id = $this->input->post('id');
		$updatedata['name'] = $this->input->post('sub_name');
		$updatedata['email'] = $this->input->post('sub_email');
		$updatedata['contact'] = $this->input->post('sub_contact');
		$updatedata['address'] = $this->input->post('sub_address');

		if ($_FILES['image']['name'] != "") {

			$path_parts = pathinfo($_FILES['image']['name']);
			$image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
			$imgname = $image_path;
			$updatedata['logo'] = $imgname;

			$source =  $_FILES['image']['tmp_name'];
			$originalpath  = "assets/images/company_logo/" . $imgname;

			move_uploaded_file($source, $originalpath);
		}
      
      	//check mail
		//$this->db->where('email',$updatedata['email']);
		//$query = $this->db->get('company');
		// $this->load->view('user',$query);

		// if ($query->num_rows() > 0)
	 	 //{
	 	//	echo json_encode(['email'=>'0']);
		 //}
		 //	else
		 //{

		$insertUser = $this->db->where('id', $id);
		$insertUser = $this->db->update('company', $updatedata);

		if ($insertUser) {
			echo json_encode(['inserted' => '1']);
		} else {
			echo json_encode(['inserted' => '0']);
		}
       //}
	}
	public function update()
	{
		$id = $_REQUEST['id'];

		$update = array(
			'flag'  => '1'
		);

		$this->db->where('id', $id);
		$this->db->update('company', $update);
		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}


	public function updatedisable()
	{
		$id = $_REQUEST['id'];

		$update = array(
			'flag'  => '0'
		);

		$this->db->where('id', $id);
		$this->db->update('company', $update);

		redirect($_SERVER['REQUEST_URI'], 'refresh');
	}
	public function changesubpass()
	{
		$id =  $this->input->post('id');
		$cur_password =  $this->input->post('cur_password');
		$cpassword = md5($cur_password);
		$new_password = $this->input->post('new_password');

		$npassword = md5($new_password);

		date_default_timezone_set('Asia/Kolkata');
		$date = date('d-m-Y H:i A');

		$this->db->where('password', $cpassword);
		$this->db->where('id', $id);
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			$updatedata = array(
				'password' => $npassword,
				'updated_at' => $date

			);
			$insertUser = $this->db->where('id', $id);
			$insertUser = $this->db->update('admin', $updatedata);

			if ($insertUser) {
				echo json_encode(['inserted' => '1']);
			} else {
				echo json_encode(['inserted' => '0']);
			}
		} else {

			echo json_encode(['password' => '0']);
		}
	}

	public function searchbyname()
	{
		$postData = $this->input->post();

		// Get data
		$data = $this->Company_model->getname($postData);

		echo json_encode($data);
	}

	function import()
	{
		if (isset($_FILES["file"]["name"])) {
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
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
}
