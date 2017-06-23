<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once("App_controller.php");

class Admin_Controller extends App_Controller
{

    public $namespace;
    public $_search_conditions          = array("search_type", "search_text");
    public $_narrow_search_conditions   = array();
    public $_session_namespace;
    public $_session_narrow_namespace;
    public $previous_url                = '';

    protected $_logged_in_only         =    false;
    public $error_message              =    '';
    public $data                       =    array();
    public $role                       =    '';
    public $load_css                   =    array();
    public $load_js                    =    array();
    public $ins_data                   =    array();
    
    protected $useradd_validation_rules =    array();  
    protected $role_validation_rules    =    array();
    public $init_scripts = array();
    
    public function __construct()
    {
        parent::__construct(); 

        $this->namespace = strtolower($this->uri->segment(1, 'admin').'_'.$this->uri->segment(2, 'index'));
      
        $sess_keys = array_keys($this->session->all_userdata());
       
        $this->data = array();
        //$this->role = get_user_role();
        
        $this->load->library("form_validation");

    }
    
    
    public function _ajax_output($data, $json_format = FALSE)
    {
    	if(is_array($data) && $json_format)
        	echo json_encode($data);
    	else 
    		echo $data;
    	
        exit();
    }
    
    
  
}

?>
