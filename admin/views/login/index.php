
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="<?php echo include_img_path();?>/logo-big.png" alt=""/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" method="POST">
		<h3 class="form-title">Sign In</h3>

		<?php if(validation_errors() || $this->session->flashdata('login_fail1')==TRUE):?>
			<div class="Metronic-alerts alert alert-danger fade in">
				<button class="close" aria-hidden="true" data-dismiss="alert" type="button"><i class="fa-lg fa fa-warning"></i></button>
				<?php echo validation_errors(); ?>

				<?php if($this->session->flashdata('login_fail1')==TRUE)
                    echo "<p>".$this->session->flashdata('login_fail1')."</p>"; ?>
                  
			</div>
		<?php endif;?>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" value="<?=set_value('email');?>" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions text-center">
			<button type="submit" class="btn btn-success uppercase">Login</button>
		</div>
		
	</form>
	<!-- END LOGIN FORM -->
</div>
<div class="copyright">
	 2014 © Metronic. Admin Dashboard Template.
</div>

</body>
