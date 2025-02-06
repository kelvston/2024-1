<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajinaKuzaliwa extends Model
{
    use HasFactory;
    protected $table = 'majina_kuzaliwa';
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'religion',
        'occupation',
        'birthCategory',
        'birthWitness',
        'hospital_address',
        'hospital',
        'signature',
        'date',
        'witnessName',
    ];
}
