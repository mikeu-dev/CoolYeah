<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'student_id',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
