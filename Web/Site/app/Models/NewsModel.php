<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'utilisateur';
    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    protected $allowedFields = ['role_id','username', 'password'];

    public function getUsers($id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}

