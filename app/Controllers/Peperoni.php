<?php namespace App\Controllers;
use App\Models\PeperoniModel;
class Peperoni extends BaseController
{
	public function index()
	{
		$peperoni = new PeperoniModel();
		$data['peperonis'] = $peperoni->findAll();
		return view('/index');		
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
			$name = $this->request->getVar('name');
			$price = $this->request->getVar('price');
			$ingredient = $this->request->getVar('ingredients');
			$peperoniData = array(
				'name'=>$name,
				'price'=>$price,
				'ingredients'=>$ingredient,
			);
			$peperoni->insert($peperoniData);
			return redirect()->to('/viewPeperoni');

		}else {
			$data['messages'] = $this->validator;
			return view('/viewPeperoni',$data);
		}
		
	}
}

	//--------------------------------------------------------------------

}
