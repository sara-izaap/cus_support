<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/App_controller.php");

class Support extends App_controller {

	
	function __construct()
	{
		parent::__construct();
       	$this->load->model('tickets_model');
	}

	public function index()
	{
		 try
        {
            $form = $this->input->post();

            $this->form_validation->set_rules('check_cus_state','Customer Type','trim|required');

            if(isset($form['check_cus_state']) && $form['check_cus_state']=='NC'){

	            $this->form_validation->set_rules('company_name','Company Name','trim|required');
	            $this->form_validation->set_rules('name','Name','trim|required');
	            $this->form_validation->set_rules('email','Email Name','trim|required|valid_email|callback_check_email');
	            $this->form_validation->set_rules('phone','phone','trim|required');
	            $this->form_validation->set_rules('address','Address','trim|required');
            }
            elseif(isset($form['check_cus_state']) && $form['check_cus_state']=='EC'){

            	$this->form_validation->set_rules('customer','Company','trim|required');
            }

            	$this->form_validation->set_rules('support_type','Support Type','trim|required');
            	$this->form_validation->set_rules('description','Description','trim|required');
            

           	 	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
                
            if ($this->form_validation->run())
            {
                $ins_data = array();
                $ins_data['company_name'] = $this->input->post('company_name');
                $ins_data['name']         = $this->input->post('name');
                $ins_data['email']        = $this->input->post('email');
                $ins_data['phone']        = $this->input->post('phone');
                $ins_data['address']      = $this->input->post('address');
                $ins_data['status']       = 'Y';
               	$ins_data['created_date'] = date('Y-m-d H:i:s');

                if($form['check_cus_state']=='NC')       
                   $customer_id = $this->tickets_model->insert($ins_data,'customer');                
                
                if($form['check_cus_state']=='EC')
                	$customer_id = $this->input->post('customer');


                $tickets = array();  
                $tickets['customer_id'] = $customer_id;
                $tickets['status'] 		= 'NEW';
                $tickets['support_type']= $this->input->post('support_type');
                $tickets['description'] = $this->input->post('description');
                $tickets['created_date']= date('Y-m-d H:i:s');

                $ticket_id = $this->tickets_model->insert($tickets);

                $this->send_mail($customer_id,$ticket_id);

                $this->session->set_flashdata('success_msg','Your ticket has been sent to support team',TRUE);

                redirect('support');
            }    
            
        }
        catch (Exception $e)
        {
            $this->data['status']   = 'error';
            $this->data['message']  = $e->getMessage();
                
        }

        $this->data['user_list']    = $this->tickets_model->get_where(array(),'id,company_name,name','customer')->result_array();
        $this->data['support_list'] = $this->tickets_model->get_where(array(),'id,name','support_types')->result_array();

        $this->layout->view('ticketing_system/add');

    }

    function check_email($mail)
    {
        $where = array();

        $where['email'] = $mail;

        $result = $this->tickets_model->get_where($where,'','customer')->num_rows();
     
        if ($result) {
            $this->form_validation->set_message('check_email', 'Given email already exists!');
            return FALSE;
        }
        return TRUE;
    }

    function send_mail($customer_id,$ticket_id){

    	if(!$customer_id && !$ticket_id)
    		return FALSE;

    	$this->load->library('email');

    	$ticket = $this->tickets_model->get_where(array('id'=>$ticket_id),'*')->row_array();
    	$customer = $this->tickets_model->get_where(array('id'=>$customer_id),'company_name,name,email,phone,address','customer')->row_array();
    	$support_type = $this->tickets_model->get_where(array('id'=>$ticket['support_type']),'name','support_types')->row_array();

    	//Customer mail
    	$cust_msg  =  'Hello,<br/> Thank You for contacting us. <br/><br/> Your ticket submission was received. We will update you as soon as possible.<br/>';
        $cust_msg .=  'Ticket id# : '.$ticket_id .'<br/><br/> Best regards, <br/> Support Team.';
            
        $this->email->set_mailtype("html");  
        $this->email->from('saravanan.izaap@gmail.com', 'Support');
        $this->email->to($customer['email']);
        $this->email->subject('Ticket#: '.$ticket_id.' -  Customer support');
        $this->email->message($cust_msg);
        $this->email->send();

        //Admin mail
        $admin_msg  =  'Hello,<br/> Ticket id# : '.$ticket_id .'. <br/><br/>';
        $admin_msg .=  '<b>Customer details:</b> ,<br/> Company: '.$customer["company_name"].'<br/> Email: '.$customer["email"].'<br/> Phone: '.$customer["phone"].'<br/><br/>';
        $admin_msg .=  '<b>Ticket type :</b>'.$support_type["name"].' <br/> <b>Description :</b> '.$ticket['description'] .'. <br/>';   


        $this->email->set_mailtype("html");  
        $this->email->from('info@support.com', 'Support');
        $this->email->to('saravanan.izaap@gmail.com');
        $this->email->subject('Ticket#: '.$ticket_id.' - '.$support_type["name"]);
        $this->email->message($admin_msg);
        $this->email->send();

        return TRUE;

    }

    
}
