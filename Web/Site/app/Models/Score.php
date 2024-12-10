<?php

namespace App\Models;

use CodeIgniter\Model;

class Score extends Model
{
    protected $table = 'score';
    
    protected $allowedFields = ['id_user','score', 'up_input', 'down_input', 'left_input', 'right_input', 'pressed_input'];

    public function getScore($id)
    {
        $score = $this->where(['id_user' => $id])->first();
        if ($score == null) {
            $data = [
                'id_user' => $id,
                'score' => 0,
                'up_input' => 0,
                'down_input' => 0,
                'left_input' => 0,
                'right_input' => 0,
                'pressed_input' => 0
            ];
            $this->insert($data);

            $score = $this->where(['id_user' => $id])->first();
        }      
        return $score;
    }
}