<?php

namespace App;

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

}
