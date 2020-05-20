<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// login
$route['Usernamecek'] = 'Login/Usernamecek';
$route['Passwordcek'] = 'Login/Passwordcek';
$route['Validate'] = 'Login/Validate';
$route['Log_Out'] = 'Login/Log_Out';




// masterhome
$route['Home'] = 'Master/Home';

//masterGuest_List
$route['List_Guest'] = 'Master/Guest';
$route['New_Guest'] = 'Master/Guest/create';
// $route['Gstatus'] = 'Master/Guest/status';
// $route['Gdestroy'] = 'Master/Guest/destroy';
$route['Gedit'] = 'Master/Guest/edit';



//masterCard_List
$route['List_Card'] = 'Master/Card';
$route['Card_Info'] = 'Master/Home';

//Room
$route['Room'] = 'Master/Room';