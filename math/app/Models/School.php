<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $table = 'school'; // Specify the table name if it doesn't follow Laravel conventions

    protected $fillable = [
        'Name',
        'district',
        'schoolRegistrationNumber',
        'RepID',
        'RepEmail',
        'RepFirstName',
        'RepLastName',
    ];
}
