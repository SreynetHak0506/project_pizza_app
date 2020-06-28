<?php namespace App\Models;

use CodeIgniter\Model;

class PeperoniModel extends Model
{
    protected $table      = 'peperoni';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'name', 'price','ingredients'];

    
}