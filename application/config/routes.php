<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'user/HomeController';
$route['translate_uri_dashes'] = FALSE;

$route['portfolio'] = 'user/project/ProjectController/index';
$route['service-(:any)'] = 'user/service/ServiceController/index/$1/$1';
$route['about-us'] = 'user/about/AboutController/index';
$route['contact-us'] = 'user/contact/ContactController/index';
$route['career'] = 'user/moreinfo/MoreInfoController/career';
$route['blog'] = 'user/moreinfo/MoreInfoController/blog';
$route['quotetion'] = 'user/moreinfo/MoreInfoController/quotetion';
$route['business'] = 'user/UserController/business';
$route['query'] = 'user/UserController/query';
$route['subscribe'] = 'user/UserController/subscribe';
$route['job-apply'] = 'user/moreinfo/MoreInfoController/job_appication';
$route['quotation/send'] = 'user/quotation/QuotationController/insert';
//=========CUSTOM ERROR PAGE=======//
$route['403_override'] = 'ErrorController/error';
$route['404_override'] = 'ErrorController/error';
 // $route['404_override'] = '';
// $route['500_override'] = 'ErrorController/error';

/*==admin==*/
$route['admin'] = 'admin/AdminController';
$route['admin/verify'] = 'admin/AdminController/verify';
$route['admin/forgotpassword'] = 'admin/AdminController/forgotpass';
$route['admin/changepassword'] = 'admin/AdminController/resetpassword';
$route['admin/foorgot_pass_email'] = 'admin/AdminController/foorgot_pass_email';
$route['admin/dashboard'] = 'admin/DashboardController';
$route['logout'] = 'admin/AdminController/logout';

 // logo
$route['admin/logo'] = 'admin/setting/LogoController/logo';
$route['admin/logo_add'] = 'admin/setting/LogoController/logo_add';
$route['admin/logo/status'] = 'admin/setting/LogoController/status';
$route['admin/logo/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/LogoController/destroy/$1';
$route['admin/logo/edit_data'] = 'admin/setting/LogoController/edit_logo';
$route['admin/logo/update'] = 'admin/setting/LogoController/update_logo_data';
// Footer & Contact
$route['admin/footer_contact'] = 'admin/setting/FootContactController/footer_contact';
$route['admin/contact_add'] = 'admin/setting/FootContactController/contact_add';
$route['admin/footer_contact/status'] = 'admin/setting/FootContactController/status';
$route['admin/footer_contact/edit_data'] = 'admin/setting/FootContactController/edit_contact';
$route['admin/footer_contact/update'] = 'admin/setting/FootContactController/update_contact_data';
$route['admin/footer_contact/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/FootContactController/destroy/$1';
// Services
$route['admin/services'] = 'admin/services/ServicesController/services';
$route['admin/service_add'] = 'admin/services/ServicesController/service_add';
$route['admin/services/status'] = 'admin/services/ServicesController/status';
$route['admin/services/edit_data'] = 'admin/services/ServicesController/edit_services';
$route['admin/services/update'] = 'admin/services/ServicesController/update_services_data';
$route['admin/services/destroy/([a-zA-Z0-9]+)'] = 'admin/services/ServicesController/destroy/$1';   
// Services Type
$route['admin/services_type'] = 'admin/services/ServicesTypeController/services_type';
$route['admin/services_add'] = 'admin/services/ServicesTypeController/services_add';
$route['admin/services_type/status'] = 'admin/services/ServicesTypeController/status';
$route['admin/services_type/edit_data'] = 'admin/services/ServicesTypeController/edit_service_type';
$route['admin/services_type/update'] = 'admin/services/ServicesTypeController/update_service_type';
$route['admin/services_type/destroy/([a-zA-Z0-9]+)'] = 'admin/services/ServicesTypeController/destroy/$1';
// Banner
$route['admin/banner'] = 'admin/setting/BannerController/banner';
$route['admin/add_banner'] = 'admin/setting/BannerController/banner_add';
$route['admin/banner/status'] = 'admin/setting/BannerController/status';
$route['admin/banner/edit_data'] = 'admin/setting/BannerController/edit_banner';
$route['admin/banner/update'] = 'admin/setting/BannerController/update_banner';
$route['admin/banner/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/BannerController/destroy/$1';
//Mission
$route['admin/mission'] = 'admin/setting/MissionController/mission';
$route['admin/add_mission'] = 'admin/setting/MissionController/add_mission';
$route['admin/mission/status'] = 'admin/setting/MissionController/status';
$route['admin/mission/edit_data'] = 'admin/setting/MissionController/edit_mission';
$route['admin/mission/update'] = 'admin/setting/MissionController/update_mission';
$route['admin/mission/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/MissionController/destroy/$1';

//Vision
$route['admin/vision'] = 'admin/setting/VisionController/vision';
$route['admin/add_vision'] = 'admin/setting/VisionController/add_vision';
$route['admin/vision/status'] = 'admin/setting/VisionController/status';
$route['admin/vision/edit_data'] = 'admin/setting/VisionController/edit_vision';
$route['admin/vision/update'] = 'admin/setting/VisionController/update_vision';
$route['admin/vision/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/VisionController/destroy/$1';




//Technologies
$route['admin/technologies'] = 'admin/setting/TechnologiesController/technologies'; 
$route['admin/add_technologies'] = 'admin/setting/TechnologiesController/add_technologies';
$route['admin/technologies/status'] = 'admin/setting/TechnologiesController/status';
$route['admin/technologies/edit_data'] = 'admin/setting/TechnologiesController/edit_technologies';
$route['admin/technologies/update'] = 'admin/setting/TechnologiesController/update_technologies';
$route['admin/technologies/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/TechnologiesController/destroy/$1';

//choosenit
$route['admin/choosenit'] = 'admin/setting/ChooseNitController/choosenit'; 
$route['admin/add_choosenit'] = 'admin/setting/ChooseNitController/add_choosenit';
$route['admin/choosenit/status'] = 'admin/setting/ChooseNitController/status';
$route['admin/choosenit/edit_data'] = 'admin/setting/ChooseNitController/edit_choosenit';
$route['admin/choosenit/update'] = 'admin/setting/ChooseNitController/update_choosenit';
$route['admin/choosenit/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/ChooseNitController/destroy/$1';

//Portfolio 
$route['admin/portfolio'] = 'admin/setting/PortfolioController/portfolio'; 
$route['admin/add_portfolio'] = 'admin/setting/PortfolioController/add_portfolio';
$route['admin/portfolio/status'] = 'admin/setting/PortfolioController/status';
$route['admin/portfolio/edit_data'] = 'admin/setting/PortfolioController/edit_portfolio';
$route['admin/portfolio/update'] = 'admin/setting/PortfolioController/update_portfolio';
$route['admin/portfolio/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/PortfolioController/destroy/$1';

//Workflow 
$route['admin/workflow'] = 'admin/setting/WorkFlowController/workflow'; 
$route['admin/add_workflow'] = 'admin/setting/WorkFlowController/add_workflow';
$route['admin/workflow/status'] = 'admin/setting/WorkFlowController/status';
$route['admin/workflow/edit_data'] = 'admin/setting/WorkFlowController/edit_workflow';
$route['admin/workflow/update'] = 'admin/setting/WorkFlowController/update_workflow';
$route['admin/workflow/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/WorkFlowController/destroy/$1';

//job_summary
$route['admin/job_summary'] = 'admin/setting/JobSummaryController/job_summary'; 
$route['admin/add_job_summary'] = 'admin/setting/JobSummaryController/add_job_summary';
$route['admin/job_summary/view/([a-zA-Z0-9]+)'] = 'admin//JobSummaryController/view/$1';
$route['admin/update_job_summary'] = 'admin/setting/JobSummaryController/update_job_summary';
$route['admin/job_summary/status'] = 'admin/setting/JobSummaryController/status';
$route['admin/job_summary/destroy/([a-zA-Z0-9]+)'] = 'admin/setting/JobSummaryController/destroy/$1';
//Business
$route['admin/business'] = 'admin/business/BusinessController/business';
//job_apply
$route['admin/job_apply'] = 'admin/job_apply/JobApplyController/job_apply';
//query
$route['admin/query'] = 'admin/query/QueryController/query';
