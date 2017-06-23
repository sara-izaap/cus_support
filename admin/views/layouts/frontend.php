<!DOCTYPE HTML>
<html>
	<head>
	
		<?php include_title(); ?>
        <?php include_metas(); ?>
        <?php include_links(); ?>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" href="favicon.ico"/>
        <?php include_stylesheets(); ?>
        <?php include_raws() ?>
        
        <script>
         //declare global JS variables here
         var base_url = '<?php echo base_url();?>';
         var current_controller = '<?php echo $this->uri->segment(1, 'index');?>';
         var current_method = '<?php echo $this->uri->segment(2, 'index');?>';
         var namespace = '<?php echo $this->namespace;?>';
         var previous_url = '<?php echo $this->previous_url;?>';
        </script>
        
        
	</head>
	<body>
	
        <?php $this->load->view('_partials/header'); ?>
		<!-- body content start here -->
		<section class="body_container">
			<?php echo $content; ?>
		</section>
		<!-- body content end here -->
		
		<?php $this->load->view('_partials/footer'); ?>
		

		<?php include_javascripts(); ?>
		
		<?php 
		
			if(is_array($this->init_scripts))
			{
				foreach ($this->init_scripts as $file)
					$this->load->view($file, $this->data);
			}
		?>
	</body>
</html>
