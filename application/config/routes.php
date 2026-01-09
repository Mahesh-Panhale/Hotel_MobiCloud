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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
$route['login']              = 'welcome/login';
$route['login/action']       = 'welcome/login_action';
$route['logout']             = 'welcome/logout';

/*
|--------------------------------------------------------------------------
| DASHBOARD (COMMON FOR ALL ROLES)
|--------------------------------------------------------------------------
*/
$route['dashboard']          = 'welcome/dashboard';

/*
|--------------------------------------------------------------------------
| STAFF MANAGEMENT (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
$route['add-staff']          = 'welcome/add_staff';
$route['add-staff/action']  = 'welcome/add_staff_action';

$route['staff-list']         = 'welcome/staff_list';
$route['staff/edit/(:num)']  = 'welcome/edit_staff/$1';
$route['staff/update']       = 'welcome/update_staff';

$route['staff/activate/(:num)']   = 'welcome/activate_staff/$1';
$route['staff/deactivate/(:num)'] = 'welcome/deactivate_staff/$1';

/*
|--------------------------------------------------------------------------
| TASK MANAGEMENT (ADMIN)
|--------------------------------------------------------------------------
*/
$route['assign-task']        = 'welcome/assign_task';
$route['assign-task/action']= 'welcome/assign_task_action';

$route['tasks']              = 'welcome/all_tasks';
$route['tasks/pending']      = 'welcome/pending_tasks';
$route['tasks/completed']    = 'welcome/completed_tasks';

/*
|--------------------------------------------------------------------------
| STAFF TASK PAGES (STAFF / CLEANING / KITCHEN / SECURITY)
|--------------------------------------------------------------------------
*/
$route['my-tasks']           = 'welcome/my_tasks';
$route['task/update/(:num)'] = 'welcome/update_task/$1';
$route['task/save']          = 'welcome/save_task_update';

/*
|--------------------------------------------------------------------------
| PROFILE (READ ONLY)
|--------------------------------------------------------------------------
*/
$route['profile']            = 'welcome/profile';



