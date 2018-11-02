<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    
    protected $fillable = [
        'title', 'description', 'expires_at', 'link_hash'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
