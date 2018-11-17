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

    public function getMinifiedAttribute()
    {
        $maxLen = 12;

        if (strlen($this->title) > $maxLen) {
            return substr($this->title, 0, $maxLen) . '...';
        } else {
            return $this->title;
        }
    }


}
