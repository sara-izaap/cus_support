<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Customer_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'customer';
  }
  
  function listing()
  {  
    
    $this->_fields = "*,IF(status='Y','Active','Inactive') as status";
    $this->db->group_by('id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'company_name':
          $this->db->like($key, $value);
        break;
        case 'name':
          $this->db->like($key, $value);
        break;
        case 'email':
          $this->db->like($key, $value);
        break;
        case 'phone':
          $this->db->like($key, $value);
        break;
        case 'address':
          $this->db->like($key, $value);
        break;
      }
    }
    return parent::listing();
  }


}
?>