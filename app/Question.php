<?php

namespace App;

use App\Types\FormQuestionTypes;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $fillable = [
        'title', 'type'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    public function scopeObjectives($query)
    {
        return $query->where('type', FormQuestionTypes::OBJECTIVE);
    }


    public function scopeOpen($query)
    {
        return $query->where('type', FormQuestionTypes::OPEN);
    }

    public function scopeAnsweredAlternatives()
    {
        return $this->responses()->wherePivot('alternative_id', '!=', 'null');
    }

    public function responses()
    {
        return $this->belongsToMany(Answer::class)
            ->withPivot('response', 'alternative_id');
    }
}
