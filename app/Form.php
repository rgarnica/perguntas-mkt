<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $dates = [
        'expires_at'
    ];
    
    protected $fillable = [
        'title', 'description', 'expires_at', 'link_hash'
    ];

    public static function findByHash(string $hash)
    {
        return static::where('link_hash', $hash)->first();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
