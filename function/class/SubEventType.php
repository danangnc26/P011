<?php
class SubEventType extends Core{

	protected $table 		= 'tbl_sub_event_type'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_sub_event_type';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function index($id = '')
	{
		return $this->findAll();
	}

	public function editPackage($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function savePackagePrice($input)
	{
		try {
			$data = [
					'id_event_type'			=> $input['id_event_type'],
					'sub_event_type_name'	=> $input['sub_event_type_name'],
					'price'					=> $input['price'],
					'specification'			=> implode('|', $input['specification'])
					];
			if($this->save($data)){
				Lib::redirect('index_package&main=package');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updatePackagePrice($input)
	{
		try {
			$data = [
					'id_event_type'			=> $input['id_event_type'],
					'sub_event_type_name'	=> $input['sub_event_type_name'],
					'price'					=> $input['price'],
					'specification'			=> implode('|', $input['specification'])
					];
			if($this->update($data, $this->primaryKey, $input['id_sub_event_type'])){
				Lib::redirect('index_package&main=package');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deletePackage($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_package&main=package');
		}else{
			header($this->back);
		}
	}

	

}