<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'credits',
    ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
