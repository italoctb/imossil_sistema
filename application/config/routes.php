<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome/login';
$route['login'] = 'welcome';
$route['invalid'] = 'welcome/erro_login';
$route['autenticate'] = 'welcome/autenticate';
$route['edit_user'] = 'welcome/edit_user/';
$route['processamento_user'] = 'welcome/processamento_user/';
$route['imoveis'] = 'welcome/imoveis';
$route['add_images/(:any)'] = 'welcome/add_images/$1';
$route['(:any)/bookpost_cliente'] = 'welcome/bookpost_cliente/$1';
$route['(:any)/add_post'] = 'welcome/add_post/$1';
$route['(:any)/(:any)/edit_post'] = 'welcome/edit_post/$1/$2';
$route['(:any)/(:any)/edit_post_cliente'] = 'welcome/edit_post_cliente/$1/$2';
$route['(:any)/(:any)/delete_post'] = 'welcome/delete_post/$1/$2';
$route['processamento'] = 'welcome/processamento';
$route['processamento_imgs'] = 'welcome/processamento_imgs';
$route['processamento_edit_cliente'] = 'welcome/processamento_edit_cliente';
$route['processamento_bookpost'] = 'welcome/processamento_bookpost';
$route['(:any)/delete_bookpost'] = 'welcome/delete_bookpost/$1';
$route['processamento_status/(:any)'] = 'welcome/processamento_status/$1';
$route['(:any)/change_status_cliente'] = 'welcome/change_status_cliente/$1';
$route['add_bookpost'] = 'welcome/add_bookpost/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
