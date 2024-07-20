<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  UnverifiedSchoolRepresentative extends Model 
{
    use HasFactory;

    protected $table = 'unverified_schoolrepresentatives'; // Specify the table name if it doesn't follow Laravel conventions

    protected $fillable = [
        'RepID',
        'RepEmail',
        'SchoolRegistrationNumber',
        'RepFirstName',
        'RepLastName',
    ];
}
