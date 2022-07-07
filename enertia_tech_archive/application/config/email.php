<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');



/*



|--------------------------------------------------------------------------



| Active email



|--------------------------------------------------------------------------



|



| The $email['active_email'] setting lets you choose which email 



|



*/



$config['protocol'] = 'smtp';

$config['smtp_host'] = 'smtp.gmail.com';

$config['smtp_port'] = '587'; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.

$config['smtp_crypto'] = 'tls';

$config['smtp_user'] = 'alerts@atw.green';

$config['smtp_pass'] = 'YtreAsqw87Zx';

$config['charset'] = 'utf-8';

$config['mailtype'] = 'html';

$config['newline'] = "\r\n";



/* End of file email.php */



/* Location: ./system/application/config/email.php */



