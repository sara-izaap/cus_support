<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(COREPATH."controllers/Admin_controller.php");

class Tickets extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        
        if(!is_logged_in())
          redirect('login');

        $this->load->model('tickets_model');
    }

      
    public function index()
    {

      	$this->layout->add_javascripts(array('listing'));

        $this->load->library('listing');
        $this->simple_search_fields = array('id'=>'Ticked id#','company_name' => 'Company Name','support_type'=>'Support Type','name'=>'Name','email'=>'Email','phone'=>'Phone','address'=>'Address');
        $this->_narrow_search_conditions = array("start_date");

        $str = '<a href="'.site_url('tickets/view/{id}').'" class="btn btn btn-padding yellow table-action"><i class="fa fa-edit edit"></i></a><a href="javascript:void(0);" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="table-action btn-padding btn red" onclick="delete_record(\'tickets/delete/{id}\',this);"><i class="fa fa-trash-o trash"></i></a>';
        
        $this->listing->initialize(array('listing_action' => $str));

        $listing = $this->listing->get_listings('tickets_model', 'listing');


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

      	$this->layout->view('/frontend/tickets/index');
    }

    public function view($edit_id = 0){

        try
        {
             if($this->input->post('edit_id'))            
                $edit_id = $this->input->post('edit_id');

            $this->form_validation->set_rules('status','Status','trim|required');
           
            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run())
            {
                $ins_data= array();
                $ins_data['status']      = $this->input->post('status');
               

                $this->tickets_model->update(array('id'=>$edit_id), $ins_data);

                $this->session->set_flashdata('success_msg','Status updated successfully',TRUE);

                redirect('tickets');
                
            }
            
        }    
        catch (Exception $e)
        {
            $output['status']   = 'error';
            $output['message']  = $e->getMessage();                
        }

        $this->data['editdata'] = $this->tickets_model->get_edit_record($edit_id);

        $this->layout->view('frontend/tickets/view');   

    }


    function delete($del_id)
    {
        $access_data = $this->tickets_model->get_where(array("id"=>$del_id),'id')->row_array();
       
        $output=array();

        if(count($access_data) > 0){

            $this->tickets_model->delete(array("id"=>$del_id));

            $output['message'] ="Record deleted successfuly.";
            $output['status']  = "success";
        }
        else
        {
           $output['message'] ="This record not matched by Customer.";
           $output['status']  = "error";
        }
        
        $this->_ajax_output($output, TRUE);
            
    }

    function export(){

        try
        {
            $filename = 'Tickets.xls';

            //header('Content-type: application/vnd.ms-excel');
            //header('Content-Disposition: attachment; filename='.$filename);

            $result = $this->tickets_model->get_report();

            $str = '<table><tr>';

            $columns = array('Ticket id#','Created Date','Company Name','Customer_name','Email','Phone','Address','Support Type','Ticket status','Description');


            foreach($columns as $key) {
                $key = ucwords($key);
                $str .= '<th>'.$key.'</th>';
            }

            $str .= '</tr>';

            print_r($result);exit;

            foreach($result as $ke => $res)
            {
                 $str .= '<tr>';
                 $str .= '<td>'.$res['id'].'</td>';
                 $str .= '<td>'.$res['created_date'].'</td>';
                 $str .= '<td>'.$res['company_name'].'</td>';
                 $str .= '<td>'.$res['customer_name'].'</td>';
                 $str .= '<td>'.$res['email'].'</td>';
                 $str .= '<td>'.$res['phone'].'</td>';
                 $str .= '<td>'.$res['address'].'</td>';
                 $str .= '<td>'.$res['support_type'].'</td>';
                 $str .= '<td>'.$res['status'].'</td>';
                 $str .= '<td>'.$res['description'].'</td>';                   

                $str .= '</tr>';
            }

            $str .= '</table>';

           
        }
        catch (Exception $e)
        {
            $status   = 'error';
            $message  = $e->getMessage();                
        }

        echo $str;
        exit();    
    }

  
}
?>