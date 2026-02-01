<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $fillable = [
        'region_code',
        'province_code',
        'municipality_code',
        'code',
        'name'
    ];
}
