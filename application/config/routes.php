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
$route['default_controller']    = 'C_front';
$route['default_controller/(:any)'] = 'C_front';
$route['paging/(:any)'] = 'C_front';
$route['paging'] = 'C_front';

$route['404_override']          = 'C_error404';

//Front
$route['front']                 = 'C_front';
$route['message']               = 'C_front/message';
$route['front/message']         = 'C_front/message';
$route['cari']                  = 'C_front/cari';


//Login Owner
$route['login']                 = 'C_loginOwner';
$route['front/login']           = 'C_loginOwner';
$route['signUp']                = 'C_loginOwner/signUp';
$route['login/signUp']          = 'C_loginOwner/signUp';
$route['authOwner']             = 'C_loginOwner/auth';
$route['authOwner/(:any)']      = 'C_loginOwner/auth';
$route['login/authOwner']       = 'C_loginOwner/auth';
$route['signUp/auth']           = 'C_loginOwner/signUpAuth';
$route['login/signUp/auth']     = 'C_loginOwner/signUpAuth';
$route['logout/owner']          = 'C_loginOwner/logout';

//Login Admin
$route['admin']                 = 'C_loginAdmin';
$route['authAdmin']             = 'C_loginAdmin/auth';
$route['authAdmin/(:any)']      = 'C_loginAdmin/auth';
$route['admin/authAdmin']       = 'C_loginAdmin/auth';
$route['logout/admin']          = 'C_loginAdmin/logout';

//Back Admin
$route['dashboard']             = 'C_backAdmin';
$route['dashboard/admin']       = 'C_backAdmin';
$route['controlPanel']          = 'C_backAdmin';
$route['inbox']                 = 'C_backAdmin/showInbox';
$route['inbox/trash']           = 'C_backAdmin/showDeletedInbox';
$route['inbox/readed']          = 'C_backAdmin/showReadedInbox';
$route['readInbox']             = 'C_backAdmin/showInbox';
$route['manageAdmin']           = 'C_backAdmin/showAdmin';
$route['updateAdmin']           = 'C_backAdmin/showAdmin';
$route['manageAdmin/KotBDG']    = 'C_backAdmin/showAdmin';
$route['manageAdmin/KabBDG']    = 'C_backAdmin/kabBDG';
$route['manageAdmin/KabBDGB']   = 'C_backAdmin/kabBDGB';
$route['manageAdmin/KotCMH']    = 'C_backAdmin/kotCMH';
$route['manageOwner']           = 'C_backAdmin/showOwner';
$route['updateOwner']           = 'C_backAdmin/showOwner';
$route['manageOwner/aktif']     = 'C_backAdmin/showOwner';
$route['manageOwner/nonAktif']  = 'C_backAdmin/showOwnerN';
$route['profile/adm']           = 'C_backAdmin/profile';
$route['addAdmin']              = 'C_backAdmin/addAdmin';
$route['addLocation/kotaBDG']   = 'C_backAdmin/addKotaBDG';
$route['addLocation/kabBDG']    = 'C_backAdmin/addKabBDG';
$route['addLocation/BDGBarat']  = 'C_backAdmin/addBDGBarat';
$route['addLocation/cimahi']    = 'C_backAdmin/addCimahi';
$route['manage/kotaBDG']        = 'C_backAdmin/manageKotaBDG';
$route['manage/kabBDG']         = 'C_backAdmin/manageKabBDG';
$route['manage/BDGBarat']       = 'C_backAdmin/manageBDGBarat';
$route['manage/cimahi']         = 'C_backAdmin/manageCimahi';

//Back owner
$route['owner']                 = 'C_backOwner';
$route['dashboard/owner']       = 'C_backOwner';
$route['profile/owner']         = 'C_backOwner/profile';
$route['insert/loc']            = 'C_backOwner/insertLoc';
//$route['manage/loc/:any']       = 'C_backOwner/manageLoc';

$route['translate_uri_dashes'] = FALSE;
