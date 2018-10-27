<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    
    protected $fillable = [
        'title', 'description', 'expires_at'
    ];

    public function questions()
    {
        return $this->hasMany(FormQuestion::class);
    }

}
