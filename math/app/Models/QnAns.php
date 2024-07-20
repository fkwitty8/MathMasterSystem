<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QnAns extends Model
{
    use HasFactory;
    protected $table = 'qnans'; // Specify the table name if it doesn't follow Laravel conventions

    protected $fillable = ['QnID', 'Qn', 'AnsID', 'Ans', 'Marks'];
}
