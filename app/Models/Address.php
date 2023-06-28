<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'addressType',
        'contact_person_number',
        'contact_person_name',
        'address',
        'latitude',
        'longitude',
    ];
}
