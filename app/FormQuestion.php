<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
    
    protected $fillable = [
        'title', 'type'
    ];

    public function form()
    {
        $this->belongsTo(Form::class);
    }

}
