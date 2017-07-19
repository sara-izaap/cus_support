

<div id="content">
<div class="container main_content">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<h1 class="page-title text-center"><b> Raise tickets</b></h1>
<h4 class="text-center">Connect with our customer support team for help</h4> 

<?php if($this->session->flashdata('success_msg')==TRUE):?>
<div class="alert alert-success alert-dismissable text-center">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Your ticket has been sent to support team. They will update you soon
</div>
<?php endif;?>

<form class="form-horizontal" role="form" name="add_ticket_form" method="post">
<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2"></div>
</div>
    <div class="form-group">
	  <div class="col-md-3">
	  </div>
	     <div class="col-md-7">
		    <label class="radio-inline"><input type="radio" value="NC" name="check_cus_state" <?php echo set_radio('check_cus_state',"NC",TRUE);?>><b>New Customer </b></label>
			<label class="radio-inline"><input type="radio" value="EC" name="check_cus_state" <?php echo set_radio('check_cus_state',"EC");?>><b>Existing Customer</b></label>
		 </div>
	   </div>


	    <div class="form-group exist_user_info" style="<?php echo (isset($_POST['check_cus_state']) && $_POST['check_cus_state'] == 'EC')?'visibility:visible':'visibility:hidden;height:0px;'; ?>">
		   <label for="name" class="col-md-3 control-label">Company/Email</label>
		    <div class="col-md-7">
	            <select id="customer" name="customer" data-placeholder="Please Select Your Company/Name" class="chosen-select-deselect" tabindex="2">
	              <option value=""></option>
	              <?php if(is_array($user_list) && !empty($user_list)):
	                    foreach($user_list as $key=>$value): ?>
	                          <option value="<?php echo $value['id'];?>"><?php echo $value['company_name']. '('.$value['name'].')';?></option>
	              <?php 
	                    endforeach;
	              endif;
	              ?>
	            </select>
	            <?=form_error('customer');?>
	         </div>  
        </div>

        <?php $style = 'display:block;';  if((isset($_POST['check_cus_state']) && $_POST['check_cus_state'] != 'NC')) { $style = 'display:none;'; } ?>
	    
	    <div id="new_user_info" style="<?php echo $style;?>">	
			<div class="form-group">
				<label for="name" class="col-md-3 control-label">Company Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo set_value('comapny_name');?>">
					<?=form_error('company_name');?>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-md-3 control-label">Full Name</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Full Name" value="<?php echo set_value('name');?>">
					<?=form_error('name');?>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-md-3 control-label">Email</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo set_value('email');?>">
					<?=form_error('email');?>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-md-3 control-label">Phone</label>
				<div class="col-md-7">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo set_value('phone');?>">
					<?=form_error('phone');?>
				</div>
			</div>
			<div class="form-group">
				<label for="message" class="col-md-3 control-label">Address</label>
				<div class="col-sm-7">
					<textarea class="form-control" rows="4" id="address" name="address" placeholder="Location Address"><?php echo set_value('address');?></textarea>
					<?=form_error('address');?>
				</div>
			</div>
			
	   	</div>	

	   <div class="form-group">
			<label for="name" class="col-md-3 control-label">Support Type</label>
			<div class="col-md-7">				
				<select id="support_type" name="support_type" class="form-control">
	                <option value=""> Select Type</option>
	                <?php foreach($support_list as $key=>$value): 
	                      $sel = (set_value('support_type')==$value['id'])?'selected':''; ?>

	                    <option value="<?php echo $value['id'];?>" <?=$sel;?> ><?php echo $value['name'];?></option>
	                <?php endforeach; ?>
	            </select>
	            <?=form_error('support_type');?>
			</div>
		</div>
		<div class="form-group">
			<label for="message" class="col-sm-3 control-label">Comments</label>
			<div class="col-sm-7">
				<textarea class="form-control" rows="4" id="description" name="description" placeholder="Comments"><?php echo set_value('description');?></textarea>
				<?=form_error('description');?>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-1 text-center">
			    <button class="btn btn-primary submit_ticket">Submit</button>
			</div>
		</div>

	</form>
  </div>
 </div>
</div>
					<!-- End content -->
				
			
