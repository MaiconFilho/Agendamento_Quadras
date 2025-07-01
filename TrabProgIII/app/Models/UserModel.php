<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'User';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'name', 'pwd', 'email', 'type', 'createAt'];
    protected $useAutoIncrement = false;
    public $timestamps = false;
    
    // Hooks para criptografar senha antes de salvar
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data)
    {
        // Só criptografa se a senha foi fornecida
        if (isset($data['data']['pwd']) && !empty($data['data']['pwd'])) {
            $data['data']['pwd'] = password_hash($data['data']['pwd'], PASSWORD_DEFAULT);
        }
        
        return $data;
    }
}