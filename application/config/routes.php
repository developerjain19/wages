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
$route['qc-update-list'] = 'Admin_Dashboard/qc_update_list/';
$route['qc-update-edit/(:any)'] = 'Admin_Dashboard/qc_update_edit/$1';

$route['staff-registration'] = 'Admin_Dashboard/staff_registration';
$route['staff-list'] = 'Admin_Dashboard/staff_list';
$route['staff-edit/(:any)'] = 'Admin_Dashboard/edit_staff/$1';

$route['dispatch-add'] = 'Admin_Dashboard/dispatch_add/';
$route['dispatched-list'] = 'Admin_Dashboard/dispatch_list/';
$route['dispatch-edit/(:any)'] = 'Admin_Dashboard/dispatch_edit/$1';


$route['labour-registration'] = 'Admin_Dashboard/labour_registration';
$route['labour-list'] = 'Admin_Dashboard/labour_list';
$route['labour-edit/(:any)'] = 'Admin_Dashboard/edit_labour/$1';

$route['company-add'] = 'Admin_Dashboard/company_add';
$route['company-list'] = 'Admin_Dashboard/company_list';
$route['company-edit/(:any)'] = 'Admin_Dashboard/edit_company/$1';


$route['resource-type-add'] = 'Admin_Dashboard/resource_type_add';
$route['resource-type-list'] = 'Admin_Dashboard/resource_type_list';
$route['resource-type-edit/(:any)'] = 'Admin_Dashboard/edit_resource_type/$1';

$route['permission-role'] = 'Admin_Dashboard/permission_role';
$route['my-profile'] = 'Admin_Dashboard/my_profile';
$route['select-company'] = 'Admin_Dashboard/select_company';


$route['raw-material'] = 'Admin_Dashboard/raw_material';
$route['raw-material-add'] = 'Admin_Dashboard/raw_material_add';
$route['raw-material-edit/(:any)'] = 'Admin_Dashboard/edit_raw_material/$1';


$route['incentive-range-add'] = 'Admin_Dashboard/incentive_range_add';
$route['incentive-range-list'] = 'Admin_Dashboard/incentive_range_list';
$route['incentive-range-edit/(:any)'] = 'Admin_Dashboard/edit_incentive_range/$1';

//----------company for admin & Manager ---------//
$route['company-select'] = 'Admin_Dashboard/company_select';
//----------company for admin & Manager ---------//

$route['staff-change-password/(:any)'] = 'Admin_Dashboard/staff_password/$1';


//--------------------Report section -----------------//
$route['reporting'] = 'Admin_Dashboard/reporting';
$route['employee-billing'] = 'Admin_Dashboard/employee_billing';
$route['employee-attendance'] = 'Admin_Dashboard/employee_attendance';
$route['QC-report'] = 'Admin_Dashboard/QC_report';
$route['work-update-filter'] = 'Admin_Dashboard/work_update_filter';
$route['raw-material-report'] = 'Admin_Dashboard/raw_material_report';

$route['hr-employee-attendance'] = 'Admin_Dashboard/hr_employee_attendance';
$route['labour-wise-productivity'] = 'Admin_Dashboard/labour_wise_productivity';


$route['quality-check'] = 'Admin_Dashboard/quality_check';
$route['open-list'] = 'Admin_Dashboard/open_list';

$route['dispatched-report'] = 'Admin_Dashboard/dispatch_report/';
$route['chart'] = 'Admin_Dashboard/chart/';


// --------------Website------------------ //
