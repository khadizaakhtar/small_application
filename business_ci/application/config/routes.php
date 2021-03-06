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
$route['default_controller'] = 'User';
//$route['404_override'] = '';
//$route['translate_uri_dashes'] = FALSE;

$route['joinnow'] = 'user/register';
$route['login'] = 'user/login';
$route['user/logout'] = 'user/logout';
$route['user_settings/(:any)'] = 'user/user_settings';
$route['update_settings/(:any)'] = 'user/update_settings';
$route['user_activities/(:any)'] = 'user/user_activities';
$route['business_listing/(:any)'] = 'user/business_listing';
$route['edit_listing/(:any)'] = 'user/edit_listing';
$route['update_listing/(:any)'] = 'user/update_listing';
$route['upload_multiple_image/(:any)'] = 'user/upload_multiple_image';
$route['save_image/(:any)'] = 'user/save_image';
$route['view_multiple_image/(:any)'] = 'user/view_multiple_image';
$route['update_company_main_image/(:any)/(:any)'] = 'user/update_company_main_image';
$route['delete_company_image/(:any)/(:any)'] = 'user/delete_company_image';
$route['delete_company_by_user/(:any)'] = 'user/delete_company_by_user';

$route['home'] = "user/index";
$route['listbusiness'] = 'business/list_a_business';
$route['check_mobilenumber_ajax'] = 'business/check_mobilenumber_ajax';
$route['get_subcategory_ajax'] = 'business/get_subcategory_ajax';

//$route['verify_company'] = 'business/verify_company';
$route['verify_company/(:any)'] = 'business/verify_company';
$route['resend_verification_code/(:any)'] = 'business/resend_verification_code'; //ajax
$route['update_verfication/(:any)'] = 'business/update_verfication';

$route['company_detail/(:any)'] = 'site/company_detail_view';
$route['save_review/(:any)'] = 'site/save_review';

$route['service_agreement'] = 'site/service_agreement';
$route['contact_us'] = 'site/contact_us';
$route['contact_with_authority'] = 'site/contact_with_authority';
$route['about_us'] = 'site/about_us';



$route['admin_site_settings'] = 'admin/admin_site_settings';
$route['update_site_settings'] = 'admin/update_site_settings';


//admin
$route['admin'] = 'admin/login';
$route['dashboard'] = 'admin/dashboard';
$route['change_admin_password'] = 'admin/change_admin_password';
$route['update_admin_password'] = 'admin/update_admin_password';
$route['edit_admin_profile'] = 'admin/edit_admin_profile';
$route['update_admin_detail/(:any)'] = 'admin/update_admin_detail';
$route['logout'] = 'admin/logout';

//admin category
$route['add_category'] = 'admin/add_category';
$route['save_category'] = 'admin/save_category';
$route['manage_category'] = 'admin/manage_category';
$route['edit_category/(:any)'] = 'admin/edit_category';
$route['update_category/(:any)'] = 'admin/update_category';

//admin city
$route['add_city'] = 'admin/add_city';
$route['manage_city'] = 'admin/manage_city';
$route['save_city'] = 'admin/save_city';
$route['edit_city/(:any)'] = 'admin/edit_city';
$route['update_city/(:any)'] = 'admin/update_city';
$route['delete_sms_info/(:any)'] = 'admin/delete_sms_info';

$route['admin_manage_sms'] = 'admin/admin_manage_sms';
$route['delete_city/(:any)'] = 'admin/delete_city';

//admin business directory (Company)
$route['add_company'] = 'business/admin_add_company';
$route['manage_company'] = 'business/admin_manage_company';
$route['company_verification/(:any)/(:any)'] = 'business/company_verification';
$route['save_company'] = 'business/admin_save_company';
$route['edit_company/(:any)'] = 'business/edit_company';
$route['update_company/(:any)'] = 'business/update_company';
$route['delete_company/(:any)'] = 'business/delete_company';

//admin manage user
$route['manage_user'] = 'admin/manage_user';
$route['edit_user/(:any)'] = 'admin/edit_user';
$route['update_user/(:any)'] = 'admin/update_user';
$route['delete_user/(:any)'] = 'admin/delete_user';

//admin manage reviews
$route['manage_reviews'] = 'admin/manage_reviews';
$route['delete_review/(:any)'] = 'admin/delete_review';
$route['update_review_status/(:any)/(:any)'] = 'admin/update_review_status';

//blog category
$route['blog'] = 'blog/add_blog_category';
$route['save_blog_category'] = 'blog/save_blog_category';
$route['manage_blog_category'] = 'blog/manage_blog_category';
$route['edit_blog_category/(:any)'] = 'blog/edit_blog_category';
$route['update_blog_category/(:any)'] = 'blog/update_blog_category';
$route['delete_blog_category/(:any)'] = 'blog/delete_blog_category';
$route['unpublished_category/(:any)'] = 'blog/unpublished_category';
$route['published_category/(:any)'] = 'blog/published_category';

//blog post
$route['add_blog_post'] = 'blog/add_blog_post';
$route['save_blog_post'] = 'blog/save_blog_post';
$route['manage_blog_post'] = 'blog/manage_blog_post';
$route['delete_blog_post/(:any)'] = 'blog/delete_blog_post';
$route['edit_blog_post/(:any)'] = 'blog/edit_blog_post';
$route['update_blog_post'] = 'blog/update_blog_post';
$route['unpublished_post/(:any)'] = 'blog/unpublished_post';
$route['published_post/(:any)'] = 'blog/published_post';


//font blog
$route['view_blog'] = 'blog/view_blog';
$route['view_blog/(:any)'] = 'blog/view_blog';
$route['recent_post/(:any)'] = 'blog/recent_post';
$route['blog_detail/(:any)'] = 'blog/blog_detail';
$route['save_comment/(:any)'] = 'blog/save_comment';


//home post
$route['show_post_by_id/(:any)'] = 'user/show_post_by_id';
$route['show_company/(:any)'] = 'user/show_company';
$route['show_company/(:any)/(:any)'] = 'user/show_company';
$route['show_company/(:any)/(:any)/(:any)'] = 'user/show_company';
$route['show_company/(:any)/(:any)/(:any)/(:any)'] = 'user/show_company';

$route['loadmore'] = 'site/loadmore';

$route['add_spot'] = 'admin/add_spot';
$route['save_spot'] = 'admin/save_spot';
$route['manage_spot'] = 'admin/manage_spot';
$route['delete_spot/(:any)'] = 'admin/delete_spot';
$route['edit_spot/(:any)'] = 'admin/edit_spot';
$route['update_spot/(:any)'] = 'admin/update_spot';


$route['search'] = 'user/search';
$route['search/(:any)'] = 'user/search';
$route['search/(:any)/(:any)'] = 'user/search';
$route['search/(:any)/(:any)/(:any)'] = 'user/search';
$route['search/(:any)/(:any)/(:any)/(:any)'] = 'user/search';
$route['search/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'user/search';
$route['search/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'user/search';
$route['search/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'user/search';