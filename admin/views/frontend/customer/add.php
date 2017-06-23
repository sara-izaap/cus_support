<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Add Customer
			</h3>
			<div class="page-bar">
				 <?php echo set_breadcrumb(); ?>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table"></i> Customer Form
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="">
								<div class="form-body">
									
									<div class="form-group">
										<label class="col-md-3 control-label">First Name</label>
										<div class="col-md-5 <?=(form_error('first_name'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="First Name" name="first_name"
											 value="<?php echo set_value('first_name',$editdata['first_name']);?>">
											<?=form_error('first_name');?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Last Name</label>
										<div class="col-md-5 <?=(form_error('last_name'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Last Name" name="last_name"
											 value="<?php echo set_value('last_name',$editdata['last_name']);?>">
											<?=form_error('last_name');?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-5 <?=(form_error('email'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Email" name="email"
											 value="<?php echo set_value('email',$editdata['email']);?>">
											<?=form_error('email');?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Phone</label>
										<div class="col-md-5 <?=(form_error('phone'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Phone" name="phone"
											 value="<?php echo set_value('phone',$editdata['phone']);?>">
											<?=form_error('phone');?>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Address</label>
										<div class="col-md-5 <?=(form_error('address'))?'has-error':'';?>">
											<textarea class="form-control" placeholder="Address" name="address"> <?php echo set_value('address',$editdata['address']);?> </textarea>										 
											<?=form_error('address');?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Enabled</label>
										<div class="col-md-5">
											<label class="radio-inline"><input type="radio" value="Y" name="enabled" <?php echo set_radio('enabled', 'Y', ($editdata['status']=='Y')?TRUE:FALSE);?> >Yes</label>
											<label class="radio-inline"><input type="radio" value="N" name="enabled" <?php echo set_radio('enabled', 'N', ($editdata['status']=='N')?TRUE:FALSE);?> >No</label>
										</div>
									</div>
									
								</div>

								<input type="hidden" name="edit_id" class="form-control" id="edit_id" value="<?php echo $editdata['id'];?>">

								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<a href="<?=site_url('customer');?>" class="btn default">Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>


