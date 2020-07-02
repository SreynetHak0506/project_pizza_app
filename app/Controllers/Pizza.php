<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizza extends BaseController
{
	
	public function index()
	{	
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->findAll();
		return view('index',$data);
	}
	// add pizza to table pizza
	public function createPizza(){
		$data = [];
		if($this->request->getMethod() == "post"){
			helper(['form']);
			$rules = [
				'name'=>'required|alpha_space',
				'price'=>'required|min_length[1]|max_length[50]',
				
			];	
			 if($this->validate($rules)){
				$pizzaModel = new PizzaModel();
				$pizzaName = $this->request->getVar('name');
				$pizzaPrice = $this->request->getVar('price')."$";
				$pizzaIngredient = $this->request->getVar('ingredients');
				$pizzaData = array(
					'name'=>$pizzaName,
					'price'=>$pizzaPrice,
					'ingredients'=>$pizzaIngredient
				);
				$pizzaModel->insert($pizzaData);

			}else{
				$sessionError = session();
                		$validation = $this->validator;
               			$sessionError->setFlashdata('error', $validation);
			}
		}
		return redirect()->to('/pizza');

	}

	// edit pizza data
	public function editPizza($id)
	{
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->find($id);
		return view('index',$data);
	}
		// update piza data
		public function updatePizza(){
			$pizza = new PizzaModel();
			$pizza->update($_POST['id'], $_POST);
			return redirect()->to('/pizza');
		}

	// delete pizza data from table pizza
	public function deletePizza($id){
		$pizza = new PizzaModel();
		$pizza->find($id);
		$delete = $pizza->delete($id);
		return redirect()->to("/pizza");
	}
}