<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id', 'firstName', 'MiddleName', 'LastName', 'birthDate', 'address', 'occupation',
        'phone'
    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
