<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'content',
        'attachment',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
