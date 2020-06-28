<?php namespace App\Controllers;
use App\Models\UserModel;
class User extends BaseController
{
	public function index()
	{
		return view('auths/login');
	}
     
	public function register()
	
	{
		$data = [];
		helper(['form']);
		$register = new UserModel();
		if($this->request->getMethod() == "post")
		{
			$rules = [	
				'email'=>'required',
				'password'=>'required|min_length[8]',
				'address'=>'required',
				'role'=>'required',
			];
			if($this->validate($rules)){
				$user = new UserModel();
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$address = $this->request->getVar('address');
				$userData = array(
					'email'=>$email ,
					'password'=>$password,
					'address'=>$address,
				);
				$user->insert($userData);
				return redirect()->to('/');
			// }else{
			// 	$data['messages'] = $this->validator;
			}
		}
		return view('auths/register');

	}

	//--------------------------------------------------------------------

}
