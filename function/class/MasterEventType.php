<?php
class MasterEventType extends Core{

	protected $table 		= 'tbl_event_type'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_event_type';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index()
	{
		return $this->findAll('order by event_type_name asc');
	}

	public function saveEventType($input)
	{
		try {
			$data = ['event_type_name' => $input['event_type_name']];
			if($this->save($data)){
				Lib::redirect('index_package&main=package');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateEventType($input)
	{
		try {
			$data = ['event_type_name' => $input['update_event_type_name']];
			if($this->update($data, $this->primaryKey, $input['update_id_event_type'])){
				Lib::redirect('index_package&main=package');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteEventType($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_package&main=package');
		}else{
			header($this->back);
		}
	}

	

}