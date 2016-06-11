<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/Config.php';

function route($page)
{
	$p = $_POST;
	$g = $_GET;

	$user = new Users();
	$gallery = new Gallery();
	$pageconfig = new PageConfig();
	$event = new Event();
	$masterevent = new MasterEventType();
	$subevent = new SubEventType();

	switch ($page) {
		case 'register':
				include "view/component/register.php";
			break;
		case 'save_register':
				$user->saveRegister($p);
			break;
		case 'login':
				include "view/component/login.php";
			break;
		case 'authenticate':
				$user->doLogin($p);
			break;

		case 'logout':
				$user->doLogout();
			break;

		// // // // // // // // // // ADMIN // // // // // // // // // // 

		case 'show_welcome':
				include "view/admin/show_welcome.php";
			break;

		#GALLERY
		case 'index_gallery':
				$data = $gallery->getImage();
				include "view/admin/gallery/index.php";
			break;
		case 'create_gallery':
				include "view/admin/gallery/create.php";
			break;
		case 'save_gallery':
				$gallery->saveImage($p);
			break;
		case 'edit_gallery':
				$data = $gallery->findImage($g['id_image']);
				include "view/admin/gallery/edit.php";
			break;
		case 'update_gallery':
				$gallery->updateImage($p);
			break;
		case 'delete_gallery':
				$gallery->deleteImage($g['id_image']);
			break;

		#PACKAGE
		case 'save_event_type':
				$masterevent->saveEventType($p);
			break;
		case 'update_event_type':
				$masterevent->updateEventType($p);
			break;
		case 'delete_event_type':
				$masterevent->deleteEventType($g['id_event_type']);
			break;

		case 'index_package':
				$data1 = $masterevent->index();
				$data2 = $subevent->index();
				include "view/admin/package/index.php";
			break;
		case 'create_package':
				include "view/admin/package/create.php";
			break;
		case 'save_package':
				$subevent->savePackagePrice($p);
			break;
		case 'edit_package':
				$data = $subevent->editPackage($g['id_package']);
				include "view/admin/package/edit.php";
			break;
		case 'update_package':
				$subevent->updatePackagePrice($p);
			break;
		case 'delete_package':
				$subevent->deletePackage($g['id_package']);
			break;

		#CONFIG
		case 'index_config':
				$data = $pageconfig->getPageList();
				include "view/admin/config/index.php";
			break;
		case 'edit_config':
				$data = $pageconfig->findPageConfig($g['type']);
				include "view/admin/config/edit.php";
			break;
		case 'update_config':
				$pageconfig->updatePageConfig($p);
				// echo htmlspecialchars($p['text']);
			break;

		#APPOINTMENT
		case 'index_appointment':
				$data = $event->index();
				include "view/admin/appointment/index.php";
			break;
		case 'detail_appointment':
				$data = $event->findEvent($g['id_event']);
				include "view/admin/appointment/detail.php";
			break;
		case 'save_appointment':
				$event->proccessAppointment($p);
			break;

		case 'delete_appointment':
				$event->deleteAppointment($g['id_event']);
			break;

		case 'change_password':
				include "view/component/change_password.php";
			break;
		case 'change_password_client':
				include "view/component/change_password_client.php";
			break;
		case 'update_password':
				$user->updatePassword($p);
			break;

		case 'edit_profile':
				$data = $user->getUser();
				include "view/component/edit_profile.php";
			break;
		case 'update_profile':
				$user->updateProfil($p);
			break;
		case 'index_report':
				if(isset($g['report_type'])){
					if($g['report_type'] == 'meeting'){
						$data = $event->getReport($g['tahun'].'-'.$g['bulan'], $g['report_type']);
					}elseif($g['report_type'] == 'event'){
						$data = $event->getReport($g['tahun'].'-'.$g['bulan'], $g['report_type']);
					}else{
						$data = null;
					}
				}else{
					$data = null;
				}
				include "view/admin/report/index.php";
			break;
		

		// // // // // // // // // // ADMIN // // // // // // // // // // 

		case 'check_schedule':
				include "view/visitor/schedule.php";
			break;
		
		case 'home':
				include "view/visitor/home.php";
			break;
		case 'gallery':
				include "view/visitor/gallery.php";
			break;
		case 'package':
				$data1 = $masterevent->index();
				include "view/visitor/package.php";
			break;
		case 'about':
				include "view/visitor/about.php";
			break;
		case 'send_appointment':
				$event->sendAppointment($p);
			break;
		case 'my_appointment':
				$data = $event->myAppointment();
				include "view/visitor/my_appointment.php";
			break;
		case 'detail_appointment_client':
				$data = $event->findEvent($g['id_event']);
				include "view/visitor/detail_appointment_client.php";
			break;
		case 'cancel_appointment':
				$event->cancelAppointment($g['id_event']);
			break;
		
		case 'main' :
				default : 
				Lib::redirect('home');
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/".Config::getConfig('rootdir')."/");
define("app_base", index."?page=");

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}