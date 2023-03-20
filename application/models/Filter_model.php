 <?php
	if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

	class Filter_model extends CI_Model

	{

		public function __construct()

		{

			parent::__construct();
		}

		public function all_data()
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');
			$this->db->order_by('form.date_of_closure', 'ASC');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		public function company_searchdata($searchstring, $current_date, $three_month_date)
		{
			$this->db->select('form.*,company.name');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->where('company.name', $searchstring);
			$this->db->where('form.expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function company_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->where('form.company_name', $searchstring);
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($module_short_name)) {
				//$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module', $module_short_name);
			}
          $this->db->group_by('form.proposer_name');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function company_searchdata_list_page1($searchstring, $current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('form');

			$this->db->where('company_name', $searchstring);
			if (!empty($current_date)) {
				$this->db->where('date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(expiry_date,7)', $current_month);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function company_searchdata_claim_page($searchstring ,$startdate, $enddate, $search_by_disp,$current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
		    $this->db->where('company_name', $searchstring);
			$this->db->where('flag', '0');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('claim_status', $search_by_disp);
			}
			
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(date_of_closure,7)', $current_month);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function company_searchdata_service_list_page1($searchstring, $startdate, $enddate, $model_short_name, $sel_dis, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->where('form.company_name', $searchstring);
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', 'services');
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
      public function list_common_where_services($startdate, $enddate, $model_short_name, $sel_dis, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', 'services');
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function claim_policy_searchdata_list_page($content, $startdate, $enddate, $search_by_disp,$current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			
			$this->db->like('policy_no', $content, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('claim_status', $search_by_disp);
			}
			
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(date_of_closure,7)', $current_month);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
      public function proposer_searchdata_list_page($content, $startdate, $enddate, $search_by_disp,$current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			$this->db->like('patient_name', $content, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('claim_status', $search_by_disp);
			}
			
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(date_of_closure,7)', $current_month);
			}
			
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
public function cust_id_searchdata_list_page($content, $startdate, $enddate, $search_by_disp,$current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			$this->db->like('claim_intimation_no', $content, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('claim_status', $search_by_disp);
			}
			
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(date_of_closure,7)', $current_month);
			}
			
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}


		public function filterdate($startdate, $enddate,$sel_dis,$current_date,$current_month,$next_month)

		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');

			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.policy_end_date,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			
			if (!empty($current_date)) {
				$this->db->where('form.policy_end_date', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.policy_end_date,7)', $current_month);
			}
          	if (!empty($next_month)) {
				$this->db->where('LEFT(form.policy_end_date,7)', $next_month);
			}
			$this->db->group_by('form.policy_no,form_disposition_remark.form_id');
			$this->db->order_by('form.policy_end_date', 'ASC');
			$this->db->where('form.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		// public function filterdate_listpage($startdate, $enddate,$sel_dis=null)

		// {
		// 	$this->db->select('*');
		// 	$this->db->from('form');

		// 	if(!empty($startdate) && !empty($enddate)){
		// 	$this->db->where('LEFT(date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
		// 	}
		// 	if(!empty($sel_dis)){
		// 		$this->db->where('disposition', $sel_dis);
		// 		}
		// 	$query = $this->db->get();
		// 	$result = $query->result_array();
		// 	return $result;
		// }

		public function filterdate_listpage($startdate, $enddate, $model_short_name, $sel_dis, $current_date = null, $current_month = null)

		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', 'operations');
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
public function company_filterdate_list($searchstring, $startdate, $enddate, $model_short_name, $sel_dis, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->where('form.company_name', $searchstring);
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function cust_filterdate_list($searchstring, $startdate, $enddate, $sel_dis, $model_short_name,  $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('proposer_name', $searchstring, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function policy_filterdate_list($searchstring, $startdate, $enddate, $sel_dis, $model_short_name,  $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('policy_no', $searchstring, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function teamleader_filterdate_list($searchstring, $startdate, $enddate, $sel_dis, $model_short_name, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->where('form.tl', $searchstring);
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function log_searchdata_list_page($searchstring, $startdate, $enddate, $sel_dis, $model_short_name,  $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('log_id', $searchstring, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module',  $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function cust_searchdata_list_page($searchstring, $startdate, $enddate, $sel_dis, $model_short_name,  $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.cust_id', $searchstring, 'both');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module',  $model_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('form_disposition_remark.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function filterdateservice_listpage($startdate, $enddate, $sel_disp, $current_date = null, $current_month = null)

		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');

			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_disp)) {
				$this->db->where('form_disposition_remark.disposition', $sel_disp);
			}
			//if (!empty($model_short_name)) {
			//	$this->db->where('form_disposition_remark.done_by_module', $model_short_name);

			//}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');
			// $this->db->order_by('form.date_of_closure', 'ASC');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function expiry_filterdate_service_page($expstartdate, $expenddate, $model_short_name, $sel_dis, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');

			if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($model_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $model_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');
			}
			if (!empty($current_date)) {
				$this->db->where('form.expiry_date', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.expiry_date,7)', $current_month);
			}
			$this->db->order_by('form.expiry_date', 'ASC');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

public function company_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->where('form.company_name', $searchstring);
  			if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			// if (!empty($model_short_name)) {
			// 	$this->db->where('sub_desposition.module', $model_short_name);
			// }
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function cust_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->like('proposer_name', $searchstring, 'both');
          if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			// if (!empty($model_short_name)) {
			// 	$this->db->where('sub_desposition.module', $model_short_name);
			// }
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function list_common_where_renewal($expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,sub_desposition.*,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			// $this->db->where('form.company_name', $searchstring);
          if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function policy_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->like('form.policy_no', $searchstring, 'both');
          if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		
		public function log_id_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->like('log_id', $searchstring, 'both');
          if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function cust_id_filterdate_renewal($searchstring,$expstartdate,$expenddate, $startdate, $enddate, $sel_dis,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->like('form.cust_id', $searchstring, 'both');
          if (!empty($expstartdate) && !empty($expenddate)) {
				$this->db->where('(LEFT(form.expiry_date,10) BETWEEN "' . $expstartdate . '" and "' . $expenddate . '")');
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}
		public function teamleader_filterdate_renewal($searchstring, $startdate, $enddate,  $current_date = null, $current_month = null){
			$this->db->select('sub_desposition.form_id,sub_desposition.policy_no,sub_desposition.desposition_id,sub_desposition.sub_desposition_name,sub_desposition.remark as sub_remark,sub_desposition.action,sub_desposition.action,sub_desposition.condition,sub_desposition.module,form.*');
			$this->db->from('sub_desposition');
			$this->db->join('form', 'sub_desposition.form_id = form.id', 'inner');
			$this->db->where('form.tl', $searchstring);
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('sub_desposition.desposition_id', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('sub_desposition.flag', '0');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		public function policy_searchdata($content, $current_date, $three_month_date)
		{

			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$this->db->like('policy_no', $content, 'both');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function policy_searchdata_list_page($content, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.policy_no', $content, 'both');


			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($module_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function cus_name_searchdata($content, $current_date, $three_month_date)
		{
			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$this->db->like('proposer_name', $content, 'both');
			$this->db->or_like('customer_name', $content, 'both');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function cus_name_searchdata_list_page($content, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.proposer_name', $content, 'both');


			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($module_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
			}
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_date_filter($current_date, $three_month_date)
		{
			$this->db->select('*,count(*) as count');
			$this->db->from('form');
			$this->db->where('expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$this->db->where('expiry_date', $current_date);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_date_filter_list($current_date, $current_month, $sel_dis, $model_short_name)
		{

			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');

			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			
          $this->db->group_by('form.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		public function current_date_filter_all($current_date, $sel_dis = null)
		{
			$this->db->select('*');
			$this->db->from('form');

			$this->db->where('date_of_closure', $current_date);
			if (!empty($sel_dis)) {
				$this->db->where('disposition', $sel_dis);
			}

			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_month_filter($current_date, $three_month_date, $current_month)
		{
			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$this->db->where('LEFT(expiry_date,7)', $current_month);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_month_filter_list($current_month, $sel_dis, $module_short_name)
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id,form_disposition_remark.created_at as enforced_date');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');


			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($sel_dis)) {
				$this->db->where('form_disposition_remark.disposition', $sel_dis);
			}
			if (!empty($module_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no');
			}
			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		public function current_month_filter_list_all($current_month, $sel_dis = null)
		{
			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('LEFT(date_of_closure,7)', $current_month);
			if (!empty($sel_dis)) {
				$this->db->where('disposition', $sel_dis);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function next_month_filter($current_date, $three_month_date, $next_month)
		{
			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('expiry_date BETWEEN "' . $current_date . '" and "' . $three_month_date . '"');
			$this->db->where('LEFT(expiry_date,7)', $next_month);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function next_month_filter_list($next_month)
		{
			$this->db->select('*');
			$this->db->from('form');
			$this->db->where('LEFT(date_of_closure,7)', $next_month);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function tl_searchdata_list_page($searchstring, $current_date = null, $current_month = null)
		{
			$this->db->select('*');
			$this->db->from('form');

			$this->db->where('tl', $searchstring);
			if (!empty($current_date)) {
				$this->db->where('date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(date_of_closure,7)', $current_month);
			}

			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function list_common_where3($table, $where, $id, $sel_dis = null)
		{
			$this->db->select('*');
			$this->db->where($where, $id);
			if (!empty($sel_dis)) {
				$this->db->where('claim_status', $sel_dis);
			}
			$this->db->order_by('id', 'desc');
			$this->db->from($table);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function filterdate_claim($startdate, $enddate, $current_date,$current_month,$sel_dis = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			if(!empty($startdate) && !empty($enddate)){
			$this->db->where('LEFT(created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($sel_dis)) {
				$this->db->where('claim_status', $sel_dis);
			}
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(created_at,7)', $current_month);
			}

			
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_month_filter_claim($current_month, $sel_dis = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			$this->db->where('LEFT(created_at,7)', $current_month);
			if (!empty($sel_dis)) {
				$this->db->where('claim_status', $sel_dis);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function curr_date_claim($current_date, $sel_dis = null)
		{
			$this->db->select('*');
			$this->db->from('claim');
			if (!empty($current_date)) {
				$this->db->where('created_at', $current_date);
			}
			if (!empty($sel_dis)) {
				$this->db->where('claim_status', $sel_dis);
			}
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function subdisp_filter_data($sel_sub_disp, $sel_disp, $module_short_name)
		{
			$this->db->select('form.*,form_disposition_remark.*,form.id as form_id');
			$this->db->from('form');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');

			$this->db->where('form_disposition_remark.disposition', $sel_disp);

			$this->db->where('form_disposition_remark.sub_disposition', $sel_sub_disp);


			$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
			$this->db->group_by('form_disposition_remark.done_by_module, form.policy_no,form_disposition_remark.form_id');



			$query = $this->db->get();
			$result = $query->result_array();

			return $result;
		}

		public function claim_date_filter($startdate, $enddate, $sel_dis, $current_date, $current_month)
		{
			$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('form');
			$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(claim.created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}
			if (!empty($sel_dis)) {
				$this->db->where('claim.claim_status', $sel_dis);
			}

			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
          
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          	$this->db->group_by('claim.policy_no');	
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function current_date_filter_claim_list($current_date, $current_month, $sel_dis)
		{
			$this->db->select('claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('claim');
			$this->db->join('form', 'claim.policy_no = form.policy_no', 'inner');

			if (!empty($sel_dis)) {
				$this->db->where('claim.claim_status', $sel_dis);
			}


			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          $this->db->group_by('claim.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
      
      public function curr_filter_claim($current_date, $current_month, $sel_dis)
      {
      		$this->db->select('*');
			$this->db->from('claim');
			if (!empty($sel_dis)) {
				$this->db->where('claim_status', $sel_dis);
			}


			if (!empty($current_date)) {
				$this->db->where('LEFT(created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(created_at,7)', $current_month);
			}
        	$this->db->where('flag', '0');
        	$this->db->group_by('policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
      
      }

		public function clam_init_searchdata_list_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month)
		{
			$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('form');
			$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
			$this->db->like('claim.claim_intimation_no', $searchstring, 'both');

			if (!empty($search_by_disp)) {
				$this->db->where('claim.claim_status', $search_by_disp);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(claim.created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}

			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          $this->db->group_by('claim.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function policy_searchdata_claim_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month)
		{
			$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('form');
			$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
			$this->db->like('claim.policy_no', $searchstring, 'both');

			if (!empty($search_by_disp)) {
				$this->db->where('claim.claim_status', $search_by_disp);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(claim.created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}

			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          $this->db->group_by('claim.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function pt_name_searchdata_claim_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month)
		{
			$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('form');
			$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
			$this->db->like('claim.patient_name', $searchstring, 'both');

			if (!empty($search_by_disp)) {
				$this->db->where('claim.claim_status', $search_by_disp);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(claim.created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}

			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
          
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          $this->db->group_by('claim.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function company_searchdata_cliam_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month)
		{
			$this->db->select('form.*,claim.*,form.id as form_id,claim.id as claim_id');
			$this->db->from('form');
			$this->db->join('claim', 'claim.policy_no = form.policy_no', 'inner');
			$this->db->join('company', 'claim.company_name = company.name', 'inner');
			$this->db->where('company.name', $searchstring);
			

			if (!empty($search_by_disp)) {
				$this->db->where('claim.claim_status', $search_by_disp);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('(LEFT(claim.created_at,10) BETWEEN "' . $startdate . '" and "' . $enddate . '")');
			}

			if (!empty($current_date)) {
				$this->db->where('LEFT(claim.created_at,10)', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(claim.created_at,7)', $current_month);
			}
			$this->db->where('form.flag', '0');
			$this->db->where('claim.flag', '0');
          $this->db->group_by('claim.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function policy_searchdata_renewal_page($searchstring, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date = null, $current_month = null)
		{
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.policy_no', $searchstring);
			if (!empty($current_date)) {
				$this->db->where('form.expiry_date', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.expiry_date,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.expiry_date,10) BETWEEN "' . $enddate . '" and "' . $startdate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($module_short_name)) {
				$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				
			}
			$this->db->group_by('form_disposition_remark.done_by_module', $module_short_name);
			$this->db->where('form.flag', '0');
			$this->db->order_by('form.expiry_date', 'asc');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function cus_name_searchdata_renewal_page($searchstring,$condition, $startdate, $enddate, $search_by_disp, $module_short_name, $current_date, $current_month,$next_month)
		{
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.'.$condition, $searchstring);
			if (!empty($current_date)) {
				$this->db->where('form.expiry_date', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.expiry_date,7)', $current_month);
			}
          
          	if (!empty($next_month)) {
				$this->db->where('LEFT(form.expiry_date,7)', $next_month);
			}
          	
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.expiry_date,10) BETWEEN "' . $enddate . '" and "' . $startdate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			
			$this->db->group_by('form.policy_no');
			$this->db->where('form.flag', '0');
			$this->db->order_by('form.expiry_date', 'asc');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function company_searchdata_renewal_page($searchstring, $startdate, $enddate, $search_by_disp, $current_date, $current_month,$next_month)
		{
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->where('form.company_name', $searchstring);
			if (!empty($current_date)) {
				$this->db->where('form.expiry_date', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.expiry_date,7)', $current_month);
			}
          	if(!empty($next_month))
            {
            	$this->db->where('LEFT(form.expiry_date,7)', $next_month);
            }
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.expiry_date,10) BETWEEN "' . $enddate . '" and "' . $startdate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			$this->db->group_by('form.policy_no');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function data_list_page( $startdate, $enddate, $search_by_disp, $model_short_name,  $current_date = null, $current_month = null){
			
			
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			// $this->db->like('form.policy_no', $searchstring, 'both');
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($model_short_name)) {
				//$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module', $model_short_name);
			}
			$this->db->group_by('form.proposer_name');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function policy_search($searchstring, $startdate, $enddate, $search_by_disp, $model_short_name,  $current_date = null, $current_month = null){
			
			
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.policy_no', $searchstring, 'both');
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($model_short_name)) {
				//$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module', $model_short_name);
			}
			$this->db->group_by('form.proposer_name');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function log_id_data($searchstring, $startdate, $enddate, $search_by_disp, $model_short_name,  $current_date = null, $current_month = null){
			
			
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('form.log_id', $searchstring, 'both');
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($model_short_name)) {
				//$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module', $model_short_name);
			}
			$this->db->group_by('form.proposer_name');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function cust_id_data($searchstring, $startdate, $enddate, $search_by_disp, $model_short_name,  $current_date = null, $current_month = null){
			
			
			$this->db->select('form.*,company.name,form.id as form_id');
			$this->db->from('form');
			$this->db->join('company', 'form.company_name = company.id', 'left');
			$this->db->join('form_disposition_remark', 'form.id = form_disposition_remark.form_id', 'left');
			$this->db->like('cust_id', $searchstring, 'both');
			if (!empty($current_date)) {
				$this->db->where('form.date_of_closure', $current_date);
			}
			if (!empty($current_month)) {
				$this->db->where('LEFT(form.date_of_closure,7)', $current_month);
			}
			if (!empty($startdate) && !empty($enddate)) {
				$this->db->where('LEFT(form.date_of_closure,10) BETWEEN "' . $startdate . '" and "' . $enddate . '"');
			}
			if (!empty($search_by_disp)) {
				$this->db->where('form_disposition_remark.disposition', $search_by_disp);
			}
			if (!empty($model_short_name)) {
				//$this->db->where('form_disposition_remark.done_by_module', $module_short_name);
				$this->db->group_by('form_disposition_remark.done_by_module', $model_short_name);
			}
			$this->db->group_by('form.id');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

	}
