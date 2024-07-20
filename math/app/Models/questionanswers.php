<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionanswers extends Model
{
    use HasFactory;
    protected $table ="questionsAns";

    protected $filiable = [
        'QUESTION',
        'ANSWER',
    ];
}
