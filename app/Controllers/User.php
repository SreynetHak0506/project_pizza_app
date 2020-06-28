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
				'email'=>'required|letter',
				'password'=>'required|min_length[8]|hide[password]',
				'address'=>'required|min_line[2]|letter',
			];
			if(!$this->validate($rules)){
				$data['messages'] = $this->validator;
			}else{

			}
		}
		return view('auths/register');

	}

	//--------------------------------------------------------------------

}
