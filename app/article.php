<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany(article::class);
    }
}
