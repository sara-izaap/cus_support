<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH.'libraries/models/App_model.php');

class Tickets_model extends App_model
{
  function __construct()
  {
    parent::__construct();
    $this->_table = 'tickets';
  }
  
  function listing()
  {  
    
    $this->_fields = "tickets.*,SUBSTRING(tickets.description,1,40) as description,c.company_name,c.name as customer_name,s.name as support_type";
    $this->db->join('customer c','c.id=tickets.customer_id');
    $this->db->join('support_types s','s.id=tickets.support_type');
    $this->db->group_by('tickets.id');

    foreach ($this->criteria as $key => $value)
    {
      if( !is_array($value) && strcmp($value, '') === 0 )
        continue;
      switch ($key)
      {
        case 'id':
          $this->db->where('tickets.id', $value);
        break;
        case 'company_name':
          $this->db->like('c.company_name', $value);
        break;
        case 'support_type':
          $this->db->like('s.name', $value);
        break;
        case 'name':
          $this->db->like('c.name', $value);
        break;
        case 'email':
          $this->db->like('c.email', $value);
        break;
        case 'phone':
          $this->db->like('c.phone', $value);
        break;
        case 'address':
          $this->db->like('c.address', $value);
        break;
      }
    }
    return parent::listing();
  }

  function get_edit_record($ticket_id){

    $this->db->select("t.*,c.company_name,c.name as customer_name,c.email,c.phone,c.address,s.name as support_type");
    $this->db->from('tickets t');
    $this->db->join('customer c','c.id=t.customer_id');
    $this->db->join('support_types s','s.id=t.support_type');
    $this->db->where('t.id', $ticket_id);
    $this->db->group_by('t.id');

    $result = $this->db->get()->row_array();

    return $result;
  }

  function get_report(){

    $this->db->select("t.*,c.company_name,c.name as customer_name,c.email,c.phone,c.address,s.name as support_type");
    $this->db->from('tickets t');
    $this->db->join('customer c','c.id=t.customer_id');
    $this->db->join('support_types s','s.id=t.support_type');
    $this->db->group_by('t.id');

    $result = $this->db->get()->result_array();

    return $result;
  }


}
?>