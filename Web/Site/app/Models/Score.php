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
            $this->save([
                'role_id'   => $id
            ]);
            $score = $this->where(['id_user' => $id])->first();
        }      
        return $score;
    }
}