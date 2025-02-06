<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajinaSahili extends Model
{
    use HasFactory;
    protected $fillable = ['full_name', 'address', 'occupation','user_id', 'name_wrong','name_edit','religion'];
}
