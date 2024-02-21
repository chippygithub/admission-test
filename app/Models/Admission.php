<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;
    protected $table = "admissions";
    protected $fillable=[
        'name',
        'email',
        'gender',
        'age',
        'address',
        'mark_sheet',
        'status',
        'latitude',
        'longitude',
        'is_free_bus_fair'
    ];

}
