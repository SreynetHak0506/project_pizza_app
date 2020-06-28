<?php namespace App\Controllers;
use App\Models\PeperoniModel;
class Peperoni extends BaseController
{
	public function index()
	{
		$peperoni = new PeperoniModel();
		$data['peperonis'] = $peperoni->findAll();
		return view('/index',$data);		
	}
	 
	
	public function addPeperoni()
	{
		$data=[];
		helper(['form']);
		$peperoni = new PeperoniModel();
		if($this->request->getMethod() == "post")
		{
		$rules=[

			 'name' =>'required',
			 'price' => 'required',
			 'ingredients'=>'required'

		];
		if($this->validate($rules))
		//insert to database
		{
		   $peperoni = new PeperoniModel();

			$peperoniData = array(
				'name' => $this->request->getVar('name'),
				'price' => $this->request->getVar('price'),
				'ingredients' => $this->request->getVar('ingredients'),
			);
			$peperoni->save($peperoniData);
			return redirect()->to('/viewPeperoni');

		}else {
			$data['messages'] = $this->validator;
			return view('/viewPeperoni');
		}
		
	}
}

	//--------------------------------------------------------------------

}
