<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_bank_answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id', 'answer', 'correct', 'point'
    ];
}
