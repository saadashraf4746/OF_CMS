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
//BASICS
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//LOGIN
$route['login']   = 'login/index';

//MANAGE SEASONS
$route['seasons'] 				      = 'seasons/index';
$route['manage-season/(:num)']        = 'seasons/manageSeason/$1';
$route['season-credentials/(:num)']   = 'seasons/manageCredential/$1';

//MANAGE GARDENS
$route['(:any)/add-garden/(:num)']    = 'seasons/addGarden/$1/$2';
$route['season/edit-garden/(:num)']   = 'seasons/editGarden/$1';
$route['season/(:num)/garden-detail/(:num)'] = 'seasons/gardenDetail/$1/$2';
$route['season/garden-detail/(:num)/edit/(:num)/(:num)'] = 'seasons/editForm/$1/$2/$3';
$route['season/add-expense/(:any)/(:any)']     = 'seasons/addExpense/$1/$2';
$route['transport-expense/(:any)/edit/(:num)'] = 'seasons/editTransportExpense/$1/$2';
$route['other-expense/(:any)/edit/(:num)']     = 'seasons/editOtherExpense/$1/$2';
$route['transport-expense/(:num)/detail/(:num)'] = 'seasons/transportExpenseDetail/$1/$2';
$route['(:num)/(:num)/change-attendance/(:any)/(:num)/(:num)'] = 'seasons/changeAttendance/$1/$2/$3/$4/$5';
$route['foreman-detail/(:num)/detail/(:num)']  = 'seasons/foremanDetail/$1/$2';
$route['season/(:num)/foreman/(:num)/labour-detail/(:num)']  = 'seasons/labourDetails/$1/$2/$3';
$route['season/(:num)/edit-pump-expense/(:num)']  = 'seasons/editPumpExpense/$1/$2';
$route['season/(:num)/edit-personal-expense/(:num)']  = 'seasons/editPersonalExpense/$1/$2';
$route['foreman/(:num)/edit/(:num)']  = 'seasons/editForeman/$1/$2';
$route['season/(:num)/foreman/(:num)/labour-edit/(:num)']  = 'seasons/labourEdit/$1/$2/$3';
$route['manage-season/personal-staff-detail/(:num)/(:num)']  = 'seasons/personalStaffDetail/$1/$2';
$route['manage-season/season-detail/(:num)']  = 'seasons/seasonOverallDetail/$1';

//MANAGE FACTORY
$route['manage-factory/(:num)']  = 'factory/manageFactory/$1';
$route['foreman-factory/(:num)/edit/(:num)']  = 'factory/editForeman/$1/$2';

//MANAGE-PURCHASES
$route['manage-purchases']	= 'factory/managePurchases/';
$route['manage-purchases/supplier-detail/(:num)'] = 'factory/supplierDetail/$1';
$route['manage-factory/add-purchases/(:num)'] = 'factory/addPurchases/$1';
$route['manage-factory/purchase-kinow'] = 'factory/purchaseKinow';
$route['manage-purchases/kinow-purchase-detail/(:num)'] = 'factory/kinowPurchaseDetail/$1';
$route['manage-purchases/edit-purchase-item/(:num)/(:any)'] = 'factory/editPurchaseItem/$1/$2';

//MANAGE WAREHOUSE
$route['manage-warehouse']	= 'factory/manageWarehouse/';

//MANAGE LABOUR
$route['manage-factory/manage-labour']       = 'factory/manageFactoryLabour';
$route['factory/add-expense/(:any)/(:any)']  = 'factory/addExpense/$1/$2';

//Manage Production
$route['manage-factory/manage-production']  = 'factory/manageProduction';
$route['manage-production/manage-customer/(:num)'] = 'factory/manageCustomer/$1';

//MANAGE SALES
$route['manage-factory/manage-sales'] = 'factory/manageSales/';
$route['manage-sales/sales-detail/(:any)'] = 'factory/saleDetail/$1';
$route['sales-detail/edit-sale/(:num)']    = 'factory/editSale/$1';
$route['sales-detail/set-amount/(:num)']   = 'factory/setSaleAmount/$1';

//MANAGE LABOUR
$route['foreman-detail-factory/(:num)/detail/(:num)']  = 'factory/foremanDetailFactory/$1/$2';
$route['factory/(:num)/foreman/(:num)/labour-edit/(:num)']  = 'factory/labourEdit/$1/$2/$3';
$route['factory/(:num)/foreman/(:num)/labour-detail/(:num)']  = 'factory/labourDetails/$1/$2/$3';

//MANAGE EXPENSES
$route['manage-factory/manage-expenses'] = 'factory/manageExpenses';
$route['factory/add-expense/(:any)/(:any)'] = 'factory/addExpense/$1/$2';
$route['transport-expense-factory/(:any)/edit/(:num)'] = 'factory/editTransportExpense/$1/$2';
$route['transport-expense-factory/(:num)/detail/(:num)'] = 'factory/transportExpenseDetail/$1/$2';
$route['manage-factory/personal-staff-detail/(:num)/(:num)']  = 'factory/personalStaffDetail/$1/$2';
$route['factory/(:num)/edit-pump-expense/(:num)']  = 'factory/editPumpExpense/$1/$2';
$route['factory/(:num)/edit-personal-expense/(:num)']  = 'factory/editPersonalExpense/$1/$2';
$route['other-expense-factory/(:any)/edit/(:num)']     = 'factory/editOtherExpense/$1/$2';

//MANAGE KARGAL
$route['manage-factory/manage-kargal'] = 'factory/manageKargal';