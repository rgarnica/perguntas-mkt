<?php

namespace App\Services;

use App\Question;

class AlternativeService
{

    public function createDefaultAlternative(int $question_id)
    {
        $question = Question::find($question_id);

        $a = $question->alternatives()->create([
            'title' => 'Alternativa...'
        ]);

        return $a;
    }

}