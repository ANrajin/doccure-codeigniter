<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login', ['as' => 'login']);
$routes->post('login', 'Home::auth');
$routes->get('register', 'Home::register', ['as' => 'signup']);
$routes->post('register', 'Home::authregister');
$routes->post('division/(:num)', 'Home::division/$1');

//Doctor account verification
$routes->get('verification/(:any)', 'UserControllers\DashboardController::verify/$1');
/**
 * Users Routes
 */
$routes->group('/', ['filter' => 'user-auth'], function ($routes) {
	$routes->post('logout', 'Home::logout');
	//Doctor views routes
	$routes->get('doctor', 'UserControllers\DashboardController::index');
	$routes->get('schedule-timings', 'UserControllers\ScheduleController::index');
	$routes->post('schedule-timings', 'UserControllers\ScheduleController::store');
	$routes->get('doctor-profile', 'UserControllers\DashboardController::profile');
	$routes->post('doctor-profile', 'UserControllers\DashboardController::store');
	$routes->get('prescriptions', 'UserControllers\PresController::index');
	$routes->post('prescriptions', 'UserControllers\PresController::store');
	$routes->get('get-medicines', 'UserControllers\PresController::getMed');
	$routes->get('presc-list', 'UserControllers\PresController::prescList');
	$routes->get('appt-info/(:num)', 'UserControllers\PresController::apptInfo/$1');
	//paitents views routes
	$routes->get('patient', 'UserControllers\PatientController::index');
});

/**
 * System Admin Routes are defined here
 */
$routes->get('admin', 'AdminController::index', ['as' => 'system_admin']);
$routes->post('admin', 'AdminController::auth');
$routes->group('admin', ['filter' => 'admin-auth'], function ($routes) {
	$routes->post('logout', 'AdminController::logout');
	$routes->get('dashboard', 'AdminControllers\DashboardController::index', ['as' => 'adminDashboard']);
	//User Management routes
	$routes->get('manage-users', 'AdminControllers\UserController::index');
	$routes->post('add-users', 'AdminControllers\UserController::store');
	$routes->get('edit-user/(:num)', 'AdminControllers\UserController::edit/$1');
	$routes->post('update-user', 'AdminControllers\UserController::update');
	$routes->get('remove-user/(:num)', 'AdminControllers\UserController::destroy/$1');
	//user roles management
	$routes->get('user-roles', 'AdminControllers\RolesController::index');
	$routes->post('add-roles', 'AdminControllers\RolesController::store');
	$routes->get('edit-role/(:num)', 'AdminControllers\RolesController::edit/$1');
	$routes->post('update-role', 'AdminControllers\RolesController::update');
	$routes->get('remove-role/(:num)', 'AdminControllers\RolesController::destroy/$1');
	//medicines
	$routes->get('medicines', 'AdminControllers\MedicineController::index');
	$routes->post('add-medicine', 'AdminControllers\MedicineController::store');
	$routes->get('edit-medicine/(:num)', 'AdminControllers\MedicineController::edit/$1');
	$routes->post('update-medicine', 'AdminControllers\MedicineController::update');
	$routes->get('remove-medicine/(:num)', 'AdminControllers\MedicineController::destroy/$1');
	//medicine Category
	$routes->get('medicine-category', 'AdminControllers\MedCatController::index');
	$routes->post('add-med-category', 'AdminControllers\MedCatController::store');
	$routes->get('edit-med-category/(:num)', 'AdminControllers\MedCatController::edit/$1');
	$routes->post('update-med-category', 'AdminControllers\MedCatController::update');
	$routes->get('remove-med-category/(:num)', 'AdminControllers\MedCatController::destroy/$1');
	//medicine manufacturer
	$routes->get('medicine-manufacturer', 'AdminControllers\MedMfController::index');
	$routes->post('add-med-manufacturer', 'AdminControllers\MedMfController::store');
	$routes->get('edit-med-manufacturer/(:num)', 'AdminControllers\MedMfController::edit/$1');
	$routes->post('update-med-manufacturer', 'AdminControllers\MedMfController::update');
	$routes->get('remove-med-manufacturer/(:num)', 'AdminControllers\MedMfController::destroy/$1');
	//appointment
	$routes->get('appointment', 'AdminControllers\ApptController::index');
	$routes->get('appt-list', 'AdminControllers\ApptController::apptList');
	$routes->get('remove-appt/(:num)', 'AdminControllers\ApptController::destroyAppt/$1');
	$routes->get('get-schedule/(:num)', 'AdminControllers\ApptController::getSchedule/$1');
	$routes->post('appointment', 'AdminControllers\ApptController::store');
	//doctors list
	$routes->get('doctors', 'AdminControllers\DoctorController::index');
	$routes->get('remove-doctor/(:num)', 'AdminControllers\DoctorController::destroy/$1');
	//doctors Payment
	$routes->get('doctors-payment', 'AdminControllers\DoctorPaymentController::index');
	$routes->post('add-doctor-payment', 'AdminControllers\DoctorPaymentController::store');
	$routes->get('doctors-payment/(:num)', 'AdminControllers\DoctorPaymentController::edit/$1');
	$routes->post('update-doctor-payment', 'AdminControllers\DoctorPaymentController::update');
	$routes->get('delete-doctors-payment/(:num)', 'AdminControllers\DoctorPaymentController::destroy/$1');
	//prescriptions
	$routes->get('prescriptions', 'AdminControllers\DoctorController::prescriptions');
	$routes->get('print-prescription/(:num)', 'AdminControllers\InvoiceController::print/$1');
	//invoice
	$routes->get('invoice', 'AdminControllers\InvoiceController::index');
	$routes->post('invoice', 'AdminControllers\InvoiceController::store');
	$routes->get('invoice-info/(:num)', 'AdminControllers\InvoiceController::getInfo/$1');
	//patient
	$routes->get('patients', 'AdminControllers\PatientController::index');
});
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
