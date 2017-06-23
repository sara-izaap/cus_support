<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Customer extends Admin_Controller
{

	protected $_customer_validation_rules = array (
			           array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|required'),
			           array('field' => 'last_name', 'label' => 'LAst Name', 'rules' => 'trim|required'),
			           array('field' => 'email', 'label' => 'Email', 'rules' => 'trim|required|valid_email'),
			           array('field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|required'),
			           array('field' => 'address', 'label' => 'Address', 'rules' => 'trim|required'),
			           array('field' => 'status', 'label' => 'Enabled', 'rules' => 'trim|required')
                 );

	function __construct()
  {
    parent::__construct();
    
    if(!is_logged_in())
      redirect('login');

    $this->load->model('customer_model');
  }

  
  public function index()
  {

  	$this->layout->add_javascripts(array('listing'));

    $this->load->library('listing');
    $this->simple_search_fields = array('first_name' => 'First Name','last_name'=>'Last Name','email'=>'Email','phone'=>'Phone');
    $this->_narrow_search_conditions = array("start_date");

    $str = '<a href="'.site_url('customer/add/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'jobs/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';
    
    $this->listing->initialize(array('listing_action' => $str));

    $listing = $this->listing->get_listings('customer_model', 'listing');


    if($this->input->is_ajax_request())
      $this->_ajax_output(array('listing' => $listing), TRUE);

    $this->data['bulk_actions'] = array('' => 'select', 'delete' => 'Delete');
    $this->data['simple_search_fields'] = $this->simple_search_fields;
    $this->data['search_conditions'] = $this->session->userdata($this->namespace.'_search_conditions');
    $this->data['per_page'] = $this->listing->_get_per_page();
    $this->data['per_page_options'] = array_combine($this->listing->_get_per_page_options(), $this->listing->_get_per_page_options());
    $this->data['search_bar'] = $this->load->view('listing/search_bar', $this->data, TRUE);
    $this->data['listing'] = $listing;
    $this->data['grid'] = $this->load->view('listing/view', $this->data, TRUE);

  	$this->layout->view('/frontend/customer/index');
  }

  function add($edit_id =''){

       try
        {
            if($this->input->post('edit_id'))            
                $edit_id = $this->input->post('edit_id');

            $this->form_validation->set_rules('first_name','First Name','trim|required');
            $this->form_validation->set_rules('last_name','Last Name','trim|required');
            $this->form_validation->set_rules('email','Email Name','trim|required|valid_email|callback_check_email['.$edit_id.']');
            $this->form_validation->set_rules('phone','phone','trim|required');
            $this->form_validation->set_rules('address','Address','trim|required');
            $this->form_validation->set_rules('enabled','Enabled','trim|required');
            

            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
                
            if ($this->form_validation->run())
            {
                $ins_data = array();
                $ins_data['first_name']   = $this->input->post('first_name');
                $ins_data['last_name']    = $this->input->post('last_name');
                $ins_data['email']        = $this->input->post('email');
                $ins_data['phone']        = $this->input->post('phone');
                $ins_data['address']      = $this->input->post('address');
                $ins_data['status']       = $this->input->post('enabled');
               

                if($edit_id)
                {
                    $ins_data['updated_date'] = date('Y-m-d H:i:s'); 
                    $this->customer_model->update(array("id" => $edit_id),$ins_data);

                    $msg = 'Customer updated successfully';
                }
                else
                {    
                    $ins_data['created_date'] = date('Y-m-d H:i:s'); 
                    $this->customer_model->insert($ins_data);

                    $msg = 'Customer added successfully';
                }

                $this->session->set_flashdata('success_msg',$msg,TRUE);

                redirect('customer');
            }    
            else
            {            
                $edit_data = array();
                $edit_data['id']          = '';
                $edit_data['first_name']  = '';
                $edit_data['last_name']   = '';
                $edit_data['email']       = '';
                $edit_data['phone']       = '';
                $edit_data['address']     = '';
                $edit_data['status']      = 'Y';                    

            }

        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $this->data['message']  = $e->getMessage();
                
        }

        if($edit_id)
            $edit_data =$this->customer_model->get_where(array("id" => $edit_id))->row_array();

        $this->data['editdata']  = $edit_data;

        $this->layout->view('frontend/customer/add');
  }

   function check_email($mail,$id)
    {
        $where = array();
     
        if($id)
            $where['id !='] = $id;

        $where['email'] = $mail;

        $result = $this->customer_model->get_where( $where)->num_rows();
     
        if ($result) {
            $this->form_validation->set_message('check_email', 'Given email already exists!');
            return FALSE;
        }
        return TRUE;
    }

  
}
?>