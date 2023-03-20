 <?php
  if (!defined('BASEPATH')) exit('Hacking Attempt : Get Out of the system ..!');

  class Dashboard_Model extends CI_Model

  {

    public function __construct()

    {

      parent::__construct();
    }





    public function total_employee()

    {
    }

    public function countrow($table)
    {
      $fetch_pass = $this->db->query("select COUNT(id) as count from " . $table . " where flag != 2");
      $result = $fetch_pass->row();
      echo $res = $result->count;
    }
    public function getdate()
    {
      $date = new DateTime("now");

      $curr_date = $date->format('Y-m-d ');

      $this->db->select('*');
      $this->db->from('form');
      $this->db->where('created_at', $curr_date);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function today_fresh_bus($table, $date)
    {
      $this->db->select('sum(net_premium) as today_business');
      $this->db->where('LEFT(created_at,10)', $date);
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'desc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->row();
      return $result;
    }
    public function total_fresh_bus($table)
    {
      $this->db->select('sum(net_premium) as total_business');
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'desc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->row();
      return $result;
    }
    public function today_claim($table, $date)
    {
      $this->db->select('count(policy_no) as today_claims');
      $this->db->where('LEFT(created_at,10)', $date);
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'desc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->row();
      return $result;
    }

    public function total_policy()
    {
      $this->db->select('count(policy_no) as total_policy');
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'desc');
      $this->db->from('form');
      $this->db->group_by('LEFT(created_at,4)');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    public function total_claim($table)
    {
      $this->db->select('count(policy_no) as total_no_claims');
      $this->db->where('flag', '0');
      $this->db->order_by('id', 'desc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->row();
      return $result;
    }
    public function today_renewal()
    {
      $this->db->select('remark');
      $this->db->where('flag', '0');
      $this->db->where('desposition_id', '43');
      $this->db->order_by('id', 'desc');
      $this->db->from('sub_desposition');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    public function notification_data($table, $created_by_module, $date)
    {
      $this->db->select('*');
      $this->db->where('flag', '0');
      $this->db->where('created_by_module', $created_by_module);
      $this->db->where('LEFT(created_at,10)', $date);
      $this->db->order_by('id', 'desc');
      $this->db->from($table);
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    public function list_data($current_data = null, $currentdate = null)
    {
      $this->db->select('*,count(*) as company_count');
      $this->db->where('flag', '0');
      $this->db->where('updated_by_user_module', 'renewals');
      $this->db->order_by('id', 'desc');
      $this->db->from('form');
      if (!empty($current_data) && !empty($currentdate)) {
        $this->db->where('LEFT(date_of_closure,10) BETWEEN "' . $current_data . '" and "' .  $currentdate  . '"');
      }

      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    public function total_revenue()
    {
      $this->db->select('sum(net_premium) as total_revenue');
      // $this->db->where('LEFT(created_at,4)', $date);
      $this->db->where('flag', '0');
      $this->db->group_by('LEFT(created_at,4)');
      $this->db->from('form');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }


    public function chart_total_years()
    {
      $this->db->select('LEFT(created_at,4) as year');
      $this->db->where('flag', '0');
      $this->db->group_by('LEFT(created_at,4)');
      $this->db->from('form');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
   
    public function list_common($table){
      $this->db->select('*');
       $this->db->from($table);
       $this->db->where('flag','0');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }
    
  }
