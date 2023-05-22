<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
//file names caps

//general pages
$route['default_controller'] = 'Home';
$route['about'] = 'Home/about';
$route['faq'] = 'Home/faq';
$route['contact'] = 'Home/contact';
$route['login'] = 'Home/login';
$route['logout'] = 'Home/logout';
$route['signup'] = 'Home/signup';
$route['shop-now'] = 'Home/shop_now';
$route['cart'] = 'Home/cart';
$route['product/(:num)'] = 'Home/product/$1';
$route['payment/(:any)'] = 'Home/payment/$1';
$route['complete-payment/(:num)'] = 'Home/complete_payment/$1';
//general pages

// admin pages
$route['admin'] = 'admin/Login';
$route['admin/logout'] = 'admin/Login/logout';
$route['admin/meals-report'] = 'admin/UserMeals/completed_meals';
$route['admin/user/approve/(:num)'] = 'admin/Users/approve_user/$1';
$route['admin/user/delete/(:num)'] = 'admin/Users/delete_user/$1';
$route['admin/depot/edit/(:num)'] = 'admin/Depot/add_depot/$1';
$route['admin/depot/delete/(:num)'] = 'admin/Depot/delete/$1';
$route['admin/product/edit/(:num)'] = 'admin/Products/add_product/$1';
$route['admin/product/delete/(:num)'] = 'admin/Products/delete/$1';
$route['admin/user-meals'] = 'admin/UserMeals';
$route['admin/user-meal/delete/(:num)'] = 'admin/UserMeals/delete/$1';
// admin pages
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
