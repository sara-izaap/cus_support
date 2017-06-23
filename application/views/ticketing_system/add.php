

<div id="content">
<div class="container main_content">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1 class="page-header text-center">
<b>Customer Service Support</b>
</h1>
<form class="form-horizontal" role="form" name="add_ticket_form" id="add_ticket_form" method="post" action="#" onsubmit="javascript:return false;">
<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2"></div>
</div>
    <div class="form-group">
	  <div class="col-md-3">
	  </div>
	     <div class="col-md-7">
		    <label class="radio-inline">
			<input type="radio" value="EC" name="check_cus_state" <?php echo set_checkbox('check_cus_state',"EC",((isset($form_data['check_cus_state']) && $form_data['check_cus_state'] == "EC")?true:false));?>><b>Existing Customer</b></label>
			<label class="radio-inline"><input type="radio" value="NC" name="check_cus_state" <?php echo set_checkbox('check_cus_state',"NC",((isset($form_data['check_cus_state']) && $form_data['check_cus_state'] == "NC")?true:false));?>><b>New Customer</b></label>
		 </div>
	   </div>
	   <div class="form-group exist_user_info" style="<?php echo (isset($form_data['check_cus_state']) && $form_data['check_cus_state'] == "EC")?"display:block":"visibility:hidden"; ?>">
	   <label for="name" class="col-md-3 control-label">Name/Email</label>
	     <div class="col-md-7">
            <select id="userid" name="userid" data-placeholder="Please Select Your Name/Email" class="chosen-select-deselect" tabindex="2">
              <option value=""></option>
              <?php if(is_array($user_details) && !empty($user_details)):
                    foreach($user_details as $key=>$value): ?>
                          <option value="<?php echo $value['id'];?>"><?php echo $value['name']. '('.$value['email'].')';?></option>
              <?php 
                    endforeach;
              endif;
              ?>
            </select>
          </div>  
        </div>
	   <div id="new_user_info" style="<?php echo (isset($form_data['check_cus_state']) && $form_data['check_cus_state'] == "NC")?"display:block":"display:none"; ?>">	
		<div class="form-group">
			<label for="name" class="col-md-3 control-label">First Name</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="">
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-3 control-label">Last Name</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="">
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-3 control-label">Email</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="">
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-md-3 control-label">Phone</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="phone_no" name="phone" placeholder="Phone No" value="">
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label for="message" class="col-md-3 control-label">Address</label>
			<div class="col-sm-7">
				<textarea class="form-control" rows="4" id="address" name="address"></textarea>
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3">Enabled</label>
			<div class="col-md-7">
				<label class="radio-inline"><input type="radio" value="Y" name="enabled" checked="checked">Yes</label>
				<label class="radio-inline"><input type="radio" value="N" name="enabled">No</label>
			</div>
		</div>
	   </div>	

	   <div class="form-group">
			<label for="name" class="col-md-3 control-label">Subject</label>
			<div class="col-md-7">
				<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="">
				<p class='text-danger'></p>
			</div>
		</div>
		<div class="form-group">
			<label for="message" class="col-sm-3 control-label">Comments</label>
			<div class="col-sm-7">
				<textarea class="form-control" rows="4" id="comments" name="comments"></textarea>
				<p class='text-danger'></p>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
			    <button class="btn btn-primary submit_ticket">Submit</button>
			</div>
		</div>

	</form>
  </div>
 </div>
</div>
					<!-- End content -->
				
			
