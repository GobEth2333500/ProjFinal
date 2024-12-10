<?php

namespace App\Models;

use CodeIgniter\Model;

class Input extends Model
{
    protected $table = 'input';

    protected $allowedFields = ['id', 'inputName', "used"];

    public function getLastInput()
    {
        $this->load->database();
        $last_row = $this->db->order_by('id',"desc")
            ->limit(1)
            ->row();
        return  $last_row;
    }
}
