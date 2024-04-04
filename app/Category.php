<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];
    public function products()
    {
        return $this->hasOne('App\Product');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
