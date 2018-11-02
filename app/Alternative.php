<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{   

    protected $fillable = [
        'question_id', 'title'
    ];


    public function question()
    {
        return $this->belongsTo(Question::class);
    }


}
