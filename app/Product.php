<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'fullName', 'emailAddress', 'subject', 'message', 'category_id'
    ];

    public function users()
    {
        $this->belongsTo('App\User', 'user_id');
    }
}
