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
$route['work-update-edit/(:any)'] = 'Admin_Dashboard/edit_work_update/$1';


// $route['qc-update/(:any)'] = 'Admin_Dashboard/qc_update/$1';
$route['qc-update'] = 'Admin_Dashboard/qc_update/';
$route['qc-update'] = 'Admin_Dashboard/qc_update/';
$route['qc-update-list'] = 'Admin_Dashboard/qc_update_list/';
$route['qc-update-edit/(:any)'] = 'Admin_Dashboard/qc_update_edit/$1';

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
$route['select-division'] = 'Admin_Dashboard/select_division';

//----------division for admin & Manager ---------//
$route['select-divisions'] = 'Admin_Dashboard/select_divisions';
//----------division for admin & Manager ---------//

$route['staff-change-password/(:any)'] = 'Admin_Dashboard/staff_password/$1';


//--------------------Report section -----------------//
$route['reporting'] = 'Admin_Dashboard/reporting';
$route['employee-billing'] = 'Admin_Dashboard/employee_billing';
$route['employee-attendance'] = 'Admin_Dashboard/employee_attendance';
$route['QC-report'] = 'Admin_Dashboard/QC_report';
$route['work-update-filter'] = 'Admin_Dashboard/work_update_filter';
$route['raw-material'] = 'Admin_Dashboard/raw_material';

$route['hr-employee-attendance'] = 'Admin_Dashboard/hr_employee_attendance';
$route['labour-wise-productivity'] = 'Admin_Dashboard/labour_wise_productivity';


$route['quality-check'] = 'Admin_Dashboard/quality_check';
$route['open-list'] = 'Admin_Dashboard/open_list';


// --------------Website------------------ //
