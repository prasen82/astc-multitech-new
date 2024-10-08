<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'login';
$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = "dashboard";

$route['logout'] = "dashboard/logout";
// master
$route['driver'] = "master/driver";
$route['staff'] = "master/staff";

$route['agency_a'] = "master/agency";


$route['conductor'] = "master/conductor";
$route['technician'] = "master/technician";
$route['route'] = "master/route";
$route['maintanance'] = "master/maintanance";
$route['bus'] = "master/bus";
$route['view_staff'] = "master/view_staff";
$route['view_employee'] = "master/view_employee";


$route['users'] = "master/user";
$route['departure'] = "master/departure";
$route['closing'] = "master/closing";

// report
$route['print_logsheet'] = "master/print_logsheet";
$route['print_receipt'] = "master/print_receipt";



$route['logsheet'] = "report/logsheet";
$route['tech_assign'] = "dashboard/assign_technician";
$route['tech_de_assign'] = "dashboard/technician_de_assign";
$route['remarks_update'] = "dashboard/update_remarks";
$route['status_update'] = "dashboard/update_status";
$route['under-maintanance'] = "dashboard/maintanance";
$route['maintanance-list'] = "dashboard/maintanance_list";
$route['buses'] = "report/bus";
$route['drivers'] = "report/driver";
$route['staffs'] = "report/staff";


$route['conductors'] = "report/conductors";

$route['technicians'] = "report/technicians";
$route['bus_left'] = "report/bus_left";

$route['not_gone'] = "report/bus_not_gone";

$route['bus_arrived'] = "report/bus_arrived";
$route['bus_collection'] = "report/bus_collection";
$route['penalty'] = "report/panelty";

$route['penalty_collection'] = "report/panelty_collection";

$route['licence_expired_driver'] = "report/licence_expired_driver";
$route['licence_expired_conductor'] = "report/licence_expired_conductor";
$route['licence_expiring_driver'] = "report/licence_expiring_driver";
$route['licence_expiring_conductor'] = "report/licence_expiring_conductor";


$route['collection_statement'] = "report/collection_statement";
$route['conductor_collection'] = "report/conductor_collection";

$route['conductor_wise_collection'] = "report/conductor_wise_collection";
$route['driver_wise_collection'] = "report/driver_wise_collection";
$route['vehicle_wise_collection'] = "report/vehicle_wise_collection";

$route['driver_attendance'] = "report/attendance_d";
$route['conductor_attendance'] = "report/attendance_c";

$route['status'] = "master/block_unblock";
$route['delete_restore'] = "master/delete_restore";



$route['block'] = "master/block_staff";

$route['changeStatus'] = "master/block_unblock_user";
$route['transaction_details'] = "report/transaction";

$route['transactions'] = "report/transaction_history";
$route['rebate_report'] = "report/rebate_report";


// Penalty
$route['driver_penalty'] = "report/driver_penalty";
$route['conductor_penalty'] = "report/conductor_penalty";
$route['agency_penalty'] = "report/agency_penalty";







// Settings
$route['password/reset'] = "dashboard/change_password";
$route['forgot_password'] = "email/forgot_password";
$route['change_status'] = "product/change_status";

//salary bill cronjob
$route['cronjob'] = "cronjob/cronjob";
$route['draft_bill_driver'] = "report/bill_draft_driver";
$route['draft_bill_conductor'] = "report/bill_draft_conductor";
$route['draft_bill_staff'] = "report/bill_draft_staff";

$route['final_bill_driver'] = "report/bill_final_driver";
$route['final_bill_conductor'] = "report/bill_final_conductor";
$route['final_bill_staff'] = "report/bill_final_staff";
$route['pf_statement_driver'] = "report/pf_statement_driver";
$route['pf_statement_conductor'] = "report/pf_statement_conductor";
$route['pf_statement_staff'] = "report/pf_statement_staff";
$route['print_payslip'] = "master/print_payslip";
$route['esic_statement_driver'] = "report/esic_statement_driver";
$route['esic_statement_conductor'] = "report/esic_statement_conductor";
$route['esic_statement_staff'] = "report/esic_statement_staff";

$route['advance_payment'] = "master/advance_payment";
$route['rebate'] = "master/rebate_";
$route['receipt'] = "master/receipt_";


$route['draft_update'] = "report/update_draft";
// server renew reminder
$route['server_error'] = "renew";

$route['(:any)'] = "login/$1";
