<?php 
namespace App\Services;

use App\Form;

class AnswerService
{

    public function createAnswer(Form $form, array $data)
    {
        return $form->answers()->firstOrCreate($data, [
            'hash' => str_random(32)
        ]);        
    }

}