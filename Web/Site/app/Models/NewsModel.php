<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    public function getNews($id = 0)
    {
        if ($id === 0) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}

