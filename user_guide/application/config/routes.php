<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['home/(:any)'] = 'home/home/$1';
$route['dashboard'] = 'home/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
