<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'login/index';
$route['404_override'] = 'E404';
$route['translate_uri_dashes'] = FALSE;
/* -- login -- */
$route['login'] = "login/index";
$route['login/phone'] = "login/Login_Phone";
/* empty phone filed*/
$route['phone'] = "signup/Empty_phone";
$route['phone/post'] = "signup/Empty_phone_entry";
/* -- signup -- */
$route['signup'] = "signup";
$route['signup/post'] = "signup/signup";
$route['signup/facebook'] = "signup/login_signup_facebook";
/*facebook*/
$route['facebook'] = "signup/facebook";
/*Car Model*/
$route['carmodelget'] = "CarModel/get";
$route['carmodelget/(:any)'] = "CarModel/get/$1";
/*Car Make*/
$route['carmakeget'] = "CarMake/get";
/*checking routs*/
$route['ajax/email'] = "ajax/email";
$route['ajax/phone'] = "ajax/phone";
$route['ajax/loginphone'] = "ajax/login_check_phone";
$route['ajax/otp'] = "ajax/is_otp_available";
$route['otp/send/(:any)'] = "ajax/send_otp/$1";
/*get cuntry code*/
$route['getcuntrycode/(:any)'] = "ajax/getcuntrycode/$1";
/*dashboard*/
$route['dashboard'] = "dashboard";
/*logout*/
$route['logout'] = "dashboard/logout";
/*GetLatLong */
$route['getlatlong/(:any)'] = "ajax/GetLatLong/$1";

/*upload station attachment*/
$route['station/AddStation'] = "station/add_station";
$route['station/ImagesUpload'] = "station/UploadImages";

/*get ev_power*/
$route['power/get'] = "ajax/get_power";

/*get ev_plugtype*/
$route['plugtype/get'] = "ajax/get_plugtype";

/*get filltered data with db and api*/
$route['api/(:num)'] = "station/api/$1";
$route['api2'] = "station/openchargeapi";
$route['distanceTime'] = "station/distanceTime";
$route['apiBeforeLogin'] = "station/apibeforelogin";

/*station*/
$route['station'] = "station/index";
$route['station/get/(:num)'] = "station/station_get/$1";
$route['station/add'] = "station/station_add";
$route['station/edit/(:num)'] = "station/station_edit/$1";

/*upload station attachment*/
$route['station/AddStation'] = "station/add_station";
$route['station/ImagesUpload'] = "station/UploadImages";

$route['station/GetFeilds'] = "Ajax/GetFields";
$route['station/GetStationInfo/(:num)'] = "station/GetStationInfo/$1";
