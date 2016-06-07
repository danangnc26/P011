<?php
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';

Class Lib{

	public static function redirect($loc)
	{
		header('Location:'.app_base.$loc);
	}

	public static function redirectjs($src = '', $msg = '')
	{
		$r 	= '<script>';
		$r .= (!empty($msg)) ? 'alert("'.$msg.'");' : '';
		$r .= 'location.replace("'.$src.'")';
		$r .= '</script>';
		return $r;
	}

	public static function uCheck()
	{
		$logged_in = false;
		//jika session username belum dibuat, atau session username kosong
		if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {	
			//redirect ke halaman login
			// header("Location:index.php?page=login");
			Lib::redirect('login');
		} else {
			$logged_in = true;
		}
		
	}

	public static function userName($id)
	{
		$u = new Users();
		$result2 = $u->findBy('id_user', $id);
		return $result2[0]['name'];
	}

	public static function userEmail($id)
	{
		$u = new Users();
		$result2 = $u->findBy('id_user', $id);
		return $result2[0]['email'];
	}

	public static function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	public static function random_color() {
	    return '#'.Lib::random_color_part() . Lib::random_color_part() . Lib::random_color_part();
	}

	public static function status($v)
	{
		switch ($v) {
			case '-':
				$vf = 'Request Rejected';
				break;
			case '0':
				$vf = 'Pending Request';
				break;
			case '1':
				$vf = 'Meeting Request Approved';
				break;
			case '2':
				$vf = 'Event Plan Approved';
				break;
			// case '3':
			// 	$vf = 'Pesanan Dikirim';
			// 	break;
			// case '4':
			// 	$vf = 'Pesanan Selesai';
			// 	break;
			
			default:
				$vf = '';
				break;
		}
		return $vf;
	}

	public static function dropdownEventType($opt = '')
	{
		$s[] = '<option value="">-- Choose Event Type --</option>';
		$j = new MasterEventType();
		$result = $j->findAll();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_event_type'] == $opt) ? '<option  selected value="'.$value['id_event_type'].'">'.$value['event_type_name'].'</option>' : '<option value="'.$value['id_event_type'].'">'.$value['event_type_name'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function dropdownSubEventType($opt = '', $st = false, $i = '')
	{
		$s[] = '<option value="">-- Choose Package --</option>';
		$j = new SubEventType();
		$result = ($st == true) ? $j->findBy('id_event_type', $i) : $j->findAll();
		if($result != null){
			foreach($result as $value){
				$s[] = ($value['id_sub_event_type'] == $opt) ? '<option  selected value="'.$value['id_sub_event_type'].'">'.$value['sub_event_type_name'].'</option>' : '<option value="'.$value['id_sub_event_type'].'">'.$value['sub_event_type_name'].'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function SubEventType($id)
	{
		$j = new SubEventType();
		$result = $j->findBy('id_event_type', $id);
		return $result;
	}

	public static function countSubEventType($id)
	{
		$j = new SubEventType();
		$result = $j->findBy('id_event_type', $id);
		return count($result);
	}

	public static function EventName($id)
	{
		$j = new MasterEventType();
		$result = $j->findBy('id_event_type', $id);
		return $result[0]['event_type_name'];
	}

	public static function packageName($id)
	{
		$j = new SubEventType();
		$result = $j->findBy('id_sub_event_type', $id);
		return $result[0]['sub_event_type_name'];
	}

	public static function uploadImg($post)
	{
		$f_name = mt_rand(10000, 99999).'.jpg';
		if(isset($post) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['image']['name'];
			$size = $_FILES['image']['size'];
			$tmp = $_FILES['image']['tmp_name'];
			$path = "public/images/";
			move_uploaded_file($tmp, $path.$f_name); //Stores the image in the uploads folder
		}
		return $f_name;
	}

	public static function listImageLocation($opt = '')
	{
		$s[] = '<option value="">-- Choose Image Location --</option>';
		$j = new Gallery();
		$result =  $j->enumList('image_location');
		if($result != null){
			foreach($result as $value){
				$s[] = ($value == $opt) ? '<option  selected value="'.$value.'">'.ucfirst($value).'</option>' : '<option value="'.$value.'">'.ucfirst($value).'</option>';
			}
		}else{
			$s = [];
		}
		return implode('', $s);
	}

	public static function tblNotFound($jml)
	{
		return "<tr><td align='center' colspan='".$jml."'> -- Data not Found -- </td></tr>";
	}

	public static function nltxt($str = '')
    {
    	$breaks = array("<br />","<br>","<br/>");  
   		// $text = str_ireplace($breaks, "\r\n", $str);
   		$text = str_ireplace($breaks, "", $str);
   		return $text;
    }

    public static function page($pg)
    {
    	$j = new PageConfig();
    	$result = $j->findBy('type', $pg);
    	return $result;
    }

    public static function getImages($type)
    {
    	$j =  new Gallery();
    	$result = $j->findBy('image_location', $type);
    	return $result;
    }

    public static function ind($str = '')
	{
		// if(is_numeric($str)){
			
		// }else{
		// 	return 'Bukan Angka';
		// }
		return 'Rp. '.number_format($str, 0, ',', '.');	
	}

    public static function dateInd($str = '', $s = false) {
        setlocale (LC_TIME, 'id_ID');
        if($s == true){
        	$date = strftime( "%d-%m-%Y", strtotime($str));
        	// $date = strftime( "%Y-%m-%d", strtotime($dt[2].'-'.$dt[1].'-'.$dt[0]));
        }else{
        	$dt = explode('-', $str);
        	$date = strftime( "%Y-%m-%d", strtotime($dt[0].'-'.$dt[1].'-'.$dt[2]));
        }

        return $date;
    }

    public static function getStartEndWeek($week, $year)
    {
  //   	$week = 22;
		// $year = 2016;
		$time = strtotime("1 January $year", time());
	    $day = date('w', $time);
	    $time += ((7*$week)+1-$day)*24*3600;
	    $return[0] = date('Y-n-j', $time);
	    $time += 6*24*3600;
	    $return[1] = date('Y-n-j', $time);
	    return $return;
    }

    public static function getWeek($dt)
    {
    	// $ddate = date("Y-m-d");
    	$ddate = $dt;
		$date = new DateTime($ddate);
		$week = $date->format("W");
		return intval($week);
    }

    public static function checkQuota($date)
    {
    	$d = [];
    	$d['one_day'] = Lib::oneDay($date);
    	$d['one_week']	= Lib::aWeek($date);
    	return $d;
    }

    public static function oneDay($date)
    {
    	$j = new Event();
    	$result = $j->raw("SELECT count(id_event) as jml FROM tbl_event where event_date='".Lib::dateInd($date)."'");
    	if($result == null){
    		$rs = null;
    	}else{
    		$rs = $result[0];
    	}
    	return $rs;
    }

     public static function aWeek($date)
    {
    	$yr = explode('-', $date);
    	$year = intval($yr[2]);
    	$wk = Lib::getWeek(Lib::dateInd($date));
    	$dt = Lib::getStartEndWeek($wk, $year);

    	$dt1 = $dt[0].' 00:00:00';
    	$dt2 = $dt[1].' 00:00:00';

    	$j = new Event();
    	$result = $j->raw("SELECT count(id_event) as jml FROM tbl_event where (event_date between '".$dt1."' and '".$dt2."');");
    	if($result == null){
    		$rs = null;
    	}else{
    		$rs = $result[0];
    	}
    	return $rs;
    }

    public static function counPendingAppointment()
    {
    	$j = new Event();
    	$result = $j->raw("SELECT count(id_event) as jml FROM tbl_event where status=0");
    	return $result[0]['jml'];
    }

    public static function generateXMLDate()
    {
    	$j = new Event();
    	$result = $j->findAll('where status=2');

    	$doc = new DomDocument('1.0');                              //memanggil DOMDocument Class
	    $root = $doc->createElement('monthly');                        //Buat element baru <news>
	    $root = $doc->appendChild($root);  

	    // for ($i=0; $i < count($result); $i++) { 
	    	
        	foreach ($result as $key => $value) {
        		$item= $doc->createElement('event');                 
        		$item = $root->appendChild($item);
        		// *

        		$child = $doc->createElement('id');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode($key+1);    
	            $vx = $child->appendChild($vx);

	            // 

	            $child = $doc->createElement('name');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode($value['event_name']);    
	            $vx = $child->appendChild($vx);

	            // 

	            $child = $doc->createElement('startdate');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode($value['event_date']);    
	            $vx = $child->appendChild($vx);

	             // 

	            $child = $doc->createElement('enddate');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode($value['event_date']);    
	            $vx = $child->appendChild($vx);

	            // 

	            $child = $doc->createElement('starttime');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode(substr($value['event_time'], 0,5));    
	            $vx = $child->appendChild($vx);

	            // 

	            $child = $doc->createElement('color');      
	            $child = $item->appendChild($child);           
	         
	            $vx = $doc->createTextNode(Lib::random_color());    
	            $vx = $child->appendChild($vx);



        	}
	    // }

	    return $doc->saveXML();
    }

/*    <?xml version="1.0"?>
<monthly>

	<event>
		<id>1</id>
		<name>Event Name 1</name>
		<startdate>2016-4-1</startdate>
		<enddate></enddate>
		<starttime>9:00</starttime>
		<endtime>10:00</endtime>
		<color>#ffb128</color>
		<url>http://www.google.com</url>
	</event>
	*/
//     SELECT *
// FROM `objects`
// WHERE (date_field BETWEEN '2010-01-30 14:15:55' AND '2010-09-29 10:15:55')

}