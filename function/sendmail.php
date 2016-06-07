<?php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'class/plugin/PHPMailer-master/PHPMailerAutoload.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';

$mail = new PHPMailer;

$event = new Event();
$data = $event->findEvent($_GET['id_event']);
// $data1 = $surat->findSuratMasuk($_GET['id_surat']);
// $data2 = $surat->raw("SELECT tbl_penerima.email, tbl_penerima.nama, tbl_pivot_surat_penerima.id_surat_masuk, tbl_penerima.id_penerima FROM tbl_pivot_surat_penerima INNER JOIN tbl_penerima ON tbl_pivot_surat_penerima.id_penerima = tbl_penerima.id_penerima where tbl_pivot_surat_penerima.id_surat_masuk = '".$_GET['id_surat']."'");
// $data3 = $surat->raw("SELECT * FROM tbl_lampiran where id_surat_masuk='".$_GET['id_surat']."'");
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                         // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fdw.semarang@gmail.com';                 // SMTP username
$mail->Password = 'rahasiadong';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('fdw.semarang@gmail.com', 'MailSys: Freedom Dance Works');
// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->addAddress('enncce@gmail.com', 'Joe User');     // Add a recipient
if($data == null)
{

}else{
foreach ($data as $key => $value) {

		$mail->addAddress(Lib::userEmail($value['id_user']));

		$mail->isHTML(true);                                  // Set email format to HTML

		$font1 = "'Catamaran'";
		$font2 = "'Oleo Script'";

		$mlbd[] = '<body style="font-family: sans-serif;">';
		$mlbd[] = '<div style="width:80%; margin:auto; text-align:center; font-family: sans-serif; color:#990033;">';
		$mlbd[] = '<span style="font-size:2.6em">Freedom Dance Works</span><br>';
		$mlbd[] = '<small style="font-size:0.9em">Kampung Putri 21 Mataram Bubakan Semarang | HP: 0812 2629 1001 | Email: office@dancebyfreedomworks.com</small>';
		$mlbd[] = '<hr style="padding: 0; margin:0px; border: none; border-top: medium double #990033; color: #333; text-align: center;">';
		$mlbd[] = '</div>';
		$mlbd[] = '<div style="width:80%; margin:auto; margin-top:20px;">';
		$mlbd[] = 'Dear <b>'.Lib::userName($value['id_user']).'</b>,<br>'; 
		$mlbd[] = 'Your appointment status now is <b><i>'.Lib::status($value['status']).'</i></b>, with the details as follows : ';
		$mlbd[] = '</div>';
		$mlbd[] = '<table width="80%" border="0" style="margin:auto; margin-top:10px; border-collapse:collapse">';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td colspan="2" style="background: #990033; color:#fff; font-size:17px; font-weight:bold; text-align:center; padding:10px;">Appointment Detail</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Client Name</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::userName($value['id_user']).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td colspan="2" width="50%" style="border:none; border-bottom: medium double #990033; font-weight:bold; color:#990033; padding:5px 10px 5px 10px;">Meeting Detail</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Meeting Dates</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::dateInd($value['meeting_date'], true).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Meeting Time</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.substr($value['meeting_time'], 0,5).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td colspan="2" width="50%" style="border:none; border-bottom: medium double #990033; font-weight:bold; color:#990033; padding:5px 10px 5px 10px;">Event Detail</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Event Name</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.$value['event_name'].'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Event Dates</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::dateInd($value['event_date'], true).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Event Start Time</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.substr($value['event_time'], 0,5).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Event Location</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.$value['event_location'].'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Event Type</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::EventName($value['id_event_type']).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Package</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::packageName($value['id_sub_event_type']).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td colspan="2" width="50%" style="border:none; border-bottom: medium double #990033; font-weight:bold; color:#990033; padding:5px 10px 5px 10px;">Appointment Status</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Status</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.Lib::status($value['status']).'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '<tr>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">Notes</td>';
		$mlbd[] = '<td width="50%" style="border:none; border-bottom: 1px solid #999; padding:5px 10px 5px 10px;">'.$value['note'].'</td>';
		$mlbd[] = '</tr>';
		$mlbd[] = '</table>';

		$mailhead = '<!DOCTYPE html><html><head><title></title><link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet" type="text/css"></head>';
		$mailbody = implode('', $mlbd);
		$mailfoot = '</body></html>';
		$mailfix = $mailhead.$mailbody.$mailfoot;

		$mail->Subject = 'Appointment Status Notification';
		$mail->Body    = $mailfix;
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
}}

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'Message has been sent';
    return true;
}