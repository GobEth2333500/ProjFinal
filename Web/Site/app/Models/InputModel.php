<?php

namespace App\Models;

use CodeIgniter\Model;

class InputModel extends Model
{
    protected $table = 'input';
    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    protected $allowedFields = ['input'];

}

