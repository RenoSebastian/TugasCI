<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username','password','email','nama'];

    protected bool $allowEmptyInserts = false;

    
    /**
     * Fungsi untuk mendapatkan data pengguna berdasarkan username.
     *
     * @param string $username
     * @return array|null
     */
    public function getUserByUsername(string $username)
    {
        return $this->where('username', $username)->first();
    }

    /**
     * Fungsi untuk memeriksa apakah password yang diberikan cocok dengan password yang tersimpan.
     *
     * @param string $password
     * @param array $userData
     * @return bool
     */
    public function verifyPassword(string $password, array $userData)
    {
        return password_verify($password, $userData['password']);
    }

}
