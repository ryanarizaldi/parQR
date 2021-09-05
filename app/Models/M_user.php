<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_user extends Model
{
    protected $table = 'user';
    // protected $allowedFields = ['user_name','user_email','user_password','user_created_at'];

    public function cekLogin($table, $where)
    {
        return $this->db->get_where($table,$where);
        
    }
    
}

