<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $allowedFields = [ 'email', 'password','address','role'];


    public function registerUser($user)
    {
        $this->insert([
                'email'=>$user['email'],
                'password'=>$user['password'],
                'address'=>$user['address'],
                'role'=>$user['role']
                
            
        ]);
    }

   
}