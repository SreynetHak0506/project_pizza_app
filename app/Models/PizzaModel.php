<?php namespace App\Models;

use CodeIgniter\Model;

class PizzaModel extends Model
{
    protected $table      = 'pizza';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'name', 'price','ingredients'];

   
    public function createPizza($pizza)
    {
        $this->insert([
                'name'=>$pizza['name'],
                'price'=>$pizza['price'],
                'ingredients'=>$pizza['ingredients'],
                
            
        ]);
    }
}