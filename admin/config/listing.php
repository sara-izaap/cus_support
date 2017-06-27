<?php
/*
 * view - the path to the listing view that you want to display the data in
 * 
 * base_url - the url on which that pagination occurs. This may have to be modified in the 
 * 			controller if the url is like /product/edit/12
 * 
 * per_page - results per page
 * 
 * order_fields - These are the fields by which you want to allow sorting on. They must match
 * 				the field names in the table exactly. Can prefix with table name if needed
 * 				(EX: products.id)
 * 
 * OPTIONAL
 * 
 * default_order - One of the order fields above
 * 
 * uri_segment - this will have to be increased if you are paginating on a page like 
 * 				/product/edit/12
 * 				otherwise the pagingation will start on page 12 in this case 
 * 
 * 
 */
 

$config['customer_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/customer/filter',
	"base_url"	=> 	'/customer/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'company_name'=>array('name'=>'Company Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'name'=>array('name'=>'Customer Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),
						'email'=>array('name'=>'Email', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'phone'=>array('name'=>'Phone', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

$config['tickets_index'] = array(
	"view"		=> 	'listing/listing',
	"init_scripts" => 'listing/init_scripts',
	"advance_search_view" => 'frontend/tickets/filter',
	"base_url"	=> 	'/tickets/index/',
	"per_page"	=>	"20",
	"fields"	=> array(   
						'id'=>array('name'=>'Ticket id#', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'company_name'=>array('name'=>'Company Name', 'data_type' => 'String', 'sortable' => FALSE, 'default_view'=>1),					
						'support_type'=>array('name'=>'Type', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'description'=>array('name'=>'Description', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'status'=>array('name'=>'Status', 'data_type' => 'string', 'sortable' => FALSE, 'default_view'=>1),
						'created_date'=>array('name'=>'Submited Date', 'data_type' => 'datetime', 'sortable' => FALSE, 'default_view'=>1)),

	"default_order"	=> "id",
	"default_direction" => "DESC"
);

?>