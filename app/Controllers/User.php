<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	// login form 
	public function index()
	{
		return view('auths/login');
	}
	//sign to register
	public function signup()
	{
		return view('auths/register');
	}
	
	//validate form login account
	public function loginAccount()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'email' => 'required|valid_email',
				'password' => 'required|validateUser[email,password]'
			];
			$error = [
				'password' => [
					'validateUser' => 'password not match!'
				]
			];
			$email = $this->request->getVar('email');
			if(!$this->validate($rules,$error)){
				$data['message'] = $this->validator;
			}else{
				$model = new UserModel();
				$user = $model->where('email',$email)->first();
							 
				$this->setUserSession($user);
				$session = session();
				$session->setFlashdata('success','successful Register');
				return redirect()->to('/pizza');
			}

		}
		return view('auths/login',$data);
	}

	public function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'address' => $user['address'],
			'password' => $user['password'],
			'email' => $user['email'],
			'role' => $user['role']
		];

		session()->set($data);
		return true;
	}	
	// validate form  register 
	public function registerAccount()
	{
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rules = [
				'email'=>'required|valid_email',
				'password'=>'required',
				'address'=>'required',
			];
			 if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return view('auths/register',$data);
				
			
			}else{
				$userModel = new UserModel();
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$role = $this->request->getVar('checkUser');
				$userData = [ 
					'email'=>$email ,
					'password'=>$password ,
					'address'=>$address ,
					'role'=>$role,
					
				];
				$userModel->registerUser($userData);
				$session = session();
				$session->setFlashdata('success','Successful To  Register Account');
				return redirect()->to('/loginAccount');
			}
		}

	}
	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}
	//--------------------------------------------------------------------
}