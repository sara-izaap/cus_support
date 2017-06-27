  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
       Ticket# <?php echo $editdata["id"];?>
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
                <i class="fa fa-table"></i> Ticket View
              </div>
            </div>
            <div class="portlet-body form">
              <form class="" role="form" method="post" action="">
                <div class="form-body">
                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Company Name : </label>
                    <span class="bold"><?php echo $editdata['company_name'];?> </span>
                  </div>

                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Name : </label>
                    <span class="bold"><?php echo $editdata['customer_name'];?> </span>                   
                  </div>

                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Email : </label>
                    <span class="bold"><?php echo $editdata['email'];?> </span>                   
                  </div>

                  <div class="form-group col-md-4">
                    <label class="control-label">Phone : </label>
                    <span class="bold"><?php echo $editdata['phone'];?> </span>                   
                  </div>

                  <div class="form-group col-md-4">
                    <label class="control-label">Address : </label>
                    <p class="bold"><?php echo $editdata['address'];?> </p>                   
                  </div>

                  <div class="form-group col-md-4">
                    <label class="control-label">Tickt Status : </label>
                    <?=form_dropdown('status', array('NEW'=>'NEW','PROCESSING'=>'PROCESSING','COMPLETED'=>'COMPLETED','CANCELLED'=>'CANCELLED'), set_value('status', $editdata['status']), 'class="form-control"')?>                   
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label">Support Type : </label>
                    <span class="bold"><?php echo $editdata['support_type'];?> </span>                
                  </div>

                  <div class="form-group col-md-10">
                    <label class="control-label">Description : </label>
                    <p><?php echo $editdata['description'];?> </p>                
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



<!--

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tickedt# <?php echo $edit_data["id"];?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form name="ticket_edit" id="ticket_edit" method="POST">
              <div class="form-grid">
                
                <div class="form-group col-md-6">
                  <label>Company Name</label>
                  <?php echo $edit_data['company_name'];?>
                </div>

                <div class="form-group col-md-6">
                  <label>Name</label>
                  <?php echo $edit_data['customer_name'];?>
                </div>

                <div class="form-group col-md-6">
                  <label>Email</label>
                  <?php echo $edit_data['email'];?>
                </div>

                <div class="form-group col-md-6">
                  <label>Phone</label>
                  <?php echo $edit_data['phone'];?>
                </div>

                <div class="form-group col-md-6">
                  <label>Support Type</label>
                  <?php echo $edit_data['support_type'];?>
                </div>

                <div class="form-group col-md-6">
                  <label>Status</label>
                  <?=form_dropdown('status', array('NEW'=>'NEW','PROCESSING'=>'PROCESSING','COMPLETED'=>'COMPLETED','CANCELLED'=>'CANCELLED'), set_value('status', $edit_data['status']), 'class="form-control"')?> 
                </div>


                <div class="form-group col-md-6">
                  <label>Description</label>
                  <?php echo $edit_data['description'];?>                
                </div>

            </div>
           </form> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default active" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="edit_ticket('process','<?php echo $edit_data["id"];?>');">Save</button>
      </div>
    </div>
  </div>
  -->