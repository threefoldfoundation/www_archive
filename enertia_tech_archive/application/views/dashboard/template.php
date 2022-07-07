<html lang="en"> 
<head>
	<?php  $this->load->view('dashboard/includes/head', array('title' => 'enertia.tech | EV Platform')); ?>
</head>
<body class="body-white pb-0">
	<?php 
	$this->load->view('dashboard/includes/header'); 
	?>
	 <!-- Page Content-->
    <div class="wrapper">
		<?php echo $content; $this->load->view('dashboard/includes/footer'); ?>
   	</div>
    <!-- end page-wrapper -->
    
</body>
</html>
