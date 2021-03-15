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
$route['default_controller'] = 'home/index';
// setting route for admin
$route['admin'] = 'auth';

// Admin Locations
$route['admin/company/common']        = 'admin/company';
$route['admin/company/machines']      = 'admin/machines';
$route['admin/company/finishes']      = 'admin/finishes';
$route['admin/company/services']      = 'admin/services';
$route['admin/company/machines/add']  = 'admin/machines/add';
$route['admin/company/machines/edit'] = 'admin/machines/edit';


$route['company/profile']              = 'company/company';
$route['company/common']               = 'company/company';
$route['company/machines']             = 'company/machines';
$route['company/machines/add']         = 'company/machines/add';
$route['company/machines/edit']        = 'company/machines/edit';
$route['company/finishes']             = 'company/finishes';
$route['company/services']             = 'company/services';
$route['company/orders/offers']        = 'company/offers';    
$route['company/orders/all']           = 'company/orders';
$route['company/orders/new']           = 'company/orders/index/5';
$route['company/orders/progress']      = 'company/orders/index/6';
$route['company/orders/completed']     = 'company/orders/index/7';

$route['company/products']             = 'company/media/products';
$route['company/certificates']         = 'company/media/certificates';
$route['company/gallery']              = 'company/media/gallery';
$route['company/dashboard']            = 'company/dashboard';

//$route['admin/company/media/products']     = 'company/media/products';
//$route['admin/company/media/certificates'] = 'company/media/certificates';
//$route['admin/company/media/gallery']      = 'company/media/gallery';




$route['customer/dashboard'] = 'admin/dashboard';

$route['admin/engeneer/common']  = 'admin/engeneer';

$route['new_order']='home/index';

$route['user/offers/sent']             = 'user/offers/index/0';
$route['user/offers/company-accepted'] = 'user/offers/index/1';
$route['user/offers/accepted']         = 'user/offers/index/2';
$route['user/offers/all-offers']       = 'user/offers/index/3';

$route['user/orders/progress']   = 'user/orders/index/6';
$route['user/orders/completed']  = 'user/orders/index/7';
$route['user/orders/all-orders']        = 'user/orders';

$route['engeneer/orders'] = 'engeneer/orders/index';
$route['engeneer/offers'] = 'engeneer/offers/index';

$route['admin/orders/all'] = 'admin/orders/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


////////// NEW
$route['user/shipping/(:any)'] = 'user/shipping/index/$1';