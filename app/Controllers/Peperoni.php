<?php namespace App\Controllers;
use App\Models\PeperoniModel;
class Peperoni extends BaseController
{
	public function index()
	{
		$pizza = new PeperoniModel();
		$data['pizzas'] = $pizza->findAll();
		return view('/index',$data);		
	}
	 
	
	public function peperoni()
	{
		helper(['form']);
		$data = [];
		if($this->request->getMethod() == "post"){
			$rules = [
				'name'=>'required',
				'prize'=>'required',
				'ingredients'=>'required'
			];
		    if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to("/viewPeperoni");
			}
			else{			
				$pizza = new PeperoniModel();
				$pizzaData = array(
					'name'=>$this->request->getVar('name'),
					'prize'=>$this->request->getVar('prize'),
					'ingredients'=>$this->request->getVar('ingredients'),
				);
				$pizza->addPeperoni($pizzaData);
				return redirect()->to("/viewPeperoni");
			}
	    }	
		return view('index',$data);
}

	//--------------------------------------------------------------------

}
