<?php namespace App\Models;

use CodeIgniter\Model;

class PeperoniModel extends Model
{
    protected $table      = 'peeroni';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'name', 'price','ingredients'];

   
    public function addPeperoni($peperoni)
    {
        $this->insert([
                'name'=>$peperoni['name'],
                'price'=>$peperoni['price'],
                'ingredients'=>$peperoni['ingredients'],
                
            
        ]);
    }
}