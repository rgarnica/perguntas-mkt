<?php

namespace App;

use App\Form;
use App\AnswerQuestion;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'email', 'latitude', 'longitude','form_id', 'hash'
    ];

    public static function findByHash(string $hash)
    {
        return static::where('hash', $hash)->firstOrFail();
    }
    
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function responses()
    {
        return $this->belongsToMany(Question::class);
    }


}
