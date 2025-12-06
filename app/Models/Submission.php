<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = [
        'assigment_id',
        'student_id',
        'content',
        'attachment',
        'note',
        'grade',
    ];

    public function assigment()
    {
        return $this->belongsTo(Assigment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
