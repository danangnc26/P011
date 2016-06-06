<?php
class PageConfig extends Core{

	protected $table 		= 'tbl_page_config'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_config';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function getPageList()
	{
		return $this->findAll();
	}

	public function findPageConfig($type)
	{
		return $this->findBy('type', $type);
	}

	public function updatePageConfig($input)
	{
		try {
			$data = [
					'text'		=> htmlspecialchars($input['text'])
					];
			if($this->update($data, $this->primaryKey, $input['id_config'])){
				Lib::redirect('index_config&main=config');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


}