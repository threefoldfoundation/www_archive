<?php 
	$user_ip = $_GET['ip'];
	$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
	if (!empty($geo)) {
		echo  json_encode( array('geoplugin_latitude' => (float)$geo['geoplugin_latitude'],'geoplugin_longitude' => (float)$geo['geoplugin_longitude'] ));
	}else{
		echo json_encode(array('geoplugin_status' => '500'));
	}
 ?>