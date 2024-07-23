<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'school'; //table name

    protected $fillable = [     //School table fields
        'Name',
        'district',
        'schoolRegistrationNumber',
        'RepID',
        'RepEmail',
        'RepFirstName',
        'RepLastName',
    ];
}
