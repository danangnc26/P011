<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';

if(isset($_GET['func'])){
	$func = $_GET['func'];
}else{
	$func = '';
}

switch ($func) {
	case 'list_jenis':
		$res = Lib::listJenis($_GET['id_kategori'], $_GET['opt']);
		break;
	case 'list_bahan':
		$res = Lib::listBahan($_GET['id_kategori'], $_GET['opt']);
		break;
	case 'check_quota':
		$res_temp = Lib::checkQuota($_GET['date']);
		$res = json_encode($res_temp);
		break;
	case 'generate_event_xml':
		$res = Lib::generateXMLDate();
		break;
	case 'dropdown_sub_event_type':
		$res = Lib::dropdownSubEventType(null, true, $_GET['id_event_type']);
		break;
	
	default:
		$res = '';
		break;
}

echo $res;
