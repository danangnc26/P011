<?php
class Event extends Core{

	protected $table 		= 'tbl_event'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_event';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll('order by event_date desc');
	}

	public function findEvent($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function sendAppointment($input)
	{
		try {
			$data = [
					'event_date'		=>	Lib::dateInd($input['event_date_book']),
					'meeting_date'		=>	Lib::dateInd($input['meeting_date']),
					'meeting_time'		=>	$input['meeting_time'],
					'event_location'	=>	$input['event_location'],
					'id_event_type'		=>	$input['id_event_type'],
					'id_sub_event_type'	=>	$input['id_sub_event_type'],
					'id_user'			=>	$_SESSION['id_user'],
					'status'			=>	0
					];
			if($this->save($data)){
				// Lib::redirect('check_schedule');
				echo Lib::redirectjs(app_base.'my_appointment','Your appointment has been sent and will be checked by admin.');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function proccessAppointment($input)
	{
		try {
			$data = [
					'event_name'		=> $input['event_name'],
					'event_time'		=> $input['event_time'],
					'status'			=> $input['status'],
					'note'				=> nl2br($input['note'])
					];
			if($this->update($data, $this->primaryKey, $input['id_event'])){

				$mail_url = base_url.'function/sendmail.php?id_event='.$input['id_event'];
				file_get_contents($mail_url);
				Lib::redirect('index_appointment&main=appointment');
				
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function myAppointment()
	{
		return $this->findBy('id_user', $_SESSION['id_user']);
	}

	public function cancelAppointment($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('my_appointment');
		}else{
			header($this->back);
		}
	}

	public function deleteAppointment($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_appointment&main=appointment');
		}else{
			header($this->back);
		}
	}

	public function getReport($dt, $tp)
	{
		if($tp == 'meeting'){
			return $this->findAll("where meeting_date like '".$dt."%' and status=1");
		}elseif($tp == 'event'){
			return $this->findAll("where event_date like '".$dt."%' and status=2");
		}else{
			return null;
		}
	}

}