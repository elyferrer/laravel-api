<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'region_code',
        'code',
        'name',
        'psgc_code'
    ];
}
