<html lang="en"> 
<head>
	<?php  $this->load->view('includes/head', array('title' => 'enertia.tech | EV Platform')); ?>
</head>
<body class="body-white pb-0">
	<?php $this->load->view('includes/header'); echo '<div class="container-fluid" >'.$content.'</div>'; $this->load->view('includes/footer'); ?>
</body>
</html>
