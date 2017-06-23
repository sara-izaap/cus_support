<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(COREPATH."controllers/App_controller.php");

class Support extends App_controller {

	

	function __construct()
	{
		parent::__construct();
       $this->load->model('customer_model');
	}

	public function index()
	{
		$this->data['user_details'] = $this->db->query("select id,concat(first_name,last_name) as name,email from customer")->result_array();
		$this->layout->view('ticketing_system/add','frontend');
	}

	function add($edit_id ='')
	{
		$form = $this->input->post();

		$check_cus_state = $form['check_cus_state'];

		$userid = $form['userid'];

		$first_name = $form['first_name'];

		$last_name = $form['last_name'];

		$email = $form['email'];

		$phone = $form['phone'];

		$address = $form['address'];

		$enabled = $form['enabled'];

		$subject = $form['subject'];

		$comments = $form['comments'];



		if($check_cus_state=="EC")
		{

			$this->insert_ticket($form);
				
		}
		else
		{
			$ins_data = array();
            $ins_data['first_name']   = $first_name;
            $ins_data['last_name']    = $last_name;
            $ins_data['email']        = $email;
            $ins_data['phone']        = $phone;
            $ins_data['address']      = $address;
            $ins_data['status']      = $enabled;
            $ins_data['created_date'] = date('Y-m-d H:i:s'); 

            $check_email_exist = $this->check_email($email,$userid="");
			if(!$check_email_exist)
			{
				echo json_encode(array("status"=>"failure","msg"=>"Given Email already exists!"));exit;
			}

            $insert_id = $this->db->insert("customer",$ins_data);

            $form['userid'] = $insert_id;

            $this->insert_ticket($form);
		}

    }

    function insert_ticket($form)
    {
    	$ins_data = array();

			$ins_data['customer_id'] = $form['userid'];
			$ins_data['status'] = "New";
			$ins_data['subject'] = $form['subject'];
			$ins_data['description'] = $form['comments'];
			$ins_data['created_date'] = date("Y-m-d H:i:s");

			$tic_insert = $this->db->insert("tickets",$ins_data);
            if($tic_insert)
			   echo json_encode(array("status"=>"success","msg"=>"Ticketing information Sent to Site Admin"));
			else
			   echo json_encode(array("status"=>"failure","msg"=>"Ticketing information Sent to Site Admin"));
    }

     function check_email($mail,$id)
    {
        $where = array();
     
        if($id)
            $where['id !='] = $id;

        $where['email'] = $mail;

        $result = $this->customer_model->get_where( $where)->num_rows();
     
        if ($result) 
        {
           return FALSE;
        }
        return TRUE;
    }
}
