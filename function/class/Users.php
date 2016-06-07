<?php
class Users extends Core{

	protected $table 		= 'tbl_users'; 	// Ganti dengan nama tabel yang di inginkan.
	protected $primaryKey	= 'id_user';		// Primary key suatu tabel.

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function doLogin($input)
	{
		try {
			$username = $this->con()->real_escape_string($input['username']);
			$password = $this->con()->real_escape_string($input['password']);

			$result = $this->findAll("where username='".$username."' and password='".md5($password)."'");
			if(!empty($result) or $result != false){
				foreach ($result as $key => $value) {
					$_SESSION['username'] = $value['username'];
					$_SESSION['id_user'] = $value['id_user'];
					$_SESSION['name']	= $value['name'];
					$_SESSION['level_user']		= $value['level_user'];
				}
				if($_SESSION['level_user'] == 'admin'){
					Lib::redirect('show_welcome');
					echo 'admin';
				}elseif($_SESSION['level_user'] == 'client'){
					Lib::redirect('home');
				}else{
					echo "default";
				}
			}else{
				echo Lib::redirectjs(app_base.'login', "Login failed, username / password you entered is incorrect.");
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	

	public function checkLevel()
	{

		if(isset($_SESSION)){
			if($_SESSION['level_user'] != 'admin'){
				header("Location:login.php");
			}
		}

	}

	public function doLogout()
	{
		session_destroy();
		Lib::redirect('login');
	} 

	public function saveRegister($post)
	{
		try{
				$data = [
					'username' 		=> $post['username'],
					'password' 		=> md5($post['password']),
					'name'			=> $post['name'],
					'phone'			=> $post['phone'],
					'email'			=> $post['email'],
					'level_user'	=> 'client'
					];
				if($this->save($data)){
					echo Lib::redirectjs(app_base.'login', 'Your account has been successfully created, please log in to continue.');
				}
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}

	public function getCustomer()
	{
		return $this->findAll("where level_user='customer' order by nama_lengkap asc");
	}

	public function getUser()
	{
		return $this->findBy($this->primaryKey, $_SESSION['id_user']);
	}

	public function getUserForAdmin($id)
	{
		return $this->findBy($this->primaryKey, $id);
	}

	public function updateProfil($input)
	{
		try {
			$data = [
					'name'	=> $input['name'],
					'phone'			=> $input['phone'],
					'email'		=> $input['email'],
					];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Your profile has been successfully changed, please log in to continue.');
			}else{
				header($this->back);
			}
		} catch (Exception $e) {	
			echo $e->getMessage();
		}
	}

	public function updatePassword($input)
	{
		try {
			$data = ['password' => md5($input['password'])];
			if($this->update($data, $this->primaryKey, $_SESSION['id_user'])){
				echo Lib::redirectjs(app_base.'logout', 'Your password has been successfully changed, please log in to continue.');
			}else{
				header($this->back);
			}

		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}
