<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'cep',
        'road',
        'district',
        'city',
        'uf',
        'ibge',
        'created_at',
        'updated_at'
    ];
}
