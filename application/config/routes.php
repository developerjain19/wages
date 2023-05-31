<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --------------Admin Route ------------------
$route['logout'] = 'Login/logout/';
$route['dashboard'] = 'Admin_Dashboard/index';

$route['work-update'] = 'Admin_Dashboard/work_update';
$route['work-update-add'] = 'Admin_Dashboard/work_update_add';
$route['qc-update'] = 'Admin_Dashboard/qc_update';
$route['staff-registration'] = 'Admin_Dashboard/staff_registration';
$route['staff-list'] = 'Admin_Dashboard/staff_list';
$route['staff-edit/(:any)'] = 'Admin_Dashboard/edit_staff/$1';


$route['labour-registration'] = 'Admin_Dashboard/labour_registration';
$route['labour-list'] = 'Admin_Dashboard/labour_list';
$route['labour-edit/(:any)'] = 'Admin_Dashboard/edit_labour/$1';

$route['division-add'] = 'Admin_Dashboard/division_add';
$route['division-list'] = 'Admin_Dashboard/division_list';
$route['division-edit/(:any)'] = 'Admin_Dashboard/edit_division/$1';


$route['resource-type-add'] = 'Admin_Dashboard/resource_type_add';
$route['resource-type-list'] = 'Admin_Dashboard/resource_type_list';
$route['resource-type-edit/(:any)'] = 'Admin_Dashboard/edit_resource_type/$1';

$route['permission-role'] = 'Admin_Dashboard/permission_role';
$route['my-profile'] = 'Admin_Dashboard/my_profile';

// --------------Website------------------ //
