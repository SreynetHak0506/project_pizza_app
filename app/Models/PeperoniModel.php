<?php namespace App\Models;

use CodeIgniter\Model;

class PeperoniModel extends Model
{
    protected $table      = 'peperoni';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'name', 'price','ingredients'];

   
    public function addPeperoni($pizza)
    {
        $this->insert([
                'name'=>$pizza['name'],
                'price'=>$pizza['price'],
                'ingredients'=>$pizza['ingredients'],
                
            
        ]);
    }
}