<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth_jsps
{

    public $CI;


    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
    }

    public function get_hidden_contact($number)
    {
     $middle_string ="";
     $length = strlen($number);

     if( $length < 3 ){
       echo $length == 1 ? "X" : "X". substr($number,  - 1);
     } else{
        $part_size = floor( $length / 3 ) ; 
        $middle_part_size = $length - ( $part_size * 2 );
        for( $i=0; $i < $middle_part_size ; $i ++ ){
           $middle_string .= "X";
        }

        	return  substr($number, 0, $part_size ) . $middle_string  . substr($number,  "-".$part_size);
    	}
    }
  
  	public function authorized_device($default_redirect = false)
    {
    	$ip = $_SERVER['REMOTE_ADDR'];	
      	if($ip != '49.205.173.201')
        {
        	$_SESSION['redirect_to'] = current_url();
            redirect('./');
            return false;
        } else {
            if ($default_redirect) {
                redirect('index');
            }
            return true;
        }
        
    }
  public function get_contact_access($string,$id)
    {
        $data = $this->CI->db->query("SELECT $string  FROM `contact_access` WHERE `user_id` = $id AND $string = 1 AND `flag` = 0")->row();
        return $data;
    }

}
