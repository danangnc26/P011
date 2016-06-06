<?php
class Gallery extends Core{

	protected $table 		= 'tbl_images'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_image';		// Primary key suatu tabel.
	protected $back 		= "location:javascript://history.go(-1)";

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function getImage()
	{
		return $this->findAll('order by id_image desc');
	}

	public function findImage($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function saveImage($input)
	{
		try {
			$data = [
					'title'				=> $input['title'],
					'caption'			=> nl2br($input['caption']),
					'image_location'	=> $input['image_location']
					];
			if($_FILES['image']['tmp_name'] != null){
				$data['image']	= Lib::uploadImg($input);
			}
			if($this->save($data)){
				Lib::redirect('index_gallery&main=gallery');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateImage($input)
	{
		try {
			$data = [
					'title'				=> $input['title'],
					'caption'			=> nl2br($input['caption']),
					'image_location'	=> $input['image_location']
					];
			if($_FILES['image']['tmp_name'] != null){
				$data['image']	= Lib::uploadImg($input);
			}
			if($this->update($data, $this->primaryKey, $input['id_image'])){
				Lib::redirect('index_gallery&main=gallery');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function deleteImage($id)
	{
		if($this->delete($this->primaryKey, $id)){
			Lib::redirect('index_gallery&main=gallery');
		}else{
			header($this->back);
		}
	}

}