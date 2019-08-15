<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'title',
        'description',
        'image',
        'url'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
